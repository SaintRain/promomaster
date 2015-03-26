<?php

/**
 * Контроллер для работы со статистикой, обрабатывает ajax-запросы
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Controller;

use Sonata\AdminBundle\Controller\CoreController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class AjaxAdminStatisticsController extends CoreController
{

    /**
     * Получение сводной информации
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response - json объект
     */
    public function getAdCompanyChartStatsGeneralHistoryAction(Request $request)
    {

        $adcompany_id = $request->request->get('adcompany_id');

        $response = $this->get('core_statistics_logic')
            ->getAdCompanyChartStatsGeneralHistory($adcompany_id);

        return new Response($response);
    }


    /**
     * Получение графика изменения цены
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response - json объект
     */
//    public function getChartPriceHistoryAction(Request $request)
//    {
//        // подключаем сервис
//        $logic = $this->get('core_product_statistics_logic');
//
//        $id = $request->request->get('id'); // id продукта
//        // вызываем метод загрузки графика
//        $response = $logic->getChartPriceHistory($id);
//
//        return new Response($response);
//    }

    /**
     * Генерация отчета по инвенторизации
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
//    public function generateInventoryStatisticsAction(Request $request)
//    {
//        $data = $this->get('request')->query->all(); // id продукта
//        // подключаем сервис
//        $logic = $this->get('core_statistics_inventory_logic');
//
//        // вызываем метод загрузки картинок
//        $response = $logic->generateStatistics($data);
//
//        return new Response($response);
//    }

    /**
     * Генерация истории объекта
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getAuditInformationAction(Request $request)
    {
        $data = $request->query->all();
        $object = $this->getDoctrine()->getManager()->getRepository($data['namespace'])->find($data['id']);
        $temp = explode('\\', $data['namespace']);
        $CClass = '\\Core\\StatisticsBundle\\Logic\\AuditConfigs\\' . array_pop($temp);
        $CObject = new $CClass;
        $configs = $CObject->getConfigs([
            'currency' => $this->container->getParameter('default_currency'),
            'object' => $object
        ]);
        $auditData = $this->get('core_audit_logic')->getAuditData($object, $configs['fields'], $configs['exceptions']);

        return $this->render('CoreStatisticsBundle:Admin\\EntityAudit:block.html.twig', array(
            'auditData' => $auditData,
            'translationDomain' => $data['translationDomain'],
            'admin_pool'      => $this->container->get('sonata.admin.pool'),
        ));
    }
}