<?php

/**
 * Класс для api Первая Экспедиционная Компания
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Logic;

/**
 * @see http://www.jde.ru/form/calc/simple
 * @see http://www.jde.ru/calc
 */
class JelDor implements DeliveryInterface {

    /**
     * Разделитель для номера накладной
     */
    const DELIMETER = 'пинкод';

    const ISSUED = 'Груз выдан';

    const ARRIVED = 'Груз прибыл в филиал';

    const NO_RESPONSE = 'ошибка при запросе';

    private $params;

    public function __construct($params)
    {
        $this->params = $params;
    }
    
    /**
     * @todo При необходимости реализовать метод
     * @see http://symfony.com/doc/current/components/dom_crawler.html
     * @return array
     */
    public function getCities($options = null)
    {
        return array();
        
        $data = $this->params['operation'][__function__];
        $response = $this->sendRequest(array(), $data);
        if (!$response) {
            return false;
        }

    }

    public function calculate($options)
    {
        $data = $this->params['operation'][__function__];
        $data['headers'] = array('X-Requested-With: XMLHttpRequest');
        $params = array(
            'Ffrom'                     => $options['from']['cityName'],
            'Fto'                       => $options['to']['cityName'],
            'from'                      => $options['from']['cityName'],
            'notBulky'                  =>'true',
            'notBulkySizeToggle'        =>'false',
            'notBulky_Oversize_Volume'  => ($options['order']['total']['volume'] < 0.001) ? 0.001 : $options['order']['total']['volume'],
            'notBulky_Oversize_Weight'  =>$options['order']['total']['weight'],
            'script'                    =>'on',
            'to'                        =>$options['to']['cityName'],
            // если нет терминала в данном городе
            // то доставка от ближайшего
            //'destination'=>'true',
            //'destination_to'=>'Москаленки'
        );
        
        $response = $this->sendRequest($data, $params);
        
        $response = json_decode($response);
        if (!$response) {
            return array(
                'errors' => true,
                'msg' => self::NO_RESPONSE
            );
        }
        $days = array();
        if (preg_match('/(\d+)-(\d+)/',$response->CALCULATION->TIMETEXT, $matches)) {
            $days = explode('-', $matches[0]);
        }

        $price = ($response->CALCULATION->SUM) ? $response->CALCULATION->SUM : null;
        $minDays = (isset($days[0])) ? (int)$days[0] : 1;
        $maxDays = (isset($days[1])) ? (int)$days[1] : $minDays;
        $answer = array('days'      => array(
                                    'minDays'   => $minDays,
                                    'maxDays'   => $maxDays,
                                    ),
                        'cost'      => (float)$price,
                        'packages'  => 1
                        );
        return $answer;
    }
    /**
     * @todo Правильно ли здесь использовать имя города
     * а не его id (в данном случае id - имя + плюс область)
     * @return array
     */
    public function trackPackage($options)
    {
        $data = $this->params['operation'][__function__];
        $data['cookieFile'] = __DIR__.'/../Resources/public/jde.txt';
        
        $answer = array();

        foreach($options['trackNums'] as $key => $trackNum) {
            $regExp = $this->getRegExp($trackNum['cityName']);
            $ttnPin = explode(self::DELIMETER, strtolower($key));
            $params = array(
                'ttn' => trim($ttnPin[0]),
                'pin' => trim($ttnPin[1])
            );
            $params = http_build_query($params);
            $response = $this->sendRequest($data, $params);
            if (!$response) {
                continue;
            }
            // преобразуем ответ к UTF-8 кодировке
            if (preg_match('/charset="([a-zA-Z0-9-]+)"/',$response, $matches)) {
                $response = iconv($matches[1], 'UTF-8', $response);
            }
            if (!$response) {
                continue;
            }
            
            if (preg_match($regExp[self::ISSUED], $response, $matches)) {
                $answer[$key] = self::IS_DONE;
            } elseif (preg_match($regExp[self::ARRIVED], $response, $matches)) {
                $answer[$key] = self::IS_READY_TO_ISSUE;
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
        if ($params) {
            $request->getOptions()
                ->set(CURLOPT_POST, TRUE)
                ->set(CURLOPT_COOKIESESSION, true)
                ->set(CURLOPT_FOLLOWLOCATION, true)
                ->set(CURLOPT_POSTFIELDS, $params)
            ;
        }
        if (isset($data['headers'])) {
            $request->getOptions()
                ->set(CURLOPT_HTTPHEADER, $data['headers'])
            ;

        }
        if (isset($data['cookieFile'])) {
            $request->getOptions()
                ->set(CURLOPT_COOKIEFILE, $data['cookieFile'])
                ->set(CURLOPT_COOKIEJAR, $data['cookieFile'])
            ;
        }
        $response = $request->send();

        return $response->getContent();
    }

    /**
     * Регулярные выражения по константам
     * состояния перевозки
     * @param array $cityName - название города
     * @return array
     */
    private function getRegExp($cityName)
    {
        $regexp = array();
        $regexp[self::ISSUED] = '/' . $cityName . '.+'. self::ISSUED .'/iu';
        $regexp[self::ARRIVED] = '/' . $cityName . '.+'. self::ARRIVED .'/iu';
        
        return $regexp;
    }

}