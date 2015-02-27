<?php

/**
 * Валидатор проверки что введены другие данные пользователя
 * нежели те что в сессии храняться
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use FOS\UserBundle\Model\UserInterface;

class SameDataValidator extends ConstraintValidator
{
    private $security;
    private $encoderFactory;

    public function __construct(SecurityContext $security, EncoderFactoryInterface $encoderFactory)
    {
        $this->security = $security;
        $this->encoderFactory = $encoderFactory;
    }
    public function validate($value, Constraint $constraint)
    {
        $field = $this->context->getPropertyName();
        $result = $this->getValueForKey($field);
        $valueToMsg = $value;
        
        // пароль необходимо зашифровать для сравнения        
        if (strstr($field,'plain')) {
            $value = $this->encodePassword($value);
        }
        if ($result == $value) {
            $this->context->addViolation($constraint->message, array('%string%' => $valueToMsg));
        }
    }

    protected function getValueForKey($field) {
        $user = $this->security->getToken()->getUser();
        $method = 'get'.$field;
        if (strstr($field,'plain')) {
            $method = str_replace('plain', '', $method);
        }
        if (method_exists($user,$method)) {
            return $user->$method();
        }
        throw new \Exception('Method for user is not exist');
    }

    protected function encodePassword($value)
    {
        $user = $this->security->getToken()->getUser();
        $encoder =  $this->encoderFactory->getEncoder($user);
        $password = $encoder->encodePassword($value, $user->getSalt());
        return $password;
    }
}
