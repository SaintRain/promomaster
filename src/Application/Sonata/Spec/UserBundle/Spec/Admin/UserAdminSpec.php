<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Admin;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Application\Sonata\UserBundle\Entity\LegalContact;

class UserAdminSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(Argument::any(),Argument::any(), Argument::any());
    }

    function it_should_be_sonata_user_admin_type()
    {
        $this->shouldBeAnInstanceOf('Sonata\UserBundle\Admin\Entity\UserAdmin');
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Admin\UserAdmin');
    }

    function it_should_choose_corrent_template_for_list()
    {
        $this
            ->getTemplate('list')
            ->shouldReturn('ApplicationSonataAdminBundle:CRUD:list_top.html.twig');
    }

    function it_should_choose_corrent_template_for_edit()
    {
        $this
            ->getTemplate('edit')
            ->shouldReturn('ApplicationSonataUserBundle:Admin\User:edit.html.twig');
    }
}
