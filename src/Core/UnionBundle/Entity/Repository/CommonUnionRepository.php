<?php

/**
 * Репозиторий, для работы с сущностью CommonUnion
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\UnionBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class CommonUnionRepository extends EntityRepository
{

    /**
     * Получаем альтернативные продукты
     *
     * @param object $product
     * @return array
     * @author Sergeev A.M.
     */
    public function getAlternativeProducts($product)
    {
        $alternative = $this->createQueryBuilder('alternative')
            ->select('alternative')

            ->addSelect('partial alternativeTargetObject.{id,captionRu,slug,price,oldPrice,reviewsRating,reviewsCount,orderOnly,isEnabled,isVisible}')
            ->addSelect('partial alternativeManufacturers.{id,captionRu,slug}')
            ->addSelect('partial alternativeImages.{id,name,halfPath,altRu}')
            ->addSelect('partial alternativeCategoryMain.{id,captionRu,slug}')
            ->addSelect('partial alternativeProductAvailability.{id,quantity,quantityVirtual,quantityVirtualReal}')

            ->join('alternative.mappedObject', 'p')
            ->leftJoin('alternative.targetObject', 'alternativeTargetObject')
            ->leftJoin('alternativeTargetObject.images', 'alternativeImages')
            ->leftJoin('alternativeTargetObject.categoryMain', 'alternativeCategoryMain')
            ->leftJoin('alternativeTargetObject.manufacturers', 'alternativeManufacturers')
            ->leftJoin('alternativeTargetObject.productAvailability', 'alternativeProductAvailability')
            ->where('p.id = :id')
            ->andWhere('alternativeTargetObject.isVisible = 1 AND alternativeTargetObject.isEnabled = 1')
            ->setParameter('id', $product->getId())
            ->getQuery()
            ->execute();

        return $alternative;
    }
    /**
     * Получаем подобные продукты
     *
     * @param object $product
     * @return array
     * @author Sergeev A.M.
     */
    public function getSimilarsProducts($product)
    {
        $similars = $this->createQueryBuilder('similars')
            ->select('similars')

            ->addSelect('partial similarsTargetObject.{id,captionRu,slug,price,oldPrice,reviewsRating,reviewsCount,orderOnly,isEnabled,isVisible}')
            ->addSelect('partial similarsManufacturers.{id,captionRu,slug}')
            ->addSelect('partial similarsImages.{id,name,halfPath,altRu}')
            ->addSelect('partial similarsCategoryMain.{id,captionRu,slug}')
            ->addSelect('partial similarsProductAvailability.{id,quantity,quantityVirtual,quantityVirtualReal}')

            ->join('similars.mappedObject', 'p')
            ->leftJoin('similars.targetObject', 'similarsTargetObject')
            ->leftJoin('similarsTargetObject.images', 'similarsImages')
            ->leftJoin('similarsTargetObject.categoryMain', 'similarsCategoryMain')
            ->leftJoin('similarsTargetObject.manufacturers', 'similarsManufacturers')
            ->leftJoin('similarsTargetObject.productAvailability', 'similarsProductAvailability')
            ->where('p.id = :id')
            ->andWhere('similarsTargetObject.isVisible = 1 AND similarsTargetObject.isEnabled = 1')
            ->setParameter('id', $product->getId())
            ->getQuery()
            ->execute();

        return $similars;
    }

    /**
     * Получаем аксессуары продукта
     *
     * @param object $product
     * @return array
     * @author Sergeev A.M.
     */
    public function getAccessoriesProducts($product)
    {
        $accessories = $this->createQueryBuilder('accessories')
            ->select('accessories')

            ->addSelect('partial accessoriesTargetObject.{id,captionRu,slug,price,oldPrice,reviewsRating,reviewsCount,orderOnly,isEnabled,isVisible}')
            ->addSelect('partial accessoriesManufacturers.{id,captionRu,slug}')
            ->addSelect('partial accessoriesImages.{id,name,halfPath,altRu}')
            ->addSelect('partial accessoriesCategoryMain.{id,captionRu,slug}')
            ->addSelect('partial accessoriesProductAvailability.{id,quantity,quantityVirtual,quantityVirtualReal}')

            ->join('accessories.mappedObject', 'p')
            ->leftJoin('accessories.targetObject', 'accessoriesTargetObject')
            ->leftJoin('accessoriesTargetObject.images', 'accessoriesImages')
            ->leftJoin('accessoriesTargetObject.categoryMain', 'accessoriesCategoryMain')
            ->leftJoin('accessoriesTargetObject.manufacturers', 'accessoriesManufacturers')
            ->leftJoin('accessoriesTargetObject.productAvailability', 'accessoriesProductAvailability')
            ->where('p.id = :id')
            ->andWhere('accessoriesTargetObject.isVisible = 1 AND accessoriesTargetObject.isEnabled = 1')
            ->setParameter('id', $product->getId())
            ->getQuery()
            ->execute();

        return $accessories;
    }
    /**
     * Получаем кол-ные альтернативы продукта
     *
     * @param object $product
     * @return array
     * @author Sergeev A.M.
     */
    public function getQuantityAlternativeProducts($product)
    {
        $quantityAlternative = $this->createQueryBuilder('quantityAlternative')
            ->select('quantityAlternative')

            ->addSelect('partial quantityAlternativeTargetObject.{id,captionRu,slug,price,oldPrice,reviewsRating,reviewsCount,orderOnly,isEnabled,isVisible}')
            ->addSelect('partial quantityAlternativeManufacturers.{id,captionRu,slug}')
            ->addSelect('partial quantityAlternativeImages.{id,name,halfPath,altRu}')
            ->addSelect('partial quantityAlternativeCategoryMain.{id,captionRu,slug}')
            ->addSelect('partial quantityAlternativeProductAvailability.{id,quantity,quantityVirtual,quantityVirtualReal}')

            ->join('quantityAlternative.mappedObject', 'p')
            ->leftJoin('quantityAlternative.targetObject', 'quantityAlternativeTargetObject')
            ->leftJoin('quantityAlternativeTargetObject.images', 'quantityAlternativeImages')
            ->leftJoin('quantityAlternativeTargetObject.categoryMain', 'quantityAlternativeCategoryMain')
            ->leftJoin('quantityAlternativeTargetObject.manufacturers', 'quantityAlternativeManufacturers')
            ->leftJoin('quantityAlternativeTargetObject.productAvailability', 'quantityAlternativeProductAvailability')
            ->where('p.id = :id')
            ->andWhere('quantityAlternativeTargetObject.isVisible = 1 AND quantityAlternativeTargetObject.isEnabled = 1')
            ->setParameter('id', $product->getId())
            ->getQuery()
            ->execute();

        return $quantityAlternative;
    }

}
