<?php

/**
 * Сушность состава незавершенного заказа
 * @author  Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Entity;

use Core\ProductBundle\Entity\CommonProduct;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Core\OrderBundle\Entity\Composition;

/**
 * NotFinishedOrderComposition
 *
 * @ORM\Table("core_statistics_not_finished_order_composition")
 * @ORM\Entity(repositoryClass="Core\StatisticsBundle\Entity\Repository\NotFinishedOrderCompositionRepository")
 */
class NotFinishedOrderComposition
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Товарная позиция
     * @ORM\ManyToOne(targetEntity="Core\ProductBundle\Entity\CommonProduct")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE", nullable=false)
     */
    private $product;

    /**
     * Цена товара
     * @var decimal
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\NotBlank()
     */
    private $price;

    /**
     * Количество
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\GreaterThan(value = 0)
     * @Assert\NotBlank()
     */
    private $quantity;

    /**
     * Полная стоимость товара с учетом скидки и количества
     * @ORM\Column(type="decimal", scale=2, nullable=false)
     */
    private $cost;

    /**
     * Товарная позиция
     * @ORM\ManyToOne(targetEntity="Core\StatisticsBundle\Entity\NotFinishedOrder", inversedBy="compositions")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE", nullable=false)
     */
    private $order;

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param decimal $price
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return decimal
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $product
     */
    public function setProduct(CommonProduct $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return \Core\ProductBundle\Entity\CommonProduct
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $order
     */
    public function setOrder(NotFinishedOrder $order = null)
    {
        $this->order = $order;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Создаем объект из другого (Composition)
     * @param Composition $composition
     * @return $this
     */
    public function populate(Composition $composition = null, $data = array())
    {
        if ($composition) {
            foreach($this as $key => $val) {
                if ($key != 'order') {
                    $getter = 'get' . $key;
                    $setter = 'set' . $key;
                    if (method_exists($composition, $getter) && method_exists($this, $setter)) {
                        $this->$setter($composition->$getter());
                    }
                }

            }
        } else {
            foreach($data as $key => $val) {
                if ($key != 'order') {
                    $setter = 'set' . $key;
                    if (method_exists($this, $setter)) {
                        $this->$setter($val);
                    }
                }
            }
        }

    }

    /**
     * Преобразуем к маиисиву для сравнения с оригинальным составм заказа
     * @return array
     */
    public function toCompareArray($fields = array())
    {
        $data = [];
        foreach($this as $key => $val) {
            if (is_int($val) || is_float($val)) {
                $val *= 1;
            }
            $data[$key] = $val;
        }
        return [$this->product->getId() => $data];
    }
} 