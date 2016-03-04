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

class WebSiteRepository extends CommonSiteRepository
{


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
