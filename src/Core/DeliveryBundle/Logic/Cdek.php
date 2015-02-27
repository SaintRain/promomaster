<?php

/**
 * Класс для api СДЭК
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

/**
 * Обеспечение страховой защиты посылки.
 * Размер дополнительного сбора страхования вычисляется от размера объявленной стоимости отправления.
 * Важно: Услуга начисляется автоматически для всех заказов ИМ, не разрешена для самостоятельной передачи в тэге AddService.
 */
namespace Core\DeliveryBundle\Logic;

use Core\DeliveryBundle\Entity\Affiliate;
/**
 * @see http://www.edostavka.ru/integrator/]
 * @link http://www.edostavka.ru/shema-raboty/ ценник доп услуг
 * @todo привязать статусы доставок заказа
 * @todo статусы заказов разрулить
 * @todo
 * integrator@cdek.ru
 */
// 506 - Воронеж
// 44 - Москва

class Cdek implements DeliveryInterface {

    const CALC_VERSION = '1.0';

    const ARRIVED = 12;

    const ISSUED = 4;

    const NO_RESPONSE = 'ошибка при запросе';

    const AUTH_EMPTY = 'ключ не найден';

     /**
      * Максимальный период
      * за который можно получить
      * статусы доставок
      */
     const MAX_STATUS_PERIOD = '-1 month';

     /**
      * Процентная ставка наложного платежа 3%
      */
     const CASH_ON_DELIVERY = '0.03';

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
         $params = array(
             'account'  => $options['auth']['client'],
             'secure'   => md5(date('Y-m-d') . '&'. $options['auth']['clientKey']),
         );
         $params = '?'. http_build_query($params);
         $data['uri'] .= $params;
         $response = $this->sendRequest($data);
         if (!$response) {
             return false;
         }

         $response  = new \SimpleXMLElement($response);
         $cities = array();

