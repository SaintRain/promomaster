<?php

namespace Core\DeliveryBundle\Spec\Logic;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PekSpec extends ObjectBehavior
{
    function let()
    {
        $options['operation'] = array(
                'getCities' => ['api' => false,     'uri' => 'http://pecom.ru/ru/calc/towns.php'],
                'calculate' => ['api' => false,     'uri' => 'http://pecom.ru/bitrix/components/pecom/calc/ajax.php'],
                'trackPackage' => ['api' => true,   'uri' => 'https://kabinet.pecom.ru/api/v1/cargos/basicstatus/']
        );
        
        $this->beConstructedWith($options);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Logic\Pek');

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
            'auth' => ['client' => Argument::type('string'), 'clientKey' => Argument::type('string')],
            'trackNums' => ['АСВЛЭ-6/0511' => 'АСВЛЭ-6/0511', 'АСВЛЭ-6/0511' => 'АСВЛЭ-6/0511']
        );
        $this->trackPackage($options)->shouldBeArray();
    }

    function it_get_delivery_cities()
    {
        $this->getCities()->shouldBeArray();
    }
}
