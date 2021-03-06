<?php

/**
 * Основной файл для баннера
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\BannerBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\ExecutionContextInterface;

/**
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorMap({"ImageBanner"="ImageBanner", "FlashBanner"="FlashBanner" , "CodeBanner"="CodeBanner"})
 * @ORM\Table(name="core_banner_common")
 * @ORM\Entity(repositoryClass="Core\BannerBundle\Entity\Repository\CommonBannerRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Assert\Callback(methods={"isValidCommon"})
 */
class CommonBanner implements \JsonSerializable
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
     * Название по которому показывается баннер
     * @var string
     * @ORM\Column(type="string", length=100, nullable=false)
     * @Assert\NotBlank()
     */
    protected $name;


    /**
     * Пользователь, которому принадлежит баннер
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotBlank()
     */
    protected $user;


    /**
     * Дата создания
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    protected $createdDateTime;

    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(type="bigint", nullable=true)
     */
    protected $indexPosition;

    /**
     * Заглушка да - нет
     * @var boolean
     * @ORM\Column(type="boolean", options={"default" = 0})
     */
    protected $isGag = false;

    /**
     * Статистика
     * @ORM\OneToMany(targetEntity="Core\StatisticsBundle\Entity\Statistics", mappedBy="banner")
     */
    protected $statistics;


    public function __construct()
    {
        $this->statistics = new ArrayCollection();
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
     * @return mixed
     */
    public function getStatistics()
    {
        return $this->statistics;
    }

    /**
     * @param mixed $statistics
     */
    public function setStatistics($statistics)
    {
        $this->statistics = $statistics;
    }

    /**
     * @return boolean
     */
    public function isIsGag()
    {
        return $this->isGag;
    }

    /**
     * @param boolean $isGag
     */
    public function setIsGag($isGag)
    {
        $this->isGag = $isGag;

        return $this;
    }

    /**
     * Дополнительные проверки
     */
    public function isValidCommon(ExecutionContextInterface $context)
    {
//        if ($this->number && !$this->price) {
//            $context->buildViolation('Пожалуйста, укажите цену')
//                        ->atPath('price')
//                        ->addViolation();
//        }
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName()
        ];
    }

}

