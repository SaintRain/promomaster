<?php

/**
 * Класс доставок траспортных компаний
 * для которых необходимо точно знать адреса
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Core\DeliveryBundle\Entity\Repository\ServiceWithAddressRepository")
 */
class ServiceWithAddress extends Service
{
    
    /**
     * @ORM\ManyToMany(targetEntity="Core\DeliveryBundle\Entity\Address", inversedBy="services", cascade={"persist"})
     * @ORM\JoinTable(name="core_delivery_service_match_address")
     */
    private $addresses;

    public function __construct()
    {
        $this->addresses = new ArrayCollection();
    }

    public function getAddresses()
    {
        return $this->addresses;
    }

    public function setAddresses($addresses)
    {
        $this->addresses = $addresses;
        
        return $this;
    }

    public function addAddresse(Address $address)
    {
        $this->addresses->add($address);
    }

    public function removeAddresse(Address $address)
    {
        $this->addresses->removeElement($address);
    }

}