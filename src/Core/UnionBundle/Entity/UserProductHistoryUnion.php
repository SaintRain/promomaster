<?php

/**
 * Связь пользователей с продуктами (история просмотров товара)
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\UnionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Core\UnionBundle\Entity\CommonUnion;

/**
 * @ORM\Table(name="core_union_user_products_history",
 * uniqueConstraints={@ORM\UniqueConstraint(name="search_index_uniq", columns={"mappedObject_id", "targetObject_id"})},
 * indexes={@ORM\Index(name="search_index", columns={"mappedObject_id", "targetObject_id"})})
 * @ORM\Entity(repositoryClass="Core\UnionBundle\Entity\Repository\CommonUnionRepository")
 */
class UserProductHistoryUnion extends CommonUnion {

    /**
     * Связующая колонка
     *
     * @ORM\ManyToOne(targetEntity="Core\ProductBundle\Entity\CommonProduct", inversedBy="historyUsers")
     * @ORM\JoinColumn(name="mappedObject_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $mappedObject;

    /**
     * Запись на которую ссылаемся
     *
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="historyProducts")
     * @ORM\JoinColumn(name="targetObject_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $targetObject;

    /**
     * Индекс позиции сортировки
     *
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    private $indexPosition;

    /**
     * Дата когда была добавлена запись
     *
     * @var datetime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $viewedAt;

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

    public function getViewedAt() {
        return $this->viewedAt;
    }

    public function setViewedAt($viewedAt) {
        $this->viewedAt = $viewedAt;
        return $this;
    }

}
