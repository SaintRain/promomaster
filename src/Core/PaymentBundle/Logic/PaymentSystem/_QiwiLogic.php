<?php

/**
 * Сервис для работы с платежной системой Qiwi
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Logic\PaymentSystem;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Core\PaymentBundle\Entity\Payment;

class QiwiLogic extends PaymentSystemLogic {

    const PAYMENT_SYSTEM = 'Qiwi';

    public function getRequestURL(Payment $payment) {
        parent::checkPayment($payment);

        var_dump($this->system);
        exit;
    }

}

