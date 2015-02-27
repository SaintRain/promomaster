<?php

/**
 * Класс содержащий общие характеристики для физических товаров
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Entity\Traits;
use Symfony\Component\Validator\ExecutionContextInterface;
trait PhysicalProperties {

    /**
     * Вес нетто
     * @var decimal
     * @ORM\Column(type="decimal", scale=3, nullable=true)
     * Assert\NotBlank()
     */
    private $netWeight;

    /**
     * Флаг, определяющий что вес нетто указан в граммах, иначе в килограммах
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isNetWeightInGm = true;

    /**
     * Вес брутто
     * @var decimal
     * @ORM\Column(type="decimal", scale=3, nullable=true)
     * Assert\NotBlank()
     */
    private $grossWeight;

    /**
     * Флаг, определяющий что вес брутто указан в граммах, иначе в килограммах
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isGrossWeightInGm = true;

    /**
     * Длина продукта в мм
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     * Assert\NotBlank()
     */
    private $lengthOfProduct;

    /**
     * Ширина продукта в мм
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     * Assert\NotBlank()
     */
    private $widthOfProduct;

    /**
     * Высота продукта в мм
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     * Assert\NotBlank()
     */
    private $heightOfProduct;

    /**
     * Длина коробки в мм
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     * Assert\NotBlank()
     */
    private $lengthOfBox;

    /**
     * Ширина коробки в мм
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     * Assert\NotBlank()
     */
    private $widthOfBox;

    /**
     * Высота коробки в мм
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     * Assert\NotBlank()
     */
    private $heightOfBox;

    public function getNetWeight() {
        return $this->netWeight;
    }

    public function setNetWeight($netWeight) {
        $this->netWeight = $netWeight;
        return $this;
    }

    public function getIsNetWeightInGm() {
        return $this->isNetWeightInGm;
    }

    public function setIsNetWeightInGm($isNetWeightInGm) {
        $this->isNetWeightInGm = $isNetWeightInGm;
        return $this;
    }

    public function getGrossWeight() {
        return $this->grossWeight;
    }

    public function setGrossWeight($grossWeight) {
        $this->grossWeight = $grossWeight;
        return $this;
    }

    public function getIsGrossWeightInGm() {
        return $this->isGrossWeightInGm;
    }

    public function setIsGrossWeightInGm($isGrossWeightInGm) {
        $this->isGrossWeightInGm = $isGrossWeightInGm;
        return $this;
    }

    public function getLengthOfProduct() {
        return $this->lengthOfProduct;
    }

    public function setLengthOfProduct($lengthOfProduct) {
        $this->lengthOfProduct = $lengthOfProduct;
        return $this;
    }

    public function getWidthOfProduct() {
        return $this->widthOfProduct;
    }

    public function setWidthOfProduct($widthOfProduct) {
        $this->widthOfProduct = $widthOfProduct;
        return $this;
    }

    public function getHeightOfProduct() {
        return $this->heightOfProduct;
    }

    public function setHeightOfProduct($heightOfProduct) {
        $this->heightOfProduct = $heightOfProduct;
        return $this;
    }

    public function getLengthOfBox() {
        return $this->lengthOfBox;
    }

    public function setLengthOfBox($lengthOfBox) {
        $this->lengthOfBox = $lengthOfBox;
        return $this;
    }

    public function getWidthOfBox() {
        return $this->widthOfBox;
    }

    public function setWidthOfBox($widthOfBox) {
        $this->widthOfBox = $widthOfBox;
        return $this;
    }

    public function getHeightOfBox() {
        return $this->heightOfBox;
    }

    public function setHeightOfBox($heightOfBox) {
        $this->heightOfBox = $heightOfBox;
        return $this;
    }



}
