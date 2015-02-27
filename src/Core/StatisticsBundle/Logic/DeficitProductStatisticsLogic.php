<?php

/**
 * Сервис для вывода статистики товара по складам, который заканчивается
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Logic;

use Symfony\Component\HttpKernel\Exception\FatalErrorException;
use Symfony\Component\HttpFoundation\Request;

class DeficitProductStatisticsLogic {

    protected $em;

    public function __construct($em) {
        $this->em = $em;
    }

    /**
     * Генерация статистики
     * @return array
     */
    public function generateStatistics() {

        $stocks = $this->em->getRepository('CoreLogisticsBundle:Stock')->geAllByIndexId();
        $manufacturers = $this->em->getRepository('CoreManufacturerBundle:Manufacturer')->geAllByIndexId();
        $statistics = $this->em->getRepository('CoreProductBundle:CommonProduct')->getDeficitProducts();        
        sort($manufacturers);
        
        $defProducts = [];
        $number=0;
        foreach ($statistics as $key => $p) {
            if (!isset($defProducts[$p['manufacturer_id']][$p['product_id']]['total_quantity'])) {
                $defProducts[$p['manufacturer_id']][$p['product_id']]['total_quantity'] = 0;
                $defProducts[$p['manufacturer_id']][$p['product_id']]['product'] = $p;
                $defProducts[$p['manufacturer_id']][$p['product_id']]['number'] = ++$number;
            }
            $defProducts[$p['manufacturer_id']][$p['product_id']]['info'][$p['stock_id']] = $p;
            $defProducts[$p['manufacturer_id']][$p['product_id']]['total_quantity']+= $p['quantity'];
        }

        $data = [
            'stocks' => $stocks,
            'manufacturers' => $manufacturers,
            'defProducts' => $defProducts,
        ];

        return $data;
    }

}
