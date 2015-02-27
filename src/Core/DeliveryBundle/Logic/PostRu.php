<?php

/**
 * Класс для api Почта Росии
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Logic;

/**
 * @see http://www.postcalc.ru/api.html
 * @see https://kabinet.pecom.ru/api/v1/
 *
 */
class PostRu implements DeliveryInterface {

    const ARRIVED = 2;

    const ISSUED = 1;
    
     /**
      * Ограничение по весу (кг)
      */
     const WEIGHT_LIMIT = 100;

     /**
      * Ограничение по сумме руб.
      */
     const PRICE_LIMIT = 100000;

     /**
      * Конфигурационные данные
      * @var type
      */
     private $params;


    public function __construct($params)
    {
        $this->params = $params;
    }

    /**
     * @todo узнать где берут почтовые идексы
     * @param type $options
     */
    public function getCities($options = null)
    {
        return array();
    }
    /**
     * weightLimit = 100 кг
     * insurance - страхование
     * priceLimit = 100 тыс. рублей.
     * @todo Необходимо ли указывать оценочную стоимость
     * @param type $options
     */
    public function calculate($options)
    {
        $packages = array();
        $i = 0;
        
        // не превышает ли ни одна из посылок лимитов
        if (!$this->getLimitRate($options['order']['package'], self::WEIGHT_LIMIT) || !$this->getLimitRate($options['order']['package'], self::PRICE_LIMIT,'price')) {
            return $answer = array(
                'errors' => false,
                'msg' => 'Превышен лимит веса '. self::WEIGHT_LIMIT . 'кг'
            );
        }
        // Группируем посылки по лимиту
        foreach($options['order']['package'] as $order) {
            for($j = 0, $len = $order['quantity']; $j < $len; $j++) {
                if ((!isset($packages[$i]['weight']) || (($packages[$i]['weight'] + $order['weight']) >= self::WEIGHT_LIMIT) || (($packages[$i]['price'] + $order['price']) >= self::PRICE_LIMIT))) {
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

        $answer = array();
        $isError = false;
        $data = $this->params['operation'][__function__];
        $uri = $data['uri'];
        foreach($packages as $package) {
            $params = array(
                'f'     => (isset($options['from']['cityId'])) ? $options['from']['cityId'] : strtoupper($options['from']['cityName']),
                't'     => (isset($options['to']['cityId'])) ? $options['to']['cityId'] : $options['to']['cityName'],
                'v'     => $package['price'],
                'w'     => ($package['weight'] * 1000), // необходимо передавать в граммах
                'd'     => date('Y-m-d'),
                's'     => '0',
                'c'     => 'RU',
                'o'     => 'json',
                'cs'    => 'UTF-8'
            );
            $data['uri'] = $data['uri']. '?' . http_build_query($params);

            $response = $this->sendRequest($data);
            //$response =  file_get_contents(__DIR__.'/../Resources/public/post_ru.txt');
            $data['uri'] = $uri;

            if (!$response) {
                $isError = true;
                break;
            }
            if (substr($response,0,3) == "\x1f\x8b\x08" ) {
                $response = gzinflate(substr($response,10,-8));
            } 
            $response = json_decode($response, true);
            if ($response['Status'] == 'OK') {
                if($response['Отправления']['ЦеннаяПосылка']['Доставка']) {
                    $response = $response['Отправления']['ЦеннаяПосылка'];
                } elseif ($response['Отправления']['ЦеннаяАвиаПосылка']['Доставка']) {
                    $response = $response['Отправления']['ЦеннаяАвиаПосылка'];
                } else {
                    $isError = true;
                    break;
                }
                $cost = $response['Доставка'];
                //$cost += $response['Страховка'];

                $daysTmp = explode('-', $response['СрокДоставки']);
                $days['minDays'] = (isset($daysTmp[1])) ? (int)$daysTmp[0] : (int)$daysTmp[0];
                $days['maxDays'] = (isset($daysTmp[1])) ? (int)$daysTmp[1] : (int)$daysTmp[0];

                if(isset($options['order']['total']['cashOnDelivery']) && $options['order']['total']['cashOnDelivery']) {
                    $cost += $response['НаложенныйПлатеж'];
                }
                $cost += 60; // добавляем 60 руб. за упаковку (по просьбе Сергея Бузулукина)

                $answer['cost'] = (isset($answer['cost'])) ? ($cost + $answer['cost']) : $cost;
                $answer['packages'] = (isset($answer['packages'])) ? (int)($response['Количество'] + $answer['packages']) : (int)$response['Количество'];
            } else {
                $isError = true;
                $answer = array(
                    'errors' => false,
                    'msg' => $response['Message']
                );
                break;
            }
            
        }
        if ($isError) {
            return $answer;
        }
        $answer['cost'] = round($answer['cost'], 2, PHP_ROUND_HALF_UP);
        $answer += array('days'=> $days);
        return $answer;
    }

    public function trackPackage($options)
    {
        $data = $this->params['operation'][__function__];

        $answer = [];
        foreach($options['trackNums'] as $key => $trackNum) {
            
            $params = array(
                'historyRequest' => array(
                    'Barcode' => $key,
                    'MessageType' => 0
                ),
                'AuthorizationHeader' => array(
                    'login' => $options['auth']['client'],
                    'password' => $options['auth']['clientKey'],
                    'mustUnderstand' => true
                )
            );
            
            $response = $this->sendRequest($data, $params);
            if (!$response || !is_object($response) || !isset($response->historyRecord)) {
                continue;
            }
            
            $lastRecord = array_pop($response->historyRecord);
            $stateId = $lastRecord->OperationParameters->OperAttr->Id;
            
            if ($stateId == self::ARRIVED) {
                $answer[$key] = self::IS_READY_TO_ISSUE;
            } elseif($stateId == self::ISSUED) {
                $answer[$key] = self::IS_DONE;
            }
        }
        
        return $answer;
    }

    public function sendRequest($data, $params = null)
    {
        if ($data['soap']) {
            $client = new \SoapClient($data['uri'],array(
					'trace' => true,
					'exceptions' => true,
					'soap_version' => SOAP_1_1,
					'connection_timeout' => 10,
					'encoding' => 'UTF-8',
					'cache_wsdl' => WSDL_CACHE_NONE,
					'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP
				));
            $args = [];
            foreach($params as $name => $param) {
                $obj = new \StdClass();
                foreach ($param as $key => $val) {
                    $obj->$key = $val;
                }
                $args[] = new \SoapParam($obj, $name);
            }
            try {
               $content = $client->__soapCall($data['method'], $args);
            } catch(\Exception $e) {
               $content = $e->getMessage();
            }
        } else {
            $request = new \cURL\Request($data['uri']);
            $request->getOptions()
                    ->set(CURLOPT_HEADER, false)
                    ->set(CURLOPT_TIMEOUT, 30)
                    ->set(CURLOPT_RETURNTRANSFER, true)
            ;
            if ($params) {
                $request->getOptions()
                    ->set(CURLOPT_POST, TRUE)
                    ->set(CURLOPT_POSTFIELDS, $params)
                ;
            }
            
            $response = $request->send();
            $content = $response->getContent();
        }

        return $content;
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