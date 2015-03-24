<?php

/**
 * Сервис для вывода статистики по складам
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Logic;

use Symfony\Component\HttpKernel\Exception\FatalErrorException;
use Symfony\Component\HttpFoundation\Request;

class StockStatisticsLogic {

    protected $em;

    public function __construct($em) {
        $this->em = $em;
    }

    /**
     * Генерация статистики
     * @return array
     */
    public function generateStatistics() {

        $categories = $this->em->getRepository('CoreCategoryBundle:ProductCategory')->geAllByIndexId();
        $manufacturers = $this->em->getRepository('CoreManufacturerBundle:Manufacturer')->geAllByIndexId();

        $byCategoryFree = $this->em->getRepository('CoreLogisticsBundle:ProductAvailability')->getAvailabilityStatisticsByCategory();
        $byManufacturerFree = $this->em->getRepository('CoreLogisticsBundle:ProductAvailability')->getAvailabilityStatisticsByManufacturer();

        $byCategoryPaidNotShipped = $this->em->getRepository('CoreOrderBundle:Order')->getPaidNotShippedStatisticsByCategory();
        $byManufacturerPaidNotShipped = $this->em->getRepository('CoreOrderBundle:Order')->getPaidNotShippedStatisticsByManufacturer();

        $byCategoryBooking = $this->em->getRepository('CoreOrderBundle:ProductBooking')->getBookingStatisticsByCategory();
        $byManufacturerBooking = $this->em->getRepository('CoreOrderBundle:ProductBooking')->getBookingStatisticsByManufacturer();

        $byCategorySupply = $this->em->getRepository('CoreLogisticsBundle:Supply')->getSupplyStatisticsByCategory();
        $byManufacturerSupply = $this->em->getRepository('CoreLogisticsBundle:Supply')->getSupplyStatisticsByManufacturer();
       
        list($byCategories, $byCategoriesAll) = $this->setData($categories, $byCategoryFree, $byCategoryPaidNotShipped, $byCategoryBooking, $byCategorySupply, 'category');
        list($byManufacturers, $byManufacturersAll) = $this->setData($manufacturers, $byManufacturerFree, $byManufacturerPaidNotShipped, $byManufacturerBooking, $byManufacturerSupply, 'manufacturer');

        $data = [
            'byCategories' => $byCategories,
            'byCategoriesAll' => $byCategoriesAll,
            'byManufacturers' => $byManufacturers,
            'byManufacturersAll' => $byManufacturersAll
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
    function setData($AllСategories, $byCategoryFree, $byCategoryPaidNotShipped, $byCategoryBooking, $byCategorySupply,   $fieldName) {
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
