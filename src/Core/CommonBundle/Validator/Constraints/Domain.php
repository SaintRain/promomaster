<?php
/**
 * Базовый класс для валидатора доменного имени
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
namespace Core\CommonBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Domain extends Constraint
{
    public $message = 'The string "%string%" must be a domain name format!';
}
