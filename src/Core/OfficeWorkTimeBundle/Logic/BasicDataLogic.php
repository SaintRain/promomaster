<?php

namespace Core\OfficeWorkTimeBundle\Logic;

use Symfony\Component\Translation\Translator;
use Symfony\Component\HttpFoundation\RequestStack;
/**
 * @todo реализовать поодержку переводов
 */
class BasicDataLogic implements ScheduleInterface
{
    
    protected $parameters;

    protected $translator;

    protected $requestStack;

    protected $locale;

    public function __construct(array $parameters, Translator $translator, RequestStack $requestStack)
    {
        
        if (!isset($parameters['options']['basic_data'])) {
            throw new \Exception('Parameter basic_data not found');
        }
        $this->parameters = $parameters['options']['basic_data'];
        $this->translator = $translator;
        $this->requestStack = $requestStack;
    }

    /**
     * Получить все выходные и праздничные дни за год
     * @return type
     */
    public function getSchedule()
    {
        $dateTime = new \DateTime('now');
        $year = $dateTime->format('Y') + self::NEXT_YEAR;
        $weekends = $this->getWeekends($year);
        $response = $this->sendRequest($this->parameters);
        if (!$response) {
            return [
                'result' => false,
                'msg' => $this->translator->trans(self::NO_RESPONSE,[])
            ];
        }
        $response = json_decode($response, true);
        if (!isset($response['data'][$year])) {
            return [
                'result' => false,
                'msg' => $this->translator->trans(self::NO_YEAR,[])
            ];
        }

        $data = $response['data'][$year];
        $result = $this->arrayMergeRecursive($weekends, $data);
        $result = $this->getFlatArray($result, $year);
        return [
            'result' => true,
            'data' => $result
        ];   
    }
    
    /**
     * Получить все сб, вс заданного года
     * @param int $year
     * @return array
     */
    private function getWeekends($year)
    {
        $result = [];
        $firstDayOfYear = strtotime(sprintf('01-01-%d', $year));
        $step = 24 * 60 * 60;
        $lastDayOfYear = strtotime(sprintf('31-12-%d', $year));
        $it = 0;
        for ($i = $firstDayOfYear; $i <= $lastDayOfYear; $i+= $step) {
            $moth = date('n', $i) * 1;
            if (date('N', $i) == 6 || date('N', $i) == 7) {
                $day = date('j', $i) * 1;
                $result[$moth][$day] = ['isWorking' => 2];
            }
        }

        return $result;
    }

    public function sendRequest(array $data)
    {
       $request = new \cURL\Request($data['uri']);

       $request->getOptions()
               ->set(CURLOPT_HEADER, false)
               ->set(CURLOPT_TIMEOUT, 90)
               ->set(CURLOPT_RETURNTRANSFER, true)
       ;
       $response = $request->send();

       return $response->getContent();
    }

    /**
     * Слияние масивов рекурсивно с заменой целых ключей
     * @return arrary
     */
    private function arrayMergeRecursive()
    {
        $arrays = func_get_args();
        $base = array_shift($arrays);

        foreach($arrays as $array) {
            reset($base);
            while(list($key, $value) = @each($array)) {
                if(is_array($value) && @is_array($base[$key])) {
                    $base[$key] = $this->arrayMergeRecursive($base[$key], $value);
                }
                else {
                    $base[$key] = $value;
                }
            }
        }
        
        $this->ksortRecursive($base);

        return $base;
    }

    /**
     * Сортировка многоуровневого массива
     * @param type $array
     * @return type
     */
    private function ksortRecursive(&$array) 
    {
        foreach ($array as &$value) {
            if (is_array($value)) {
                $this->ksortRecursive($value);
            }
        }

        return ksort($array);
     }
     
    /**
     * Преобразоание данных к нужному формату
     * @param type $data
     * @param type $year
     * @return int
     */
    private function getFlatArray($data, $year)
    {
        $result = [];
        foreach ($data as $month => $days) {
            $month = (strlen($month) == 1) ? sprintf('0%d', $month) : $month;
            foreach ($days as $day => $val) {
                $day = (strlen($day) == 1) ? sprintf('0%d', $day) : $day;
                if ($val['isWorking'] == 2) {
                    $type = 1;
                } elseif($val['isWorking'] == 3) {
                    $type = -1;
                } else {
                    $type = 0;
                }
                //$type = 1;
                $result[sprintf('%d-%s-%s', $year, $month, $day)] = $type;
            }
        }
        
        return $result;
    }
}
