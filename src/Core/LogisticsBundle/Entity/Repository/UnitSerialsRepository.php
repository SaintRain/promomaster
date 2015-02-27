<?php

/**
 * Репозиторий, содержащий общие вопросы для работы с сущностью UnitSerials
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;

class UnitSerialsRepository extends EntityRepository {

    /**
     * Проверяет товарные позиции, чтобы не было одинаковых MAC-адресов
     * @param type $checkIds
     * @param type $checkMac
     * @return type
     */
    function checkSerials($checkIds, $checkMac) {
        $res = $this->createQueryBuilder('u')
                        ->where('u.id NOT IN (:checkIds) AND u.value IN (:checkMac)')
                        ->setParameters(['checkIds' => $checkIds, 'checkMac' => $checkMac])
                        ->getQuery()->execute();
        return $res;
    }

}

