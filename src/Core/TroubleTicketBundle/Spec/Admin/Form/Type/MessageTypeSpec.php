<?php

namespace Core\TroubleTicketBundle\Spec\Admin\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MessageTypeSpec extends ObjectBehavior
{
    function let(SecurityContext $securityContext)
    {
        $this->beConstructedWith($securityContext);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\TroubleTicketBundle\Admin\Form\Type\MessageType');
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

        $builder
            ->add('manager', 'entity', Argument::any())
            ->shouldBeCalled()
            ->willReturn($builder)
        ;
        $builder
            ->add('troubleTicket', 'entity', Argument::any())
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
                                'data_class' => 'Core\TroubleTicketBundle\Entity\Message',
                                'cascade_validation' => true,
                                'troubleTicket' => null,
                                'dateTime' => null,
                                'logEntity' => null))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }
}
