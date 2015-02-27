<?php

namespace Core\TroubleTicketBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StatusSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\TroubleTicketBundle\Entity\Status');
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
        $this->setCaptionRu('simple caption');
        $this->getCaptionRu()->shouldReturn('simple caption');
    }

    function it_has_no_sys_name_by_default()
    {
        $this->getSysName()->shouldReturn(null);
    }

    function it_sys_name_is_mutable()
    {
        $this->setSysName('simple-caption');
        $this->getSysName()->shouldReturn('simple-caption');
    }

    function its_enabled_by_default()
    {
        $this->getIsEnabled()->shouldReturn(true);
    }

    function it_enable_is_mutable()
    {
        $this->setIsEnabled(false);
        $this->getIsEnabled()->shouldReturn(false);
    }

    function it_has_no_index_position_by_default()
    {
        $this->getIndexPosition()->shouldReturn(null);
    }

    function it_index_position_is_mutable()
    {
        $this->setIndexPosition(44);
        $this->getIndexPosition()->shouldReturn(44);
    }
}
