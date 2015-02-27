<?php

/**
 * Поле "Краткое описание" выносим в отдельные треит
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\TranslatableProperties;

trait ShortDescription
{

    /**
     * Краткое описание
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $shortDescriptionRu;

    /**
     * Краткое описание
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $shortDescriptionEn;

    public function getShortDescriptionRu()
    {
        return $this->shortDescriptionRu;
    }

    public function getShortDescriptionEn()
    {
        return $this->shortDescriptionEn;
    }

    public function setShortDescriptionRu($shortDescriptionRu)
    {
        $this->shortDescriptionRu = $shortDescriptionRu;
        return $this;
    }

    public function setShortDescriptionEn($shortDescriptionEn)
    {
        $this->shortDescriptionEn = $shortDescriptionEn;
        return $this;
    }

}
