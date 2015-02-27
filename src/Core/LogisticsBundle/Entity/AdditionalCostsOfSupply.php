<?php

/**
 * Дополнительные расходы для накладной
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\ExecutionContextInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="core_logistics_additional_costs_of_supply")
 * @ORM\Entity(repositoryClass="Core\LogisticsBundle\Entity\Repository\AdditionalCostsOfSupplyRepository")
 */
class AdditionalCostsOfSupply {

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Поставка
     * @ORM\ManyToOne(targetEntity="Supply", cascade={"persist"}, inversedBy="additionalCosts")
     */
    private $supply;

    /**
     * Тип расхода
     * @ORM\ManyToOne(targetEntity="AdditionalCostsTypeOfSupply")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="RESTRICT")
     */
    private $type;

    /**
     * Сумма расходов
     * @var decimal
     * @ORM\Column(type="decimal", scale=2)
     * @Assert\NotBlank()
     */
    private $cost;

    /**
     * Примечание
     * @var int
     * @ORM\Column(type="text", nullable=true)
     */
    private $note;

    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPosition;

    public function getId() {
        return $this->id;
    }

    public function getSupply() {
        return $this->supply;
    }

    public function getType() {
        return $this->type;
    }

    public function getCost() {
        return $this->cost;
    }

    public function getNote() {
        return $this->note;
    }

    public function getIndexPosition() {
        return $this->indexPosition;
    }

    public function setSupply($supply) {
        $this->supply = $supply;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setCost($cost) {
        $this->cost = $cost;
    }

    public function setNote($note) {
        $this->note = $note;
    }

    public function setIndexPosition($indexPosition) {
        $this->indexPosition = $indexPosition;
    }

}
