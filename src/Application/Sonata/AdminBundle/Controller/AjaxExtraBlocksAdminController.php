<?php

/**
 * Контроллер для обработки ajax-запросов из админки
 *
 * @author Shapovalov.V
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class AjaxExtraBlocksAdminController extends Controller
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
     * Контроллер для обработки добовления коммментария, или подписки юзера на обновление коментариев
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function leaveCommentAction(Request $request)
    {
        $response = $this->get('application_sonata_admin_extra_blocks_logic')->leaveComment($request);

        return $this->createJsonResponse($response);
    }

    /**
     * Контроллер для обработки удаления коммментария
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function removeCommentAction(Request $request)
    {
        $response = $this->get('application_sonata_admin_extra_blocks_logic')->removeComment($request);

        return $this->createJsonResponse($response);
    }

    /**
     * Контроллер для связывания тикета с заказом
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function attachTicketsAction(Request $request)
    {
        $response = $this->get('application_sonata_admin_extra_blocks_logic')->attachTickets($request);

        return $this->createJsonResponse($response);
    }

    /**
     * Контроллер для удаления тикета из заказа, разрывается только связь, сам тикет не удаляется
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function detachTicketsAction(Request $request)
    {
        $response = $this->get('application_sonata_admin_extra_blocks_logic')->detachTickets($request);

        return $this->createJsonResponse($response);
    }

}
