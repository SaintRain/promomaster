<?php

/**
 * Класс для api Первая Экспедиционная Компания
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Logic;

/**
 * @see http://www.pecom.ru/ru/calc/api.php
 * @see https://kabinet.pecom.ru/api/v1/
 * @todo привязать статусы доставок заказа 
 *
 */
//  -111034 - Воронеж
//  -457 - Москва
//  -466 - Воронеж по версии wmd
class Pek implements DeliveryInterface {

    const ARRIVED = 'Прибыл';

    const ISSUED = 'Выдан';

    /**
     * Максимальное количество кодов грузов в одном запросе
     */
    const MAX_PKG = 5;
    
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
        $data = $this->params['operation'][__function__];
        $response = $this->sendRequest($data);
        if (!$response) {
            return false;
        }
        $response = json_decode($response, true);
        $cities = array();
        foreach($response as $region => $val) {
            foreach($val as $key => $city) {
                $cities[$key]['cityId'] = $key;
                $cities[$key]['cityName'] = $city;
                $cities[$key]['regionName'] = $region; // больше похоже на название областного центра
            }
        }
        return $cities;
    }

    public function calculate($options)
    {
        if (!isset($options['to']['cityId']) || !$options['to']['cityId']) {
            return $answer = array(
                'errors' => false,
                'msg' => self::CITY_NOT_FOUND
            );
        }
        $data = $this->params['operation'][__function__];
        $params = array(
            'take' => array(
                    'town' => $options['from']['cityId']
                ),
            'deliver' => array(
                    'town' => $options['to']['cityId']
                ),
            'strah' => $options['order']['total']['price'],
            'places' => array(0 => array(
                        '',
                        '',
                        '',
                        $options['order']['total']['volume'],
                        $options['order']['total']['weight']
                    ))
        );

        $params = http_build_query($params);
        
        $response = $this->sendRequest($data, $params);
        $response = json_decode($response);
        if (!$response) {
            return $answer = array(
                'errors' => false,
                'msg' => self::CITY_NOT_FOUND
            );
        }
        $cost = 0;
        if (count($response->auto) == 3) {
            $cost += $response->auto[2];
        }

        /*
         * учитываются забор и доставка от дверей до дверей
        if (count($response->deliver) == 3) {
            $res = explode(' - ', $response->deliver[1]);
            if (count($res) > 1) {
                $cost += $response->deliver[2];
            }
        }
        if (count($response->take) == 3) {
            $res = explode(' - ', $response->take[1]);
            if (count($res) > 1) {
                $cost += $response->take[2];
            }
        }
         *
         */
        if (isset($response->ADD_3)) {
            $cost += $response->ADD_3->{'2'};
        }
        $matches = array();
        if (preg_match('/(\d+)(,(\d+))*(-(\d+)(,(\d+))*)*/',$response->periods, $matches)) {
            $days = explode('-', $matches[0]);
            foreach($days as $key => $val) {
                $days[$key] = floor($val);
            }
            if (count($days) > 1){
                $days = array('days'=> array('minDays'=> $days[0], 'maxDays' => $days[1]));
            } else {
                $days = array('days'=> array('minDays'=> 1, 'maxDays' => $days[0]));
            }
        } else {
            $days = array('days'=> array('minDays'=> 1, 'maxDays' => 1));
        }

        $answer = array('cost' => round($cost, 2), 'packages' => 1);
        $answer += $days;
        return $answer;
    }

    public function trackPackage($options)
    {
        $data = $this->params['operation'][__function__];
        $data['auth']['client'] = $options['auth']['client'];
        $data['auth']['clientKey'] = $options['auth']['clientKey'];
        $answer = array();
        $params = array();
        $count = 0;
        $totalPackages = count($options['trackNums']);
        foreach($options['trackNums'] as $key => $trackNum) {
            $params['cargoCodes'][] = $key;
            $count++;
            $totalPackages--;
            if ($count == self::MAX_PKG || !$totalPackages) {
                $params = json_encode($params);
                $response = $this->sendRequest($data, $params);
                $params = array();
                if (!$response) {
                    continue;
                }
                $response = json_decode($response, true);
                if (isset($response['cargos'])) {
                    foreach($response['cargos'] as $cargo) {
                        if ($cargo['info']['cargoStatus'] == self::ARRIVED) {
                            $answer[$cargo['cargo']['code']] = self::IS_READY_TO_ISSUE;
                        } elseif ($cargo['info']['cargoStatus'] == self::ISSUED) {
                            $answer[$cargo['cargo']['code']] = self::IS_DONE;
                        }
                    }
                }
            }
        }

        return $answer;
    }
    
    public function sendRequest($data, $params = null)
    {
        $request = new \cURL\Request($data['uri']);

        $request->getOptions()
                ->set(CURLOPT_HEADER, false)
                ->set(CURLOPT_TIMEOUT, 90)
                ->set(CURLOPT_RETURNTRANSFER, true)
        ;
        if ($data['api']) {
            $request->getOptions()
                ->set(CURLOPT_HTTPHEADER,array(
                        'Content-Type: application/json;charset=utf-8',
                    ))
                ->set(CURLOPT_ENCODING, 'gzip')
                ->set(CURLOPT_SSL_VERIFYPEER, TRUE)
		->set(CURLOPT_SSL_VERIFYHOST, 2)
                ->set(CURLOPT_CAINFO, __DIR__.'/../Resources/public/cacert-kabinet_pecom_ru.pem')
                ->set(CURLOPT_HTTPAUTH, CURLAUTH_BASIC)
                ->set(CURLOPT_USERPWD, sprintf('%s:%s', $data['auth']['client'], $data['auth']['clientKey']))
            ;
        }
        if (count($params) ) {
            $request->getOptions()
                ->set(CURLOPT_POST, TRUE)
                ->set(CURLOPT_POSTFIELDS, $params)
            ;
        }

        $response = $request->send();

        return $response->getContent();
    }

    /*
    private function getOperationInfo($operation, $method = null)
    {
        $defaultData =  array(
            'affiliate' => array(
                'uri' => 'http://pecom.ru/ru/calc/towns.php',
            ),
            'calculate' => array(
                'uri' => 'http://pecom.ru/bitrix/components/pecom/calc/ajax.php'
            ),
            'trackPackage' => array(
                'uri' => 'https://kabinet.pecom.ru/api/v1/cargos/basicstatus/'
            )
        );
        return $defaultData[$operation];
    }

    
    public function setOptions($options)
    {
        $this->options = $options;
    }
     * 
     */
}