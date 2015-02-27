<?php

/**
 * Контроллер цветов, обрабатывает ajax-запросы
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\logisticsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class AjaxLogisticsAdminController extends Controller {

    /**
     * Удаляет задачу на постановку товара в транзакцию
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteBookFromTransitAction(Request $request) {

        $data = $request->query->all();
        $qantity=$this->container->get('core_logistics_logic')->deleteBookFromTransit($data['id']);
        $response = new Response(json_encode(['total'=>$qantity]));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

}

