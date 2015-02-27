<?php

/**
 * Репозиторий, содержащий общие запросы для работы с сущностью NotFinishedOrderCompositionRepository
 * @author  Kaluzhny.N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class NotFinishedOrderCompositionRepository extends EntityRepository
{
    public function findByIds(array $ids)
    {
        $qb = $this->createQueryBuilder('c');

        $qb->where($qb->expr()->in('c.id', ':ids'))
            ->setParameter('ids', $ids)
        ;

        $result = $qb->getQuery()->getResult();

        return $result;
    }
}
