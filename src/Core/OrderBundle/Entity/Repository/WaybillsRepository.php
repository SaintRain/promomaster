<?php

/**
 * Репозиторий, содержащий общие вопросы для работы с сущностью Waybills
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class WaybillsRepository extends EntityRepository
{
    /**
     * Поиск накладных со связанным сушностями
     * @return type
     */
    public function findForTracking($status = true)
    {
        $qb = $this->createQueryBuilder('w');
        $qb->select('w, s, d, c, company, o'/*, contragent, user'*/)
            ->join('w.salesMan', 's')
            ->join('w.order', 'o')
            //->join('o.contragent', 'contragent')
            //->join('contragent.user', 'user')
            ->join('w.deliveryCity', 'c')
            ->join('w.deliveryMode', 'd')
            ->join('d.company', 'company')
            ->where('w.isSent = :status')
            ->andWhere('w.isDone != :status')
        ;
        
        $qb->setParameter('status', $status);

        $result = $qb->getQuery()->getResult();

        return $result;
    }
    
    /**
     * Поиск накладной с транспортной компанией
     * @param type $waybillId
     */
    public function findWithCompany($waybillId)
    {
        $qb = $this->createQueryBuilder('w');
        $qb->select('w, d, c')
            ->join('w.deliveryMode', 'd')
            ->join('d.company', 'c');

        $qb->setParameter('w.number', $waybillId);

        $result = $qb->getQuery()->getOneOrNullResult();
    }
}
