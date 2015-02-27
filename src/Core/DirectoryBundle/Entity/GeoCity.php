<?php

/**
 * Сущность соотвествия GeoCity данных maxmind к нашей БД
 *
 * @author  Kaluzhniy. N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * GeoCity
 *
 * @ORM\Table(name="core_directory_geo_city")
 * @ORM\Entity(repositoryClass="Core\DirectoryBundle\Entity\Repository\GeoCityRepository")
 */
class GeoCity
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
     * Город
     * @ORM\ManyToOne(targetEntity="City", cascade={"persist"}, inversedBy="geoCityList")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     * @Assert\NotBlank()
     */
    private $city;
    
    public function getId()
    {
        return $this->id;
    }


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity(City $city = null)
    {
        $this->city = $city;
        
        return $this;
    }

}