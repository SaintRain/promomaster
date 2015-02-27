<?php

/**
 * Сущность разделов
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
 * @ORM\Table(name="core_site_section")
 * @ORM\Entity(repositoryClass="Core\SiteBundle\Entity\Repository\SectionRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Assert\Callback(methods={"isValid"})
 */
class Section
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
     * Название раздела
     * @var string
     * @ORM\Column(type="string", length=250, nullable=false)
     * @Assert\NotBlank()
     */
    private $name;


    /**
     * Выводить баннеры на всех страницах сайта
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isAllPage=true;


    /**
     * Шаблон по которому определяются страницы, где выводить баннеры
     * @var text
     * @ORM\Column(type="text", nullable=true)
     */
    private $urlTemplate;


    /**
     * Пользователь, которому принадлежит сайт
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $user;

    /**
     * Рекламные места для которых действует раздел
     * @ORM\ManyToMany(targetEntity="AdPlace", cascade={"persist"}, inversedBy="sections",  fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="core_site_section_match_ad_place")
     * @Assert\NotBlank()
     */
    private $adPlaces;


    /**
     * Использыется место
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isEnabled=true;


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


    public function __construct()
    {
        $this->adPlaces= new ArrayCollection();
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
     * @return boolean
     */
    public function isIsAllPage()
    {
        return $this->isAllPage;
    }

    /**
     * @param boolean $isAllPage
     */
    public function setIsAllPage($isAllPage)
    {
        $this->isAllPage = $isAllPage;
    }

    /**
     * @return mixed
     */
    public function getUrlTemplate()
    {
        return $this->urlTemplate;
    }

    /**
     * @param mixed $urlTemplate
     */
    public function setUrlTemplate($urlTemplate)
    {
        $this->urlTemplate = $urlTemplate;
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
    public function getAdPlaces()
    {
        return $this->adPlaces;
    }

    /**
     * @param mixed $adPlaces
     */
    public function setAdPlaces($adPlaces)
    {
        $this->adPlaces = $adPlaces;
    }

    /**
     * @return mixed
     */
    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    /**
     * @param mixed $isEnabled
     */
    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
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

