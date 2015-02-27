<?php

/**
 * Класс для api DPD - Dynamic Parcel Distribution
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Logic;

use Core\DeliveryBundle\Entity\Affiliate;
/**
 * @see http://dpd.ru/docs/ru/uslugi-i-tarify/ws-integration-guide.pdf
 * @see http://wstest.dpd.ru/services/calculator2?wsd
 * @see http://ws.dpd.ru/services/calculator2?wsd
 * @link http://www.dpd.ru/docs/dogovor/tk-consumer.pdf - стоимость доп. услуг
 * @todo склеить pdf результаты в один файл или передалать на обработку только одного файла
 * dpd_clientnum    1004005925
 * dpd_clientkey    F2B3F05818D6ADBCAAE1C2038EB47ACEC1A1141F
 * dpd_url          http://ws.dpd.ru/services/calculator2?wsdl
 * dpd_from_id      49468352
 * dpd_from_name    Воронеж
 */
class Dpd implements DeliveryInterface {

    const STATUS = 'OK';

    const STATUS_CANCELED = 'Canceled';

    const STATUS_ALREADY_CANCELED = 'CanceledPreviously';

    const STATUS_NOT_FOUND = 'NotFound';

    const NO_RESPONSE = 'ошибка при запросе';

    const ISSUED = 'Delivered';

    const ARRIVED = 'OnTerminalDelivery';

    /**
     * Тип доставки
     * Т - терминал
     * Д - дверь
     * @var array
     */
    private $serviceVariant = [0 => 'Т', 1 => 'Д'];

    /**
      * Конфигурационные данные
      * @var type
      */
    private $params;


    public function __construct($params)
    {
        $this->params = $params;
    }

    public function getCities($options = null)
    {
        if (!count($options)) {
            throw new \Exception('Need auth parameters');
        }
        $params = array(
            'auth' => array(
                   'clientNumber'   => $options['auth']['client'],
                   'clientKey'      => $options['auth']['clientKey']
           )
        );
        $data = $this->params['operation'][__function__];
        $response = $this->sendRequest($data, $params);
        
        if (!is_object($response)) {
            return false;
        }

        $cities = array();
        foreach($response->return as $key => $city) {
            $cities[$key]['cityId'] = $city->cityId;
            $cities[$key]['cityName'] = $city->cityName;
            $cities[$key]['regionId'] = $city->regionCode;
            $cities[$key]['regionName'] = $city->regionName;
            $cities[$key]['countryId'] = $city->countryCode;
            $cities[$key]['countryName'] = $city->countryName;
        }
        return $cities;
    }

    /**
     * Список терминалов
     * @param array $options
     * @return array
     */
    public function getAffiliates($options)
    {
        $params = array(
            'auth' => array(
                   'clientNumber'   => $options['auth']['client'],
                   'clientKey'      => $options['auth']['clientKey']
           )
        );
        $data = $this->params['operation'][__function__];
        $response = $this->sendRequest($data, $params);

        if (!is_object($response)) {
            return false;
        }

        $cities = array();
        $terminals = array();
        $stdArr = array();
        foreach($response->return as $key => $obj) {
            $terminals[$obj->terminal->terminalCode] = $obj->terminal->terminalAddress;
            $cities[$obj->terminal->terminalCode] = $obj->city->cityId;
            $stdObj = new Affiliate();
            $stdObj->setId($obj->terminal->terminalCode)
                    ->setCaptionRu($obj->terminal->terminalAddress)
                    ->setCityCode($obj->city->cityId)
            ;
            $stdArr[$obj->terminal->terminalCode] = $stdObj;
            /*
            $terminal = $obj->terminal;
            $city = $obj->city;
            $cities[$city->cityId]['cityId'] = $city->cityId;
            $cities[$city->cityId]['cityName'] = $city->cityName;
            $cities[$city->cityId]['regionId'] = $city->regionCode;
            $cities[$city->cityId]['regionName'] = $city->regionName;
            $cities[$city->cityId]['countryId'] = $city->countryCode;
            $cities[$city->cityId]['countryName'] = $city->countryName;
            $cities[$city->cityId]['terminals'][$terminal->terminalCode] = $terminal->terminalAddress;
             *
             */
        }
        return ['choices' => $terminals, 'cittiesId' => $cities, 'stdObj' => $stdArr];
    }

