<?php

/**
 * Генерация различных документов для работы с заказом
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Logic;

use Doctrine\Common\Collections\ArrayCollection;
use Core\LogisticsBundle\Entity\UnitInStock;
use Application\Sonata\UserBundle\Entity\LegalContragent;
use Core\OrderBundle\Logic\OrderStepsToCreateLogic;
use Symfony\Component\HttpFoundation\Response;

class OrderDocumentsLogic extends OrderStepsToCreateLogic {

    /**
     * Сгенерировать счет на оплату
     * @return type
     */
    public function generateInvoiceForPayment($order_id, $needOrder = false) {
        $order = $this->em->getRepository('CoreOrderBundle:Order')->getOneOrderWithJoins($order_id);
        //определяем будут ли штампы из картинки
        if ($order->getSeller()->getImageSign() && $order->getSeller()->getImageStamp() && $order->getSeller()->getImageSignAndStamp()) {
            $haveStamps = true;
        } else {
            $haveStamps = false;
        }

        $html = $this->templating->render('CoreOrderBundle:Admin/Documents:invoiceForPayment.html.twig', array(
            'order' => $order,
            'haveStamps' => $haveStamps
        ));

        if (!$needOrder) {
            //вывод в браузер
            $res = $this->tfox_mpdfport->generatePdfResponse($html, ['constructorArgs' => ['', 'A4', 0, '', 10, 10, 10, 10, 10, 10, 'P']]);
            return $res;
        } else {
            //возвращает строку
            $res = $this->tfox_mpdfport->generatePdf($html, ['outputDest' => 'S', 'outputFilename' => '', 'constructorArgs' => ['', 'A4', 0, '', 10, 10, 10, 10, 10, 10, 'P']]);
            return [$res, $order];
        }
    }

    /**
     * Отправить счет на оплату
     * @param type $order_id
     */
    public function invoiceForPaymentSend($order_id) {

        list($invoice, $order) = $this->generateInvoiceForPayment($order_id, true);

        $body = $this->templating->render('CoreOrderBundle:Admin/Documents:invoiceForPaymentSend.html.twig', array(
            'order' => $order,
        ));
        $order_id_formatted = $this->container->get('core_common_twig_extension')->idFormatFilter($order_id);
        $subject = 'Счет на оплату заказа #' . $order_id_formatted;

        $attachmentName = 'Счет на оплату - ' . $order_id_formatted . '.pdf';
        $attachment = \Swift_Attachment::newInstance($invoice, $attachmentName, 'application/pdf');

        $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom($this->container->getParameter('default_email'))
                ->setTo($order->getContragent()->getContactEmail())
                ->setBody($body, 'text/html')
                ->attach($attachment);

        $res = $this->mailer->send($message);
        //обновляем время последней отправки
        if ($res) {
            $dtime = new \DateTime();
            $order->setSendInvoiceForPaymentToEmailDateTime($dtime);
            $this->em->flush($order);
        }

        return ['res' => $res, 'sendDateTime' => $dtime->format('d.m.Y H:i:s')];
    }

    /**
     * Генерирует на печать гарантийный талон
     * @return type
     */
    public function generateGuarantees($order_id, $needStamps=false) {
        $order = $this->em->getRepository('CoreOrderBundle:Order')->getOneOrderWithJoins($order_id);
        $data = [];

        //определяем будут ли штампы из картинки
        if ($needStamps && $order->getSeller()->getImageSign() && $order->getSeller()->getImageStamp() && $order->getSeller()->getImageSignAndStamp()) {
            $haveStamps = true;
        } else {
            $haveStamps = false;
        }


        //расчитываем до какого числа действует гарантия
        if ($order->getCreatedDateTime()) {
            $start = date_timestamp_get($order->getCreatedDateTime());
        } else {
            $start = false;
        }

        foreach ($order->getCompositions() as $comp) {
            foreach ($comp->getUnits() as $unit) {
                if ($start) {
                    $unit->warrantyBefore = $start + $unit->getProduct()->getWarrantyMonths() * 2629743; //умножаем на количество секунд в месяце
                }
                $data[] = $unit;
            }

            //если не для всех единиц проставлены серийники, то для вывода доформировываем
            $need = $comp->getQuantity() - $comp->getUnits()->count();
            if ($need > 0) {
                $unitFree = new UnitInStock();
                $unitFree->setProduct($comp->getProduct());
                if ($start) {
                    $unitFree->warrantyBefore = $start + $unitFree->getProduct()->getWarrantyMonths() * 2629743;
                }
                for ($i = 0; $i < $need; $i++) {
                    $data[] = $unitFree;
                }
            }
        }

        $html = $this->templating->render('CoreOrderBundle:Admin/Documents:guarantees.html.twig', array(
            'order' => $order,
            'data' => $data,
            'haveStamps' => $haveStamps
        ));
        /*
          $r = new Response(
          $this->container->get('knp_snappy.pdf')->getOutputFromHtml($html,
          [
          'page-size'=>'A4',
          'orientation'=>'Portrait',
          ]),
          200,
          array(
          'Content-Type'          => 'application/pdf',
          )
          );

          return $r;
         */
        return $this->tfox_mpdfport->generatePdfResponse($html, ['constructorArgs' => ['', 'A4', 0, '', 10, 10, 10, 10, 10, 10, 'P']]);
    }

    /**
     * Генерирует договор доставки
     * @return type
     */
    public function generateDeliveryAgreement($order_id) {
        $order = $this->em->getRepository('CoreOrderBundle:Order')->find($order_id);
        $html = $this->templating->render('CoreOrderBundle:Admin/Documents:deliveryAgreement.html.twig', array(
            'order' => $order,
        ));
        /*
          $r = new Response(
          $this->container->get('knp_snappy.pdf')->getOutputFromHtml($html,
          [
          'page-size'=>'A4',
          'orientation'=>'Portrait',
          ]),
          200,
          array(
          'Content-Type'          => 'application/pdf',
          )
          );

          return $r;
         *
         */
        return $this->tfox_mpdfport->generatePdfResponse($html, ['constructorArgs' => ['', 'A4', 0, '', 10, 10, 10, 10, 10, 10, 'P']]);
    }

    /**
     * Генерирует счет-фактуру
     * @return type
     */
    public function generateInvoice($order_id) {
        $order = $this->em->getRepository('CoreOrderBundle:Order')->getOneOrderWithJoins($order_id);
        $pagescount = 1; //Количество страниц
        //определяем будут ли штампы из  картинки
        if ($order->getSeller()->getImageSign() && $order->getSeller()->getImageStamp() && $order->getSeller()->getImageSignAndStamp()) {
            $haveStamps = true;
        } else {
            $haveStamps = false;
        }

        //собираем дополнительную инфу
        $extraData = [];
        foreach ($order->getCompositions() as $comp) {
            foreach ($comp->getUnits() as $unit) {
                if ($unit->getSupply()->getCountryOfOrigin()) {
                    $extraData[$comp->getId()]['countries'][$unit->getSupply()->getCountryOfOrigin()->getCaptionRu()] = $unit->getSupply()->getCountryOfOrigin();
                }
                $extraData[$comp->getId()]['gtd'][$unit->getProductInSupply()->getGtdNumber()] = $unit->getProductInSupply()->getGtdNumber();
            }
        }

        $html = $this->templating->render('CoreOrderBundle:Admin/Documents:invoice.html.twig', array(
            'order' => $order,
            'extraData' => $extraData,
            'pagescount' => $pagescount,
            'haveStamps' => $haveStamps
        ));

        return $this->tfox_mpdfport->generatePdfResponse($html, ['constructorArgs' => ['', 'A4-L', 0, '', 10, 10, 10, 10, 10, 10, 'L']]);
    }

    /**
     * Генерирует квитанцию для сбербанка
     * @param type $order_id
     */
    public function generateReceiptOfSberbank($order_id) {
        return '';
    }

    /**
     * Сгенерировать товарную накладную на дату
     * @return type
     */
    public function generateWaybillAtTheDate($order_id, $date) {
        $order = $this->em->getRepository('CoreOrderBundle:Order')->find($order_id);

        //разные шаблоны взависимости от типа контрагента
        if ($order->getContragent() instanceof LegalContragent) {
            $prefix = 'Torg12';
        } else {
            $prefix = '';
        }

        //определяем количество листов
        $pageCount = number_format($order->getCompositions()->count() / 30, 0);    //!!!!!!!!!!нужно переделать сейчас не ерно работает
        if (!$pageCount) {
            $pageCount = 1;
        }


        //определяем будут ли штампы из  картинки
        if ($order->getSeller()->getImageSign() && $order->getSeller()->getImageStamp() && $order->getSeller()->getImageSignAndStamp()) {
            $haveStamps = true;
        } else {
            $haveStamps = false;
        }

        $html = $this->templating->render('CoreOrderBundle:Admin/Documents:waybillAtTheDate' . $prefix . '.html.twig', array(
            'order' => $order,
            'dateFrom' => $date,
            'pageCount' => $pageCount,
            'haveStamps' => $haveStamps
        ));
//echo $html; exit;
//        return $this->tfox_mpdfport->generatePdfResponse($html, ['constructorArgs' => ['', 'A4', 0, '', 10, 10, 10, 10, 10, 10, 'P']]);
        return $this->tfox_mpdfport->generatePdfResponse($html, ['constructorArgs' => ['', 'A4-L', 0, '', 10, 10, 10, 10, 10, 10, 'L']]);
    }

    /**
     * Сгенерировать адресные ярлыки для коробок
     * @return type
     */
    public function generateAddressLabel($order_id, $date) {
        $order = $this->em->getRepository('CoreOrderBundle:Order')->find($order_id);
        $html = $this->templating->render('CoreOrderBundle:Admin/Documents:addressLabel.html.twig', array(
            'order' => $order,
        ));

        return $this->tfox_mpdfport->generatePdfResponse($html, ['constructorArgs' => ['', 'A4', 0, '', 10, 10, 10, 10, 10, 10, 'P']]);
    }

    /**
     * Формирует накладные на доставку заказов
     * @param type $orders
     * @return type
     */
    public function batchGenerateDelliveryWaybills($orders) {
        $data = ['ordersTotal' => 0, 'deliveryTotalNalojkaCost' => 0, 'deliveryTotalCost' => 0];

        foreach ($orders as $order) {
            //если заказ можно отгружать
            if (!$order->getIsCanceledStatus() && !$order->getIsShippedStatus() && $order->getIsPaidStatus() && $order->getIsCheckedStatus() && $order->getDeliveryMethod()) {
                //наложенным платежем оплата
                if ($order->getDeliveryMethod()->getIsCashOnDelivery()) {
                    $data['nalojka'][] = $order;
                    $data['deliveryTotalNalojkaCost']+=$order->getDeliveryCost();
                } else {
                    $data['paid'][] = $order;
                    $data['deliveryTotalCost']+=$order->getDeliveryCost();
                }
                $data['ordersTotal'] ++;
            }
        }

        $html = $this->templating->render('CoreOrderBundle:Admin/Batch/delliveryWaybills:delliveryWaybills.html.twig', array(
            'data' => $data,
            'now' => time()
        ));

        return $this->tfox_mpdfport->generatePdfResponse($html, ['constructorArgs' => ['', 'A4-L', 0, '', 10, 10, 10, 10, 10, 10, 'L']]);
    }

    /**
     * Формирует отчет по товарам
     * @param type $orders
     * @return type
     */
    public function batchGenerateReportForProducts($orders) {
        $data = [];
        foreach ($orders as $order) {
            //если заказ можно отгружать
            if (!$order->getIsCanceledStatus() && !$order->getIsShippedStatus() && $order->getIsPaidStatus() && $order->getIsCheckedStatus()) {
                foreach ($order->getCompositions() as $composition) {
                    if (!isset($data[$composition->getProduct()->getId()]['quantity'])) {
                        $data[$composition->getProduct()->getId()]['quantity'] = 0;
                    }
                    $data[$composition->getProduct()->getId()]['quantity']+=$composition->getQuantity();
                    $data[$composition->getProduct()->getId()]['orders'][] = $order;
                    $data[$composition->getProduct()->getId()]['product'] = $composition->getProduct();
                }
            }
        }
        $html = $this->templating->render('CoreOrderBundle:Admin/Batch/reportForProducts:reportForProducts.html.twig', array(
            'data' => $data,
        ));

        return $this->tfox_mpdfport->generatePdfResponse($html, ['constructorArgs' => ['', 'A4', 0, '', 10, 10, 10, 10, 10, 10, 'P']]);
    }

    /**
     * Генерирует печатную форму заказа
     *
     * @author Sergeev A.M.
     */
    public function generateOrderPrintPage($orderId, $user) {
        $order = $this->em->getRepository('CoreOrderBundle:Order')->findUserOrders(['user' => $user, 'orderId' => $orderId]);
        $orderCostInfo = $this->computeOrderCostInfo($order);
        $this->em->getRepository('CoreProductBundle:CommonProduct')->findProductsForCart(array_keys($orderCostInfo['composition']));

        $html = $this->templating->render('ApplicationSonataUserBundle:Profile:order_print.html.twig', array(
            'order' => $order,
            'orderCostInfo' => $orderCostInfo,
        ));

        return $this->tfox_mpdfport->generatePdfResponse($html, ['constructorArgs' => ['', 'A4', 0, '', 10, 10, 10, 10, 10, 10, 'P']]);
    }

}
