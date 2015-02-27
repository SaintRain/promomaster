<?php

/**
 * Поле "Примечание" выносим в отдельные треит
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\TranslatableProperties;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait Note
{

    /**
     * Примечание
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $noteRu;

    /**
     * Описание
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $noteEn;

    public function getNoteRu()
    {
        return $this->noteRu;
    }

    public function getNoteEn()
    {
        return $this->noteEn;
    }

    public function setNoteRu($noteRu)
    {
        $this->noteRu = $noteRu;
        return $this;
    }

    public function setNoteEn($noteEn)
    {
        $this->noteEn = $noteEn;
        return $this;
    }

}
