<?php

/**
 * Валидатор проверяет правильность ОГРН
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class OGRNValidator extends ConstraintValidator {

    public function validate($value, Constraint $constraint) {
        if ($value !== null) {
            if (!$this->validateOgrn($value)) {
                $this->context->addViolation($constraint->message, array('%string%' => $value));
            }
        }
    }

    /**
     * Метод выполняет проверку 13-значного ОГРН или 15-значного ОГРНИП
     * стандартному алгоритму
     * @param $value - значение 13-значного ОГРН или 15-значного ОГРНИП
     * @return string $msg - в случае успеха ничего не возвращает
     * в случае ошибки возвращает сообщение об ошибке
     */
    protected function validateOgrn($value) {
        if (strlen($value) == 13) {
            $check = substr($value, 0, 12); // просто написать % для определения остатка тут не получилось
            $checkValue1 = $check / 11; // видать php на больших числах считает остаток не точно.
            $checkValue = $check - (floor($checkValue1)) * 11;
            $controlValue = substr($value, 12);
        } elseif (strlen($value) == 15) {
            $check = substr($value, 0, 14);
            $checkValue1 = $check / 13;
            $checkValue = $check - (floor($checkValue1)) * 13;
            $controlValue = substr($value, 14);

        } else {
            //  'Ошибка. ОГРН должен содержать 13 или 15 символов');
            return false;
        }

        if ($checkValue > 9) {
            $checkValue = substr($checkValue, 1);
        }

        if ($checkValue == $controlValue) {
                        
            return true;
        } else {
            //"Ошибка. Неверный ОГРН.");
            return false;
        }
    }

}