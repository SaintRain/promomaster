<?php

/**
 * Поле "Title - заголовок" выносим в отдельные треит
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\TranslatableProperties;

trait Title
{

    /**
     * Title - заголовок
     * @var string
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    protected $titleRu;

    /**
     * Title - заголовок
     * @var string
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    protected $titleEn;

    public function getTitleRu()
    {
        return $this->titleRu;
    }

    public function getTitleEn()
    {
        return $this->titleEn;
    }

    public function setTitleRu($titleRu)
    {
        $this->titleRu = $titleRu;
        return $this;
    }

    public function setTitleEn($titleEn)
    {
        $this->titleEn = $titleEn;
        return $this;
    }

}
