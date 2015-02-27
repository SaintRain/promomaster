<?php

/**
 * Справочник значения характеристик
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PropertyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="core_property_data")
 * @ORM\Entity(repositoryClass="Core\PropertyBundle\Entity\Repository\DataPropertyRepository")
 */
class DataProperty {

    /**
     * Первичный ключ
     * @var integer
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Характеристика
     * @ORM\ManyToOne(targetEntity="Property", inversedBy="dataList")
     * @ORM\JoinColumn(name="propertyId", referencedColumnName="id", onDelete="CASCADE")
     * @Assert\NotBlank
     */
    private $property;

    /**
     * Значния характеристик
     * @var array collection
     * @ORM\OneToMany(targetEntity="ProductDataProperty", mappedBy="data")
     */
    private $productDataProperty;

    /**
     * Значение характеристики
     * @var string
     * @ORM\Column(name="value", type="string", nullable=true, length=300)
     * @Assert\NotBlank()
     */
    private $value;

    /**
     * Имя подставляемого значения характеристики
     * @var string
     * @ORM\Column(name="name", type="string", nullable=true, length=300)
     */
    private $name;

    /**
     * Индекс позиции сортировки
     * @var integer
     * @ORM\Column(name="indexPosition", type="bigint", nullable=true)
     */
    private $indexPosition;

    /**
     * ORM\OneToMany(targetEntity="Core\DynamicBindingBundle\Entity\Binding", mappedBy="data", cascade={"persist"}, orphanRemoval=true)
     * @var Doctrine\Common\Collections\ArrayCollection
     */
    //private $dynamicFields;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $shortDescription;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $articleKey;
    
    /**
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $extraKey3;


    /**
     * Активность
     * @var boolean
     * @ORM\Column(name="isEnabled", type="boolean")
     */
    private $isEnabled = true;

    public function __construct()
    {
        $this->dynamicFields = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function getProperty() {
        return $this->property;
    }

    public function setProperty($property) {
        $this->property = $property;
        return $this;
    }

    public function getProductDataProperty() {
        return $this->productDataProperty;
    }

    public function setProductDataProperty($productDataProperty) {
        $this->productDataProperty = $productDataProperty;
        return $this;
    }

    public function getValue() {
        return $this->value;
    }

    public function setValue($value) {
        $this->value = $value;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getIndexPosition() {
        return $this->indexPosition;
    }

    public function setIndexPosition($indexPosition) {
        $this->indexPosition = $indexPosition;
        return $this;
    }

    public function getIsEnabled() {
        return $this->isEnabled;
    }

    public function setIsEnabled($isEnabled) {
        $this->isEnabled = $isEnabled;
        return $this;
    }

    public function getDynamicFields()
    {
        return $this->dynamicFields;
    }
    /*
    public function setDynamicFields($dynamicFields)
    {
        $this->dynamicFields = $dynamicFields;
        return $this;
    }

    public function addDynamicField($dynamicField)
    {
        if ($this->dynamicFields->contains($dynamicField)) {
            $this->dynamicFields[] = $dynamicField;
        }
    }

    public function removeDynamicField($dynamicField)
    {
        $this->getDynamicFields()->removeElement($dynamicField);

        return $this;
    }
    */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getArticleKey()
    {
        return $this->articleKey;
    }

    public function setArticleKey($articleKey)
    {
        $this->articleKey = $articleKey;
        
        return $this;
    }

    function getExtraKey3()
    {
        return $this->extraKey3;
    }

    function setExtraKey3($extraKey3)
    {
        $this->extraKey3 = $extraKey3;
        return $this;
    }
}
