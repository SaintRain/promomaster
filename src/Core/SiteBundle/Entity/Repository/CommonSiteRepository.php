<?php

/**
 * Репозиторий, содержащий для сущности CommonSite
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class CommonSiteRepository extends EntityRepository
{

    /**
     * Построение запроса на выборку площадок
     * @param array $options
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function generateQueryBuilderByFilter(array $options)
    {
        $query = $this->createQueryBuilder('s')
            ->setMaxResults($options['maxResults']);

        if (isset($options['user'])) {
            $query
                ->andWhere('s.user=:user')
                ->orderBy('s.id', 'DESC')
                ->setParameter(':user', $options['user']->getId());
        }

        return $query;
    }

    /**
     * Находит площадку для удаления
     * @param $options
     */
    public function findOneByIdAndUser($options)
    {
        $res = $this->createQueryBuilder('s')
            ->where('s.user=:user')
            ->andWhere('s.id=:id')
            ->setParameters(
                [':user' => $options['user']->getId(),
                    ':id' => $options['id']
                ]
            )
            ->getQuery()->
            getOneOrNullResult();

        return $res;
    }



}
