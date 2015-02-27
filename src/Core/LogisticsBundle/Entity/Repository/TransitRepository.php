<?php

/**
 * Репозиторий, содержащий общие вопросы для работы с сущностью Transit
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class TransitRepository extends EntityRepository {


    /**
     * Находит последний транзит в который еще можно добавлять товары
     * @param type $data
     * @return type
     */
    public function findLastTransit($data) {
        $res=$this->createQueryBuilder('t')
                ->leftJoin('t.status', 's')
                ->where('(s.name=:status_name OR s.id IS NULL)')
                ->AndWhere('t.fromStock=:fromStock')
                ->AndWhere('t.toStock=:toStock')
                ->setParameters(['status_name'=>'upakovyvaietcia',
                    'fromStock' => $data['fromStock'], 'toStock' => $data['toStock']]
                    )
                ->getQuery()
                ->getOneOrNullResult();
        return $res;                
    }
}

