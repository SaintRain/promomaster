<?php
/**
 * Репозиторий для работы с сущностью Holiday
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\HolidayBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Core\HolidayBundle\Entity\Holiday;

class HolidayRepository extends EntityRepository
{

    /**
     * Поиск даты в уже имеющихся диапазонах дат
     *
     * @param datetime $startedAt
     * @param datetime $endedAt
     */
    public function intersection($holiday)
    {
        $startedAt = $holiday->getStartedAt()->format('Y-m-d 00:00:00');
        $endedAt   = $holiday->getEndedAt()->format('Y-m-d 23:59:59');

        $result = $this->createQueryBuilder('h')
            ->addSelect('SUM(CASE WHEN ((:startedAt BETWEEN h.startedAt AND h.endedAt) OR (:startedAt = h.startedAt)) THEN 1 ELSE 0 END) AS startedAt')
            ->addSelect('SUM(CASE WHEN ((:endedAt   BETWEEN h.startedAt AND h.endedAt) OR (:endedAt   = h.endedAt))   THEN 1 ELSE 0 END) AS endedAt')
            ->addSelect('SUM(CASE WHEN ((h.startedAt >= :startedAt AND :endedAt >= h.endedAt)) THEN 1 ELSE 0 END) AS existInside')
            ->where('h.id != :id')
            ->setParameter('startedAt', $startedAt)
            ->setParameter('endedAt', $endedAt)
            ->setParameter('id', $holiday->getId() ? $holiday->getId() : 0)
            ->getQuery()
            ->getSingleResult();

        return $result;
    }

    /**
     * Поиск праздника по текушей дате
     */
    public function getHoliday()
    {
        $result = $this->createQueryBuilder('h')
            ->select('partial h.{id}')
            ->addSelect('partial logo.{id,name,halfPath}')
            ->where(':date BETWEEN h.startedAt AND h.endedAt')
            ->andWhere('h.isEnabled = 1')
            ->leftJoin('h.logo', 'logo')
            ->setParameters(['date' => date('Y-m-d H:i:s')])
            ->getQuery()
            ->useResultCache(true, 3600)
            ->getOneOrNullResult();

        return $result;
    }
}