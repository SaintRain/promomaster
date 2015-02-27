<?php

/**
 * Класс доставок траспортных компаний
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Core\DeliveryBundle\Validator\Constraints as DeliveryAssert;    //дополнительные проверки
use Doctrine\Common\Collections\ArrayCollection;
use Core\OrderBundle\Entity\Waybills;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\ExecutionContextInterface;

/**
 * Service
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"Service"="Service", "ServiceWithAddress"="ServiceWithAddress", "ServiceInCity"="ServiceInCity"})
 * @ORM\Table(name="core_delivery_service")
 * @ORM\Entity(repositoryClass="Core\DeliveryBundle\Entity\Repository\ServiceRepository")
 * @DeliveryAssert\InternalCode
 * @UniqueEntity("name")
 */
class Service
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Системное имя
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     * @ Assert\NotBlank()
     */
    private $name;

    /**
     * Заголовок
     * @var string
     *
     * @ORM\Column(name="caption_ru", type="string", length=255)
     * @ Assert\NotBlank()
     */
    private $captionRu;

    /**
     * Ограничение (тип покупателя)
     * @var string
     * @ORM\Column(name="buyer_type", type="string", length=255, nullable=true)
     * @Assert\Choice(choices = {"IndiContragent", "LegalContragent"}, message = "Выберете привальный тип")
     */
    private $buyerType;

     /**
     * Ограничение (мин сумма)
     * @var decimal
     * @ORM\Column(name="min_sum", type="decimal", scale=2, nullable=true)
     * @ Assert\GreaterThanOrEqual(value = 0)
     * @ Assert\Type(type="numeric", message="{{ value }} не похоже на число {{ type }}.")
     */
    private $minSum = 0;

    /**
     * Ограничение (макс сумма)
     * @var decimal
     * @ORM\Column(name="max_sum",type="decimal", scale=2, nullable=true)
     * @ Assert\GreaterThanOrEqual(value = 0)
     * @ Assert\Type(type="numeric", message="{{ value }} не похоже на число {{ type }}.")
     */
    private $maxSum = 0;

    /**
     * @ORM\ManyToOne(targetEntity="Core\DeliveryBundle\Entity\Company", inversedBy="services")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * @ Assert\NotBlank()
     */
    private $company;

    /**
     * Тип транспортной компании
     * @ORM\ManyToOne(targetEntity="Core\DeliveryBundle\Entity\ServiceType", inversedBy="services")
     * @ORM\JoinColumn(name="service_type_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * @ Assert\NotBlank()
     */
    private $serviceType;

    /**
     * Забор груза
     * false - склад
     * true - дверь
     * @var boolean
     * @ORM\Column(name="delivery_from", type="boolean", nullable=true)
     * @ Assert\NotBlank()
     */
    private $deliveryFrom = false;

    /**
     * Доставка груза
     * false - склад
     * true - дверь
     * @var boolean
     * @ORM\Column(name="delivery_to", type="boolean", nullable=true)
     * @ Assert\NotBlank()
     */
    private $deliveryTo = false;

    /**
     * Внутреннее системное имя (id)
     * в рамках ТК
     * @var string
     * @ORM\Column(name="internal_code", type="string", length=255, nullable=true)
     */
    private $internalCode;

    /**
     * Наложный платеж
     * @var boolean
     * @ORM\Column(name="is_cash_on_delivery", type="boolean", nullable=true)
     */
    private $isCashOnDelivery = false;

    /**
     * Показывать на странице продукта
     * @var boolean
     * @ORM\Column(name="is_show_on_product_page", type="boolean", nullable=false)
     */
    private $isShowOnProduct = false;

    /**
     * @Gedmo\SortablePosition
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * Габариты упаковок
     * @ORM\OneToMany(targetEntity="Core\OrderBundle\Entity\Waybills", cascade={"persist"},  mappedBy="deliveryMode", orphanRemoval=true)
     * @ORM\OrderBy({"indexPosition"="ASC"})
     */
    private $waybills;

    public function __construct()
    {
        $this->waybills = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getCaptionRu();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Service
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set captionRu
     *
     * @param string $captionRu
     * @return Service
     */
    public function setCaptionRu($captionRu)
    {
        $this->captionRu = $captionRu;

        return $this;
    }

    /**
     * Get captionRu
     *
     * @return string 
     */
    public function getCaptionRu()
    {
        return $this->captionRu;
    }


    public function getBuyerType()
    {
        return $this->buyerType;
    }

    public function setBuyerType($buyerType)
    {
        $this->buyerType = $buyerType;

        return $this;
    }

    public function getMinSum()
    {
        return $this->minSum;
    }

    public function setMinSum($minSum)
    {
        $this->minSum = $minSum;

        return $this;
    }

    public function getMaxSum()
    {
        return $this->maxSum;
    }


    public function setMaxSum($maxSum)
    {
        $this->maxSum = $maxSum;

        return $this;
    }

    /**
     *
     * @param \Core\DeliveryBundle\Entity\Company $company
     * @return \Core\DeliveryBundle\Entity\Service
     */
    public function setCompany(Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     *
     * @return \Core\DeliveryBundle\Entity\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     *
     * @param \Core\DeliveryBundle\Entity\ServiceType $serviceType
     * @return \Core\DeliveryBundle\Entity\Service
     */
    public function setServiceType(ServiceType $serviceType = null)
    {
        $this->serviceType = $serviceType;

        return $this;
    }

    /**
     *
     * @return \Core\DeliveryBundle\Entity\ServiceType
     */
    public function getServiceType()
    {
        return $this->serviceType;
    }


    public function getDeliveryFrom()
    {
        return $this->deliveryFrom;
    }

    public function setDeliveryFrom($deliveryFrom)
    {
        $this->deliveryFrom = $deliveryFrom;
        return $this;
    }

    public function getDeliveryTo()
    {
        return $this->deliveryTo;
    }

    public function setDeliveryTo($deliveryTo)
    {
        $this->deliveryTo = $deliveryTo;
        return $this;
    }

    public function getInternalCode()
    {
        return $this->internalCode;
    }

    public function setInternalCode($internalCode)
    {
        $this->internalCode = $internalCode;
        return $this;
    }

    public function getIsCashOnDelivery()
    {
        return $this->isCashOnDelivery;
    }

    public function setIsCashOnDelivery($isCashOnDelivery)
    {
        $this->isCashOnDelivery = $isCashOnDelivery;
        return $this;
    }

    public function getIsShowOnProduct()
    {
        return $this->isShowOnProduct;
    }

    public function setIsShowOnProduct($isShowOnProduct)
    {
        $this->isShowOnProduct = $isShowOnProduct;
        
        return $this;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function getPosition()
    {
        return $this->position;
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

    public function getCompanyName()
    {
        return ($this->getCompany()) ? $this->getCompany()->getName() : '';
    }

    public function getInstanceName()
    {
        $refClass = new \ReflectionClass($this);
        return $refClass->getShortName();
    }

    /**
     * @Assert\Callback
     */
    public function isValid(ExecutionContextInterface $context)
    {
        $companyName = $this->company->getName();
        if ($this->isCashOnDelivery && ($companyName == 'dellin' || $companyName == 'jel_dor' || $companyName == 'energy' || $companyName == 'ems' || $companyName == 'pek')) {
            $context->buildViolation('Наложенный платеж для данной компании запрещен')
                    ->atPath('isCashOnDelivery')
                    ->addViolation();
        }
    }

}
