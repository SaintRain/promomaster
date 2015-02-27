<?php

/**
 * Бренды производителей
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ManufacturerBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="core_manufacturer_brand")
 * @ORM\Entity(repositoryClass="Core\ManufacturerBundle\Entity\Repository\BrandRepository")
 */
class Brand
{

    /**
     * Первичный ключ
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Активность бренда
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isEnabled = true;

    /**
     * Название
     * @var string
     * @ORM\Column(type="string", length=300)
     * @Assert\NotBlank()
     */
    private $captionRu;

    /**
     * Транслитерация Friendly URL
     * @var string
     * @Gedmo\Slug(fields={"captionRu"}, updatable=false, unique=true, separator="-")
     * @ORM\Column(type="string", length=300)
     */
    private $slug;

    /**
     * Логотип
     * @ORM\OneToOne(targetEntity="Core\FileBundle\Entity\ImageFile", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    private $logo;

    /**
     * Описание
     * @var text
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionRu;

    /**
     * Описание продолжение
     * @var text
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionContinueRu;

    /**
     * Производитель
     * @ORM\ManyToOne(targetEntity="Manufacturer", cascade={"persist"},  inversedBy="brandList")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * @Assert\NotBlank()
     */
    private $manufacturer;

    /**
     * Подложка на задний фон в описании брендов
     * @ORM\OneToOne(targetEntity="Core\FileBundle\Entity\ImageFile", cascade={"persist"})
     * @ORM\JoinColumn(name="substrate_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $substrate;

    /**
     * Товары бренда
     * @ORM\OneToMany(targetEntity="Core\ProductBundle\Entity\CommonProduct", mappedBy="brand", cascade={"persist"})
     */
    private $products;

    /**
     * Серии
     * @ORM\OneToMany(targetEntity="Series", cascade={"persist"}, orphanRemoval=true,  mappedBy="brand")
     * @ORM\OrderBy({"indexPosition"="ASC"})
     */
    private $seriesList;

    /**
     * Количество продуктов
     */
    private $countProducts;

    /**
     * Индекс позиции сортировки
     * @var bigint
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPosition;

    /**
     * Title - описание
     * @var string
     * @ORM\Column(type="string",  length=300, nullable=true)
     */
    private $titleRu;

    /**
     * Мета описание
     * @var string
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $metadescriptionRu;

    /**
     * Ключевые слова
     * @var string
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $metakeywordsRu;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->seriesList = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
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

    public function getCaptionRu()
    {
        return $this->captionRu;
    }

    public function setCaptionRu($captionRu)
    {
        $this->captionRu = $captionRu;
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

    public function getLogo()
    {
        return $this->logo ? [$this->logo] : null;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
        return $this;
    }

    public function addLogo($logo)
    {
        $this->logo = $logo;
        return $this;
    }

    public function removeLogo($logo)
    {
        $this->logo = null;
        return $this;
    }

    public function getDescriptionRu()
    {
        return $this->descriptionRu;
    }

    public function setDescriptionRu($descriptionRu)
    {
        $this->descriptionRu = $descriptionRu;
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

    public function addProducts($products)
    {
        $products->setBrand($this);
        $this->products->add($products);
        return $this;
    }

    public function removeProducts($products)
    {
        $this->products->removeElement($products);
        return $this;
    }

    public function getSeriesList()
    {
        return $this->seriesList;
    }

    public function setSeriesList($seriesList)
    {
        $this->seriesList = $seriesList;
        return $this;
    }

    public function addSeriesList($serie)
    {
        $serie->setBrand($this);
        $this->seriesList->add($serie);
        return $this;
    }

    public function removeSeriesList($serie)
    {
        $this->seriesList->removeElement($serie);
        return $this;
    }

    public function getCountProducts()
    {
        return $this->countProducts;
    }

    public function setCountProducts($countProducts)
    {
        $this->countProducts = $countProducts;
        return $this;
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

    public function getSubstrate()
    {
        return $this->substrate ? [$this->substrate] : null;
    }

    public function setSubstrate($substrate)
    {
        $this->substrate = $substrate;
        return $this;
    }

    public function addSubstrate($substrate)
    {
        $this->substrate = $substrate;
        return $this;
    }

    public function removeSubstrate($substrate)
    {
        $this->substrate = null;
        return $this;
    }

    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;
        return $this;
    }

    public function getTitleRu()
    {
        return $this->titleRu;
    }

    public function setTitleRu($titleRu)
    {
        $this->titleRu = $titleRu;
        return $this;
    }

    public function getMetadescriptionRu()
    {
        return $this->metadescriptionRu;
    }

    public function getMetakeywordsRu()
    {
        return $this->metakeywordsRu;
    }

    public function setMetadescriptionRu($metadescriptionRu)
    {
        $this->metadescriptionRu = $metadescriptionRu;
        return $this;
    }

    public function setMetakeywordsRu($metakeywordsRu)
    {
        $this->metakeywordsRu = $metakeywordsRu;
        return $this;
    }

    /**
     * @param \Core\ManufacturerBundle\Entity\text $descriptionContinueRu
     */
    public function setDescriptionContinueRu($descriptionContinueRu)
    {
        $this->descriptionContinueRu = $descriptionContinueRu;
    }

    /**
     * @return \Core\ManufacturerBundle\Entity\text
     */
    public function getDescriptionContinueRu()
    {
        return $this->descriptionContinueRu;
    }


}
