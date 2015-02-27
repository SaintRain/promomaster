<?php

/**
 * Класс содержащий валидатор общих характеристик физических товаров
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Entity\Traits;

use Symfony\Component\Validator\ExecutionContextInterface;

trait PhysicalPropertiesValidator {

    /**
     * Дополнительные проверки
     */
    public function isValidProduct(ExecutionContextInterface $context) {

        if ($this->getIsPhysical()) {
            if ($this->getNetWeight() > $this->getGrossWeight()) {
                $context->buildViolation('Масса нетто не может превышать массу брутто!')
                        ->atPath('netWeight')
                        ->addViolation();
            }
            if (!$this->getLengthOfBox()) {
                $context->buildViolation('Не указана длина коробки!')
                        ->atPath('lengthOfBox')
                        ->addViolation();
            }
            if (!$this->getWidthOfBox()) {
                $context->buildViolation('Не указана ширина коробки!')
                        ->atPath('widthOfBox')
                        ->addViolation();
            }
            if (!$this->getHeightOfBox()) {
                $context->buildViolation('Не указана высота коробки!')
                        ->atPath('heightOfBox')
                        ->addViolation();
            }
            if (!$this->getGrossWeight()) {
                $context->buildViolation('Не указан вес брутто!')
                        ->atPath('grossWeight')
                        ->addViolation();
            }
            if ($this->getNetWeight() && $this->getIsNetWeightInGm() === NULL) {
                $context->buildViolation('Укажите единицу веса!')
                        ->atPath('isNetWeightInGm')
                        ->addViolation();
            }

            if ($this->getGrossWeight() && $this->getIsGrossWeightInGm() === NULL) {
                $context->buildViolation('Укажите единицу веса!')
                        ->atPath('isGrossWeightInGm')
                        ->addViolation();
            }
        }

        //НЕ УДЯЛТЬ!! ВРЕМЕННО ЗАКОММЕНТИРОВАЛИ
//        if ($this->lengthOfProduct > $this->lengthOfBox) {
//            $context->buildViolation('Длина продукта не может быть больше длины коробки!')
//                        ->atPath('lengthOfProduct')
//                        ->addViolation();
//          }
//          if ($this->widthOfProduct > $this->widthOfBox) {
//              $context->buildViolation('Ширина продукта не может быть больше ширины коробки!')
//                        ->atPath('widthOfProduct')
//                        ->addViolation();
//          }
//          if ($this->heightOfProduct > $this->heightOfBox) {
//              $context->buildViolation('Высота продукта не может быть больше высоты коробки!')
//                        ->atPath('heightOfProduct')
//                        ->addViolation();
//          }
//            if (!$this->netWeight) {
//                $context->buildViolation('Не указан вес нетто!')
//                        ->atPath('netWeight')
//                        ->addViolation();
//            }
//            if (!$this->grossWeight) {
//                $context->buildViolation('Не указан вес брутто!')
//                        ->atPath('grossWeight')
//                        ->addViolation();
//            }
//            if (!$this->lengthOfProduct) {
//                $context->buildViolation('Не указана длина продукта!')
//                        ->atPath('lengthOfProduct')
//                        ->addViolation();
//            }
//            if (!$this->widthOfProduct) {
//                $context->buildViolation('Не указана ширина продукта!')
//                        ->atPath('widthOfProduct')
//                        ->addViolation();
//            }
//            if (!$this->heightOfProduct) {
//                $context->buildViolation('Не указана высота продукта!')
//                        ->atPath('heightOfProduct')
//                        ->addViolation();
//            }
//            if (!$this->lengthOfBox) {
//                $context->buildViolation('Не указана длина коробки!')
//                        ->atPath('lengthOfBox')
//                        ->addViolation();
//            }
//            if (!$this->widthOfBox) {
//                $context->buildViolation('Не указана ширина коробки!')
//                        ->atPath('widthOfBox')
//                        ->addViolation();
//            }
//            if (!$this->heightOfBox) {
//                $context->buildViolation('Не указана высота коробки!')
//                        ->atPath('heightOfBox')
//                        ->addViolation();
//            }
    }

}
