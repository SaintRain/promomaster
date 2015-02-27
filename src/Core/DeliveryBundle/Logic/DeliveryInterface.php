<?php

/**
 * Интерфейс для доставок
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Logic;

interface DeliveryInterface {

    const CITY_NOT_FOUND = "Выбранный способ доставки в указанный вами город невозможен.\n\rСвяжитесь с менеджером интернет магазина.";

    // константы соотвествуют именам свойств сущность Waybills
    const IS_SENT = 'isSent';
    
    const IS_IN_PROCESS = 'isInProccess';

    const IS_DONE = 'isDone';

    const IS_READY_TO_ISSUE = 'isReadyToIssue';
    // end константы соотвествуют именам свойств сущность Waybills
    
    /**
     * География обслуживания
     * @param array $options
     */
    public function getCities($options = null);

    /**
     * Подсчет стоимость посылки
     * @param array $options
     */
    public function calculate($options);

    /**
     * Отслеживание статуса посылок
     * @param array $options
     */
    public function trackPackage($options);
    
    /**
     * Отправлять
     * @param array $params - данные для формирования тела запроса
     * @param array $data - данные которые не нужны в теле запроса
     */
    public function sendRequest($data, $params = null);

}
