<?php

/**
 * Репозиторий, содержащий для сущности CommonBanner
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\BannerBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;



class CommonBannerRepository extends EntityRepository
{


    /**
     * Построение запроса на выборку сайтов
     * @param array $options
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function generateQueryBuilderByFilter(array $options)
    {
        $query = $this->createQueryBuilder('b')
            ->setMaxResults($options['maxResults']);

        if (isset($options['user'])) {
            $query
                ->andWhere('b.user=:user')
                ->orderBy('b.id', 'DESC')
                ->setParameter(':user', $options['user']->getId())  ;
        }
        return $query;
    }

    /**
     * Находит баннер для удаления
     * @param $options
     */
    public function findForDeleting($options)
    {
        $res = $this->createQueryBuilder('b')
            ->where('b.user=:user')
            ->andWhere('b.id=:id')
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
     * Находит баннеры по опциям
     * @param $options
     */
    public function findQuantityByOptions($options)
    {
        $query = $this->createQueryBuilder('b')->select('COUNT(b) quantity');


        if (isset($options['user'])) {
            $query->Where('b.user=:user')->setParameter('user', $options['user']->getId());
        };

        if (isset($options['id'])) {
            $query->andWhere('b.id!=:id')->setParameter('id', $options['id']);
        }

        if (isset($options['name'])) {
            $query->andWhere('b.name=:name')->setParameter('name', $options['name']);
        }

        if (isset($options['isRemoved'])) {
            $query->andWhere('b.isRemoved=:isRemoved')->setParameter('isRemoved', $options['isRemoved']);
        }


        $res = $query->getQuery()->getOneOrNullResult();

        return $res;
    }

    /**
     * Построение запроса на выборку заглушек
     * @param array $options
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function generateGagQueryBuilderByFilter(array $options)
    {
        $query = $this->createQueryBuilder('b');

        $query
            ->where('b.isGag = :isGag')
            ->andWhere('b.user=:user')
            ->orderBy('b.id', 'DESC')
            ->setMaxResults($options['maxResults'])
            ->setParameter(':user', $options['user']->getId())
            ->setParameter(':isGag', $options['isGag'])
        ;
        return $query;
    }

    /**
     * @param $userId
     * @return array
     */
    public function getGagsCount($userId, $isGag = true)
    {
        $qb = $this->createQueryBuilder('g');
        $qb->select('COUNT (g.id) as total')
            ->leftJoin('g.user', 'u')
            ->where('u.id = :userId')
            ->andWhere('g.isGag = :isGag')
            ->setParameter('userId', $userId)
            ->setParameter('isGag', $isGag)
        ;

        $result = $qb->getQuery()->getOneOrNullResult();
        if (isset($result['total']) && $result['total']) {
            return (int)$result['total'];
        } else {
            return null;
        }
    }
}
