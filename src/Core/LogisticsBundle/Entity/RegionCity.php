<?php

/**
 * Cписок регионов и городов, в которых работает данный склад
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="core_logistics_region_city")
 * @ORM\Entity(repositoryClass="Core\LogisticsBundle\Entity\Repository\RegionCityRepository")
 * @UniqueEntity("name")
 */
class RegionCity {

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Название
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $captionRu;

    /**
     * Тип
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     * @Assert\NotBlank()
     */
    private $isRegion;

    /**
     * Склад, для которого добавили адрес
     * @ORM\ManyToMany(targetEntity="Stock", cascade={"persist"}, mappedBy="regionsCityList")
     */
    private $stock;

    /**
     * Продвавец
     * @ORM\ManyToMany(targetEntity="Seller", cascade={"persist"}, mappedBy="regionsCityList")
     */
    private $seller;

    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPosition;

    public function getId() {
        return $this->id;
    }

    public function getCaptionRu() {
        return $this->captionRu;
    }

    public function setCaptionRu($captionRu) {
        $this->captionRu = $captionRu;
        return $this;
    }

    public function getIsRegion() {
        return $this->isRegion;
    }

    public function setIsRegion($isRegion) {
        $this->isRegion = $isRegion;
        return $this;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $stock;
        return $this;
    }

    public function getSeller() {
        return $this->seller;
    }

    public function setSeller($seller) {
        $this->seller = $seller;
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

