<?php

/**
 * Поле "Комплектация" выносим в отдельные треит
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\TranslatableProperties;

trait Complectation
{

    /**
     * Описание
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $complectationRu
    ;

    /**
     * Описание
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $complectationEn;

    public function getComplectationRu()
    {
        return $this->complectationRu;
    }

    public function getComplectationEn()
    {
        return $this->complectationEn;
    }

    public function setComplectationRu($complectationRu)
    {
        $this->complectationRu = $complectationRu;
        return $this;
    }

    public function setComplectationEn($complectationEn)
    {
        $this->complectationEn = $complectationEn;
        return $this;
    }

}
