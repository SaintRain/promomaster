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
                foreach ($placement->getStatistics() as $s) {
                    $pShows += $s->getShowsQuantity();
                    $pClicks += $s->getClicksQuantity();
                    $statistics['general'][0]['data'][] = [$s->getStartDateTime()->getTimestamp() * 1000, $s->getShowsQuantity()];
                    $statistics['general'][1]['data'][] = [$s->getStartDateTime()->getTimestamp() * 1000, $s->getClicksQuantity()];
                    $statistics['placements'][$key][0]['data'][] = [$s->getStartDateTime()->getTimestamp() * 1000, $s->getShowsQuantity()];
                    $statistics['placements'][$key][1]['data'][] = [$s->getStartDateTime()->getTimestamp() * 1000, $s->getClicksQuantity()];
                }


                $statistics['placementsClicks'][$key] = $pClicks;
                $statistics['placementsShows'][$key] = $pShows;
                $statistics['placementsCTR'][$key] = round($pClicks / ($pShows / 100), 2);


                $clicks += $pClicks;
                $shows += $pShows;

            }


        $statistics['generalClicks'] = $clicks;
        $statistics['generalShows'] = $shows;
        $statistics['generalCTR'] = round($clicks / ($shows / 100), 2);


        return $statistics;
    }

}
