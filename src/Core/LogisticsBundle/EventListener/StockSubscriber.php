<?php

/**
 * Класс-подписчик на события для сохранения главного склада
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Core\LogisticsBundle\Entity\Stock;

class StockSubscriber implements EventSubscriber {

    private $service_container;

    public function __construct($service_container) {
        $this->service_container = $service_container;
    }

    public function getSubscribedEvents() {
        return array(
            'postUpdate',
            'postPersist'
        );
    }

    public function postUpdate(LifecycleEventArgs $args) {
        $obj = $args->getEntity();
        if ($obj instanceof Stock) {
            $em = $args->getEntityManager();
            $uow = $em->getUnitOfWork();
            $uow->computeChangeSets();
            $res = $uow->getEntityChangeSet($obj);
            //если статус "Главный склад" поменялся
            if (isset($res['isGeneralStock']) && $obj->getIsGeneralStock()) {
                $em->getRepository('Core\LogisticsBundle\Entity\Stock')->resetGeneralStock($obj->getId());
            }
        }
    }

    public function postPersist(LifecycleEventArgs $args) {
        $this->postUpdate($args);
    }

}
