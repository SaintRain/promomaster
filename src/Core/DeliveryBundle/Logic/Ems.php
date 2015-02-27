<?php

/**
 * Класс для api EMS
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Logic;

/**
 * @see http://www.emspost.ru/ru/corp_clients/dogovor_docements/api/
 * @todo method trackPackage
 */
class Ems implements DeliveryInterface {

    const WEIGHT_LIMIT = 31.5;

    /**
     * Ограничение по сумме руб.
     */
    const PRICE_LIMIT = 50000;

    private $params;

    public function __construct($params)
    {
        $this->params = $params;
    }
     
    public function getCities($options = null)
    {
        $data = $this->params['operation'][__function__];
        $params = array(
            'type' => 'russia',
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
            $cities[$key]['cityId'] = $city['value'];
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
        
        // не превышает ли ни одна из посылок лимитов
        if (!$this->getLimitRate($options['order']['package'], self::WEIGHT_LIMIT)) {
            return $answer = array(
                'errors' => false,
                'msg' => 'Превышен лимит веса '. self::WEIGHT_LIMIT . 'кг'
            );
        }
        
        $packages = array();
        $i = 0;
        
        foreach($options['order']['package'] as $order) {
            for($j = 0, $len = $order['quantity']; $j < $len; $j++) {
                if (!isset($packages[$i]['weight']) || ($packages[$i]['weight'] + $order['weight']) >= self::WEIGHT_LIMIT) {
                    $i++;
                    $packages[$i]['weight'] = $order['weight'];
                    $packages[$i]['volume'] = $order['volume'];
                    $packages[$i]['price'] = $order['price'];
                } else {
                    $packages[$i]['weight'] += $order['weight'];
                    $packages[$i]['volume'] += $order['volume'];
                    $packages[$i]['price'] += $order['price'];
                }
            }
        }
        $data = $this->params['operation'][__function__];
        $uri = $data['uri'];
        $answer = array();
        $isError = false;
        
        foreach($packages as $key => $package) {
            $params = array(
                'from' => $options['from']['cityId'],
                'to' => $options['to']['cityId'],
                'price' => $package['price'],
                'weight' => $package['weight']
            );

            $data['uri'] = $data['uri']. '&' . http_build_query($params);
            $response = $this->sendRequest($data);
            $data['uri'] = $uri;
            
            if (!$response) {
                $isError = true;
                break;
            }
            $response = json_decode($response, true);
            if ($response['rsp']['stat'] != 'ok') {
                $isError = true;
                break;
            }
            $answer['cost'] = (isset($answer['cost'])) ? (float)($answer['cost'] + $response['rsp']['price']) : (float)$response['rsp']['price'];
            if (!isset($answer['days']['minDays']) || $response['rsp']['term']['min'] < $answer['days']['minDays']) {
                $answer['days']['minDays'] = (int)$response['rsp']['term']['min'];
            }
            if (!isset($answer['days']['maxDays']) || $response['rsp']['term']['max'] > $answer['days']['maxDays']) {
                $answer['days']['maxDays'] = (int)$response['rsp']['term']['max'];
            }
            
        }
        if ($isError) {
            return $answer = array(
                'errors' => false,
                'msg' => self::CITY_NOT_FOUND
            );
        }

        $answer += array('packages' => count($packages));
        return $answer;
    }

    /**
     * @deprecated обрабатывается через почту России
     * @see postRu
     * @param type $options
     * @return boolean
     */
    public function trackPackage($options)
    {
        throw new \Exception('Не обходимо использовать почту России');
    }
    
    public function sendRequest($data, $params = null)
    {
        $request = new \cURL\Request($data['uri']);
        $request->getOptions()
                ->set(CURLOPT_HEADER, false)
                ->set(CURLOPT_TIMEOUT, 5)
                ->set(CURLOPT_RETURNTRANSFER, true)
        ;
        if (count($params) ) {
            $request->getOptions()
                ->set(CURLOPT_POST, TRUE)
                ->set(CURLOPT_POSTFIELDS, $params)
            ;
        }
        $response = $request->send();

        return $response->getContent();
    }

    /**
     * Подсчет превышаен ли лимит для одной из посылок
     * @param array $data - исходный массив
     * @param numeric $limit - лимит
     * @param string $cellName - имя ячейки(ключ)
     * @return boolean
     */
    private function getLimitRate($data, $limit, $cellName = 'weight')
    {
        $temp = array();
        foreach($data as $val) {
            if (!isset($val[$cellName])) {
                throw new \Exception('Данного ключа не существует в масиве');
            }
            $temp[] = $val[$cellName];
        }
        return (max($temp) > $limit) ? false : true;
    }

}