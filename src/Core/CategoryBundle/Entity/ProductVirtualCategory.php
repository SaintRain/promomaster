<?php

/**
 * Справочник виртульные категории продукта
 * @author  Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
//подключаем языки
use Core\CommonBundle\TranslatableProperties\Caption;


/**
 * @ORM\Table(name="core_category_virtual_product")
 * @ORM\Entity(repositoryClass="Core\CategoryBundle\Entity\Repository\ProductVirtualCategoryRepository")
 */
class ProductVirtualCategory
{
    use Caption;

    /**
     * Первичный ключ
     * @var integer
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Системное имя
     * @ORM\Column(type="string", length=255, unique=true)
     * @Gedmo\Slug(fields={"captionRu"})
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     * @var boolean
     */
    private $isEnabled = true;

    /**
     * @ORM\ManyToMany(targetEntity="Core\ProductBundle\Entity\CommonProduct", mappedBy="virtualCategoryList")
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
        
        return $this;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function setProducts($products)
    {
        $this->products = $products;
        
        return $this;
    }
}
