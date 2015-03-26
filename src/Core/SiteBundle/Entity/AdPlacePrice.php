<?php

/**
 * Стоимость рекламы в рекламн месте
 * @author  Kaluzhy N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Entity;

use Core\DirectoryBundle\Entity\PriceModel;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AdPlacePrice
 *
 * @ORM\Table(name="ad_place_price")
 * @ORM\Entity(repositoryClass="Core\SiteBundle\Entity\Repository\AdPlacePriceRepository")
 */
class AdPlacePrice
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdDateTime", type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdDateTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedDateTime", type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedDateTime;

    /**
     * @var string
     *
     * @ORM\Column(name="cost", type="decimal", scale=2)
     * @Assert\NotBlank()
     * @Assert\GreaterThanOrEqual(value = 0)
     */
    private $cost;

    /**
     * Рекламное место
     * @var \Core\SiteBundle\Entity\AdPlace
     * @ORM\ManyToOne(targetEntity="AdPlace", inversedBy="prices")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $adPlace;

    /**
     * Ценовая модель
     * @var PriceModel
     * @ORM\ManyToOne(targetEntity="Core\DirectoryBundle\Entity\PriceModel")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $priceModel;

    /**
     * Размещения
     * @ORM\OneToMany(targetEntity="AdPlacePriceDiscount", mappedBy="adPlacePrice", cascade={"persist"}, orphanRemoval=true)
     */
    private $discounts;

    public function __construct()
    {
        $this->discounts = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get createdDateTime
     *
     * @return \DateTime 
     */
    public function getCreatedDateTime()
    {
        return $this->createdDateTime;
    }

    /**
     * Get updatedDateTime
     *
     * @return \DateTime 
     */
    public function getUpdatedDateTime()
    {
        return $this->updatedDateTime;
    }

    /**
     * Set cost
     *
     * @param string $cost
     * @return AdPlacePrice
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return string 
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @return \Core\SiteBundle\Entity\AdPlace
     */
    public function getAdPlace()
    {
        return $this->adPlace;
    }

    /**
     * @param AdPlace $adPlace
     */
    public function setAdPlace(AdPlace $adPlace = null)
    {
        $this->adPlace = $adPlace;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDiscounts()
    {
        return $this->discounts;
    }

    /**
     * @param mixed $discounts
     */
    public function setDiscounts($discounts)
    {
        $this->discounts = $discounts;

        return $this;
    }


    /**
     * @param AdPlacePriceDiscount $discount
     * @return $this
     */
    public function addDiscount(AdPlacePriceDiscount $discount = null)
    {
        if (!$this->discounts->contains($discount)) {
            $this->discounts->add($discount);
            $discount->setAdPlacePrice($this);
        }

        return $this;
    }

    /**
     * @param AdPlacePriceDiscount $discount
     * @return $this
     */
    public function removeDiscount(AdPlacePriceDiscount $discount)
    {
        if ($this->discounts->contains($discount)) {
            $this->discounts->removeElement($discount);
        }

        return $this;
    }

    /**
     * @return PriceModel
     */
    public function getPriceModel()
    {
        return $this->priceModel;
    }

    /**
     * @param PriceModel $priceModel
     */
    public function setPriceModel(PriceModel $priceModel = null)
    {
        $this->priceModel = $priceModel;
        return $this;
    }

}
