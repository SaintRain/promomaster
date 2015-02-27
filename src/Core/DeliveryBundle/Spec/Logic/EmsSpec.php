<?php

namespace Core\DeliveryBundle\Spec\Logic;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EmsSpec extends ObjectBehavior
{
    function let()
    {
        $options['operation'] = array(
                'getCities' => ['api' => false,     'uri' => 'http://emspost.ru/api/rest/?method=ems.get.locations'],
                'calculate' => ['api' => false,     'uri' => 'http://emspost.ru/api/rest/?method=ems.calculate'],
        );

        $this->beConstructedWith($options);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Logic\Ems');
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
            'to' => ['cityId' => Argument::type('integer')],
            'from' => ['cityId' => Argument::type('integer')],
            'order'=> array(
                'total' => [
                    'volume' => Argument::type('numeric'),
                    'weight' => Argument::type('numeric'),
                    'price' => Argument::type('numeric'),
                ],
                'package' => [
                    1 => ['weight' => 2, 'quantity' => 2, 'price' => 300, 'volume' => 3],
                    2 => ['weight' => 15, 'quantity' => 1, 'price' => 130, 'volume' => 1.5]
                ]
            )
        );
        $this->calculate($options)->shouldBeArray();
    }
}
