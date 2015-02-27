<?php

/**
 * Контроллер для профайла пользователя для ajax запросов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxProfileController extends Controller
{

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

    /**
     * Очистка истории просмотренных товаров у пользователя в кабинете
     */
    public function productsHistoryClearAction(Request $request)
    {
        $result = $this->get('core_product_logic')->productsHistoryClear($request);

        return $this->createJsonResponse($result);
    }

    /**
     * Получение списка контрагентов пользователя
     *
     * @return json
     */
    public function getUserContragentsAction()
    {
        $response = $this->get('application_user_logic')->getUserContragents($this->getUser());

        return $this->createJsonResponse($response);
    }

    /**
     * Смена котрагента
     *
     * @return json
     */
    public function changeContragentAction(Request $request)
    {
        $this->get('application_user_logic')->changeContragent($request);

        return $this->createJsonResponse([]);
    }

}
