<?php

/**
 * Обработка ajax-запросов для нового типа формы ajax_entity
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxEntityController extends Controller {

    public function getDataAction(Request $request) {

        $response = $this->get('core_common_ajax_entity_logic')->getData($request);

        return new Response($response);
    }

}
