<?php

/**
 * Склады
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Core\CommonBundle\Validator\Constraints as CommonAssert;    //дополнительные проверки
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Core\CommonBundle\TranslatableProperties\Caption;

/**
 * @ORM\Table(name="core_logistics_stock")
 * @UniqueEntity("code")
 * @ORM\Entity(repositoryClass="Core\LogisticsBundle\Entity\Repository\StockRepository")
 */
class Stock
{
    use Caption;

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Город
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\City")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    private $city;

    /**
     * Адрес
     * @var string
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * Телефон
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     * @CommonAssert\Phone
     */
    private $phone;

    /**
     * Время работы (начало)
     * @var string
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $workTimeStart;

    /**
     * Время работы (окончание)
     * @var string
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $workTimeEnd;

    /**
     * Главный склад
     * @ORM\Column(type="boolean",  nullable=true)
     */
    private $isGeneralStock;

    /**
     * Cписок регионов и городов, в которых работает данный склад
     * @ORM\ManyToMany(targetEntity="RegionCity", cascade={"persist"}, inversedBy="stock")
     * @ORM\JoinTable(name="core_logistics_stock_match_regions",
     *          joinColumns={@ORM\JoinColumn(referencedColumnName="id", onDelete="cascade")},
     *          inverseJoinColumns={@ORM\JoinColumn(referencedColumnName="id", onDelete="cascade")})
     */
    private $regionsCityList;

    /**
     * Товарные позиции на складе
     * @ORM\OneToMany(targetEntity="UnitInStock", cascade={"persist"}, mappedBy="stock")
     */
    private $units;

    /**
     * Уникальный код склада
     * @var string
     * @Gedmo\Slug(fields={"captionRu"}, updatable=true, unique=true, separator="-")
     * @ORM\Column(type="string", unique=true, length=255)
     */
    private $code;

    public function __construct()
    {
        $this->regionsCityList = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    public function getWorkTimeStart()
    {
        return $this->workTimeStart;
    }

    public function setWorkTimeStart($workTimeStart)
    {
        $this->workTimeStart = $workTimeStart;
        return $this;
    }

    public function getWorkTimeEnd()
    {
        return $this->workTimeEnd;
    }

    public function setWorkTimeEnd($workTimeEnd)
    {
        $this->workTimeEnd = $workTimeEnd;
        return $this;
    }

    public function getIsGeneralStock()
    {
        return $this->isGeneralStock;
    }

    public function setIsGeneralStock($isGeneralStock)
    {
        $this->isGeneralStock = $isGeneralStock;
        return $this;
    }

    public function getRegionsCityList()
    {
        return $this->regionsCityList;
    }

    public function setRegionsCityList($regionsCityList)
    {
        $this->regionsCityList = $regionsCityList;
        return $this;
    }

    public function addRegionsCityList($regionsCityList)
    {
//        var_dump($this); exit;
        $regionsCityList->setSeller($this);
        $this->regionsCityList->add($regionsCityList);
        return $this;
    }

    public function removeRegionsCityList($regionsCityList)
    {
        $this->regionsCityList->remove($regionsCityList);
        return $this;
    }

    public function getUnits()
    {
        return $this->units;
    }

    public function setUnits($units)
    {
        $this->units = $units;
        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

}

