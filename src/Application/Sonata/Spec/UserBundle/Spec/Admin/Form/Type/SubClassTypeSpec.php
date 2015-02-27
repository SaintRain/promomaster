<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Admin\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Symfony\Component\Form\FormBuilder;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Translation\TranslatorInterface;

class SubClassTypeSpec extends ObjectBehavior
{
    function let(TranslatorInterface $translator)
    {
        $this->beConstructedWith($translator);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Admin\Form\Type\SubClassType');
    }

    function it_is_a_form_type()
    {
        $this->shouldImplement('Symfony\Component\Form\FormTypeInterface');
    }

    function it_should_get_proper_name()
    {
        $this->getName()->shouldReturn('subclasses_type');
    }

    function it_should_define_default_options(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'labels' => array('subclass' => 'form.label.contragent.subclass'),
            'subclasses' => null, // Подклассы
            'expanded' => true,
            'multiple' => true,
        ))->shouldBeCalled();

        $this->setDefaultOptions($resolver);
    }

    function it_should_build_form_with_proper_fields(FormBuilder $builder)
    {
       
        $builder
            ->add('type', 'choice', Argument::any())
            ->willReturn($builder)
        ;
        
        $options = [
            'subclasses' => [
                'Юридическое лицо'  => 'Application\Sonata\UserBundle\Entity\LegalContragent',
                'Физическое лицо'   => 'Application\Sonata\UserBundle\Entity\IndiContragent'
            ],
            'labels' => ['subclass' => 'form.label.contragent.subclass'],
            'expanded' => true,
            'multiple' => true
        ];
        
        $this->buildForm($builder, $options);
    }
}
