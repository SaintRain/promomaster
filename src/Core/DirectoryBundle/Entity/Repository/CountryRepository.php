<?php

/**
 * Репозиторий для работы с сущностью Country (страны)
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class CountryRepository extends EntityRepository
{
    public function findForForm()
    {
        $qb = $this->createQueryBuilder('c');
        $qb->select('c, w')
            ->innerJoin('c.worldSection', 'w')
            ->groupBy('w.captionRu')
        ;
        $result = $qb->getQuery()->getResult();
        return $result;
    }
}
