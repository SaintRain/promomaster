<?php

/**
 * Поставки товаров
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Core\CommonBundle\Validator\Constraints as CommonAssert;    //дополнительные проверки
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\ExecutionContextInterface;

/**
 * @ORM\Table(name="core_logistics_supply")
 * @Assert\Callback(methods={"isValid"})
 * @ORM\Entity(repositoryClass="Core\LogisticsBundle\Entity\Repository\SupplyRepository")
 */
class Supply
{

    //системные имена статусов

    const suppliedStatusName = 'postavlieno-na-sklad';
    const formedStatusName = 'formiruietsia';
    const onTheWayStatusName = 'v-puty';

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Статус
     * @ORM\ManyToOne(targetEntity="SupplyStatus")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $status;

    /**
     * Дата поставки
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $dateTime;

    /**
     * Поставщик
     * @ORM\ManyToOne(targetEntity="Supplier")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $supplier;

    /**
     * Покупатель/Он же продавец
     * @ORM\ManyToOne(targetEntity="Seller")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $seller;

    /**
     * Принимающий склад
     * @ORM\ManyToOne(targetEntity="Stock")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $stock;

    /**
     * Страна поставки
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\Country")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $countryOfSupply;

    /**
     * Страна происхождения
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\Country")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $countryOfOrigin;

    /**
     * Номер gtd
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     *
     */
    private $gtdNumber;


    /**
     * Примечание
     * @var text
     * @ORM\Column(type="text", nullable=true)
     */
    private $note;

    /**
     * Товары в поставке
     * @ORM\OneToMany(targetEntity="ProductInSupply", cascade={"persist"}, mappedBy="supply",  orphanRemoval=true)
     */
    private $products;

    /**
     * Флаг, который сигнализирует о том были ли созданы товарный позиции на складе
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isProductUnitsWasCreated;

    /**
     * Флаг, который сигнализирует о том были ли виртуальные позиции обновлены в реальные
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isProductUnitsWasUpdated;

    /**
     * Флаг, который сигнализирует о том что поставка виртуальная, т.е. реально товар на склад не поставляется, а заводится
     * в нашей базе, чтобы такой товар можно было продавать под заказ
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isVirtual;

    /**
     * Дополнительные расходы
     * @ORM\OneToMany(targetEntity="AdditionalCostsOfSupply", cascade={"persist"}, mappedBy="supply",  orphanRemoval=true)
     */
    private $additionalCosts;

    /**
     * Связано с заказом
     * @ORM\ManyToOne(targetEntity="Core\OrderBundle\Entity\Order")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $order;

    /**
     * Сигнализирует о том, что поставка была создана для товара под заказ, чтобы сформировать заказ
     * @var boolean
     * @ORM\Column(type="boolean",  options={"default"=false})
     */
    private $isCreatedForOrderOnly=false;


    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->additionalCosts = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getDateTime()
    {
        return $this->dateTime;
    }

    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
        return $this;
    }

    public function getSupplier()
    {
        return $this->supplier;
    }

    public function setSupplier($supplier)
    {
        $this->supplier = $supplier;
        return $this;
    }

    public function getSeller()
    {
        return $this->seller;
    }

    public function setSeller($seller)
    {
        $this->seller = $seller;
        return $this;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
        return $this;
    }

    public function getCountryOfSupply()
    {
        return $this->countryOfSupply;
    }

    public function setCountryOfSupply($countryOfSupply)
    {
        $this->countryOfSupply = $countryOfSupply;
        return $this;
    }

    public function getCountryOfOrigin()
    {
        return $this->countryOfOrigin;
    }

    public function setCountryOfOrigin($countryOfOrigin)
    {
        $this->countryOfOrigin = $countryOfOrigin;
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

    public function getNote()
    {
        return $this->note;
    }

    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }

    public function addProduct($product)
    {
        $product->setSupply($this);
        $this->products->add($product);
        return $this;
    }

    public function removeProduct($product)
    {
        $this->products->removeElement($product);
        return $this;
    }

    public function getIsProductUnitsWasCreated()
    {
        return $this->isProductUnitsWasCreated;
    }

    public function setIsProductUnitsWasCreated($isProductUnitsWasCreated)
    {
        $this->isProductUnitsWasCreated = $isProductUnitsWasCreated;
        return $this;
    }

    public function getIsProductUnitsWasUpdated()
    {
        return $this->isProductUnitsWasUpdated;
    }

    public function setIsProductUnitsWasUpdated($isProductUnitsWasUpdated)
    {
        $this->isProductUnitsWasUpdated = $isProductUnitsWasUpdated;
        return $this;
    }

    public function getIsVirtual()
    {
        return $this->isVirtual;
    }

    public function setIsVirtual($isVirtual)
    {
        $this->isVirtual = $isVirtual;
        return $this;
    }

    public function getAdditionalCosts()
    {
        return $this->additionalCosts;
    }

    public function setAdditionalCosts($additionalCosts)
    {
        $this->additionalCosts = $additionalCosts;
    }

    public function addAdditionalCost($additionalCost)
    {
        $additionalCost->setSupply($this);
        $this->additionalCosts->add($additionalCost);
        return $this;
    }

    public function removeAdditionalCost($additionalCost)
    {
        $this->additionalCosts->removeElement($additionalCost);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     * @return Supply
     */
    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isIsCreatedForOrderOnly()
    {
        return $this->isCreatedForOrderOnly;
    }

    /**
     * @param boolean $isCreatedForOrderOnly
     * @return Supply
     */
    public function setIsCreatedForOrderOnly($isCreatedForOrderOnly)
    {
        $this->isCreatedForOrderOnly = $isCreatedForOrderOnly;
        return $this;
    }

    /**
     * Возвращает количество позиций товара
     * @return int
     */
    public function getProductsUnitsQuantity()
    {
        $quantity = 0;
        foreach ($this->products as $p) {
            $quantity += $p->getQuantity();
        }

        return $quantity;
    }

    /**
     * Возвращает стоимость всех единиц товара
     * @return int
     */
    public function getProductsUnitsCost()
    {
        $cost = 0;
        foreach ($this->products as $p) {
            $cost += $p->getQuantity() * (float)$p->getPriceInGeneralCurrency();

        }

        return $cost;
    }

    /**
     * Дополнительные проверки
     */
    public function isValid(ExecutionContextInterface $context)
    {
        if (!$this->getIsVirtual() && !$this->getSupplier()) {
            $context->buildViolation('Для реальной поставки нужно указать поставщика.')
                        ->atPath('supplier')
                        ->addViolation();
            $context->buildViolation('Для реальной поставки нужно указать поставщика.')
                        ->addViolation();
        }
    }


}
