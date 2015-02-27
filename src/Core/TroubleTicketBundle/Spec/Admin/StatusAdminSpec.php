<?php

namespace Core\TroubleTicketBundle\Spec\Admin;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Core\TroubleTicketBundle\Entity\Status;

class StatusAdminSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(Argument::any(),Argument::any(), Argument::any());
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Core\TroubleTicketBundle\Admin\StatusAdmin');
    }

    function it_is_converted_to_string(Status $status)
    {
        $status->getId()->willReturn(1);
        $this->toString($status)->shouldReturn('breadcrumb.edit.Status № 1');
    }

    function it_should_get_right_translation_domain()
    {
        $this->getTranslationDomain()->shouldReturn('CoreTroubleTicketBundle');
    }
}
