<?php

namespace Core\DeliveryBundle\Spec\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ServiceSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Entity\Service');
    }

    function it_initializes_waybills_collection_by_default()
    {
        $this->getWaybills()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function it_min_sum_by_default_is_zero()
    {
        $this->getMinSum()->shouldReturn(0);
    }

    function it_max_sum_by_default_is_zero()
    {
        $this->getMaxSum()->shouldReturn(0);
    }

    function it_delivery_from_by_default_is_false()
    {
        $this->getDeliveryFrom()->shouldReturn(false);
    }
    
    function it_delivery_to_by_default_is_false()
    {
        $this->getDeliveryTo()->shouldReturn(false);
    }

    function it_cash_on_delivery_by_default_is_false()
    {
        $this->getIsCashOnDelivery()->shouldReturn(false);
    }

    function it_show_on_product_page_by_default_is_false()
    {
        $this->getIsShowOnProduct()->shouldReturn(false);
    }

    /**
     *
     * @param Core\DeliveryBundle\Entity\ServiceType $serviceType
     */
    function it_service_type_is_mutable($serviceType)
    {
        $this->setServiceType($serviceType);
        $this->getServiceType()->shouldHaveType('Core\DeliveryBundle\Entity\ServiceType');
    }

    /**
     *
     * @param Core\DeliveryBundle\Entity\Company $company
     */
    function it_company_is_mutable($company)
    {
        $this->setCompany($company);
        $this->getCompany()->shouldHaveType('Core\DeliveryBundle\Entity\Company');
    }

    function it_transformation_to_sting_must_return_caption()
    {
        $this->setCaptionRu('test caption');
        $this->__toString()->shouldReturn('test caption');
    }
}
