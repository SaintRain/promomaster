<?php

/**
 * Контроллер для заказов, обрабатывает ajax-запросы
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class AjaxOrderController extends Controller {

    /**
     * Покупка под заказ
     *
     * @param Request $request
     */
    public function buyByOrderAction(Request $request)
    {
        $result = $this->get('core_pre_order_logic')->buyByOrder($request);

        return $this->createJsonResponse($result);
    }

    /**
     * Просчет стоимости товара подзаказ
     *
     * @param Request $request
     */
    public function preOrderCostAction(Request $request)
    {
        $requestData = $request->request->all();
        $result = $this->get('core_pre_order_logic')->calculatePreOrderCost($requestData);
        return $this->createJsonResponse($result);
    }

    /**
     * Создание Response объекта с заголовком json
     *
     * @param array $array
     * @return \Symfony\Component\HttpFoundation\Response
     */
    private function createJsonResponse($array)
    {
        $response = new Response(json_encode($array));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}

