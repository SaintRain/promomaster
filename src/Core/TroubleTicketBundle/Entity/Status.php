<?php

namespace Core\TroubleTicketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Status
 *
 * @ORM\Table(name="core_trouble_ticket_status")
 * @ORM\Entity(repositoryClass="Core\TroubleTicketBundle\Entity\Repository\StatusRepository")
 *
 */
class Status
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

    /**
     * Доступ для редактирования тикета с фронтэнда
     * @var boolean
     * @ORM\Column(name="is_editable", type="boolean")
     * @Assert\Type(type="bool")
     */
    private $isEditable = true;


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
     * Set caption
     *
     * @param string $caption
     * @return Status
     */
    public function setCaptionRu($captionRu)
    {
        $this->captionRu = $captionRu;

        return $this;
    }

    /**
     * Get caption
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
     * @return Status
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

    public function getIsEditable()
    {
        return $this->isEditable;
    }

    public function setIsEditable($isEditable)
    {
        $this->isEditable = $isEditable;

        return $this;
    }

}
