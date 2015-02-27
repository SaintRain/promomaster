<?php

/**
 * Расслыка писем качающая заказа
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Logic;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Routing\RouterInterface;
use FOS\UserBundle\Mailer\MailerInterface;
use Symfony\Component\Translation\Translator;
use Core\OrderBundle\Entity\Order;
use Core\OrderBundle\Entity\PreOrder\PreOrder;
use Application\Sonata\UserBundle\Entity\LegalContragent;
use Core\DeliveryBundle\Entity\Company;

class OrderMailerLogic {

    protected $mailer;
    protected $router;
    protected $templating;
    protected $translator;
    protected $params;
    protected $config;
    protected $core_common_twig_extension;
    protected $twig;
    protected $order_logic;

    public function __construct($mailer, RouterInterface $router, EngineInterface $templating, Translator $translator, $config, $core_common_twig_extension, $twig, $params, $order_logic) {
        $this->mailer = $mailer;
        $this->router = $router;
        $this->templating = $templating;
        $this->translator = $translator;
        $this->params = $params;
        $this->config = $config;
        $this->core_common_twig_extension = $core_common_twig_extension;
        $this->twig = $twig;
        $this->order_logic = $order_logic;
    }

    /**
     *
     * @param \Core\TroubleTicketBundle\Entity\TroubleTicket $ticket
     * @param \Core\TroubleTicketBundle\Entity\TroubleTicket $ticket
     * @param \Core\TroubleTicketBundle\Entity\Message $message
     * @param string $toEmail
     */
    public function sendOnNewOrder(Order $order, $fromEmail, $toEmail = null) {
        $rendered = $this->templating->render('CoreOrderBundle:Order:msg_on_create.html.twig', array(
            'order' => $order
        ));

        $utc = new \DateTimeZone($this->params['default_timezone']);
        $d = new \DateTime('now', $utc);
        $now = $d->format('d.m.Y');
        
        $msg = [
            'Создан новый заказ № ' => $data['order']->getId() . ' от ' . $now . "\n\r",
            'на сумму: ' => $data['order']->getCost() . 'рублей' . "\n\r",
            'Способ оплаты:' => $data['order']->getPayments()->first()->getSystem()->getSystem() . "\n\r",
            'Cпособ доставки:' => $data['order']->getDeliveryMethod()->getCaptionRu() . "\n\r",
            'Cсылка на заказ в админке' => $this->container->get('router')->generate('admin_core_order_order_edit', array('id' => 3/* $data['order']->getId() */), true)
        ];
        $subject = $this->translator->trans('order.create', array());
        $this->sendEmailMessage($rendered, $subject, $fromEmail, $toEmail);
    }

    /**
     * Делаем рассылку, если статус заказа изменился
     * @param \Core\OrderBundle\Entity\Order $order
     * @param type $config_tpl_name
     */
    public function sendOnMainStatusChange(Order $order, $config_tpl_name) {

        $fromEmail = $this->params['default_email'];
        $templateContent = $this->config->get($config_tpl_name); //берем из базы шаблон письма

        $payment = $order->getPayments()->last();

        $utc = new \DateTimeZone($this->params['default_timezone']);
        $d = new \DateTime('now', $utc);
        $now = $d->format('d.m.Y H:i:s');
        if ($payment && $payment->getSystem() && $payment->getSystem()->getSystem() == 'PaymentOnDelivery') {
            $paymentOnDelivery = true;
        } else {
            $paymentOnDelivery = false;
        }

        //формируем получателей
        $poluchately = $this->getPoluchately($order);

        //генерируем сообщение и делаем рассылку
        foreach ($poluchately as $pol) {
            $helloPrefix = trim($pol['contactName']);
            if (!$helloPrefix) {
                $helloPrefix = '.';
            } else {
                $helloPrefix = ', ' . $helloPrefix . '!';
            }

            $twig = clone $this->twig;
            $twig->setLoader(new \Twig_Loader_String());

            //если последний платеж не оплачен, то оплачивали с баланса
            if ($payment && !$payment->getIsPassed()) {
                $payment = false;
            }
            $msg = $twig->render($templateContent, array(
                'order' => $order,
                'helloPrefix' => $helloPrefix,
                'phones' => $this->config->get('phones'),
                'paymentOnDelivery' => $paymentOnDelivery,
                'payment' => $payment,
                'now' => $now
            ));

            $subject = 'Оповещение о изменении статуса заказа #' . $this->core_common_twig_extension->idFormatFilter($order->getId());
            $this->sendEmailMessage($msg, $subject, $fromEmail, $pol['toEmail']);
        }
    }

    /**
     * Уведомление пользователя о статусе посылки
     * @param array $data - номер заказа и данные пользователя
     * @param array $waybill - массив накладных (тип. Waybills)
     * @param Company $deliveryCompany - транспортная компания
     */
    public function sendNotificationEmailMessage($data, $waybills, Company $deliveryCompany, $configTplName)
    {
        
        $templateContent = $this->config->get($configTplName); //берем из базы шаблон письма

        $twig = clone $this->twig;
        $twig->setLoader(new \Twig_Loader_String());
        
        $rendered = $twig->render($templateContent, array(
            'helloPrefix'  => $data['helloPrefix'],
            'waybills'   => $waybills,
            'orderUrl'  => $this->router->generate('application_sonata_user_profile_order', array('id' => $data['orderId']), true),
            'siteUrl'   => $this->router->generate('core_common_index', [], true),
            'contacstUrl' => $this->router->generate('trouble_ticket_contact', [], true),
            'deliveryCompany' => $deliveryCompany
        ));
        $msgHeader = $this->translator->trans('order.label.waybill.create');
        $this->sendEmailMessage($rendered, $msgHeader, $this->params['default_email'], $data['userEmail']);
    }

    /**
     * Формирует список получателей для рассылки по заказу
     * @param type $order
     * @return type
     */
    public function getPoluchately($order) {
        //формируем получателей
        $poluchately = [];

        //берем получателя
        $pol['contactName'] = $order->getRecipientFio();
        $pol['toEmail'] = $order->getRecipientEmail();
        $poluchately[$pol['toEmail']] = $pol;

        //берем плательщика        
        if ($order->getContragent() instanceof LegalContragent) {
            $pol['contactName'] = $order->getContragent()->getContactFio();
        } else {
            if ($order->getContragent()->getFirstName()) {
                if ($order->getContragent()->getSurName()) {    //если есть отчество
                    $pol['contactName'] = $order->getContragent()->getFirstName() . ' ' . $order->getContragent()->getSurName();
                } else {    //выводим по фамилии и имени
                    $pol['contactName'] = $order->getContragent()->getLastName() . ' ' . $order->getContragent()->getFirstName();
                }
            } else {
                $pol['contactName'] = false;
            }
        }

        $pol['toEmail'] = $order->getContragent()->getContactEmail();
        $poluchately[$pol['toEmail']] = $pol;

        //берем пользователя
        $pol['contactName'] = $order->getContragent()->getUser()->getLastName() . ' ' . $order->getContragent()->getUser()->getFirstName();
        $pol['toEmail'] = $order->getContragent()->getUser()->getEmail();
        $poluchately[$pol['toEmail']] = $pol;
        $res = [];
        foreach ($poluchately as $email => $d) {
            if ($email) {
                $res[$email] = $d;
            }
        }
        return $res;
    }

    public function sendOnMainStatusDone(Order $order, $configTplName, $recipient) {
        $templateContent = $this->config->get($configTplName); //берем из базы шаблон письма

        $twig = clone $this->twig;
        $twig->setLoader(new \Twig_Loader_String());
        $msg = $twig->render($templateContent, array(
            'order' => $order,
            'helloPrefix' => reset($recipient),
        ));
        $subject = 'Оцените работу интернет-магазина';
        $fromEmail = $this->params['default_email'];
        return $this->sendEmailMessage($msg, $subject, $fromEmail, key($recipient));
    }

    /**
     * Отправка письма если статус предзаказа отменен
     * @param PreOrder $preOrder
     * @param sting $configTplName
     * @param string $domain
     */
    public function sendEmailOnPreOrderCancel(PreOrder $preOrder, $configTplName, $domain)
    {
        $product = $preOrder->getCompositions()->first()->getProduct();
        $templateContent = $this->config->get($configTplName);
        $phones = $this->config->get('phones');
        $twig = clone $this->twig;
        $twig->setLoader(new \Twig_Loader_String());
        $renderedTemplate = $twig->render($templateContent, array(
            'product' => $product,
            'phones' => $phones,
            'homeUrl' => $this->router->generate('core_common_index', [], true),
            'productUrl' => $this->router->generate('core_product', ['slug' => $product->getSlug()], true),
            'domain' => $domain,
            'contactUrl'  => $this->router->generate('trouble_ticket_contact', [], true),
            'cancelReason' => $preOrder->getCancelReason()
        ));
        $subject = 'Заказ на сайте '. $domain;
        $fromEmail = $this->params['default_email'];
        $this->sendEmailMessage($renderedTemplate, $subject, $fromEmail, $preOrder->getEmail());
    }

    /**
     *
     * @param type $renderedTemplate
     * @param type $subject
     * @param type $fromEmail
     * @param type $toEmail
     * @return type
     */
    protected function sendEmailMessage($renderedTemplate, $subject, $fromEmail, $toEmail) {
        $body = $renderedTemplate;
        $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom($fromEmail)
                ->setTo($toEmail)
                ->setBody($body, 'text/html');

        $res = $this->mailer->send($message);

        return $res;
    }

}
