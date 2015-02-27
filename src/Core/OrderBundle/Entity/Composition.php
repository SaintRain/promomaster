<?php

/**
 * Состав заказа
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Core\OrderBundle\Validator\Constraints as OrderAssert;    //дополнительные проверки

/**
 * @ORM\Table(name="core_order_composition")
 * @ORM\Entity(repositoryClass="Core\OrderBundle\Entity\Repository\CompositionRepository")
 * OrderAssert\CheckComposition
 */

class Composition {

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Товарная позиция
     * @ORM\ManyToOne(targetEntity="Core\ProductBundle\Entity\CommonProduct", inversedBy="inOrderCompositions")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $product;

    /**
     * Забронированные товары на складах
     * @ORM\OneToMany(targetEntity="ProductBooking", cascade={"persist"}, mappedBy="composition")
     */
    private $booking;

    /**
     * Заказ
     * @ORM\ManyToOne(targetEntity="Order", cascade={"persist"}, inversedBy="compositions")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $order;

    /**
     * Цена товара
     * @var decimal
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\NotBlank()
     */
    private $price;

    /**
     * Количество
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\GreaterThan(value = 0)
     * @Assert\NotBlank()
     */
    private $quantity;

    /**
     * Сумма НДС
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    private $ndsSum;

    /**
     * Полная стоимость товара с учетом скидки и количества
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    private $cost;

    /**
     * Значение скидки
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    private $discountValue;

    /**
     * Флаг определяющий, что значение скидки указано в процентах, иначе фиксировано в дефолтной валюте
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isDiscountValueInPercent;

    /**
     * Конкретные товарные единицы, которые закрепляются за композицией после внесения серийных номеров
     * @ORM\OneToMany(targetEntity="Core\LogisticsBundle\Entity\UnitInStock", cascade={"persist"}, mappedBy="composition")
     */
    private $units;

    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPosition;

    /**
     * Дефолтный поставщик продукта, если создаются автоматические реальные поставки
     * @ORM\ManyToOne(targetEntity="Core\LogisticsBundle\Entity\Supplier")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $defaultSupplier;

    public function getId() {
        return $this->id;
    }

    public function __construct() {
        $this->booking = new ArrayCollection();
        $this->units = new ArrayCollection;
    }

    public function getProduct() {
        return $this->product;
    }

    public function setProduct($product) {
        $this->product = $product;
        return $this;
    }

    public function getBooking() {
        return $this->booking;
    }

    public function setBooking($booking) {
        $this->booking = $booking;
        return $this;
    }

    public function addBooking($booking) {
        $booking->setComposition($this);
        $this->booking->add($booking);
        return $this;
    }

    public function removeBooking($booking) {
        $this->booking->removeElement($booking);
        return $this;
    }

    public function addUnit($unit) {
        $unit->setComposition($this);
        $this->units->add($unit);
        return $this;
    }

    public function removeUnit($unit) {
        $this->units->removeElement($unit);
        return $this;
    }

    public function getOrder() {
        return $this->order;
    }

    public function setOrder($order) {
        $this->order = $order;
        return $this;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
        return $this;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
        return $this;
    }

    public function getNdsSum() {
        return $this->ndsSum;
    }

    public function setNdsSum($ndsSum) {
        $this->ndsSum = $ndsSum;
        return $this;
    }

    public function getCost() {
        return $this->cost;
    }

    public function setCost($cost) {
        $this->cost = $cost;
        return $this;
    }

    public function getDiscountValue() {
        return $this->discountValue;
    }

    public function setDiscountValue($discountValue) {
        $this->discountValue = $discountValue;
        return $this;
    }

    public function getIsDiscountValueInPercent() {
        return $this->isDiscountValueInPercent;
    }

    public function setIsDiscountValueInPercent($isDiscountValueInPercent) {
        $this->isDiscountValueInPercent = $isDiscountValueInPercent;
        return $this;
    }

    public function getUnits() {
        return $this->units;
    }

    public function setUnits($units) {
        $this->units = $units;
        return $this;
    }

    public function getIndexPosition() {
        return $this->indexPosition;
    }

    public function setIndexPosition($indexPosition) {
        $this->indexPosition = $indexPosition;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefaultSupplier()
    {
        return $this->defaultSupplier;
    }

    /**
     * @param mixed $defaultSupplier
     * @return Composition
     */
    public function setDefaultSupplier($defaultSupplier)
    {
        $this->defaultSupplier = $defaultSupplier;
        return $this;
    }

    /**
     * Преобразуем к маиисиву для сравнения с оригинальным составом заказа
     * @param $fields - массив нужных полей
     * @return array
     */
    public function toCompareArray($fields)
    {
        $data = [];
        foreach($this as $key => $val) {
            if (isset($fields[$key])) {
                $data[$key] = $val;
            }
        }
        return [$this->product->getId() => $data];
    }

}
