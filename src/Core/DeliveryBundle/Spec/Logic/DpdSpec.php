<?php

namespace Core\DeliveryBundle\Spec\Logic;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DpdSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Logic\Dpd');
    }

    function let()
    {
        $options = array(
            'operation' => [
                'getCities' => [
                    'uri'       => 'http://ws.dpd.ru/services/geography?wsdl',
                    'method'    => 'getCitiesCashPay',
                ],
                'getAffiliates' => [
                    'uri'       => 'http://ws.dpd.ru/services/geography?wsdl',
                    'method'    => 'getTerminalsSelfDelivery2',
                ],
                'calculate' => [
                    'uri'       => 'http://ws.dpd.ru/services/geography?wsdl',
                    'method'    => 'getServiceCost',
                ],
                'trackPackage' => [
                    'uri'       => 'http://ws.dpd.ru/services/tracing1-1?wsdl',
                    'method'    => 'getStatesByDPDOrder',
                ],
                'getSticker' => [
                    'uri'       => 'http://ws.dpd.ru/services/label-print?wsdl',
                    'method'    => 'createLabelFile',
                ],
                'getInvoice' => [
                    'uri'       => 'http://wstest.dpd.ru/services/order2?wsdl',
                    'method'    => 'getInvoiceFile',
                ],
                'createOrder' => [
                    'uri'       => 'http://wstest.dpd.ru/services/order2?wsdl',
                    'method'    => 'createOrder',
                ],
                'cancelOrder' => [
                    'uri'       => 'http://wstest.dpd.ru/services/order2?wsdl',
                    'method'    => 'cancelOrder',
                ],
                'getOrderStatus' => [
                    'uri'       => 'http://wstest.dpd.ru/services/order2?wsdl',
                    'method'    => 'getOrderStatus',
                ],
            ],
            'internalCodes' => [
                'dpd_classic_parcel' => [
                    'id'        => 'PCL',
                    'name'      => 'DPD CLASSIC Parcel',
                    'isActive'  => true
                ]
            ]
        );
        $this->beConstructedWith($options);
    }

    function it_should_implement_delivery_interface()
    {
        $this->shouldHaveType('Core\DeliveryBundle\Logic\DeliveryInterface');
    }

    function it_get_delivery_affiliates()
    {
        $options['auth'] = [
            'client' => '1004005920',
            'clientKey' => '16A9641A7A303094C9E340B105DE4B205BD7EE17'
        ];
        $this->getAffiliates($options)->shouldBeArray($options);
    }

    function it_calculate_delivery_price()
    {
        $options = array(
            'auth' => [
                'client' => '1004005920',
                'clientKey' => '16A9641A7A303094C9E340B105DE4B205BD7EE17'
            ],
            'deliveryFrom' => 0,
            'deliveryTo' => 0,
            'cashOndelivery' => true,
            'internalCode' => 'PCL',
            'to' => ['cityId' => Argument::type('integer'), 'cityName' => Argument::type('string')],
            'from' => ['cityId' => Argument::type('integer'), 'cityName' => Argument::type('string')],
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
            'trackNums' => ['АСВЛЭ-6/0511' => ['date' => time()], 'АСВЛЭ-6/0511' => ['date' => time()]]
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
            'internalCode' => 'PCL',
            'to' => [
                'isTerminal'    => false,
                'cityId'        => '49270397',
                'cityName'      => 'Ростов-на-Дону',
                'terminalCode'  => 'AER',
                'contactFio'    => 'Правдин А. П.',
                'name'          => 'газета Правда',
                'contactPhone'  => '+79066543445',
                'email'         => 'pravda@mail.ru',
                'addressDetails'=> [
                    'street'        => '50 лет СССР',
                    'streetAbbr'    => 'ул',
                    'house'         => 48,
                ],

            ],
            'from' => [
                'addressDetails'=> [
                    'street'        => 'Андреева',
                    'streetAbbr'    => 'ул',
                    'house'         => 6,
                ],
                'isTerminal'    => false,
                'cityId'        => '49694102',
                'cityName'      => 'Москва',
                'terminalCode'  => 'AER',
                'name'          => 'OAO GAMES',
                'contactFio'    => 'Пупкин Валисий Петрович',
                'contactPhone'  => '+79026753465',
                'email'         => 'oaogames@mail.ru',
            ],
            'order'=> [
                'total' => [
                    'volume'        => 1,
                    'weight'        => 1,
                    'price'         => 1200,
                    'id'            => 1902,
                    'package'       => 1,
                    'costly'        => false,
                    'description'   => 'Toys',
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
    
    function it_get_delivery_cities()
    {
        $options['auth'] = [
            'client' => '1004005920',
            'clientKey' => '16A9641A7A303094C9E340B105DE4B205BD7EE17'
        ];
        $this->getCities($options)->shouldBeArray();
    }
}