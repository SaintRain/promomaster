<?php

/**
 * Забронированные товары в заказе
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="core_product_booking")
 * @ORM\Entity(repositoryClass="Core\OrderBundle\Entity\Repository\ProductBookingRepository")
 */
class ProductBooking {

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Позиция в составе заказа
     * @ORM\ManyToOne(targetEntity="Composition", inversedBy="booking")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $composition;

    /**
     * Склад на котором забронирован товар
     * @ORM\ManyToOne(targetEntity="Core\LogisticsBundle\Entity\Stock")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $stock;

    /**
     * Забранированное количество
     * @ORM\Column(type="integer")
     * @Assert\GreaterThan(value = 0)
     * @Assert\NotBlank()
     */
    private $quantity;

    /**
     * Транзит
     * @ORM\ManyToOne(targetEntity="Core\LogisticsBundle\Entity\Transit",  inversedBy="booking")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    private $transit;

    public function getId() {
        return $this->id;
    }

    public function getComposition() {
        return $this->composition;
    }

    public function setComposition($composition) {
        $this->composition = $composition;
        return $this;
    }

    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $stock;
        return $this;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
        return $this;
    }

    public function getTransit() {
        return $this->transit;
    }

    public function setTransit($transit) {
        $this->transit = $transit;
        return $this;
    }

}

