<?php

/**
 * Репозиторий, содержащий общие вопросы для работы с сущностью Manufacturer
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ManufacturerBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class ManufacturerRepository extends EntityRepository
{

    /**
     * Берёт все производители по INDEXBY id
     * @return type
     */
    function geAllByIndexId()
    {
        $res = $this->_em->createQueryBuilder()
                ->select('m')
                ->from($this->getClassName(), 'm', 'm.id')
                ->getQuery()->execute();
        return $res;
    }

}
