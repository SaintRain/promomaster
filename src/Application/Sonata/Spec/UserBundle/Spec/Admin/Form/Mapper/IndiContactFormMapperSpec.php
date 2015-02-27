<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Admin\Form\Mapper;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Sonata\AdminBundle\Form\FormMapper;

class IndiContactFormMapperSpec extends ObjectBehavior
{
    function let(FormMapper $formMapper)
    {
        $formMapper->with('Адрес')
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('address', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('city', 'ajax_entity', Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper->end()
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper->with('Контактные данные')
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('lastName', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('firstName', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('surName', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('passport', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('phone', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('contactEmail', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('mark', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper->end()
            ->shouldBeCalled()
            ->willReturn($formMapper);
        $this->beConstructedWith($formMapper, []);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Admin\Form\Mapper\IndiContactFormMapper');
    }
}
