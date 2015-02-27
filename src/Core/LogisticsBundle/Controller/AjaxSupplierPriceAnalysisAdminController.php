<?php

/**
 * Контроллер для производителей, обрабатывает ajax-запросы для админки
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class AjaxSupplierPriceAnalysisAdminController extends Controller {

    /**
     * Запрашивает сколько в процентах обработан загруженный прайс
     * @param Request $request
     * @return Response
     */
    public function getUpdateQuantityProgressAction(Request $request) {

        $cache  =  $this->container->get('beryllium_cache');
        $res = $cache->get('parcePricesAnalysisInProgress');
        if (isset($res['percent']) && $res['percent']==100) {
            $cache->delete('parcePricesAnalysisInProgress');
        }

        $response = new Response(json_encode($res));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Устанавливает базовые закупочные цены для списка продуктов. Цены беруться
     * из прайса поставщика
     * @param Request $request
     * @return Response
     */
  public function setBasePriceForProductsFromPriceAction(Request $request) {
      $data = $request->request->get('ids');
      $res = $this->container->get('core_logistics_supplier_price_analysis_logic')->setBasePriceForProductsFromPrice($data);

      $response = new Response(json_encode($res));
      $response->headers->set('Content-Type', 'application/json');
      return $response;
  }

    /**
     * Снимае с публикции продукт которынет в прайс
     * @param Request $request
     * @return Response
     */
    public function disableProductAction(Request $request) {
        $data = $request->request->get('ids');
        $res = $this->container->get('core_logistics_supplier_price_analysis_logic')->disableProduct($data);

        $response = new Response(json_encode($res));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Включает на публикацию продукты
     * @param Request $request
     * @return Response
     */
    public function enableProductAction(Request $request) {
        $data = $request->request->get('ids');
        $res = $this->container->get('core_logistics_supplier_price_analysis_logic')->enableProduct($data);

        $response = new Response(json_encode($res));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

     /**
     * Обновляет МРЦ 
     * @param Request $request
     * @return Response
     */
    public function setMrcPriceForProductsFromPriceAction(Request $request) {
        $data = $request->request->get('ids');
        $res = $this->container->get('core_logistics_supplier_price_analysis_logic')->setMrcPriceForProductsFromPrice($data);

        $response = new Response(json_encode($res));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    

}

