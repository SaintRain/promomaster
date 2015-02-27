<?php

/**
 * Контроллер для обработки запросов на создание Union-объединений
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\UnionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sonata\AdminBundle\Form\FormMapper;
use Core\UnionBundle\Logic\FormMapperEmpty;
use Core\ProductBundle\Admin\Form\Mapper\ProductFormMapper;

class AjaxUnionController extends Controller {

    /**
     * Назначаем запись в объединение
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function setRecordToUnionAction() {

        $data = $this->get('request')->request->all();
        list($errors, $objectList) = $this->get('core_union_logic')->setRecordToUnion($data);
        $res = $this->get('core_union_logic')->generateResponse($data, $errors, $objectList);

        $response = new Response(json_encode($res));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Открепляем запись из объединения
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function unsetRecordFromUnionAction() {

        $data = $this->get('request')->request->all();
        $errors = $this->get('core_union_logic')->unsetRecordFromUnion($data);

        $response = new Response(json_encode($errors));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

}

