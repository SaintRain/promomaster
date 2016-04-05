<?php

/**
 * Репозиторий, содержащий для сущности WebSite
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Core\SiteBundle\Entity\Repository\CommonSiteRepository;
use  Core\SiteBundle\Entity\WebSite;
use Core\SiteBundle\Model\SearchFilter;
class WebSiteRepository extends CommonSiteRepository
{

    public function searchByFilter(SearchFilter $filter)
    {
        $query = $this->createQueryBuilder('s')
            ->select('s')
            ->leftJoin('s.adPlaces', 'aP', 'WITH', 'aP.isShowInCatalog=1')
            ->leftJoin('aP.statistics', 'st', 'WITH', 'st.adPlace=aP.id AND st.site=s.id')
            ->leftJoin('s.categories', 'c')
            ->orderBy('s.tyc','DESC')
            ->where('s.isVerified = 1');

        if ($filter->getKeywords()) {
            $query->andWhere('(s.keywords LIKE :keywords OR s.shortDescription LIKE :keywords OR s.description LIKE :keywords)')
                ->setParameter('keywords', '%' . $filter->getKeywords() . '%');
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


    public function getSitesForScreenshotCreating() {

         return  $this->createQueryBuilder('s')
             ->where('s.isHaveSnapshot = :isHaveSnapshot AND s.isVerified=1')
             ->setParameters(['isHaveSnapshot' => false])
             ->getQuery()
             ->execute();

    }

    public function findFakeWebSite(WebSite $site)
    {
        $res = $this->createQueryBuilder('s')
            ->where('s.domain = :domain AND s.user=:user')
            ->setParameters(['domain' => $site->getDomain(), 'user' => 2])
            ->getQuery()
            ->getOneOrNullResult();

        return $res;
    }

    /**
     * Находит площадку по опциям
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
