<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CommonContactSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Entity\CommonContact');
    }

    function it_converted_to_string()
    {
        $this->setAddress('Проспект победы 22');
        $this->__toString()->shouldReturn('Проспект победы 22');
    }

    function it_converted_to_json()
    {
        $this->getContact()->shouldBeString();
    }
}
