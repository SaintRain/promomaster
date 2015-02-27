<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Admin;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Application\Sonata\UserBundle\Entity\LegalContact;

class GroupAdminSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(Argument::any(),Argument::any(), Argument::any());
    }

    function it_should_be_sonata_user_admin_type()
    {
        $this->shouldHaveType('Sonata\AdminBundle\Admin\Admin');
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Admin\GroupAdmin');
    }
}
