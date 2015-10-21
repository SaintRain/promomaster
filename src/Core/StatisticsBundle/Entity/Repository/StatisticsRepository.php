<?php

/**
 * Репозиторий, содержащий для сущности tatistics
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Core\SiteBundle\Entity\CommonSite;

class StatisticsRepository extends EntityRepository
{

    public function getSiteStatisticsForPeriod(CommonSite $site, \DateTime $start = null, \DateTime $end = null)
    {

        $q = $this->createQueryBuilder('s')
            ->select('SUM(s.showsQuantity) showsQuantity, SUM(s.clicksQuantity) clicksQuantity')
            ->join('s.site', 'site')
            ->join('site.adPlaces', 'aP')mai
            ->where('s.site=:site')
//            ->groupBy('s.id')
            ->setParameter('site', $site->getId());

        if ($start && $end) {
            $q->andWhere('s.startDateTime>=:start AND s.finishDateTime<=:end')
                ->setParameters(['start' => $start, 'end' => $end, 'site'=> $site->getId()]);
        }

        $res = $q->getQuery()->getOneOrNullResult();

        return $res;
    }
}
