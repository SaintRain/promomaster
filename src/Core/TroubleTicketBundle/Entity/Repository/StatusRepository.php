<?php

/**
 * Репозиторий, содержащий общие запросы для работы с сущностью Status
 * @author  Kaluzhny.N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\TroubleTicketBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class StatusRepository extends EntityRepository {

    /**
     *
     * @param string $sysname - системное имя
     * @return type
     */
    public function findBySysName($sysName)
    {
        $qb = $this->createQueryBuilder('s');
        $qb->where('s.sysName = :sysName')
           ->setParameter(':sysName', $sysName);
        $result = $qb->getQuery()->getSingleResult();
        
        return $result;
    }
}
