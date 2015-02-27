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
class CheckComposition extends Constraint {


    public function validatedBy() {
        return 'core_order_check_composition';
    }

    public function getTargets() {
        return self::CLASS_CONSTRAINT;
    }

}