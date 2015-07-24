<?php

/**
 * Контроллер для работы со статистикой
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StatisticsCabinetController extends Controller
{


    /**
     * Выводит статистику графиками по рекламной компании
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function adCompanyChartStatisticsAction($id)
    {

        $adcompany = $this->getDoctrine()->getManager()->getRepository('CoreAdCompanyBundle:AdCompany')->find($id);

        $statistics = $this->get('core_statistics_logic')->getAdCompanyChartStats($adcompany);
//ldd($statistics);
        return $this->render('CoreStatisticsBundle:AdCompany\Cabinet:edit.html.twig',
            [
                'statistics' => $statistics,
                'adcompany' => $adcompany]);
    }


    /**
     * Выводит статистику графиками по рекламной компании по токену
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function adCompanyChartStatisticsByTokenAction($token)
    {

        $adcompany = $this->getDoctrine()->getManager()->getRepository('CoreAdCompanyBundle:AdCompany')->findOneByToken($token);

        $statistics = $this->get('core_statistics_logic')->getAdCompanyChartStats($adcompany);

        return $this->render('CoreStatisticsBundle:AdCompany:statsByToken.html.twig',
            [
                'statistics' => $statistics,
                'adcompany' => $adcompany]);
    }
}
