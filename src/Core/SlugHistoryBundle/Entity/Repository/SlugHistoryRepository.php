<?php
/**
 * Репозиторий для работы с сущностью SlugHistory
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SlugHistoryBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Core\SlugHistoryBundle\Entity\SlugHistory;

class SlugHistoryRepository extends EntityRepository
{

    /**
     * Удаление URL по className и targetId
     *
     * @param string $className
     * @param string $targetId
     * @return integer - кол-во удаленных URL
     */
    public function remove($className, $targetId)
    {
        $count = $this
            ->createQueryBuilder('url')
            ->delete('CoreSlugHistoryBundle:SlugHistory', 'url')
            ->where('url.className = :className')
            ->andWhere('url.targetId = :targetId')
            ->setParameter('className', $className)
            ->setParameter('targetId', $targetId)
            ->getQuery()
            ->execute();
        return $count;
    }
}