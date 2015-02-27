<?php

/**
 * Базовый класс валидатора
 * проверки что введены другие данные пользователя
 * нежели те что в сессии храняться
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class SameData extends Constraint
{
    public $message = 'The value is the same';

    public function validatedBy()
    {
        return 'application_user_same_data';
    }
}
