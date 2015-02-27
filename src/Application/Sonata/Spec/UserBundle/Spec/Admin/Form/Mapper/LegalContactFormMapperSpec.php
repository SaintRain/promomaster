<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Admin\Form\Mapper;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Sonata\AdminBundle\Form\FormMapper;

class LegalContactFormMapperSpec extends ObjectBehavior
{
    function let(FormMapper $formMapper)
    {
        $formMapper
            ->with(Argument::any())
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

        $formMapper
            ->add('mark', null, Argument::any())
            ->shouldBeCalled()
            ->willReturn($formMapper);
        
        $formMapper
            ->end()
            ->shouldBeCalled()
            ->willReturn($formMapper);
        
        $this->beConstructedWith($formMapper, []);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Admin\Form\Mapper\LegalContactFormMapper');
    }
}
