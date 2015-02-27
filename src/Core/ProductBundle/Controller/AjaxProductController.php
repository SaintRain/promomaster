<?php

/**
 * Контроллер для товаров для ajax запросов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxProductController extends Controller
{

    /**
     * Запуск генерации YML-файла
     *
     * @param array $array
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ymlGeneratorStartAction(Request $request)
    {
        $res = $this->get('core_product_logic')->ymlGeneratorStart();
        $response = new Response(json_encode($res));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Проверка статуса генерации YML-файла
     *
     * @param array $array
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ymlGeneratorCheckStatusAction(Request $request)
    {
        $res = $this->get('core_product_logic')->ymlGeneratorCheckStatus();
        $response = new Response(json_encode($res));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Проверка парсинга файла с прайсами
     *
     * @param array $array
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function uploadPriceFileCheckStatusAction(Request $request)
    {
        $res = $this->get('core_product_logic')->uploadPriceFileCheckStatus();
        $response = new Response(json_encode($res));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Загрузка файла на парсинг прайса
     *
     * @param array $array
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function uploadPriceFileAction(Request $request)
    {
        $res = $this->get('core_product_logic')->uploadPriceFile($request);
        $response = new Response(json_encode($res));
        $response->headers->set('Content-Type', 'application/json');

        //запускаем крон асинхронно
        $this->container->get('core_common_process')->runAppConsole('product:parce');

        return $response;
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

    /**
     * Обновление товара в избранном (Добавление/Удаление)
     *
     * @param string $action
     * @param int $id
     */
    public function updateFavoritesAction(Request $request, $action, $id)
    {
        $result = $this->get('core_product_logic')->updateFavorites($request, $action, $id);

        return $this->createJsonResponse($result);
    }

    /**
     * Добавление/Удаление товара в/из корзину
     *
     * @param Request $request
     */
    public function updateCartAction(Request $request)
    {
        $result = $this->get('core_product_logic')->updateCart($request);

        return $this->createJsonResponse($result);
    }

    /**
     * Подписка на товар, когда появится в наличии
     *
     * @param Request $request
     */
    public function subscribeToReportAction(Request $request)
    {
        $result = $this->get('core_product_logic')->subscribeToReport($request);

        return $this->createJsonResponse($result);
    }

    /**
     * Получаем дату и кол-во для товаров со ствтцсом "Ожидается поставки"
     *
     * @param Request $request
     */
    public function getDateAndCountForNearestSupplyAction(Request $request)
    {
        $result = $this->get('core_product_logic')->getDateAndCountForNearestSupply($request);

        return $this->createJsonResponse($result);
    }



}
