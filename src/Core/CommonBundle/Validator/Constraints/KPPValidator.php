<?php

/**
 * Валидатор проверяет правильность КПП
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class KPPValidator extends ConstraintValidator {

    public function validate($value, Constraint $constraint) {
        if ($value !== null) {
            if (!preg_match('/[A-Z\d]{9}/', $value)) {
                $this->context->addViolation($constraint->message, array('%string%' => $value));
            }
        }
    }

}