<?php

/**
 * Репозиторий, содержащий для сущности AdCompany
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\AdCompanyBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class AdCompanyRepository extends EntityRepository
{

    public function findForStatus($id, $userId)
    {
        return $this->createQueryBuilder('a')
            ->where('a.id=:id')
            ->andWhere('a.user=:userId')
            ->setParameters(['id' => $id, 'userId' => $userId])
            ->getQuery()->getOneOrNullResult();
    }

    /**
     * Построение запроса на выборку рекламных кампаний
     * @param array $options
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function generateQueryBuilderByFilter(array $options)
    {
        $query = $this->createQueryBuilder('ac')
            ->select('ac,p,s,pb,adPlace,site')
            ->leftJoin('ac.placements', 'p')
            ->leftJoin('p.placementBannersList', 'pb')
            ->leftJoin('p.adPlace', 'adPlace')
            ->leftJoin('adPlace.site', 'site')
            ->leftJoin('p.statistics', 's')
            ->setMaxResults($options['maxResults']);

        if (isset($options['user'])) {

            $query
                ->where('ac.user=:user')
                ->orderBy('ac.id', 'DESC')
                ->setParameter(':user', $options['user']->getId());
        }

        return $query;
    }

    /**
     * Находит рекламную кампанию для удаления
     * @param $options
     */
    public function findForDeleting($options)
    {
        $res = $this->createQueryBuilder('ac')
            ->where('ac.user=:user')
            ->andWhere('ac.id=:id')
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
     * Находит количество рекламных кампаний по опциям
     * @param $options
     */
    public function findQuantityByOptions($options)
    {
        $query = $this->createQueryBuilder('ac')->select('COUNT(ac) quantity');


        if (isset($options['user'])) {
            $query->Where('ac.user=:user')->setParameter('user', $options['user']->getId());
        };

        if (isset($options['id'])) {
            $query->andWhere('ac.id!=:id')->setParameter('id', $options['id']);
        }

        if (isset($options['name'])) {
            $query->andWhere('ac.name=:name')->setParameter('name', $options['name']);
        }

        $res = $query->getQuery()->getOneOrNullResult();

        return $res;
    }
}
