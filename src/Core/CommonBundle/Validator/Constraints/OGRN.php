<?php
/**
 * Базовый класс для валидатора ОГРН
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
namespace Core\CommonBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class OGRN extends Constraint
{
    public $message = 'The string "%string%" must be a OGRN format!';
    
}
