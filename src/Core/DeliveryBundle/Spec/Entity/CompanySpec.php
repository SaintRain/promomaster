<?php

namespace Core\DeliveryBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CompanySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Entity\Company');
    }

    function it_initializes_services_collection_by_default()
    {
        $this->getServices()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function it_transformation_to_sting_by_default_is_return_caption()
    {
        $this->setCaptionRu('test caption');
        $this->__toString()->shouldReturn('test caption');
    }

    function it_status_by_default_is_active()
    {
        $this->getStatus()->shouldReturn(true);
    }

    function it_in_footer_by_default_is_true()
    {
        $this->getIsInFooter()->shouldReturn(true);
    }
}
