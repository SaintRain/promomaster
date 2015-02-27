<?php

namespace spec\Core\Shop\CategoryBundle\Entity\TranslatableProperties;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RuTroubleTicketCategorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\Shop\CategoryBundle\Entity\TranslatableProperties\RuTroubleTicketCategory');
    }

    function it_extends_ru_trouble_ticket_category()
    {
        $this->shouldBeAnInstanceOf('Core\Shop\CategoryBundle\Entity\CommonCategory');
    }

    function it_has_no_id_by_default()
    {
        $this->getId()->shouldReturn(null);
    }

    function it_has_no_caption_ru_by_default()
    {
        $this->getCaptionRu()->shouldReturn(null);
    }

    function it_caption_ru_is_mutable()
    {
        $this->setCaptionRu('заголовок');
        $this->getCaptionRu()->shouldReturn('заголовок');
    }

    function it_has_no_description_ru_default()
    {
        $this->getDescriptionRu()->shouldReturn(null);
    }

    function it_description_ru_is_mutable()
    {
        $this->setDescriptionRu('описание');
        $this->getDescriptionRu()->shouldReturn('описание');
    }

    function it_has_fluent_interface()
    {
        $this->setDescriptionRu('описание')->shouldReturn($this);
        $this->setCaptionRu('заголовок')->shouldReturn($this);
    }

}
