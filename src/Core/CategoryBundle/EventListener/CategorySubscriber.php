<?php
/**
 * Класс-подписчик на события.
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;

class CategorySubscriber implements EventSubscriber
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function getSubscribedEvents()
    {
        return array(
            'postUpdate',
            'postPersist',
        );
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $object = $args->getEntity();

        // Включение или выключенеи отображения товаров при включении или выключении категории
//        $this->container->get('core_product_logic')->checkAndUpdateIsVisibleStatus($object);
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $object = $args->getEntity();

        // проверяем и выставляем флаг оторбажения товара на сайте
//        $this->container->get('core_product_logic')->checkAndUpdateIsVisibleStatus($object);
    }
}