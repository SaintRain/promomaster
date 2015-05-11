<?php

/**
 * Статистика показов/кликов для настроек баннеров размещения
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="core_statistics")
 * @ORM\Entity(repositoryClass="Core\StatisticsBundle\Entity\Repository\StatisticsRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Assert\Callback(methods={"isValid"})
 */
class Statistics
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
     * Рекламная место
     * @ORM\ManyToOne(targetEntity="Core\SiteBundle\Entity\AdPlace", inversedBy="statistics")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     * @Assert\NotBlank()
     */
    private $adPlace;

    /**
     * Размещение
     * @ORM\ManyToOne(targetEntity="Core\AdCompanyBundle\Entity\Placement", inversedBy="statistics")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     * @Assert\NotBlank()
     */
    private $placement;


    /**
     * Баннер размещения
     * @ORM\ManyToOne(targetEntity="Core\AdCompanyBundle\Entity\PlacementBanner", inversedBy="statistics")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     * @Assert\NotBlank()
     */
    private $placementBanner;

    /**
     * Баннер
     * @ORM\ManyToOne(targetEntity="Core\BannerBundle\Entity\CommonBanner", inversedBy="statistics")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     * @Assert\NotBlank()
     */
    private $banner;

    /**
     * Дата начала сбора статистики
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $startDateTime;


    /**
     * Дата окончания показов
     * @var \DateTime
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $finishDateTime;

    /**
     * Количество показов/кликов/дней
     * @var int
     * @ORM\Column(type="bigint", nullable=false)
     * @Assert\NotBlank()
     */
    private $showsQuantity;


    /**
     * Количество кликов
     * @var int
     * @ORM\Column(type="bigint", nullable=false)
     * @Assert\NotBlank()
     */
    private $clicksQuantity;

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
    public function getPlacement()
    {
        return $this->placement;
    }

    /**
     * @param mixed $placement
     */
    public function setPlacement($placement)
    {
        $this->placement = $placement;
    }

    /**
     * @return mixed
     */
    public function getPlacementBanner()
    {
        return $this->placementBanner;
    }

    /**
     * @param mixed $placementBanner
     */
    public function setPlacementBanner($placementBanner)
    {
        $this->placementBanner = $placementBanner;
    }

    /**
     * @return mixed
     */
    public function getBanner()
    {
        return $this->banner;
    }

    /**
     * @param mixed $banner
     */
    public function setBanner($banner)
    {
        $this->banner = $banner;
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
     * @return int
     */
    public function getShowsQuantity()
    {
        return $this->showsQuantity;
    }

    /**
     * @param int $showsQuantity
     */
    public function setShowsQuantity($showsQuantity)
    {
        $this->showsQuantity = $showsQuantity;
    }

    /**
     * @return int
     */
    public function getClicksQuantity()
    {
        return $this->clicksQuantity;
    }

    /**
     * @param int $clicksQuantity
     */
    public function setClicksQuantity($clicksQuantity)
    {
        $this->clicksQuantity = $clicksQuantity;
    }


}
