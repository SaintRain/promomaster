<?php

/**
 * Поле "Слоган" выносим в отдельные треит
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\TranslatableProperties;

trait Slogan
{

    /**
     * Слоган
     * @var string
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    protected $sloganRu;

    /**
     * Слоган
     * @var string
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    protected $sloganEn;

    public function getSloganRu()
    {
        return $this->sloganRu;
    }

    public function getSloganEn()
    {
        return $this->sloganEn;
    }

    public function setSloganRu($sloganRu)
    {
        $this->sloganRu = $sloganRu;
        return $this;
    }

    public function setSloganEn($sloganEn)
    {
        $this->sloganEn = $sloganEn;
        return $this;
    }

}
