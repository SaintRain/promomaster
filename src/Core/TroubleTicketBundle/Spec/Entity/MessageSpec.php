<?php

namespace Core\TroubleTicketBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MessageSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\TroubleTicketBundle\Entity\Message');
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

    function it_has_no_body_default()
    {
        $this->getBody()->shouldReturn(null);
    }

    function it_body_is_mutable()
    {
        $this->setBody('some text');
        $this->getBody()->shouldReturn('some text');
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

    /**
     *
     * @param Application\Sonata\UserBundle\Entity\User $manager
     * @param Core\TroubleTicketBundle\Entity\TroubleTicket $troubleTicket
     */
    function it_has_fluent_interface($manager, $troubleTicket)
    {
        $date = new \DateTime();
        $this->setDate($date)->shouldReturn($this);
        $this->setManager($manager)->shouldReturn($this);
        $this->setTroubleTicket($troubleTicket)->shouldReturn($this);
        $this->setBody($date)->shouldReturn($this);
    }
}
