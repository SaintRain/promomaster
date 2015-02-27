<?php
/**
 * Базовый класс для валидатора массива email
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
namespace Core\CommonBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Emails extends Constraint
{
    public $message = 'The string "%string%" must be a email address format!';
    public $messageTwins = 'You can not add the same Emails!';
}
