<?php

/**
 * Cтатусы для презаказов
 * @author  Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Entity\PreOrder;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Table(name="core_order_pre_order_status")
 * @ORM\Entity(repositoryClass="Core\OrderBundle\Entity\Repository\PreOrder\PreOrderStatusRepository")
 * @UniqueEntity("name")
 */
class PreOrderStatus
{

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Статус
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $captionRu;

    /**
     * Системное имя статуса
     * @var string
     * @Gedmo\Slug(fields={"captionRu"}, updatable=false, unique=true, separator="-")
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * Индекс позиции сортировки
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $indexPosition;

    /**
     * Цвет в формате hex
     * @var string
     * @ORM\Column(type="string", length=6, nullable=true)
     */
    private $hex;

    public function getId()
    {
        return $this->id;
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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
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

    public function getGeneralStatus()
    {
        return $this->generalStatus;
    }

    public function setGeneralStatus($generalStatus)
    {
        $this->generalStatus = $generalStatus;
        return $this;
    }

    public function getHex()
    {
        return $this->hex;
    }

    public function setHex($hex)
    {
        $this->hex = $hex;
        return $this;
    }
}
