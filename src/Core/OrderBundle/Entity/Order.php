<?php

/**
 * Сущность заказов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\ExecutionContextInterface;
use Core\OrderBundle\Validator\Constraints as OrderAssert;    //дополнительные проверки
use Core\ProductBundle\Entity\DigitalProduct;
use Core\ProductBundle\Entity\ServiceProduct;
use Application\Sonata\UserBundle\Entity\LegalContragent;
use Core\DeliveryBundle\Entity\ServiceWithAddress;
use Core\DeliveryBundle\Entity\ServiceInCity;

/**
 * @ORM\Table(name="core_order")
 * @ORM\Entity(repositoryClass="Core\OrderBundle\Entity\Repository\OrderRepository")
 * @ORM\HasLifecycleCallbacks
 * @Assert\Callback(methods={"extraModifyFields","isValid"})
 * @OrderAssert\OrderExtra
 */
class Order {

    /**
     * Возможновы варианты отмены для заказа
     */
    const returnCanceledReasonName = 'return';
    const reorderCanceledReasonName = 'reorder';
    const otherCanceledReasonName = 'other';

    /**
     * Первичный ключ
     * @var bigint
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Время создания
     * @var datetime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdDateTime;

    /**
     * Время оплаты
     * @var datetime
     * @ORM\Column(type="datetime",  nullable=true)
     */
    private $paidDateTime;

    /**
     * Время отгрузки
     * @var datetime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $shippedDateTime;

    /**
     * Время проверки
     * @var datetime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $checkedDateTime;

    /**
     * Время отмены
     * @var datetime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $canceledDateTime;

    /**
     * Время обновления
     * @var datetime
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updatedDateTime;

    /**
     * Время выполения заказа
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $executedDateTime;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default" = 0})
     * @var boolean
     */
    private $isExecutedMsgSend = 0;

    /**
     * Время последней отправки на email заказчика счета на оплату
     * @var datetime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $sendInvoiceForPaymentToEmailDateTime;

    /**
     * Начальное время добавления серийников. От этого времени стартует дата гарантийки
     * @var datetime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $serialsAddStartDateTime;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\CommonContragent", inversedBy="orders")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $contragent;

    /**
     * Примечание
     * @var text
     * @ORM\Column(type="text", nullable=true)
     */
    private $note;

    /**
     * Статус заказа ПРОВЕРЕН
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isCheckedStatus;

    /**
     * Статус заказа ОПЛАЧЕН
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isPaidStatus;

    /**
     * Статус заказа ОТГРУЖЕН
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isShippedStatus;

    /**
     * Статус заказа ОТМЕНЁН
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isCanceledStatus;

    /**
     * Отправлять уведомление заказчику, если выставили Статус заказа ПРОВЕРЕН
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true, options={"default" = 1})
     */
    private $isCheckedStatusSend = true;

    /**
     * Отправлять уведомление заказчику, если выставили Статус заказа ОПЛАЧЕН
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true, options={"default" = 1})
     */
    private $isPaidStatusSend = true;

    /**
     * Отправлять уведомление заказчику, если выставили Статус заказа ОТГРУЖЕН
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true, options={"default" = 1})
     */
    private $isShippedStatusSend = true;

    /**
     * Отправлять уведомление заказчику, если выставили Статус заказа ОТМЕНЁН
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true, options={"default" = 1})
     */
    private $isCanceledStatusSend = true;

    /**
     * ID договора поставки из 1C
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $deliveryAgreement1C;

    /**
     * ID трансп. накладной из 1С
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $waybill1C;

    /**
     * ID счета-фактуры из 1С
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $invoice1C;

    /**
     * Состав заказа
     * @ORM\OneToMany(targetEntity="Composition", cascade={"persist"},  mappedBy="order", orphanRemoval=true)
     * @ORM\OrderBy({"indexPosition"="ASC"})
     * @Assert\NotBlank()
     */
    private $compositions;

    /**
     * Транспортные накладные
     * @ORM\OneToMany(targetEntity="Waybills", cascade={"persist"},  mappedBy="order", orphanRemoval=true)
     * @ORM\OrderBy({"indexPosition"="ASC"})
     */
    private $waybills;

    /**
     * Продавец
     * @ORM\ManyToOne(targetEntity="Core\LogisticsBundle\Entity\Seller")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $seller;

    /**
     * Главный склад
     * @ORM\ManyToOne(targetEntity="Core\LogisticsBundle\Entity\Stock")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $stock;

    /**
     * Комментарий заказчика
     * @var text
     * @ORM\Column(type="text", nullable=true)
     */
    private $comments;

