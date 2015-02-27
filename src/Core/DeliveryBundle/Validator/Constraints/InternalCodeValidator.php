<?php

/**
 * Валидатор проверки соответствия
 * внутренних сситемных имен типов доставки
 * для определенных ТК
 * @author  Kaluzhny. N.
 * @copyright LLC "PromoMaster"
 */
namespace Core\DeliveryBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class InternalCodeValidator extends ConstraintValidator {

    private $internalCodes;
    
    public function __construct($internalCodes)
    {
        $this->internalCodes = $internalCodes;
    }

    public function validate($object, Constraint $constraint)
    {
        if ($object->getCompany()) {
            $companyName = $object->getCompany()->getName();
            // для ТК существуют внутренние коды
            if (isset($this->internalCodes[$companyName])) {
                $codes = array();
                foreach($this->internalCodes[$companyName] as $code) {
                    $codes[$code['id']] = $code['id'];
                }
                if (!$object->getInternalCode() && !isset($codes[$object->getInternalCode()])) {
                    $this->context->buildViolation($constraint->message)
                        ->atPath('internalCode')
                        ->setParameter('%company%', $object->getCompany()->getCaptionRu())
                        ->addViolation();
                }
            } elseif($object->getInternalCode()) {
                $this->context->buildViolation($constraint->message)
                    ->atPath('internalCode')
                    ->setParameter('%company%', $object->getCompany()->getCaptionRu())
                    ->addViolation();
            }
        }
    }

}