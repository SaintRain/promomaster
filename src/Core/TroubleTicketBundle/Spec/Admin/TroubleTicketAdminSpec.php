<?php

namespace Core\TroubleTicketBundle\Spec\Admin;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Core\TroubleTicketBundle\Entity\TroubleTicket;

class TroubleTicketAdminSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(Argument::any(), Argument::any(), Argument::any());
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\TroubleTicketBundle\Admin\TroubleTicketAdmin');
    }

    function it_should_be_an_admin_type()
    {
        $this->shouldBeAnInstanceOf('Sonata\AdminBundle\Admin\Admin');
    }
    
    function it_should_get_right_translation_domain()
    {
        $this->getTranslationDomain()->shouldReturn('CoreTroubleTicketBundle');
    }

    function it_is_converted_to_string(TroubleTicket $ticket)
    {
        $ticket->getId()->willReturn(1);
        $this->toString($ticket)->shouldReturn('breadcrumb.edit.TroubleTicket № 1');
    }

    function it_should_get_proper_edit_template()
    {
        $this->getTemplate('edit')->shouldReturn('CoreTroubleTicketBundle:Admin\TroubleTicket:edit.html.twig');
    }
}
