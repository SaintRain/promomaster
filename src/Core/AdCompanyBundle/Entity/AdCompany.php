<?php

/**
 * Сущность рекламной компании
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\AdCompanyBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\ExecutionContextInterface;

/**
 * @ORM\Table(name="core_adcompany")
 * @ORM\Entity(repositoryClass="Core\AdCompanyBundle\Entity\Repository\AdCompanyRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Assert\Callback(methods={"isValid"})
 */
class AdCompany
{

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * Имя компании
     * @var string
     * @ORM\Column(type="string", length=250, nullable=false)
     * @Assert\NotBlank()
     */
    private $name;


    /**
     * Пользователь, которому принадлежит сайт
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $user;


    /**
     * Дата создания
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdDateTime;

    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPosition;



    /**
     * Включить компанию
     * @var int
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isEnabled=false;

    /**
     * Размещения
     * @ORM\OneToMany(targetEntity="Placement", mappedBy="adCompany")
     */
    private $placements;


    public  function __construct() {
        $this->placements = new ArrayCollection();
    }
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
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDateTime()
    {
        return $this->createdDateTime;
    }

    /**
     * @param \DateTime $createdDateTime
     */
    public function setCreatedDateTime($createdDateTime)
    {
        $this->createdDateTime = $createdDateTime;
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
     */
    public function setIndexPosition($indexPosition)
    {
        $this->indexPosition = $indexPosition;
    }

    /**
     * @return int
     */
    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    /**
     * @param int $isEnabled
     */
    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
    }

    /**
     * @return mixed
     */
    public function getPlacements()
    {
        return $this->placements;
    }

    /**
     * @param mixed $placements
     */
    public function setPlacements($placements)
    {
        $this->placements = $placements;
    }

    public function addPlacement($placement)
    {
        $placement->setAdCompany($this);
        $this->placements->add($placement);
        return $this;
    }

    public function removePlacement($placement)
    {
        $this->placements->removeElement($placement);
        return $this;
    }


    /**
     * Дополнительные проверки
     */
    public function isValid(ExecutionContextInterface $context)
    {
//        if ($this->number && !$this->price) {
//            $context->buildViolation('Пожалуйста, укажите цену')
//                        ->atPath('price')
//                        ->addViolation();
//        }
    }

}
