<?php

/**
 * Класс-подписчик на события для сущности Payment
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\EventListener;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Core\FileBundle\Entity\CommonFile;
use Core\FileBundle\Entity\ImageFile;

//for Doctrine 2.4: use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class Subscriber implements EventSubscriber {

    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    public function getSubscribedEvents() {
        return array(
            'postUpdate',
            'postPersist',
        );
    }

    public function postPersist(LifecycleEventArgs $args) {
        $obj = $args->getEntity();

        // Отправка писма при отметке что платеж выполнен
        $this->container->get('core_payment_logic')->sendPaymentOnSupportEmailIfIsPassed($obj);
    }

    public function postUpdate(LifecycleEventArgs $args) {
        $obj = $args->getEntity();

        // Отправка писма при отметке что платеж выполнен
        $this->container->get('core_payment_logic')->sendPaymentOnSupportEmailIfIsPassed($obj);
    }
}
