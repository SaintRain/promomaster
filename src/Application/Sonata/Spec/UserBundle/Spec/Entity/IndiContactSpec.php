<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Application\Sonata\UserBundle\Entity\IndiContragent;

class IndiContactSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Entity\IndiContact');
    }

    function it_should_be_a_common_contact_type()
    {
        $this->shouldBeAnInstanceOf('Application\Sonata\UserBundle\Entity\CommonContact');
    }

    function it_contragent_is_mutable(IndiContragent $contragent)
    {
        $this->setContragent($contragent);
        $this->getContragent($contragent)
            ->shouldReturn($contragent);
    }

    function it_caption_for_select_is_mutable()
    {
        $this->setFirstName('Василий');
        $this->setLastName('Пупкин');
        $this->setAddress('проспект победы 22');
        $this->getCaptionForSelect()
            ->shouldReturn('Пупкин Василий (проспект победы 22)');
    }

    function it_fio_is__mutable()
    {
        $this->setLastName('Пупкин');
        $this->setFirstName('Василий');
        $this->setSurName('Петрович');
        $this->getFio()
            ->shouldReturn('Пупкин Василий Петрович');
    }

    function it_serializable_to_json()
    {
        $this->jsonSerialize()->shouldBeArray();
    }
    
}
