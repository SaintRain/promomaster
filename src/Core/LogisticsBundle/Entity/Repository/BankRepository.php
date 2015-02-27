<?php

/**
 * Репозиторий, содержащий общие вопросы для работы с сущностью Bank
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class BankRepository extends EntityRepository
{

    /**
     * Находит банк
     * @return type
     */
    public function findBank($data)
    {
        $res = $this->createQueryBuilder('b')->select('COUNT(b) quantity')
                        ->where('b.captionFull=:captionFull AND b.city=:city')
                        ->setParameters(['captionFull' => $data['captionFull'], 'city' => $data['city']])
                        ->getQuery()->getOneOrNullResult();
        return $res;
    }

}
