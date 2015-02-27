<?php

namespace Core\OfficeWorkTimeBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ScheduleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\OfficeWorkTimeBundle\Entity\Schedule');
    }

    function it_type_is_mutable()
    {
        $this->setType(1);
        $this->getType()->shouldBeEqualTo(1);
    }

    function it_date_time_is_mutable()
    {
        $this->setDateTime(new \DateTime('now'));
        
        $this->getDateTime()->shouldReturnAnInstanceOf('DateTime');
    }

    function it_updated_date_time_is_mutable()
    {
        $this->setUpdatedDateTime(new \DateTime('now'));

        $this->getUpdatedDateTime()->shouldReturnAnInstanceOf('DateTime');
    }

    function it_has_fluent_interface()
    {
        $this->setType(1)->shouldReturn($this);
        $this->setDateTime(new \DateTime('now'))->shouldReturn($this);
        $this->setUpdatedDateTime(new \DateTime('now'))->shouldReturn($this);
    }
}
