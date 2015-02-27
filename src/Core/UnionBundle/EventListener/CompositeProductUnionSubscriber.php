<?php

/**
 * Класс-подписчик для расчета веса/размера для композитного товара при редактировании состава
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\UnionBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Core\UnionBundle\Entity\ProductCompositionsUnion;

class CompositeProductUnionSubscriber implements EventSubscriber {

    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function getSubscribedEvents() {
        return array(
            'postRemove',
            'postUpdate',
            'postPersist'
        );
    }

    public function postUpdate(LifecycleEventArgs $args) {
        $this->computeWeightInfo($args, 'postUpdate');
    }

    public function postPersist(LifecycleEventArgs $args) {
        $this->computeWeightInfo($args, 'postPersist');
    }

    public function postRemove(LifecycleEventArgs $args) {
        $this->computeWeightInfo($args, 'postRemove');
    }

    public function computeWeightInfo($args, $type) {
        $obj = $args->getEntity();
        if ($obj instanceof ProductCompositionsUnion) {
            $this->container->get('core_composite_product_logic')->computeWeightInfo($obj, $type);
        }
    }

}
