<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Symfony\Component\Form\FormBuilder;
use Application\Sonata\UserBundle\Form\Transformer\PassportTransformer;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class IndiContactFormTypeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Form\Type\IndiContactFormType');
    }

    function it_is_a_form_type()
    {
        $this->shouldImplement('Symfony\Component\Form\FormTypeInterface');
    }

    function it_should_have_a_proper_name()
    {
        $this->getName()->shouldReturn('indi_contact_form');
    }

    function it_should_build_form_with_proper_fields(FormBuilder $builder)
    {

        $builder
            ->addViewTransformer(
            Argument::type('Application\Sonata\UserBundle\Form\Transformer\PassportTransformer')
            )->willReturn($builder);
        
        $builder->create('passport', null, Argument::any())
                ->shouldBeCalled()
                ->willReturn($builder);
        
        
        $builder
            ->add($builder)
            ->willReturn($builder);

        $builder
            ->add('address', 'textarea', Argument::any())
            ->willReturn($builder);

        $builder
            ->add('firstName', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('lastName', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('phone', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('contactEmail', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->addEventListener(FormEvents::PRE_SET_DATA, Argument::type('\Closure'))
            ->willReturn($builder);

        $builder
            ->addEventListener(FormEvents::SUBMIT, Argument::type('\Closure'))
            ->willReturn($builder);


        $this->buildForm($builder, array());
    }

    function it_should_define_default_options(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Application\Sonata\UserBundle\Entity\IndiContact',
            'contragent' => null,
            'needMark' => true, // показывать примечение
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }
}
