<?php

namespace Core\FaqBundle\Spec\Admin\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Symfony\Component\Form\FormBuilder;

class SimpleArticleFormTypeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\FaqBundle\Admin\Form\Type\SimpleArticleFormType');
    }

    function it_is_a_form_type()
    {
        $this->shouldImplement('Symfony\Component\Form\FormTypeInterface');
    }
    
    function it_should_build_form_with_proper_fields(FormBuilder $builder)
    {
        $builder->add('id', 'hidden',Argument::any())
            ->willReturn($builder);

        $builder->add('captionRu', 'text',Argument::any())
            ->willReturn($builder);

        $builder->add('bodyRu', 'textarea',Argument::any())
            ->willReturn($builder);
        
        $builder->add('slug', 'text',Argument::any())
            ->willReturn($builder);

        $this->buildForm($builder, array());
    }
}
