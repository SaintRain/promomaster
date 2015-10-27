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
use Core\SiteBundle\Entity\AdPlace;

class StatisticsRepository extends EntityRepository
{

    public function getSiteStatisticsForPeriod(CommonSite $site, \DateTime $start = null, \DateTime $end = null)
    {

        $q = $this->createQueryBuilder('s')
            ->select('aP.id, SUM(s.showsQuantity) showsQuantity, SUM(s.clicksQuantity) clicksQuantity, round(SUM(s.clicksQuantity)/(SUM(s.showsQuantity)/100), 2) AS ctr')
            ->join('s.site', 'site')
            ->join('s.adPlace', 'aP')
            ->where('s.site=:site')
            ->groupBy('aP.id')
            ->setParameter('site', $site->getId());


        if ($start && $end) {
            $q->andWhere('s.startDateTime>=:start AND s.finishDateTime<=:end')
                ->setParameters(['start' => $start, 'end' => $end, 'site' => $site->getId()]);
        }

        $res = $q->getQuery()->getArrayResult();

        if ($res) {
            $res2 = [];
            foreach ($res as $key => $row) {
                foreach ($row as $key2 => $v) {
                    if (is_null($v)) {
                        $res[$key][$key2] = 0;
                    }
                    $res2[$row['id']] = $res[$key];
                }
            }
        } else {
            $res2 = null;
        }


        return $res2;
    }

    public function getCommonStatisticsForSites($ids)
    {

        $res = $this->createQueryBuilder('s')
            ->select('site.id, SUM(s.showsQuantity) showsQuantity, SUM(s.clicksQuantity) clicksQuantity, round(SUM(s.clicksQuantity)/(SUM(s.showsQuantity)/100), 2) AS ctr')
            ->join('s.site', 'site')
            ->join('s.adPlace', 'aP', 'WITH', 'aP.isShowInCatalog=1')
            ->where('s.site IN (:ids)')
            ->setParameter('ids', array_values($ids))
            ->groupBy('site.id')
            ->getQuery()->getArrayResult();

        $res2 = [];
        foreach ($res as $r) {
            $res2[$r['id']] = $r;
        }

        return $res2;

    }

    public function getCommonStatisticsForPlacements($ids)
    {

        $res = $this->createQueryBuilder('s')
            ->select('p.id, s.startDateTime, round((s.startDateTime) / 1800)  startHour, SUM(s.showsQuantity) showsQuantity, SUM(s.clicksQuantity) clicksQuantity')
            ->leftJoin('s.placement', 'p')
            ->leftJoin('s.site', 'site')
            ->where('p.id IN (:ids) AND site.id IS NOT NULL')
            ->setParameters(['ids'=> array_values($ids)])
            ->groupBy('startHour, p.id')
            ->getQuery()->getArrayResult();

        $res2 = [];
        foreach ($res as $r) {
            $res2[$r['id']][] = $r;
        }
        return $res2;
    }


    public function getCommonStatisticsForAdCompanies($adcompanies)
    {

        $ids = [];
        foreach ($adcompanies as $adcompany) {
            foreach ($adcompany->getPlacements() as $key => $placement) {
                $ids[] = $placement->getId();
            }
        }

        $res = $this->createQueryBuilder('s')
            ->select('aC.id,  SUM(s.showsQuantity) showsQuantity, SUM(s.clicksQuantity) clicksQuantity, round(SUM(s.clicksQuantity)/(SUM(s.showsQuantity)/100), 2) AS ctr')
            ->leftJoin('s.placement', 'p')
            ->leftJoin('s.site', 'site')
            ->leftJoin('p.adCompany', 'aC')
            ->where('p.id IN (:ids) AND site.id IS NOT NULL')
            ->setParameters(['ids'=> array_values($ids)])
            ->groupBy('aC.id')
            ->getQuery()->getArrayResult();

        $res2 = [];
        foreach ($res as $r) {
            $res2[$r['id']] = $r;
        }
        return $res2;
    }

}
