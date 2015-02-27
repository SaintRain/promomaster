<?php

/**
 * Репозиторий, содержащий общие вопросы для работы с сущностью DataProperty
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PropertyBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class DataPropertyRepository extends EntityRepository {

    /**
     * Берём назначаемые свойства характерисики
     * @param type $options
     * @return type
     */
    function getDataPropertyMultiple($options = array()) {

        $query = $this
                ->createQueryBuilder('dp')
                ->select('dp,pdp')
                ->leftJoin('dp.productDataProperty', 'pdp WITH pdp.product = :product')
                ->Where('dp.id IN (:dataIn)')
                ->setParameters([':product' => $options['product'], ':dataIn' => $options['dataIn']]);

        return $query->getQuery()->execute();
    }
    
}
