<?php
/**
 * Базовый класс для валидатора номера телефона
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
namespace Core\CommonBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Phone extends Constraint
{
    public $message = 'The string "%string%" must be a phone number format!';
}
