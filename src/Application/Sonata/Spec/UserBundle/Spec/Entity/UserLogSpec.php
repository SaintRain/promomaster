<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Application\Sonata\UserBundle\Entity\User;

class UserLogSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Entity\UserLog');
    }

    function it_user_is_mutable(User $user)
    {
        $this->setUser($user);
        $this->getUser()->shouldReturn($user);
    }
}
