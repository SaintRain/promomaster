<?php

/**
 * Товарные позиции в поставке
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\ExecutionContextInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="core_logistics_product_in_supply")
 * @ORM\Entity(repositoryClass="Core\LogisticsBundle\Entity\Repository\ProductInSupplyRepository")
 */
class ProductInSupply
{

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
     * @ORM\ManyToOne(targetEntity="Core\ProductBundle\Entity\CommonProduct")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $product;

    /**
     * Валюта ГТД
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\Currency")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     * @Assert\NotBlank()
     */
    private $gtdCurrency;

    /**
     * Грузовая таможенная декларация
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $gtdNumber;

    /**
     * Цена поставки в валюте ГТД
     * @var decimal
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\NotBlank()
     */
    private $priceInGtdCurrency;

    /**
     * Цена поставки в основной валюте сайта (RUB)
     * @var decimal
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\NotBlank()
     */
    private $priceInGeneralCurrency;

    /**
     * Количество
     * @ORM\Column(type="integer")
     * @Assert\GreaterThan(value = 0)
     * @Assert\NotBlank()
     */
    private $quantity;

    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPosition;

    /**
     * Поставка
     * @ORM\ManyToOne(targetEntity="Supply", cascade={"persist"}, inversedBy="products")
     */
    private $supply;

    /**
     * Товарные позиции на складе
     * @ORM\OneToMany(targetEntity="Core\LogisticsBundle\Entity\UnitInStock", cascade={"persist"}, mappedBy="productInSupply")
     */
    private $units;
       
    /**
     * Себестоимость одной позиции
     * @var decimal
     * @ORM\Column(type="decimal", scale=2)
     */
    private $costPriceForOneUnit;


    /**
     * Надбавка для курса вылюты
     * @var decimal
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    private $OOPBCurrencyRateAdditive = 2;

    /**
     * Если выставлено, значит надбавка для курса валюты считается в процентах
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isOOPBCurrencyRateAdditiveInPercent = true;


    public function __construct()
    {
        $this->units = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    public function getGtdCurrency()
    {
        return $this->gtdCurrency;
    }

    public function setGtdCurrency($gtdCurrency)
    {
        $this->gtdCurrency = $gtdCurrency;
        return $this;
    }

    public function getGtdNumber()
    {
        return $this->gtdNumber;
    }

    public function setGtdNumber($gtdNumber)
    {
        $this->gtdNumber = $gtdNumber;
        return $this;
    }

    public function getPriceInGtdCurrency()
    {
        return $this->priceInGtdCurrency;
    }

    public function setPriceInGtdCurrency($priceInGtdCurrency)
    {
        $this->priceInGtdCurrency = $priceInGtdCurrency;
        return $this;
    }

    public function getPriceInGeneralCurrency()
    {
        return $this->priceInGeneralCurrency;
    }

    public function setPriceInGeneralCurrency($priceInGeneralCurrency)
    {
        $this->priceInGeneralCurrency = $priceInGeneralCurrency;
        return $this;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getIndexPosition()
    {
        return $this->indexPosition;
    }

    public function setIndexPosition($indexPosition)
    {
        $this->indexPosition = $indexPosition;
        return $this;
    }

    public function getSupply()
    {
        return $this->supply;
    }

    public function setSupply($supply)
    {
        $this->supply = $supply;
        return $this;
    }

    public function getUnits()
    {
        return $this->units;
    }

    public function setUnits($units)
    {
        $this->units = $units;
        return $this;
    }
    
    public function getCostPriceForOneUnit() {
        return $this->costPriceForOneUnit;
    }    

    public function setCostPriceForOneUnit($costPriceForOneUnit) {
        $this->costPriceForOneUnit = $costPriceForOneUnit;
    }

    /**
     * @return decimal
     */
    public function getOOPBCurrencyRateAdditive()
    {
        return $this->OOPBCurrencyRateAdditive;
    }

    /**
     * @param decimal $OOPBCurrencyRateAdditive
     * @return ProductInSupply
     */
    public function setOOPBCurrencyRateAdditive($OOPBCurrencyRateAdditive)
    {
        $this->OOPBCurrencyRateAdditive = $OOPBCurrencyRateAdditive;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsOOPBCurrencyRateAdditiveInPercent()
    {
        return $this->isOOPBCurrencyRateAdditiveInPercent;
    }

    /**
     * @param boolean $isOOPBCurrencyRateAdditiveInPercent
     * @return ProductInSupply
     */
    public function setIsOOPBCurrencyRateAdditiveInPercent($isOOPBCurrencyRateAdditiveInPercent)
    {
        $this->isOOPBCurrencyRateAdditiveInPercent = $isOOPBCurrencyRateAdditiveInPercent;
        return $this;
    }


}
