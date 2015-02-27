<?php

/**
 * Интерфейс для доставок
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DeliveryController extends Controller {

    public function indexAction()
    {
        $em  = $this->getDoctrine()->getManager();
        $company = $em->getRepository('CoreDeliveryBundle:Company')->find(2);

        $options = $this->getPackagesFromOrder();
        $delivery = $this->get('core_delivery')->configurate($options);
        $price = $delivery->calculate();
        die();
        return $this->render('CoreDeliveryBundle:Delivery:index.html.twig', array(
            'defaultData' => 'default data',
            'price' => $price
        ));
    }

    /**
     * Предварительный подсчет доставки
     * @todo Нужно ли кэшировать запрос на карточке товара???
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws type
     */
    public function calculateAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            throw $this->createNotFoundException('Page Not Found');
        }

        $fullOrder = $this->get('core_order_logic')->getFullOrderInfo();
        foreach($fullOrder['orderCostInfo']['composition'] as $key => $product) {
            $fullOrder['cart'][$key]['cost'] = $product['cost_per_one_unit'];
            $fullOrder['cart'][$key]['quantity'] = $fullOrder['sessionOrder']['products'][$key]['quantity'];
        }
        $configuration = array(
            'deliveryMethodId' => $request->request->get('deliveryMethodId'),
            'deliveryCityId' => $request->request->get('deliveryCityId')
        );

        $deliveryLogic = $this->get('core_delivery');
        $answer = $deliveryLogic->configurate($configuration)->calculate(false, true, $fullOrder, true);
        $translator = $this->get('translator');
        if (isset($answer['result']['days']['maxDays']) || isset($answer['result']['days']['minDays'])) {
            $answer['result']['days']['transPeriod'] = $translator->trans('delivery.deleryTime', array(), 'CoreDeliveryBundle');
        }

        if (isset($answer['result']['days']['maxDays']) && isset($answer['result']['days']['minDays']) && $answer['result']['days']['minDays'] == $answer['result']['days']['maxDays']) {
            $answer['result']['days']['transPeriod'] .= ' ' . $translator->transchoice('delivery.exactlyDays', $answer['result']['days']['maxDays'], array('%days%' => $answer['result']['days']['minDays']), 'CoreDeliveryBundle');
        } else {
            if (isset($answer['result']['days']['minDays'])) {
                $answer['result']['days']['transPeriod'] .= ' ' .$translator->transchoice('delivery.fromDays', $answer['result']['days']['minDays'], array('%days%' => $answer['result']['days']['minDays']), 'CoreDeliveryBundle');
            }

            if (isset($answer['result']['days']['maxDays'])) {
                $maxDaysTrans = $translator->transchoice('delivery.maxDays', $answer['result']['days']['maxDays'], array('%days%' => $answer['result']['days']['maxDays']), 'CoreDeliveryBundle');
                $answer['result']['days']['transPeriod'] .= ' ' . $translator->transchoice('delivery.toDays', $answer['result']['days']['maxDays'], array('%days%' => $answer['result']['days']['maxDays']), 'CoreDeliveryBundle');
                $answer['result']['days']['maxDaysTrans'] = $maxDaysTrans;
            }
        }
        if ($fullOrder['orderDeliveryDays'] && isset($answer['result']['cost'])) {
            $answer['result']['orderDeliveryDays'] = $translator->transchoice('order.label.deliveryDays', $fullOrder['orderDeliveryDays'], array('%days%' => $fullOrder['orderDeliveryDays']));
        }
        
        $response = new Response(json_encode($answer));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * Определяем какие типы доставки возможны для указанного города и продукта
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws type
     */
    public function calculateProductAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            throw $this->createNotFoundException('Page Not Found');
        }

        $productId = $request->request->get('productId');
        if (isset($productId)) {
            $em = $this->getDoctrine()->getManager();
            $product = $em->getRepository('CoreProductBundle:CommonProduct')->find((int)$productId);
            $fullOrder = array(
                    'cart' => array(
                        $productId => array(
                                'cost' => $request->request->get('productPrice'),
                                'quantity' => 1
                                )),
                    'products' => [$product]
            );

            $configuration = array(
                'deliveryMethodId' => $request->request->get('deliveryMethodId'),
                'deliveryCityId' => $request->request->get('deliveryCityId')
            );
            $berylliumCache = $this->get('beryllium_cache');
            $expiresTime = time() + 10;//(7 * 24 * 60 * 60); // время жизни кеша
            $toCache = [];
            $fromCache = ($berylliumCache->get('deliveryCities')) ? $berylliumCache->get('deliveryCities') : ['expiresTime' => $expiresTime];

            if ($fromCache['expiresTime'] <= time()) {
                $fromCache['expiresTime'] = $expiresTime;
                $berylliumCache->delete('deliveryCities');
            }
            $cityId = 'city_' . $configuration['deliveryCityId'];
            $deliveryMethodId = 'method_' . $configuration['deliveryMethodId'];
            if (isset($fromCache[$cityId][$deliveryMethodId])) {
                $response = new Response(json_encode($fromCache[$cityId][$deliveryMethodId]));
            } else {
                $deliveryLogic = $this->get('core_delivery');
                $answer = $deliveryLogic->configurate($configuration)->calculate(false, true, $fullOrder);
                if (isset($answer['result']['days']['maxDays'])) {
                    $translator = $this->get('translator');
                    $maxDaysTrans = $translator->transchoice('delivery.maxDays', $answer['result']['days']['maxDays'], array('%days%' => $answer['result']['days']['maxDays']), 'CoreDeliveryBundle');
                    $answer['result']['days']['maxDaysTrans'] = $maxDaysTrans;
                    $toCache[$cityId][$deliveryMethodId] = $answer;
                    $berylliumCache->set('deliveryCities', array_merge_recursive($fromCache, $toCache), 9 * 24 * 60 * 60);
                }
                $response = new Response(json_encode($answer));
            }

            $response->headers->set('Content-Type', 'application/json');

            return $response;
        }
    }

    /**
     * Печать накладной
     * @param type $hash
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws NotFoundHttpException
     * YTo0OntzOjc6Im9yZGVySWQiO3M6MzoiMzY0IjtzOjg6InNlbGxlcklkIjtzOjE6IjMiO3M6MTY6ImRlbGl2ZXJ5TWV0aG9kSWQiO3M6MToiNSI7czo5OiJ3YXliaWxsSWQiO3M6MTE6IjA4MjcwMDAyUk9WIjt9
     */
    public function printWaybillAction($hash)
    {
        $needData = ['orderId', 'deliveryMethodId', 'sellerId', 'waybillId'];
        $data = unserialize(base64_decode($hash));

        foreach ($needData as $val) {
            if (!array_key_exists($val, $data)) {
                throw $this->createNotFoundException('Page Not Found');
                break;
            }
        }
        $res = $this->get('kernel')->getRootDir().'/../web/uploads/waybills/';
        $requestStack = $this->container->get('request_stack');
        
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
}