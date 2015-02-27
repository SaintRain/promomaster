<?php

/**
 * Класс типов услуг траспортных компаний
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * ServiceType
 *
 * @ORM\Table(name="core_delivery_service_type")
 * @ORM\Entity(repositoryClass="Core\DeliveryBundle\Entity\Repository\ServiceTypeRepository")
 * @UniqueEntity("name")
 */
class ServiceType
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
     * @ORM\Column(name="captionRu", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $captionRu;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status = true;

    /**
     * @ORM\OneToMany(targetEntity="Core\DeliveryBundle\Entity\Service", mappedBy="serviceType", cascade={"persist"})
     */
    private $services;

    /**
     * @Gedmo\SortablePosition
     * @ORM\Column(name="position", type="integer")
     */
    private $position;
    
    public function __construct()
    {
        $this->services = new ArrayCollection();
    }
    
    public function __toString()
    {
        return $this->getCaptionRu();
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
     * Set captionRu
     *
     * @param string $captionRu
     * @return ServiceType
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
     * Set name
     *
     * @param string $name
     * @return ServiceType
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
     * Set status
     *
     * @param boolean $status
     * @return ServiceType
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
    
    /**
     *
     * @param Core\DeliveryBundle\Entity\Service $service
     */
    public function addService(Service $service)
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
            $service->setCompany($this);
        }
    }

    /**
     *
     * @return Doctrine\Common\Collections\ArrayCollection
     */
    public function getServices()
    {
        return $this->services;
    }

    public function removeService(Service $service){
        $this->getServices()->removeElement($service);
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function getPosition()
    {
        return $this->position;
    }
}
