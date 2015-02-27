<?php

namespace Core\DeliveryBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ServiceInCitySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Entity\ServiceInCity');
    }

    function it_extends_delivery_service()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Entity\Service');
    }
    
    /**
     *
     * @param Core\DirectoryBundle\Entity\City $city
     */
    function it_city_is_mutable($city)
    {
        $this->setCity($city);
        $this->getCity()->shouldHaveType('Core\DirectoryBundle\Entity\City');
    }
    
}
