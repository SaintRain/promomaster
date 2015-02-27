<?php

/**
 * Базовый класс категории, содержащий основные свойства
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\ExecutionContextInterface;

/**
 * @ORM\MappedSuperclass
 * @Assert\Callback(methods={"isValid"})
 */

class CommonCategory {

    /**
     * Первичный ключ
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Позиция сортировки слева
     * @Gedmo\TreeLeft
     * @ORM\Column(name="lft", type="integer")
     */
    protected $lft;

    /**
     * Уровень вложенности
     * @Gedmo\TreeLevel
     * @ORM\Column(name="lvl", type="integer")
     */
    protected $lvl;

    /**
     * Позиция сортировки справо
     * @Gedmo\TreeRight
     * @ORM\Column(name="rgt", type="integer")
     */
    protected $rgt;

    /**
     * Корневой узел
     * @Gedmo\TreeRoot
     * @ORM\Column(name="root", type="integer", nullable=true)
     */
    protected $root;

    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(name="indexPosition", type="bigint", nullable=true)
     */
    protected $indexPosition;

    /**
     * Время создания
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="createdDateTime", type="datetime")
     */
    protected $createdDateTime;

    /**
     * Активность категории
     * @var boolean
     * @ORM\Column(name="isEnabled", type="boolean")
     */
    protected $isEnabled = true;

    /**
     * Имя категории, может использаваться как ключ
     * @var string
     * @ORM\Column(name="name", type="string", nullable=true, length=300)
     */
    protected $name;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id=$id;
        return $this;
    }
    public function getLft() {
        return $this->lft;
    }

    public function setLft($lft) {
        $this->lft = $lft;
        return $this;
    }

    public function getLvl() {
        return $this->lvl;
    }

    public function setLvl($lvl) {
        $this->lvl = $lvl;
        return $this;
    }

    public function getRgt() {
        return $this->rgt;
    }

    public function setRgt($rgt)
    {
        $this->$rgt = $rgt;
//        $this->setIndexPosition($root);
//        $this->root = $root;

        return $this;
    }

    public function getRoot()
    {
        return $this->root;
    }

    public function setRoot($root) {
        $this->root = $root;
        return $this;
    }

    public function getIndexPosition() {
        return $this->indexPosition;
    }

    public function setIndexPosition($indexPosition) {
        $this->indexPosition = $indexPosition;
        return $this;
    }

    public function getCreatedDateTime() {
        return $this->createdDateTime;
    }

    public function setCreatedDateTime($createdDateTime) {
        $this->createdDateTime = $createdDateTime;
        return $this;
    }

    public function getIsEnabled() {
        return $this->isEnabled;
    }

    public function setIsEnabled($isEnabled) {
        $this->isEnabled = $isEnabled;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Необходим для построения уровней дерева в select
     * @return type
     */
    public function getIndentedCaption() {
        return str_repeat('--', $this->lvl) . $this->captionRu;
    }

    public function __toString() {
        return 'Добавление категории';
    }

    /**
     * Дополнительная валидация
     * @param \Symfony\Component\Validator\ExecutionContextInterface $context
     */
    public function isValid(ExecutionContextInterface $context) {

        //категория не может быть родительской для самой себя
        if ($this->getParent() && $this->getId() == $this->getParent()->getId()) {
            $context->buildViolation('Категория не ожет быть родителем для самой себя!')
                    ->atPath('parent')
                    ->addViolation();
        }
    }

}