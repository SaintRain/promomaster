<?php

namespace Core\DeliveryBundle\Spec\Logic;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DellinSpec extends ObjectBehavior
{
    function let()
    {
        $options['operation'] = array(
                'getCities'     => ['uri' => 'http://public.services.dellin.ru/calculatorService2/index.html?request=xmlForm'],
                'calculate'     => ['uri' => 'http://public.services.dellin.ru/calculatorService2/index.html?request=xmlResult'],
                'trackPackage'  => ['uri' => 'http://public.services.dellin.ru/tracker/XML/']
        );

        $this->beConstructedWith($options);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Logic\Dellin');
    }

    function it_should_implement_delivery_interface()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Logic\DeliveryInterface');
    }

    function it_get_delivery_cities()
    {
        $this->getCities()->shouldBeArray();
    }

    function it_calculate_delivery_price()
    {
        $options = array(
            'to' => ['cityId' => Argument::type('string')],
            'deliveryFrom' => 0,
            'deliveryTo' => 0,
            'from' => ['cityId' => Argument::type('string')],
            'order'=> array('total' => [
                'volume' => Argument::type('numeric'),
                'weight' => Argument::type('numeric'),
                'price' => Argument::type('numeric'),
            ])
        );
        $this->calculate($options)->shouldBeArray();
    }

    function it_track_package()
    {
        $options = array(
            'trackNums' => ['АСВЛЭ-6/0511' => 'АСВЛЭ-6/0511', 'АСВЛЭ-6/0511' => 'АСВЛЭ-6/0511']
        );
        $this->trackPackage($options)->shouldBeArray();
    }
}
