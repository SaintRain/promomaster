<?php
/**
 * Возможные размеры рекламных мест
 * 
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="core_directory_ad_place_size")
 * @UniqueEntity("name")
 * @ORM\Entity(repositoryClass="Core\DirectoryBundle\Entity\Repository\AdPlaceSizeRepository")
 */
class AdPlaceSize
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
     * Название
     * @var string
     * @ORM\Column(type="string", length=100, nullable=false)
     * @Assert\NotBlank
     */
    private $captionRu;

    /**
     * Системное имя
     * @var string
     * @Gedmo\Slug(fields={"captionRu"}, updatable=false, unique=true, separator="-")
     * @ORM\Column(type="string", length=100, nullable=false)
     * @Assert\NotBlank
     */
    private $name;


    /**
     * Ширина
     * @var bigint
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $width;

    /**
     * Высота
     * @var bigint
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $height;


    /**
     * Индекс позиции сортировки
     * @var bigint
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPosition;

    /**
     * Активность
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $isEnabled = true;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCaptionRu()
    {
        return $this->captionRu;
    }

    /**
     * @param string $captionRu
     */
    public function setCaptionRu($captionRu)
    {
        $this->captionRu = $captionRu;
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
    }

    /**
     * @return bigint
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param bigint $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return bigint
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param bigint $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return bigint
     */
    public function getIndexPosition()
    {
        return $this->indexPosition;
    }

    /**
     * @param bigint $indexPosition
     */
    public function setIndexPosition($indexPosition)
    {
        $this->indexPosition = $indexPosition;
    }

    /**
     * @return boolean
     */
    public function isIsEnabled()
    {
        return $this->isEnabled;
    }

    /**
     * @param boolean $isEnabled
     */
    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
    }




}