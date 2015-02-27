<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class IndiContragentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Entity\IndiContragent');
    }

    function it_should_be_a_common_contragetn_type()
    {
        $this->shouldBeAnInstanceOf('Application\Sonata\UserBundle\Entity\CommonContragent');
    }

    function it_initializes_contact_list_collection_by_default()
    {
        $this->getContactList()
            ->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function it_list_name_is_mutable()
    {
        $this->setFirstName('Василий');
        $this->setLastName('Пупкин');
        $this->getListName()->shouldReturn('Пупкин Василий');

    }

    function it_contact_fio_is_mutable()
    {
        $this->setLastName('Пупкин');
        $this->setFirstName('Василий');
        $this->setSurName('Петрович');
        $this->getContactFio()->shouldReturn('Пупкин Василий Петрович');

    }
}
