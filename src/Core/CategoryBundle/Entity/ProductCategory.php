<?php

/**
 * Категории для товаров
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
//подключаем языки
use Core\CommonBundle\TranslatableProperties\Caption;
use Core\CommonBundle\TranslatableProperties\Description;
use Core\CommonBundle\TranslatableProperties\Title;
use Core\CommonBundle\TranslatableProperties\Metakeywords;
use Core\CommonBundle\TranslatableProperties\Metadescription;

/**
 * @Gedmo\Tree(type="nested")
 * @UniqueEntity("slug")
 * @ORM\Table(name="core_category_product")
 * @ORM\Entity(repositoryClass="Core\CategoryBundle\Entity\Repository\ProductCategoryRepository")
 */
class ProductCategory extends CommonCategory
{

    use Caption,
        Description,
        Title,
        Metakeywords,
        Metadescription;

    /**
     * Родительская категория
     * @Gedmo\TreeParent
     * @ORM\ManyToOne(targetEntity="ProductCategory", inversedBy="childrens",fetch="LAZY")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $parent;

    /**
     * Потомки
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="ProductCategory", mappedBy="parent", fetch="LAZY")
     * @ORM\OrderBy({"lft" = "ASC"})
     */
    protected $childrens;

    /**
     * Характеристики
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Core\PropertyBundle\Entity\Property", mappedBy="categories")
     */
    protected $properties;

    /**
     * Транслитерация Friendly URL
     * @Gedmo\Slug(fields={"captionRu"}, updatable=false, unique=true, separator="-")
     * @ORM\Column(name="slug", type="string", unique=true, length=255)
     */
    protected $slug;

    /**
     * @ORM\ManyToMany(targetEntity="Core\ProductBundle\Entity\CommonProduct",  cascade={"persist"}, mappedBy="categories")
     */
    protected $products;

    /**
     * Настройки характеристик для конкретной категории
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Core\PropertyBundle\Entity\SettingsCategoryProperty", mappedBy="category")
     */
    protected $settingsCategoryProperty;

    /**
     * Выводить ли в фильтр "Вес нетто" из продукта
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isInFilterNetWeight;

    /**
     * Флаг, определяющий что вес нетто указан в граммах, иначе в килограммах
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isInFilterNetWeightInGm;

    /**
     * Выводить ли в фильтр "Вес брутто" из продукта
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isInFilterGrossWeight;

    /**
     * Флаг, определяющий что вес брутто указан в граммах, иначе в килограммах
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isInFilterGrossWeightInGm;

    /**
     * Выводить ли в фильтр "Длина продукта в мм" из продукта
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isInFilterLengthOfProduct;

    /**
     * Выводить ли в фильтр "Ширина продукта в мм" из продукта
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isInFilterWidthOfProduct;

    /**
     * Выводить ли в фильтр "Высота продукта в мм" из продукта
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isInFilterHeightOfProduct;

    /**
     * Выводить ли в фильтр "Длина коробки в мм" из продукта
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isInFilterLengthOfBox;

    /**
     * Выводить ли в фильтр "Ширина коробки в мм" из продукта
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isInFilterWidthOfBox;

    /**
     * Выводить ли в фильтр "Высота коробки в мм" из продукта
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isInFilterHeightOfBox;

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

    public function getChildrens()
    {
        return $this->childrens;
    }

    public function setChildrens(ArrayCollection $childrens)
    {
        $this->childrens = $childrens;
        return $this;
    }

    public function getProperties()
    {
        return $this->properties;
    }

    public function setProperties(ArrayCollection $properties)
    {
        $this->properties = $properties;
        return $this;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }

    public function getSettingsCategoryProperty()
    {
        return $this->settingsCategoryProperty;
    }

    public function setSettingsCategoryProperty(ArrayCollection $settingsCategoryProperty)
    {
        $this->settingsCategoryProperty = $settingsCategoryProperty;
        return $this;
    }

    public function getIsInFilterNetWeight()
    {
        return $this->isInFilterNetWeight;
    }

    public function setIsInFilterNetWeight($isInFilterNetWeight)
    {
        $this->isInFilterNetWeight = $isInFilterNetWeight;
        return $this;
    }

    public function getIsInFilterNetWeightInGm()
    {
        return $this->isInFilterNetWeightInGm;
    }

    public function setIsInFilterNetWeightInGm($isInFilterNetWeightInGm)
    {
        $this->isInFilterNetWeightInGm = $isInFilterNetWeightInGm;
        return $this;
    }

    public function getIsInFilterGrossWeight()
    {
        return $this->isInFilterGrossWeight;
    }

    public function setIsInFilterGrossWeight($isInFilterGrossWeight)
    {
        $this->isInFilterGrossWeight = $isInFilterGrossWeight;
        return $this;
    }

    public function getIsInFilterGrossWeightInGm()
    {
        return $this->isInFilterGrossWeightInGm;
    }

    public function setIsInFilterGrossWeightInGm($isInFilterGrossWeightInGm)
    {
        $this->isInFilterGrossWeightInGm = $isInFilterGrossWeightInGm;
        return $this;
    }

    public function getIsInFilterLengthOfProduct()
    {
        return $this->isInFilterLengthOfProduct;
    }

    public function setIsInFilterLengthOfProduct($isInFilterLengthOfProduct)
    {
        $this->isInFilterLengthOfProduct = $isInFilterLengthOfProduct;
        return $this;
    }

    public function getIsInFilterWidthOfProduct()
    {
        return $this->isInFilterWidthOfProduct;
    }

    public function setIsInFilterWidthOfProduct($isInFilterWidthOfProduct)
    {
        $this->isInFilterWidthOfProduct = $isInFilterWidthOfProduct;
        return $this;
    }

    public function getIsInFilterHeightOfProduct()
    {
        return $this->isInFilterHeightOfProduct;
    }

    public function setIsInFilterHeightOfProduct($isInFilterHeightOfProduct)
    {
        $this->isInFilterHeightOfProduct = $isInFilterHeightOfProduct;
        return $this;
    }

    public function getIsInFilterLengthOfBox()
    {
        return $this->isInFilterLengthOfBox;
    }

    public function setIsInFilterLengthOfBox($isInFilterLengthOfBox)
    {
        $this->isInFilterLengthOfBox = $isInFilterLengthOfBox;
        return $this;
    }

    public function getIsInFilterWidthOfBox()
    {
        return $this->isInFilterWidthOfBox;
    }

    public function setIsInFilterWidthOfBox($isInFilterWidthOfBox)
    {
        $this->isInFilterWidthOfBox = $isInFilterWidthOfBox;
        return $this;
    }

    public function getIsInFilterHeightOfBox()
    {
        return $this->isInFilterHeightOfBox;
    }

    public function setIsInFilterHeightOfBox($isInFilterHeightOfBox)
    {
        $this->isInFilterHeightOfBox = $isInFilterHeightOfBox;
        return $this;
    }

}
