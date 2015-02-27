<?php

/**
 * Динамические скидки индивидуально для контрагента по производителям от объёма заказов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DiscountsBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\ExecutionContextInterface;

/**
 * @ORM\Table(name="core_discounts_contragent_manufacturer")
 * @ORM\Entity(repositoryClass="Core\DiscountsBundle\Entity\Repository\ContragentManufacturerDiscountRepository")
 */
class ContragentManufacturerDiscount {

    /**
     * Первичный ключ
     * @var bigint
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Производители
     * @ORM\ManyToMany(targetEntity="Core\ManufacturerBundle\Entity\Manufacturer", cascade={"persist"})
     * @ORM\JoinTable(name="core_discounts_contragent_manufacturer_match_manufacturers")
     */
    private $manufacturers;

    /**
     * Если указан контрагент то скидка будет распростроняться на конкретного контрагента
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\CommonContragent", inversedBy="manufacturerDiscounts", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $contragent;

    /**
     * Значения скидки
     * @ORM\OneToMany(targetEntity="ContragentManufacturerStepValues", mappedBy="manufacturerDiscount", cascade={"persist"}, orphanRemoval=true)
     * @ORM\OrderBy({"indexPosition" = "ASC"})
     */
    private $manufacturerStepValues;

    /**
     * Время создания
     * @var datetime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="createdDateTime", type="datetime")
     */
    private $createdDateTime;

    /**
     * Активна ли скидка
     * @ORM\Column(type="boolean")
     */
    private $isEnabled;

    public function __construct() {
        $this->manufacturerStepValues = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function getManufacturers() {
        return $this->manufacturers;
    }

    public function setManufacturers($manufacturers) {
        $this->manufacturers = $manufacturers;
        return $this;
    }

    public function getContragent() {
        return $this->contragent;
    }

    public function setContragent($contragent) {
        $this->contragent = $contragent;
        return $this;
    }

    public function getManufacturerStepValues() {
        return $this->manufacturerStepValues;
    }

    public function setManufacturerStepValues($manufacturerStepValues) {
        $this->manufacturerStepValues = $manufacturerStepValues;
        return $this;
    }

    public function addManufacturerStepValue($manufacturerStepValue) {
        $manufacturerStepValue->setManufacturerDiscount($this);
        $this->manufacturerStepValues->add($manufacturerStepValue);
        return $this;
    }

    public function removeManufacturerStepValue($manufacturerStepValue) {
        $this->manufacturerStepValues->removeElement($manufacturerStepValue);
        return $this;
    }

    public function getCreatedDateTime() {
        return $this->createdDateTime;
    }

    public function setCreatedDateTime($createdDateTime) {
        $this->createdDateTime = $createdDateTime;
        return $this;
    }

    public function getIsEnabled() {
        return $this->isEnabled;
    }

    public function setIsEnabled($isEnabled) {
        $this->isEnabled = $isEnabled;
        return $this;
    }

}
