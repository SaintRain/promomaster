<?php
/**
 * Класс-подписчик на события для площадок
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PostFlushEventArgs;
use Core\SiteBundle\Entity\CommonSite;

class SiteSubscriber implements EventSubscriber
{
    private $container;
    private $nodeJsRefresObjects = [];

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function getSubscribedEvents()
    {
        return array(

            'postUpdate',
            'postPersist',
            'postRemove'
        );
    }


    public function postUpdate(LifecycleEventArgs $args)
    {

        $object = $args->getEntity();
        $this->container->get('core_site_logic')->checkIsDomainNameChange($object);
        if ($object instanceof CommonSite) {
            $this->container->get('core_site_logic')->updateTycIfNeed($object);
        }

    }

    public function postPersist(LifecycleEventArgs $args)
    {

        $object = $args->getEntity();
        $this->container->get('core_site_logic')->checkIsDomainNameChange($object);
        if ($object instanceof CommonSite) {
            $this->container->get('core_site_logic')->updateTycIfNeed($object);
        }
    }

    public function postRemove(LifecycleEventArgs $args)
    {
        $object = $args->getEntity();
        $this->container->get('core_site_logic')->checkIsDomainNameChange($object);
    }


}