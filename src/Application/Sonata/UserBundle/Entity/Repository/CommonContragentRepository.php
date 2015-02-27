<?php

/**
 * Репозиторий для работы с сущностью CommonContragent
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Common\Cache\ApcCache;

class CommonContragentRepository extends EntityRepository {

    /**
     * Берет данные для подсчета информации по всем заказам
     * @param type $contragent_id
     * @return type
     */
    public function getContragentOrdersInfo($contragent_id) {
        $res = $this->createQueryBuilder('c')
                        ->select('c,o,comp')
                        ->leftJoin('c.orders', 'o')
                        ->leftJoin('o.compositions', 'comp')
                        ->where('c.id=:id')
                        ->groupBy('c.id')
                        ->setParameter('id', $contragent_id)
                        ->getQuery()->getOneOrNullResult();
        return $res;
    }

    public function getByParams() {
        $qb = $this->createQueryBuilder('c');

        $qb->select('c', 'l')
                ->innerJoin(
                        'Application\Sonata\UserBundle\Entity\LegalContragent', 'l', \Doctrine\ORM\Query\Expr\Join::WITH, 'c.id = l.id'
                )
                ->orderBy('c.updatedDateTime', 'DESC')
        ;

        $result = $qb->getQuery()->getResult();
        
        return $result;
    }

    /**
     * Получить контрагента с городом
     * @param type $id
     */
    public function findWithCity($id)
    {
        $qb = $this->createQueryBuilder('a');
        $qb->select('a,c')
           ->leftJoin('a.city', 'c')
           ->where('a.id = :id');
        $qb->setParameter('id', $id);
        $result = $qb->getQuery()->getOneOrNullResult();

        return $result;
    }

    /**
     * Поиск всех котрагентов с адресами для пользователя
     *
     * @param int $userId
     * @return type
     */
    public function findForDiscount($contragentId)
    {
        $cacheDriver = new ApcCache();
        if ($cacheDriver->contains('contragent_with_dicsounts')) {
            return $cacheDriver->fetch('contragent_with_dicsounts');
        }
        $contragent = $this
            ->createQueryBuilder('c')
            ->addSelect('orders', 'manufacturerDiscounts', 'manufacturerStepValues')
            ->leftJoin('c.orders', 'orders')
            ->leftJoin('c.manufacturerDiscounts', 'manufacturerDiscounts')
            ->leftJoin('manufacturerDiscounts.manufacturerStepValues', 'manufacturerStepValues')
            ->where('c.id = :id')
            ->setParameter('id', $contragentId)
            ->getQuery()
            ->getOneOrNullResult()
            ;
        $cacheDriver->save('contragent_with_dicsounts', $contragent, 6);
        return $contragent;
    }
    
    /**
     * Получить контрагента с контактами 
     * @param type $userId
     * @return type
     */
    public function findWihAllData($userId)
    {
        $qb = $this->createQueryBuilder('c');

        $qb->select('c, l, i, lContact, iContact')
            ->join('c.user', 'u')
            ->leftJoin(
                    'Application\Sonata\UserBundle\Entity\LegalContragent',
                    'l',
                    Join::WITH,
                    ('c.id = l.id')
                )
            ->leftJoin(
                    'Application\Sonata\UserBundle\Entity\IndiContragent',
                    'i',
                    Join::WITH,
                    ('c.id = i.id')
                )
            ->leftJoin('l.contactList', 'lContact')
            ->leftJoin('i.contactList', 'iContact')
            ->groupBy('l.id, i.id')
            ->where('u.id = :userId');
            
        $qb->setParameter('userId', $userId);

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    /**
     * Контрагент с данными которые учитываются в статистике
     * @param type $userId - id пользователя
     * @return type
     */
    public function findWithSelfData($userId, $contragentId)
    {
        $qb = $this->createQueryBuilder('a');
        $qb->select('a, o, p, d, u')
            ->join('a.user', 'u')
            ->leftJoin('a.orders', 'o')
            ->leftJoin('a.payments', 'p')
            ->leftJoin('a.manufacturerDiscounts', 'd')
            ->where('u.id = :id')
            ->andWhere('a.id = :contragentId');
        $qb->setParameter('id', $userId)
            ->setParameter('contragentId', $contragentId);
        
        return $qb->getQuery()->getOneOrNullResult();
    }

}
