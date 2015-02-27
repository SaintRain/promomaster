<?php

/**
 * Репозиторий, содержащий общие вопросы для работы с сущностью Stock
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class StockRepository extends EntityRepository
{

    /**
     * Берёт все склады по INDEXBY id
     * @return type
     */
    function geAllByIndexId($stock_ids = [])
    {
        $query = $this->_em->createQueryBuilder()
                ->select('s')
                ->from($this->getClassName(), 's', 's.id');

        //если задано ограничение
        if (count($stock_ids)) {
            $query
                    ->where('s.id IN (:stock_ids)')
                    ->setParameter('stock_ids', $stock_ids);
        }
        $res = $query->getQuery()->execute();

        return $res;
    }

    /**
     * Если есть склад отмеченный как главный,то мы сбрасываем его
     * @param type $id - новый главный склад
     */
    function resetGeneralStock($id)
    {
        $this->createQueryBuilder('s')
                ->update()
                ->set('s.isGeneralStock', 'NULL')
                ->where('s.isGeneralStock=1')
                ->andWhere('s.id!=:id')
                ->setParameter('id', $id)->getQuery()->execute();
    }

    /**
     * Получить склад с городом
     * @param type $id
     */
    public function findWithCity($id = null)
    {
        $qb = $this->createQueryBuilder('s');
        $qb->select('s,c')
                ->leftJoin('s.city', 'c');
        if ($id) {
            $qb->where('s.id = :id')
                ->setParameter('id', $id)
            ;
        } else {
            $qb->where('s.isGeneralStock = :isGeneralStock')
                ->setParameter('isGeneralStock', true)
            ;
        }
        $result = $qb->getQuery()->getOneOrNullResult();

        return $result;
    }

}
