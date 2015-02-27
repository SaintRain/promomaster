<?php

/**
 * Колбэк валидатор проверки соотвествия
 * внутренних сситемных имен типов доставки
 * для определенных ТК
 * @author  Kaluzhny. N.
 * @copyright LLC "PromoMaster"
 */
namespace Core\DeliveryBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class InternalCode extends Constraint {

    public $message = 'Недопустимое внутреннее имя для компании %company%';

    public function validatedBy()
    {
        return 'core_delivery_internal_code';
    }
    
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
     
}