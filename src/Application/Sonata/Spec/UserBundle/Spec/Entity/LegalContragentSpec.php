<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Core\DirectoryBundle\Entity\LegalForm;
use Core\LogisticsBundle\Entity\Bank;

class LegalContragentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Entity\LegalContragent');
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
        $this->setOrganization('ОАО "Завод"');
        $this->getListName()->shouldReturn('ОАО "Завод"');
    }

    function it_legal_form_is_mutable(LegalForm $legalForm)
    {
        $this->setLegalForm($legalForm);
        $this->getLegalForm()->shouldReturn($legalForm);
    }

    function it_bank_is_mutable(Bank $bank)
    {
        $this->setBank($bank);
        $this->getBank()->shouldReturn($bank);
    }
}
