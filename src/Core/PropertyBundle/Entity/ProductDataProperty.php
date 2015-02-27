<?php

/**
 * Назначенные значения характеристик товарам
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PropertyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="core_property_data_product")
 * @ORM\Entity(repositoryClass="Core\PropertyBundle\Entity\Repository\ProductDataPropertyRepository")
 */
class ProductDataProperty {

    /**
     * Первичный ключ
     * @var integer
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Товар
     * @ORM\ManyToOne(targetEntity="Core\ProductBundle\Entity\CommonProduct",  inversedBy="productDataProperty")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $product;

    /**
     * Значение из справочника
     * @ORM\ManyToOne(targetEntity="DataProperty",  inversedBy="productDataProperty")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $data;

    /**
     * Текстовое значение характеристики
     * @var string
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $value;

    /**
     * Числовое значение характеристики
     * @var string
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    private $valueNumeric;

    public function getId() {
        return $this->id;
    }

    public function getProduct() {
        return $this->product;
    }

    public function setProduct($product) {
        $this->product = $product;
        return $this;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
        return $this;
    }

    public function getValue() {
        return $this->value;
    }

    public function setValue($value) {
        $this->value = $value;
        return $this;
    }

    public function getValueNumeric() {
        return $this->valueNumeric;
    }

    public function setValueNumeric($valueNumeric) {
        $this->valueNumeric = $valueNumeric;
    }

}