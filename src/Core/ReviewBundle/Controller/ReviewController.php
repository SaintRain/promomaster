<?php

/**
 * Контроллер для рейтинга и комментариев
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ReviewBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReviewController extends Controller
{

    /**
     * Добавление нового коментария
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type
     * @throws \Symfony\Component\Debug\Exception\FatalErrorException
     */
    public function sendAction(Request $request)
    {
        $this->get('core_review_logic')->send($request);

        return $this->redirect($request->server->get('HTTP_REFERER') . '#reviews');
    }

}
