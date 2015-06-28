<?php

/**
 * Репозиторий, содержащий для сущности AdPlace
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class AdPlaceRepository extends EntityRepository {
    /**
     * Построение запроса на выборку рекламных мест
     * @param array $options
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function generateQueryBuilderByFilter(array $options)
    {
        $query = $this->createQueryBuilder('ap')
            ->setMaxResults($options['maxResults']);

        if (isset($options['user'])) {
            $query
                ->andWhere('ap.user=:user')
                ->orderBy('ap.id', 'DESC')
                ->setParameter(':user', $options['user']->getId());
        }

        return $query;
    }

    /**
     * Находит рекламное место для удаления
     * @param $options
     */
    public function findForDeleting($options)
    {
        $res = $this->createQueryBuilder('ap')
            ->where('ap.user=:user')
            ->andWhere('ap.id=:id')
            ->setParameters(
                [':user' => $options['user']->getId(),
                    ':id' => $options['id']
                ]
            )
            ->getQuery()->
            getOneOrNullResult();

        return $res;
    }

    /**
     * Return adplaces for site and user
     * @param $userId
     * @param $siteId
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findForSite($userId, $siteId)
    {
        $res = $this->createQueryBuilder('ap')
            ->leftJoin('ap.user', 'user')
            ->leftJoin('ap.site', 'site')
            ->where('user.id = :userId')
            ->andWhere('site.id = :siteId')
            ->setParameters(
                [':userId' => $userId,
                 ':siteId' => $siteId
                ]
            )
            ->getQuery()->
            getResult();

        return $res;
    }


}
