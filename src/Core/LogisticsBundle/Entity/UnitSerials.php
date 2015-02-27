<?php

/**
 * Серийники для товарных единиц на складе
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\ExecutionContextInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Table(name="core_logistics_unit_serials")
 * @ORM\Entity(repositoryClass="Core\LogisticsBundle\Entity\Repository\UnitSerialsRepository")
 * @UniqueEntity("value")
 * @Assert\Callback(methods={"isValid"})
 */
class UnitSerials {

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Товарная единица для которой прописываются серийники
     * @ORM\ManyToOne(targetEntity="UnitInStock", inversedBy="serials")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     * @Assert\NotBlank()
     */
    private $unit;

    /**
     * MAC-адрес или Серийный номер
     * @var string
     * @ORM\Column(type="string", length=64, nullable=true, unique=true)
     * @Assert\NotBlank()
     */
    private $value;

    /**
     * Время создания
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdDateTime;

    public function getId() {
        return $this->id;
    }

    public function getUnit() {
        return $this->unit;
    }

    public function setUnit($unit) {
        $this->unit = $unit;
        return $this;
    }

    public function getValue() {
        return $this->value;
    }

    public function setValue($value) {
        $this->value = $value;
        return $this;
    }

    public function getCreatedDateTime() {
        return $this->createdDateTime;
    }

    public function setCreatedDateTime(\DateTime $createdDateTime) {
        $this->createdDateTime = $createdDateTime;
        return $this;
    }

}

