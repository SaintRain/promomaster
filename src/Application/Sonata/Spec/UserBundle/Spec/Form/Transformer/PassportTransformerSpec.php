<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Form\Transformer;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PassportTransformerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Form\Transformer\PassportTransformer');
    }

    function it_a_data_transformer_type()
    {
        $this->shouldImplement('Symfony\Component\Form\DataTransformerInterface');
    }

    function it_transformation_is_mutable()
    {
        $this->transform('111 222 333')->shouldReturn('111222333');
    }

    function it_reverse_transformation_is_mutable()
    {
        $this->reverseTransform('111 222 333')->shouldReturn('111222333');
    }
}
