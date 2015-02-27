<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Admin\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Translation\TranslatorInterface;

class KppTypeSpec extends ObjectBehavior
{
    function let(TranslatorInterface $translator)
    {
        $this->beConstructedWith($translator);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Admin\Form\Type\KppType');
    }

    function it_is_a_form_type()
    {
        $this->shouldImplement('Symfony\Component\Form\FormTypeInterface');
    }

    function it_should_build_form_with_proper_fields(FormBuilder $builder)
    {
        $builder
            ->add('kpp', 'text', Argument::any())
            ->willReturn($builder)
        ;

        $builder
            ->add('kppOnOff', 'choice', Argument::any())
            ->willReturn($builder)
        ;
        $options = [
            'labels' => [
                'kpp'       => Argument::type('string'),
                'kppOnOff'  => Argument::type('string')
            ]
        ];
        $this->buildForm($builder, $options);
    }

    function it_should_define_default_options(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'labels' => array(
                    'kpp' => 'form.label.contragent.kpp',
                    'kppOnOff' => 'form.label.contragent.kppOnOff'),
            'placeholder' => array(
                    'kpp' => 'form.label.contragent.kpp',
                    'kppOnOff' => 'form.label.contragent.kppOnOff')
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    function it_should_get_proper_name()
    {
        $this->getName()->shouldReturn('kpp_type');
    }

}
