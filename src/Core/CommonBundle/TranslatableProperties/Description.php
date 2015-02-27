<?php

/**
 * Поле "Описание" выносим в отдельные треит
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\TranslatableProperties;

trait Description
{

    /**
     * Описание
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $descriptionRu
    ;

    /**
     * Описание
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $descriptionEn;

    public function getDescriptionRu()
    {
        return $this->descriptionRu;
    }

    public function getDescriptionEn()
    {
        return $this->descriptionEn;
    }

    public function setDescriptionRu($descriptionRu)
    {
        $this->descriptionRu = $descriptionRu;
        return $this;
    }

    public function setDescriptionEn($descriptionEn)
    {
        $this->descriptionEn = $descriptionEn;
        return $this;
    }

}
