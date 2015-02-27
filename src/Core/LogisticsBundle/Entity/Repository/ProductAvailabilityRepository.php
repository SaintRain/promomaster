<?php

/**
 * Репозиторий, содержащий общие вопросы для работы с сущностью ProductAvailability
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class ProductAvailabilityRepository extends EntityRepository {

    /**
     * Берет статистику по категории
     * @return type
     */
    public function getAvailabilityStatisticsByCategory() {
        $temp = $this->createQueryBuilder('pa')
                        ->select('SUM(pa.quantity-pa.quantityVirtual) quantity')
                        ->addSelect('SUM(p.price*(pa.quantity-pa.quantityVirtual)) quantity_sum')
                        ->addSelect('c.id cat_id')
                        ->join('pa.product', 'p')
                        ->join('p.categoryMain', 'c')
                        ->groupBy('c.id')->getQuery()->execute();

        //делаем индекс ID категории
        $res = [];
        foreach ($temp as $r) {
            $res[$r['cat_id']] = $r;
        }
        return $res;
    }

    /**
     * Берет статистику по производителю
     * @return type
     */
    public function getAvailabilityStatisticsByManufacturer() {
        $temp = $this->createQueryBuilder('pa')
                        ->select('SUM(pa.quantity-pa.quantityVirtual) quantity')
                        ->addSelect('SUM(p.price*(pa.quantity-pa.quantityVirtual)) quantity_sum')
                        ->addSelect('m.id manufacturer_id')
                        ->join('pa.product', 'p')
                        ->join('p.manufacturerMain', 'm')
                        ->groupBy('m.id')->getQuery()->execute();

        //делаем индекс ID категории
        $res = [];
        foreach ($temp as $r) {
            $res[$r['manufacturer_id']] = $r;
        }
        return $res;
    }

}

