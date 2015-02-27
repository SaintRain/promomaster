<?php

/**
 * Репозиторий для работы с сущностью User
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{

    /**
     * Ищет количество зарегистрированных пользователей с разбивкой по времени
     * @return type
     */
    public function getGeneralStatistics()
    {

        $createdAt_7 = date('Y-m-d H:i:s', time() - 7 * 86400); //7 суток назад
        $createdAt_1 = date('Y-m-d H:i:s', time() - 1 * 86400); //сутки назад

        $res = $this->createQueryBuilder('u')
                        ->select('COUNT(u) AS users_total')
                        ->addSelect('SUM(CASE WHEN u.createdAt > :createdAt_7 THEN 1 ELSE 0 END) AS users_total_period_7')
                        ->addSelect('SUM(CASE WHEN u.createdAt > :createdAt_1 THEN 1 ELSE 0 END) AS users_total_period_1')
                        ->setParameters(['createdAt_7' => $createdAt_7, 'createdAt_1' => $createdAt_1])
                        ->getQuery()->getOneOrNullResult();

        return $res;
    }

    /**
     * Получает статистические данные о заказах с группировкой по времени
     * @return type
     */
    public function getChartStatistics()
    {

        $res = $this
                        ->createQueryBuilder('u')
                        ->select('COUNT(u) total_user_quantity')
                        ->addSelect('substring(u.createdAt, 1, 10) date')
                        ->groupBy('date')
                        ->orderBy('u.createdAt', 'ASC')
                        ->getQuery()->getArrayResult();
        return $res;
    }

    /**
     * Получить пользователя со связанными данными
     * используется для траблтикетов
     * @param int $id
     * @return type
     */
    public function findForTroubleTicket($id)
    {
        $qb = $this->createQueryBuilder('u');
        $qb->select('u, o, c')
            ->leftJoin('u.contragents', 'c')
            ->leftJoin('c.orders', 'o')
            ->where('u.id = :id');
        $qb->setParameter(':id', $id);

        $result = $qb->getQuery()->getOneOrNullResult();

        return $result;
    }

    /**
     * Поиск не активированного пользователя
     * @param type $email
     * @return type
     */
    public function findNotActiveUser($email)
    {
        $qb = $this->createQueryBuilder('u');
        $qb->where('u.email = :email AND u.enabled = :enabled')
            ->setParameter('email', $email)
            ->setParameter('enabled', false)
        ;
        
        $result = $qb->getQuery()->getOneOrNullResult();

        return $result;
    }

    /**
     * Поиск пользователей по id для лога траблтикета
     * @param array $ids
     * @return type
     */
    public function findForTicketLog(array $ids)
    {
        $qb = $this->createQueryBuilder('u');

        $qb->where($qb->expr()->in('u.id', ':ids'))
            ->setParameter('ids', $ids)
        ;

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    /**
     * Поиск пользователя с заказами для первой авторизации после заказа
     * @param string $token
     * @param int $orderId
     * @return type
     */
    public function findForOrderLogin($orderId, $token = null, $userId = null)
    {
        $qb = $this->createQueryBuilder('u');
        $qb->select('u, c, o')
           ->innerJoin('u.contragents', 'c')
           ->innerJoin('c.orders', 'o')
           ->where('o.id = :orderId')
        ;
        if ($token) {
            $qb->andWhere('u.confirmationToken = :token')
                ->setParameter('token', $token)
            ;
        } elseif ($userId) {
            $qb->andWhere('u.id = :userId')
                ->setParameter('userId', $userId)
            ;
        }
        $qb->setParameter('orderId', $orderId);

        $result = $qb->getQuery()->getOneOrNullResult();

        return $result;
    }

    public function findAdminForLogin($email)
    {
        $qb = $this->createQueryBuilder('u');
        $qb->where('u.email = :email AND u.enabled = :enabled AND u.locked = :locked AND u.expired = :expired')
            ->setParameter('email', $email)
            ->setParameter('enabled', true)
            ->setParameter('locked', false)
            ->setParameter('expired', false)
        ;

        $result = $qb->getQuery()->getOneOrNullResult();

        return $result;
    }

    public function findByEmail($email)
    {
        $qb = $this->createQueryBuilder('u');
        $qb->where('u.email = :email')
            ->setParameter('email', $email);

        $result = $qb->getQuery()->getOneOrNullResult();

        return $result;
    }

    /**
     * Получить только админов
     * @param sting $groupName
     * @return type
     */
    public function findManagers($groupName = 'Администратор')
    {
        $qb = $this->createQueryBuilder('u');
        $qb->leftJoin('u.groups','g')
            ->where('g.name = :groupName')
            ->setParameter('groupName', $groupName);
        return $qb;

    }
}
