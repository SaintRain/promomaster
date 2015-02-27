<?php

/**
 * Репозиторий для работы с сущностью City (Город)
 *
 * @author  Kaluzhniy. N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class CityRepository extends EntityRepository
{
    public function countByCountries($ids)
    {
        $qb = $this->createQueryBuilder('c');
        $qb->select('c, COUNT(c.id) AS citiesAmount, country')
           ->leftJoin('c.country', 'country')
           ->where($qb->expr()->in('c.country', ':ids'))
           ->groupBy('country.id');
        $qb->setParameter('ids', $ids);
        $result = $qb->getQuery()->getResult();
        return $result;
    }

    public function findByName($cityName)
    {
        $qb = $this->createQueryBuilder('c');
        $qb->where($qb->expr()->like('c.name', ':cityName'));
        $qb->setParameter('cityName', $cityName . '%');
        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function findOneByName($cityName)
    {
        $qb = $this->createQueryBuilder('c');
        $qb->where($qb->expr()->like('c.name', ':cityName'));
        $qb->setParameter('cityName', $cityName . '%');
        $result = $qb->setMaxResults(1)->getQuery()->getOneOrNullResult();

        return $result;
    }

    /**
     * Поиск города по имени с регионом
     * @param type $cityName
     * @return type
     */
    public function findWithRegion($cityName)
    {
        $qb = $this->createQueryBuilder('c');

        $qb->select('c, r')
            ->join('c.region', 'r')
            ->where('c.name = :cityName')
        ;

        $qb->setParameter('cityName', $cityName);

        $result = $qb->getQuery()->getResult();

        return $result;
    }

    public function findByGeo($data)
    {
        $qb = $this->createQueryBuilder('c');
        $qb->select('g, c')
            ->leftJoin('c.geoCityList', 'g')
            ->leftJoin('c.region', 'r')
            ->where('g.name = :cityName')
            ->andWhere('r.geoipName = :regionName')
        ;

        $qb->setParameter('cityName', $data['cityName'])
           ->setParameter('regionName', $data['regionName'])
        ;

        $result = $qb->getQuery()->getOneOrNullResult();

        return $result;
    }
}
