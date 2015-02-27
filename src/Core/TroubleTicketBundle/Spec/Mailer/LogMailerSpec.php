<?php

namespace Core\TroubleTicketBundle\Spec\Mailer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Routing\Router;
use Core\TroubleTicketBundle\Entity\TroubleTicket;
use Core\TroubleTicketBundle\Entity\Message;
use Core\TroubleTicketBundle\Entity\Log;
use Symfony\Component\Translation\Translator;
use Core\ConfigBundle\Logic\ConfigLogic;
use \Swift_Mailer as Mailer;
use Doctrine\Common\Collections\ArrayCollection;
use Application\Sonata\UserBundle\Entity\User;

class LogMailerSpec extends ObjectBehavior
{
    function let(Mailer $mailer, Router $router, EngineInterface $templating, Translator $translator, ConfigLogic $configLogic)
    {
        $this->beConstructedWith($mailer, $router, $templating, $translator, $configLogic, Argument::any());
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\TroubleTicketBundle\Mailer\LogMailer');
    }


    function it_sends_message_on_create(TroubleTicket $ticket, Mailer $mailer, Router $router, EngineInterface $templating, Translator $translator, ConfigLogic $configLogic)
    {
        $params = [
            'fromEmail' => '3inc@mail.ru'
        ];
                
        $this->beConstructedWith($mailer, $router, $templating, $translator, $configLogic, $params);

        $router->generate('trouble_ticket_contact', [], true)
            ->shouldBeCalled()
            ->willReturn(Argument::type('string'))
        ;

        $router->generate('trouble_ticket_edit', Argument::any(), true)
            ->shouldBeCalled()
            ->willReturn(Argument::type('string'))
        ;
       
        $templating->render('CoreTroubleTicketBundle:TroubleTicket:msg_create.html.twig', Argument::any())
                      ->shouldBeCalled()
                      ->willReturn(Argument::type('string'))
        ;

        $ticket
            ->getAuthorEmail()
            ->shouldBeCalled()
            ->willReturn('3inc@mail.ru')
        ;

        $ticket
            ->getHash()
            ->shouldBeCalled()
            ->willReturn(Argument::type('string'))
        ;

        $ticket->getId()
            ->shouldBeCalled()
            ->willReturn(Argument::type('integer'))
        ;
        
        $translator->trans('ticket.send.create', Argument::any())
            ->shouldBeCalled()
            ->willReturn(Argument::any())
        ;
                
        $this
            ->sendCreationMessage($ticket)
            ->shouldReturn(null)
        ;
        
        $mailer
            ->send(Argument::any())
            ->shouldHaveBeenCalled()
        ;
    }

    function it_sends_message_on_edit(TroubleTicket $ticket, Mailer $mailer, Router $router, EngineInterface $templating, Translator $translator, ConfigLogic $configLogic)
    {
        $params = [
            'fromEmail' => '3inc@mail.ru'
        ];

        $this->beConstructedWith($mailer, $router, $templating, $translator, $configLogic, $params);

        $router->generate('trouble_ticket_contact', [], true)
            ->shouldBeCalled()
            ->willReturn(Argument::type('string'))
        ;

        $router->generate('trouble_ticket_edit', Argument::any(), true)
            ->shouldBeCalled()
            ->willReturn(Argument::type('string'))
        ;

        $templating->render('CoreTroubleTicketBundle:TroubleTicket:msg_edit.html.twig', Argument::any())
                      ->shouldBeCalled()
                      ->willReturn(Argument::type('string'))
        ;

        $ticket
            ->getAuthorEmail()
            ->shouldBeCalled()
            ->willReturn('3inc@mail.ru')
        ;

        $ticket
            ->getHash()
            ->shouldBeCalled()
            ->willReturn(Argument::type('string'))
        ;

        $ticket->getId()
            ->shouldBeCalled()
            ->willReturn(Argument::type('integer'))
        ;

        $translator->trans('ticket.send.edit', Argument::any())
            ->shouldBeCalled()
            ->willReturn(Argument::type('string'))
        ;

        $this
            ->sendEditMessage($ticket)
            ->shouldReturn(null)
        ;

        $mailer
            ->send(Argument::any())
            ->shouldHaveBeenCalled()
        ;
    }

    function it_sends_notification_message_for_subcribers(
        TroubleTicket $ticket,
        TroubleTicket $oldTicket,
        Log $log,
        Message $message,
        Mailer $mailer,
        Router $router,
        EngineInterface $templating,
        Translator $translator,
        ConfigLogic $configLogic,
        ArrayCollection $usersCollection,
        \ArrayIterator $iterator,
        ArrayCollection $logsCollection,
        User $user
        )
    {
        $user->getEmail()
            ->shouldBeCalled()
            ->willReturn('3inc@mail.ru');
        
        $usersCollection
                ->getIterator()
                ->willReturn(new \ArrayIterator([$user->getWrappedObject()]))
        ;
        
        $usersCollection->count()->willReturn(1);
             
        $ticket->getTitle()->willReturn(Argument::type('string'));
        $ticket->getWatchers()->willReturn($usersCollection);

        $ticket->getId()
                ->shouldBeCalled()
                ->willReturn(Argument::type('integer'));
        $logsCollection
            ->last()
            ->shouldBeCalled()
            ->willReturn($log)
        ;
               
        $ticket->getLogs()
            ->shouldBeCalled()
            ->willReturn($logsCollection);
               
        $router->generate('admin_core_troubleticket_troubleticket_edit', Argument::any())
                ->shouldBeCalled()
                ->willReturn('string');

        $templating->render('CoreTroubleTicketBundle:TroubleTicket:log.html.twig', Argument::any())
                ->shouldBeCalled()
                ->willReturn(Argument::type('string'))
        ;

        $params = [
            'fromEmail' => '3inc@mail.ru'
        ];
        
        $this->beConstructedWith($mailer, $router, $templating, $translator, $configLogic, $params);
        
        $this->sendNotificationEmailMessage($ticket, $oldTicket, $message)->shouldReturn(null);
        $mailer
            ->send(Argument::any())
            ->shouldHaveBeenCalled()
        ;
    }
}
