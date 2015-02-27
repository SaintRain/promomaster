<?php

namespace spec\Core\Shop\CategoryBundle\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TroubleTicketCategorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\Shop\CategoryBundle\Entity\TroubleTicketCategory');
    }

    function it_extends_ru_trouble_ticket_category()
    {
        $this->shouldBeAnInstanceOf('Core\Shop\CategoryBundle\Entity\TranslatableProperties\RuTroubleTicketCategory');
    }
}
