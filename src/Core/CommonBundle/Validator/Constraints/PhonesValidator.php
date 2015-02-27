<?php

/**
 * Валидатор номера телефона
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class PhonesValidator extends ConstraintValidator {

    /**
     * {@inheritDoc}
     */
    public function validate($value, Constraint $constraint) {
        if (!is_array($value)) {
            $data = explode("\n", $value);
        } else {
            $data = $value;
        }

        $twins = array();
        foreach ($data as $phone) {

            //+7 863 2831122
            //if ($phone != '') {
                if ($phone && !preg_match('/^[+]\d{1,2}[- (]{0,1}\d{3}[- )]{0,1}\d{6,7}$/', $phone, $matches)) {
                    $this->context->addViolation($constraint->message, array('%string%' => $phone));
                }
                //проверка,чтоб не было двойственных данных
                if (isset($twins[$phone])) {
                    $this->context->addViolation($constraint->messageTwins);
                } else {
                    $twins[$phone] = true;
                }
            //}
        }
    }

}