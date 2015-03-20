<?php

/**
 * Скидка на стоимости размещения рекламы
 * @author  Kaluzhy N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * AdPlacePriceDiscount
 *
 * @ORM\Table(name="ad_place_price_discount")
 * @ORM\Entity(repositoryClass="Core\SiteBundle\Entity\Repository\AdPlacePriceDiscountRepository")
 */
class AdPlacePriceDiscount
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
     * Ставка (пока только проценты)
     * @var integer
     *
     * @ORM\Column(name="rate", type="integer")
     * @Assert\NotBlank()
     * @Assert\GreaterThanOrEqual(value = 1)
     */
    private $rate;

    /**
     * Количество
     * @ORM\Column(name="amount", type="integer")
     * @Assert\NotBlank()
     * @Assert\GreaterThanOrEqual(value = 2)
     */
    private $amount;

    /**
     * @var integer
     *
     * @ORM\Column(name="indexPosition", type="integer", nullable=true)
     */
    private $indexPosition;

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
     * Рекламное место
     * @var AdPlacePrice
     * @ORM\ManyToOne(targetEntity="AdPlacePrice", inversedBy="discounts")
     * @ORM\JoinColumn(referencedColumnName="id", nullable=false)
     * @Assert\NotBlank
     */
    private $adPlacePrice;

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
     * @return int
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param int $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
        return $this;
    }



    /**
     * Set indexPosition
     *
     * @param integer $indexPosition
     * @return AdPlacePriceDiscount
     */
    public function setIndexPosition($indexPosition)
    {
        $this->indexPosition = $indexPosition;

        return $this;
    }

    /**
     * Get indexPosition
     *
     * @return integer
     */
    public function getIndexPosition()
    {
        return $this->indexPosition;
    }

    /**
     * Set createdDateTime
     *
     * @param \DateTime $createdDateTime
     * @return AdPlacePriceDiscount
     */
    public function setCreatedDateTime($createdDateTime)
    {
        $this->createdDateTime = $createdDateTime;

        return $this;
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
     * Set updatedDateTime
     *
     * @param \DateTime $updatedDateTime
     * @return AdPlacePriceDiscount
     */
    public function setUpdatedDateTime($updatedDateTime)
    {
        $this->updatedDateTime = $updatedDateTime;

        return $this;
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
     * @return AdPlacePrice
     */
    public function getAdPlacePrice()
    {
        return $this->adPlacePrice;
    }

    /**
     * @param AdPlacePrice $adPlacePrice
     */
    public function setAdPlacePrice(AdPlacePrice $adPlacePrice)
    {
        $this->adPlacePrice = $adPlacePrice;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }
}
