<?php

namespace Core\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Core\DirectoryBundle\Validator\Constraints as DirAssesrt;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * City
 *
 * @ORM\Table(name="core_directory_city",indexes={@ORM\Index(name="city_name_idx", columns={"name"})})
 * @ORM\Entity(repositoryClass="Core\DirectoryBundle\Entity\Repository\CityRepository")
 */
class City
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Название
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * Район
     * @var string
     *
     * @ORM\Column(name="area", type="string", length=255, nullable=true)
     */
    private $area;

    /**
     * Столица региона
     * @var boolean
     *
     * @ORM\Column(name="is_capital_of_region", type="boolean", nullable=true)
     * @Assert\NotNull()
     */
    private $isCapitalOfRegion = false;

    /**
     * Столица страны
     * @var boolean
     *
     * @ORM\Column(name="is_capital_of_country", type="boolean", nullable=true)
     * @Assert\NotNull()
     */
    private $isCapitalOfCountry = false;

    /**
     * Временнная зона
     * @var string
     *
     * @ORM\Column(name="time_zone", type="string", length=3, nullable=true)
     * @DirAssesrt\TimeZone
     */
    private $timeZone;

    /**
     * ID EMS (Траспортная компания)
     * @var string
     *
     * @ORM\Column(name="ems_id", type="string", length=255, nullable=true)
     * @Assert\Regex("/^[a-zA-Z0-9_-]+$/")
     */
    private $emsId;

    /**
     * ID Деловые линии (Траспортная компания)
     * @var string
     * @ORM\Column(name="dellin_id", type="string", length=34, nullable=true)
     * @Assert\Regex("/^[0-9A-Fx]+$/")
     */
    private $dellinId;

    /**
     * ID ПЭК (Траспортная компания)
     * @var string
     *
     * @ORM\Column(name="pek_id", type="string", length=36, nullable=true)
     * @Assert\Type(type="numeric")
     * 
     */
    private $pekId;

    /**
     * ID Байкал Сервис (Траспортная компания)
     * @var integer
     *
     * @ORM\Column(name="baikal_service_id", type="integer", nullable=true)
     * @Assert\Type(type="numeric")
     */
    private $baikalServiceId;

    /**
     * ID Жельдоральянс (Траспортная компания)
     * @var string
     *
     * @ORM\Column(name="gruzovozoff_id", type="string", length=32, nullable=true)
     * @Assert\Regex("/^[a-zA-Z0-9_-]+$/")
     */
    private $gruzovozoffId;

    /**
     * ID Энергия (Траспортная компания)
     * @var integer
     *
     * @ORM\Column(name="energy_id", type="integer", nullable=true)
     * @Assert\Type(type="numeric")
     */
    private $energyId;

    /**
     * ID СДЭК (Траспортная компания)
     * @var integer
     *
     * @ORM\Column(name="cdek_id", type="integer", nullable=true)
     * @Assert\Type(type="numeric")
     */
    private $cdekId;

    /**
     * ID DPD (Траспортная компания)
     * @var string
     *
     * @ORM\Column(name="dpd_id", type="string", length=10, nullable=true)
     * @Assert\Type(type="numeric")
     */
    private $dpdId;

    /**
     * ID Geoip
     * @var string
     *
     * @ORM\Column(name="geoip_name", type="string", length=255, nullable=true)
     */
    private $geoipName;

    /**
     * Широта
     * @var string
     *
     * @ORM\Column(name="latitude", type="decimal", scale=6, nullable=true)
     * @Assert\Type(type="scalar")
     */
    private $latitude;

    /**
     * Долгота
     * @var string
     *
     * @ORM\Column(name="longitude", type="decimal", scale=6, nullable=true)
     * @Assert\Type(type="scalar")
     */
    private $longitude;

    /**
     * Почтовый индекс
     * @var string
     *
     * @ORM\Column(name="post_index", type="string", length=10, nullable=true)
     */
    private $postIndex;

    /**
     * Регион
     * @ORM\ManyToOne(targetEntity="Region", cascade={"persist"}, inversedBy="cityList")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     * @Assert\NotBlank()
     */
    private $region;
    
    /**
     * Страна
     * @ORM\ManyToOne(targetEntity="Country", cascade={"persist"}, inversedBy="cityList")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     * @Assert\NotBlank()
     */
    private $country;

    /**
     * Список городов (ГЕО локации)
     * @var Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="GeoCity", mappedBy="city", cascade={"persist"}, orphanRemoval=true, fetch="EXTRA_LAZY")
     */
    private $geoCityList;

    /**
     * Список городов
     * @var Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="Core\DeliveryBundle\Entity\Address", mappedBy="city", cascade={"persist"}, orphanRemoval=true, fetch="EXTRA_LAZY")
     */
    private $selfPickupPlaces;

    public function __construct()
    {
        $this->geoCityList = new ArrayCollection();
        $this->selfPickupPlaces = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return City
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set area
     *
     * @param string $area
     * @return City
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * Get area
     *
     * @return string 
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Set timeZone
     *
     * @param string $timeZone
     * @return City
     */
    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;

        return $this;
    }

    /**
     * Get timeZone
     *
     * @return string 
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }

    /**
     * Set dellinId
     *
     * @param string $dellinId
     * @return City
     */
    public function setDellinId($dellinId)
    {
        $this->dellinId = $dellinId;

        return $this;
    }

    /**
     * Get dellinId
     *
     * @return string 
     */
    public function getDellinId()
    {
        return $this->dellinId;
    }

    /**
     * Set pekId
     *
     * @param string $pekId
     * @return City
     */
    public function setPekId($pekId)
    {
        $this->pekId = $pekId;

        return $this;
    }

    /**
     * Get pekId
     *
     * @return string 
     */
    public function getPekId()
    {
        return $this->pekId;
    }

    /**
     * Set baikalServiceId
     *
     * @param integer $baikalServiceId
     * @return City
     */
    public function setBaikalServiceId($baikalServiceId)
    {
        $this->baikalServiceId = $baikalServiceId;

        return $this;
    }

    /**
     * Get baikalServiceId
     *
     * @return integer 
     */
    public function getBaikalServiceId()
    {
        return $this->baikalServiceId;
    }

    /**
     * Set gruzovozoffId
     *
     * @param string $gruzovozoffId
     * @return City
     */
    public function setGruzovozoffId($gruzovozoffId)
    {
        $this->gruzovozoffId = $gruzovozoffId;

        return $this;
    }

    /**
     * Get gruzovozoffId
     *
     * @return string 
     */
    public function getGruzovozoffId()
    {
        return $this->gruzovozoffId;
    }

    /**
     * Set energyId
     *
     * @param integer $energyId
     * @return City
     */
    public function setEnergyId($energyId)
    {
        $this->energyId = $energyId;

        return $this;
    }

    /**
     * Get energyId
     *
     * @return integer 
     */
    public function getEnergyId()
    {
        return $this->energyId;
    }

    /**
     * Set cdekId
     *
     * @param integer $cdekId
     * @return City
     */
    public function setCdekId($cdekId)
    {
        $this->cdekId = $cdekId;

        return $this;
    }

    /**
     * Get cdekId
     *
     * @return integer 
     */
    public function getCdekId()
    {
        return $this->cdekId;
    }

    /**
     * Set dpdId
     *
     * @param string $dpdId
     * @return City
     */
    public function setDpdId($dpdId)
    {
        $this->dpdId = $dpdId;

        return $this;
    }

    /**
     * Get dpdId
     *
     * @return string 
     */
    public function getDpdId()
    {
        return $this->dpdId;
    }

    /**
     * Set geoipName
     *
     * @param string $geoipName
     * @return City
     */
    public function setGeoipName($geoipName)
    {
        if (is_array($geoipName) && count($geoipName)) {
            $this->geoipName = '|' . implode('|', $geoipName).'|';
        } else {
            $this->geoipName = $geoipName;
        }
        return $this;
    }

    /**
     * Get geoipName
     *
     * @return string 
     */
    public function getGeoipName()
    {
        if (is_array($this->geoipName)) {
            return $this->geoipName;
        }
        return array_filter(explode('|',$this->geoipName));
        
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return City
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude * 1;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return City
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude * 1;
    }

    public function getIsCapitalOfRegion()
    {
        return $this->isCapitalOfRegion;
    }

    public function setIsCapitalOfRegion($isCapitalOfRegion)
    {
        $this->isCapitalOfRegion = $isCapitalOfRegion;
        return $this;
    }

    public function getIsCapitalOfCountry()
    {
        return $this->isCapitalOfCountry;
    }

    public function setIsCapitalOfCountry($isCapitalOfCountry)
    {
        $this->isCapitalOfCountry = $isCapitalOfCountry;
        return $this;
    }

    public function getEmsId()
    {
        return $this->emsId;
    }

    public function setEmsId($emsId)
    {
        $this->emsId = $emsId;
        return $this;
    }

    public function getPost_ruId()
    {
        return $this->postIndex;
    }

    public function getPostIndex()
    {
        return $this->postIndex;
    }

    public function setPostIndex($postIndex)
    {
        $this->postIndex = $postIndex;
        return $this;
    }

    public function getRegion()
    {
        return $this->region;
    }

    public function setRegion(Region $region = null)
    {
        $this->region = $region;
        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }


    public function setCountry(Country $country = null)
    {
        $this->country = $country;
        return $this;
    }
    
    public function getCoordinates()
    {
        $result = array(
            number_format($this->getLatitude(), 4),
            number_format($this->getLongitude(), 4)
        );

        return $result;
    }

    public function addGeoCityList($geoCityList)
    {
        if (!$this->geoCityList->contains($geoCityList)) {
            $this->geoCityList->add($geoCityList);
            $geoCityList->setCity($this);
        }

        return $this;
    }

    public function removeGeoCityList($geoCityList)
    {
        $this->geoCityList->removeElement($geoCityList);

        return $this;
    }

    public function getGeoCityList()
    {
        return $this->geoCityList;
    }

    public function setGeoCityList($geoCityList)
    {
        $this->geoCityList = $geoCityList;

        return $this;
    }

    /**
     * @param \Core\DirectoryBundle\Entity\Doctrine\Common\Collections\ArrayCollection $selfPickupPlaces
     */
    public function setSelfPickupPlaces($selfPickupPlaces)
    {
        $this->selfPickupPlaces = $selfPickupPlaces;
    }

    /**
     * @return \Core\DirectoryBundle\Entity\Doctrine\Common\Collections\ArrayCollection
     */
    public function getSelfPickupPlaces()
    {
        return $this->selfPickupPlaces;
    }

    public function addSelfPickupPlace($selfPickupPlace)
    {
        if (!$this->selfPickupPlaces->contains($selfPickupPlace)) {
            $this->selfPickupPlaces->add($selfPickupPlace);
            $selfPickupPlace->setCity($this);
        }

        return $this;
    }

    public function removeSelfPickupPlace($selfPickupPlace)
    {
        $this->selfPickupPlaces->removeElement($selfPickupPlace);

        return $this;
    }

}
