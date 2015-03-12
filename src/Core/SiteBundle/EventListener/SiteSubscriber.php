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
use Core\SiteBundle\Entity\CommonSite;

class SiteSubscriber implements EventSubscriber
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
            'postRemove',
        );
    }

    public function postUpdate(LifecycleEventArgs $args)
    {

        $object = $args->getEntity();
        $this->container->get('core_site_logic')->checkIsDomainNameChange($object);
        $this->checkRefreshDataNodJs($object);

    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $object = $args->getEntity();
        $this->container->get('core_site_logic')->checkIsDomainNameChange($object);
        $this->checkRefreshDataNodJs($object);

    }

    public function postRemove(LifecycleEventArgs $args)
    {
        $object = $args->getEntity();
        $this->container->get('core_site_logic')->checkIsDomainNameChange($object);
        $this->checkRefreshDataNodJs($object);

    }

    /**
     * Определяет необходимо ли обновить данные в nodejs
     * @param $object
     */
    public function checkRefreshDataNodJs($object)
    {

        $this->container->get('core_site_logic')->checkRefreshDataNodJs($object);

    }


}