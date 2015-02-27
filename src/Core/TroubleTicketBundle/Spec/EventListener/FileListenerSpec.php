<?php

namespace Core\TroubleTicketBundle\Spec\EventListener;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Core\FileBundle\Event\FileEvent;
use Core\TroubleTicketBundle\Entity\Log;
use Core\TroubleTicketBundle\Entity\TroubleTicket;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Session\Session;

class FileListenerSpec extends ObjectBehavior
{
    function let(EntityManager $em, SecurityContext $context, Session $session)
    {
        $this->beConstructedWith($em, $context, $session);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\TroubleTicketBundle\EventListener\FileListener');
    }

    /**
     * @todo Не плохо бы реализовать
     * @param FileEvent $event
     * @param TroubleTicket $ticket
     */
    function it_trigger_on_file_upload(FileEvent $event, TroubleTicket $ticket)
    {

        $event->getResult()
            ->willReturn([]);

        $this->onFileUpload($event);
    }

    /**
     * @todo Не плохо бы реализовать
     * @param FileEvent $event
     * @param TroubleTicket $ticket
     */
    function it_trigger_on_file_delete(FileEvent $event, TroubleTicket $ticket)
    {
        $event->getResult()
            ->willReturn([]);

        $this->onFileDelete($event);
    }
}
