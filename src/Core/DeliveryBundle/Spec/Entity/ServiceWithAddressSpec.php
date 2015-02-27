<?php

namespace Core\DeliveryBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ServiceWithAddressSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Entity\ServiceWithAddress');
    }

    function it_extends_delivery_service()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Entity\Service');
    }

    function it_initializes_addresses_collection_by_default()
    {
        $this->getAddresses()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }
}
