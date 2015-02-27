<?php
/**
 * Базовый класс для валидатора KPP
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
namespace Core\CommonBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class KPP extends Constraint
{
    public $message = 'The string "%string%" must be a KPP format!';
    
}
