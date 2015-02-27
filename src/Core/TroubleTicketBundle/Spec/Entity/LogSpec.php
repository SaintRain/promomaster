<?php

namespace Core\TroubleTicketBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LogSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\TroubleTicketBundle\Entity\Log');
    }

    function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    function it_has_no_trouble_ticket_by_default()
    {
        $this->getTroubleTicket()->shouldReturn(null);
    }

    /**
     * @param Core\TroubleTicketBundle\Entity\TroubleTicket $troubleTicket
     */
    function it_trouble_ticket_is_mutable($troubleTicket)
    {
        $this->setTroubleTicket($troubleTicket);
        $this->getTroubleTicket()->shouldReturn($troubleTicket);
    }

    function it_has_no_manager_default()
    {
        $this->getManager()->shouldReturn(null);
    }

    /**
     * @param Application\Sonata\UserBundle\Entity\User $manager
     */
    function it_manager_is_mutable($manager)
    {
        $this->setManager($manager);
        $this->getManager()->shouldReturn($manager);
    }

    function it_has_date_default()
    {
        $this->getDate()->shouldReturn(null);
    }

    function it_date_is_mutable()
    {
        $date = new \DateTime('last year');

        $this->setDate($date);
        $this->getDate()->shouldReturn($date);
    }

    function it_has_no_changes_default()
    {
        $this->getChanges()->shouldReturn(null);
    }

    function it_changes_is_mutable()
    {
        $changes = array('readiness'=>array(2,4));
        $this->setChanges($changes);
        $this->getChanges()->shouldReturn($changes);
    }

    function it_has_no_message_by_default()
    {
        $this->getMessage()->shouldReturn(null);
    }

    /**
     * @param Core\TroubleTicketBundle\Entity\Message $message
     */
    function it_message_is_mutable($message)
    {
        $this->setMessage($message);
        $this->getMessage()->shouldReturn($message);
    }

    /**
     *
     * @param Application\Sonata\UserBundle\Entity\User $manager
     * @param Core\TroubleTicketBundle\Entity\TroubleTicket $troubleTicket
     * @param Core\TroubleTicketBundle\Entity\Message $message
     */
    function it_has_fluent_interface($manager, $troubleTicket, $message)
    {
        $date = new \DateTime();
        $this->setDate($date)->shouldReturn($this);
        $this->setManager($manager)->shouldReturn($this);
        $this->setMessage($message)->shouldReturn($this);
        $this->setTroubleTicket($troubleTicket)->shouldReturn($this);
        $this->setChanges(null)->shouldReturn($this);
    }
}
