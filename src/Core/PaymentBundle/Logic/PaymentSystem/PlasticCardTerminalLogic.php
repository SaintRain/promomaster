<?php

/**
 * Сервис для работы с платежной системой PlasticCard (через терминал при получении товара)
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Logic\PaymentSystem;

use Core\PaymentBundle\Entity\Payment;

class PlasticCardTerminalLogic extends PaymentSystemLogic
{

    const PAYMENT_SYSTEM = 'PlasticCardTerminal';

    /**
     * Генерация URL для перенаправления
     *
     * @param \Core\PaymentBundle\Entity\Payment $payment
     * @return type
     */
    public function getRequestURL(Payment $payment, $options = array())
    {
        parent::checkPayment($payment);

        $URL = $this->container->get('router')->generate('core_order_finish_with_payment_id', array(
            'paymentSystem' => self::PAYMENT_SYSTEM,
            'id' => $payment->getId(),
        ));

        $URL = $URL . ($options['orderId'] ? '?shporderid=' . $options['orderId'] . '&shpuserid=' . $options['userId'] : '' );

        return $URL;
    }

    /**
     * Уведомление о создании платежки
     *
     * @param type $request
     * @return array
     */
    public function getResultMessagesAndPayment($request)
    {
        $this->getSystem(self::PAYMENT_SYSTEM);

        $respose = array();
        $id = (int) $request->attributes->get('id');
        $userId = (int) $request->query->get('shpuserid');

        $payment = $this->container->get('doctrine')->getManager()->getRepository('CorePaymentBundle:Payment')->findByIdSystemUser($id, self::PAYMENT_SYSTEM, $userId);

        if (null === $payment) {
            $respose['error'][] = $this->trans('error.not_found_payment', array('%id%' => $id));
        } else {
            $respose['success'][] = $this->trans('success.bank_transfer');
        }

        return [$respose, $payment];
    }

}
