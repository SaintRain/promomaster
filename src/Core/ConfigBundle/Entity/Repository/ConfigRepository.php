<?php

/**
 * Репозиторий для работы с сущностью Config
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ConfigBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class ConfigRepository extends EntityRepository
{

    /**
     * Возвращает все настройки с индексом по имени
     * @return type
     */
    public function getAllByIndexName()
    {
        $res = $this->_em->createQueryBuilder()
                        ->select('c')
                        ->from($this->getClassName(), 'c', 'c.name')
                        ->getQuery()
                        ->useResultCache(true, 5)
//                ->useResultCache(true, 360)
                ->execute();
        return $res;
    }

}
