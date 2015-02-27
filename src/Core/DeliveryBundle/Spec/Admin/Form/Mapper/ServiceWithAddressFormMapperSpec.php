<?php

namespace Core\DeliveryBundle\Spec\Admin\Form\Mapper;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Sonata\AdminBundle\Form\FormMapper;

class ServiceWithAddressFormMapperSpec extends ObjectBehavior
{
    function let(FormMapper $formMapper)
    {
        $formMapper
                ->with(Argument::any())
                ->shouldBeCalled()
                ->willReturn($formMapper)
        ;

        $formMapper
                ->add('company', 'entity', Argument::any())
                ->shouldBeCalled()
                ->willReturn($formMapper)
        ;
        
        $formMapper
                ->add('serviceType', 'sonata_type_model', Argument::any())
                ->shouldBeCalled()
                ->willReturn($formMapper)
        ;
        
        $formMapper
                ->add('captionRu', null, Argument::any())
                ->shouldBeCalled()
                ->willReturn($formMapper)
        ;
        
        $formMapper
                ->add('name', null, Argument::any())
                ->shouldBeCalled()
                ->willReturn($formMapper)
        ;
        
        $formMapper
                ->add('addresses', null, Argument::any())
                ->shouldBeCalled()
                ->willReturn($formMapper)
        ;
        
        $formMapper
                ->add('deliveryFrom', 'choice', Argument::any())
                ->shouldBeCalled()
                ->willReturn($formMapper)
        ;
        
        $formMapper
                ->add('deliveryTo', 'choice', Argument::any())
                ->shouldBeCalled()
                ->willReturn($formMapper)
        ;
        
        $formMapper
                ->add('buyerType', 'choice', Argument::any())
                ->shouldBeCalled()
                ->willReturn($formMapper)
        ;
        
        $formMapper
                ->add('minSum', 'money', Argument::any())
                ->shouldBeCalled()
                ->willReturn($formMapper)
        ;
        
        $formMapper
                ->add('maxSum', 'money', Argument::any())
                ->shouldBeCalled()
                ->willReturn($formMapper)
        ;
        
        $formMapper
                ->add('isCashOnDelivery', 'choice', Argument::any())
                ->shouldBeCalled()
                ->willReturn($formMapper)
        ;
        
        $formMapper
                ->end()
                ->shouldBeCalled()
                ->willReturn($formMapper)
        ;
        
        $options = [
            'buyerTypes' => [
                'IndiContragent' => 'Физ. лица',
                'LegalContragent' => 'Юр. лица'
            ]
        ];

        $this->beConstructedWith($formMapper, $options);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Admin\Form\Mapper\ServiceWithAddressFormMapper');
    }
}
