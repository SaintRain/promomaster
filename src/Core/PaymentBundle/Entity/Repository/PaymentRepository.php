<?php
/**
 * Репозиторий для работы с сущностью Payment
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Core\PaymentBundle\Entity\Payment;

class PaymentRepository extends EntityRepository
{

    /**
     * Ищет количество транзакций с разбивкой по времени
     * @return type
     */
    public function getGeneralStatistics()
    {
        $start_dateTime_7 = date('Y-m-d H:i:s', time() - 7 * 86400); //7 суток назад
        $start_dateTime_1 = date('Y-m-d H:i:s', time() - 1 * 86400); //сутки назад

        $res = $this->createQueryBuilder('p')
                ->select('COUNT(p) AS payment_total')
                ->addSelect('SUM(CASE WHEN p.isPassed = 1 THEN 1 ELSE 0 END) AS payment_total_passed')
                ->addSelect('SUM(CASE WHEN p.createdAt > :start_dateTime_7 THEN 1 ELSE 0 END) AS payment_total_by_period_7')
                ->addSelect('SUM(CASE WHEN p.createdAt > :start_dateTime_1 THEN 1 ELSE 0 END) AS payment_total_by_period_1')
                ->setParameters(['start_dateTime_7' => $start_dateTime_7, 'start_dateTime_1' => $start_dateTime_1])
                ->getQuery()->getOneOrNullResult();

        return $res;
    }

    /**
     * Поиск конкретной платежки принадлежащей конкретному юзеру
     * Если не находит срабатывает исключение
     *
     * @param integer $id
     * @param string|object $system
     * @param integer|object $user
     * @return object
     */
    public function findByIdSystemUser($id, $system, $user)
    {
        if (!is_string($system)) {
            $system = $system->getSystem();
        }
        if ($user && is_object($user)) {
            $user = $user->getId();
        }
        $payment = $this->createQueryBuilder('p')
            ->select('p, s, c, u')
            ->where('p.id = :id')
            ->setParameter('id', $id)
            ->leftJoin('p.system', 's')
            ->andWhere('s.system = :system')
            ->setParameter('system', $system)
            ->leftJoin('p.customer', 'c')
            ->leftJoin('c.user', 'u')
            ->andWhere('u.id = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getOneOrNullResult();

        return $payment;
    }

    /**
     * Запрос для получения всей суммы внесенных денег контрагентом
     *
     * @param integer|object $customer
     * @return object
     */
    public function getTotalAmountByCuctomer($customer)
    {
        if (is_object($customer)) {
            $total           = array();
            $total['amount'] = 0;
            $payments        = $customer->getPayments();
            foreach ($payments as $payment) {
                if ($payment->getIsPassed()) {
                    if ($payment->getType()) {
                        $total['amount'] += $payment->getAmount();
                    } else {
                        $total['amount'] -= $payment->getAmount();
                    }
                }
            }
        } else {
            $total = $this->createQueryBuilder('p')
                ->select('SUM ((CASE '
                    .'WHEN (p.type = '.Payment::TYPE_IN.' ) THEN p.amount '
                    .'ELSE -p.amount END))'
                    .' amount')
                ->leftJoin('p.customer', 'c')
                ->where('c.id = :customerId AND p.isPassed = 1')
                ->setParameter('customerId', $customer)
                ->getQuery()
                ->getOneOrNullResult();
        }

        return (float) $total['amount'];
    }

    /**
     * Ищет заказы контрагента
     *
     * @param integer|object $customer
     * @return array
     * @author Sergeev A.M.
     */
    public function findPassedByCustomer($customer)
    {
        $payments = $this->createQueryBuilder('p')
            ->addSelect('system')
            ->where('(p.isPassed = :passed) AND p.customer = :customer')
            ->leftJoin('p.system', 'system')
            ->setParameter('passed', true)
            ->setParameter('customer', $customer)
            ->getQuery()
            ->getResult();
        return $payments;
    }

    /**
     * Проверяем был ли возврат по платежу
     *
     * @return type
     */
    public function isRefund($payment)
    {
        $res = $this->createQueryBuilder('p')
            ->select('p.isRefund')
            ->where('p.id = :id')
            ->setParameters(['id' => $payment->getId()])
            ->getQuery()
            ->getOneOrNullResult();

        return isset($res['isRefund']) ? $res['isRefund'] : false;
    }
}