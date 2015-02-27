<?php

/**
 * Класс-подписчик на события для сохранения поставки.
 * Добавляет товарные позиции на склад
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Core\LogisticsBundle\Entity\Supply;
use Core\LogisticsBundle\Entity\AdditionalCostsOfSupply;
use Core\LogisticsBundle\Entity\ProductInSupply;

class SupplySubscriber implements EventSubscriber {

    private $isUpdated = false;
    private $service_container;

    public function __construct($service_container) {
        $this->service_container = $service_container;
    }

    public function getSubscribedEvents() {
        return array(
            'preUpdate',
            'preRemove',
            'prePersist'
        );
    }

    public function preRemove(LifecycleEventArgs $args) {
        $this->preUpdate($args);
    }

    public function prePersist(LifecycleEventArgs $args) {
        $this->preUpdate($args);
    }

    public function preUpdate(LifecycleEventArgs $args) {
        $obj = $args->getEntity();
        if (!$this->isUpdated && ($obj instanceof Supply || $obj instanceof AdditionalCostsOfSupply || $obj instanceof ProductInSupply)) {
            if ($obj instanceof AdditionalCostsOfSupply) {
                $supply = $obj->getSupply();
            } 
            elseif ($obj instanceof ProductInSupply) {
                $supply = $obj->getSupply();
            }
            else {
                $supply = $obj;
            }
            $this->isUpdated = true;
            $this->service_container->get('core_supply_logic')->updateAdditionalCosts($supply);
            $this->service_container->get('core_supply_logic')->addProductUnits($supply);

        }
    }

}
