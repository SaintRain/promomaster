<?php

/**
 * Бизнесс логика для управления модификациями продукта
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Logic;

use Doctrine\Common\Collections\ArrayCollection;
use Core\ProductBundle\Entity\Product;
use Core\ProductBundle\Entity\CompositeProduct;

class CompositeProductLogic {

    private $em;

    public function __construct($em) {
        $this->em = $em;
    }

    /**
     * Вычисляет информацию о весе и размере для составного продукта
     * @param type $obj
     */
    public function computeWeightInfo($obj, $type) {
        $netWeight = 0;
        $grossWeight = 0;
        $lengthOfProduct = 0;
        $widthOfProduct = 0;
        $heightOfProduct = 0;
        $lengthOfBox = 0;
        $widthOfBox = 0;
        $heightOfBox = 0;
        $product = $obj->getMappedObject();

        //учитываем только физические товары
        if ($product instanceof Product || ($product instanceof CompositeProduct && $product->getIsPhysical())) {
            foreach ($product->getCompositions() as $c) {
                if ($c instanceof Product || ($c instanceof CompositeProduct && $c->getIsPhysical())) {
                    $this->computeWeightInfoOneRecord($netWeight, $grossWeight, $lengthOfProduct, $widthOfProduct, $heightOfProduct, $lengthOfBox, $widthOfBox, $heightOfBox, $c);
                }
            }
            if ($type == 'postPersist') {
                $this->computeWeightInfoOneRecord($netWeight, $grossWeight, $lengthOfProduct, $widthOfProduct, $heightOfProduct, $lengthOfBox, $widthOfBox, $heightOfBox, $obj);
            }

            //проставляем новые значения
            $product->setNetWeight($netWeight)
                    ->setIsNetWeightInGm(false)
                    ->setGrossWeight($grossWeight)
                    ->setIsGrossWeightInGm(false)
                    ->setLengthOfProduct($lengthOfProduct)
                    ->setWidthOfProduct($widthOfProduct)
                    ->setHeightOfProduct($heightOfProduct)
                    ->setLengthOfBox($lengthOfBox)
                    ->setWidthOfBox($widthOfBox)
                    ->setHeightOfBox($heightOfBox)
            ;

            $isPersisted = \Doctrine\ORM\UnitOfWork::STATE_MANAGED === $this->em->getUnitOfWork()->getEntityState($product);

            if (!$isPersisted) {
                
            } else {
                $this->em->flush($product);
            }
        }
    }

    /**
     * Просчитываем вес и размер по одной товварной позиции с учетом количества
     * @param type $netWeight
     * @param type $grossWeight
     * @param type $lengthOfProduct
     * @param type $widthOfProduct
     * @param type $heightOfProduct
     * @param type $lengthOfBox
     * @param type $widthOfBox
     * @param type $heightOfBox
     * @param type $c
     */
    public function computeWeightInfoOneRecord(&$netWeight, &$grossWeight, &$lengthOfProduct, &$widthOfProduct, &$heightOfProduct, &$lengthOfBox, &$widthOfBox, &$heightOfBox, $c) {
        $target = $c->getTargetObject();
        //считаем в кг
        $netWeight+=($target->getNetWeight() / ($target->getIsNetWeightInGm() ? 1000 : 1)) * $c->getQuantity();
        $grossWeight+=($target->getGrossWeight() / ($target->getIsGrossWeightInGm() ? 1000 : 1)) * $c->getQuantity();

        $lengthOfProduct+=$target->getLengthOfProduct() * $c->getQuantity();
        $widthOfProduct+=$target->getWidthOfProduct() * $c->getQuantity();
        $heightOfProduct+=$target->getHeightOfProduct() * $c->getQuantity();
        $lengthOfBox+=$target->getLengthOfBox() * $c->getQuantity();
        $widthOfBox+=$target->getWidthOfBox() * $c->getQuantity();
        $heightOfBox+=$target->getHeightOfBox() * $c->getQuantity();
    }

}