    /**
     * Cумма Объявленной стоимости * 0.0015 + 0.02 * Cумма Наложенного платежа(соотв. Если сумма одинакова с ОЦ, то сюда можно и подставить значение ОЦ)
     * Подсчитать стоимость доставки
     * @param array $options
     * @return array
     */
    public function calculate($options)
    {
        if (!isset($options['to']['cityId']) || !$options['to']['cityId']) {
            return $answer = array(
                'errors' => false,
                'msg' => self::CITY_NOT_FOUND
            );
        }

        $data = $this->params['operation'][__function__];
        foreach($this->params['internalCodes'] as $code) {
             if ($options['internalCode'] == $code['id']) {
                 $serviceType = $code;
                 break;
             }
        }

        $params = array(
            'request' => array(
                'auth' => array(
                    'clientNumber' => $options['auth']['client'],
                    'clientKey' => $options['auth']['clientKey']
                ),
                'pickup' => array(
                    'cityName'=> $options['from']['cityName'],
                    'cityId' => $options['from']['cityId'],
                    'countryCode' => 'RU'
                    ),
                'delivery' => array(
                    'cityName'=> $options['to']['cityName'],
                    'cityId' => $options['to']['cityId'],
                    'countryCode' => 'RU'
                    ),
                'selfPickup' => $options['deliveryFrom'],
                'weight' => $options['order']['total']['weight'],
                'volume' => $options['order']['total']['volume'],
                'declaredValue' => $options['order']['total']['price'],
                'pickupDate' =>  isset($options['date']) ? $options['date'] : date('Y-m-d'),
                'serviceCode' => $serviceType['id'],
                'selfDelivery' => $options['deliveryTo']
            )
        );


        $response = $this->sendRequest($data, $params);

        if (!is_object($response)) {
            return $answer = array(
                'errors' => false,
                'msg' => $response
            );
        }

        if (is_array($response->return->days)){
            $days = array('days'=> $response->return->days);
        } else {
            $days = array('days'=> array('minDays'=> 1, 'maxDays' => $response->return->days));
        }
        // наложный платеж
        if($options['cashOndelivery']) {
            $response->return->cost += $response->return->cost * 0.0015 + $response->return->cost * 0.02;
        }
        $answer = array('cost' => round($response->return->cost, 2, PHP_ROUND_HALF_UP), 'packages' => 1);
        $answer += $days;
        return $answer;
    }

    /**
     * @param type $options
     */
    public function trackPackage($options)
    {
        $answer = array();
        $data = $this->params['operation'][__function__];

        foreach($options['trackNums'] as $key => $trackNum) {
            $params = array(
                'request' => array(
                    'auth' => array(
                        'clientNumber' => $options['auth']['client'],
                        'clientKey' => $options['auth']['clientKey']
                    ),
                    'dpdOrderNr' => $key,
                    'pickupYear' => date('Y', $trackNum['date'])
                )
            );
            $response = $this->sendRequest($data, $params);
            if (!$response || !is_object($response)) {
                continue;
            }

            foreach ($response->return->states as $state) {
                if ($state->newState == self::ISSUED) {
                    $answer[$key] = self::IS_DONE;
                } elseif ($state->newState == self::ARRIVED) {
                    $answer[$key] = self::IS_READY_TO_ISSUE;
                }
            }
        }

        return $answer;
    }

    /**
     * Печать наклейки к заказу
     * @param array $options
     * @return boolean
     */
    public function getSticker($options)
    {
        /*
        $options['order']['trackNums'] = array(
            '05050559ROV',
            //'05050572ROV'
        );
        */
        $data = $this->params['operation'][__function__];

        $params = array(
            'getLabelFile' => array(
                'auth' => array(
                       'clientNumber'   => $options['auth']['client'],
                       'clientKey'      => $options['auth']['clientKey'],
                ),
                'fileFormat' => 'PDF',
                'pageSize' => 'A6'
            )
        );
        $arr = array();
        foreach($options['order']['trackNums'] as $key => $trackNum) {
            $arr[$key]['orderNum'] = $trackNum;
            $arr[$key]['parcelsNumber'] = 1;
        }
        $params['getLabelFile']['order'] = $arr;
        $response = $this->sendRequest($data, $params);
        if (!$response) {
            $answer['errors'] = true;
            $answer['body'] = self::NO_RESPONSE;
        } else {
            if (isset($response->return->file)) {
                $answer['errors'] = false;
                $answer['body'] = $response->return->file;
            } else {
                $answer['errors'] = true;
                $answer['body'] = $response->return->order->errorMessage;
            }
        }

        return $answer;
    }

