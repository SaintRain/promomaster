<?php

/**
 * Репозиторий, содержащий общие вопросы для работы с сущностью Series
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ManufacturerBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class SeriesRepository extends EntityRepository {

    /**
     * Ищем серии с продуктами
     *
     * @return array
     * @author Sergeev A.M.
     */
    public function findSeriesWithProduct($brand)
    {
        $series = $this
            ->createQueryBuilder('series')
            ->select('partial series.{id,captionRu,slug}')
            ->leftJoin('series.brand', 'brand')
            ->leftJoin('brand.products', 'products')
            ->leftJoin('products.serie', 'serie')
            ->where('products.isEnabled = 1')
            ->andWhere('products.isVisible = 1')
            ->andWhere('brand.id = :id')
            ->andWhere('series.id = serie.id')
            ->setParameter('id', $brand->getId())
            ->groupBy('series.id')
            ->getQuery()
            ->execute();

        return $series;
    }

}
