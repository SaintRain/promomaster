<?php

/**
 * Интерфейс для доставок
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Logic;

/**
 * @see http://www.dellin.ru/developers/
 */
//  Длина 13,5 метра, ширина и высота 2,40 метра и по весу 3000 кг
/*
 * array (size=2)
  93 =>
    array (size=3)
      'cityId' => string '0x834F00112FDD658311DA4C6326EF0E10' (length=34)
      'cityName' => string 'Воронеж' (length=14)
      'kladrId' => string '3600000100000000000000000' (length=25)
  95 =>
    array (size=3)
      'cityId' => string '0x834F00112FDD658311DA4C6326EF0E13' (length=34)
      'cityName' => string 'Москва' (length=12)
      'kladrId' => string '7700000000000000000000000' (length=25)
 */
//9991122201000084708100000 - не обслуживается
//5003300012400000000000000 - не обслуживается
//Груз ожидает выдачи. Груз в пути. Груз не отправлен
class Dellin implements DeliveryInterface {

    const URL = 'http://public.services.dellin.ru/';

    const ARRIVED = 'Груз ожидает выдачи.';
    
    const ISSUED = 'Груз выдан.';

    const IN_PROCCESS = 'Груз в пути.';

    const NO_RESPONSE = 'ошибка при запросе';

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
        $response = new \SimpleXMLElement($response);

        $cities = array();
        $key = 0;
        foreach($response->cities->city as $city) {
            $cities[$key]['cityId'] = (string)$city->id;
            $cities[$key]['cityName'] = (string)$city->name;
            $cities[$key]['kladrId'] = (string)$city->codeKLADR;
            $key++;
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
            'derivalDoor'   => $options['deliveryFrom'] ? 1 : 0,
            'derivalPoint'  => $options['from']['cityId'],
            'arrivalPoint'  => $options['to']['cityId'],
            'arrivalDoor'   => $options['deliveryTo'] ? 1 : 0,
            'sizedVolume'   => $options['order']['total']['volume'],
            'sizedWeight'   => $options['order']['total']['weight'],
            'statedValue'   => $options['order']['total']['price'],
            'direction'     => 0
            
        );
        $params = http_build_query($params);
        $response = $this->sendRequest($data, $params);
        if (!$response) {
            return array(
                 'errors' => true,
                 'msg' => self::NO_RESPONSE
             );
        }
        $response = new \SimpleXMLElement($response);
        $days = array();
        if (!isset($response->price)){
            return array(
                'errors' => true,
                'msg' => (string)$response->error
            );
        }
            $cost = (string)$response->price;
            $curDate = new \DateTime(date('d-m-Y'));
            foreach($response->time->part as $day) {
                if (preg_match('/(\d{1,2}).(\d{1,2}).(\d{2,4})/',(string)$day, $matches)) {
                    $date = new \DateTime($matches[0]);
                    $diff = $curDate->diff($date);
                    $diff = ($diff->days) ? abs($diff->days) : 1;
                    $days[] = $diff;
                }
            }
            
        if (count($days)) {
            $days = array('days'=> array('minDays'=> $days[0], 'maxDays' => (isset($days[1])) ? $days[1] : $days[0]));
        } else {
            $days = array('days'=> array('minDays'=> 1, 'maxDays' => 1));
        }
        
        if (!$options['deliveryFrom'] && !$options['deliveryTo'] && $options['to']['cityId'] == $options['from']['cityId']) {
            $cost = 0;
        }
        $answer = array('cost' => round($cost, 2, PHP_ROUND_HALF_UP), 'packages' => 1);
        $answer += $days;

        return $answer;
    }
    /**
     * (13:11:12) Резников Вадим - 6007: 14-00103064986
       (13:11:21) Резников Вадим - 6007: 14-00103065175
       (13:11:28) Резников Вадим - 6007: 14-01223017850
       (13:11:32) Калюжный Николай: спасибо
       (13:11:40) Резников Вадим - 6007: 14-01223017831
     * @param type $options
     * @return type
     */
    public function trackPackage($options)
    {
        $data = $this->params['operation'][__function__];
        
        $answer = array();
        foreach($options['trackNums'] as $key => $trackNum) {
            $params = array(
                'rwID' => $key
            );
            $response = $this->sendRequest($data, $params);
            if (!$response) {
                continue;
            }
            $response = new \SimpleXMLElement($response);
            $state = (string)$response->header;
            //$answer[$key] = self::IS_DONE;
            
            if ($state == self::ARRIVED) {
                $answer[$key] = self::IS_READY_TO_ISSUE;
            } elseif ($state == self::ISSUED) {
                $answer[$key] = self::IS_DONE;
            } elseif ($state == self::IN_PROCCESS) {
                $answer[$key] = self::IS_IN_PROCESS;
            }
        }

        return $answer;
    }

    public function sendRequest($data, $params = null)
    {
        $request = new \cURL\Request($data['uri']);
        $request->getOptions()
                ->set(CURLOPT_HEADER, false)
                ->set(CURLOPT_TIMEOUT, 5)
                ->set(CURLOPT_RETURNTRANSFER, true)
        ;
        if (count($params)) {
            $request->getOptions()
                    ->set(CURLOPT_POST, TRUE)
                    ->set(CURLOPT_POSTFIELDS, $params)
            ;
        }
        
        $response = $request->send();
        $result = $response->getContent();

        return $result;
    }
}