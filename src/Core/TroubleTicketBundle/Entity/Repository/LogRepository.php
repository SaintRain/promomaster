<?php

/**
 * Репозиторий, содержащий общие запросы для работы с сущностью Log
 * @author  Kaluzhny.N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\TroubleTicketBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class LogRepository extends EntityRepository
{

    public function getNotAnswerd()
    {
        
        $qb = $this->createQueryBuilder('lT');
        $query = $qb->select('lT')
                    ->orderBy('lT.id','DESC');
                    
        $result = $query->getQuery()->getResult();

        return $result;
        
    }
}