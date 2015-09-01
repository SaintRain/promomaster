<?php

/**
 * Репозиторий, содержащий для сущности CommonSite
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Core\SiteBundle\Model\SearchFilter;

class CommonSiteRepository extends EntityRepository
{

    public function searchByFilter(SearchFilter $filter)
    {

        $query = $this->createQueryBuilder('s')
            ->select('s, aP,st')
            ->join('s.categories', 'c')
            ->leftJoin('s.adPlaces', 'aP', 'WITH', 'aP.isShowInCatalog=1')
            ->leftJoin('s.statistics', 'st')

            ->where('s.isVerified = 1');

        if ($filter->getKeywords()) {

            $query->where('(s.keywords LIKE :keywords OR s.shortDescription LIKE :keywords OR s.description LIKE :keywords)')
                ->setParameter('keywords', '%'.$filter->getKeywords().'%');
        }

        if ($filter->getCategories() && $filter->getCategories()->count()) {
            $catIds = [];
            foreach ($filter->getCategories() as $cat) {
                $catIds[] = $cat->getId();
            }
            $query->andWhere('c.id IN (:categories)')
                ->setParameter('categories', $catIds);
        }
        return $query->getQuery();

    }


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

    public function findForCategory($slug, $isVerified = true)
    {
        $res = $this->createQueryBuilder('s')
            ->leftJoin('s.categories', 'cat')
            ->where('cat.slug = :slug')
            ->andWhere('s.isVerified = :isVerified')
            ->setParameters(
                [':isVerified' => $isVerified,
                    ':slug' => $slug
                ]
            )
            ->getQuery()->
            getResult();

        return $res;
    }

}
