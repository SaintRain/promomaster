<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Symfony\Component\Translation\Translator;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LegalFormTypeSpec extends ObjectBehavior
{
    function let(Translator $translator)
    {
        $this->beConstructedWith($translator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Form\Type\LegalFormType');
    }

    function it_is_a_form_type()
    {
        $this->shouldImplement('Symfony\Component\Form\FormTypeInterface');
    }

    function it_should_have_a_proper_name()
    {
        $this->getName()->shouldReturn('legal_contragent_form');
    }

    function it_should_define_default_options(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Application\Sonata\UserBundle\Entity\LegalContragent',
            'isEmailRequired' => false
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    function it_should_build_form_with_proper_fields(FormBuilder $builder)
    {
        $builder
            ->add('legalForm', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('organization', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('inn', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('kpp', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('ogrn', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('chiefPosition', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('chiefFio', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('bank', 'ajax_entity', Argument::any())
            ->willReturn($builder);

        $builder
            ->add('bankAccount', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('corrAccount', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('addressLegal', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('addressPost', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('phone1', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('fax', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('contactFio', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('contactEmail', null, Argument::any())
            ->willReturn($builder);
        
        $builder
            ->add('site', 'text', Argument::any())
            ->willReturn($builder);

        $this->buildForm($builder, ['isEmailRequired' => false]);
    }
}