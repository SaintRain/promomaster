<?php

namespace Core\TroubleTicketBundle\Spec\Admin\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormBuilder;

class FullTextTypeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\TroubleTicketBundle\Admin\Form\Type\FullTextType');
    }

    function it_is_a_form_type()
    {
        $this->shouldImplement('Symfony\Component\Form\FormTypeInterface');
    }

    function it_should_build_form_with_proper_fields(FormBuilder $builder)
    {
        $builder
            ->add('anyField','text', Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;
        
        $builder
            ->add('fieldChooser', 'choice', Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;
        
        $this->buildForm($builder, array());
    }

    function it_should_have_proper_name()
    {
        $this->getName()->shouldReturn('full_text');
    }
}
