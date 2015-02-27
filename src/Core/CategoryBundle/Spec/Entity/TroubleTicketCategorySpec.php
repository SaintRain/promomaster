<?php

namespace Core\CategoryBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Core\CategoryBundle\Entity\TroubleTicketCategory;

class TroubleTicketCategorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\CategoryBundle\Entity\TroubleTicketCategory');
    }

    function it_should_be_comoncategoty_type()
    {
        $this->shouldBeAnInstanceOf('Core\CategoryBundle\Entity\CommonCategory');
    }

    function it_parent_is_mutable(TroubleTicketCategory $parent)
    {
        $this->setParent($parent);
        $this->getParent()->shouldReturn($parent);
    }

    function it_convereted_to_string()
    {
        $this->setLvl(2);
        $this->setCaptionRu('caption ru');
        $this->__toString()->shouldReturn('----caption ru');
    }
}
