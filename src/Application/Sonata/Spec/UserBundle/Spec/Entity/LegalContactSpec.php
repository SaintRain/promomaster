<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Application\Sonata\UserBundle\Entity\LegalContragent;

class LegalContactSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Entity\LegalContact');
    }

    function it_contragent_is_mutable(LegalContragent $contragent)
    {
        $this->setContragent($contragent);
        $this->getContragent()->shouldReturn($contragent);
    }

    function it_serializable_to_json(LegalContragent $contragent)
    {
        $contragent->getPhone1()
            ->willReturn(Argument::type('string'));
        $contragent->getOrganization()->willReturn(Argument::type('string'));
        $this->setContragent($contragent);
        $this->jsonSerialize()->shouldBeArray();
    }

    function it_contact_email_is_mutable(LegalContragent $contragent)
    {
        $contragent->getContactEmail()
            ->willReturn('test@mail.ru');
        $this->setContragent($contragent);
        $this->getContactEmail()->shouldReturn('test@mail.ru');
    }
}
