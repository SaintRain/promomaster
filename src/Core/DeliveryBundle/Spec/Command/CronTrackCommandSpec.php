<?php

namespace Core\DeliveryBundle\Spec\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CronTrackCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Command\CronTrackCommand');
    }
}
