<?php

/**
 * Репозиторий, содержащий общие вопросы для работы с сущностью Supply
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Core\LogisticsBundle\Entity\Supply;

class SupplyRepository extends EntityRepository
{

    /**
     * Берет статистику по категории
     * @return type
     */
    public function getSupplyStatisticsByCategory()
    {

        $temp = $this->createQueryBuilder('s')
                        ->select('SUM(pis.quantity) quantity')
                        ->addSelect('SUM(p.price*pis.quantity) quantity_sum')
                        ->addSelect('c.id cat_id')
                        ->join('s.status', 'status')
                        ->join('s.products', 'pis')
                        ->join('pis.product', 'p')
                        ->join('p.categoryMain', 'c')
                        ->where('status.name=:status_name')
                        ->setParameters(['status_name' => Supply::onTheWayStatusName])
                        ->groupBy('c.id')->getQuery()->execute();

        //делаем индекс ID категории
        $res = [];
        foreach ($temp as $r) {
            $res[$r['cat_id']] = $r;
        }
        return $res;
    }

    /**
     * Берет статистику по производителю
     * @return type
     */
    public function getSupplyStatisticsByManufacturer()
    {

        $temp = $this->createQueryBuilder('s')
                        ->select('SUM(pis.quantity) quantity')
                        ->addSelect('SUM(p.price*pis.quantity) quantity_sum')
                        ->addSelect('m.id manufacturer_id')
                        ->join('s.status', 'status')
                        ->join('s.products', 'pis')
                        ->join('pis.product', 'p')
                        ->join('p.manufacturerMain', 'm')
                        ->where('status.name=:status_name')
                        ->setParameters(['status_name' => Supply::onTheWayStatusName])
                        ->groupBy('m.id')->getQuery()->execute();

        //делаем индекс ID категории
        $res = [];
        foreach ($temp as $r) {
            $res[$r['manufacturer_id']] = $r;
        }
        return $res;
    }

    /**
     * Получаем дату ближайшей поставки
     *
     * @return array
     * @author Sergeev A.M.
     */
    public function getFutureSupplyDate($product)
    {
        $data = $this->_em
                ->createQueryBuilder()
                ->select('s.dateTime date, products.id AS productId')
                ->from($this->_entityName, 's')
                ->leftJoin('s.status', 'supplyStatus')
                ->leftJoin('s.products', 'productsInSuply')
                ->leftJoin('productsInSuply.product', 'products')
                ->leftJoin('products.productAvailability', 'productAvailability')
                ->where('supplyStatus.name = :name')
                ->andWhere('products.id = :id')
                ->andWhere('s.dateTime > :now')
                ->andWhere('s.isVirtual = 0')
                ->andWhere('productAvailability.quantityVirtualReal > 0')
                ->setParameter('name', 'v-puty')
                ->setParameter('id', $product->getId())
                ->setParameter('now', date('Y-m-d 00:00:00'))
                ->groupBy('s.id')
                ->addGroupBy('productId')
                ->orderBy('s.dateTime', 'ASC')
                ->getQuery()
                ->setMaxResults(1)
                ->getOneOrNullResult();

        return $data['date'];
    }

}
