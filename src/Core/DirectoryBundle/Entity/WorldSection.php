<?php

 /**
 * 
 * @author  Kaluzhy N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
//подключаем языки
use Core\CommonBundle\TranslatableProperties\Caption;

/**
 * Части мира
 * @ORM\Table(name= "core_directory_world_section")
 * @ORM\Entity(repositoryClass="Core\DirectoryBundle\Entity\Repository\WorldSectionRepository")
 */
class WorldSection
{
    use Caption;

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
     * @ORM\Column(name="name", type="string", length=255)
     * @Gedmo\Slug(fields={"captionRu"})
     */
    private $name;

    /**
     * @var datetime $createdDatetime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="createdDatetime", type="datetime")
     */
    private $createdDatetime;

    /**
     * @var datetime $updatedDatetime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updatedDatetime", type="datetime")
     */
    private $updatedDatetime;

    /**
     * Список городов
     * @var Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="Country", mappedBy="worldSection", cascade={"persist"}, orphanRemoval=true, fetch="EXTRA_LAZY")
     */
    private $countryList;


    public function __construct()
    {
        $this->countryList = new ArrayCollection();
    }

    public function __toString()
    {
        return (string)$this->captionRu;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getCreatedDatetime()
    {
        return $this->createdDatetime;
    }

    public function getUpdatedDatetime()
    {
        return $this->updatedDatetime;
    }

    /**
     * @return Doctrine\Common\Collections\ArrayCollection
     */
    public function getCountryList()
    {
        return $this->countryList;
    }

    /**
     * @param Doctrine\Common\Collections\ArrayCollection $countryList
     */
    public function setCountryList(ArrayCollection $countryList)
    {
        $this->countryList = $countryList;
        return $this;
    }

}