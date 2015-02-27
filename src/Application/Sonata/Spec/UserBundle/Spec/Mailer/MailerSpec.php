<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Mailer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Routing\Router;
use Core\TroubleTicketBundle\Entity\TroubleTicket;
use Core\TroubleTicketBundle\Entity\Message;
use Symfony\Component\Translation\Translator;
use \Application\Sonata\UserBundle\Entity\User;
use \Swift_Mailer as Mailer;

class MailerSpec extends ObjectBehavior
{
    function let(Mailer $mailer, Router $router,
        EngineInterface $templating, Translator $translator)
    {
        $parameters = ['fromEmail' => 'test@mail.ru'];
        $this->beConstructedWith($mailer, $router,
            $templating, $translator, $parameters);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Mailer\Mailer');
    }

    function it_sends_message_on_email_chrange(Mailer $mailer, Router $router,
        EngineInterface $templating, Translator $translator, User $user)
    {
        $user->getNewEmailHash()->willReturn(Argument::type('string'));
        $user->getNewEmail()->willReturn('test@mail.ru');
        
        $translator->trans('profile.edit.changeEmail.subject')
                ->shouldBeCalled();
        $router->generate('application_sonata_user_change_email', Argument::any(), true)
                ->shouldBeCalled();

        $templating
            ->render('ApplicationSonataUserBundle:Profile:change_email.html.twig',
                Argument::any())
            ->shouldBeCalled();

        $parameters = ['fromEmail' => 'test@mail.ru'];
        $this->beConstructedWith($mailer, $router,
            $templating, $translator, $parameters);

        $this->sendEmailChangedMessage($user);
        
        $mailer->send(Argument::any())
            ->shouldHaveBeenCalled();
    }
}
