<?php

/**
 * Рассылка сообщений
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Mailer;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Routing\RouterInterface;
use FOS\UserBundle\Mailer\MailerInterface;
use Core\TroubleTicketBundle\Entity\TroubleTicket;
use Core\TroubleTicketBundle\Entity\Message;
use Symfony\Component\Translation\Translator;
use FOS\UserBundle\Model\UserInterface;

class Mailer
{
    protected $mailer;
    protected $router;
    protected $templating;
    protected $translator;
    protected $parameters;

    public function __construct($mailer, RouterInterface $router, EngineInterface $templating, Translator $translator, $parameters)
    {
        $this->mailer = $mailer;
        $this->router = $router;
        $this->templating = $templating;
        $this->parameters = $parameters;
        $this->translator = $translator;
    }

    public function sendEmailChangedMessage(UserInterface $user)
    {
        $msg = $this->translator->trans('profile.edit.changeEmail.subject');
        $rendered = $this->templating->render('ApplicationSonataUserBundle:Profile:change_email.html.twig', array(
            'link' => $this->router->generate('application_sonata_user_change_email', array('hash' => $user->getNewEmailHash()), true),
            'user' => $user));
        $this->sendEmailMessage($rendered, $this->parameters['fromEmail'], $user->getNewEmail(), $msg);
    }
    
    /**
     * @param string $renderedTemplate
     * @param string $toEmail
     */
    protected function sendEmailMessage($renderedTemplate, $fromEmail, $toEmail, $subject)
    {
    
        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($fromEmail)
            ->setTo($toEmail)
            ->setBody($renderedTemplate, 'text/html');

        $this->mailer->send($message);
    }
}