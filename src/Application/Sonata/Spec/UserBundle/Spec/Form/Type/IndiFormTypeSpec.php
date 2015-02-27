<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Symfony\Component\Translation\Translator;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class IndiFormTypeSpec extends ObjectBehavior
{
    function let(Translator $translator)
    {
        $this->beConstructedWith($translator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Form\Type\IndiFormType');
    }

    function it_is_a_form_type()
    {
        $this->shouldImplement('Symfony\Component\Form\FormTypeInterface');
    }

    function it_should_have_a_proper_name()
    {
        $this->getName()->shouldReturn('indi_contragent_form');
    }

    function it_should_define_default_options(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Application\Sonata\UserBundle\Entity\IndiContragent',
            'isEmailRequired' => false
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    function it_should_build_form_with_proper_fields(FormBuilder $builder)
    {
        $builder
            ->add('firstName', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('lastName', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('surName', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('phone1', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('phone1', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('contactEmail', null, Argument::any())
            ->willReturn($builder);

        $this->buildForm($builder, ['isEmailRequired' => false]);
    }
}
