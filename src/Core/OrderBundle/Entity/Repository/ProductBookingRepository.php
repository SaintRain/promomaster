<?php

/**
 * Репозиторий, содержащий общие вопросы для работы с сущностью ProductBooking
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class ProductBookingRepository extends EntityRepository {

    /**
     * Получает данные для вывода статистики по виртуальным товарам
     * @return type
     */
    public function getVirtualUnitsBookedStatisticks() {
        $temp = $this->createQueryBuilder('b')
                        ->select('SUM(b.quantity) AS book_quantity, b.id book_id, p.id as product_id, s.id stock_id, pa.quantity pa_quantity')
                        ->join('b.composition', 'c')
                        ->join('b.stock', 's')
                        ->join('c.product', 'p')
                        ->leftJoin('p.productAvailability', 'pa', 'WITH', 'pa.stock=s.id')
                        ->join('c.order', 'o')
                        ->where('o.isPaidStatus=1')
                        ->groupBy('b.id')
                        ->getQuery()->execute();
        $res = [];
        foreach ($temp as $t) {
            if (!isset($res[$t['stock_id']][$t['product_id']])) {
                $res[$t['stock_id']][$t['product_id']] = 0;
            }
            $res[$t['stock_id']][$t['product_id']]+= $t['book_quantity'];
        }

        return $res;
    }

    /**
     * Берет статистику по категории
     * @return type
     */
    public function getBookingStatisticsByCategory() {

        $temp = $this->createQueryBuilder('pb')
                        ->select('SUM(pb.quantity) quantity')
                        ->addSelect('SUM(p.price*pb.quantity) quantity_sum')
                        ->addSelect('c.id cat_id')
                        ->join('pb.composition', 'comp')
                        ->join('comp.product', 'p')
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
    public function getBookingStatisticsByManufacturer() {

        $temp = $this->createQueryBuilder('pb')
                        ->select('SUM(pb.quantity) quantity')
                        ->addSelect('SUM(p.price*pb.quantity) quantity_sum')
                        ->addSelect('m.id manufacturer_id')
                        ->join('pb.composition', 'comp')
                        ->join('comp.product', 'p')
                        ->join('p.manufacturerMain', 'm')
                        ->groupBy('m.id')->getQuery()->execute();

        //делаем индекс ID категории
        $res = [];
        foreach ($temp as $r) {
            $res[$r['manufacturer_id']] = $r;
        }
        return $res;
    }

    /**
     * Находит все брони для заданных продуктов
     * @param type $object
     * @return type
     */
    function findBookingByProducts($p_id, $dontTakeOrder = false) {
        //когда сохраняем заказ нужно пропускать этот заказ, иначе неправильно будет считаться
        if ($dontTakeOrder && $dontTakeOrder->getId()) {
            $dontTakeOrder_str = ' AND o.id!=' . $dontTakeOrder->getId();
        } else {
            $dontTakeOrder_str = '';
        }

        $temp = $this->createQueryBuilder('b')
                        ->select('SUM(b.quantity) AS quantity, s.id stock_id,  p.id product_id')
                        ->join('b.stock', 's')
                        ->Join('b.composition', 'c')
                        ->join('c.order', 'o')
                        ->join('c.product', 'p')
                        ->where('c.product =:product_id ' . $dontTakeOrder_str)
                        ->groupBy('s.id')
                        ->setParameters(['product_id' => $p_id])
                        ->getQuery()->execute();


        $res = [];
        foreach ($temp as $t) {
            $res[$t['stock_id']][$t['product_id']] = $t;
        }
        return $res;
    }

}
