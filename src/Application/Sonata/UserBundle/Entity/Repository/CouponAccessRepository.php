<?php

/**
 * Репозиторий для работы с сущностью CouponAccess
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class CouponAccessRepository extends EntityRepository
{
    /**
     * Ищет записи по хешу и ID пользователя
     * @param type $uid
     * @param type $hash
     * @return type
     */
    public function findByHash ($uid, $hash) {
        
        //берем дату на сутки назад
        $createdAt=new \DateTime();
        $createdAt->modify('-1 day');
                
        $res=$this->createQueryBuilder('ca')
                ->select('ca')
                ->where('ca.user=:user AND ca.hash=:hash AND ca.createdAt>:createdAt')
                ->setParameters(['user'=>$uid, 'hash'=>$hash, 'createdAt'=>$createdAt])
                ->getQuery()->getOneOrNullResult();
        return $res;
    }

    /**
     * Ищет записи по URL и ID пользователя
     * @param type $uid
     * @param type $hash
     * @return type
     */
    public function findByURL($uid, $url) {
                        
        $res=$this->createQueryBuilder('ca')
                ->select('ca')
                ->where('ca.user=:user AND ca.url=:url')
                ->setParameters(['user'=>$uid, 'url'=>$url])
                ->getQuery()->getOneOrNullResult();
        
        return $res;
    }
}
