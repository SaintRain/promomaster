<?php

/**
 * Репозиторий, для работы с сущностью ImageFile
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FileBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class ImageFileRepository extends EntityRepository
{
    /**
     * Поиск записей с у котороых нет ширины и высоты
     * @return type
     */
    public function findWithoutAttr()
    {
        $qb = $this->createQueryBuilder('i');
        $qb->where($qb->expr()->isNull('i.height'))
           ->orWhere($qb->expr()->isNull('i.width'))
        ;

        $result = $qb->getQuery()->getResult();

        return $result;
    }
}
