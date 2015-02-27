<?php

namespace Core\DeliveryBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AddressSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Entity\Address');
    }

    function it_status_by_default_is_active()
    {
        $this->getStatus()->shouldReturn(true);
    }

    function it_supply_plastic_card_by_default_is_off()
    {
        $this->getIsSupplyPlacticCard()->shouldReturn(false);
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
    
    /**
     * @param \Core\DirectoryBundle\Entity\City $city
     */
    function it_transformation_to_sting_by_default_is_mutable($city = null)
    {
        $prophet = new \Prophecy\Prophet();
        $prophecy = $prophet->prophesize('Core\DirectoryBundle\Entity\City');
        $prophecy->setName(Argument::exact('Rostov'));
        $prophecy->getName()->willReturn('Rostov');
        $this->setCaptionRu('test caption');
        $this->setCity($prophecy->reveal());
        $this->__toString()->shouldReturn('Rostov, test caption');
    }

    /**
     * @param Core\DirectoryBundle\Entity\City $city
     */
    function it_city_is_mutable($city)
    {
        $this->setCity($city);
        $this->getCity()->shouldHaveType('Core\DirectoryBundle\Entity\City');
    }
}
