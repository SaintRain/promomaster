<?php

/**
 * Базовый класс валидатора
 * корректности введенных временных зон
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class TimeZone extends Constraint
{
    public $message = 'The value "%string%" is not correct time zone';
}
