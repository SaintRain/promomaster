<?php

/**
 * Класс-подписчик на события для сохранения модификаций.
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Core\ProductBundle\Entity\CommonProduct;

class ProductSubscriber implements EventSubscriber {

    private $modificationLogic;
    private $service_container;
    private $things = [];
    private $object;

    public function __construct($service_container) {
        $this->service_container = $service_container;
    }

    public function getSubscribedEvents() {
        return array(
            'preUpdate',
            'prePersist',
            'postUpdate',
            'postPersist',
            'postFlush'
        );
    }

    /**
     * Пишем в базу изменения для модификации
     * @param type $event
     */
    public function postFlush($event) {

        if (!empty($this->things)) {
            $em = $event->getEntityManager();
            foreach ($this->things as $thing) {
                $em->persist($thing);
            }
            $this->things = [];
            $em->flush();
        }

        $this->service_container->get('core_product_logic')->checkAndSetIsVisiblePost($this->object);
    }

    public function postPersist(LifecycleEventArgs $args) {
        $this->checkDescriptionChange($args);
    }

    public function postUpdate(LifecycleEventArgs $args) {
        $this->checkDescriptionChange($args);
    }

    /**
     * Проверяет изменилось ли краткое описание, чтобы отправить запрос в яндекс
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args
     */
    public function checkDescriptionChange(LifecycleEventArgs $args) {
        $obj = $args->getEntity();
        if (is_subclass_of($obj, 'Core\ProductBundle\Entity\CommonProduct')) {
            $this->service_container->get('core_product_logic')->checkDescriptionChange($obj);
        }
    }

    public function preUpdate(LifecycleEventArgs $args) {
        $obj = $args->getEntity();
        $this->setSEO($obj);
        $this->updateModifications($args);

        // проверяем и выставляем флаг оторбажения товара на сайте
        $this->service_container->get('core_product_logic')->checkAndSetIsVisiblePre($obj);
    }

    public function prePersist(LifecycleEventArgs $args) {
        $obj = $args->getEntity();
        $this->setSEO($obj);
        $this->updateModifications($args);

        // проверяем и выставляем флаг оторбажения товара на сайте
        $this->service_container->get('core_product_logic')->checkAndSetIsVisiblePre($obj);
    }

    /**
     * Автоматически проставляем SEO-блоки
     * @param type $obj
     */
    public function setSEO($obj) {

    }

    /**
     * обновляем коллекцию модификаций
     * @param type $args
     */
    public function updateModifications($args) {
        $obj = $args->getEntity();
        $this->object            = $obj;
        $this->modificationLogic = $this->service_container->get('core_product_modification_logic');
        if (isset($this->modificationLogic->fieldsInfo[get_class($obj)]) && $this->modificationLogic->fieldsInfo[get_class($obj)]) {
            $fInfo = $this->modificationLogic->fieldsInfo[get_class($obj)];
            $this->modificationLogic->fieldsInfo[get_class($obj)] = false;
            foreach ($fInfo as $info) {
                $this->things = array_merge($this->things, $this->modificationLogic->updateCollections($info['data'], $obj, $info['property_fields'], $info['sortable']));
            }
        }
    }

}
