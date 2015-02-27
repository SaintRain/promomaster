<?php

/**
 * Класс-подписчик на события для сохранения товарной единицы
 * Открепляет от заказа
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Core\LogisticsBundle\Entity\UnitInStock;

class UnitInStockSubscriber implements EventSubscriber {

    private $service_container;

    public function __construct($service_container) {
        $this->service_container = $service_container;
    }

    public function getSubscribedEvents() {
        return array(
            'preUpdate',
            'prePersist'
        );
    }

    public function prePersist(LifecycleEventArgs $args) {
        $this->preUpdate($args);
    }

    public function preUpdate(LifecycleEventArgs $args) {
        $obj = $args->getEntity();

        if ($obj instanceof UnitInStock) {
            $this->service_container->get('core_logistics_logic')->returnSoldUnit($obj);
        }
    }

}