    /**
     * Печать накладной
     * @param type $options
     */
    public function getInvoice($options)
    {
        $data = $this->params['operation'][__function__];

        $params = array(
            'request' => array(
                'auth' => array(
                       'clientNumber'   => $options['auth']['client'],
                       'clientKey'      => $options['auth']['clientKey'],
                ),
                'orderNum' => $options['order']['trackNums'][0]
            )
        );
        $response = $this->sendRequest($data, $params);
        if (!$response) {
            $answer['errors'] = true;
            $answer['body'] = self::NO_RESPONSE;
        } else {
            if (isset($response->return->file)) {
                $fileName = $options['company'] . '_' . $options['order']['total']['id'] . '_' . time() . '.pdf';
                $answer = array(
                    'errors' => false,
                    'body' => array(
                        'rawData' => $response->return->file,
                        'fileName' => $fileName
                    )
                );
            } else {
                $answer['errors'] = true;
                $answer['body'] = $response;
            }
        }
        return $answer;
    }

    /**
     * Создание заказа
     * @todo пришел ответ OrderPending Заказ обрабатывается нашими сотрудниками ORA-20815: Улица с названием  “Мира” неизвестна.
     * @todo extraService собрать в массив
     * @todo regularNum Номер регулярного заказа DPD что это
     * @param type $options
     * Чтобы клиента оплачивал перевозку, нужно указать:<extraParam><name>order_payment_type</name><value>ОУП</value>-оплата наличными получателем</extraParam>
     */
    public function createOrder($options)
    {
        $answer = array();
        $data = $this->params['operation'][__function__];
        foreach($this->params['internalCodes'] as $code) {
             if ($options['internalCode'] == $code['id']) {
                 $serviceType = $code;
                 break;
             }
        }
        $serviceVariant = $this->serviceVariant[$options['from']['isTerminal']] . $this->serviceVariant[$options['to']['isTerminal']];
        $params = array(
          'orders' => array(
              'auth' => array(
                    'clientNumber' => $options['auth']['client'],
                    'clientKey' => $options['auth']['clientKey']
                ),
              'header' => array(
                  'datePickup' => (isset($options['date'])) ? date('Y-m-d', strtotime($options['date'])) : date('Y-m-d'),
                  'senderAddress' => $this->parityAddress($options),
              ),
              'order' => array(
                  'orderNumberInternal' => $options['order']['total']['id'] . '-' . uniqid(),
                  'serviceCode' => $serviceType['id'],
                  'serviceVariant' => $serviceVariant,
                  'cargoNumPack' => $options['order']['total']['package'],
                  'cargoRegistered' => $options['order']['total']['costly'],
                  'cargoVolume' => $options['order']['total']['volume'],
                  'cargoWeight' => $options['order']['total']['weight'],
                  'cargoValue' => $options['order']['total']['price'],
                  'cargoCategory' => $options['order']['total']['description'],
                  'receiverAddress' => $this->parityAddress($options, 'to'),
              )
          )
        );

        // Если наложный платеж
        if ($options['cashOndelivery']) {
            array_push($options['extraServices'], 'НПП');
        }
        // Доп. Услуги.
        $extraServices = $this->setExtraServices($options['extraServices'], $options);
        if (count($extraServices)) {
            $params['orders']['order']['extraService'] = $extraServices;
        }

        // кто оплачивает пересылку
        if (($options['isDeliveryIncludedInPayment'] * 1)  ) {
            $params['orders']['order']['extraParam'][] = ['name' => 'order_payment_type', 'value' => 'ОУП'];
        }
        // если платит отправитель то долден быть договор
        /*else {
            $params['auth']['header']['payer'] = Клиентский номер плательщика в системе DPD (номер договора с DPD)
        }*/
        $response = $this->sendRequest($data, $params);
        if (!$response) {
            $answer['errors'] = true;
            $answer['body'] = self::NO_RESPONSE;
        } elseif(!is_object($response)) {
            $answer['errors'] = true;
            $answer['body'] = $response;
        } elseif (isset($response->return->status) && $response->return->status != self::STATUS) {
                $answer['errors'] = true;
                $answer['body']['msg'] = $response->return->errorMessage;
        } else {
            $answer = array(
                    'errors' => false,
                    'body' => array('waybillNum' => (string)$response->return->orderNum)
                );
            /*
            // получаем печатную накладную
            $response = $this->getSticker($options);
            if ($response['errors']) {
                $answer['errors'] = true;
                $answer['body'] = self::NO_RESPONSE;
            } else {
                $answer['errors'] = false;
                $answer['body'] = $response['body'];
            }
             *
             */

        }
        return $answer;
    }

