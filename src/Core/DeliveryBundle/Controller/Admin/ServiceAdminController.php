<?php

namespace Core\DeliveryBundle\Controller\Admin;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Core\DeliveryBundle\Admin\Form\Type\WaybillDescriptionType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Core\OrderBundle\Entity\SizesOfBox;
use Symfony\Component\Finder\Finder;

class ServiceAdminController extends Controller {

    /**
     * Список внутренних кодов для опреденной компании
     * @return type
     */
    public function intenalCodesAction()
    {
        $id = (int)$this->get('request')->get('id');
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository('CoreDeliveryBundle:Company')->find($id);
        if (!$company) {
            $result = array(
                'result' => false
            );
        }
        $intenalCodes = $this->admin->getDeliveryInternalCodes($company->getName(), true);

        return $this->renderJson(array(
            'result'    => true,
            'codes'     => $intenalCodes
        ));
    }

    /**
     * Подсчет стоимости доставки
     * route admin_core_delivery_service_deliveryPrice /core/delivery/service/delivery_price
     */
    public function deliveryPriceAction()
    {
        if (!$this->isXmlHttpRequest()) {
            throw new NotFoundHttpException('Page Not Found');
        }
        $requestStack = $this->container->get('request_stack');
        $request = $requestStack->getCurrentRequest()->request->all();
        $result = $this->get('core_delivery')->configurate($request)->calculate();
        
        return $this->renderJson($result['result']);
    }

