<?php

namespace Core\OfficeWorkTimeBundle\Spec\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CronScheduleCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\OfficeWorkTimeBundle\Command\CronScheduleCommand');
    }

    function is_extends_command()
    {
        $this->shouldBeAnInstanceOf('Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand');
    }
}
