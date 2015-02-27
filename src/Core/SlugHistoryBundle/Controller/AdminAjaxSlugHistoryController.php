<?php
/**
 * Контроллер для обрабатки ajax-запросов с админки
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SlugHistoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAjaxSlugHistoryController extends Controller
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
     * Добавление/редактирование/удаление УРЛ по которому будет происходить редирект
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return array
     */
    public function editorSlugAction(Request $request)
    {
        $response = $this->get('core_slug_history_logic')->editorSlug($request);

        return $this->createJsonResponse($response);
    }
}