    /**
     * Сканы платёжных документов
     * @ORM\ManyToMany(targetEntity="Core\FileBundle\Entity\DocumentFile", cascade={"persist"})
     * @ORM\JoinTable(name="core_file_document_scans_match_document")
     * @ORM\OrderBy({"indexPosition" = "ASC"})
     */
    private $documentScans;

    /**
     * Упаковал
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $packedBy;

    /**
     * Проверил упаковку
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $checkedBy;

    /**
     * Способ доставки (ТК)
     * @ORM\ManyToOne(targetEntity="Core\DeliveryBundle\Entity\Service")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     * Assert\NotBlank()
     */
    private $deliveryMethod;

    /**
     * Адрес доставки
     * @ORM\Column(type="text", nullable=true)
     */
    private $deliveryAddress;

    /**
     * Почтовый индекс для доставки
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $deliveryPostcode;

    /**
     * Город доставки
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\City")
     * @ORM\JoinColumn(referencedColumnName="id")
     * Assert\NotBlank()
     */
    private $deliveryCity;

    /**
     * Расчитанная стоимость доставки
     * @var decimal
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     * @ Assert\NotBlank()
     */
    private $deliveryPrice;

    /**
     * Фактическа стоимость доставки, прибавляется к стоимости заказа
     * @var decimal
     * @ORM\Column(type="decimal", scale=2)
     * Assert\NotBlank()
     */
    private $deliveryCost = 0;

    /**
     * Пункт выдачи товара
     * @ORM\ManyToOne(targetEntity="Core\DeliveryBundle\Entity\Address")
     * @ORM\JoinColumn(name="delivery_point_id", referencedColumnName="id", onDelete="RESTRICT")
     */
    private $deliveryPoint;

    /**
     * Включена ли доставка в оплату заказа
     * @ORM\Column(type="boolean")
     */
    private $isDeliveryIncludedInPayment = true;

    /**
     * Связанные заказы
     * @ORM\OneToMany(targetEntity="Core\UnionBundle\Entity\OrderConnectedUnion", cascade={"persist"}, mappedBy="mappedObject")
     */
    private $ordersConnected;

    /**
     * Ставка налога НДС в %
     * @ORM\Column(type="smallint")
     */
    private $ndsTax = 0;

    /**
     * Комментарии заказа
     * @ORM\OneToMany(targetEntity="AdminCommentToOrder", cascade={"persist"}, mappedBy="order")
     */
    private $adminComments;

    /**
     * Пользователи, которые подписаны на обновление коментариев
     * @ORM\ManyToMany(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinTable(name="core_order_admin_comments_match_user")
     */
    private $subscribersOnAdminComments;

    /**
     * Тикеты
     * @ORM\OneToMany(targetEntity="Core\TroubleTicketBundle\Entity\TroubleTicket", cascade={"persist"}, mappedBy="order")
     */
    private $tickets;

    /**
     * Выбранная причина отмены
     * @ORM\ManyToOne(targetEntity="CanceledReason")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $reasonForCanceling;

    /**
     * Склад, на который возвращается весь товар после отмены отгруженного заказа
     * @ORM\ManyToOne(targetEntity="Core\LogisticsBundle\Entity\Stock")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $stockForCanceling;

    /**
     * Комментарий к причине отмены
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentForCanceling;

    /**
     * Если заказ был оплачен, то сколько удержать из оплаченных денег перед возвратом на баланс пользователю
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    private $keepMoneySumForCanceling;

    /**
     * Дополнительные статусы, которые ни на что не влияют
     * @ORM\ManyToOne(targetEntity="ExtraStatus")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @ORM\OrderBy({"indexPosition"="ASC"})
     */
    private $extraStatus;

    /**
     * Запоминает при отмене для отгруженного заказа информацию о заказе
     * @ORM\Column(type="text", nullable=true)
     */
    private $shippedOrderInfoHistory;

    /**
     * Полная стоимость заказа в дефолтной валюте
     * @var decimal
     * @ORM\Column(type="decimal", scale=2)
     */
    private $cost = 0;

    /**
     * ФИО получателя
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $recipientFio;

    /**
     * Компания получателя
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $recipientCompany;

    /**
     * Компания получателя
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $recipientPhone;

    /**
     * Email получателя
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $recipientEmail;

    /**
     * Примечание получателя
     * @ORM\Column(type="text", nullable=true)
     */
    private $recipientNote;

