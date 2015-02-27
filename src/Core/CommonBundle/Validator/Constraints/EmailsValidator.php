<?php

/**
 * Валидатор массива emails
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class EmailsValidator extends ConstraintValidator {

    public function validate($value, Constraint $constraint) {
        if (!is_array($value)) {
            $data = explode("\n", $value);
        } else {
            $data = $value;
        }

        $regexe='/[-0-9a-zA-Z\._]+@[-0-9a-zA-Z\._]+\.[a-zA-Z]{2,4}/';
        $twins=array();
        foreach ($data as $email) {
            if ($email && !preg_match($regexe, $email, $matches)) {
                $this->context->addViolation($constraint->message, array('%string%' => $email));
            }
            //проверка,чтоб не было двойственных данных
            if (isset($twins[$email])) {
                $this->context->addViolation($constraint->messageTwins);
            }
            else {
                $twins[$email]=true;
            }
        }
    }

}