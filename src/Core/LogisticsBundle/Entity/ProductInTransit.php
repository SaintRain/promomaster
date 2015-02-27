<?php

/**
 * Товарные позиции в транзите после завершения транзита
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\ExecutionContextInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="core_logistics_product_in_transit")
 * @ORM\Entity(repositoryClass="Core\LogisticsBundle\Entity\Repository\ProductInTransitRepository")
 */
class ProductInTransit
{

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Товарная позиция
     * @ORM\ManyToOne(targetEntity="Core\ProductBundle\Entity\CommonProduct")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $product;

    /**
     * Количество
     * @ORM\Column(type="integer")
     * @Assert\GreaterThan(value = 0)
     * @Assert\NotBlank()
     */
    private $quantity;

    /**
     * Серийники товара в виде текста
     * @ORM\Column(type="text", nullable=true)
     */
    private $serialsText;

    /**
     * Транзиты
     * @ORM\ManyToOne(targetEntity="Transit", cascade={"persist"}, inversedBy="products")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $transit;

    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPosition;

    public function getId()
    {
        return $this->id;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getSerialsText()
    {
        return $this->serialsText;
    }

    public function setSerialsText($serialsText)
    {
        $this->serialsText = $serialsText;
        return $this;
    }

    public function getTransit()
    {
        return $this->transit;
    }

    public function setTransit($transit)
    {
        $this->transit = $transit;
        return $this;
    }

    public function getIndexPosition()
    {
        return $this->indexPosition;
    }

    public function setIndexPosition($indexPosition)
    {
        $this->indexPosition = $indexPosition;
        return $this;
    }

}
