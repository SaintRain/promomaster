<?php
/**
 * Репозиторий, содержащий общие вопросы для работы с сущностью Order
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderRepository extends EntityRepository
{

    /**
     * берем не оплаченные, не отмененные заказы для заданных[ продуктов
     * @param type $pids
     */
    public function getOrdersForUpdatePriceByNewCurrencyCommand($pids)
    {

        $res = $this->createQueryBuilder('o')->join('o.compositions', 'comp')
            ->join('comp.product', 'p')
            ->where('o.isPaidStatus!=1 AND o.isCanceledStatus!=1'
                .' AND p.id IN(:pids)')
            ->setParameters(['pids' => $pids])
            ->getQuery()
            ->execute();

        return $res;
    }

    /**
     * Получает заказ с оптимальным набором джоинов
     * @param type $id
     */
    public function getOneOrderWithJoins($id)
    {
        $res = $this
            ->createQueryBuilder('o')
            ->addSelect('contr', 'c', 'p', 'b', 'pa', 'u', 'ac', 'soac',
                'acUser', 'tickets', 'ticketsStatus', 'ser', 'manufacturer',
                'manufacturerDiscounts', 'manufacturerStepValues',
                'manufacturersForDiscounts')
            ->leftJoin('o.contragent', 'contr')
            ->leftJoin('contr.manufacturerDiscounts', 'manufacturerDiscounts')
            ->leftJoin('manufacturerDiscounts.manufacturers',
                'manufacturersForDiscounts')
            ->leftJoin('manufacturerDiscounts.manufacturerStepValues',
                'manufacturerStepValues')
            ->leftJoin('o.compositions', 'c')
            ->leftJoin('c.booking', 'b')
            ->leftJoin('c.product', 'p')
            ->leftJoin('p.manufacturers', 'manufacturer')
            ->leftJoin('c.units', 'u')
            ->leftJoin('u.serials', 'ser')
            ->leftJoin('p.productAvailability', 'pa')
            ->leftJoin('o.adminComments', 'ac')
            ->leftJoin('o.subscribersOnAdminComments', 'soac')
            ->leftJoin('ac.user', 'acUser')
            ->leftJoin('o.tickets', 'tickets')
            ->leftJoin('tickets.status', 'ticketsStatus')
            ->where('o.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getSingleResult();
        return $res;
    }

    /**
     * Берет статистику по категории
     * @return type
     */
    public function getPaidNotShippedStatisticsByCategory()
    {
        $temp = $this->createQueryBuilder('o')
                ->select('SUM(p.price*c.quantity) quantity_sum')
                ->addSelect('SUM(c.quantity) quantity')
                ->addSelect('catMain.id cat_id')
                ->join('o.compositions', 'c')
                ->join('c.product', 'p')
                ->join('p.categoryMain', 'catMain')
                ->groupBy('catMain.id')
                ->where('o.isPaidStatus=1 AND o.isShippedStatus!=1 AND o.isCanceledStatus!=1')
                ->getQuery()->execute();

        //делаем индекс ID категории
        $res = [];
        foreach ($temp as $r) {
            $res[$r['cat_id']] = $r;
        }
        return $res;
    }

    /**
     * Берет статистику по производителю
     * @return type
     */
    public function getPaidNotShippedStatisticsByManufacturer()
    {
        $temp = $this->createQueryBuilder('o')
                ->select('SUM(p.price*c.quantity) quantity_sum')
                ->addSelect('SUM(c.quantity) quantity')
                ->addSelect('m.id manufacturer_id')
                ->join('o.compositions', 'c')
                ->join('c.product', 'p')
                ->join('p.manufacturerMain', 'm')
                ->groupBy('m.id')
                ->where('o.isPaidStatus=1 AND o.isShippedStatus!=1 AND o.isCanceledStatus!=1')
                ->getQuery()->execute();

        //делаем индекс ID категории
        $res = [];
        foreach ($temp as $r) {
            $res[$r['manufacturer_id']] = $r;
        }
        return $res;
    }

    /**
     * Получает статистические данные о заказах с группировкой по времени
     * @return type
     */
    public function getChartStatistics()
    {

        $res = $this
                ->createQueryBuilder('o')
                ->select('COUNT(o) total_quantity')
                ->addSelect('SUM(CASE WHEN o.paidDateTime>0 THEN 1 ELSE 0 END) total_paid_quantity')
                ->addSelect('SUM(CASE WHEN o.canceledDateTime>0 THEN 1 ELSE 0 END) total_canceled_quantity')
                ->addSelect('substring(o.createdDateTime, 1, 10) date')
                ->groupBy('date')
                ->orderBy('o.createdDateTime', 'ASC')
                ->getQuery()->getArrayResult();
        return $res;
    }

    /**
     * Ищет количество оплаченных заказов с разбивкой по времени
     * @return type
     */
    public function getGeneralStatistics()
    {

        $start_paidDateTime_7 = date('Y-m-d H:i:s', time() - 7 * 86400); //7 суток назад
        $start_paidDateTime_1 = date('Y-m-d H:i:s', time() - 1 * 86400); //сутки назад

        $res = $this->createQueryBuilder('o')
                ->select('COUNT(o) AS orders_total')
                ->addSelect('SUM(CASE WHEN o.isPaidStatus = 1 THEN 1 ELSE 0 END) AS orders_total_paid')
                ->addSelect('SUM(CASE WHEN o.isPaidStatus = 1 AND o.paidDateTime > :start_paidDateTime_7 THEN 1 ELSE 0 END) AS orders_total_paid_by_period_7')
                ->addSelect('SUM(CASE WHEN o.isPaidStatus = 1 AND o.paidDateTime > :start_paidDateTime_1 THEN 1 ELSE 0 END) AS orders_total_paid_by_period_1')
                ->setParameters(['start_paidDateTime_7' => $start_paidDateTime_7,
                    'start_paidDateTime_1' => $start_paidDateTime_1])
                ->getQuery()->getOneOrNullResult();

        return $res;
    }

    /**
     * Ищет заказы контрагента
     *
     * @param integer|object $customer
     * @return array
     * @author Sergeev A.M.
     */
    public function findByCustomerToCalculateBalance($customer)
    {

        if (is_object($customer)) {
            $orders    = array();
            $ordersAll = $customer->getOrders();
            foreach ($ordersAll as $order) {
                if ($order->getIsPaidStatus() || $order->getShippedDateTime()) {
                    $orders[] = $order;
                }
            }
        } else {
            $orders = $this->createQueryBuilder('o')
                ->addSelect('c', 'p', 'ca', 'dm')
                ->leftJoin('o.compositions', 'c')
                ->leftJoin('c.product', 'p')
                ->leftJoin('o.contragent', 'ca')
                ->leftJoin('o.deliveryMethod', 'dm')
                ->where('(o.isPaidStatus = :paid OR o.shippedDateTime IS NOT NULL) AND ca.id = :customer')
                ->setParameter('paid', true)
                ->setParameter('customer', $customer)
                ->getQuery()
                ->getResult();
        }
        return $orders;
    }

    /**
     * Заказ с составом и бронью
     * @param type $id
     * @return type
     */
    public function findWithCompAndBook($id)
    {
        $qb = $this->createQueryBuilder('o');
        $qb->select('o, b, c, p')
            ->leftJoin('o.compositions', 'c')
            ->leftJoin('c.booking', 'b')
            ->leftJoin('c.product', 'p')
            ->where('o.id = :id')
        ;
        $qb->setParameter('id', $id);

        $result = $qb->getQuery()->getOneOrNullResult();

        return $result;
    }

    /**
     * Ищет заказы пользователя
     *
     * @param integer|object $customer
     * @return array
     * @author Sergeev A.M.
     */
    public function findUserOrders($options)
    {
        if (isset($options['user']) && is_object($options['user'])) {
            $options['user'] = $options['user']->getId();
        }

        $qb = $this->createQueryBuilder('orders')
            ->select('orders', 'waybills', 'deliveryMethod', 'extraStatus',
                'compositions', 'booking', 'product')
            ->leftJoin('orders.waybills', 'waybills')
            ->leftJoin('orders.deliveryMethod', 'deliveryMethod')
            ->leftJoin('orders.contragent', 'contragent')
            ->leftJoin('contragent.user', 'user')
            ->leftJoin('orders.extraStatus', 'extraStatus')
            ->leftJoin('orders.compositions', 'compositions')
            ->leftJoin('compositions.booking', 'booking')
            ->leftJoin('compositions.product', 'product');

        if (isset($options['contragentId'])) {
            $qb
                ->where('contragent.id = :contragentId')
                ->setParameter('contragentId', $options['contragentId']);
        } elseif (isset($options['user'])) {
            $qb
                ->where('user.id = :userId')
                ->setParameter('userId', $options['user']);
        }

        //выводим по флагу, только доступные для отображения на фронтенде
        if (isset($options['isShowOnFontend'])) {
            $qb
                ->andWhere('orders.isShowOnFontend = :isShowOnFontend')
                ->setParameter('isShowOnFontend', $options['isShowOnFontend']);
        }


        $qb->orderBy('orders.createdDateTime', 'DESC');

        if (isset($options['orderId']) && $options['orderId'] > 0) {
            $result = $qb
                ->andWhere('orders.id = :orderId')
                ->setParameter('orderId', $options['orderId'])
                ->getQuery()
                ->getOneOrNullResult();

            if (null === $result) {
                throw new NotFoundHttpException('Order not found!');
            }
        } elseif (isset($options['execute']) && $options['execute'] === true) {
            $result = $qb->getQuery()->execute();
        } else {
            $result = $qb;
        }

//        ldd($result->getQuery()->getSQL());

        return $result;
    }

    /**
     * Получаем кол-во заказов для вывода уведомления для пользователя
     * (не отмененные и не отгруженные)
     *
     * @return integer
     * @author Sergeev A.M.
     */
    public function notification($contragent)
    {

        if (is_object($contragent)) {
            $contragentId = $contragent->getId();
        } else {
            $contragentId = $contragent;
        }

        $count = $this->createQueryBuilder('o')
            ->select('COUNT(o) countNotification')
            ->leftJoin('o.contragent', 'contragent')
            ->where('(o.isCanceledStatus = :canceled AND o.isShippedStatus = :shipped AND o.isShowOnFontend=1)')
//            ->orWhere('o.isPaidStatus = :paid')
            ->andWhere('contragent.id = :contragentId')
//            ->leftJoin('contragent.user', 'user')
            ->setParameter('canceled', false)
            ->setParameter('shipped', false)
//            ->setParameter('paid', false)
            ->setParameter('contragentId', $contragentId)
            ->getQuery()
            ->useResultCache(true, 5)
            ->getOneOrNullResult();

        return isset($count['countNotification']) ? $count['countNotification'] : 0;
    }

    /**
     *
     * @param numeric $date
     * @param boolean $isExecutedMsgSend
     */
    public function findForAskForReview($date, $isExecutedMsgSend = false)
    {
        $qb = $this->createQueryBuilder('o');
        $qb->select('o,u,c')
            ->join('o.contragent', 'c')
            ->join('c.user', 'u')
            ->where('o.executedDateTime >= :date')
            ->andWhere('o.isExecutedMsgSend = :isExecutedMsgSend')
        ;

        $qb->setParameter('date', $date)
            ->setParameter('isExecutedMsgSend', $isExecutedMsgSend)
        ;

        return $qb->getQuery()->getResult();
    }
}