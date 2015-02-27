<?php

namespace Core\ProductBundle\Spec\Command;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class YmlCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\ProductBundle\Command\YmlCommand');
    }
    
}
