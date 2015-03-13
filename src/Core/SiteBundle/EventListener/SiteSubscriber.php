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
            'postRemove',
            // 'postFlush',
            'postFlush'
        );
    }


    public function postFlush($event)
    {
//        $this->bills = [];
//        /* @var $em \Doctrine\ORM\EntityManager */
//        $em = $event->getEntityManager();
//        /* @var $uow \Doctrine\ORM\UnitOfWork */
//        $uow = $em->getUnitOfWork();
//
//
//
//
//
//        foreach ($uow->getScheduledCollectionUpdates() as $entity) {
//            ldd($entity);
//        }


//        ld($uow->getScheduledCollectionUpdates());
//        ld($uow->getScheduledCollectionDeletions());
//        ld($uow->getScheduledEntityDeletions());

//        $uow->computeChangeSets();
//        foreach ($uow->getScheduledEntityInsertions() as $entity) {
//
//            if ($entity instanceof Bill) {
//
//                $this->bills[] = $entity;
//            }
//        }

    }

//    public function postFlush(PostFlushEventArgs $event)
//    {
//        if (!empty($this->bills)) {
//
//            /* @var $em \Doctrine\ORM\EntityManager */
//            $em = $event->getEntityManager();
//
//            foreach ($this->bills as $bill) {
//
//                /* @var $bill \MyCompany\CompanyBundle\Entity\Bill */
//                $this->pdfs->generateFor($bill);
//                $em->persist($bill);
//            }
//
//            $em->flush();
//        }
//    }


//    public function postFlush(PostFlushEventArgs $args)
//    {
//        foreach ($this->nodeJsRefresObjects as $object) {
//
//            $this->container->get('core_site_logic')->sendRefreshDataNodJs($object);
//        }
//        $this->nodeJsRefresObjects = [];
//    }


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

        if ($this->container->get('core_site_logic')->checkRefreshDataNodJs($object)) {
            $this->nodeJsRefresObjects[] = $object;

        }

    }


}