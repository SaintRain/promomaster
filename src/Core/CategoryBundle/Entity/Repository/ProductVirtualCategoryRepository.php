<?php

/**
 * Репозиторий, содержащий общие вопросы для работы с сущностью ProductVirtualCategory
 * @author  Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class ProductVirtualCategoryRepository extends EntityRepository
{
    /**
     * Берёт все категории по INDEXBY id
     * @return type
     */
    function geAllByIndexId()
    {
        $res = $this->_em->createQueryBuilder()
            ->select('c')
            ->from($this->getClassName(), 'c', 'c.id')
            ->getQuery()->execute();
        return $res;
    }

    /**
     * Поиск активных вирт. Категорий и товаров для них
     * @param type $isEnabled
     * @return type
     */
    public function findWithProducts($isEnabled = true)
    {
        $qb = $this->createQueryBuilder('c');

        $qb
            //->select('c, p, productAvailability, images, categoryMain')
            
            ->select('partial c.{id, captionRu, name}')
            ->addSelect('partial p.{id, captionRu, price, oldPrice, orderOnly, slug, isDiscontinued, reviewsRating, reviewsCount}')
            ->addSelect('partial categoryMain.{id, captionRu, slug}')
            ->addSelect('partial images.{id, name, altRu, halfPath, indexPosition}')
            ->addSelect('partial productAvailability.{id, quantityVirtual, quantity, quantityVirtualReal}')
            ->addSelect('partial manufacturer.{id, captionRu, slug}')
            ->leftJoin('c.products', 'p')
            ->leftJoin('p.manufacturers', 'manufacturer')
            ->leftJoin('p.productAvailability', 'productAvailability')
            ->leftJoin('p.images', 'images')
            ->leftJoin('p.categoryMain', 'categoryMain')
            ->where('c.isEnabled = :isEnabled')
            ->andWhere('p.isEnabled = :isEnabled')
            ->andWhere('p.isVisible = :isEnabled')
            ->orderBy('p.id', 'DESC')
        ;

        $qb->setParameter('isEnabled', $isEnabled);

        $result = $qb->getQuery()->getResult();

        return $result;
    }
}