<?php

/**
 * Класс-подписчик на события для сущностией имеюших связь с FileBundle
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FileBundle\EventListener;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Core\FileBundle\Entity\CommonFile;
use Core\FileBundle\Entity\ImageFile;

//for Doctrine 2.4: use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class Subscriber implements EventSubscriber {

    // конфиги из config.yml
    private $configs;
    private $core_file_logic;

    public function __construct($configs, $core_file_logic) {
        $this->configs = $configs;
        $this->core_file_logic = $core_file_logic;
    }

    public function getSubscribedEvents() {
        return array(
            'preRemove',
            'postRemove',
            'postUpdate',
            'postPersist',
        );
    }

    public function postRemove(LifecycleEventArgs $args) {
        $obj = $args->getEntity();
        $this->core_file_logic->onTargetObjRemove($obj);
    }

    /**
     * Запоминаем id удаляемой записи для удаления папки с файлами после удаления объекта
     *
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args
     */
    public function preRemove(LifecycleEventArgs $args) {
        $obj = $args->getEntity();
        $this->core_file_logic->removedParentId = $obj->getId();
    }

    public function postPersist(LifecycleEventArgs $args) {
        $obj = $args->getEntity();

        // перемешение временных файлов, в случае если они есть
        $this->core_file_logic->moveTempFiles($obj);

        // удаление файлов и очистка таблицы, в случае если на форме были отмечены чекбоксы "Удалить"
        $this->core_file_logic->clearTableAndRemoveFile($obj);
    }

    public function postUpdate(LifecycleEventArgs $args) {
        $obj = $args->getEntity();

        // удаление файлов и очистка таблицы, в случае если на форме были отмечены чекбоксы "Удалить"
        $this->core_file_logic->clearTableAndRemoveFile($obj);
    }
}
