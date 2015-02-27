<?php
/**
 * Сущность для платежей
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Application\Sonata\UserBundle\Entity\CommonContragent;
use Core\CommonBundle\TranslatableProperties\Note;

/**
 * @ORM\Table(name="core_payment")
 * @ORM\Entity(repositoryClass="Core\PaymentBundle\Entity\Repository\PaymentRepository")
 */
class Payment
{

    use Note;
    const TYPE_IN  = 1; // приход
    const TYPE_OUT = 0; // расход

    /**
     * Первичный ключ
     * @var bigint
     * @ORM\Column(type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Дата создания
     * @var datetime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * Дата последнего обновления
     * @var datetime
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * Дата выполнения
     * @var datetime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $passedAt;

    /**
     * Сосотяние платежа, если true - это приход
     * @var string
     * @ORM\Column(type="boolean")
     * @ Assert\NotBlank()
     */
    private $type;

    /**
     * Целевая сумма платежа
     * @var decimal
     * @ORM\Column(type="decimal", scale=2, nullable=false)
     * @Assert\NotNull()
     */
    private $amount;

    /**
     * Поле для логирования запросов и ответов платежных систем
     *
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $log;

    /**
     * Платежная система
     *
     * @ORM\ManyToOne(targetEntity="Core\PaymentBundle\Entity\PaymentSystem\CommonPaymentSystem", inversedBy="payments")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $system;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\CommonContragent", inversedBy="payments")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $customer;

    /**
     * Активность
     *
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $isPassed;

    /**
     * Данные пользователя с формы
     *
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $userData;

    /**
     * Заказы
     *
     * @ORM\ManyToOne(targetEntity="Core\OrderBundle\Entity\Order", inversedBy="payments")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $order;

    /**
     * Возврат
     *
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $isRefund;

    /**
     * Причина возврата
     *
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reasonRefund;

    /**
     * Сумма возврата
     *
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    private $amountRefund;

    /**
     * Заказы
     *
     * @ORM\ManyToOne(targetEntity="Payment")
     */
    private $parentFromWhichRefund;

    public function __construct()
    {
        $this->isPassed = false;
        $this->isRefund = false;
        $this->amount   = 0.0;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getPassedAt()
    {
        return $this->passedAt;
    }

    public function setPassedAt($passedAt)
    {
        $this->passedAt = $passedAt;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getAmount()
    {
        return (float) $this->amount;
    }

    public function setAmount($amount)
    {
        $this->amount = (float) $amount;
        return $this;
    }

    public function getSystem()
    {
        return $this->system;
    }

    public function setSystem($system)
    {
        $this->system = $system;
        return $this;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function setCustomer(CommonContragent $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    public function getLog()
    {
        return $this->log;
    }

    public function setLog($log)
    {
        $this->log = $log;
        return $this;
    }

    public function getIsPassed()
    {
        return $this->isPassed;
    }

    public function setIsPassed($isPassed)
    {
        if ($isPassed) {
            $this->setPassedAt(new \DateTime());
        }

        $this->isPassed = $isPassed;
        return $this;
    }

    public function getUserData()
    {
        return unserialize($this->userData);
    }

    public function setUserData($userData)
    {
        $this->userData = serialize($userData);
        return $this;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }

    function getIsRefund()
    {
        return $this->isRefund;
    }

    function setIsRefund($isRefund)
    {
        $this->isRefund = $isRefund;
    }

    function getReasonRefund()
    {
        return $this->reasonRefund;
    }

    function setReasonRefund($reasonRefund)
    {
        $this->reasonRefund = $reasonRefund;
    }

    function getAmountRefund()
    {
        return $this->amountRefund;
    }

    function setAmountRefund($amountRefund)
    {
        $this->amountRefund = $amountRefund;
    }

    function getParentFromWhichRefund()
    {
        return $this->parentFromWhichRefund;
    }

    function setParentFromWhichRefund($parentFromWhichRefund)
    {
        $this->parentFromWhichRefund = $parentFromWhichRefund;
    }
}