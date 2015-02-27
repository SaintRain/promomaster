<?php
/**
 * Общий сервис для работы с платежами и балансом
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Logic;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Core\PaymentBundle\Entity\Payment;

class PaymentLogic
{
    protected $locale; // текущая локаль
    protected $default_currency; // дефолтная валюта
    protected $request; // данные полученный POST или GET запросом
    protected $session; // сессия
    protected $doctrine; // доктрина
    protected $translator; // переводчик
    protected $OrderLogic; // логика заказов
    protected $router; // логика заказов
    protected $container;

    public function __construct($container, $doctrine, $session, $translator, $core_order_logic, $router)
    {
        $this->container        = $container;
        $this->locale           = $container->getParameter('locale');
        $this->default_currency = $container->getParameter('default_currency');
        $this->session          = $session;
        $this->doctrine         = $doctrine;
        $this->translator       = $translator;
        $this->OrderLogic       = $core_order_logic;
        $this->router           = $router;
    }

    /**
     * Подписка на событие request для получения текущей локили
     *
     * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        if ($event->getRequestType() === HttpKernel::MASTER_REQUEST) {
            $this->request = $event->getRequest();
            $this->locale  = $event->getRequest()->getLocale();
        }
    }

    /**
     * Получаем баланс контрагента из сессии или просчитывает снова и звписывает в сессию
     *
     * @param int|obj $customer
     * @param bool $force
     * @return float
     */
    public function getBalance($customer, $force = false)
    {
        $customerId = is_object($customer) ? $customer->getId() : $customer;

        $balance = $this->session->get('balance');

        if ($force || !isset($balance[$customerId]) || null === $balance[$customerId]) {

            $em              = $this->doctrine->getManager();
            $totalByPayments = $em->getRepository('CorePaymentBundle:Payment')->getTotalAmountByCuctomer($customer);

            $orders        = $em->getRepository('CoreOrderBundle:Order')->findByCustomerToCalculateBalance($customer);
            $totalByOrders = 0;

            foreach ($orders as $order) {
                $totalByOrders += $this->OrderLogic->getOrderCostForContragentBalanceCompute($order);
            }

            $balance[$customerId] = (float) number_format($totalByPayments - $totalByOrders, 2, '.', '');
            $this->session->set('balance', $balance);
        }

        return $balance[$customerId];
    }

    /**
     * Получение данных для вывода истории изменения баланса в админке
     */
    public function getBalanceHistoryAdmin($customer, $options = array())
    {
        if (is_object($customer)) {
            $customer = $customer->getId();
        }

        $em       = $this->doctrine->getManager();
        $payments = $em->getRepository('CorePaymentBundle:Payment')->findPassedByCustomer($customer);

        $history = array();

        if (!isset($options['sellerId']) || $options['sellerId'] <= 0) {
            foreach ($payments as $payment) {
                $history[] = array(
                    'is' => 'payment',
                    'type' => $payment->getType() ? Payment::TYPE_IN : Payment::TYPE_OUT,
                    'amount' => $payment->getAmount(),
                    'description' => htmlspecialchars($payment->getNoteRu())."\n".'Платеж <a href="'.$this->router->generate('admin_core_payment_payment_edit', array('id' => $payment->getId())).'">№'.$payment->getId().'</a>',
                    'date' => $payment->getPassedAt(),
                );
            }
        }

        $sellers = array();
        $orders  = $em->getRepository('CoreOrderBundle:Order')->findByCustomerToCalculateBalance($customer);
        foreach ($orders as $order) {
            if ($order->getIsPaidStatus() || $order->getShippedDateTime()) {
                $seller = $order->getSeller();
                if ($seller) {
                    if (!isset($options['sellerId']) || $options['sellerId'] <= 0 || (isset($options['sellerId']) && (int) $options['sellerId'] === (int) $seller->getId())) {
                        $history[] = array(
                            'is' => 'order',
                            'type' => Payment::TYPE_OUT,
                            'amount' => $this->OrderLogic->getOrderCostForContragentBalanceCompute($order),
                            'description' => 'Оплата заказа <a href="'.$this->router->generate('admin_core_order_order_edit', array('id' => $order->getId())).'">№'.$this->container->get('core_common_twig_extension')->idFormatFilter($order->getId()).'</a>',
                            'date' => $order->getPaidDateTime() ? $order->getPaidDateTime() : $order->getShippedDateTime(),
                        );

                        $sellers[$seller->getId()] = $seller;
                    }
                }
            }
        }

        usort($history, function($a, $b) {
            return ($a['date']->getTimestamp() < $b['date']->getTimestamp()) ? -1 : 1;
        });

        return [
            'balanceHistory' => $history,
            'sellers' => $sellers,
        ];
    }

    /**
     * Функция для отправки информации о платеже на email администратора, в случае если платеж выпонен
     *
     * @param object $payment
     */
    public function sendPaymentOnSupportEmailIfIsPassed($payment)
    {
        if ($payment instanceof Payment && $payment->getIsPassed() && $payment->getSystem()) {

            $em  = $this->container->get('doctrine')->getManager();
            $uow = $em->getUnitOfWork();
            $uow->computeChangeSets();
            $res = $uow->getEntityChangeSet($payment);

            if (isset($res['isPassed'])) {

                $domain = $this->container->get('request')->server->get('HTTP_HOST');

                $orderCostInfo = $payment->getOrder() ? $this->container->get('core_order_logic')->computeOrderCostInfo($payment->getOrder()) : null;

                $renderedTemplate = $this->container->get('templating')->render('CorePaymentBundle:Email:sendPaymentOnSupportEmailIfIsPassed.html.twig',
                    array(
                    'domain' => $domain,
                    'payment' => $payment,
                    'orderCostInfo' => $orderCostInfo,
                    )
                );

                $email   = $this->container->getParameter('default_email');
                //$email   = 'Sergeev A.M.@office.ekance.com';
                $message = \Swift_Message::newInstance()
                    ->setSubject('Информация о выполненом платеже.')
                    ->setFrom($email)
                    ->setTo($email)
                    ->setBody($renderedTemplate, 'text/html');

                $this->container->get('mailer')->send($message);
                $spool     = $this->container->get('mailer')->getTransport()->getSpool();
                $transport = $this->container->get('swiftmailer.transport.real');
                $spool->flushQueue($transport);
            }
        }
    }
}