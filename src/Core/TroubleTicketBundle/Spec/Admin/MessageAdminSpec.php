<?php

namespace Core\TroubleTicketBundle\Spec\Admin;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Core\TroubleTicketBundle\Entity\Message;

class MessageAdminSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(Argument::any(), Argument::any(), Argument::any());
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\TroubleTicketBundle\Admin\MessageAdmin');
    }

    function it_should_be_an_admin_type()
    {
        $this->shouldBeAnInstanceOf('Sonata\AdminBundle\Admin\Admin');
    }

    function it_should_get_right_translation_domain()
    {
        $this->getTranslationDomain()->shouldReturn('CoreTroubleTicketBundle');
    }
    
    function it_is_converted_to_string(Message $message)
    {
        $message->getId()->willReturn(1);
        $this->toString($message)->shouldReturn('breadcrumb.edit.Message № 1');
    }

    function it_should_get_proper_edit_template()
    {
        $this->getTemplate('edit')->shouldReturn('CoreTroubleTicketBundle:Admin\Message:edit.html.twig');
    }
}
