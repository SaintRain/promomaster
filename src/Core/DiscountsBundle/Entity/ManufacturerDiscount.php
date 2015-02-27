<?php

/**
 * Динамические скидки по производителям от объёма заказов
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
 * @ORM\Table(name="core_discounts_manufacturer")
 * @ORM\Entity(repositoryClass="Core\DiscountsBundle\Entity\Repository\ManufacturerDiscountRepository")
 */
class ManufacturerDiscount {

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
     * @ORM\ManyToMany(targetEntity="Core\ManufacturerBundle\Entity\Manufacturer", inversedBy="manufacturerDiscounts", cascade={"persist"})
     * @ORM\JoinTable(name="core_discounts_manufacturer_match_manufacturers")
     */
    private $manufacturers;

    /**
     * Значения скидки
     * @ORM\OneToMany(targetEntity="ManufacturerStepValues", mappedBy="manufacturerDiscount", cascade={"persist"}, orphanRemoval=true)
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
