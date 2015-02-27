<?php

/**
 * Поле "Ключевые слова" выносим в отдельные треит
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\TranslatableProperties;

trait Metakeywords
{

    /**
     * Ключевые слова
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $metakeywordsRu;

    /**
     * Ключевые слова
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $metakeywordsEn;

    public function getMetakeywordsRu()
    {
        return $this->metakeywordsRu;
    }

    public function getMetakeywordsEn()
    {
        return $this->metakeywordsEn;
    }

    public function setMetakeywordsRu($metakeywordsRu)
    {
        $this->metakeywordsRu = $metakeywordsRu;
        return $this;
    }

    public function setMetakeywordsEn($metakeywordsEn)
    {
        $this->metakeywordsEn = $metakeywordsEn;
        return $this;
    }

}
