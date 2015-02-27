<?php

/**
 * Контроллер для вывода результатов автозаполнения для тегов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxProductTagsController extends Controller
{

    public function indexAction()
    {

    }

    /**
     * Вывод результата автозаполения
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getAutocompleteAction(Request $request)
    {
        $data = $request->query->all();
        $autocompleteData = $this->get('core_directory_product_tags_logic')->getAutocomplete($data);

        $response = new Response(json_encode($autocompleteData));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

}
