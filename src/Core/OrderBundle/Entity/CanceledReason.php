<?php

/**
 * Возможное причины для отмены закза
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Table(name="core_order_canceled_reason")
 * @ORM\Entity(repositoryClass="Core\OrderBundle\Entity\Repository\CanceledReasonRepository")
 * @UniqueEntity("name")
 */
class CanceledReason {

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Статус
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $captionRu;

    /**
     * Системное имя статуса
     * @var string
     * @Gedmo\Slug(fields={"captionRu"}, updatable=false, unique=true, separator="-")
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * Индекс позиции сортировки
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $indexPosition;

    public function getId() {
        return $this->id;
    }

    public function getCaptionRu() {
        return $this->captionRu;
    }

    public function setCaptionRu($captionRu) {
        $this->captionRu = $captionRu;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getIndexPosition() {
        return $this->indexPosition;
    }

    public function setIndexPosition($indexPosition) {
        $this->indexPosition = $indexPosition;
        return $this;
    }

}
