<?php
/**
 * Сервис для работы с платежной системой PayPal
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Logic\PaymentSystem;

use Core\PaymentBundle\Entity\Payment;

class PayPalLogic extends PaymentSystemLogic
{
    const PAYMENT_SYSTEM = 'PayPal';

    /**
     * Генерация URL для отправки запроса на выполнения платежа
     *
     * @param \Core\PaymentBundle\Entity\Payment $payment
     * @return string
     */
    public function getRequestURL(Payment $payment, $options = array())
    {
        parent::checkPayment($payment);
        $this->getSystem(self::PAYMENT_SYSTEM);

        $invoice = $payment->getId();
        $amount  = $this->getFullAmount($payment);

        $custom = [
            'shporderid' => $options['orderId'],
            'shpuserid' => $options['userId'],
            'invoice' => $invoice,
        ];

        $parameters = [
            'cmd' => '_xclick',
            'charset' => 'utf-8',
            'rm' => '1',
            'no_shipping' => '1',
            'no_note' => '1',
            'bn' => 'PP-BuyNowBF',
            'business' => $this->system->getBusiness(),
            'item_name' => 'Платеж №'.$invoice,
            'item_number' => $options['orderId'],
            'invoice' => $invoice,
            'amount' => $amount,
            'currency_code' => $this->currency,
            'return' => $this->system->getSuccessURL().'?'.http_build_query($custom),
            'cancel_return' => $this->system->getFailURL().'?'.http_build_query($custom),
            'notify_url' => $this->system->getResultURL(),
            'custom' => $options['userId'],
            'lc' => $this->locale,
        ];

        $URL = $this->getCurrentRequestURL().'?'.http_build_query($parameters);

        $this->log($payment, $URL, self::LOG_REQUEST);

        return $URL;
    }

    /**
     * Установка платежу статус Выполнен
     *
     * @param type $request
     */
    public function doPassed($request)
    {

        $this->getSystem(self::PAYMENT_SYSTEM);

        $type = $request->request->get('txn_id') ? 'request' : 'query';
        $data = $request->{$type}->all();

        $orderId = $data['item_number'];
        $userId  = $data['custom'];
        $invoice = $data['invoice'];

        $em      = $this->container->get('doctrine')->getManager();
        $mc      = $this->container->get('beryllium_cache');
        $payment = $em->getRepository('CorePaymentBundle:Payment')->findByIdSystemUser($invoice, self::PAYMENT_SYSTEM, $userId);

        $this->log($payment, json_encode($data), self::LOG_RESPONSE);

        $this->checkPayment($payment);

        // запрашиваем подтверждение транзакции
        $postdata = '';
        foreach ($data as $key => $value) {
            $postdata .= $key.'='.urlencode($value).'&';
        }
        $postdata .= 'cmd=_notify-validate';

        $this->log($payment, 'POST request on '.$this->system->getVerifiedURL()."\n".'with data:'."\n".$postdata, self::LOG_REQUEST);

        $curl     = curl_init($this->system->getVerifiedURL());
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1);
        $response = strtoupper(curl_exec($curl));
        curl_close($curl);
        $this->log($payment, $response, self::LOG_RESPONSE);
        if ($response !== 'VERIFIED') {
            $this->log($payment, '#feedback - Статус транзакции: "'.$response.'", а должен быть "VERIFIED".', self::LOG_ERROR);
        } else {
            // проверяем сумму платежа
            if (number_format($payment->getAmount(), 2, '.', '') !== number_format($data['mc_gross'], 2, '.', '') || strtolower($data['mc_currency']) !== strtolower($this->currency)) {
                $this->log($payment, '#feedback - Не совпадает сумма платежа или валюта, получено: '.$data['mc_gross'].' '.$data['mc_currency'], self::LOG_ERROR);
            } else {
                if (strtolower($data['payment_status']) !== 'completed') {
                    $this->log($payment, '#feedback - Статус платежа: "'.$data['payment_status'].'", а должен быть "completed".', self::LOG_ERROR);
                } else {

                    // Если все хорошо проставляем статус заказу - оплачен
                    if ($mc->get($invoice) || $orderId) {
                        $order = $em->getRepository('CoreOrderBundle:Order')->find($orderId ? $orderId : $mc->get($invoice));
                        if (null !== $order) {
//                            $orderCostInfo = $this->container->get('core_order_logic')->computeOrderCostInfo($order);
//                            if ($payment->getAmount() >= $orderCostInfo['total_cost']) {
                            // Проставляем статус Оплачен
                            $status = $em->getRepository('CoreOrderBundle:ExtraStatus')->findOneByName('paid');
                            if (null !== $status) {
                                $order->setExtraStatus($status);
                            }
                            $order->setIsPaidStatus(true);
                            $em->flush($order);
//                            }
                        } else {
                            $this->log($payment, '#feedback - Не найден заказ с id: '.($orderId ? $orderId : $mc->get($invoice)), self::LOG_ERROR);
                        }
                    }

                    // проставляем статус платежу - выполнен
                    $payment->setIsPassed(true);
                    $em->flush($payment);
                    $this->log($payment, '#feedback - Платеж выполнен успешно ', self::LOG_INFO);
                }
            }
        }

        exit;
    }

    /**
     * Уведомление пользователя об успешном выполнении платежа
     *
     * @param type $request
     * @return array
     */
    public function getResultMessagesAndPayment($request)
    {
        $this->getSystem(self::PAYMENT_SYSTEM);

        $data    = $request->query->all();
        $userId  = isset($data['shpuserid']) ? $data['shpuserid'] : 0;
        $invoice = isset($data['invoice']) ? $data['invoice'] : 0;

        $respose = array();

        $em = $this->container->get('doctrine')->getManager();

        $payment = $em->getRepository('CorePaymentBundle:Payment')->findByIdSystemUser($invoice, self::PAYMENT_SYSTEM, $userId);

        if (null === $payment) {
            $respose['error'][] = $this->trans('error.not_found_payment', array('%id%' => $invoice));
        } else {
            if (false === $payment->getIsPassed()) {
                $msg                = $this->trans('error.payment_was_canceled');
                $respose['error'][] = $msg;
                $this->log($payment, '#result - '.$msg, self::LOG_ERROR);
            }
        }
        if (!isset($respose['error'])) {
            $respose['success'][] = $this->trans('success.payment_passed',
                ['%id%' => $invoice, '%amount%' => number_format($payment->getAmount(), 2, ',', ' '), '%system%' => $payment->getSystem()->{'getCaption'.ucfirst($this->locale)}()]);
        }

        return [$respose, $payment];
    }
}