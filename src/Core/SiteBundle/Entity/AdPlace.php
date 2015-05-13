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
use Core\BannerBundle\Entity\CommonBanner;

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
     * @ORM\ManyToOne(targetEntity="CommonSite" , inversedBy="adPlaces")
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
     * @ORM\ManyToMany(targetEntity="Section", cascade={"persist"},  inversedBy="adPlaces")
     * @ORM\JoinTable(name="core_site_section_match_ad_place")
     */
    private $sections;

    /**
     * Размещения
     * @ORM\OneToMany(targetEntity="Core\AdCompanyBundle\Entity\Placement", mappedBy="adPlace")
     */
    private $placements;

    /**
     * Статистика
     * @ORM\OneToMany(targetEntity="Core\StatisticsBundle\Entity\Statistics", mappedBy="adPlace")
     */
    private $statistics;

    /**
     * Стоимости размещений
     * @ORM\OneToMany(targetEntity="AdPlacePrice", mappedBy="adPlace", cascade={"persist"})
     */
    private $prices;

    /**
     * Заглушка
     * @ORM\ManyToOne(targetEntity="Core\BannerBundle\Entity\CommonBanner")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=true)
     */
    private $gag;

    /**
     * @ORM\ManyToMany(targetEntity="Core\DirectoryBundle\Entity\Country")
     * @ORM\JoinTable(name="core_site_ad_place_match_country",
     *      joinColumns={@ORM\JoinColumn(referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(referencedColumnName="id")}
     *      )
     **/
    private $countryList;

    public function __construct()
    {
        $this->sections = new ArrayCollection();
        $this->placements = new ArrayCollection();
        $this->prices = new ArrayCollection();
        $this->countryList = new ArrayCollection();
    }
/*
    public function __toString()
    {
        return $this->getName();
    }
*/
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

        return $this;
    }

    /**
     * @param Section $section
     */
    public function addSection(Section $section)
    {
        if (!$this->sections->contains($section)) {
            $this->sections->add($section);
            $section->addAdPlace($this);
        } else {
            return;
        }
    }

    /**
     * @param Section $section
     */
    public function removeSection(Section $section)
    {
        if ($this->sections->contains($section)) {
            $this->sections->removeElement($section);
        } else {
            return;
        }
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
        return $this;
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


    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @param $prices
     * @return mixed
     */
    public function setPrices($prices)
    {
        $this->prices = $prices;

        return $this;
    }

    /**
     * @param AdPlacePrice $price
     * @return $this
     */
    public function addPrice(AdPlacePrice $price)
    {
        if (!$this->prices->contains($price)) {
            $this->prices->add($price);
            $price->addAdPlace($this);
        }

        return $this;
    }

    /**
     * @param AdPlacePrice $price
     * @return $this
     */
    public function removePrice(AdPlacePrice $price)
    {
        if ($this->prices->contains($price)) {
            $this->prices->removeElement($price);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGag()
    {
        return $this->gag;
    }

    /**
     * @param mixed $gag
     */
    public function setGag(CommonBanner $gag = null)
    {
        if (!is_null($gag)) {
            $gag->setIsGag(true);
        }
        $this->gag = $gag;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountryList()
    {
        return $this->countryList;
    }

    /**
     * @param mixed $countryList
     */
    public function setCountryList($countryList)
    {
        ldd($countryList);
        $this->countryList = $countryList;

        return $this;
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

