<?php

/**
 * Сервис для работы с платежной системой PlasticCard (через Яндекс Деньги)
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Logic\PaymentSystem;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Core\PaymentBundle\Entity\Payment;

class PlasticCardLogic extends YandexMoneyLogic
{

    const PAYMENT_SYSTEM = 'PlasticCard';

}
