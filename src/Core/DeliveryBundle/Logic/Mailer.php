<?php

namespace Core\DeliveryBundle\Logic;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Routing\RouterInterface;
use FOS\UserBundle\Mailer\MailerInterface;
use Symfony\Component\Translation\Translator;
use Core\DeliveryBundle\Entity\Company;
use Core\OrderBundle\Entity\Waybills;

class Mailer
{
    protected $mailer;
    protected $router;
    protected $templating;
    protected $translator;
    protected $params;

    public function __construct($mailer, RouterInterface $router, EngineInterface $templating, Translator $translator, $params)
    {
        $this->mailer = $mailer;
        $this->router = $router;
        $this->templating = $templating;
        $this->translator = $translator;
        $this->params = $params;
    }

    /**
     * Уведомление пользователя о статусе посылки
     * @param array $data - номер заказа и данные пользователя
     * @param array $waybill - массив накладных (тип. Waybills)
     * @param Company $deliveryCompany - транспортная компания
     */
    public function sendNotificationEmailMessage($data, $waybills, Company $deliveryCompany)
    {
        $rendered = $this->templating->render('CoreDeliveryBundle:Delivery:notification.html.twig', array(
            'userFio'  => $data['userFio'],
            'waybills'   => $waybills,
            'orderUrl'  => $this->router->generate('application_sonata_user_profile_order', array('id' => $data['orderId']), true),
            'siteUrl'   => $this->router->generate('core_common_index', [], true),
            'contacstUrl' => $this->router->generate('trouble_ticket_contact', [], true),
            'deliveryCompany' => $deliveryCompany
        ));

        $msgHeader = $this->translator->trans('order.label.waybill.create');

        $this->sendEmailMessage($rendered, $msgHeader, $data['userEmail']);
    }

    
    /**
     * @param string $renderedTemplate
     * @param string $toEmail
     */
    protected function sendEmailMessage($renderedTemplate, $subject, $toEmail)
    {
        $body = $renderedTemplate;
        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($this->params['fromEmail'])
            ->setTo($toEmail)
            ->setBody($body, 'text/html');

        $this->mailer->send($message);
    }
}