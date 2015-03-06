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
    /**
     * Построение запроса на выборку рекламных компаний
     * @param array $options
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function generateQueryBuilderByFilter(array $options)
    {
        $query = $this->createQueryBuilder('ac')
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
     * Находит рекламную компанию для удаления
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
     * Находит количество рекламных компаний по опциям
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
