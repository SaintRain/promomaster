<?php

namespace Core\DeliveryBundle\Spec\Logic;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PostRuSpec extends ObjectBehavior
{
    function let()
    {
        $options['operation'] = array(
                'calculate' =>      [
                                        'soap' => false,
                                        'uri' => 'http://api.postcalc.ru/',
                                        'method' => false],
                'trackPackage' =>   [
                                        'soap' => true,
                                        'uri' => 'http://voh.russianpost.ru:8080/niips-operationhistory-web/OperationHistory?wsdl',
                                        'method' => 'GetOperationHistory'
                                    ]
        );

        $this->beConstructedWith($options);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Logic\PostRu');
    }

    function it_should_implement_delivery_interface()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Logic\DeliveryInterface');
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

    function it_track_package()
    {
        $options = array(
            'auth' => ['client' => Argument::type('string'), 'clientKey' => Argument::type('string')],
            'trackNums' => ['АСВЛЭ-6/0511' => 'АСВЛЭ-6/0511', 'АСВЛЭ-6/0511' => 'АСВЛЭ-6/0511']
        );
        $this->trackPackage($options)->shouldBeArray($options);
    }
}
