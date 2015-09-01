<?php

/**
 * Сущность настроек баннера, который будет крутиться в рекламном месте
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
 * @ORM\Table(name="core_adcompany_placement_banner")
 * @ORM\Entity(repositoryClass="Core\AdCompanyBundle\Entity\Repository\PlacementBannerRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Assert\Callback(methods={"isValid"})
 */
class PlacementBanner
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
     * Баннер, который следует крутить
     * @ORM\ManyToOne(targetEntity="Core\BannerBundle\Entity\CommonBanner")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $banner;


    /**
     * Для какого размещения создана настройка
     * @ORM\ManyToOne(targetEntity="Placement", cascade={"persist"}, inversedBy="placementBannersList")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     * @Assert\NotBlank()
     */
    private $placement;


    /**
     * Преоритет показа
     * @var int
     * @Assert\GreaterThan(value = 0)
     * @ORM\Column(type="bigint", nullable=false, options={"default":1})
     */
    private $preoritet;


    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPosition;

    /**
     * Дефолтные страны по которым ограничить вывод
     * ORM\ManyToMany(targetEntity="Core\DirectoryBundle\Entity\Country", cascade={"persist"},   fetch="EXTRA_LAZY")
     * ORM\JoinTable(name="core_ad_company_placement_banner_match_country")
     */
    //private $defaultCountries;

    /**
     * Статистика
     * ORM\OneToMany(targetEntity="Core\StatisticsBundle\Entity\Statistics", mappedBy="placementBanner")
     */
//    private $statistics;


    public function __construct()
    {
        //  $this->defaultCountries = new ArrayCollection();
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
    public function getCreatedDateTime()
    {
        return $this->createdDateTime;
    }

    /**
     * @param mixed $createdDateTime
     */
    public function setCreatedDateTime($createdDateTime)
    {
        $this->createdDateTime = $createdDateTime;
    }

    /**
     * @return int
     */
    public function getPreoritet()
    {
        return $this->preoritet;
    }

    /**
     * @param int $preoritet
     */
    public function setPreoritet($preoritet)
    {
        if (!$preoritet) {
            $preoritet=1;
        }
        $this->preoritet = $preoritet;
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

//    /**
//     * @return mixed
//     */
//    public function getStatistics()
//    {
//        return $this->statistics;
//    }
//
//    /**
//     * @param mixed $statistics
//     */
//    public function setStatistics($statistics)
//    {
//        $this->statistics = $statistics;
//    }



//    /**
//     * @return mixed
//     */
//    public function getDefaultCountries()
//    {
//        return $this->defaultCountries;
//    }
//
//    /**
//     * @param mixed $defaultCountries
//     */
//    public function setDefaultCountries($defaultCountries)
//    {
//        $this->defaultCountries = $defaultCountries;
//    }
//
//    public function addDefaultCountries($defaultCountry)
//    {
//        if (!$this->defaultCountries->contains($defaultCountry)) {
//            $this->defaultCountries->add($defaultCountry);
//        }
//
//        return $this;
//    }
//
//    public function removeDefaultCountries($defaultCountry)
//    {
//        $this->defaultCountries->removeElement($defaultCountry);
//
//        return $this;
//    }


    /**
     * Дополнительные проверки
     */
    public function isValid(ExecutionContextInterface $context)
    {
//        if ($this->preoritet<1) {
//            $context->buildViolation('Приоритет должен быть больше нуля.')
//                        ->atPath('preoritet')
//                        ->addViolation();
//        }
    }

}

