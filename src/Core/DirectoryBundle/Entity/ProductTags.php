<?php

/**
 * Теги для продуктов
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
//подключаем языки
use Core\CommonBundle\TranslatableProperties\Caption;

/**
 * @ORM\Table(name="core_directory_product_tags")
 * @ORM\Entity(repositoryClass="Core\DirectoryBundle\Entity\Repository\ProductTagsRepository")
 */
class ProductTags {

    use Caption;

    /**
     * Первичный ключ
     * @var smallint
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Регион
     * @ORM\ManyToOne(targetEntity="Core\ProductBundle\Entity\CommonProduct", cascade={"persist"},  inversedBy="productTags")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     * @Assert\NotBlank()
     */
    private $product;

    public function getId() {
        return $this->id;
    }

    public function getProduct() {
        return $this->product;
    }

    public function setProduct($product) {
        $this->product = $product;
        return $this;
    }

}
