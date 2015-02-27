<?php

/**
 * Контроллер для обработки  ajax-запросов из админки для предзаказов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Application\Sonata\UserBundle\Entity\IndiContact;
use Application\Sonata\UserBundle\Entity\LegalContact;

class AdminAjaxPreOrderController extends Controller
{

    /**
     * Возвращает список получателей предзаказов для объединения
     */
    public function getPreOrdersAction(Request $request)
    {
        $data = $this->get('request')->query->all();
        $res = $this->container->get('core_pre_order_logic')->getPreOrders($data['preorder_id']);
        $response = new Response(json_encode($res));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Объединяет два предзаказа в один
     */
    public function combinePreOrdersAction(Request $request)
    {
        $data = $this->get('request')->query->all();
        $res = $this->container->get('core_pre_order_logic')->combinePreOrders($data);
        $response = new Response(json_encode($res));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

}
