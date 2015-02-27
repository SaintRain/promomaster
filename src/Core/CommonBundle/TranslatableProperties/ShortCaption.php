<?php

/**
 * Поле "Краткое название" выносим в отдельный треит
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\TranslatableProperties;

trait ShortCaption
{

    /**
     * Название
     * @var string
     * @ORM\Column(type="string", length=10)
     * @Assert\NotBlank()
     */
    protected $shortCaptionRu;

    /**
     * Название
     * @var string
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    protected $shortCaptionEn;

    public function getShortCaptionRu()
    {
        return $this->shortCaptionRu;
    }

    public function getShortCaptionEn()
    {
        return $this->shortCaptionEn;
    }

    public function setShortCaptionRu($shortCaptionRu)
    {
        $this->shortCaptionRu = $shortCaptionRu;
        return $this;
    }

    public function setShortCaptionEn($shortCaptionEn)
    {
        $this->shortCaptionEn = $shortCaptionEn;
        return $this;
    }


}
