<?php

/**
 * Проверка доступного количества продукта перед бронирование товара при редактировании заказа
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Core\LogisticsBundle\Entity\Transit;

class CheckCompositionValidator extends ConstraintValidator {

    public $em;

    public function __construct($em) {

        $this->em = $em;
    }

    public function validate($object, Constraint $constraint) {

//        $order = $object->getOrder();
////        если хоть одна бронь из заказа есть в транзите, который в пути
////        тогда блокируем редактирование некторых полей
//        foreach ($order->getCompositions() as $c) {
//            foreach ($c->getBooking() as $b) {
//                if ($b->getTransit() && $b->getTransit()->getStatus() && $b->getTransit()->getStatus()->getName() == Transit::onTheWayStatusName) {
//                    $this->context->buildViolation('Нельзя менять состав заказа, т.к. некоторые позиции находятся в транзите со статусом "В пути"')
//                        ->atPath('compositions')
//                        ->addViolation();
//                    break;
//                }
//            }
//        }
    }

}
