<?php

/**
 * Репозиторий, содержащий общие вопросы для работы с сущностью ProductInSupply
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class ProductInSupplyRepository extends EntityRepository {


    /**
     * Сомтрим, есть ли заданные продукты в составах заказов
     * @param type $product
     * @return type
     */
    public function getQuantityForProducts($products)
    {

        $product_ids = [];
        foreach ($products as $p) {
            $product_ids[] = $p->getId();
        }

        if (count($product_ids)) {
            $tmp = $this->_em
                            ->createQueryBuilder()
                            ->select('COUNT(c) quantity, IDENTITY(c.product) p_id')
                            ->from($this->getClassName(), 'c')
                            ->where('c.product IN (:product_ids)')
                            ->setParameters(['product_ids' => $product_ids])
                            ->groupBy('c.product')
                            ->getQuery()->execute();            

            $res = [];
            foreach ($tmp as $r) {
                $res[$r['p_id']] = $r['quantity'];
            }
            return $res;
        }
    }
}

