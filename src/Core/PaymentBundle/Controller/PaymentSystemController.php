<?php

/**
 * Главный контроллер платежей
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentSystemController extends Controller
{

    /**
     * Выдача PDF файла с платежкой
     *
     * @param string $type - тип платежки
     * @param integer $id - id платежа
     * @return pdf file
     */
    public function bankTransferPrintAction($type, $id)
    {
        $payment = $this->getDoctrine()->getManager()->getRepository('CorePaymentBundle:Payment')->findByIdSystemUser($id, 'BankTransfer', $this->get('core_payment_system_logic')->getUser());

        $html = $this->renderView('CorePaymentBundle:PaymentSystem\BankTransfer:' . $type . '.html.twig', array(
            'payment' => $payment,
            'customer' => $payment->getCustomer(),
        ));

        return $this->get('tfox.mpdfport')->generatePdfResponse($html);
    }

    /**
     * Обработка статуса платежа (вызывается платежной системой скрыто)
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param type $paymentSystem
     */
    public function doPassedAction(Request $request, $paymentSystem)
    {
        if (in_array($paymentSystem, ['PayPal', 'YandexMoney', 'PlasticCard', 'PlasticCardTerminal'])) {
            $this->get('core_payment_logic_' . strtolower($paymentSystem))->doPassed($request);
        } else {
            //Robokassa, WebMoney, Qiwi
            $this->get('core_payment_logic_robokassa')->doPassed($request);
        }
    }

}
