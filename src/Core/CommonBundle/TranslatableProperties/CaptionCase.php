<?php

/**
 * Поле "Контейнер падежией" выносим в отдельные треит
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\TranslatableProperties;

/**
 * @tutorial все сеттеры необходимо обрезать по количеству элементов в массиве (падежей)
 */
trait CaptionCase {

    /**
     * Контейнер падежией
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $captionCaseRu;

    /**
     * Контейнер падежией
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    protected $captionCaseEn;

    /**
     * @param string $captionCaseEn
     */
    public function setCaptionCaseEn($captionCaseEn) {
        $this->captionCaseEn = implode("\n", $captionCaseEn);
    }

    /**
     * @return string
     */
    public function getCaptionCaseEn() {
        if (strlen($this->captionCaseEn)) {
            return explode("\n", $this->captionCaseEn);
        } else {
            return [];
        }
    }

    /**
     * @param string $captionCaseRu
     */
    public function setCaptionCaseRu($captionCaseRu) {
        $this->captionCaseRu = implode("\n", $captionCaseRu);
    }

    /**
     * @return string
     */
    public function getCaptionCaseRu() {

        if (strlen($this->captionCaseRu)) {
            return explode("\n", $this->captionCaseRu);
        } else {
            return [];
        }
    }

}
