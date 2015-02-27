<?php

/**
 * Модификации товаров
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="core_product_modifications_union")
 * @ORM\Entity(repositoryClass="Core\ProductBundle\Entity\Repository\CommonProductModificationRepository")
 */
class CommonProductModification {

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Главный продукт объединения. Используется для SEO
     * @var Core\ProductBundle\Entity\CommonProduct
     * @ORM\OneToOne(targetEntity="CommonProduct" )
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    private $general;

    /**
     * Все продукты, которые входят в обединение
     * @ORM\OneToMany(targetEntity="CommonProduct",  cascade={"persist"},  mappedBy="modificationUnion")
     * @ORM\OrderBy({"indexPositionModification" = "ASC"})
     * @Assert\NotBlank()
     */
    private $dataList;

    public function getId() {
        return $this->id;
    }

    public function getGeneral() {
        return $this->general;
    }

    public function setGeneral($general) {
        $this->general = $general;
        return $this;
    }

    public function getDataList() {
        return $this->dataList;
    }

    public function setDataList($dataList) {
        $this->dataList = $dataList;
        return $this;
    }

    public function addDataList($dataList) {
        $dataList->setModificationUnion($this);
        $this->dataList->add($dataList);
        return $this;
    }

    public function removeDataList($dataList) {
        $this->dataList->removeElement($dataList);
        return $this;
    }

}