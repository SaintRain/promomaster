<?php

/**
 * Репозиторий, содержащий общие вопросы для работы с сущностью ManufacturerDiscount
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DiscountsBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class ManufacturerDiscountRepository extends EntityRepository {

    /**
     * Возвращает все активные скидки для производителей
     */
    function getAllEnabled() {
        $res=$this->createQueryBuilder('d')
                ->addSelect('m, manufacturerStepValues')
                ->join('d.manufacturers', 'm')
                ->leftJoin('d.manufacturerStepValues', 'manufacturerStepValues')
                ->where('d.isEnabled=1')->getQuery()->execute();
        return $res;
    }

}
