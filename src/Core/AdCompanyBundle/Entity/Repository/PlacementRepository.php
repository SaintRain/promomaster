<?php

/**
 * Репозиторий, содержащий для сущности Placement
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\AdCompanyBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class PlacementRepository extends EntityRepository {


    /**
     * Построение запроса на выборку размещений
     * @param array $options
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function generateQueryBuilderByFilter(array $options)
    {
        $query = $this->createQueryBuilder('p')
            ->setMaxResults($options['maxResults']);

        if (isset($options['user'])) {

            $query
                ->join('p.adCompany', 'adCompany')
                ->join('p.adPlace', 'adPlace')
                ->andWhere('adCompany.user=:user')
                ->orderBy('p.id', 'DESC')

                ->setParameter(':user', $options['user']->getId());
        }

        return $query;
    }

    /**
     * Находит размещение для удаления
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
