<?php

/**
 * Класс-подписчик
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ReviewBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Core\ReviewBundle\Entity\Review;

//for Doctrine 2.4: use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class Subscriber implements EventSubscriber
{

    private $reviewLogic;

    public function __construct($reviewLogic)
    {
        $this->reviewLogic = $reviewLogic;
    }

    public function getSubscribedEvents()
    {
        return array(
            'postRemove',
            'postUpdate',
            'postPersist',
        );
    }

    public function postRemove(LifecycleEventArgs $args)
    {
        $obj = $args->getEntity();

        if ($obj instanceof Review) {
            // Пересчитываем рейтинг продукта
            $this->reviewLogic->recalculateProductRating($obj->getProduct());
        }
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $obj = $args->getEntity();

        if ($obj instanceof Review) {
            // Пересчитываем рейтинг продукта
            $this->reviewLogic->recalculateProductRating($obj->getProduct());
        }
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $obj = $args->getEntity();

        if ($obj instanceof Review) {
            // Пересчитываем рейтинг продукта
            $this->reviewLogic->recalculateProductRating($obj->getProduct());
        }
    }

}
