<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use \Core\DirectoryBundle\Entity\City;
class CommonContragentSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Entity\CommonContragent');
    }

    function it_initializes_payments_collection_by_default()
    {
        $this->getPayments()
            ->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function it_city_is_mutable(City $city)
    {
        $this->setCity($city);
        $this->getCity()->shouldReturn($city);
    }

}
