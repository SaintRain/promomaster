<?php

namespace Core\TroubleTicketBundle\Spec\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MessageTypeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\TroubleTicketBundle\Form\Type\MessageType');
    }

    function it_is_a_form_type()
    {
        $this->shouldImplement('Symfony\Component\Form\FormTypeInterface');
    }
    
    function it_should_build_form_with_proper_fields(FormBuilder $builder)
    {
        $builder
            ->add('body', 'textarea', Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;
        
        $builder->addEventListener(FormEvents::SUBMIT, Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;

        $this->buildForm($builder, array());
    }

    function it_should_define_default_options(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
                    'data_class'    => 'Core\TroubleTicketBundle\Entity\Message',
                    'validation_groups' => array('Frontend', 'Default'),
                    'troubleTicket' => null
                ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    function it_should_get_proper_name()
    {
        $this->getName()->shouldReturn('message');
    }

}
