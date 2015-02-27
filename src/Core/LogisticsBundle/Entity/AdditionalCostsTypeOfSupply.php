<?php

/**
 * Тип дополнительных расходов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
//подключаем языки
use Core\CommonBundle\TranslatableProperties\Caption;


/**
 * @ORM\Table(name="core_logistics_additional_costs_type_of_supply")
 * @ORM\Entity(repositoryClass="Core\LogisticsBundle\Entity\Repository\AdditionalCostsTypeOfSupplyRepository")
 */
class AdditionalCostsTypeOfSupply {

    use Caption;

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPosition;

    public function getId() {
        return $this->id;
    }

    public function getIndexPosition() {
        return $this->indexPosition;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIndexPosition($indexPosition) {
        $this->indexPosition = $indexPosition;
    }

}
