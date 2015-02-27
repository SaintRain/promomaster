<?php

namespace Core\TroubleTicketBundle\Spec\Admin;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Core\TroubleTicketBundle\Entity\Log;

class LogAdminSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(Argument::any(), Argument::any(), Argument::any());
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\TroubleTicketBundle\Admin\LogAdmin');
    }

    function it_should_be_an_admin_type()
    {
        $this->shouldBeAnInstanceOf('Sonata\AdminBundle\Admin\Admin');
    }

    function it_should_get_right_translation_domain()
    {
        $this->getTranslationDomain()->shouldReturn('CoreTroubleTicketBundle');
    }

    function it_is_converted_to_string(Log $log)
    {
        $log->getId()->willReturn(1);
        $this->toString($log)->shouldReturn('breadcrumb.edit.Log № 1');
    }
}
