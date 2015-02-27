<?php

/**
 * Единица товара на складе
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\ExecutionContextInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="core_logistics_unit_in_stock")
 * @ORM\Entity(repositoryClass="Core\LogisticsBundle\Entity\Repository\UnitInStockRepository")
 * @Assert\Callback(methods={"isValid"})
 */
class UnitInStock {

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Поставка
     * @ORM\ManyToOne(targetEntity="Supply")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $supply;

    /**
     * Продукт из поставки к которому привязана единица
     * @ORM\ManyToOne(targetEntity="ProductInSupply", inversedBy="units")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $productInSupply;

    /**
     * Товар
     * @ORM\ManyToOne(targetEntity="Core\ProductBundle\Entity\CommonProduct", inversedBy="units")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $product;

    /**
     * MAC-адреса или Серийный номера
     * @var string
     * @ORM\OneToMany(targetEntity="UnitSerials", mappedBy="unit", cascade={"persist"})
     */
    private $serials;

    /**
     * Поставщик
     * @ORM\ManyToOne(targetEntity="Supplier")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     * @Assert\NotBlank()
     */
    private $supplier;

    /**
     * Продавец
     * @ORM\ManyToOne(targetEntity="Seller")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     * @Assert\NotBlank()
     */
    private $seller;

    /**
     * Склад
     * @var string
     * @ORM\ManyToOne(targetEntity="Stock", inversedBy="units")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $stock;
    
    /**
     * Время создания
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdDateTime;

    /**
     * Время обновления
     * @var \DateTime
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updatedDateTime;

    /**
     * Флаг, сигнализирующий что товар можно продать.  Фактически товар можно продавать, который есть в наличии
     * или в пути. Также бронь в заказах не влияет на этот флаг
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isCouldBeSold;

    /**
     * Списанная единица
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isWithDefect;

    /**
     * Причина списания
     * @var string
     * @ORM\ManyToOne(targetEntity="UnitInStockDefectReason")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $defectReason;

    /**
     * К какой композиции заказа принадлежит товарная единица после добавления серийников
     * @ORM\ManyToOne(targetEntity="Core\OrderBundle\Entity\Composition",  inversedBy="units")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $composition;

    /**
     * Флаг, который сигнализирует о том что товар виртуальный, т.е. реально товара на складе нет, а заводится
     * в нашей базе, чтобы такой товар можно было продавать под заказ
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true, options={"default"=true})
     */
    private $isVirtual;

    /**
     * Коментарии к единице товара
     * @var string
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $comments;

    public function __construct() {
        $this->serials = new ArrayCollection;
    }

    public function getId() {
        return $this->id;
    }

    public function getSupply() {
        return $this->supply;
    }

    public function setSupply($supply) {
        $this->supply = $supply;
        return $this;
    }

    public function getProductInSupply() {
        return $this->productInSupply;
    }

    public function setProductInSupply($productInSupply) {
        $this->productInSupply = $productInSupply;
        return $this;
    }

    public function getProduct() {
        return $this->product;
    }

    public function setProduct($product) {
        $this->product = $product;
        return $this;
    }

    public function getSerials() {
        return $this->serials;
    }

    public function setSerials($serials) {
        $this->serials = $serials;
        return $this;
    }

    public function addSerial($serial) {
        $serial->setUnit($this);
        $this->serials->add($serial);
        return $this;
    }

    public function removeSerial($serial) {
        $this->serials->removeElement($serial);
        return $this;
    }

    public function getSupplier() {
        return $this->supplier;
    }

    public function setSupplier($supplier) {
        $this->supplier = $supplier;
        return $this;
    }

    public function getSeller() {
        return $this->seller;
    }

    public function setSeller($seller) {
        $this->seller = $seller;
        return $this;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $stock;
        return $this;
    }

    public function getCreatedDateTime() {
        return $this->createdDateTime;
    }

    public function setCreatedDateTime($createdDateTime) {
        $this->createdDateTime = $createdDateTime;
        return $this;
    }

    public function getUpdatedDateTime() {
        return $this->updatedDateTime;
    }

    public function setUpdatedDateTime($updatedDateTime) {
        $this->updatedDateTime = $updatedDateTime;
        return $this;
    }

    public function getIsCouldBeSold() {
        return $this->isCouldBeSold;
    }

    public function setIsCouldBeSold($isCouldBeSold) {
        $this->isCouldBeSold = $isCouldBeSold;
        return $this;
    }

    public function getIsWithDefect() {
        return $this->isWithDefect;
    }

    public function setIsWithDefect($isWithDefect) {
        if ($isWithDefect) {
            $this->isCouldBeSold = false;  //выставляем флаг, можно ли продавать товар
        } else {
            $this->setDefectReason(null);
        }
        $this->isWithDefect = $isWithDefect;
        return $this;
    }

    public function getDefectReason() {
        return $this->defectReason;
    }

    public function setDefectReason($defectReason) {
        $this->defectReason = $defectReason;
        return $this;
    }

    public function getComposition() {
        return $this->composition;
    }

    public function setComposition($composition) {
        $this->composition = $composition;
        return $this;
    }

    public function getIsVirtual() {
        return $this->isVirtual;
    }

    public function setIsVirtual($isVirtual) {
        $this->isVirtual = $isVirtual;
        return $this;
    }

    public function getComments() {
        return $this->comments;
    }

    public function setComments($comments) {
        $this->comments = $comments;
        return $this;
    }

    /**
     * Дополнительные проверки
     */
    public function isValid(ExecutionContextInterface $context) {

        if (($this->getStock() || $this->getIsWithDefect()) && $this->getComposition() && $this->getComposition()->getOrder() && $this->getComposition()->getOrder()->getIsShippedStatus() && $this->getComposition()->getOrder()->getShippedDateTime() && !$this->getIsCouldBeSold()) {
            $msg = 'Чтобы вернуть или пометить как списанную товарную единицу необходимо для связного заказа убрать статус Отгружено.';
//            $context->addViolationAt('stock', $msg, array(), null);
            $context->buildViolation($msg)
                        ->addViolation();
        }


        if ($this->getIsWithDefect() && !$this->getDefectReason()) {
            $context->buildViolation('Укажите причину списания!')
                        ->atPath('isWithDefect')
                        ->addViolation();
        }


        //проверяем, чтобы списанный товар нельзя было продавать
        if ($this->getIsWithDefect() && $this->getIsCouldBeSold()) {
            $context->buildViolation('Если товарная единица помечена как списанная, то она не может быть помечена как доступная для продажи!')
                        ->atPath('isWithDefect')
                        ->addViolation();
        }

        if (!$this->getStock() && $this->getIsWithDefect()) {
            $context->buildViolation('Укажите склад!')
                        ->atPath('stock')
                        ->addViolation();
        }

        if (!$this->getStock() && $this->getIsCouldBeSold()) {
            $context->buildViolation('Укажите склад!')
                        ->atPath('stock')
                        ->addViolation();
        }

        if ($this->getIsWithDefect() && $this->getIsVirtual()) {
            $context->buildViolation('Виртуальную позицию нельзя пометить как списанную!')
                        ->atPath('isWithDefect')
                        ->addViolation();
        }

        //проверяем, чтобы серийных номеров ввели не больше чем нужно
        if ($this->getSerials()->count() > $this->getProduct()->getSerialsQuantity()) {
            $context->buildViolation('Серийных номеров для этого продукта не может быть указано больше чем :quantity шт.!')
                        ->atPath('serials')
                        ->setParameter(':quantity', $this->getProduct()->getSerialsQuantity())
                        ->addViolation();
        }
    }

}
