<?php

/**
 * Сервис для вывода инвенторизации по складам
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Logic;

use Symfony\Component\HttpKernel\Exception\FatalErrorException;
use Symfony\Component\HttpFoundation\Request;

class InventoryStatisticsLogic {

    protected $em;
    protected $templating;

    public function __construct($em, $templating, $tfox_mpdfport) {
        $this->em = $em;
        $this->templating = $templating;
        $this->tfox_mpdfport = $tfox_mpdfport;
    }

    /**
     * Вывод формы-фильтра для  генерации инвентаризации
     * @return array
     */
    public function getFilterForm() {

        $stocks = $this->em->getRepository('CoreLogisticsBundle:Stock')->findAll();
        $data = [
            'stocks' => $stocks,
        ];

        return $data;
    }

    /**
     * Генерация статистики
     * @return array
     */
    public function generateStatistics($data) {
        if (!isset($data['filter']['id_store'])) {
            $data['filter']['id_store'] = [];
        }
        $stocks = $this->em->getRepository('CoreLogisticsBundle:Stock')->geAllByIndexId($data['filter']['id_store']);
        $statistics = [];
        $defect = [];

        if (isset($data['filter']['only_free']) && $data['filter']['only_free']) {  //только свободные
            //берем виртуальные позиции в пути
            $vputy = $this->em->getRepository('CoreLogisticsBundle:UnitInStock')->getInventoryProductsAvaibilityVirtulVPuty($data['filter']['id_store']);
            $statistics = $this->em->getRepository('CoreProductBundle:CommonProduct')->getInventoryProductsAvaibility($data['filter']['id_store']);

            //вычитаем от реальных позиций, те что в пути, чтобы получить чистое количество реальных позиций
            foreach ($statistics as $key=> $s) {
                foreach ($vputy as $vp) {
                    if ($s['product_id'] == $vp['product_id']) {
                        if (($s['quantity'] - $vp['quantity']) > -1) {
                            $statistics[$key]['quantity']=$s['quantity']-$vp['quantity'];
                        }
                        break;
                    }
                }
            }

            foreach ($data['filter']['id_store'] as $id_stock) {
                $defect2 = $this->em->getRepository('CoreLogisticsBundle:UnitInStock')->getInventoryProductsWithDefect($id_stock);
                foreach ($defect2 as $stock_id => $d2) {
                    foreach ($d2 as $product_id => $p) {
                        $defect[$stock_id][$product_id] = $p;
                    }
                }
            }
        } else { //всё, что лежит на складе
            foreach ($data['filter']['id_store'] as $id_stock) {
                $statistics2 = $this->em->getRepository('CoreProductBundle:CommonProduct')->getInventoryProducts($id_stock);
                $statistics = array_merge($statistics, $statistics2);
            }
        }

        $defProducts = [];
        $number = 0;
        if ($data['filter']['type'] == 'sum') {
            foreach ($statistics as $p) {
                if (!isset($defProducts['total_quantity'])) {
                    $defProducts['total_quantity'] = 0;
                    $defProducts['total_quantity_with_defect'] = 0;
                }

                if (isset($data['filter']['only_free']) && $data['filter']['only_free']) {
                    if (isset($defProducts[$p['stock_id']][$p['product_id']])) {
                        $p['quantity_with_defect'] = $defProducts[$p['stock_id']][$p['product_id']];
                    } else {
                        $p['quantity_with_defect'] = 0;
                    }
                }

                $add = ['product' => $p,
                    'number' => ++$number
                ];
                $defProducts['data'][] = $add;
                $defProducts['total_quantity'] += $p['quantity'];
                $defProducts['total_quantity_with_defect'] += $p['quantity_with_defect'];
            }
        } else {

            foreach ($statistics as $p) {
                if (!isset($defProducts[$p['stock_id']]['total_quantity'])) {
                    $defProducts[$p['stock_id']]['total_quantity'] = 0;
                    $defProducts[$p['stock_id']]['total_quantity_with_defect'] = 0;
                    $number = 0;
                }

                if (isset($data['filter']['only_free']) && $data['filter']['only_free']) {
                    if (isset($defProducts[$p['stock_id']][$p['product_id']])) {
                        $p['quantity_with_defect'] = $defProducts[$p['stock_id']][$p['product_id']];
                    } else {
                        $p['quantity_with_defect'] = 0;
                    }
                }

                $add = ['product' => $p,
                    'number' => ++$number
                ];
                $defProducts[$p['stock_id']]['data'][] = $add;
                $defProducts[$p['stock_id']]['total_quantity'] += $p['quantity'];
                $defProducts[$p['stock_id']]['total_quantity_with_defect'] += $p['quantity_with_defect'];
            }
        }


        $html = $this->templating->render('CoreStatisticsBundle:Admin/Crud:inventoryGeneratedStatistics_' . $data['filter']['type'] . '.html.twig', array(
            'data' => $defProducts,
            'stocks' => $stocks,
            'search' => $data
        ));

        if ($data['format'] == 'pdf') {
            return $this->tfox_mpdfport->generatePdfResponse($html);
        } else {
            return $html;
        }
    }

}
