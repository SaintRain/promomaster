<?php

/**
 * Пороговые значения для динамических скидок
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
 * @ORM\Table(name="core_discounts_contragent_manufacturer_step_values")
 * @ORM\Entity(repositoryClass="Core\DiscountsBundle\Entity\Repository\ContragentManufacturerStepValuesRepository")
 */
class ContragentManufacturerStepValues {

    /**
     * Первичный ключ
     * @var bigint
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Скидка для которой устанавливаются пороговые значения
     * @ORM\ManyToOne(targetEntity="ContragentManufacturerDiscount", inversedBy="manufacturerStepValues")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $manufacturerDiscount;

    /**
     * Пороговое значение в дефолтной валюте при котором действует скидка
     * @ORM\Column(type="decimal", scale=2)
     */
    private $stepValue;

    /**
     * Ограничение по времени. Т.е. Если сумма заказа в течении последних 30 дней была такая, то даём скидку
     * ORM\Column(type="integer")
     * Assert\GreaterThan(value = -1)
     */
   // private $stepDays;

    /**
     * Значение скидки
     * @ORM\Column(type="decimal", scale=2)
     */
    private $discountValue;

    /**
     * Флаг определяющий, что значение скидки указано в процентах, иначе фиксировано в дефолтной валюте
     * @ORM\Column(type="boolean")
     */
    private $isDiscountValueInPercent = true;

    /**
     * Время создания
     * @var datetime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="createdDateTime", type="datetime")
     */
    private $createdDateTime;

    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPosition;

    public function getId() {
        return $this->id;
    }

    public function getManufacturerDiscount() {
        return $this->manufacturerDiscount;
    }

    public function setManufacturerDiscount($manufacturerDiscount) {
        $this->manufacturerDiscount = $manufacturerDiscount;
        return $this;
    }

    public function getStepValue() {
        return $this->stepValue;
    }

    public function setStepValue($stepValue) {
        $this->stepValue = $stepValue;
        return $this;
    }

//    public function getStepDays() {
//        return $this->stepDays;
//    }
//
//    public function setStepDays($stepDays) {
//        $this->stepDays = $stepDays;
//        return $this;
//    }

    public function getDiscountValue() {
        return $this->discountValue;
    }

    public function setDiscountValue($discountValue) {
        $this->discountValue = $discountValue;
        return $this;
    }

    public function getIsDiscountValueInPercent() {
        return $this->isDiscountValueInPercent;
    }

    public function setIsDiscountValueInPercent($isDiscountValueInPercent) {
        $this->isDiscountValueInPercent = $isDiscountValueInPercent;
        return $this;
    }

    public function getCreatedDateTime() {
        return $this->createdDateTime;
    }

    public function setCreatedDateTime($createdDateTime) {
        $this->createdDateTime = $createdDateTime;
        return $this;
    }

    public function getIndexPosition() {
        return $this->indexPosition;
    }

    public function setIndexPosition($indexPosition) {
        $this->indexPosition = $indexPosition;
        return $this;
    }

}
