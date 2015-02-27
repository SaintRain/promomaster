<?php

/**
 * Габариты упаковок
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="core_order_sizes_of_box")
 * @ORM\Entity(repositoryClass="Core\OrderBundle\Entity\Repository\SizesOfBoxRepository")
 */
class SizesOfBox {

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Высота  в мм
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank()
     */
    private $height;

    /**
     * Длина  в мм
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank()
     */
    private $length;

    /**
     * Ширина  в мм
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank()
     */
    private $width;

    /**
     * Вес
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\NotBlank()
     */
    private $weight;

    /**
     * Флаг, определяющий что вес указан в килограммах, иначе в граммах
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isWeightInKg = true;

    /**
     * Накладная
     * @ORM\ManyToOne(targetEntity="Waybills", cascade={"persist"}, inversedBy="sizesOfBox")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $waybill;

    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPosition;

    public function getId() {
        return $this->id;
    }

    public function getHeight() {
        return $this->height;
    }

    public function setHeight($height) {
        $this->height = $height;
        return $this;
    }

    public function getLength() {
        return $this->length;
    }

    public function setLength($length) {
        $this->length = $length;
        return $this;
    }

    public function getWidth() {
        return $this->width;
    }

    public function setWidth($width) {
        $this->width = $width;
        return $this;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
        return $this;
    }

    public function getIsWeightInKg() {
        return $this->isWeightInKg;
    }

    public function setIsWeightInKg($isWeightInKg) {
        $this->isWeightInKg = $isWeightInKg;
        return $this;
    }

    public function getWaybill()
    {
        return $this->waybill;
    }

    public function setWaybill(Waybills $waybill = null)
    {
        $this->waybill = $waybill;
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

