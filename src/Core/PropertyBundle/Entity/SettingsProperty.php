<?php

/**
 * Настройки характеристик. Данным классом расширяются другие классы характеристик
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PropertyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\MappedSuperclass
 */
class SettingsProperty {

    /**
     * Значение по умолчанию
     * @var string
     * @ORM\Column(type="string", length=300, nullable=true)
     * 
     */
    private $defaultValue;

    /**
     * Активность
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $isEnabled = true;

    /**
     * Основная характеристика
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isGeneral;

    /**
     * Использовать в фильтре
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isUsedInFilter;

    /**
     * Обязательное для заполнения
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isRequired;

    /**
     * Дефолтная единица измерения
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\UnitOfMeasure")
     * @ORM\JoinColumn(referencedColumnName="id" , onDelete="SET NULL")
     * @ORM\OrderBy({"indexPosition" = "ASC"})
     */
    private $defaultUnit;

    /**
     * Маска ввода
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $mask;

    /**
     * Индекс позиции сортировки
     * @var integer
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPosition;

    /**
     * Выводить в yml данную характеристику
     * @var boolean
     * @ORM\Column(type="boolean", options={"default" = 1})
     */
    private $isEnabledInYml = true;

    public function getDefaultValue() {
        return $this->defaultValue;
    }

    public function setDefaultValue($defaultValue) {
        $this->defaultValue = $defaultValue;
        return $this;
    }

    public function getIsEnabled() {
        return $this->isEnabled;
    }

    public function setIsEnabled($isEnabled) {
        $this->isEnabled = $isEnabled;
        return $this;
    }

    public function getIsGeneral() {
        return $this->isGeneral;
    }

    public function setIsGeneral($isGeneral) {
        $this->isGeneral = $isGeneral;
        return $this;
    }

    public function getIsUsedInFilter() {
        return $this->isUsedInFilter;
    }

    public function setIsUsedInFilter($isUsedInFilter) {
        $this->isUsedInFilter = $isUsedInFilter;
        return $this;
    }

    public function getIsRequired() {
        return $this->isRequired;
    }

    public function setIsRequired($isRequired) {
        $this->isRequired = $isRequired;
        return $this;
    }

    public function getDefaultUnit() {
        return $this->defaultUnit;
    }

    public function setDefaultUnit($defaultUnit) {
        $this->defaultUnit = $defaultUnit;
        return $this;
    }

    public function getMask() {
        return $this->mask;
    }

    public function setMask($mask) {
        $this->mask = $mask;
        return $this;
    }

    public function getIndexPosition() {
        return $this->indexPosition;
    }

    public function setIndexPosition($indexPosition) {
        $this->indexPosition = $indexPosition;
        return $this;
    }

    function getIsEnabledInYml() {
        return $this->isEnabledInYml;
    }

    function setIsEnabledInYml($isEnabledInYml) {
        $this->isEnabledInYml = $isEnabledInYml;
        return $this;
    }

}
