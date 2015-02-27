<?php

/**
 * Пункты доставок
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Core\DirectoryBundle\Entity\City;

/**
 * Adress
 *
 * @ORM\Table("core_delivery_address")
 * @ORM\Entity(repositoryClass="Core\DeliveryBundle\Entity\Repository\AddressRepository")
 * @UniqueEntity("name")
 */
class Address
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
     * Системное имя
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * Заголовок
     * @var string
     *
     * @ORM\Column(name="caption_ru", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $captionRu;

    /**
     * Вкл / выкл
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status = true;

    /**
     * @ORM\ManyToMany(targetEntity="Core\DeliveryBundle\Entity\ServiceWithAddress", mappedBy="addresses", cascade={"persist"})
     */
    private $services;

    /**
     * Описание
     * @ORM\Column(name="description", type="text", nullable=true)
     * @var string
     */
    private $description;

    /**
     * Ссылка на карту
     * @ORM\Column(name="map_link", type="text", nullable=true)
     * @var string
     */
    private $mapLink;

    /**
     * @var Core\DirectoryBundle\Entity\City
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\City", inversedBy="selfPickupPlaces", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     * @Assert\NotBlank()
     */
    private $city;

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
     * @ORM\Column(type="boolean", nullable=true, options={"default":0})
     * @Assert\Type(type="scalar")
     * @var boolean
     */
    private $isSupplyPlacticCard = false;

    public function __construct()
    {
        $this->services = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getFullCaptionRu();
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
     * @return Adress
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
     * Set captionRu
     *
     * @param string $captionRu
     * @return Adress
     */
    public function setCaptionRu($captionRu)
    {
        $this->captionRu = $captionRu;

        return $this;
    }

    /**
     * Get captionRu
     *
     * @return string 
     */
    public function getCaptionRu()
    {
        return $this->captionRu;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Adress
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function getServices()
    {
        return $this->services;
    }

    public function setServices($services)
    {
        $this->services = $services;
        return $this;
    }

    public function addService(Service $service = null)
    {
        $this->services->add($service);
    }

    public function removeService(Service $service = null)
    {
        $this->services->removeElement($service);
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getMapLink()
    {
        return $this->mapLink;
    }

    public function setMapLink($mapLink)
    {
        $this->mapLink = $mapLink;
        return $this;
    }

    /**
     * @param \Core\DeliveryBundle\Entity\Core\DirectoryBundle\Entity\City $city
     */
    public function setCity(City $city = null)
    {
        $this->city = $city;
    }

    /**
     * @return \Core\DeliveryBundle\Entity\Core\DirectoryBundle\Entity\City
     */
    public function getCity()
    {
        return $this->city;
    }

    public function getFullCaptionRu()
    {
        $city = ($this->getCity()) ? $this->getCity()->getName() . ', ': '';
        return $city . $this->getCaptionRu();
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }
    
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getIsSupplyPlacticCard()
    {
        return $this->isSupplyPlacticCard;
    }

    public function setIsSupplyPlacticCard($isSupplyPlacticCard)
    {
        $this->isSupplyPlacticCard = $isSupplyPlacticCard;
        
        return $this;
    }


}
