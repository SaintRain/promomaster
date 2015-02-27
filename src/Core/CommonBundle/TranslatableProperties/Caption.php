<?php

/**
 * Поле "Название" выносим в отдельный треит
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\TranslatableProperties;

trait Caption
{

    /**
     * Название
     * @var string
     * @ORM\Column(type="string", length=300)
     * @Assert\NotBlank()
     */
    protected $captionRu;

    /**
     * Название
     * @var string
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    protected $captionEn;

    public function getCaptionRu()
    {
        return $this->captionRu;
    }

    public function getCaptionEn()
    {
        return $this->captionEn;
    }

    public function setCaptionRu($captionRu)
    {
        $this->captionRu = $captionRu;
        return $this;
    }

    public function setCaptionEn($captionEn)
    {
        $this->captionEn = $captionEn;
        return $this;
    }


}
