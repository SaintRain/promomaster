<?php

/**
 * Класс-подписчик для заказа
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\EventListener;

use Doctrine\ORM\Event\PostFlushEventArgs;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Core\OrderBundle\Entity\ProductInOrder;
use Core\OrderBundle\Entity\Order;
use Core\OrderBundle\Entity\Composition;
use Doctrine\Common\Collections\ArrayCollection;

class OrderSubscriber implements EventSubscriber
{

    private $service_container;
    private $needFlush = true;

    public function __construct($service_container)
    {
        $this->service_container = $service_container;
    }

    public function getSubscribedEvents()
    {
        return array(
            'onFlush',
            'postFlush'
        );
    }


    public function postFlush($args)
    {
        $this->service_container->get('core_order_logic')->updateSupplyForOrder();
    }

    public function onFlush($args)
    {
        if ($this->needFlush) {
            $em = $args->getEntityManager();
            $uow = $em->getUnitOfWork();

            foreach ($uow->getScheduledEntityUpdates() as $e) {
                if ($e instanceof Order) {
                    $order = $e;
                    $this->needFlush = false;
                    $em = $args->getEntityManager();
                    $uow = $em->getUnitOfWork();

                    //Делаем отпраку письма заказчику, если создан новый заказ со статусом ПРОВЕРЕН
                    $this->service_container->get('core_order_logic')->sendMailIfNeedForNewOrder($order);
                    //Делаем рассылку писем если изменился статус
                    $this->service_container->get('core_order_logic')->sendMailIfNeedOnMainStatusChange($order);
                    $isShowOnFontend = $this->service_container->get('core_order_logic')->checkIsNeedShowOnFontend($order);
                    $order->setIsShowOnFontend($isShowOnFontend);
                    //пересчитываем, иначе не сохранится заказ
                    $meta = $em->getClassMetadata(get_class($order));
                    $uow->recomputeSingleEntityChangeSet($meta, $order);


                    //если удалил из состава продукты, то обновляем для них свободное количество
                    $refreshProducts = new ArrayCollection;
                    foreach ($uow->getScheduledEntityDeletions() as $e) {
                        if ($e instanceof Composition) {
                            $refreshProducts->add($e->getProduct());
                        }
                    }

                    if ($refreshProducts->count()) {
                        $res = $logistics_logic = $this->service_container->get('core_logistics_logic')
                            ->updateProductAvailability($refreshProducts, false, false, false, false, $order);
                    }
                    $em->flush();
                    break;
                }
            }
        }
    }

}
