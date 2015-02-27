<?php

/**
 * Группы для конфигураций
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ConfigBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="core_config_group")
 * @ORM\Entity(repositoryClass="Core\ConfigBundle\Entity\Repository\GroupRepository")
 */
class Group
{

    /**
     * Первичный ключ
     * @var integer
     * @ORM\Column(name="id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(type="bigint", nullable=true)
     */
    protected $indexPosition;


    /**
     * Название
     * @var string
     * @ORM\Column(type="string",  length=300)
     * @Assert\NotBlank()
     */
    protected $caption;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Group
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * @param string $caption
     * @return Group
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * @return int
     */
    public function getIndexPosition()
    {
        return $this->indexPosition;
    }

    /**
     * @param int $indexPosition
     * @return Group
     */
    public function setIndexPosition($indexPosition)
    {
        $this->indexPosition = $indexPosition;
        return $this;
    }


}
