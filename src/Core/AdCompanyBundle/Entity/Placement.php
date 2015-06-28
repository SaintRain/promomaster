<?php

/**
 * Сущность размещений в рекламной компании
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
 * @ORM\Table(name="core_adcompany_placement")
 * @ORM\Entity(repositoryClass="Core\AdCompanyBundle\Entity\Repository\PlacementRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Assert\Callback(methods={"isValid"})
 */
class Placement
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
     * Рекламная компания в рамках которой идет размещение
     * @ORM\ManyToOne(targetEntity="AdCompany", inversedBy="placements")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $adCompany;


    /**
     * Рекламная место
     * @ORM\ManyToOne(targetEntity="Core\SiteBundle\Entity\AdPlace", inversedBy="placements")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $adPlace;


    /**
     * Настройки показа баннера или баннеров
     * @ORM\OneToMany(targetEntity="PlacementBanner", mappedBy="placement", cascade={"persist"}, orphanRemoval=true)
     */
    private $placementBannersList;


    /**
     * Дата начала показов
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $startDateTime;


    /**
     * Дата окончания показов
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $finishDateTime;


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
     * Включить размещение
     * @var int
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isEnabled = false;


    /**
     * Дефолтные страны по которым ограничить вывод
     * @ORM\ManyToMany(targetEntity="Core\DirectoryBundle\Entity\Country", cascade={"persist"},   fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="core_ad_company_placement_match_country")
     */
    private $defaultCountries;


    /**
     * Количество показов/кликов/дней
     * @var int
     * @ORM\Column(type="bigint", nullable=true)
     *
     */
    private $quantity;


    /**
     * Ценовая модель для указанного количества
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\PriceModel")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $quantityModel;


    /**
     * Статистика
     * @ORM\OneToMany(targetEntity="Core\StatisticsBundle\Entity\Statistics", mappedBy="placement")
     */
    private $statistics;

    private $isActive;   //хранит временное значение активности компаниии

    public function __construct()
    {
        $this->placementBannersList = new ArrayCollection();
        $this->defaultCountries = new ArrayCollection();
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
     * @return mixed
     */
    public function getAdCompany()
    {
        return $this->adCompany;
    }

    /**
     * @param mixed $adCompany
     */
    public function setAdCompany($adCompany)
    {
        $this->adCompany = $adCompany;
    }

    /**
     * @return mixed
     */
    public function getAdPlace()
    {
        return $this->adPlace;
    }

    /**
     * @param mixed $adPlace
     */
    public function setAdPlace($adPlace)
    {
        $this->adPlace = $adPlace;
    }

    /**
     * @return mixed
     */
    public function getPlacementBannersList()
    {
        return $this->placementBannersList;
    }

    /**
     * @param mixed $placementBannersList
     */
    public function setPlacementBannersList($placementBannersList)
    {
        $this->placementBannersList = $placementBannersList;
    }


    public function addPlacementBannersList($placementBanner)
    {
        if (!$this->placementBannersList->contains($placementBanner) && $placementBanner !== null) {
            $placementBanner->setPlacement($this);
            $this->placementBannersList->add($placementBanner);
        }

        return $this;
    }

    public function removePlacementBannersList($placementBanner)
    {
        $this->placementBannersList->removeElement($placementBanner);

        return $this;
    }


    /**
     * @return \DateTime
     */
    public function getStartDateTime()
    {
        return $this->startDateTime;
    }

    /**
     * @param \DateTime $startDateTime
     */
    public function setStartDateTime($startDateTime)
    {
        $this->startDateTime = $startDateTime;
    }

    /**
     * @return \DateTime
     */
    public function getFinishDateTime()
    {
        return $this->finishDateTime;
    }

    /**
     * @param \DateTime $finishDateTime
     */
    public function setFinishDateTime($finishDateTime)
    {
        $this->finishDateTime = $finishDateTime;
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
    public function getDefaultCountries()
    {
        return $this->defaultCountries;
    }

    /**
     * @param mixed $defaultCountries
     */
    public function setDefaultCountries($defaultCountries)
    {
        $this->defaultCountries = $defaultCountries;
    }

    public function addDefaultCountries($defaultCountry)
    {
        if (!$this->defaultCountries->contains($defaultCountry)) {
            $this->defaultCountries->add($defaultCountry);
        }

        return $this;
    }

    public function removeDefaultCountries($defaultCountry)
    {
        $this->defaultCountries->removeElement($defaultCountry);

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
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
     * @return mixed
     */
    public function getQuantityModel()
    {
        return $this->quantityModel;
    }

    /**
     * @param mixed $quantityModel
     */
    public function setQuantityModel($quantityModel)
    {
        $this->quantityModel = $quantityModel;
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }


    /**
     * Дополнительные проверки
     */
    public function isValid(ExecutionContextInterface $context)
    {

        if (!is_null($this->quantity) && $this->quantity < 1) {
            $context->buildViolation('Неверно указано количество.')
                ->atPath('quantity')
                ->addViolation();
        } else {

            if (!$this->quantity) {

                if (!$this->startDateTime) {
                    $context->buildViolation('Неверно задана начальная дата.')
                        ->atPath('startDateTime')
                        ->addViolation();
                }
                if (!$this->finishDateTime) {
                    $context->buildViolation('Неверно задана конечная дата.')
                        ->atPath('finishDateTime')
                        ->addViolation();
                }

            } else if (!$this->quantityModel) {
                $context->buildViolation('Необходимо выбрать в чем указано количество.')
                    ->atPath('quantityModel')
                    ->addViolation();
            }

        }


//        if ($this->number && !$this->price) {
//
//        }
    }

}

