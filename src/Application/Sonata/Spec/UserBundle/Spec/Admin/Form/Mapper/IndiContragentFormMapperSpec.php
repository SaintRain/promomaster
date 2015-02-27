<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Admin\Form\Mapper;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Sonata\AdminBundle\Form\FormMapper;

class IndiContragentFormMapperSpec extends ObjectBehavior
{
    function let(FormMapper $formMapper)
    {
        $formMapper->with(Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('user', 'ajax_entity', Argument::any())
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

        $formMapper->end()
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper->with(Argument::any())
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
            ->add('contactEmail', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper->end()
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper->with(Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);
        
        $formMapper
            ->add('contactList', 'sonata_type_collection', Argument::any())
            //->shouldBeCalled()
            ->willReturn($formMapper);
        
        $formMapper->end()
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper->with(Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper
            ->add('balanceHistory', 'balance_history', Argument::any())
            //->shouldBeCalled()
            ->willReturn($formMapper);

        $formMapper->end()
            ->shouldBeCalled()
            ->willReturn($formMapper);

        $this->beConstructedWith($formMapper, []);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Admin\Form\Mapper\IndiContragentFormMapper');
    }
}
