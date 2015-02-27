<?php

/**
 * Поле "Тело статьи" выносим в отдельные треит
 * @author  Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FaqBundle\TranslatableProperties;

trait Body
{

    /**
     * Название
     * @var string
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    protected $bodyRu;

    /**
     * Название
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $bodyEn;

    public function getBodyRu()
    {
        return $this->bodyRu;
    }

    public function getBodyEn()
    {
        return $this->bodyEn;
    }

    public function setBodyRu($bodyRu)
    {
        $this->bodyRu = $bodyRu;
        return $this;
    }

    public function setBodyEn($bodyEn)
    {
        $this->bodyEn = $bodyEn;
        return $this;
    }


}
