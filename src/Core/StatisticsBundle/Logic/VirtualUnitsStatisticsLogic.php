<?php

/**
 * Сервис для вывода статистики по виртуальным товарным позициям
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Logic;

use Symfony\Component\HttpKernel\Exception\FatalErrorException;
use Symfony\Component\HttpFoundation\Request;

class VirtualUnitsStatisticsLogic {

    protected $em;

    public function __construct($em) {
        $this->em = $em;
    }

    /**
     * Генерация статистики
     * @return array
     */
    public function generateStatistics() {
        $stocks = $this->em->getRepository('CoreLogisticsBundle:Stock')->findAll();
        //берём все брони по всем складам из оплаченных заказов
        $booking_res = $this->em->getRepository('CoreOrderBundle:ProductBooking')->getVirtualUnitsBookedStatisticks();

        //собираем id продуктов
        $products_ids = [];
        foreach ($booking_res as $stockInfo) {
            foreach ($stockInfo as $p_id => $quantity) {
                $products_ids[] = $p_id;
            }
        }

         //берём количество виртуальных позиций по складам
        $soldable_all = [];
        $soldable_virtual = [];
        foreach ($stocks as $stock) {
            $soldable_all[$stock->getId()] = $this->em->getRepository('CoreLogisticsBundle:UnitInStock')->findAllSoldableQuantityForStock($products_ids, $stock->getId());
            $soldable_virtual[$stock->getId()] = $this->em->getRepository('CoreLogisticsBundle:UnitInStock')->findQuantityForVirtualSupply($products_ids, $stock->getId());
        }

//        var_dump($booking_res);
//        var_dump($soldable_all);
//        var_dump($soldable_virtual);
//        exit;
        $p_info = [];
        $pids = [];
        foreach ($stocks as $stock) {
            $stock_id = $stock->getId();

            if (isset($booking_res[$stock_id])) {   //если есть бронь по складу
                foreach ($booking_res[$stock_id] as $p_id => $book_quantity) {  //перебираем все брони по товарам
                    if (isset($soldable_all[$stock_id][$p_id]) && isset($soldable_virtual[$stock_id][$p_id])) {  //если для забронированного товара есть на этом же складе виртуальные единицы
                        $bookVirtual = $book_quantity - ($soldable_all[$stock_id][$p_id] - $soldable_virtual[$stock_id][$p_id]);
                        if ($bookVirtual > 0) {
                            $p_info[$stock_id][$p_id] = $bookVirtual;   //складываем из всех броней
                            $pids[$p_id] = $p_id;    //собираем ID, чтобы выбрать из базы
                        }
                    }
                }
            }
        }
        //выбираем товары, для которых есть забронированные и оплаченные виртуальные товарные позиции
        $products = $this->em->getRepository('CoreProductBundle:CommonProduct')->findById($pids);

        $data = [
            'products' => $products,
            'p_info' => $p_info,
            'stocks' => $stocks
        ];

        return $data;
    }

    /**
     * Проставляет данные в нужном формате
     * @param type $AllСategories
     * @param type $byCategoryFree
     * @param type $byCategoryPaidNotShipped
     * @param type $byCategoryBooking
     * @param type $byCategorySupply
     * @param type $fieldName
     * @return type
     */
    function setData($AllСategories, $byCategoryFree, $byCategoryPaidNotShipped, $byCategoryBooking, $byCategorySupply, $fieldName) {
        $all = [
            'free_quantity' => 0,
            'free_quantity_sum' => 0,
            'paid_quantity' => 0,
            'paid_quantity_sum' => 0,
            'booking_quantity' => 0,
            'booking_quantity_sum' => 0,
            'supply_quantity' => 0,
            'supply_quantity_sum' => 0,
            'total_quantity' => 0,
            'total_quantity_sum' => 0,
        ];
        $byCategories = [];
        foreach ($AllСategories as $cat_id => $cat) {
            $byCategories[$cat_id][$fieldName] = $cat;
            if (isset($byCategoryFree[$cat_id])) {
                $byCategories[$cat_id]['free'] = $byCategoryFree[$cat_id];
            } else {
                $byCategories[$cat_id]['free'] = ['quantity' => 0, 'quantity_sum' => 0];
            }

            if (isset($byCategoryPaidNotShipped[$cat_id])) {
                $byCategories[$cat_id]['paidNotShipped'] = $byCategoryPaidNotShipped[$cat_id];
            } else {
                $byCategories[$cat_id]['paidNotShipped'] = ['quantity' => 0, 'quantity_sum' => 0];
            }

            if (isset($byCategoryBooking[$cat_id])) {
                $byCategories[$cat_id]['booking'] = $byCategoryBooking[$cat_id];
            } else {
                $byCategories[$cat_id]['booking'] = ['quantity' => 0, 'quantity_sum' => 0];
            }

            if (isset($byCategorySupply[$cat_id])) {
                $byCategories[$cat_id]['supply'] = $byCategorySupply[$cat_id];
            } else {
                $byCategories[$cat_id]['supply'] = ['quantity' => 0, 'quantity_sum' => 0];
            }


            $byCategories[$cat_id]['total'] = [
                'quantity' => $byCategories[$cat_id]['free']['quantity'] +
                $byCategories[$cat_id]['paidNotShipped']['quantity'] +
                $byCategories[$cat_id]['booking']['quantity'] +
                $byCategories[$cat_id]['supply']['quantity'],
                'quantity_sum' => $byCategories[$cat_id]['free']['quantity_sum'] +
                $byCategories[$cat_id]['paidNotShipped']['quantity_sum'] +
                $byCategories[$cat_id]['booking']['quantity_sum'] +
                $byCategories[$cat_id]['supply']['quantity_sum']
            ];

            //считаем все данные
            $all['free_quantity']+=$byCategories[$cat_id]['free']['quantity'];
            $all['free_quantity_sum']+=$byCategories[$cat_id]['free']['quantity_sum'];
            $all['paid_quantity']+=$byCategories[$cat_id]['paidNotShipped']['quantity'];
            $all['paid_quantity_sum']+=$byCategories[$cat_id]['paidNotShipped']['quantity_sum'];
            $all['booking_quantity']+=$byCategories[$cat_id]['booking']['quantity'];
            $all['booking_quantity_sum']+=$byCategories[$cat_id]['booking']['quantity_sum'];
            $all['supply_quantity']+=$byCategories[$cat_id]['supply']['quantity'];
            $all['supply_quantity_sum']+=$byCategories[$cat_id]['supply']['quantity_sum'];
            $all['total_quantity']+=$byCategories[$cat_id]['total']['quantity'];
            $all['total_quantity_sum']+=$byCategories[$cat_id]['total']['quantity_sum'];
        }
        return [$byCategories, $all];
    }

}
