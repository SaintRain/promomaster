<?php

namespace Core\OfficeWorkTimeBundle\Logic;

use Doctrine\ORM\EntityManagerInterface;
use Core\OfficeWorkTimeBundle\Entity\Schedule;
use Core\ConfigBundle\Logic\ConfigLogic;

class OfficeWorkTimeLogic
{
    protected $parameters;
    
    protected $service;

    protected $em;

    protected $configLogic;

    public function __construct(array $parameters, $services, EntityManagerInterface $em, ConfigLogic $configLogic)
    {
        $this->parameters = $parameters;
        $this->service = $this->getService($services);
        $this->em = $em;
        $this->configLogic = $configLogic;
    }

    /**
     * Записываем все дни в БД или обновляем
     * @return void
     * @throws \Exception
     */
    public function getSchedule()
    {
        $days = $this->service->getSchedule();
        if (!$days['result'] || !count($days['data'])) {
            return null;
        }
        $datesFromDb = $this->em->getRepository('CoreOfficeWorkTimeBundle:Schedule')->findAll();
        $datesTemp = [];
        foreach ($datesFromDb as $val) {
            $datesTemp[$val->getDateTime()->format('Y-m-d')] = $val;
        }
        $this->em->beginTransaction();
        try {
            foreach($days['data'] as $date => $value) {
                if (!isset($datesTemp[$date])) {
                    $schedule = new Schedule();
                    $dateTime = new \DateTime($date);
                    $schedule->setType($value)
                        ->setDateTime($dateTime)
                    ;
                    $this->em->persist($schedule);
                } elseif (isset($datesTemp[$date]) && ($datesTemp[$date]->getType() != $value)) {
                    $datesTemp[$date]->setType($value);
                }
            }
            $this->em->flush();
            $this->em->commit();
        } catch(Exception $e) {
            $this->em->rollback();
            throw $e;
        }
    }

    /**
     * Получить текущий статус офиса
     * @return array
     */
    public function getState()
    {
        $answer = [];
        $dz = new \DateTimeZone($this->parameters['timezone']);
        $now = new \DateTime('now', $dz);
        $dateStr = $now->format('Y-m-d');
        $dateTimeToCheck = new \DateTime(sprintf('%s 00:00', $dateStr));
        $datesFromDb = $this->em->getRepository('CoreOfficeWorkTimeBundle:Schedule')->findOneBy(['dateTime' => $dateTimeToCheck]);
        if ($datesFromDb && $datesFromDb->getType() == 1) {
            $answer = [
                'isClosed' => 1,
                'isWeekend' => 1,
                'isLastHour' => 0,
                'msg' => 'msg.not_work_time'
            ];
        } else {
            $curTime = strtotime($now->format('Y-m-d H:i'));
            $workHours = $this->getWorkHours($dateStr);
            if ($curTime < $workHours['startTime']  || $curTime > $workHours['endTime']) {
                $answer = [
                    'isClosed' => 1,
                    'isLastHour' => 0,
                    'msg' => 'msg.not_work_time'
                ];
            } elseif (($workHours['endTime'] - $curTime) < (60*60)) {
                $answer = [
                    'isClosed' => 0,
                    'isLastHour' => 1,
                    'msg' => 'msg.time_till_close',
                    'minutes' => ($workHours['endTime'] - $curTime) / 60
                ];
            } else {
                $answer = [
                    'isClosed' => 0,
                    'isLastHour' => 0,
                    'msg' => 'msg.work_time',
                ];
            }

            $answer['time']['now'] = $curTime;
            $answer['time'] += $workHours;
        }
        
        return $answer;
    }


    /**
     * Получить время начала и окончания работы
     * @param type $dateStr
     * @return array
     * @throws \Exception
     */
    private function getWorkHours($dateStr)
    {
        $officeWorkTime = $this->configLogic->get('office-work-time');
        if (!$officeWorkTime) {
            throw new \Exception('Config parameter for time office-work-time not found');
        }
        $timeArr = explode('-', $officeWorkTime);
        if (count($timeArr) < 2) {
            throw new \Exception('Config parameter office-work-time must be in format hh:mm-hh:mm');
        }
        if (!preg_match('/\d\d\:\d\d/', $timeArr[0]) || !preg_match('/\d\d\:\d\d/', $timeArr[1])) {
            throw new \Exception('Config parameter office-work-time must be in format hh:mm-hh:mm');
        }
        return [
            'startTime' => strtotime(sprintf('%s %s:00', $dateStr, $timeArr[0])),
            'endTime'   => strtotime(sprintf('%s %s:00', $dateStr, $timeArr[1]))
        ];
    }

    /**
     * Выбираем нужный нам сервис для работы
     * @param type $services
     * @return type
     * @throws \Exception
     */
    private function getService($services)
    {
        $service = null;
        foreach ($services as $key => $val) {
            if (!isset($this->parameters['options'][$key])) {
                throw new \Exception(sprintf('Service with name %s not found in core_office_work_time options', $key));
            }
            if ($this->parameters['uri'] == $this->parameters['options'][$key]['uri']) {
                $service = $val;
                break;
            }
        }
        if (!$service) {
            throw new \Exception(sprintf('Service that has uri \'%s\' not found in core_office_work_time', $this->parameters['uri']));
        }
        return $service;
    }

}
