<?php
/**
 * Единицы измерения
 * 
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
//подключаем языки
use Core\CommonBundle\TranslatableProperties\Caption;
use Core\CommonBundle\TranslatableProperties\ShortCaption;

/**
 * 
 * @ORM\Table(name="core_directory_unit_of_measure")
 * @ORM\Entity(repositoryClass="Core\DirectoryBundle\Entity\Repository\UnitOfMeasureRepository")
 */
class UnitOfMeasure
{

    use Caption,
        ShortCaption;
    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Международный код единицы измерения
     * @var string
     * @ORM\Column(type="string", length=10, nullable=true)
     * @Assert\NotBlank
     */
    private $code;

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
     * Группа для единицы измерения
     * @var int
     * @ORM\ManyToOne(targetEntity="UnitOfMeasureGroup", inversedBy="unitsGroup")
     * @ORM\JoinColumn(referencedColumnName="id")
     *
     */
    private $group;

    /**
     * Код Okei
     * @var string
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank()
     */
    private $okeiCode;

    public function getId()
    {
        return $this->id;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
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

    public function getGroup()
    {
        return $this->group;
    }

    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
    }

    function getOkeiCode()
    {
        return $this->okeiCode;
    }

    function setOkeiCode($okeiCode)
    {
        $this->okeiCode = $okeiCode;
        return $this;
    }
}