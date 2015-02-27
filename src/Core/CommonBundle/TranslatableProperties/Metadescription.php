<?php

/**
 * Поле "Meta -  описание" выносим в отдельные треит
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\TranslatableProperties;

trait Metadescription
{

    /**
     * Meta -  описание
     * @var string
     * @ORM\Column(type="string", nullable=true, length=300)
     */
    protected $metadescriptionRu;

    /**
     * Meta -  описание
     * @var string
     * @ORM\Column(type="string", nullable=true, length=300)
     */
    protected $metadescriptionEn;

    public function getMetadescriptionRu()
    {
        return $this->metadescriptionRu;
    }

    public function getMetadescriptionEn()
    {
        return $this->metadescriptionEn;
    }

    public function setMetadescriptionRu($metadescriptionRu)
    {
        $this->metadescriptionRu = $metadescriptionRu;
        return $this;
    }

    public function setMetadescriptionEn($metadescriptionEn)
    {
        $this->metadescriptionEn = $metadescriptionEn;
        return $this;
    }

}
