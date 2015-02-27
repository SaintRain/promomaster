<?php

/**
 * Валидатор проверки времменых зон
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
namespace Core\DirectoryBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class TimeZoneValidator extends ConstraintValidator
{

    public function validate($value, Constraint $constraint)
    {
        if ($value) {
           $value *= 1;
           if ($value > 12 || $value < -12) {
               $this->context->addViolation($constraint->message, array('%string%' => $value));
           }
        }
        
    }
}