    /**
     * Форма с накладной
     * Отправка запроса к ТК на формирование заказа
     * route - admin_core_delivery_service_waybill /core/delivery/service/waybill
     * http://www.wmd.ru.vm/index.php?key=print_docs&action=admin_print_cdek&id_order=1026643&id_package=2931
     */
    public function waybillAction()
    {
        /*
        $request = [
            'sizesOfBox' => [
                0 => [
                    'len' => 100,
                    'width' => 100,
                    'height' => 100,
                    'weight' => 100,
                    'isWeightInKg' => 0,
                ]
            ],
            'cart' => [
                0 => ['quantity' => 1, 'id' => 86475],
                1 => ['quantity' => 1, 'id' => 86475],
                2 => ['quantity' => 1, 'id' => 86476],
                3 => ['quantity' => 1, 'id' => 86478],
                4 => ['quantity' => 1, 'id' => 86471],
            ],
            'sellerId' => 1,
            'storeId' => 1,
            'deliveryMethodId' => 5,
            'contragentId' => 148,
            'deliveryPrice' => 183,32,
            'generateForm' => true,
            'deliveryCityId' => 13834,
            'deliveryAddr' => "50 лет СССР 7, кв.42",
            'recipientFio' => "Перов Николай",
            'recipientPhone'=> "+7 (534) 545-43-77",
            'recipientEmail' => "3inc@mail.ru",
            'orderId' => 218
        ];
        */
        if (!$this->isXmlHttpRequest()) {
            throw new NotFoundHttpException('Page Not Found');
        }
        $options = [];
        $data = [];

        $requestStack = $this->container->get('request_stack');
        $request = $requestStack->getCurrentRequest()->request->all();
        $query = $requestStack->getCurrentRequest()->query->all();        
        if (count($query)) {
            $request += $query;
        }
       
        $generateForm = (isset($request['generateForm'])) ? true : false;
        /*
        // 5 - dpd
        // 6 - cdek
        
        $request['deliveryMethodId'] = 15;
        $request['contragentId'] = 4;
        $request['sellerId'] = 3;
        $request['deliveryCityId'] = 2;
        $request['deliveryAddr'] = 'Плеханово 18';
        $request['generateForm'] = true;
        $request['storeId'] = 2;
        $cart = [];
        $request['cart'][0]['id'] = 2908;
        $request['cart'][0]['quantity'] = 3;
        $request['cart'][1]['id'] = 9534;
        $request['cart'][1]['quantity'] = 2;
        $request['orderId'] = 58;
        $generateForm = true;
        $request['sizesOfBox'] = array();
        */

        /*
        // Часть для генерации накладной
        $request['deliveryCity'] = 44;
        $request['deliveryTo'] = 0;
        $request['deliveryFrom'] = 0;
        $request['departureCity'] = 17567;
        $request['house'] = '32А';
        $request['placementType'] = 'кв.';
        $request['placement'] = 12;
        $request['street'] = 'улица';
        $request['streetAbbr'] = 'ул';
        $request['terminalFrom'] = 'VRN1';
        $request['terminalTo'] = 'MSK3';
        $request['service'] = 137;
        $request['extraServices'] = [3, 36];
        */
        
        /*
        $em = $this->getDoctrine()->getManager();
        //$request = $this->getRequest()->request->all();
        $deliveryMethod = $em->getRepository('CoreDeliveryBundle:Service')->findWithCompany((int)$request['deliveryMethodId']);
        $contragent = $em->getRepository('ApplicationSonataUserBundle:CommonContragent')->find((int)$request['contragentId']);
        $company = strtolower($deliveryMethod->getCompany()->getName());
        $city = $em->getRepository('CoreDirectoryBundle:City')->find((int)$request['deliveryCityId']);
        $request['seller'] = $em->getRepository('CoreLogisticsBundle:Seller')->find((int)$request['sellerId']);
        */

        $deliveryLogic = $this->get('core_delivery')->configurate($request);
        $data = $deliveryLogic->calculate(true, $generateForm);
        if ($generateForm && !isset($data['result']['cost'])) {
            throw new NotFoundHttpException('Ошибка при расчете');
        }

        $deliveryMethod = $data['extraData']['deliveryMethod'];
        $company = strtolower($deliveryMethod->getCompany()->getName());
        $getCityId = 'get' . ucfirst($company) . 'Id';

        // Опции для формы
        $options['internalCodes'] = $this->getInternalCodes($company);
        $options['extraServices'] = $this->getExtraServices($company);

        // получить дефолтные доп. услуги для ТК
        /*$activeServices = array();
        if ($deliveryMethod->getIsCashOnDelivery()) {
            $acticeServices[] = 'npp';
        }
        $activeExtraservices = $this->getExtraServices($company, $activeServices);
         * */
        $options['affiliate'] = $deliveryLogic->getAffiliates();
        if  (strpos($request['deliveryAddr'], $data['extraData']['deliveryCity']->getName()) === false) {
            $buyerAddress =  $data['extraData']['deliveryCity']->getName() . "\n" . $request['deliveryAddr'];
        } else {
            $buyerAddress = $request['deliveryAddr'];
        }
        $options['buyerAddress'] = $buyerAddress;
        $options['sellerAddress'] = $data['extraData']['store']->getAddress();
        foreach($request['sizesOfBox'] as $item => $box) {
            $sizesOfBox = new SizesOfBox();
            foreach($box as $key => $val) {
                $key = ($key == 'len') ? 'length' : $key;
                $setter = 'set' . $key;
                $sizesOfBox->$setter((int)$val);
            }
            $request['sizesOfBox'][$item] = $sizesOfBox;
        }
        $form = $this->createForm(new WaybillDescriptionType(), array(
                                    'service' => $deliveryMethod->getInternalCode(),
                                    'company' => $company,
                                    'deliveryFrom' => $deliveryMethod->getDeliveryFrom(),
                                    'deliveryTo' => $deliveryMethod->getDeliveryTo(),
                                    'sellerAddr' => ($deliveryMethod->getDeliveryFrom()) ? $data['extraData']['store']->getAddress() : 'В начале необходимо выбрать терминал отправления',
                                    'buyerAddr' => ($deliveryMethod->getDeliveryTo()) ? $buyerAddress : 'В начале необходимо выбрать терминал прибытия',
                                    'departureCity' => $data['extraData']['departureCity'],
                                    'deliveryCity' => $data['extraData']['deliveryCity']->$getCityId(),
                                    'deliveryMethodId' => $deliveryMethod->getId(),
                                    'sellerId' => $data['extraData']['seller']->getId(),
                                    'deliveryCityId' => $data['extraData']['deliveryCity']->getId(),
                                    'contragentId' => $data['extraData']['contragent']->getId(),
                                    'storeId' => $data['extraData']['store']->getId(),
                                    'sizesOfBox' => $request['sizesOfBox'],
                                    'recipientFio' => $request['recipientFio'],
                                    'recipientEmail' => $request['recipientEmail'],
                                    'recipientPhone' => $request['recipientPhone'],
                                    'recipientCompany' => (isset($request['recipientCompany'])) ? $request['recipientCompany'] : null,
                                    //'extraServices' => $activeExtraservices,
                                    ), $options);
        
        // генерируем форму иначе посылаем данные
        if($generateForm) {
            $answer = $this->render($this->admin->getTemplate('waybill'), array(
                'action'     => 'waybill',
                'form' => $form->createView(),
                'contragent' => $data['extraData']['contragent'],
                'deliveryPrice' => $data['result']['cost'],
                'deliveryTo' => $deliveryMethod->getDeliveryTo(),
                'deliveryFrom' => $deliveryMethod->getDeliveryFrom(),
                'company' => $company
            ));
        } else {
            // отправляем данные в форму
            $form->handleRequest($requestStack->getCurrentRequest());
            if ($form->isValid()) {
                $result = $deliveryLogic->createOrder($request);
            if (isset($result['body']['waybillNum']) && $result['body']['waybillNum']) {
                $hashArr = ['sellerId' => $data['extraData']['seller']->getId(),
                            'deliveryMethodId' => $deliveryMethod->getId(),
                            'waybillId' => $result['body']['waybillNum'],
                            'orderId' => $request['orderId']
                            ];
                $hash = base64_encode(serialize($hashArr));
                $result += ['printWaybillUrl' => $this->generateUrl('delivery_print_waybill', ['hash' => $hash])];
            }
                $answer = $this->renderJson($result);
            } else {
                $translator = $this->get('translator');
                $errors = array();
                foreach ($form as $fieldName => $formField) {
                    foreach ($formField->getErrors() as $error) {
                       $errors[$fieldName]= $translator->trans($this->convertFormErrorObjToString($error), array(), 'validators');
                    }
                }
                $answer = $this->renderJson(array(
                    'result'    => false,
                    'body'     => $errors,
                ));
            }
        }
        return $answer;
    }