         foreach($response->Pvz as $pvz) {
             $pvz = (array)$pvz;
             $cities[$pvz['@attributes']['CityCode']]['cityId'] = (int)$pvz['@attributes']['CityCode'];
             $cities[$pvz['@attributes']['CityCode']]['cityName'] = $pvz['@attributes']['City'];
         }
         return $cities;
     }


     public function getAffiliates($options = null)
     {
         $data = $this->params['operation'][__function__];
         $params = array(
             'account'  => $options['auth']['client'],
             'secure'   => md5(date('Y-m-d') . '&'. $options['auth']['clientKey']),
         );
         $params = '?'. http_build_query($params);
         $data['uri'] .= $params;
         $response = $this->sendRequest($data);
         if (!$response) {
             return false;
         }

        $response  = new \SimpleXMLElement($response);
        $cities = array();
        $citiesId = array();
        $stdArr = array();
        foreach($response->Pvz as $pvz) {
            $pvz = (array)$pvz;
            $string = $pvz['@attributes']['City'] . ', ' . $pvz['@attributes']['Name'] . ' (' . $pvz['@attributes']['Address'] . ')';
            $cities[$pvz['@attributes']['Code']] = $string;
            $citiesId[$pvz['@attributes']['Code']] = $pvz['@attributes']['CityCode'];
            $stdObj = new Affiliate();
            $stdObj->setId($pvz['@attributes']['Code'])
                    ->setCaptionRu($string)
                    ->setCityCode($pvz['@attributes']['CityCode'])
            ;
            $stdArr[$pvz['@attributes']['Code']] = $stdObj;
        }
        
        return ['choices' => $cities, 'cittiesId' => $citiesId, 'stdObj' => $stdArr];
     }

    /**
     * Калькулятор стоимости
     * @param array $options
     * @return array
     * @throws Exception
     * modeId см. приложение 2
     * 1 = дверь - дверь
     * 2 = дверь - склад
     * 3 = склад - дверь
     * 4 = склад - склад
     */
    public function calculate($options)
    {
        if (!count($options['auth'])) {
            return array(
                'errors' => true,
                'msg' => self::AUTH_EMPTY
            );
        }
        
        if (!isset($options['to']['cityId']) || !$options['to']['cityId']) {
            return $answer = array(
                'errors' => false,
                'msg' => self::CITY_NOT_FOUND
            );
        }

        $serviceType = null;
        foreach($this->params['internalCodes'] as $code) {
            if ($options['internalCode'] == $code['id']) {
                $serviceType = $code;
                break;
            }
        }
        if (!$serviceType) {
            return array(
                'errors' => true,
                'msg' => 'Внутренний код не найден'
            );
        }
        $data = $this->params['operation'][__function__];
        $date = (isset($options['date']) && $options['date']) ? date('Y-m-d', strtotime($options['date'])) : date('Y-m-d', strtotime('+1 day'));
        $goods = array();

        foreach($options['order']['package'] as $key => $order) {
            if ($order['weight'] && $order['volume']) {
               for ($i = 0, $len = $order['quantity']; $i < $len; $i++) {
                   $goods[$key . '_' . $i]['weight'] = $order['weight'];
                   $goods[$key . '_' . $i]['volume'] = $order['volume'];
               }
            }
        }
        $params = array(
            'version'          => self::CALC_VERSION,
            'dateExecute'      => $date,
            'authLogin'        => $options['auth']['client'],
            'secure'           => md5($date . '&'. $options['auth']['clientKey']),
            'senderCityId'     => $options['from']['cityId'],
            'receiverCityId'   => $options['to']['cityId'],
            'tariffId'         => $serviceType['id'],
            'modeId'           => $serviceType['modeId'],
            'goods'            => $goods
        );
        
        $params = array('json' => json_encode($params));
        $params = http_build_query($params);
        $response = $this->sendRequest($data, $params);
        if (!$response) {
            return array(
                'errors' => true,
                'msg' => self::NO_RESPONSE
            );
        }
        $response = json_decode($response, true);
        if (isset($response['error'])) {
            $error = $response['error'][0];
            return array(
                'errors' => true,
                'msg' => $error['text']
            );
        }
        $cost = $response['result']['price'];
        if($options['cashOndelivery']) {
            $cost += ($cost + $options['order']['total']['price']) * self::CASH_ON_DELIVERY;
        }

        $answer = array(
            'cost' => (float)(round($cost, 2)),
            'days' => array(
                   'minDays' => (int)$response['result']['deliveryPeriodMin'],
                   'maxDays' => (int)$response['result']['deliveryPeriodMax']
               ),
            'packages' => 1
        );
        return $answer;
    }

     /**
      * Посылку можно отследить
      * для каждого заказчика только свою
      * @return boolean
      */
     public function trackPackage($options)
     {
        $answer = array(
            'errors' => true
        );
        $data = $this->params['operation'][__function__];
        $sellers = (isset($options['sellers'])) ? $options['sellers'] : array(array('auth' => $options['auth']));
        $isFullAnswer =  (isset($options['isFullAnswer']) && $options['isFullAnswer']) ? true : false;
                
        if (isset($options['trackNums'])) {
            // посылаем через post
            foreach($sellers as $seller) {
                $seller['auth']['clientKey'] = md5(date('Y-m-d') . '&'. $seller['auth']['clientKey']);
                $xml = '<?xml version="1.0"?>';
                $xml .= '<StatusReport Date="'.date('Y-m-d').'" Account="'.$seller['auth']['client'].'" Secure="'.$seller['auth']['clientKey'].'" ShowHistory="1">';
                foreach($options['trackNums'] as $key => $trackNum) {
                    $xml .=  '<Order DispatchNumber="'.$key.'"/>';
                }
                $xml .= '</StatusReport>';
                $params = array('xml_request' => $xml);
                $params = http_build_query($params);
                $response = $this->sendRequest($data, $params);
                if($response) {
                    $response = new \SimpleXMLElement($response);
                    if (isset($response->Order)) {
                        $answer = $this->makeTrackAnswer($response->Order, $isFullAnswer);
                    }
                }
            }
        } else {
            // посылаем запрос через get
            $uri = $data['uri'];
            $minDate = strtotime('-1 month');
            $dateFirst = (isset($options['date']) && ($options['date'] > $minDate)) ? date('Y-m-d',($options['date'])) : date('Y-m-d', $minDate);
            foreach($sellers as $seller) {
                $data['uri'] = $uri;
                $params = array(
                    'account' => $seller['auth']['client'],
                    'secure' => md5($dateFirst . '&' . $seller['auth']['clientKey']),
                    'datefirst' => $dateFirst,
                    'showhistory' => 1
                );
                $data['uri'] .= '?' . http_build_query($params);
                $response = $this->sendRequest($data);
                if ($response) {
                    $response = new \SimpleXMLElement($response);
                    if (isset($response->Order)) {
                        $answer = $this->makeTrackAnswer($response->Order, $isFullAnswer);
                    }
                }
            }
        }

        return $answer;
     }

    public function getInvoice($options)
    {
        $answer = array();
        $data = $this->params['operation'][__function__];
        $xml = '<?xml version="1.0"?>';
        $curDate = date('Y-m-d');
        $secure = md5($curDate . '&'. $options['auth']['clientKey']);
        $trackNums = $options['order']['trackNums'];
        $xml .= '<OrdersPrint Date="' . $curDate . '" Account="' . $options['auth']['client'] . '" Secure="'. $secure .'" OrderCount="'. count($trackNums) .'">';
        $order = '';
        foreach($trackNums as $trackNum) {
            $order .= '<Order DispatchNumber="'. $trackNum .'" />';
        }
        $xml .= $order;
        $xml .= '</OrdersPrint>';
        $params = array('xml_request' => $xml);
        $params = http_build_query($params);
        $response = $this->sendRequest($data, $params);
        if(!$response) {
           $answer['errors'] = true;
           $answer['body'] = self::NO_RESPONSE;
        }
        if (strstr($response, 'PDF')) {
           $fileName = $options['company'] . '_' . $options['order']['total']['id'] . '_' . time() . '.pdf';
           //file_put_contents(__DIR__ . '/../Resources/public/' . $fileName, $response);
           $answer = array(
               'errors' => false,
               'body' => array(
                   'rawData' => $response,
                   'fileName' => $fileName
               )
           );
        } else {
           $answer['errors'] = true;
           $answer['body']['msg'] = '';
           $response = new \SimpleXMLElement($response);
           foreach($response->Order as $order) {
               $attr = $order->attributes();
               $answer['body']['msg'] .= (string)$attr['Msg'] . "\n\r";
           }
           $answer['body']['msg'] = trim($answer['body']['msg']);
        }

        return $answer;

    }
     
    /**
     * Создание заказа
     * @param type $options
     * @return array
     * Единицы измерения длина - см и вес - гр
     */
    public function createOrder($options)
    {
        if (!count($options['auth'])) {
            return array(
                'errors' => true,
                'msg' => self::AUTH_EMPTY
            );
        }
        
        foreach($this->params['internalCodes'] as $code) {
            if ($options['internalCode'] == $code['id']) {
                $serviceType = $code;
                break;
            }
        }
        if (!$serviceType) {
            return array(
                'errors' => true,
                'msg' => 'Внутренний код не найден'
            );
        }
        
        $answer = array();
        $date = isset($options['date']) ? date('Y-m-d',strtotime($options['date'])) : date('Y-m-d');
        $data = $this->params['operation'][__function__];
        $secure = md5($date . '&'. $options['auth']['clientKey']);
        if ($options['to']['terminalCode']) {
            $deliveryAddress = '<Address PvzCode="' . $options['to']['terminalCode'] . '"/>';
        } else {
            $deliveryAddress = '<Address  Street="'.$options['to']['addressDetails']['street'].'"
                           House="'.$options['to']['addressDetails']['house'].'"
                           Flat="'.$options['to']['addressDetails']['flat'].'"/>';
        }
        $xml = '<?xml version="1.0" encoding="UTF-8" ?>';
        $xml .= '<DeliveryRequest Number="'.$options['order']['total']['id'].'"
                               Date="' . $date . '"
                               Account="'.$options['auth']['client'].'"
                               Secure="'.$secure.'" OrderCount="1">';
        $xml .= '<Order Number="' . $options['order']['total']['id'] . '-' . uniqid() . '"
                       DeliveryRecipientCost="' . $options['isDeliveryIncludedInPayment'] . '"
                       SellerName="'.  htmlspecialchars($options['from']['name']).'"
                       SendCityCode="'.$options['from']['cityId'].'"
                       RecCityCode="'.$options['to']['cityId'].'"
                       RecipientEmail="'.$options['to']['email'].'"
                       RecipientName="'.$options['to']['contactFio'].'"
                       Phone="'.$options['to']['contactPhone'].'"
                       TariffTypeCode="'.$serviceType['id'].'">';
        
        $xml .= $deliveryAddress;
        $xml .= '<Package Number="1" BarCode="1" Weight="'.($options['order']['total']['weight'] * 1000).'">';

        foreach($options['order']['package'] as $item) {
            $payment = ($options['cashOndelivery']) ? $item['price'] : 0;
            $xml .= '<Item WareKey="'.$item['wareKey'].'"
                           Cost="'.$item['price'].'"
                           Payment="'.$payment.'"
                           Weight="'.$item['weight'].'"
                           Amount="'.$item['quantity'].'"
                           Comment="'.$item['title'].'"/>';
        }
        if (count($options['extraServices'])) {
            $xml .= '</Package>';
            foreach($options['extraServices'] as $val) {
                $xml .= '<AddService ServiceCode="' . $val . '"></AddService>';
            }
            $xml .= '</Order></DeliveryRequest>';
        } else {
            $xml .= '</Package></Order></DeliveryRequest>';
        }
        $params = array('xml_request' => $xml);
        $params = http_build_query($params);

        $response = $this->sendRequest($data, $params);
        if (!$response) {
           $answer['errors'] = true;
           $answer['body'] = self::NO_RESPONSE;
        } else {
            $response = new \SimpleXMLElement($response);
            if (isset($response->DeliveryRequest)) {
                $attr = $response->DeliveryRequest->attributes();
                $answer['errors'] = true;
                $answer['body'] = (string)$attr['Msg'];
            } elseif (isset($response->Order)) {
                $msg = '';
                foreach($response as $child) {
                    $attr = $child->attributes();
                    if (isset($attr['ErrorCode'])) {
                        $msg .= $attr['Msg'] . "\n\r";
                    }
                }
                if ($msg) {
                    $answer = array(
                        'errors' => true,
                        'body' => ['msg' => $msg]
                    );
                } else {
                    $attr = $response->Order->attributes();
                    $answer = array(
                        'errors' => false,
                        'body' => array('waybillNum' => (string)$attr['DispatchNumber'])
                    );
                }
                
                // печать накладной
                /*
                $attr = $response->Order->attributes();
                $options['order']['trackNums'] = array((string)$attr['DispatchNumber']);
                $answer = $this->getSticker($options);
                 * 
                 */
            }
        }
        return $answer;
     }
     
     /**
      * Отмена заказа (Удаление)
      * @todo не понятно всегда ли совпадает $order['Date] c Date для xml
      */
     public function cancelOrder($options)
     {
        $options['isFullAnswer'] = true;
        $result = $this->trackPackage($options);
        if ($result['errors']) {
            return $result;
        }

        $order = reset($result['body']);
        $order['Date'] = ($options['date']) ? $options['date'] : $order['Date'];
        $data = $this->params['operation'][__function__];
        $secure = md5($order['Date'] . '&'. $options['auth']['clientKey']);
        
        $xml = '<?xml version="1.0" encoding="UTF-8" ?>';
        $xml .= '<DeleteRequest Number="' . $order['ActNumber'] . '" Date="' . $order['Date']. '" Account="' . $options['auth']['client'] . '" Secure="' . $secure . '" OrderCount="1">';
        $xml .= '<Order Number="' . $order['Number']. '" />';
        $xml .= '</DeleteRequest>';
        $params = array('xml_request' => $xml);
        $params = http_build_query($params);
        $response = $this->sendRequest($data, $params);
        if (!$response) {
            $answer = array(
                'errors' => true,
                'body' => self::NO_RESPONSE
            );
        } else {
            $response = new \SimpleXMLElement($response);
            if (count($response) > 1) {
                echo 'bad';
                $msg = null;
                foreach($response as $child) {
                    if (!$msg) {
                        $attr = $child->attributes();
                        $msg = (string)$attr['Msg'];
                    }
                }
                $answer = array(
                    'errors' => true,
                    'body' => $msg
                );
            } else {
                $attr = $response->DeleteRequest->attributes();
                $answer = array(
                    'errors' => false,
                    'body' => (string)$attr['Msg']
                );
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
     * Формируем ответ для трекинга посылки
     * @param type $orders
     * @param type $isFullAnswer
     */
    private function makeTrackAnswer($orders, $isFullAnswer = false) {
        $answer = [];
        if ($isFullAnswer) {
            $answer['errors'] = false;
            foreach($orders as $order) {
                $order = (array)$order;
                $status = (array)$order['Status'];
                $answer['body'][$order['@attributes']['Number']]['DispatchNumber'] = $order['@attributes']['DispatchNumber'];
                $answer['body'][$order['@attributes']['Number']]['ActNumber'] = $order['@attributes']['ActNumber'];
                $answer['body'][$order['@attributes']['Number']]['Number'] = $order['@attributes']['Number'];
                $answer['body'][$order['@attributes']['Number']]['Code'] = $status['@attributes']['Code'];
                $answer['body'][$order['@attributes']['Number']]['Description'] = $status['@attributes']['Description'];
                $answer['body'][$order['@attributes']['Number']]['Date'] = $status['@attributes']['Date'];
            }
        } else {
            foreach($orders as $order) {
                $order = (array)$order;
                $status = (array)$order['Status'];
                if ($status['@attributes']['Code'] == self::ISSUED) {
                    $answer[$order['@attributes']['DispatchNumber']] = self::IS_DONE;
                } elseif ($status['@attributes']['Code'] == self::ISSUED) {
                    $answer[$order['@attributes']['DispatchNumber']] = self::IS_READY_TO_ISSUE;
                }
            }
        }

        return $answer;
        
    }

}