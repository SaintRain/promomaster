<?php
/**
 * Валидатор номера телефона
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
namespace Core\CommonBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class PhoneValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        //+7 (863) 280-00-11
        //if ($value && !preg_match('/^[+]\d{1,2}[- (]{0,1}\d{3}[- )]{0,1}\d{6,7}$/', $value, $matches)) {
        if ($value && !preg_match('/^[\+\d\- \(\)]*$/', $value, $matches)) {
            $this->context->addViolation($constraint->message, array('%string%' => $value));
        }
    }


}