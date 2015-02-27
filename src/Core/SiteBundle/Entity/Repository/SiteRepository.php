<?php

/**
 * Репозиторий, содержащий для сущности Site
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class SiteRepository extends EntityRepository
{

    /**
     * Построение запроса на выборку сайтов
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
     * Находит сайт для удаления
     * @param $options
     */
    public function findForDeleting($options)
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

    /**
     * Находит сайты по опциям
     * @param $options
     */
    public function findQuantityByOptions($options)
    {
        $query = $this->createQueryBuilder('s')->select('COUNT(s) quantity');


        if (isset($options['user'])) {
            $query->Where('s.user=:user')->setParameter('user', $options['user']->getId());
        };

        if (isset($options['id'])) {
            $query->andWhere('s.id!=:id')->setParameter('id', $options['id']);
        }

        if (isset($options['domain'])) {
            $query->andWhere('s.domain=:domain')->setParameter('domain', $options['domain']);
        }

        $res = $query->getQuery()->getOneOrNullResult();

        return $res;
    }

}
