<?php

/**
 * Класс терминала ТК
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Entity;

class Affiliate
{
    /**
     * Номер терминала в системе ТК
     * @var string
     */
    protected $id;

    /**
     * Название тервинала
     * @var string
     */
    protected $captionRu;

    /**
     * Город терминала
     * @var string
     */
    protected $cityCode;

    public function __toString()
    {
        return $this->getCaptionRu();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getCaptionRu()
    {
        return $this->captionRu;
    }

    public function setCaptionRu($captionRu)
    {
        $this->captionRu = $captionRu;
        return $this;
    }


    public function getCityCode()
    {
        return $this->cityCode;
    }

    public function setCityCode($cityCode)
    {
        $this->cityCode = $cityCode;
        return $this;
    }

}