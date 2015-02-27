<?php
/**
 * Валидатор  доменного имени
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
namespace Core\CommonBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class DomainValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {

        //поддержка кирилических доменов
        if ($value && !preg_match('/^([а-яА-Яa-zA-Z0-9]([а-яА-Яa-zA-Z0-9\-]{0,61}[а-яА-Яa-zA-Z0-9])?\.)+[а-яА-Яa-zA-Z]{2,6}$/u', $value, $matches)) {
            $this->context->addViolation($constraint->message, array('%string%' => $value));
        }
    }


}