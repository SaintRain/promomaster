<?php

/**
 * Регионы стран
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Core\DirectoryBundle\Validator\Constraints as DirAssesrt;

/**
 * Region
 *
 * @ORM\Table(name="core_directory_region")
 * @ORM\Entity(repositoryClass="Core\DirectoryBundle\Entity\Repository\RegionRepository")
 */
class Region
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
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
     * ID DPD (Траспортная компания)
     * @var string
     *
     * @ORM\Column(name="dpd_id", type="string", length=255, nullable=true)
     */
    private $dpdId;

    /**
     * @var string
     *
     * @ORM\Column(name="geoip_name", type="string", length=10, nullable=true)
     */
    private $geoipName;

    /**
     * Страна
     * @ORM\ManyToOne(targetEntity="Country", cascade={"persist"}, inversedBy="regionList")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     * @Assert\NotBlank()
     */
    private $country;

    /**
     * Список городов
     * @var Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="City", mappedBy="region", cascade={"persist"}, orphanRemoval=true)
     */
    private $cityList;

    public function __toString()
    {
        return $this->getName();
    }

    public function __construct()
    {
        $this->cityList = new ArrayCollection();
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
     * @return Region
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
     * Set timeZone
     *
     * @param string $timeZone
     * @return Region
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

    public function getEmsId()
    {
        return $this->emsId;
    }

    public function setEmsId($emsId)
    {
        $this->emsId = $emsId;
        return $this;
    }

    public function getDpdId()
    {
        return $this->dpdId;
    }

    public function setDpdId($dpdId)
    {
        $this->dpdId = $dpdId;
        return $this;
    }

    public function getGeoipName()
    {
        return $this->geoipName;
    }

    public function setGeoipName($geoipName)
    {
        $this->geoipName = $geoipName;
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

    public function getCityList()
    {
        return $this->cityList;
    }

    public function setCityList($cityList)
    {
        $this->cityList = $cityList;
        
        return $this;
    }

    public function getCitiesAmount()
    {
        return $this->cityList->count();
    }
}
