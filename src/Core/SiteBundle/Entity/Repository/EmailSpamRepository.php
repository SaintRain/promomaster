<?php

/**
 * Репозиторий, содержащий для сущности WebSite
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class EmailSpamRepository extends CommonSiteRepository
{


    public function findForSpam($limit) {

        return $this->createQueryBuilder('e')
            ->where('e.isSended<>1')
            ->setMaxResults($limit)
            ->getQuery()
            ->execute();
    }




}
