<?php

namespace Core\DeliveryBundle\Spec\Admin;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Core\DeliveryBundle\Entity\Service;
use \Sonata\AdminBundle\Admin\Pool;
use Symfony\Component\DependencyInjection\Container;

class ServiceAdminSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(Argument::any(), Argument::any(), Argument::any());
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Admin\ServiceAdmin');
    }

    function it_should_have_proper_translation_domain()
    {
        $this->getTranslationDomain()->shouldReturn('CoreDeliveryBundle');
    }
    
    function it_should_be_an_a_admin_type()
    {
        $this->shouldHaveType('Sonata\AdminBundle\Admin\Admin');
    }

    function it_choose_corent_template_for_list()
    {
        $this
            ->getTemplate('list')
            ->shouldReturn('ApplicationSonataAdminBundle:CRUD:list_top.html.twig');
    }

    function it_choose_corent_template_for_edit()
    {
        $this
            ->getTemplate('edit')
            ->shouldReturn('CoreDeliveryBundle:Admin\Service:edit.html.twig');
    }

    function it_choose_corent_template_for_waybill()
    {
        $this
            ->getTemplate('waybill')
            ->shouldReturn('CoreDeliveryBundle:Admin\Service:waybill.html.twig');
    }

    function it_should_be_converted_to_string(Service $service)
    {
        $service->getId()
                ->willReturn(Argument::type('integer'));
        
        $service->getCaptionRu()
                ->willReturn(Argument::type('string'));

        $this->toString($service)->shouldBeString();
    }

    function it_get_correct_delivery_company_internal_codes(Pool $configPool, Container $container)
    {
        $paramName = 'core_delivery.dpd.InternalCodes';
        
        $container->hasParameter($paramName)
                  ->willReturn(true)
        ;
        
        $container->getParameter($paramName)
                ->willReturn(array('dpd_classic_parcel' => [
                                'id' => 'PCL',
                                'name' =>'DPD CLASSIC Parcel',
                                'isActive' => true
                            ]))
        ;

        $configPool
            ->getContainer()
            ->willReturn($container);
        ;
        
        $this->setConfigurationPool($configPool);

        $this->getDeliveryInternalCodes('dpd')->shouldBeArray();
    }
}
