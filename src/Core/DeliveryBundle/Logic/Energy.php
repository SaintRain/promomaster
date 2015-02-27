<?php

/**
 * Интерфейс для доставок
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Logic;

/**
 * @see http://www.emspost.ru/ru/corp_clients/dogovor_docements/api/
 * @see http://api.nrg-tk.ru/api/rest/
 */
// 4732 - Воронеж
// 495 - МОСКВА
class Energy implements DeliveryInterface {

    const ARRIVED = 'На складе';

    const ISSUED = 'Выдана';

    private $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function getCities($options = null)
    {
        $data = $this->params['operation'][__function__];
        $params = array(
            'type' => 'cities',
            'plain' => 'true'
        );

        $data['uri'] .= '&'. http_build_query($params);
        $response = $this->sendRequest($data);
        if (!$response) {
            return false;
        }
        $response = json_decode($response, true);
        if ($response['rsp']['stat'] != 'ok') {
            return false;
        }
        $cities = array();
        foreach($response['rsp']['locations'] as $key => $city) {
            $cities[$key]['cityId'] = $city['id'];
            $cities[$key]['cityName'] = $city['name'];
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
            'from' => $options['from']['cityId'],
            'to' => $options['to']['cityId'],
            'weight' => $options['order']['total']['weight'],
            'volume' => $options['order']['total']['volume'],
            'place' => 1
        );

        $data['uri'] .= '&' . http_build_query($params);
        $response = $this->sendRequest($data);
        if (!$response) {
            return $answer = array(
                'errors' => false,
                'msg' => self::CITY_NOT_FOUND
            );
        }
        $response = json_decode($response, true);
        if ($response['rsp']['stat'] != 'ok') {
            return $answer = array(
                'errors' => false,
                'msg' => self::CITY_NOT_FOUND
            );
        }
        $cost = 0;
        $days = array();
        foreach($response['rsp']['values'] as $key => $val) {
            if (!$cost || $val['price'] < $cost) {
                $cost = $val['price'];
                if (preg_match('/(\d+)(-(\d+))*/', $val['term'], $matches)) {
                    $matches = explode('-',$matches[0]);
                    $days = array('minDays'=> (int)$matches[0],
                                                    'maxDays'=> (isset($matches[1])) ? (int)$matches[1] : 15
                                            );
                } else {
                    $days = array('minDays'=> 1, 'maxDays'=> 15);
                }
            }
        }
        $answer = array('cost' => round($cost, 2), 'days'=> $days, 'packages' => 1);
        
        return $answer;
    }

    public function trackPackage($options)
    {
        $answer = array();
        
        $data = $this->params['operation'][__function__];
        $uri = $data['uri'];
        
        foreach($options['trackNums'] as $key => $trackNum) {
            $params = array(
                'idcity' => $trackNum['cityId'],
                'numdoc' => $key
            );
            //ld($params);
            $data['uri'] .= '&' . http_build_query($params);
            $response = $this->sendRequest($data);
            
            if (!$response) {
                continue;
            }
            $response = json_decode($response, true);
            if ($response['rsp']['stat'] != 'ok') {
                continue;
            }
            
            if (isset($response['rsp']['info']['cur_state'])) {
                $status = $response['rsp']['info']['cur_state'];
                if (strpos($status, self::ISSUED) !== FALSE) {
                    $answer[$key] = self::IS_DONE;
                } elseif (strpos($status, self::ARRIVED) !== FALSE) {
                    $answer[$key] = self::IS_READY_TO_ISSUE;
                }
            }
            $data['uri'] = $uri;
        }
        
        return $answer;
    }

    /**
     * @param type $data
     * @param type $params
     * @return type
     */
    public function sendRequest($data, $params = null)
    {
        $request = new \cURL\Request($data['uri']);
        $request->getOptions()
                ->set(CURLOPT_HEADER, false)
                ->set(CURLOPT_TIMEOUT, 5)
                ->set(CURLOPT_RETURNTRANSFER, true)
        ;
        if ($params) {
            $request->getOptions()
                ->set(CURLOPT_POST, TRUE)
                ->set(CURLOPT_POSTFIELDS, $params)
            ;
        }
        $response = $request->send();

        return $response->getContent();
    }

    /**
     * Получить данные для заданной операции
     * @param string $operation
     * @param string $method
     * @return array
    
    private function getOperationInfo($operation, $method = null)
    {
        $defaultData =  array(
            'affiliate' => array(
                'uri' => 'http://api.nrg-tk.ru/api/rest/',
            ),
            'calculate' => array(
                'uri' => 'http://api.nrg-tk.ru/api/rest/'
            ),
            'trackPackage' => array(
                'uri' => 'http://nrg-tk.ru/tracking.php'
            )
        );
        return $defaultData[$operation];
    }

    /**
     * Установка опций
     * @param type $options
     
    public function setOptions($options)
    {
        $options = $options;
    }
     * 
     */
}