<?php

/**
 * Сервис для работы с платежной системой Robokassa
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Logic\PaymentSystem;

use Core\PaymentBundle\Entity\Payment;

class RobokassaLogic extends PaymentSystemLogic
{

    const PAYMENT_SYSTEM = 'Robokassa';

    /**
     * Создание подписи платежа
     *
     * @param string|int $OutSum
     * @param string|int $InvId
     * @param string $shp - пользовательские параметры
     * @return string
     */
    public function getSignature($OutSum, $InvId, $shp = '')
    {
        $this->getSystem(self::PAYMENT_SYSTEM);
        return md5($this->system->getLogin() . ':' . $OutSum . ':' . $InvId . ':' . $this->system->getPassword1() . $shp);
    }

    /**
     * Валидация платежа
     *
     * @param string $signature
     * @param string|int $OutSum
     * @param string|int $InvId
     * @param int $passwordNo
     * @return boolean
     */
    public function validate($signature, $OutSum, $InvId, $passwordNo, $shp = '')
    {
        $this->getSystem(self::PAYMENT_SYSTEM);
        $crc = md5($OutSum . ':' . $InvId . ':' . $this->system->{'getPassword' . $passwordNo}() . $shp);
        return strtoupper($signature) === strtoupper($crc);
    }

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

        $IncCurrLabel = '';
        if (isset($options['subsystem']) && $options['subsystem'] !== 'Robokassa') {
            $subsystem = $this->system->getSubsystems()->get($options['subsystem']);
            if (null !== $subsystem) {
                $IncCurrLabel = $subsystem->getIncCurrLabel();
            }
        }

        $InvId = $payment->getId();
        $amount = $this->getFullAmount($payment);

        $shp = ':shporderid=' . $options['orderId'] . ':shpsubsystem=' . $options['PaymentSystem'] . ':shpuserid=' . $options['userId'];
        $parameters = [
            'MrchLogin' => $this->system->getLogin(),
            'OutSum' => $amount,
            'InvId' => $InvId,
            'Desc' => 'Платеж №' . $InvId,
            'IncCurr' => $this->currency === 'RUB' ? 'RUR' : $this->currency,
            'culture' => $this->locale,
            'IncCurrLabel' => $IncCurrLabel,
            'SignatureValue' => $this->getSignature($amount, $InvId, $shp),
            'shporderid' => $options['orderId'],
            'shpsubsystem' => $options['PaymentSystem'],
            'shpuserid' => $options['userId'],
        ];

        $URL = $this->getCurrentRequestURL() . '?' . http_build_query($parameters);

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

        $type = $request->query->get('InvId') ? 'query' : 'request';

        $InvId = $request->{$type}->get('InvId');
        $OutSum = $request->{$type}->get('OutSum');
        $SignatureValue = $request->{$type}->get('SignatureValue');
        $orderId = $request->{$type}->get('shporderid');
        $userId = $request->{$type}->get('shpuserid');
        $subsystem = $request->{$type}->get('shpsubsystem');

        $em = $this->container->get('doctrine')->getManager();
        $mc = $this->container->get('beryllium_cache');
        $payment = $em->getRepository('CorePaymentBundle:Payment')->findByIdSystemUser($InvId, self::PAYMENT_SYSTEM, $userId);

        $this->log($payment, json_encode($request->{$type}->all()), self::LOG_RESPONSE);

        $this->checkPayment($payment);

        $shp = ':shporderid=' . $orderId . ':shpsubsystem=' . $subsystem . ':shpuserid=' . $userId;

        if ($this->validate($SignatureValue, $OutSum, $InvId, 2, $shp) && $this->getFullAmount($payment) === number_format($OutSum, 2, '.', '')) {

            if ($mc->get($InvId) || $orderId) {
                $order = $em->getRepository('CoreOrderBundle:Order')->find($orderId ? $orderId : $mc->get($InvId));
                if (null !== $order) {
//                    $orderCostInfo = $this->container->get('core_order_logic')->computeOrderCostInfo($order);
//                    if ($payment->getAmount() >= $orderCostInfo['total_cost']) {
                    // Проставляем статус Оплачен
                    $status = $em->getRepository('CoreOrderBundle:ExtraStatus')->findOneByName('paid');
                    if (null !== $status) {
                        $order->setExtraStatus($status);
                    }
                    $order->setIsPaidStatus(true);
                    $em->flush($order);
//                    }
                }
            }

            $payment->setIsPassed(true);
            $em->flush($payment);

            $this->log($payment, '#feedback - Платеж выполнен успешно ', self::LOG_INFO);
            echo 'OK' . $InvId . "\n";
        } else {
            if ($this->getFullAmount($payment) === $OutSum) {
                $this->log($payment, '#feedback - Подписи не совпадают', self::LOG_ERROR);
            } else {
                $this->log($payment, '#feedback - Сумма платежа не совпадает с полученной', self::LOG_ERROR);
            }
            echo 'bad sign' . "\n";
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

        $type = $request->query->get('InvId') ? 'query' : 'request';

        $InvId = (int) $request->{$type}->get('InvId');
        $OutSum = $request->{$type}->get('OutSum');
        $SignatureValue = $request->{$type}->get('SignatureValue');
        $orderId = $request->{$type}->get('shporderid');
        $userId = $request->{$type}->get('shpuserid');
        $subsystem = $request->{$type}->get('shpsubsystem');

        $respose = array();

        $em = $this->container->get('doctrine')->getManager();

        $payment = $em->getRepository('CorePaymentBundle:Payment')->findByIdSystemUser($InvId, self::PAYMENT_SYSTEM, $userId);

        if (null === $payment) {
            $respose['error'][] = $this->trans('error.not_found_payment', array('%id%' => $InvId));
        } elseif (null === $SignatureValue) {
            $msg = $this->trans('error.payment_is_not_consummated');
            $this->log($payment, $msg, self::LOG_ERROR);
            $respose['error'][] = $msg;
        } else {
            $this->log($payment, $request->server->get('REQUEST_URI'), self::LOG_RESPONSE);
            $shp = ':shporderid=' . $orderId . ':shpsubsystem=' . $subsystem . ':shpuserid=' . $userId;
            if ($this->getFullAmount($payment) !== number_format($OutSum, 2, '.', '')) {
                $respose['error'][] = $this->trans('error.bad_amount');
                $this->log($payment, '#result - Сумма платежа не совпадает с полученной', self::LOG_INFO);
            }

            if (false === $this->validate($SignatureValue, $OutSum, $InvId, 1, $shp)) {
                $respose['error'][] = $this->trans('error.bad_sign');
                $this->log($payment, '#result - Подписи не совпадают', self::LOG_INFO);
            }

            if (false === $payment->getIsPassed()) {
                $respose['error'][] = $this->trans('error.not_passed', ['%id%' => $InvId]);
                $this->log($payment, '#result - Платеж не был выполнен', self::LOG_INFO);
            }
        }

        $paymentSystemCaption = $payment->getSystem()->{'getCaption' . ucfirst($this->locale)}();
        if ($subsystem) {
            $temp = $this->system->getSubsystems()->get($subsystem);
            if (null !== $temp) {
                $paymentSystemCaption = $temp->{'getCaption' . ucfirst($this->locale)}();
            }
        }

        if (!isset($respose['error'])) {
            $respose['success'][] = $this->trans('success.payment_passed', ['%id%' => $InvId, '%amount%' => number_format($payment->getAmount(), 2, ',', ' '), '%system%' => $paymentSystemCaption]);
        }

        return [$respose, $payment];
    }

}
