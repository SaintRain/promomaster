<?php
/**
 * Группы единиц измерения 
 * 
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="core_directory_unit_of_measure_group")
 * @UniqueEntity("name")
 * @ORM\Entity(repositoryClass="Core\DirectoryBundle\Entity\Repository\UnitOfMeasureGroupRepository")
 */
class UnitOfMeasureGroup
{
    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var datetime
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var datetime
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

    /**
     * Индекс позиции сортировки
     * @var bigint
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPosition;

    /**
     * Активность единицы измерения
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $isEnabled = true;

    /**
     * Название 
     * @var string
     * @ORM\Column(type="string", length=100, nullable=false)
     * @Assert\NotBlank
     */
    private $captionRu;

    /**
     * Список единиц измерений в группе
     * @var string
     * @ORM\OneToMany(targetEntity="UnitOfMeasure", mappedBy="group")
     */
    private $unitsGroup;

    /**
     * Кодовое имя группы
     * @var string
     * @Gedmo\Slug(fields={"captionRu"}, updatable=false, unique=true, separator="-")
     * @ORM\Column(type="string", unique=true, length=255)
     */
    private $name;

    public function getId()
    {
        return $this->id;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getIndexPosition()
    {
        return $this->indexPosition;
    }

    public function setIndexPosition($indexPosition)
    {
        $this->indexPosition = $indexPosition;
        return $this;
    }

    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
        return $this;
    }

    public function getCaptionRu()
    {
        return $this->captionRu;
    }

    public function setCaptionRu($captionRu)
    {
        $this->captionRu = $captionRu;
        return $this;
    }

    public function getUnitsGroup()
    {
        return $this->unitsGroup;
    }

    public function setUnitsGroup(ArrayCollection $unitsGroup)
    {
        $this->unitsGroup = $unitsGroup;
        return $this;
    }

    function getName()
    {
        return $this->name;
    }

    function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}