    /**
     * Генерация накладной
     * @param type $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws NotFoundHttpException
     * @see admin_core_delivery_service_printWaybill /core/delivery/service/{id}/print_waybill
     * @link www.olikids-kni.ru.vm/app_dev.php/admin/core/delivery/service/58/print_waybill?sellerId=3&deliveryMethodId=6&waybillId=1010580807
     * @link http://www.olikids-kni.ru.vm/app_dev.php/admin/core/delivery/service/58/print_waybill?waybillId=04250761ROV&sellerId=5&deliveryMethodId=14 - wmd накладная
     * @link http://www.olikids-kni.ru.vm/app_dev.php/admin/core/delivery/service/58/print_waybill?waybillId=05050572ROV&sellerId=3&deliveryMethodId=14 - моя накладная
     *
     */
    public function printWaybillAction($id)
    {
        $res = $this->get('kernel')->getRootDir().'/../web/uploads/waybills/';
        $requestStack = $this->container->get('request_stack');
        $request = $requestStack->getCurrentRequest()->query->all();
        /* Если понадобится название компании как часть имени
        $em = $this->getDoctrine()->getManager();
        $deliveryMethod = $em->getRepository('CoreDeliveryBundle:Service')->findWithCompany((int)$request['deliveryMethodId']);
        if (!$deliveryMethod) {
            throw new NotFoundHttpException('Не найден способ доставки');
        }
        $company = $deliveryMethod->getCompany()->getName();
        $fileName = 'waybill_' . strtolower($company) . '_' . $data['orderId'] . '_' . $data['waybillId'] . '.pdf
         * 
         */
        $data = ['orderId' => $id] + $request;
        $fileName = 'waybill_' . $data['orderId'] . '_' . $data['waybillId'] . '.pdf';
        $filePath = $res . $fileName;
        if (file_exists($filePath)) {
            $waybill = file_get_contents($filePath);
            $response = new Response($waybill);
            $response->headers->set('Content-Type', 'application/pdf');
            $response->headers->set('Content-disposition', 'inline');
            $response->headers->set('filename', $fileName);

            return $response;
        }
        $result = $this->get('core_delivery')->configurate($data)->getInvoice();
        if (isset($result['body']['rawData'])) {
            $response = new Response($result['body']['rawData']);
            $response->headers->set('Content-Type', 'application/pdf');
            $response->headers->set('Content-disposition', 'inline');
            $response->headers->set('filename', $result['body']['fileName']);
        } else {
            $msg = isset($result['body']['msg']) ? $result['body']['msg'] : 'Ошибка при генерации накладной';
            throw new NotFoundHttpException($msg);
        }
        
        return $response;
    }

