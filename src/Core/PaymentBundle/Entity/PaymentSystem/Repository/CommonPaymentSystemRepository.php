<?php

/**
 * Репозиторий для работы с сущностью Common
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Entity\PaymentSystem\Repository;

use Doctrine\ORM\EntityRepository;

class CommonPaymentSystemRepository extends EntityRepository
{

    /**
     * Поиск активных платежных систем, с учетом сортировки
     * возвращает ассоциативный массив (тип плаежной системы является ключем)
     *
     * @return array
     */
    public function findAllEnabled()
    {
        $paymentSetems = $this->_em->createQueryBuilder()
            ->select('ps')
            ->from($this->_entityName, 'ps', 'ps.system')
            ->where('ps.isEnabled = :isEnable')
            ->setParameter('isEnable', true)
            ->orderBy('ps.indexPosition', 'ASC')
            ->getQuery()
            ->execute();
        return $paymentSetems;
    }

}
