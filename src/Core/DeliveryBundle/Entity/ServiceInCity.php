<?php

/**
 * Класс доставок траспортных компаний
 * для которых необходимо точно знать города
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Core\DirectoryBundle\Entity\City;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="Core\DeliveryBundle\Entity\Repository\ServiceInCityRepository")
 */

class ServiceInCity extends Service
{
    /**
     * @var \Core\DirectoryBundle\Entity\City
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\City", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     * @Assert\NotBlank()
     */
    private $city;

    /**
     * Описание
     * @ORM\Column(name="description", type="text", nullable=true)
     * @Assert\NotBlank()
     * @var string
     */
    private $description;

    /**
     * @param \Core\DirectoryBundle\Entity\City $city
     */
    public function setCity(City $city = null)
    {
        $this->city = $city;
    }

    /**
     * @return \Core\DirectoryBundle\Entity\City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }


} 