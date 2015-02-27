<?php
/**
 * Класс-подписчик для фиксации изменения поля slug у какой либо сущности
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SlugHistoryBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;

//for Doctrine 2.4: use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class Subscriber implements EventSubscriber
{
    private $core_slug_history_logic;
//
    public function __construct($core_slug_history_logic)
    {
        $this->core_slug_history_logic = $core_slug_history_logic;
    }

    public function getSubscribedEvents()
    {
        return array(
            'postUpdate',
        );
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $obj = $args->getEntity();

        $this->core_slug_history_logic->checkAndWriteSlugHistoryInBackground($obj);
    }
}