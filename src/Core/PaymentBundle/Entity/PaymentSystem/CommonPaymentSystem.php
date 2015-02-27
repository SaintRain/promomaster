<?php

/**
 * Базовая сущность платежных систем
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Entity\PaymentSystem;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Core\CommonBundle\TranslatableProperties\Caption;
use Core\CommonBundle\TranslatableProperties\Description;

/**
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"Robokassa"="Robokassa", "BankTransfer"="BankTransfer", "PaymentOnDelivery"="PaymentOnDelivery", "PayPal"="PayPal", "YandexMoney"="YandexMoney", "PlasticCard"="PlasticCard", "PlasticCardTerminal"="PlasticCardTerminal"})
 * "WebMoney"="WebMoney", "Qiwi"="Qiwi",
 * @ORM\Table(name="core_payment_systems")
 * @ORM\Entity(repositoryClass="Core\PaymentBundle\Entity\PaymentSystem\Repository\CommonPaymentSystemRepository")
 */
class CommonPaymentSystem
{

    use Caption;
    use Description;

    /**
     * Первичный ключ
     * @var integer
     * @ORM\Column(name="id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Системный ключ
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false, unique=true)
     */
    private $system;

    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $indexPosition;

    /**
     * Ссылка на которую отправлять запросы для обработки платежей
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Url()
     */
    private $requestURL;

    /**
     * Ссылка на которую отправлять запросы для обработки платежей
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Url()
     */
    private $requestURLtest;

    /**
     * Активность
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isTest;

    /**
     * Активность
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isEnabled;

    /**
     * Процент коммиссии
     * @var float
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $commission;

    /**
     * Взымать коммиссию с клиента
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isCollectCommission;

    /**
     * Индекс позиции сортировки
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isCustomerIndividual;

    /**
     * Индекс позиции сортировки
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isCustomerCorporate;

    /**
     * @ORM\OneToMany(targetEntity="Core\PaymentBundle\Entity\Payment", mappedBy="system")
     */
    private $payments;

    /**
     * Отображать в футере
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isInFooter;

    public function __construct()
    {
        $this->payments = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->captionRu;
    }

    public function getId()
    {
        return $this->id;
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

    public function getSystem()
    {
        return $this->system;
    }

    public function setSystem($system)
    {
        $this->system = $system;
        return $this;
    }

    public function getRequestURL()
    {
        return $this->requestURL;
    }

    public function setRequestURL($requestURL)
    {
        $this->requestURL = $requestURL;
        return $this;
    }

    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
        return $this;
    }

    public function getCommission()
    {
        return $this->commission;
    }

    public function setCommission($commission)
    {
        $this->commission = $commission;
        return $this;
    }

    public function getIsCollectCommission()
    {
        return $this->isCollectCommission;
    }

    public function setIsCollectCommission($isCollectCommission)
    {
        $this->isCollectCommission = $isCollectCommission;
        return $this;
    }

    public function getIsCustomerIndividual()
    {
        return $this->isCustomerIndividual;
    }

    public function setIsCustomerIndividual($isCustomerIndividual)
    {
        $this->isCustomerIndividual = $isCustomerIndividual;
        return $this;
    }

    public function getisCustomerCorporate()
    {
        return $this->isCustomerCorporate;
    }

    public function setIsCustomerCorporate($isCustomerCorporate)
    {
        $this->isCustomerCorporate = $isCustomerCorporate;
        return $this;
    }

    public function getPayments()
    {
        return $this->payments;
    }

    public function setPayments($payments)
    {
        $this->payments = $payments;
        return $this;
    }

    public function addPayment($payment)
    {
        $payment->setSystem($this);
        $this->payments->add($payment);
        return $this;
    }

    public function removePayment($payment)
    {
        $this->payments->removeElement($payment);
        return $this;
    }

    public function getRequestURLtest()
    {
        return $this->requestURLtest;
    }

    public function setRequestURLtest($requestURLtest)
    {
        $this->requestURLtest = $requestURLtest;
        return $this;
    }

    public function getIsTest()
    {
        return $this->isTest;
    }

    public function setIsTest($isTest)
    {
        $this->isTest = $isTest;
        return $this;
    }

    public function getIsInFooter()
    {
        return $this->isInFooter;
    }

    public function setIsInFooter($isInFooter)
    {
        $this->isInFooter = $isInFooter;
        return $this;
    }

}
