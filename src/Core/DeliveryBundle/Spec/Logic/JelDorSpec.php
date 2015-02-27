<?php

namespace Core\DeliveryBundle\Spec\Logic;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class JelDorSpec extends ObjectBehavior
{
    function let()
    {
        $options['operation'] = array(
                'getCities' => ['uri' => 'http://www.jde.ru/branch'],
                'calculate' => ['uri' => 'http://www.jde.ru/form/calc/simple'],
                'trackPackage' => ['uri' => 'http://cabinet.jde.ru/']
        );

        $this->beConstructedWith($options);
    }

    
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Logic\JelDor');
    }

    function it_should_implement_delivery_interface()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Logic\DeliveryInterface');
    }

    function it_calculate_delivery_price()
    {
        $options = array(
            'to' => ['cityName' => Argument::type('string')],
            'from' => ['cityName' => Argument::type('string')],
            'order'=> array('total' => [
                'volume' => 12,
                'weight' => Argument::type('numeric'),
                'price' => Argument::type('numeric'),
            ])
        );
        $this->calculate($options)->shouldBeArray();
    }

    function it_track_package()
    {
        $options = array(
            'trackNums' => ['АСВЛЭпинкод60511'=> ['cityName' => Argument::type('string')]]
        );
        $this->trackPackage($options)->shouldBeArray();
    }
}
