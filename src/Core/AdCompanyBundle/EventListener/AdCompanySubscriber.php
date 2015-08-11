<?php
/**
 * Класс-подписчик на события для РК
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\AdCompanyBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PostFlushEventArgs;
use Core\AdCompanyBundle\Entity\AdCompany;

class AdCompanySubscriber implements EventSubscriber
{

    public function getSubscribedEvents()
    {
        return array(
            'prePersist',
        );
    }


    public function prePersist(LifecycleEventArgs $args)
    {
        $object = $args->getEntity();
        if ($object instanceof AdCompany) {
            $object->setToken(uniqid(rand(1000, 10000)));
        }
    }


}