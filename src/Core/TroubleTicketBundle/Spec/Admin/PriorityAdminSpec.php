<?php

namespace Core\TroubleTicketBundle\Spec\Admin;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Core\TroubleTicketBundle\Entity\Priority;

class PriorityAdminSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(Argument::any(),Argument::any(), Argument::any());
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Core\TroubleTicketBundle\Admin\PriorityAdmin');
    }

    function it_is_converted_to_string(Priority $priority)
    {
        $priority->getId()->willReturn(1);
        $this->toString($priority)->shouldReturn('breadcrumb.edit.Priority № 1');
    }

    function it_should_get_right_translation_domain()
    {
        $this->getTranslationDomain()->shouldReturn('CoreTroubleTicketBundle');
    }
}
