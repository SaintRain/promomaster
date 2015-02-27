<?php

/**
 * Контроллер для обработки запросов для модификаций
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ProductModificationController extends Controller
{

    /**
     * Обрабатывает запрос на создание модификации продукта
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createProductModificationAction()
    {

        $data = $this->get('request')->request->all();
       list($errors, $newObjectList) = $this->get('core_product_modification_logic')->createProductModification($data);
        $res = $this->get('core_product_modification_logic')->generateResponse($data, $errors, $newObjectList);

        $response = new Response(json_encode($res));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Обрабатывает запрос на создание дубликата продукта
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createProductDublicateAction()
    {

        $data = $this->get('request')->request->all();
        list($errors, $newObject) = $this->get('core_product_modification_logic')->createDublicate($data);
        
        $res = [
            'errors' => $errors,
            'newObjectId' => $newObject->getId()
        ];
        $response = new Response(json_encode($res));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Назначаем запись в объединение
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function setRecordToModificationAction()
    {

        $data = $this->get('request')->request->all();
        list($errors, $objectList) = $this->get('core_product_modification_logic')->setRecordToModification($data);
        $res = $this->get('core_product_modification_logic')->generateResponse($data, $errors, $objectList);

        $response = new Response(json_encode($res));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Открепляем запись из объединения
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function unsetRecordFromModificationAction()
    {

        $data = $this->get('request')->request->all();
        list($errors, $objectId) = $this->get('core_product_modification_logic')->unsetRecordFromModification($data);

        $response = new Response(json_encode($errors));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

}
