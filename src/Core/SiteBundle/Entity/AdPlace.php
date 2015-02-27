<?php

/**
 * Сущность рекламных мест
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\ExecutionContextInterface;

/**
 * @ORM\Table(name="core_site_ad_place")
 * @ORM\Entity(repositoryClass="Core\SiteBundle\Entity\Repository\AdPlaceRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Assert\Callback(methods={"isValid"})
 */
class AdPlace
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
     * Название рекламного менста
     * @var string
     * @ORM\Column(type="string", length=250, nullable=false)
     * @Assert\NotBlank()
     */
    private $name;


    /**
     * Размер рекламного места
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\AdPlaceSize")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $size;


    /**
     * Настраиваемая Ширина
     * @var bigint
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $width;

    /**
     * Настраиваемая Высота
     * @var bigint
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $height;

    /**
     * Сайт на котором находится рекламное место
     * @ORM\ManyToOne(targetEntity="Site")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $site;

    /**
     * Пользователь, которому принадлежит сайт
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $user;

    /**
     * Выводить в каталог
     * @var \DateTime
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isShowInCatalog;


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
     * Рекламные места для которых действует раздел
     * @ORM\ManyToMany(targetEntity="Section", cascade={"persist"},  mappedBy="adPlaces")
     */
    private $sections;

    public function __construct()
    {
        $this->sections = new ArrayCollection();
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
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
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
     * @return mixed
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param mixed $site
     */
    public function setSite($site)
    {
        $this->site = $site;
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
     * @return mixed
     */
    public function getIsShowInCatalog()
    {
        return $this->isShowInCatalog;
    }

    /**
     * @param mixed $isShowInCatalog
     */
    public function setIsShowInCatalog($isShowInCatalog)
    {
        $this->isShowInCatalog = $isShowInCatalog;
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
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * @param mixed $sections
     */
    public function setSections($sections)
    {
        $this->sections = $sections;
    }


    /**
     * Дополнительные проверки
     */
    public function isValid(ExecutionContextInterface $context)
    {
            if ($this->size && $this->size->getName()=='specialnoe') {

                if (!$this->height) {
                    $context->buildViolation('Пожалуйста, укажите высоту.')
                        ->atPath('height')
                        ->addViolation();
                }

                if (!$this->width) {
                    $context->buildViolation('Пожалуйста, укажите ширину.')
                        ->atPath('height')
                        ->addViolation();
                }

            }
        }


}

