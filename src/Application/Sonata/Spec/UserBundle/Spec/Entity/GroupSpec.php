<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GroupSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(Argument::any(),Argument::any());
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Entity\Group');
    }

    function it_should_be_a_base_user_type()
    {
        $this->shouldBeAnInstanceOf('Sonata\UserBundle\Entity\BaseGroup');
    }
}
