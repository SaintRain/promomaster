<?php

/**
 * Сущность страны
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Intl\Intl;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="core_directory_country")
 * @ORM\Entity(repositoryClass="Core\DirectoryBundle\Entity\Repository\CountryRepository")
 */
class Country
{

    /**
     * Первичный ключ
     * @var smallint
     * @ORM\Column(name="id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Активность страны
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $isEnabled;

    /**
     * Двухбуквенное название страны
     * @var string
     * @ORM\Column(type="string", length=2, nullable=false)
     * @Assert\NotBlank()
     */
    private $alpha2;

    /**
     * Трехзначный цифровой код страны
     * @var string
     * @ORM\Column(name="numeric_code", type="string", length=3, nullable=false)
     * @Assert\NotBlank()
     */
    private $numeric;

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
     * Список городов
     * @var Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="City", mappedBy="country", cascade={"persist"}, orphanRemoval=true, fetch="EXTRA_LAZY")
     */
    private $cityList;

    /**
     * Список городов
     * @var Doctrine\Common\Collections\ArrayCollection
     * @ORM\OneToMany(targetEntity="Region", mappedBy="country", cascade={"persist"}, orphanRemoval=true, fetch="EXTRA_LAZY")
     */
    private $regionList;

    /**
     * Виртуаьлное поле (вычисляемое)
     * Кол-во городов для страны
     * @var type
     */
    private $citiesAmount = 0;

    public function __toString()
    {
        return $this->getCaptionRu();
    }

    public function __construct()
    {
        $this->isEnabled = false;
        $this->cityList = new ArrayCollection();
        $this->regionList = new ArrayCollection();
    }

    public function __call($name, $arguments)
    {
        if (strpos($name, 'getCaption') === 0) {

            $locale = strtolower(substr($name, -2));

            $caption = Intl::getRegionBundle()->getCountryName($this->alpha2, $locale);

            if ($caption === null) {
                $caption = Intl::getRegionBundle()->getCountryName($this->alpha2, 'ru');
            }

            if (is_null($caption)) {
                $caption='';
            }
            return $caption;
        }
    }

    public function __get($name)
    {
        return $this->{'get' . ucfirst($name)}();
    }

    public function getId()
    {
        return $this->id;
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

    public function getAlpha2()
    {
        return $this->alpha2;
    }

    public function setAlpha2($alpha2)
    {
        $this->alpha2 = $alpha2;
        return $this;
    }

    public function getNumeric()
    {
        return $this->numeric;
    }

    public function setNumeric($numeric)
    {
        $this->numeric = $numeric;
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

    public function getCityList()
    {
        return $this->cityList;
    }

    public function setCityList($cityList)
    {
        $this->cityList = $cityList;

        return $this;
    }

    public function getCitiesAmount()
    {
        return $this->citiesAmount;
    }

    public function setCitiesAmount($citiesAmount = 0)
    {
        $this->citiesAmount = $citiesAmount;

        return $this;
    }

    public function getRegionList()
    {
        return $this->regionList;
    }

    public function setRegionList(ArrayCollection $regionList)
    {
        $this->regionList = $regionList;

        return $this;
    }

    public function getRegionsAmount()
    {
        return $this->regionList->count();
    }

    public function getCaption($locale)
    {
        return $caption = Intl::getRegionBundle()->getCountryName($this->alpha2, $locale);
    }
}