    /**
     * Отмена заказа
     * @param array $options
     */
    public function cancelOrder($options)
    {
        $data = $this->params['operation'][__function__];

        $params = array(
            'orders' => array(
                'auth' => array(
                       'clientNumber'   => $options['auth']['client'],
                       'clientKey'      => $options['auth']['clientKey'],
                ),
                'cancel' => ['orderNum' => $options['order']['trackNums'][0]]
            )
        );
        $response = $this->sendRequest($data, $params);
        if (!$response) {
            $answer = array(
                'errors' => true,
                'body' => self::NO_RESPONSE
            );
        } elseif (!(is_object($response)) || !isset($response->result) || $response->result->status == self::STATUS_NOT_FOUND) {
            $answer = array(
                'errors' => true,
                'body' => 'Проблемы при удалении заказа'
            );
        } else {
            $answer = array(
                    'errors' => false,
                    'body' => 'OK'
                );
        }

        return $answer;
    }

    /*
    public function getOrderStatus($options)
    {
        $data = $this->params['operation'][__function__];
        $params = array(
            'orderStatus' => array(
              'auth' => array(
                    'clientNumber' => $options['auth']['client'],
                    'clientKey' => $options['auth']['clientKey']
                ),
                'order' => array(
                    'orderNumberInternal' => $options['order']['id']
                )
            )
        );

        //var_dump($params);die();
        $response = $this->sendRequest($data, $params);

        var_dump($response);
        die();
    }
    */

    public function sendRequest($data, $params = null)
    {
        try {
            $client = new \SoapClient($data['uri'],array(
					'trace' => true,
					'exceptions' => true,
					'soap_version' => SOAP_1_1,
					'connection_timeout' => 10,
					'encoding' => 'UTF-8',
					'cache_wsdl' => WSDL_CACHE_NONE,
					'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP
				));
        
           $result = $client->$data['method']($params);
        } catch(\Exception $e) {
            $result = $e->getMessage();
        }

        return $result;
    }

    /**
     * Простановка входных адрессных данных
     * @param array $options
     * @param string $type - [from, to]
     * @return array
     */
    private function parityAddress($options, $type = 'from')
    {
        $address = array(
            'city' => $options[$type]['cityName'],
            'terminalCode' => $options[$type]['terminalCode'],
            'name' => $options[$type]['name'],
            'contactFio' => $options[$type]['contactFio'],
            'contactPhone' => $options[$type]['contactPhone'],
        );
        foreach($options[$type]['addressDetails'] as $key => $val) {
            if ($val) {
                if ($key == 'corps') {
                    $address['houseKorpus'] = $val;
                } else {
                    $address[$key] = $val;
                }
            }
        }

        return $address;
    }

    /**
     * Простановка доп. услуг
     * @param array $extraServices - доп. услуги
     * @param array $options
     * @return array
     */
    public function setExtraServices($extraServices, $options)
    {
        $result = array();
        foreach($extraServices as $key => $val) {
                $result[$key] = ['esCode' => $val];

                if ($val == 'SMS') {
                    $result[$key]['param'] = array(
                        'name' => 'phone',
                        'value'=> $options['to']['contactPhone']
                    );
                }

                if ($val == 'EML') {
                    $result[$key]['param'] = array(
                        'name' => 'email',
                        'value'=> $options['to']['email']
                    );
                }

                if ($val == 'ЭСД') {
                    $result[$key]['param'] = array(
                        'name' => 'email',
                        'value'=> $options['from']['email']
                    );
                }

                if ($val == 'ЭСЗ') {
                    $result[$key]['param'] = array(
                        'name' => 'email',
                        'value'=> $options['from']['email']
                    );
                }
                // наложный платеж
                if ($val == 'НПП') {
                    $result[$key]['param'] = array(
                        'name' => 'sum_npp',
                        'value'=> $options['order']['total']['price']
                    );
                }

                if ($val == 'ПОД') {
                    $result[$key]['param'] = array(
                        'name' => 'email',
                        'value'=> $options['from']['email']
                    );
                }

                if ($val == 'ОЖД') {
                    $result[$key]['param'] = array(
                        'name' => 'reason_delay',
                        'value' => 'причина'
                    );
                }
        }
        return $result;
    }
}