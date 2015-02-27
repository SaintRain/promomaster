<?php

namespace Core\DeliveryBundle\Spec\Logic;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EnergySpec extends ObjectBehavior
{
    function let()
    {
        $options['operation'] = array(
            'getCities'     => ['uri'=> 'http://api.nrg-tk.ru/api/rest/?method=nrg.get.locations'],
            'calculate'     => ['uri'=> 'http://api.nrg-tk.ru/api/rest/?method=nrg.calculate'],
            'trackPackage'  => ['uri'=> 'http://api.nrg-tk.ru/api/rest/?method=nrg.get_sending_state']
        );
        $this->beConstructedWith($options);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Logic\Energy');
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
            'order'=> [
                'total' => [
                    'volume' => Argument::type('numeric'),
                    'weight' => Argument::type('numeric'),
                    'price' => Argument::type('numeric'),
                ]
            ]
        );
        $this->calculate($options)->shouldBeArray();
    }

    function it_track_package()
    {
        $options = array(
            'trackNums' => ['АСВЛЭ-6/0511' => ['cityId' => 495], 'АСВЛЭ-6/0511' => ['cityId' => 495]]
        );
        $this->trackPackage($options)->shouldBeArray();
    }
}
