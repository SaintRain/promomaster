<?php

/**
 * Репозиторий для работы с сущностью ProductDataProperty
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PropertyBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class ProductDataPropertyRepository extends EntityRepository {

    /**
     * Получает для характеристики все данные одним запросом
     * @param array $options
     * @return array
     * @author Sergeev A.M.
     */
    function getMaxAndMinByIdsDataList($IdsDataList) {
        $query = $this
            ->createQueryBuilder('pdp')
            ->select('IDENTITY(pdp.data) dataId, MIN(pdp.valueNumeric) minVal, MAX(pdp.valueNumeric) maxVal')
            ->where('pdp.valueNumeric != :null')->setParameter('null', '')
            ->andWhere('pdp.data IN (:dataIds)')->setParameter('dataIds', $IdsDataList)
            ->groupBy('pdp.data')
            ->getQuery();

        return $query->execute();

    }

}
