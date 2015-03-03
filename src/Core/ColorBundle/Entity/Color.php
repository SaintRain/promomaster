<?php

/**
 * Сущность цвета
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ColorBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;  //нужен для callback
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Core\CommonBundle\TranslatableProperties\Caption;

/**
 * @ORM\Table(name="core_directory_color")
 * @ORM\Entity(repositoryClass="Core\ColorBundle\Entity\Repository\ColorRepository")
 * @Assert\Callback(methods={"isValid"})
 */
class Color {

    use Caption;

    /**
     * Первичный ключ
     * @var smallint
     * @ORM\Column(name="id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Активность
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $isEnabled;

    /**
     * Цвет в формате hex
     * @var string
     * @ORM\Column(type="string", length=6, nullable=false, unique=true)
     * @Assert\NotBlank()
     */
    private $hex;

    /**
     * Создан
     * @var datetime
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * Редактирован
     * @var datetime
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

    /**
     * Индекс позиции сортировки
     * @var integer
     * @ORM\Column(type="integer", nullable=true)
     */
    private $indexPosition;

    /**
     * Связь с таблицей продуктов
     * ORM\OneToMany(targetEntity="Core\ProductBundle\Entity\CommonProduct", mappedBy="color")
     */
//    private $products;

    /**
     * @ORM\OneToMany(targetEntity="ColorPalette", mappedBy="main", cascade={"persist"}, orphanRemoval=true)
     * @ORM\OrderBy({"indexPosition" = "ASC"})
     */
    protected $palette;

    public function __construct() {
//        $this->products = new ArrayCollection();
        $this->palette = new ArrayCollection();
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getIsEnabled() {
        return $this->isEnabled;
    }

    public function setIsEnabled($isEnabled) {
        $this->isEnabled = $isEnabled;
        return $this;
    }

    public function getHex() {
        return $this->hex;
    }

    public function setHex($hex) {
        $this->hex = $hex;
        return $this;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getIndexPosition() {
        return $this->indexPosition;
    }

    public function setIndexPosition($indexPosition) {
        $this->indexPosition = $indexPosition;
        return $this;
    }

//    public function getProducts() {
//        return $this->products;
//    }
//
//    public function setProducts($products) {
//        $this->products = $products;
//        return $this;
//    }
//
//    public function addProducts($products) {
//        $this->products->add($products);
//        return $this;
//    }
//
//    public function removeProducts($products) {
//        $this->products->removeElement($products);
//        return $this;
//    }

    public function getPalette() {
        return $this->palette;
    }

    public function setPalette($palette) {
        $this->palette = $palette;
        return $this;
    }

    public function addPalette($palette) {
        $palette->setMain($this);
        $this->palette->add($palette);
        return $this;
    }

    public function removePalette($palette) {
        $this->palette->removeElement($palette);
        return $this;
    }

    /**
     * Валидация hex строки
     *
     * @param \Symfony\Component\Validator\ExecutionContextInterface $context
     */
    public function isValid(ExecutionContextInterface $context) {
        if (!preg_match('/(^[0-9a-fA-F]{6}$)|(^[0-9a-fA-F]{3}$)|(^null$)/', $this->getHex())) {
            $context->buildViolation('Invalid characters! (0-9,a-f,A-f and \'null\')')
                    ->atPath('hex')
                    ->addViolation();
        }
    }

}
