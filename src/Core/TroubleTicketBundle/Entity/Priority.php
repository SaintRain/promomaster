<?php

namespace Core\TroubleTicketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Priority
 *
 * @ORM\Table(name="core_trouble_ticket_priority")
 * @ORM\Entity(repositoryClass="Core\TroubleTicketBundle\Entity\Repository\PriorityRepository")
 */
class Priority
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
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(name="index_position", type="integer", nullable=true)
     * @Assert\Type(type="integer")
     */
    private $indexPosition;

    /**
     * Активность Статуса
     * @var boolean
     * @ORM\Column(name="is_enabled", type="boolean")
     * @Assert\Type(type="bool")
     */
    private $isEnabled = true;

    /**
     * @var string
     *
     * @ORM\Column(name="caption_ru", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $captionRu;

    /**
     * @var string
     *
     * Транслитерация Friendly URL
     * @Gedmo\Slug(fields={"captionRu"}, updatable=false, unique=true, separator="-")
     * @ORM\Column(name="sys_name", type="string", unique=true, length=255)
     */
    private $sysName;

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
     * @return Priority
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
     * Set sysName
     *
     * @param string $sysName
     * @return Priority
     */
    public function setSysName($sysName)
    {
        $this->sysName = $sysName;
    
        return $this;
    }

    /**
     * Get sysName
     *
     * @return string 
     */
    public function getSysName()
    {
        return $this->sysName;
    }

    /**
     * Set indexPosition
     *
     * @param integer $indexPosition
     * @return Priority
     */
    public function setIndexPosition($indexPosition)
    {
        $this->indexPosition = $indexPosition;
    
        return $this;
    }

    /**
     * Get indexPosition
     *
     * @return integer 
     */
    public function getIndexPosition()
    {
        return $this->indexPosition;
    }

    /**
     * Set isEnabled
     *
     * @param boolean $isEnabled
     * @return Priority
     */
    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
    
        return $this;
    }

    /**
     * Get isEnabled
     *
     * @return boolean 
     */
    public function getIsEnabled()
    {
        return $this->isEnabled;
    }
}
