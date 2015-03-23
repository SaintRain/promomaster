<?php

namespace Core\CommonBundle\EventListener;

use Core\SiteBundle\Logic\SiteLogic;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
// for Doctrine < 2.4 use Doctrine\ORM\Event\LifecycleEventArgs;
use Core\TroubleTicketBundle\Entity\TroubleTicket;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Event\PreFlushEventArgs;
use Doctrine\ORM\Event\OnFlushEventArgs;
use Doctrine\ORM\Event\PostFlushEventArgs;
use Doctrine\ORM\Mapping\ClassMetadata;

class CommonSubscriber implements EventSubscriber
{
    /**
     * Массив дааных об операциях
     * @var array
     */
    protected $operations = [];
    protected $container;

    //список таблиц для которых нужно отлавливать изменения
    private $subcriberTables = [
        'core_site',
        'core_site_section',
        'core_site_section_match_ad_place',
        'core_site_ad_place',
        'core_adcompany',
        'core_ad_company_match_country',
        'core_ad_company_placement_match_country',
        'core_adcompany_placement',
        'core_adcompany_placement_banner',
        'core_banner_common' ,
        'fos_user_user',
        'core_directory_country',
        'ad_price_model'

    ];

    public function getSubscribedEvents()
    {
        return array(
            'onFlush',
            'postFlush'
        );
    }


    public function __construct($container)
    {
        $this->container = $container;
    }


    public function onFlush(OnFlushEventArgs $args)
    {
        $data = [];
        $em = $args->getEntityManager();
        $uow = $em->getUnitOfWork();


        $this->makeEntityInsertDelete($uow->getScheduledEntityInsertions(), $em);
        $this->makeEntityInsertDelete($uow->getScheduledEntityDeletions(), $em, 'delete');


        foreach ($uow->getScheduledEntityUpdates() as $entity) {
            $meta = $em->getClassMetadata(get_class($entity));
            $this->operations['update'][$meta->table['name']][$entity->getId()] = $entity->getId();
            $data[get_class($entity)][$entity->getId()]['new'] = clone $entity;
            $em->refresh($entity);
            $data[get_class($entity)][$entity->getId()]['old'] = $entity;

        }

        foreach ($data as $entityType) {
            foreach ($entityType as $entity) {
                $meta = $em->getClassMetadata(get_class($entity['old']));
                foreach ($meta->getAssociationMappings() as $map) {
                    $method = 'get' . ucfirst($map['fieldName']);
                    if (!method_exists($entity['old'], $method)) {
                        continue;
                    }
                    if (ClassMetadata::MANY_TO_MANY == $map['type']) {
                        $this->operations = array_merge_recursive($this->operations, $this->makeManyToMany($entity, $method, $map));
                    } elseif (ClassMetadata::MANY_TO_ONE == $map['type']) {
                        $this->operations = array_merge_recursive($this->operations, $this->makeManyToONe($entity, $method, $meta));
                    }
                    // нужен ли этот кусок?
                    /*elseif (ClassMetadata::ONE_TO_MANY == $map['type']) {
                        continue;
                        // todo
                        // работает ли эта сторона
                        foreach($entity['old']->$method() as $val) {
                            ldd('here');
                            $diff['oldTomany'][$val->getId()] = $val->getId();
                        }

                        foreach($entity['new']->$method() as $val) {
                            $diff['newTomany'][$val->getId()] = $val->getId();
                        }
                    }*/
                }
            }
        }
/*
        if (count($this->operations)) {
            ldd($this->operations);
        }

        die('fdfd');
*/
    }

    /**
     * Метод вызывается для того что бы получить id новых сущностей
     * @param PostFlushEventArgs $args
     */
    public function postFlush(PostFlushEventArgs $args)
    {
        foreach ($this->operations as $cur => $operation) {
            foreach ($operation as $key => $table) {
                if (!in_array($key, $this->subcriberTables)) {
                    unset($this->operations[$cur][$key]);
                }
            }

        }
        if (count($this->operations)) {
            array_walk_recursive($this->operations, function (&$item, $key) {
                if (is_object($item)) {
                    $item = $item->getId();
                }
            });
            $this->container->get('core_site_logic')->sendRefreshDataNodJs($this->operations);
        }

        return;
    }

    /**
     * @param array $entity
     * @param string $method
     * @param array $map
     * @return array
     */
    private function makeManyToMany($entity, $method, $map)
    {
        $diff = [
            'old' => [],
            'new' => [],
        ];
        $operations = [];
        if (!count($map['joinTable'])) {
            return [];
        }
        foreach ($entity['old']->$method() as $val) {
            $diff['old'][$val->getId()] = $val->getId();
        }

        foreach ($entity['new']->$method() as $val) {
            $diff['new'][$val->getId()] = $val->getId();
        }

        $operations['insert'][$map['joinTable']['name']] = array_diff($diff['new'], $diff['old']);
        $operations['delete'][$map['joinTable']['name']] = array_diff($diff['old'], $diff['new']);

        if (count($operations['insert'][$map['joinTable']['name']])) {
            foreach ($operations['insert'][$map['joinTable']['name']] as $key => $val) {
                $operations['insert'][$map['joinTable']['name']][$key] =
                    array(
                        $map['joinTable']['inverseJoinColumns'][0]['name'] => $val,
                        $map['joinTable']['joinColumns'][0]['name'] => $entity['old']->getId()
                    );
            }
        } else {
            unset($operations['insert']);
        }

        if (count($operations['delete'][$map['joinTable']['name']])) {
            foreach ($operations['delete'][$map['joinTable']['name']] as $key => $val) {
                $operations['delete'][$map['joinTable']['name']][$key] =
                    array(
                        $map['joinTable']['inverseJoinColumns'][0]['name'] => $val,
                        $map['joinTable']['joinColumns'][0]['name'] => $entity['old']->getId()
                    );
            }
        } else {
            unset($operations['delete']);
        }
        return $operations;
    }

    private function makeEntityInsertDelete($entities, $em, $operation = 'insert')
    {
        foreach ($entities as $entity) {
            $meta = $em->getClassMetadata(get_class($entity));
            foreach ($meta->getAssociationMappings() as $map) {
                $method = 'get' . ucfirst($map['fieldName']);
                if (!method_exists($entity, $method)) {
                    continue;
                }
                if (ClassMetadata::MANY_TO_MANY == $map['type']) {
                    foreach ($entity->$method() as $val) {
                        $this->operations[$operation][$map['joinTable']['name']][] =
                            array(
                                $map['joinTable']['inverseJoinColumns'][0]['name'] => $val->getId(),
                                $map['joinTable']['joinColumns'][0]['name'] => ($entity->getId()) ? $entity->getId() : $entity
                            );
                    }
                }
            }

            $this->operations[$operation][$meta->table['name']][] = ($entity->getId()) ? $entity->getId() : $entity;
        }
    }

    /**
     * @param array $entity
     * @param string $method
     * @param array $meta
     * @return array
     */
    private function makeManyToONe($entity, $method, $meta)
    {
        $operations = [];
        if (!$entity['old']->$method() && !$entity['new']->$method()) {
            return $operations;
        }

        if (!$entity['old']->$method() || $entity['new']->$method()->getId() != $entity['old']->$method()->getId()) {
            $operations['update'][$meta->table['name']][$entity['new']->$method()->getId()] = $entity['new']->$method()->getId();
        }

        return $operations;
    }

}