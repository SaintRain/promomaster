<?php

/**
 * Контролер для языка
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LanguageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;

class LanguageController extends Controller {

    /**
     * Фиксируем в сессии выбранный язык
     * @param type $activeLanguage
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function switchLanguageAction($activeLanguage) {
        $session = new Session();
        $session->set('activeLanguage', $activeLanguage);
        return new Response($activeLanguage);
    }

}
