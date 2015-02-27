<?php

/**
 * Репозиторий для работы с сущностью PreOrder\PreOrder
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Entity\Repository\PreOrder;

use Doctrine\ORM\EntityRepository;

class PreOrderRepository extends EntityRepository {

    /**
     * @param $preorderSimiliar
     * @return mixed
     */
    public function findPreOrdersForUnion($preorderSimiliar) {
        $res=$this->createQueryBuilder('po')
         //   ->where('po.contragent=:contragent')
         ->where('po.email=:email')
            ->andWhere('po.id!=:preorder_id')
            ->andWhere('po.status IS NULL')
            ->andWhere('po.isVisible=1')
            ->setParameters([
               // 'contragent'=>$preorderSimiliar->getContragent()->getId(),
                'email'=>$preorderSimiliar->getEmail(),
                'preorder_id'=>$preorderSimiliar->getId()
            ])
            ->getQuery()->execute();
        return $res;
    }

    /**
     * Ищет предзаказ по мылу и продукту
     * @param type $email
     * @param type $product_id
     * @return type
     */
    public function findByEmailAndProduct($email, $product_id) {
        $qb = $this->createQueryBuilder('o')->join('o.compositions', 'c');
        $res =  $qb->where('o.email=:email')
                        ->andWhere('o.isVisible=1')
                        ->andWhere('c.product=:product_id')
                        ->andWhere($qb->expr()->isNull('o.status'))
                        ->setParameters(['email' => $email, 'product_id' => $product_id])
                        ->getQuery()->getOneOrNullResult();
        return $res;
    }

}
