<?php

/**
 * Наличие товара по складам.
 * Данные расчитываются динамически взависимости от поставок/заказов/статусов и т.д.
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\ExecutionContextInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="core_logistics_product_availability")
 * @ORM\Entity(repositoryClass="Core\LogisticsBundle\Entity\Repository\ProductAvailabilityRepository")
 */
class ProductAvailability {

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Товар
     * @ORM\ManyToOne(targetEntity="Core\ProductBundle\Entity\CommonProduct", inversedBy="productAvailability")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $product;

    /**
     * Склад
     * @ORM\ManyToOne(targetEntity="Stock")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $stock;

    /**
     * Доступное для продажи, не забронированное количество товара (реальные+виртуальные позиции+ реальные позиции, которые едут, но их еще нет в пути)
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $quantity;

    /**
     * Доступное для продажи, не забронированное количество виртуального товара (считаются позиции только с виртуальных поставок)
     * @ORM\Column(type="integer")
     */
    private $quantityVirtual;

    /**
     * Доступное для продажи, не забронированное количество виртуального товара из реальных поставок
     * @ORM\Column(type="integer")
     */
    private $quantityVirtualReal;

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

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $stock;
        return $this;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
        return $this;
    }

    public function getQuantityVirtual() {
        return $this->quantityVirtual;
    }

    public function setQuantityVirtual($quantityVirtual) {
        $this->quantityVirtual = $quantityVirtual;
        return $this;
    }

    public function getQuantityVirtualReal() {
        return $this->quantityVirtualReal;
    }

    public function setQuantityVirtualReal($quantityVirtualReal) {
        $this->quantityVirtualReal = $quantityVirtualReal;
    }

}
