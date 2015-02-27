<?php

/**
 * Контроллер для обработки  ajax-запросов из админки для заказов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Application\Sonata\UserBundle\Entity\IndiContact;
use Application\Sonata\UserBundle\Entity\LegalContact;

class AdminAjaxOrderController extends Controller
{

    /**
     * Создаёт автоматически реальную поставку для овара под заказ
     * @param $needNewSupply
     * @param null $order_id
     */
    public function  createNewSupplyAction(Request $request)
    {
        $data = $request->request->all();
        $res = $this->container->get('core_order_logic')
            ->createNewSupply($data['needNewSupply'], $data['order'], false);
        $response = new Response(json_encode(true));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


    /**
     * Сгенерировать гарантийный талон
     */
    public function generateGuaranteesAction($order_id, $needStamps = false)
    {
        $response = $this->container->get('core_order_logic')->generateGuarantees($order_id, $needStamps);
        return new Response($response);
        //return $response;
    }

    /**
     * Сгенерировать договор поставки
     */
    public function generateDeliveryAgreementAction($order_id)
    {
        $response = $this->container->get('core_order_logic')->generateDeliveryAgreement($order_id);
        return new Response($response);
        //return $response;
    }

    /**
     * Сгенерировать счет-фактуру
     * @param type $order_id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function generateInvoiceAction($order_id)
    {
        $response = $this->container->get('core_order_logic')->generateInvoice($order_id);
        return new Response($response);
    }

    /**
     * Сгенерировать счет на оплату
     */
    public function generateInvoiceForPaymentAction($order_id)
    {
        $response = $this->container->get('core_order_logic')->generateInvoiceForPayment($order_id);
        return new Response($response);
    }

    /**
     * Отправить счет на оплату по  email
     */
    public function invoiceForPaymentSendAction($order_id)
    {
        $res = $this->container->get('core_order_logic')->invoiceForPaymentSend($order_id);

        $response = new Response(json_encode($res));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Сгенерировать квитанцию сбербанка
     */
    public function generateReceiptOfSberbankAction($order_id)
    {
        $response = $this->container->get('core_order_logic')->generateReceiptOfSberbank($order_id);
        return new Response($response);
    }

    /**
     * Сгенерировать товарную накладную на дату
     */
    public function generateWaybillAtTheDateAction($order_id, $date)
    {
        $response = $this->container->get('core_order_logic')->generateWaybillAtTheDate($order_id, $date);
        return new Response($response);
    }

    /**
     * Сгенерировать адресные ярлыки для коробок
     */
    public function generateAddressLabelAction($order_id, $quantity)
    {
        $response = $this->container->get('core_order_logic')->generateAddressLabel($order_id, $quantity);
        return new Response($response);
    }

    /**
     * Добавитьтовар в транзит
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addProductToTransitAction(Request $request)
    {

        $data = $request->query->all();

        $res = $this->container->get('core_order_logic')->addProductToTransit($data);

        $response = new Response(json_encode($res));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function updateSerialsAction(Request $request)
    {

        $data = $this->get('request')->request->all();

        $res = $this->container->get('core_order_logic')->updateSerials($data);

        $response = new Response(json_encode($res));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    /**
     * Возвращает список получателей для контрагента
     */
    public function getContragentReceipmentsAction(Request $request)
    {
        $data = $this->get('request')->query->all();

        $contragent = $this->container->get('doctrine.orm.entity_manager')
            ->getRepository('ApplicationSonataUserBundle:CommonContragent')->find($data['contragent_id']);
        $res = [];
        foreach ($contragent->getContactList() as $contact) {
            $caption = $contact->getLastName() . ' ' . $contact->getFirstName() . ' ' . $contact->getSurName();
            if ($contact instanceof LegalContact) {
                $organisation = htmlspecialchars($contact->getOrganization(), ENT_QUOTES);
                $caption .= $organisation;
                $passport = '';
            } else {
                $organisation = '';
                $passport = $contact->getPassport();
            }
            $caption = htmlspecialchars($caption, ENT_QUOTES);
            $res[] = [
                'id' => $contact->getId(),
                'caption' => $caption,
                'organization' => $organisation,
                'passport' => $passport,
                'contactEmail' => $contact->getContactEmail(),
                'phone' => $contact->getPhone()
            ];
        }

        //заменяепм null на пустую строку
        foreach ($res as $ind => $r) {
            foreach ($r as $key => $v) {
                if ($v === null) {
                    $res[$ind][$key] = '';
                }
            }
        }

        $response = new Response(json_encode($res));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


}
