<?php
/**
 * Состав предзаказа
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Entity\PreOrder;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Core\OrderBundle\Validator\Constraints as OrderAssert;    //дополнительные проверки

/**
 * @ORM\Table(name="core_order_pre_order_compositions")
 * @ORM\Entity(repositoryClass="Core\OrderBundle\Entity\Repository\PreOrder\PreOrderCompositionRepository")
 * OrderAssert\CheckComposition
 */

class PreOrderComposition
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
     * @ORM\ManyToOne(targetEntity="Core\ProductBundle\Entity\CommonProduct", inversedBy="inOrderCompositions")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     * @Assert\NotBlank()
     */
    private $product;

    /**
     * Предзаказ
     * @ORM\ManyToOne(targetEntity="PreOrder", cascade={"persist"}, inversedBy="compositions")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $preOrder;

    /**
     * Количество
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\GreaterThan(value = 0)
     * @Assert\NotBlank()
     */
    private $quantity=1;

    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPosition;

    function getId()
    {
        return $this->id;
    }

    function getProduct()
    {
        return $this->product;
    }

    function getPreOrder()
    {
        return $this->preOrder;
    }

    function getQuantity()
    {
        return $this->quantity;
    }

    function getIndexPosition()
    {
        return $this->indexPosition;
    }

    function setProduct($product)
    {
        $this->product = $product;
        return $this;
    }

    function setPreOrder($preOrder)
    {
        $this->preOrder = $preOrder;
        return $this;
    }

    function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    function setIndexPosition($indexPosition)
    {
        $this->indexPosition = $indexPosition;
        return $this;
    }
}