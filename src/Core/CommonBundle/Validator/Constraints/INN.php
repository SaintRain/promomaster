<?php
/**
 * Базовый класс для валидатора ИНН
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
namespace Core\CommonBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class INN extends Constraint
{
    public $message = 'The string "%string%" must be a inn format!';
    public $legalPerson=true;   //взависимости от этого флага будет проверяться 10 или 12 символов для частного предпринимателя
    
}
