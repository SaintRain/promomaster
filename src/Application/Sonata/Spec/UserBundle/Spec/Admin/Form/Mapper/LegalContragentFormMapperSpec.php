<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Admin\Form\Mapper;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Sonata\AdminBundle\Form\FormMapper;

class LegalContragentFormMapperSpec extends ObjectBehavior
{
    function let(FormMapper $formMapper)
    {
        $formMapper->with('Основное')
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('user', 'ajax_entity', Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('legalForm', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('organization', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('inn', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('kpp', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('ogrn', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('chiefPosition', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('chiefFio', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('bank', 'ajax_entity', Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('bankAccount', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('corrAccount', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->end()
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper->with('Контактная информация')
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('addressLegal', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);
        $formMapper
            ->add('addressLegal', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('addressPost', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('phone1', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('phone2', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('phone3', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('fax', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('contactFio', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('contactEmail', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('contactFio', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('site', 'text', Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->end()
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->with(Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('contactList', 'sonata_type_collection', Argument::any())
            //->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->end()
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->with(Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('balanceHistory', 'balance_history', Argument::any())
            //->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->end()
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $this->beConstructedWith($formMapper, []);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Admin\Form\Mapper\LegalContragentFormMapper');
    }
}