    /**
     * Паспорт получателя
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $recipientPassport;

    /**
     * ФИО контрагента, запоминаем, вдруг потом изменится вконтрагенте
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $contragentFio;

    /**
     * Компания контрагента, запоминаем, вдруг потом изменится вконтрагенте
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $contragentCompany;

    /**
     * Платежи
     * @ORM\OneToMany(targetEntity="Core\PaymentBundle\Entity\Payment", cascade={"persist"}, mappedBy="order")
     * @ORM\OrderBy({"updatedAt"="DESC"})
     */
    private $payments;

    /**
     * Флаг сигнализирующий о том, что пользователю было отправлено письмо, что заказ создан и проверен
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true, options={"default" = 0})
     */
    private $isOrderCreatedSendMail;

    /**
     * Показывать ли заказ в ЛК пользователя
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true, options={"default" = 1})
     */
    private $isShowOnFontend;
     
    public function __construct() {
        $this->compositions = new ArrayCollection();
        $this->waybills = new ArrayCollection();
        //$this->sizesOfBox = new ArrayCollection();
        $this->documentScans = new ArrayCollection();
        $this->ordersConnected = new ArrayCollection();
        $this->adminComments = new ArrayCollection();
        $this->subscribersOnAdminComments = new ArrayCollection();
        $this->tickets = new ArrayCollection();
        $this->payments = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function getCreatedDateTime() {
        return $this->createdDateTime;
    }

    public function setCreatedDateTime($createdDateTime) {
        $this->createdDateTime = $createdDateTime;
        return $this;
    }

    public function getPaidDateTime() {
        return $this->paidDateTime;
    }

    public function setPaidDateTime($paidDateTime) {
        $this->paidDateTime = $paidDateTime;
        return $this;
    }

    public function getShippedDateTime() {
        return $this->shippedDateTime;
    }

    public function setShippedDateTime($shippedDateTime) {
        $this->shippedDateTime = $shippedDateTime;
        return $this;
    }

    public function getCheckedDateTime() {
        return $this->checkedDateTime;
    }

    public function setCheckedDateTime($checkedDateTime) {
        $this->checkedDateTime = $checkedDateTime;
        return $this;
    }

    public function getCanceledDateTime() {
        return $this->canceledDateTime;
    }

    public function setCanceledDateTime($canceledDateTime) {
        $this->canceledDateTime = $canceledDateTime;
        return $this;
    }

    public function getUpdatedDateTime() {
        return $this->updatedDateTime;
    }

    public function setUpdatedDateTime($updatedDateTime) {
        $this->updatedDateTime = $updatedDateTime;
        return $this;
    }

    public function getExecutedDateTime()
    {
        return $this->executedDateTime;
    }

    public function setExecutedDateTime($executedDateTime)
    {
        $this->executedDateTime = $executedDateTime;
        return $this;
    }
    public function getIsExecutedMsgSend()
    {
        return $this->isExecutedMsgSend;
    }

    public function setIsExecutedMsgSend($isExecutedMsgSend)
    {
        $this->isExecutedMsgSend = $isExecutedMsgSend;
        return $this;
    }

    public function getSendInvoiceForPaymentToEmailDateTime() {
        return $this->sendInvoiceForPaymentToEmailDateTime;
    }

    public function setSendInvoiceForPaymentToEmailDateTime($sendInvoiceForPaymentToEmailDateTime) {
        $this->sendInvoiceForPaymentToEmailDateTime = $sendInvoiceForPaymentToEmailDateTime;
        return $this;
    }

    public function getSerialsAddStartDateTime() {
        return $this->serialsAddStartDateTime;
    }

    public function setSerialsAddStartDateTime($serialsAddStartDateTime) {
        $this->serialsAddStartDateTime = $serialsAddStartDateTime;
        return $this;
    }

    public function getContragent() {
        return $this->contragent;
    }

    public function setContragent($contragent) {
        $this->contragent = $contragent;
        return $this;
    }

    public function getNote() {
        return $this->note;
    }

    public function setNote($note) {
        $this->note = $note;
        return $this;
    }

    public function getIsCheckedStatus() {
        return $this->isCheckedStatus;
    }

    public function setIsCheckedStatus($isCheckedStatus) {
        if ($isCheckedStatus) {
            $this->checkedDateTime = new \DateTime();
        }
        $this->isCheckedStatus = $isCheckedStatus;
        return $this;
    }

    public function getIsPaidStatus() {
        return $this->isPaidStatus;
    }

    public function setIsPaidStatus($isPaidStatus) {
        if ($isPaidStatus) {
            $this->paidDateTime = new \DateTime();
        }
        $this->isPaidStatus = $isPaidStatus;
        return $this;
    }

    public function getIsShippedStatus() {
        return $this->isShippedStatus;
    }

    public function setIsShippedStatus($isShippedStatus) {
        if ($isShippedStatus) {
            $this->shippedDateTime = new \DateTime();
        }
        $this->isShippedStatus = $isShippedStatus;
        return $this;
    }

    public function getIsCanceledStatus() {
        return $this->isCanceledStatus;
    }

    public function setIsCanceledStatus($isCanceledStatus) {
        if ($isCanceledStatus) {
            $this->canceledDateTime = new \DateTime();
        } else if (!$isCanceledStatus) {
            //обнуляем поля причины отмены
            $this->reasonForCanceling = NULL;
            $this->commentForCanceling = NULL;
            $this->keepMoneySumForCanceling = NULL;
            $this->stockForCanceling = NULL;
        }
        $this->isCanceledStatus = $isCanceledStatus;
        return $this;
    }

    public function getIsCheckedStatusSend() {
        return $this->isCheckedStatusSend;
    }

    public function getIsPaidStatusSend() {
        return $this->isPaidStatusSend;
    }

    public function getIsShippedStatusSend() {
        return $this->isShippedStatusSend;
    }

    public function getIsCanceledStatusSend() {
        return $this->isCanceledStatusSend;
    }

    public function setIsCheckedStatusSend($isCheckedStatusSend) {
        $this->isCheckedStatusSend = $isCheckedStatusSend;
    }

    public function setIsPaidStatusSend($isPaidStatusSend) {
        $this->isPaidStatusSend = $isPaidStatusSend;
    }

    public function setIsShippedStatusSend($isShippedStatusSend) {
        $this->isShippedStatusSend = $isShippedStatusSend;
    }

    public function setIsCanceledStatusSend($isCanceledStatusSend) {
        $this->isCanceledStatusSend = $isCanceledStatusSend;
    }

    public function getDeliveryAgreement1C() {
        return $this->deliveryAgreement1C;
    }

    public function getWaybill1C() {
        return $this->waybill1C;
    }

    public function getInvoice1C() {
        return $this->invoice1C;
    }

    public function setDeliveryAgreement1C($deliveryAgreement1C) {
        $this->deliveryAgreement1C = $deliveryAgreement1C;
        return $this;
    }

    public function setWaybill1C($waybill1C) {
        $this->waybill1C = $waybill1C;
        return $this;
    }

    public function setInvoice1C($invoice1C) {
        $this->invoice1C = $invoice1C;
        return $this;
    }

    public function getCompositions() {
        return $this->compositions;
    }

    public function setCompositions($compositions) {
        $this->compositions = $compositions;
        return $this;
    }

    public function addComposition($composition) {
        $composition->setOrder($this);
        $this->compositions->add($composition);
        return $this;
    }

    public function removeComposition($composition) {
        $this->compositions->removeElement($composition);
        return $this;
    }

    public function getWaybills() {
        return $this->waybills;
    }

    public function setWaybills($waybills) {
        $this->waybills = $waybills;
        return $this;
    }

    public function addWaybill(Waybills $waybill) {
        if (!$this->waybills->contains($waybill)) {
            $this->waybills->add($waybill);
            $waybill->setOrder($this);
        }

        return $this;
    }

    public function removeWaybill($waybill) {
        $this->waybills->removeElement($waybill);
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

    public function getComments() {
        return $this->comments;
    }

    public function setComments($comments) {
        $this->comments = $comments;
        return $this;
    }

    public function getDocumentScans() {
        return $this->documentScans;
    }

    public function setDocumentScans($documentScans) {
        $this->documentScans = $documentScans;
        return $this;
    }

    public function addDocumentScans($documentScan) {
        $this->documentScans->add($documentScan);
        return $this;
    }

    public function removeDocumentScans($documentScan) {
        $this->documentScans->removeElement($documentScan);
        return $this;
    }

    public function getPackedBy() {
        return $this->packedBy;
    }

    public function setPackedBy($packedBy) {
        $this->packedBy = $packedBy;
        return $this;
    }

    public function getCheckedBy() {
        return $this->checkedBy;
    }

    public function setCheckedBy($checkedBy) {
        $this->checkedBy = $checkedBy;
        return $this;
    }

    public function getDeliveryMethod() {
        return $this->deliveryMethod;
    }

    public function setDeliveryMethod($deliveryMethod) {
        $this->deliveryMethod = $deliveryMethod;
        return $this;
    }

    public function getDeliveryAddress() {
        return $this->deliveryAddress;
    }

    public function setDeliveryAddress($deliveryAddress) {
        $this->deliveryAddress = $deliveryAddress;
        return $this;
    }

    public function getDeliveryPostcode() {
        return $this->deliveryPostcode;
    }

    public function setDeliveryPostcode($deliveryPostcode) {
        $this->deliveryPostcode = $deliveryPostcode;
        return $this;
    }

    public function getDeliveryCity() {
        return $this->deliveryCity;
    }

    public function setDeliveryCity($deliveryCity) {
        $this->deliveryCity = $deliveryCity;
        return $this;
    }

    public function getDeliveryCost() {
        return $this->deliveryCost;
    }

    public function setDeliveryCost($deliveryCost) {
        $this->deliveryCost = $deliveryCost;
        return $this;
    }

    public function getDeliveryPrice() {
        return $this->deliveryPrice;
    }

    public function setDeliveryPrice($deliveryPrice) {
        $this->deliveryPrice = $deliveryPrice;
        return $this;
    }

    public function getIsDeliveryIncludedInPayment() {
        return $this->isDeliveryIncludedInPayment;
    }

    public function setIsDeliveryIncludedInPayment($isDeliveryIncludedInPayment) {
        $this->isDeliveryIncludedInPayment = $isDeliveryIncludedInPayment;
        return $this;
    }

    public function getOrdersConnected() {
        return $this->ordersConnected;
    }

    public function setOrdersConnected($ordersConnected) {
        $this->ordersConnected = $ordersConnected;
        return $this;
    }

    public function addOrdersConnected($ordersConnected) {
        $this->ordersConnected->add($ordersConnected);
        return $this;
    }

    public function removeOrdersConnected($ordersConnected) {
        $this->ordersConnected->removeElement($ordersConnected);
        return $this;
    }

    public function getSubscribersOnAdminComments() {
        return $this->subscribersOnAdminComments;
    }

    public function setSubscribersOnAdminComments($subscribersOnAdminComments) {
        $this->subscribersOnAdminComments = $subscribersOnAdminComments;
        return $this;
    }

    public function addSubscribersOnAdminComments($subscribersOnAdminComments) {
        $this->subscribersOnAdminComments->add($subscribersOnAdminComments);
        return $this;
    }

    public function removeSubscribersOnAdminComments($subscribersOnAdminComments) {
        $this->subscribersOnAdminComments->removeElement($subscribersOnAdminComments);
        return $this;
    }

    public function getAdminComments() {
        return $this->adminComments;
    }

    public function setAdminComments($adminComments) {
        $this->adminComments = $adminComments;
        return $this;
    }

    public function addAdminComments($adminComments) {
        $this->adminComments->add($adminComments);
        return $this;
    }

    public function removeAdminComments($adminComments) {
        $this->adminComments->removeElement($adminComments);
        return $this;
    }

    public function getNdsTax() {
        return $this->ndsTax;
    }

    public function setNdsTax($ndsTax) {
        $this->ndsTax = $ndsTax;
        return $this;
    }

    public function getTickets() {
        return $this->tickets;
    }

    public function setTickets($tickets) {
        $this->tickets = $tickets;
        return $this;
    }

    public function addTicket($ticket) {
        $ticket->setOrder($this);
        $this->tickets->add($ticket);
        return $this;
    }

    public function removeTicket($ticket) {
        $this->tickets->removeElement($ticket);
        return $this;
    }

    public function getDeliveryPoint() {
        return $this->deliveryPoint;
    }

    public function setDeliveryPoint($deliveryPoint) {
        $this->deliveryPoint = $deliveryPoint;
        return $this;
    }

    public function getCommentForCanceling() {
        return $this->commentForCanceling;
    }

    public function getKeepMoneySumForCanceling() {
        return $this->keepMoneySumForCanceling;
    }

    public function getReasonForCanceling() {
        return $this->reasonForCanceling;
    }

    public function setReasonForCanceling($reasonForCanceling) {
        $this->reasonForCanceling = $reasonForCanceling;
        return $this;
    }

    public function getStockForCanceling() {
        return $this->stockForCanceling;
    }

    public function setStockForCanceling($stockForCanceling) {
        $this->stockForCanceling = $stockForCanceling;
        return $this;
    }

    public function setCommentForCanceling($commentForCanceling) {
        $this->commentForCanceling = $commentForCanceling;
        return $this;
    }

    public function setKeepMoneySumForCanceling($keepMoneySumForCanceling) {
        $this->keepMoneySumForCanceling = $keepMoneySumForCanceling;
        return $this;
    }

    public function getExtraStatus() {
        return $this->extraStatus;
    }

    public function setExtraStatus($extraStatus) {
        $this->extraStatus = $extraStatus;
        return $this;
    }

    public function getShippedOrderInfoHistory() {
        return $this->shippedOrderInfoHistory;
    }

    public function setShippedOrderInfoHistory($shippedOrderInfoHistory) {
        $this->shippedOrderInfoHistory = $shippedOrderInfoHistory;
        return $this;
    }

    public function getCost() {
        return $this->cost;
    }

    public function setCost($cost) {
        $this->cost = $cost;
        return $this;
    }

    public function getRecipientFio() {
        return $this->recipientFio;
    }

    public function getRecipientCompany() {
        return $this->recipientCompany;
    }

    public function getRecipientPhone() {
        return $this->recipientPhone;
    }

    public function getRecipientEmail() {
        return $this->recipientEmail;
    }

    public function getRecipientNote() {
        return $this->recipientNote;
    }

    public function setRecipientFio($recipientFio) {
        $this->recipientFio = $recipientFio;
        return $this;
    }

    public function setRecipientCompany($recipientCompany) {
        $this->recipientCompany = $recipientCompany;
        return $this;
    }

    public function setRecipientPhone($recipientPhone) {
        $this->recipientPhone = $recipientPhone;
        return $this;
    }

    public function setRecipientEmail($recipientEmail) {
        $this->recipientEmail = $recipientEmail;
        return $this;
    }

    public function setRecipientNote($recipientNote) {
        $this->recipientNote = $recipientNote;
        return $this;
    }

    public function getContragentFio() {
        return $this->contragentFio;
    }

    public function getContragentCompany() {
        return $this->contragentCompany;
    }

    public function setContragentFio($contragentFio) {
        $this->contragentFio = $contragentFio;
        return $this;
    }

    public function setContragentCompany($contragentCompany) {
        $this->contragentCompany = $contragentCompany;
        return $this;
    }

    public function getRecipientPassport() {
        return $this->recipientPassport;
    }

    public function setRecipientPassport($recipientPassport) {
        $this->recipientPassport = $recipientPassport;
        return $this;
    }

    public function getPayments() {
        return $this->payments;
    }

    public function setPayments($payments) {
        $this->payments = $payments;
        return $this;
    }

    public function addPayment($payment) {
        $payment->setOrder($this);
        $this->payments->add($payment);
        return $this;
    }

    public function removePayment($payment) {
        $this->payments->removeElement($payment);
        return $this;
    }

    public function getIsOrderCreatedSendMail() {
        return $this->isOrderCreatedSendMail;
    }

    public function setIsOrderCreatedSendMail($isOrderCreatedSendMail) {
        $this->isOrderCreatedSendMail = $isOrderCreatedSendMail;
    }

    public function getIsShowOnFontend() {
        return $this->isShowOnFontend;
    }

    public function setIsShowOnFontend($isShowOnFontend) {
        $this->isShowOnFontend = $isShowOnFontend;
    }
    
        /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function changeEntity() {
        $this->setUpdatedDateTime(new \DateTime());
    }

    /**
     * Подсчитывает количество серийников, которое необходимо ввести для заказа
     * @return type
     */
    public function getTotalNeedSeriesQuantity() {
        $total = 0;
        foreach ($this->compositions as $c) {
            $total+=$c->getQuantity();
        }
        return $total;
    }

    /**
     * Подсчитывает количество серийников, которое введено
     * @return type
     */
    public function getTotalHaveSeriesQuantity() {
        $total = 0;
        foreach ($this->compositions as $c) {
            $ser = 0;
            foreach ($c->getUnits() as $u) {
                $ser++;
            }
            if ($ser && $c->getProduct()->getSerialsQuantity()) {
                $total+=floor($ser / $c->getProduct()->getSerialsQuantity());
            }
        }

        return $total;
    }

    /**
     * Модификация статусов
     */
    public function extraModifyFields(ExecutionContextInterface $context) {
        if ($this->isCanceledStatus) {
            $this->setIsPaidStatus(false)
                    ->setIsShippedStatus(false);
        }
        //если продавец не работает с НДС, то нельзя указывать НДС
        if ($this->getSeller() && !$this->getSeller()->getIsWorkingWithNds()) {
            $this->ndsTax = 0;
        }
    }

    /**
     * Дополнительные проверки
     */
    public function isValid(ExecutionContextInterface $context) {
        if ($this->deliveryMethod) {
            if ($this->deliveryMethod instanceof ServiceWithAddress && !$this->deliveryPoint) {
                $context->buildViolation('Необходимо выбрать пункт выдачи товара')
                        ->atPath('deliveryPoint')
                        ->addViolation();
            } else {
                if (!$this->deliveryAddress) {
                    $context->buildViolation('Необходимо указать адрес доставки')
                        ->atPath('deliveryAddress')
                        ->addViolation();
                }
                if (!$this->deliveryCity) {
                    $context->buildViolation('Необходимо указать город доставки')
                        ->atPath('deliveryCity')
                        ->addViolation();
                }
            }
            // Проверка на наличие паспорта
            if (!$this->recipientPassport && !($this->deliveryMethod instanceof ServiceWithAddress || $this->deliveryMethod instanceof ServiceInCity) && $this->deliveryMethod->getCompany()->getName() == 'dellin') {
                $context->buildViolation('Необходимо указать номер паспорта')
                        ->atPath('recipientPassport')
                        ->addViolation();
            }
        }
        // для CDEK должна быть одна упаковка
        if ($this->deliveryMethod && $this->deliveryMethod->getCompany()->getName() == 'cdek') {
            foreach ($this->waybills as $waybill) {
                if (count($waybill->getSizesOfBox()) > 1) {
                    $context->buildViolation('Для данной компании должна быть Одна упаковка')
                        ->atPath('deliveryMethod')
                        ->addViolation();
                }
            }
        }

        if ($this->deliveryMethod && $this->deliveryMethod->getIsCashOnDelivery() && $this->getIsDeliveryIncludedInPayment()) {
            $context->buildViolation('Запрещается использовать для наложного платежа')
                        ->atPath('isDeliveryIncludedInPayment')
                        ->addViolation();
        }
        if ($this->isShippedStatus && !$this->isCheckedStatus) {
            $context->buildViolation('Чтобы отгрузить заказ он должен иметь статус «Проверен» !')
                        ->atPath('isShippedStatus')
                        ->addViolation();
        }

        if ($this->isShippedStatus && !$this->isPaidStatus && !$this->deliveryMethod->getIsCashOnDelivery()) {
            $context->buildViolation('Чтобы отгрузить заказ он должен иметь статус «Оплачен»!')
                        ->atPath('isShippedStatus')
                        ->addViolation();
        }

        if ($this->isShippedStatus && $this->isCanceledStatus) {
            $context->buildViolation('Нельзя отгрузить заказ если он имеет статус «Отменён»!')
                        ->atPath('isShippedStatus')
                        ->addViolation();
        }

        if ($this->isPaidStatus && $this->isCanceledStatus) {
            $context->buildViolation('Чтобы отменить заказ следует снять статус «Оплачен»!')
                        ->atPath('isCanceledStatus')
                        ->addViolation();
        }

        if (!$this->compositions->count()) {
            $context->buildViolation('У заказа не может быть пустой состав!')
                        ->atPath('compositions')
                        ->addViolation();
        }

        if ($this->isCanceledStatus && !$this->reasonForCanceling) {
            $context->buildViolation('Чтобы отменить заказ следует указать причину!')
                        ->atPath('isCanceledStatus')
                        ->addViolation();
        }

        if ($this->isCanceledStatus && mb_strlen($this->commentForCanceling) < 5 && $this->reasonForCanceling) {
            $context->buildViolation('Укажите комментарий к причине отмены (минимум 5 символов)!')
                        ->atPath('isCanceledStatus')
                        ->addViolation();
        }

        if ($this->isCanceledStatus && !$this->stockForCanceling && ($this->reasonForCanceling == self::returnCanceledReasonName || $this->reasonForCanceling == self::otherCanceledReasonName)) {
            $context->buildViolation('Укажите склад на который будут возвращены товары при отмене заказа!')
                        ->atPath('isCanceledStatus')
                        ->addViolation();
        }

        if ($this->isPaidStatus) {
            if ($this->contragent instanceof LegalContragent && !$this->recipientCompany) {
                $context->buildViolation('Укажите компанию-получатель!')
                        ->atPath('recipientCompany')
                        ->addViolation();
            }

            if (!$this->recipientFio) {
                $context->buildViolation('Укажите ФИО получателя!')
                        ->atPath('recipientFio')
                        ->addViolation();
            }

            if (!$this->recipientPhone) {
                $context->buildViolation('Укажите телефон получателя!')
                        ->atPath('recipientPhone')
                        ->addViolation();
            }
            if (!$this->recipientEmail) {
                $context->buildViolation('Укажите email получателя!')
                        ->atPath('recipientEmail')
                        ->addViolation();
            }
        }

        //если продавец не работает с НДС, то нельзя указывать НДС
        if ($this->getSeller() && !$this->getSeller()->getIsWorkingWithNds() && $this->ndsTax) {
            $context->buildViolation('Нельзя указывать ставку налога, т.к. продавец неработает с НДС!')
                        ->atPath('ndsTax')
                        ->addViolation();
        }

        if (!$this->getDeliveryMethod() && $this->getIsPaidStatus()) {
            //если в составе есть физические товары, тогда доставка обязательна
            $needDeliveryMethod = false;
            foreach ($this->getCompositions() as $comp) {
                if ($comp->getProduct()->getIsPhysical()) {
                    $needDeliveryMethod = true;
                    break;
                }
            }
            if ($needDeliveryMethod) {
                $context->buildViolation('Необходимо указать метод доставки!')
                        ->atPath('deliveryMethod')
                        ->addViolation();
            }
        }

        //проверяем, чтобы серийники были уникальными
        $badSerials = false;
        $manySerials = false;
        foreach ($this->compositions as $comp) {
            $check = [];
            foreach ($comp->getUnits() as $unit) {
                foreach ($unit->getSerials() as $s) {
                    if (isset($check[$s->getValue()])) {
                        $context->buildViolation('Среди вбитых серийников есть неуникальные значения!')
                            ->atPath('compositions')
                            ->addViolation();
                    } else {
                        $check[$s->getValue()] = true;
                    }
                }
            }
//            if ($this->isShippedStatus && !$comp->getProduct()->getIsNoSerials()) {
//                //подсчитываем серийники для товарной позиции
//                $serials = 0;
//                foreach ($comp->getUnits() as $u) {
//                    if ($u->getSerials()) {
//                        $serials+=$u->getSerials()->count();
//                    }
//                }
//                if (!$badSerials && (!$comp->getUnits() || $comp->getQuantity() != ($serials / $comp->getProduct()->getSerialsQuantity()))) {
//                    $badSerials = true;
//                    $context->buildViolation('Нельзя отгрузить заказ, т.к. не все серийные номера указаны!')
//                            ->atPath('compositions')
//                            ->addViolation();
//                }
//            }

            if ($comp->getProduct()) {
                if (!$comp->getProduct()->getIsNoSerials()) {
                    //подсчитываем серийники для товарной позиции
                    $serials = 0;
                    foreach ($comp->getUnits() as $u) {
                        if ($u->getSerials()) {
                            $serials+=$u->getSerials()->count();
                        }
                    }

                    if (!$manySerials && (!$comp->getUnits() || $comp->getQuantity() < ($serials / $comp->getProduct()->getSerialsQuantity()))) {
                        $manySerials = true;
                        $context->buildViolation('Количество серийников не может превышать  количество указанного товара для подукта «'
                                . $comp->getProduct()->getArticle() . ' ' . $comp->getProduct()->getCaptionRu()
                                . '». Просто удалите некоторые серийники!')
                            ->atPath('compositions')
                            ->addViolation();
                    }
                } else {
                    //подсчитываем отгруженные товары без серийников
                    $unitsCount = 0;
                    foreach ($comp->getUnits() as $u) {
                        if (!$u->getIsCouldBeSold()) {  //если единица без серийников и прикреплена к заказу, значит она когда-то была отгружена
                            $unitsCount++;
                        }
                    }

                    if (!$manySerials && ($comp->getQuantity() < $unitsCount)) {
                        $manySerials = true;
                        $context->buildViolation('Нельзя уменьшить количество товара «'
                                . $comp->getProduct()->getArticle() . ' ' . $comp->getProduct()->getCaptionRu()
                                . '», т.к. было отгружено большее количество единиц . Перейдите в раздел «Товары со всех складов», найдите товарную единицу(ы), и открепите её от заказа (выберите склад и сохраните). '
                                . 'Тогда вы сможете уменьшить количество!')
                            ->atPath('compositions')
                            ->addViolation();
                    }
                }
                //должен отгружаться реальный товар
            }
        }
    }

}
