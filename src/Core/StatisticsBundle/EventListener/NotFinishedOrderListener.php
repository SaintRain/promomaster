<?php

/**
 * Класс подпиcчик для не завершенных заказов
 * @author  Kaluzhny.N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\EventListener;

use Core\StatisticsBundle\Event\NotFinishedOrderEvent;
use Core\StatisticsBundle\Logic\NotFinishedOrderLogic;

class NotFinishedOrderListener
{
    protected $notFinishedOrderLogic;

    public function __construct(NotFinishedOrderLogic $notFinishedOrderLogic)
    {
        $this->notFinishedOrderLogic = $notFinishedOrderLogic;
    }

    public function onNotFinishedOrderCreateUpdate(NotFinishedOrderEvent $event)
    {
        $result = $event->getResult();
        $this->notFinishedOrderLogic->createUpdate($result);

    }

    public function onNotFinishedOrderDelete(NotFinishedOrderEvent $event)
    {
        $result = $event->getResult();
        $this->notFinishedOrderLogic->delete($result);
    }
}
