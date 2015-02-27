<?php

/**
 * Интерфейс для работы с производственным календарем
 * @author  Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OfficeWorkTimeBundle\Logic;

interface ScheduleInterface
{
    const NEXT_YEAR = 1;
    const NO_RESPONSE = 'msg.no_response';
    const NO_YEAR = 'msg.no_year';
    
    /**
     * Получить расписание
     */
    public function getSchedule();

    /**
     * Отправка запроса
     * @param array $data
     */
    public function sendRequest(array $data);

}