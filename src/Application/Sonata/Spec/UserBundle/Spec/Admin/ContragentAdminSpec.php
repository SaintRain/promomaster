<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Admin;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Application\Sonata\UserBundle\Entity\LegalContragent;
use Application\Sonata\UserBundle\Entity\IndiContragent;

class ContragentAdminSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(Argument::any(),Argument::any(), Argument::any());
    }

    function it_should_be_an_a_admin_type()
    {
        $this->shouldHaveType('Sonata\AdminBundle\Admin\Admin');
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Admin\ContragentAdmin');
    }

    function it_should_have_proper_translation_domain()
    {
        $this->getTranslationDomain()->shouldReturn('ApplicationSonataUserBundle');
    }

    function it_should_be_converted_to_string_from_legal_type(LegalContragent $contragent)
    {
        $contragent->getListName()->willReturn(null);
        $this->toString($contragent)->shouldBeLike('Создание юридическго лица');
    }

    function it_should_be_converted_to_string_from_indi_type(IndiContragent $contragent)
    {
        $contragent->getListName()->willReturn(null);
        $this->toString($contragent)->shouldBeLike('Создание физического лица');
    }

    function it_should_choose_corrent_template_for_list()
    {
        $this
            ->getTemplate('list')
            ->shouldReturn('ApplicationSonataAdminBundle:CRUD:list_top.html.twig');
    }
}
