<?php

/**
 * Логика статистики
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Logic;

use Ob\HighchartsBundle\Highcharts\Highchart;
use Ob\HighchartsBundle\Highcharts\Highstock;

class StatisticsLogic
{

    protected $em;


    public function __construct($em)
    {

        $this->em = $em;
    }


    public function getAdCompanyChartStats($adcompany)
    {

        $statistics = ['general' => [
            0 => ['caption' => 'Показы'],
            1 => ['caption' => 'Клики'],
        ]];
        $clicks = 0;
        $shows = 0;


        $ids = [];
        foreach ($adcompany->getPlacements() as $key => $placement) {
            $ids[] = $placement->getId();
        }

        $stats = $this->em->getRepository('CoreStatisticsBundle:Statistics')->getCommonStatisticsForPlacements($ids);


        foreach ($adcompany->getPlacements() as $key => $placement) {
            $statistics['placements'][$key] = [
                0 => [
                    'object' => $placement,
                    'caption' => 'Показы'],
                1 => [
                    'object' => $placement,
                    'caption' => 'Клики'],
            ];

            $pClicks = 0;
            $pShows = 0;


            if (isset($stats[$placement->getId()])) {
                foreach ($stats[$placement->getId()] as $s) {
                    $t = $s['startDateTime']->getTimestamp() * 1000;

                    $pShows += $s['showsQuantity'];
                    $pClicks += $s['clicksQuantity'];
                    $statistics['general'][0]['data'][] = [$t, $s['showsQuantity']];
                    $statistics['general'][1]['data'][] = [$t, $s['clicksQuantity']];
                    $statistics['placements'][$key][0]['data'][] = [$t, $s['showsQuantity']];
                    $statistics['placements'][$key][1]['data'][] = [$t, $s['clicksQuantity']];
                }
            }

            $statistics['placementsClicks'][$key] = $pClicks;
            $statistics['placementsShows'][$key] = $pShows;
            if ($pClicks && $pShows) {
                $statistics['placementsCTR'][$key] = round($pClicks / ($pShows / 100), 2);
            } else {
                $statistics['placementsCTR'][$key] = 0;
            }


            $clicks += $pClicks;
            $shows += $pShows;
        }


        $statistics['generalClicks'] = $clicks;
        $statistics['generalShows'] = $shows;
        if ($shows) {
            $statistics['generalCTR'] = round($clicks / ($shows / 100), 2);
        } else {
            $statistics['generalCTR'] = 0;
        }


        return $statistics;
    }

}
