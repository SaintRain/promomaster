<?php

namespace Core\DeliveryBundle\Spec\Logic;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CdekSpec extends ObjectBehavior
{
    function let()
    {
        $options= array(
            'operation' => [
                'getCities'     =>  ['uri' => 'http://gw.edostavka.ru:11443/pvzlist.php'],
                'getAffiliates' =>  ['uri' => 'http://gw.edostavka.ru:11443/pvzlist.php'],
                'calculate'     =>  ['uri' => 'http://api.edostavka.ru/calculator/calculate_price_by_json_request.php'],
                'trackPackage'  =>  ['uri' => 'http://gw.edostavka.ru:11443/status_report_h.php'],
                'getInvoice'    =>  ['uri' => 'http://gw.edostavka.ru:11443/orders_print.php'],
                'createOrder'   =>  ['uri' => 'http://gw.edostavka.ru:11443/new_orders.php'],
                'cancelOrder'   =>  ['uri' => 'http://gw.edostavka.ru:11443/delete_orders.php'],
            ],
            'ExtraServices' => [
                'fitting_home' => [
                    'id'        => 30,
                    'name'      => 'Примерка на дому',
                    'cost'      => 0,
                    'isActive'  => true
                ],
                'npp' => [
                    'id'        => 'НПП',
                    'name'      => 'Наложенный платеж',
                    'cost'      => 1,
                    'isActive'  => false
                ]
            ],
            'internalCodes' => [
                'package_terminal_door' => [
                    'id'        => 137,
                    'name'      => 'Посылка склад-дверь',
                    'isActive'  => true,
                    'modeId'    => 3
                ]
            ]

        );
        
        $this->beConstructedWith($options);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Logic\Cdek');
    }

    function it_should_implement_delivery_interface()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Logic\DeliveryInterface');
    }

    function it_get_delivery_cities()
    {
        $options['auth'] = [
            'client' => 'e765dfc32d8e7b57b3c99ad0622a4802',
            'clientKey' => 'f59947f42410856d4f8ab9833ab088cf'
        ];
        $this->getCities()->shouldBeArray($options);
    }
    
    function it_get_delivery_affiliates()
    {
        $options['auth'] = [
            'client' => 'e765dfc32d8e7b57b3c99ad0622a4802',
            'clientKey' => 'f59947f42410856d4f8ab9833ab088cf'
        ];
        $this->getAffiliates()->shouldBeArray($options);
    }

    function it_calculate_delivery_price()
    {
        $options = array(
            'auth' => [
                'client' => 'e765dfc32d8e7b57b3c99ad0622a4802',
                'clientKey' => 'f59947f42410856d4f8ab9833ab088cf'
            ],
            'cashOndelivery' => true,
            'internalCode' => 137,
            'to' => ['cityId' => Argument::type('integer')],
            'from' => ['cityId' => Argument::type('integer')],
            'order'=> [
                'total' => [
                    'volume' => Argument::type('numeric'),
                    'weight' => Argument::type('numeric'),
                    'price' => Argument::type('numeric'),
                ],
                'package' => [
                    1 => ['weight' => 2, 'quantity' => 2, 'price' => 300, 'volume' => 3],
                    2 => ['weight' => 15, 'quantity' => 1, 'price' => 130, 'volume' => 1.5]
                ]
            ]
        );
        $this->calculate($options)->shouldBeArray();
    }

    function it_track_package()
    {
        $options = array(
            'auth' => [
                'client' => 'e765dfc32d8e7b57b3c99ad0622a4802',
                'clientKey' => 'f59947f42410856d4f8ab9833ab088cf'
            ],
            'trackNums' => ['АСВЛЭ-6/0511' => 'АСВЛЭ-6/0511', 'АСВЛЭ-6/0511' => 'АСВЛЭ-6/0511']
        );
        $this->trackPackage($options)->shouldBeArray();
    }

    function it_get_invoice()
    {
        $options = [
            'auth' => [
                'client' => 'e765dfc32d8e7b57b3c99ad0622a4802',
                'clientKey' => 'f59947f42410856d4f8ab9833ab088cf'
            ],
            'order'=> [
                'trackNums' => ['АСВЛЭ-6/0511', 'АСВЛЭ-6/0511']
            ]
        ];

        $this->getInvoice($options)->shouldBeArray();
    }

    function it_make_order()
    {
        $options = array(
            'auth' => [
                'client' => 'e765dfc32d8e7b57b3c99ad0622a4802',
                'clientKey' => 'f59947f42410856d4f8ab9833ab088cf'
            ],
            'extraServices' => [],
            'cashOndelivery' => false,
            'isDeliveryIncludedInPayment' => false,
            'internalCode' => 137,
            'to' => [
                'cityId'        => Argument::type('numeric'),
                'house'         => Argument::type('numeric'),
                'flat'          => Argument::type('numeric'),
                'terminalCode'  => Argument::type('numeric'),
                'contactFio'    => Argument::any(),
                'contactPhone'  => Argument::any(),
                'email'         => Argument::any(),

            ],
            'from' => [
                'cityId'        => Argument::type('numeric'),
                'house'         => Argument::type('numeric'),
                'flat'          => Argument::type('numeric'),
                'terminalCode'  => Argument::type('numeric'),
                'name'          => Argument::type('string'),
            ],
            'order'=> [
                'total' => [
                    'volume'    => Argument::type('numeric'),
                    'weight'    => 12,
                    'price'     => Argument::type('numeric'),
                    'id'        => Argument::type('numeric')
                ],
                'package' => [
                    1 => [
                        'weight' => 2,
                        'quantity' => 2,
                        'price' => 300,
                        'volume' => 3,
                        'wareKey' => '12121',
                        'title' => 'title 1'
                    ]
                    ,
                    2 => [
                        'weight' => 15,
                        'quantity' => 1,
                        'price' => 130,
                        'volume' => '1.5',
                        'wareKey' => 'q2121',
                        'title' => 'title 2'
                    ]
                ]
            ]
        );

        $this->createOrder($options)->shouldBeArray();
    }
    
    function it_cancel_order()
    {
        $options = [
            'auth' => [
                'client' => 'e765dfc32d8e7b57b3c99ad0622a4802',
                'clientKey' => 'f59947f42410856d4f8ab9833ab088cf'
            ],
            'order'=> [
                'trackNums' => ['АСВЛЭ-6/0511', 'АСВЛЭ-6/0511']
            ]
        ];

        $this->getInvoice($options)->shouldBeArray();
    }
}
