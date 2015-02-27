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
class Phones extends Constraint
{
    public $message = 'worksheet.phone.format';
    public $messageTwins = 'You can not add the same phones!';
}
