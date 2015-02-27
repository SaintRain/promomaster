<?php

namespace Core\FaqBundle\Spec\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Symfony\Component\Form\FormBuilder;

class SearchFaqTypeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\FaqBundle\Form\Type\SearchFaqType');
    }

    function it_is_a_form_type()
    {
        $this->shouldImplement('Symfony\Component\Form\FormTypeInterface');
    }
    
    function it_should_build_form_with_proper_fields(FormBuilder $builder)
    {

        $builder->add('searchQuery', 'text', Argument::any())
            ->willReturn($builder);
        
        $this->buildForm($builder, array());
    }
}
