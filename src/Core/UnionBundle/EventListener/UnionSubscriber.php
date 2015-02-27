<?php

/**
 * Класс-подписчик на события для сохранения объединений
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\UnionBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;

class UnionSubscriber implements EventSubscriber {

    private $unionLogic;
    private $service_container;
    private $things = [];

    public function __construct($service_container) {
        $this->service_container = $service_container;
    }

    public function getSubscribedEvents() {
        return array(
            'preUpdate',
            'prePersist',
            'postFlush',
        );
    }

    public function preUpdate(LifecycleEventArgs $args) {
        $this->updateCollections($args);
    }

    public function prePersist(LifecycleEventArgs $args) {
        $this->updateCollections($args);
    }

    public function postFlush($event) {

        if (!empty($this->things)) {
            $em = $event->getEntityManager();
            foreach ($this->things as $operation_key => $things) {
                foreach ($things as $thing) {
                    if ($operation_key == 'persist') {
                        $em->persist($thing);
                    } else if ($operation_key == 'remove') {
                        $em->remove($thing);
                    }
                }
            }
            $this->things = [];
            $em->flush();
        }
    }

    public function updateCollections(LifecycleEventArgs $args) {
        $obj = $args->getEntity();
        $this->unionLogic = $this->service_container->get('core_union_logic');
        if (isset($this->unionLogic->fieldsInfo[get_class($obj)]) && $this->unionLogic->fieldsInfo[get_class($obj)]) {
            $fInfo = $this->unionLogic->fieldsInfo[get_class($obj)];
            $this->unionLogic->fieldsInfo[get_class($obj)] = false;
            foreach ($fInfo as $info) {
                $things = $this->unionLogic->updateCollections($info['data'], $obj, $info['field_description'], $info['sortable'], $info['options']);
                foreach ($things as $key => $ths) {
                    foreach ($ths as $th) {
                        $this->things[$key][] = $th;
                    }
                }
            }
        }
    }

}
