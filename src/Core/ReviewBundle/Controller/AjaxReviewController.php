<?php

/**
 * Контроллер для рейтинга и комментариев, обрабатывает ajax-запросы
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ReviewBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxReviewController extends Controller
{

    /**
     * Генерация ответа в формате JSON
     */
    private function createJsonResponse($response)
    {
        $response = new Response(json_encode($response));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Лайк у отзыва +\-
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return array
     */
    public function rateAction(Request $request)
    {
        $response = $this->get('core_review_logic')->rate($request);

        return $this->createJsonResponse($response);
    }

    /**
     * Получение всех отзывов товара
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return array
     */
    public function viewMoreAction(Request $request)
    {
        $response = $this->get('core_review_logic')->viewMore($request);

        return $this->createJsonResponse($response);
    }

    /**
     * Смена сортировки
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return array
     */
    public function changeSortOrFilterAction(Request $request)
    {
        $response = $this->get('core_review_logic')->changeSortOrFilter($request);

        return $this->createJsonResponse($response);
    }

}
