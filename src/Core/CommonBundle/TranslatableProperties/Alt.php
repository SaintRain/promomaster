<?php

/**
 * Поле "Тег alt" выносим в отдельные треит
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\TranslatableProperties;

trait Alt
{

    /**
     * Тег alt
     * @var string
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    protected $altRu;

    /**
     * Тег alt
     * @var string
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    protected $altEn;

    public function getAltRu()
    {
        return $this->altRu;
    }

    public function getAltEn()
    {
        return $this->altEn;
    }

    public function setAltRu($altRu)
    {
        $this->altRu = $altRu;
        return $this;
    }

    public function setAltEn($altEn)
    {
        $this->altEn = $altEn;
        return $this;
    }

}
