<?php

/**
 * Проверка доступного количества продукта перед бронирование товара при редактировании заказа
 * 
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class OrderExtra extends Constraint {
    
    public function validatedBy() {
        return 'core_order_order_extra';
    }

    public function getTargets() {
        return self::CLASS_CONSTRAINT;
    }

}