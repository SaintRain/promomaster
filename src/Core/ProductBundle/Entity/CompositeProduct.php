<?php

/**
 * Составной продукт
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\ExecutionContextInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Core\ProductBundle\Entity\CommonProduct;
use Core\ProductBundle\Entity\Traits\PhysicalPropertiesValidator;

/**
 * @ORM\Entity(repositoryClass="Core\ProductBundle\Entity\Repository\CompositeProductRepository")
 * @ORM\HasLifecycleCallbacks
 * @Assert\Callback(methods={"isValidProduct"})
 */
class CompositeProduct extends CommonProduct
{
    use PhysicalPropertiesValidator; //валидатор для физических характеристик
    
    /**
     * Продукты из которых состоит составной продукт
     * @ORM\OneToMany(targetEntity="Core\UnionBundle\Entity\ProductCompositionsUnion", cascade={"persist"}, mappedBy="mappedObject")
     */
    private $compositions;

    public function __construct()
    {
        parent::__construct();
        $this->compositions = new ArrayCollection();
    }

    public function getCompositions()
    {
        return $this->compositions;
    }

    public function setCompositions($compositions)
    {
        $this->compositions = $compositions;
        return $this;
    }

    public function addCompositions($compositions)
    {
        $this->compositions->add($compositions);
        return $this;
    }

    public function removeCompositions($compositions)
    {
        $this->compositions->removeElement($compositions);
        return $this;
    }

    /**
     * Динамически расчитывае цен для составного товара по его составляющим
     * @return type
     */
    public function computeDynamicPrice()
    {
        $price = 0;
        foreach ($this->compositions as $comp) {
            $price+=$comp->getQuantity() * $comp->getTargetObject()->getPrice();
        }
        return $price;
    }

}
