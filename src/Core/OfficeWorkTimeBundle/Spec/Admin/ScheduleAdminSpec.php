<?php

namespace Core\OfficeWorkTimeBundle\Spec\Admin;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ScheduleAdminSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(null, 'Core\OfficeWorkTimeBundle\Entity\Schedule', null);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\OfficeWorkTimeBundle\Admin\ScheduleAdmin');
    }
}
