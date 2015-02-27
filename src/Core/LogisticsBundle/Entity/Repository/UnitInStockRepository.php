<?php

/**
 * Репозиторий, содержащий общие вопросы для работы с сущностью UnitInStock
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;

class UnitInStockRepository extends EntityRepository
{

    /**
     * Подсчитываем сколько к заказу прикрепленно товарных единиц
     * @param type $id
     */
    public function getUnitsCountForOrder($order_id)
    {
        $res = $this
                ->createQueryBuilder('u')
                ->select('COUNT(u) units_count')
                ->join('u.composition', 'c')
                ->join('c.order', 'o')
                ->where('o.id = :order_id')
                ->setParameter('order_id', $order_id)
                ->getQuery()
                ->getOneOrNullResult();
        return $res;
    }

    /**
     * Находит количество всех доступных для продажи единиц по складам
     * @param type $product_ids
     * @return type
     */
    public function findAllSoldableQuantityForStock($product_ids, $stock_id)
    {
        $temp = $this->createQueryBuilder('u')
                ->select('COUNT(u) AS unit_quantity, p.id AS product_id')
                ->join('u.stock', 'st')
                ->join('u.product', 'p')
                ->where('u.isCouldBeSold=1 AND u.product IN (:product) AND st.id=:stock_id')
                ->setParameters(['product' => $product_ids, 'stock_id' => $stock_id])
                ->groupBy('p.id')
                ->getQuery()
                ->execute();
        $res = [];
        foreach ($temp as $t) {
            $res[$t['product_id']] = $t['unit_quantity'];
        }

        return $res;
    }

    /**
     * Для заданных продуктов находит количество виртуальных товарных позиций по складам
     * @param type $product_ids
     * @return type
     */
    public function findQuantityForVirtualSupply($product_ids, $stock_id)
    {
        $temp = $this->createQueryBuilder('u')
                ->select('COUNT(u) AS unit_quantity, p.id AS product_id, st.id stock_id')
                ->join('u.supply', 's')
                ->join('u.stock', 'st')
                ->join('u.product', 'p')
                ->where('u.isVirtual=1  AND s.isVirtual=1 AND u.isCouldBeSold=1 AND u.product IN (:product) AND st.id=:stock_id')
                ->setParameters(['product' => $product_ids, 'stock_id' => $stock_id])
                ->groupBy('p.id')
                ->getQuery()
                ->execute();

        $res = [];
        foreach ($temp as $t) {
            $res[$t['product_id']] = $t['unit_quantity'];
        }

        return $res;
    }

    /**
     * Находит нужное количество виртуальных позиций для заданного товара.
     * Ищем только по виртуальным поставкам
     * @param type $product_id
     * @param type $limit
     * @return type
     */
    public function findVirtualForRealSupply($product_id, $limit, $stock_id)
    {
        $res = $this->createQueryBuilder('u')
                ->join('u.supply', 's')
                ->join('s.stock', 'st')
                ->where('u.isVirtual=1 AND u.isCouldBeSold=1 AND u.product=:product AND s.isVirtual=1 AND st.id=:stock_id')
                ->setParameters(['product' => $product_id, 'stock_id' => $stock_id])
                ->getQuery()
                ->setMaxResults($limit)
                ->execute();
        return $res;
    }

    /**
     * Количество виртуальных позиций для заданного продукта
     * @param type $product_id
     * @return type
     */
    public function getQuantityVirtual($product_id)
    {
        $res = $this->createQueryBuilder('u')
                ->select('COUNT(u) AS quantity')
                ->where('u.product=:product AND u.isVirtual=1')
                ->setParameters(['product' => $product_id])
                ->getQuery()
                ->getOneOrNullResult();
        return $res;
    }

    /**
     * Находит свободную реальную товарную позицию, чтобы назначить серийникик составу
     * @param type $product_id
     * @return type
     */
    public function findFreeUnit($product_id, $stock_id, $eliminated_unit_ids, $limit = 1)
    {
        $res = $this->createQueryBuilder('u')
                ->select('u,s')
                ->leftJoin('u.serials', 's')
                ->join('u.stock', 'st')
                ->where('u.product=:product AND u.isCouldBeSold=1 AND u.composition IS NULL AND (u.isVirtual is NULL OR u.isVirtual=0 )  AND st.id=:stock_id '
                        . 'AND  u.id NOT IN (:eliminated_unit_ids)')
                ->setParameters(['product' => $product_id, 'stock_id' => $stock_id, 'eliminated_unit_ids' => $eliminated_unit_ids])
                ->setMaxResults($limit)
                ->getQuery()
                ->execute();
        return $res;
    }

    /**
     * Находит свободные товарные единицы для переноса в транзите на новый склад, когда транзит завершен
     * @param type $product_id
     * @param type $stock_id
     * @param type $eliminated_unit_ids
     * @return type
     */
    public function findFreeUnitForTransit($product_id, $stock_id, $eliminated_unit_ids, $limit)
    {
        $res = $this->createQueryBuilder('u')
                ->select('u,s')
                ->leftJoin('u.serials', 's')
                ->join('u.stock', 'st')
                ->where('u.product=:product AND u.isCouldBeSold=1 AND u.composition IS NULL AND (u.isVirtual is NULL OR u.isVirtual=0)
                          AND st.id=:stock_id AND  u.id NOT IN (:eliminated_unit_ids)')
                ->setParameters(['product' => $product_id, 'stock_id' => $stock_id, 'eliminated_unit_ids' => $eliminated_unit_ids])
                ->setMaxResults($limit)
                ->getQuery()
                ->execute();
        return $res;
    }

    /**
     * Находит склады и количество доступных, заданных в них продуктов
     * @param type $object
     * @return type
     * quantity - общее количество товаров (реальные+виртуальные из виртуальных поставок+виртуальные из реальных поставок)
     * quantity_virtual - виртуальные из виртуальных поставок
     * quantity_virtual_real - виртуальные из реальных поставок
     */
    public function findStocksByProducts($product_id)
    {

        $temp = $this->createQueryBuilder('u')
                        ->select('COUNT(u) quantity, SUM(CASE WHEN u.isVirtual=1 AND sup.isVirtual=1 THEN 1 ELSE 0 END) quantity_virtual, '
                                . 'SUM(CASE WHEN u.isVirtual=1 AND sup.isVirtual!=1 THEN 1 ELSE 0 END) quantity_virtual_real,  s.id stock_id, p.id product_id')
                        ->join('u.stock', 's')
                        ->join('u.supply', 'sup')
                        ->join('u.product', 'p')
                        ->where('u.product =:product_id')
                        ->andWhere('u.isCouldBeSold = 1')
                        ->groupBy('s.id')
                        ->setParameters(['product_id' => $product_id])
                        ->getQuery()->execute();

        $res = [];
        foreach ($temp as $t) {
            $res[$t['stock_id']][$t['product_id']] = $t;
        }

        return $res;
    }

    /**
     * Запрос для формирования инвенторизации.
     * Берём только продукты для которых были поставки. Выводим все продукты, которые есть на складе и могут быть проданы
     * @return type
     */
    public function getInventoryProductsWithDefect($stock_id)
    {

        $temp = $this->createQueryBuilder('u')
                        ->select('p.id product_id, COUNT(u.isWithDefect) quantity, s.id stock_id')
                        ->leftJoin('u.product', 'p')
                        ->leftJoin('u.stock', 's')
                        ->where('u.stock = :stock_id')
                        ->setParameter('stock_id', $stock_id)
                        ->groupBy('p.id')
                        ->getQuery()->execute();
        $res = [];
        foreach ($temp as $t) {
            $res[$t['stock_id']][$t['product_id']] = $t;
        }

        return $res;
    }

    /**
     * Подсчитываем количество виртуальных позиций, которые в пути и станут потом реальными
     * @param type $stock_ids
     * @return type
     */
    function getInventoryProductsAvaibilityVirtulVPuty($stock_ids)
    {

        $res = $this->createQueryBuilder('u')
                        ->select('COUNT(u) quantity, p.id product_id')
                        ->join('u.product', 'p')
                        ->join('u.supply', 's')
                        ->where('u.stock IN (:stock_ids) AND u.isVirtual=1 AND (s.isVirtual is NULL OR s.isVirtual=0)')
                        ->setParameter('stock_ids', $stock_ids)
                        ->groupBy('p.id')
                        ->getQuery()->execute();

        return $res;
    }

}