    /**
     * Отмена заказа на доставку
     * - admin_core_delivery_service_cancel /core/delivery/service/cancel_order
     * http://www.olikids-kni.ru.vm/app_dev.php/admin/core/delivery/service/cancel_order?waybillId=05050572ROV&sellerId=3&deliveryMethodId=14&orderId=58
     * http://www.olikids-kni.ru.vm/app_dev.php/admin/core/delivery/service/cancel_order?waybillId=1010691666&sellerId=3&deliveryMethodId=6&orderId=58
     *
     * 536a024339652 05070027ROV
     */
    public function cancelAction()
    {
        $requestStack = $this->container->get('request_stack');
        $request = $requestStack->getCurrentRequest()->query->all();

        $em = $this->getDoctrine()->getManager();
        $waybill = $em->getRepository('CoreOrderBundle:Waybills')->findOneBy(array('number' => (int)$request['waybillId']));
        if ($waybill) {
            $result = ['errors' => false,'body' => 'OK'];
            $companyName = $waybill->getDeliveryMode()->getCompany()->getName();
            if ($companyName == 'dpd' || $companyName == 'cdek') {
                $result = $this->get('core_delivery')->configurate($request)->cancelOrder();
            }
            if ($waybill) {
                    $em->remove($waybill);
                    $em->flush();
            }
        } else {
            $answer = ['errors' => true,'body' => 'Не найден номер накладной'];
        }
        
        return $this->renderJson(array(
            'result' => $result['errors'],
            'body' => $result['body']
        ));
    }

    /**
     * Список городов
     * @return type
     */
    public function citiesAction()
    {
        $requestStack = $this->container->get('request_stack');
        $request = $requestStack->getCurrentRequest()->request->all();
        
        $em = $this->getDoctrine()->getManager();
        $cities = $em->getRepository('CoreDirectoryBundle:City')->findByName($request['name']);

        foreach($cities as $city) {
            if ($city->$request['method']()) {
                $cities[$city->$getCityId()] = $city->getName();
            }
        }

        $answer = $this->renderJson(array(
                    'result'    => true,
                    'body'     => $cities,
                ));

        return $answer;
        
    }

    /**
     * Город доставки для самовывоза
     * @return json
     * @throws NotFoundHttpException
     */
    public function deliveryCityAction()
    {
        if (!$this->isXmlHttpRequest()) {
            throw new NotFoundHttpException('Page Not Found');
        }
        $requestStack = $this->container->get('request_stack');
        $id = (int)$requestStack->getCurrentRequest()->request->get('id');

        $em = $this->getDoctrine()->getManager();
        $deliveryPoint = $em->getRepository('CoreDeliveryBundle:Address')->findOneWithCity($id);
        if ($deliveryPoint && $deliveryPoint->getCity()) {
            if ($deliveryPoint->getCity()->getRegion()) {
                $cityName = sprintf('%s, %s',
                        $deliveryPoint->getCity()->getName(), $deliveryPoint->getCity()->getRegion()->getName());
            } else {
                 $cityName = $deliveryPoint->getCity()->getName();
            }
            $answer = $this->renderJson(array(
                    'result'    => true,
                    'city' => [
                            'id' => $deliveryPoint->getCity()->getId(),
                            'name' => $cityName,
                            'address' => $deliveryPoint->getCaptionRu()
                    ]
            ));
        } else {
            $answer = $this->renderJson(array(
                    'result'    => false,
                    'city'     => null,
                ));
        }

        return $answer;
    }

    /**
     * Внутренние коды для ТК
     * @param type $company
     * @return type
     */
    private function getInternalCodes($company)
    {
        $result = [];
        $internalCodes = $this->container->getParameter('core_delivery.' . $company . '.InternalCodes');
        foreach($internalCodes as $code) {
            if ($code['isActive']) {
                $result[$code['id']] = $code['name'];
            }
        }
        return $result;
    }

    /**
     * Дополнительные услуги ТК
     * @param string $company - имя ТК
     * @param array $options - необходимые доп услуги
     * @return array
     */
    private function getExtraServices($company, $options = null)
    {
        $result = [];
        $extraServices = $this->container->getParameter('core_delivery.' . $company . '.ExtraServices');
        if ($options) {
            foreach($options as $val) {
                if (isset($extraServices[strtolower($val)])) {
                    $result[$extraServices[$val]['id']] = $extraServices[$val]['id'];
                }
            }
        } else {
            foreach($extraServices as $extra) {
                if($extra['isActive']) {
                    $result[$extra['id']] = $extra['name'];
                }
            }
        }
        
        return $result;
    }
    
    /**
     * Преобразование ошибок от формы
     * @param type $error
     * @return type
     */
    private function convertFormErrorObjToString($error) {
        $errorMessageTemplate = $error->getMessageTemplate();
        foreach ($error->getMessageParameters() as $key => $value) {
            $errorMessageTemplate = $this->get('translator')->trans($errorMessageTemplate);
        }
        return $errorMessageTemplate;
    }
}