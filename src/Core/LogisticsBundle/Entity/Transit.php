<?php

/**
 * Транзиты товаров между складами
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Core\CommonBundle\Validator\Constraints as CommonAssert;    //дополнительные проверки
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="core_logistics_transit")
 * @ORM\Entity(repositoryClass="Core\LogisticsBundle\Entity\Repository\TransitRepository")
 */
class Transit {

    //системные имена статусов
    const formedStatusName = 'upakovyvaietcia';
    const packedStatusName = 'upakovan';
    const onTheWayStatusName = 'v-puty';
    const completedStatusName = 'zaviershien';

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Со склада
     * @ORM\ManyToOne(targetEntity="Stock")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     * @Assert\NotBlank()
     */
    private $fromStock;

    /**
     * На  склад
     * @ORM\ManyToOne(targetEntity="Stock")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     * @Assert\NotBlank()
     */
    private $toStock;

    /**
     * Получатель
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     * @Assert\NotBlank()
     */
    private $recipient;

    /**
     * Способ доставки (ТК)
     * @ORM\ManyToOne(targetEntity="Core\DeliveryBundle\Entity\Service")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     * @Assert\NotBlank()
     */
    private $deliveryMethod;

    /**
     * Стоимость доставки
     * @var decimal
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     * @Assert\NotBlank()
     */
    private $deliveryCost;

    /**
     * Ориентировочная дата прихода
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $estimatedDateOfDelivery;

    /**
     * Транспортные накладные
     * @var text
     * @ORM\Column(type="text",  nullable=true)    
     */
    private $waybills;

    /**
     * Статус
     * @ORM\ManyToOne(targetEntity="TransitStatus")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $status;

    /**
     * Бронирование которое в транзит помещается
     * @ORM\OneToMany(targetEntity="Core\OrderBundle\Entity\ProductBooking", cascade={"persist"},  mappedBy="transit")
     */
    private $booking;

    /**
     * Товары, которые приехали с транзитом
     * @ORM\OneToMany(targetEntity="ProductInTransit", cascade={"persist"},  mappedBy="transit")
     */
    private $products;

    /**
     * Дата создания
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdDateTime;

    /**
     * Дата обновления
     * @var \DateTime
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updatedDateTime;

    /**
     * Флаг, который сигнализирует о том что транзит был завершен и продукция перенесена
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isTransitWasExecuted;

    public function __construct() {
        $this->products = new ArrayCollection;
    }

    public function getId() {
        return $this->id;
    }

    public function getFromStock() {
        return $this->fromStock;
    }

    public function setFromStock($fromStock) {
        $this->fromStock = $fromStock;
        return $this;
    }

    public function getToStock() {
        return $this->toStock;
    }

    public function setToStock($toStock) {
        $this->toStock = $toStock;
        return $this;
    }

    public function getRecipient() {
        return $this->recipient;
    }

    public function setRecipient($recipient) {
        $this->recipient = $recipient;
        return $this;
    }

    public function getDeliveryMethod() {
        return $this->deliveryMethod;
    }

    public function setDeliveryMethod($deliveryMethod) {
        $this->deliveryMethod = $deliveryMethod;
        return $this;
    }

    public function getDeliveryCost() {
        return $this->deliveryCost;
    }

    public function setDeliveryCost($deliveryCost) {
        $this->deliveryCost = $deliveryCost;
        return $this;
    }

    public function getEstimatedDateOfDelivery() {
        return $this->estimatedDateOfDelivery;
    }

    public function setEstimatedDateOfDelivery($estimatedDateOfDelivery) {
        $this->estimatedDateOfDelivery = $estimatedDateOfDelivery;
        return $this;
    }

    public function getWaybills() {
        return $this->waybills;
    }

    public function setWaybills($waybills) {
        $this->waybills = $waybills;
        return $this;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
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

    public function getBooking() {
        return $this->booking;
    }

    public function setBooking($booking) {
        $this->booking = $booking;
        return $this;
    }

    public function getProducts() {
        return $this->products;
    }

    public function setProducts($products) {
        $this->products = $products;
        return $this;
    }

    public function addProduct($product) {
        $product->setTransit($this);
        $this->products->add($product);
        return $this;
    }

    public function removeProduct($product) {
        $this->products->removeElement($product);
        return $this;
    }

    public function getIsTransitWasExecuted() {
        return $this->isTransitWasExecuted;
    }

    public function setIsTransitWasExecuted($isTransitWasExecuted) {
        $this->isTransitWasExecuted = $isTransitWasExecuted;
        return $this;
    }

}
