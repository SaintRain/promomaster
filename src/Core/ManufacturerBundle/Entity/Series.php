<?php

/**
 * Серии для производителей
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ManufacturerBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="core_manufacturer_series")
 * @ORM\Entity(repositoryClass="Core\ManufacturerBundle\Entity\Repository\SeriesRepository")
 */
class Series
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
     * Название 
     * @var string
     * @ORM\Column(type="string", length=300)
     * @Assert\NotBlank()
     */
    private $captionRu;

    /**
     * Бренд
     * @ORM\ManyToOne(targetEntity="Brand", cascade={"persist"}, inversedBy="seriesList")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     * @Assert\NotBlank()
     */
    private $brand;

    /**
     * Транслитерация Friendly URL
     * @var string
     * @Gedmo\Slug(fields={"captionRu"}, updatable=false, unique=true, separator="-")
     * @ORM\Column(type="string", length=300)
     */
    private $slug;

    /**
     * Индекс позиции сортировки
     * @var bigint
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPosition;

    public function getId()
    {
        return $this->id;
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

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
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

    public function getIndexPosition()
    {
        return $this->indexPosition;
    }

    public function setIndexPosition($indexPosition)
    {
        $this->indexPosition = $indexPosition;
        return $this;
    }

}
