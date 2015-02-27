<?php

/**
 * Количественные альтернативы для проводов и всякой мелочи, которая продается по фасовкам
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\UnionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Core\UnionBundle\Entity\CommonUnion;

/**
 * @ORM\Table(name="core_union_product_quantity_alternative",
 * uniqueConstraints={@ORM\UniqueConstraint(name="search_index_uniq", columns={"mappedObject_id", "targetObject_id"})},
 * indexes={@ORM\Index(name="search_index", columns={"mappedObject_id", "targetObject_id"})})
 * @ORM\Entity(repositoryClass="Core\UnionBundle\Entity\Repository\CommonUnionRepository")
 */
class ProductQuantityAlternativeUnion extends CommonUnion {

    /**
     * Связующая колонка
     * @ORM\ManyToOne(targetEntity="Core\ProductBundle\Entity\CommonProduct", inversedBy="quantityAlternative")
     * @ORM\JoinColumn(name="mappedObject_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $mappedObject;

    /**
     * Запись на которую ссылаемся
     * @ORM\ManyToOne(targetEntity="Core\ProductBundle\Entity\CommonProduct")
     * @ORM\JoinColumn(name="targetObject_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $targetObject;

    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $indexPosition;

    /**
     * Количество одинаковых компонентов в продукте. Используется, когда, например, бухта провода разбивается на товары по 1 м, 10 м. и т.д.,
     * или упаковка джеков на продукты по 1 шт, 10 шт. и т.д.
     * var int
     * ORM\Column(type="integer")
     * Assert\GreaterThan(value = 0)
     * Assert\NotBlank
     */
    //private $quantity = 1;

    public function getMappedObject() {
        return $this->mappedObject;
    }

    public function setMappedObject($mappedObject) {
        $this->mappedObject = $mappedObject;
        return $this;
    }

    public function getTargetObject() {
        return $this->targetObject;
    }

    public function setTargetObject($targetObject) {
        $this->targetObject = $targetObject;
        return $this;
    }

    public function getIndexPosition() {
        return $this->indexPosition;
    }

    public function setIndexPosition($indexPosition) {
        $this->indexPosition = $indexPosition;
        return $this;
    }

    /*
      public function getQuantity() {
      return $this->quantity;
      }

      public function setQuantity($quantity) {
      $this->quantity = $quantity;
      return $this;
      }
     */
}
