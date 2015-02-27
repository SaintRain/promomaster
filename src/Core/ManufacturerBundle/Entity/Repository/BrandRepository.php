<?php
/**
 * Репозиторий, содержащий общие вопросы для работы с сущностью Brand
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ManufacturerBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class BrandRepository extends EntityRepository
{

    /**
     * Получает основные данные для построения фильтра
     *
     * @param array $options
     * @return array
     * @author Sergeev A.M.
     */
    function getFilterGeneralData($options)
    {
        if (isset($options['brand'])) {

            $query = $this->createQueryBuilder('b')
                ->select('MIN(products.price) minPrice, MAX(products.price) maxPrice')
                ->addSelect('partial b.{id,captionRu,slug,descriptionRu} brand')
                ->addSelect('partial logo.{id,name,halfPath,altRu}')
                ->addSelect('partial substrate.{id,name,halfPath}')
                ->addSelect('partial country.{id, alpha2}')
                ->addSelect('partial manufacturer. {id, yearOfFoundation, captionRu, '
                    . 'headquartersAddress, email, urlSite, phoneSalesDepartment, '
                    . 'headquartersAddressGoogleMapsLink, headquartersAddressYandexMapsLink}')
                ->leftJoin('b.manufacturer', 'manufacturer')
                ->leftJoin('manufacturer.country', 'country')
                ->leftJoin('b.products', 'products')
                ->leftJoin('b.substrate', 'substrate')
                ->leftJoin('b.logo', 'logo')
                ->where('b.isEnabled = 1')
                ->andWhere('products.isEnabled = 1');

            // добавляем в выборку
            foreach ($options['brand'] as $filed => $value) {
                $query
                    ->andWhere('b.'.$filed.' = :'.$filed)
                    ->setParameter($filed, $value);
            }

            if (isset($options['series'])) {
                $query
                    ->join('products.serie', 'seriesList')
                    ->andWhere('seriesList.id IN ('.$options['series']->getId().')');
            }

            return $query->getQuery()->getOneOrNullResult();
        }

        return null;
    }

    /**
     * Ищет бренды которые находятся в полученной категории
     *
     * @param array $category
     * @return array
     * @author Sergeev A.M.
     */
    function findByCategory($category, $options = array())
    {
        $query = $this
            ->createQueryBuilder('brand')
            ->addSelect('partial brand.{id,captionRu,slug}')
            ->distinct()
            ->leftJoin('brand.products', 'products')
            ->leftJoin('products.categories', 'categories')
            ->where('brand.isEnabled = 1')
            ->andWhere('products.isEnabled = 1 AND products.isVisible = 1');
        if (isset($options['ids'])) {
            $query
                ->andWhere('categories.id IN (:ids)')
                ->setParameter('ids', $options['ids']);
        } else {
            $query
                ->andWhere('categories.id = :id')
                ->setParameter('id', $category->getId());
        }
        $brands = $query
            ->getQuery()
            ->execute();

        return $brands;
    }

    /**
     * Ищет бренды (id, caption, slug) которые находятся в полученных категориях
     *
     * @param array $ids
     * @return array
     * @author Sergeev A.M.
     */
    function findByCategoryIds($ids, $locale = 'ru')
    {
//        $ids = [133, 211];
        $brandsDirty = $this->_em
            ->createQueryBuilder()
            ->distinct()
            ->select('brand.id id', 'brand.caption'.ucfirst($locale).' caption', 'brand.slug slug', 'categories.id categoryId')//
            ->from($this->_entityName, 'brand')
            ->leftJoin('brand.products', 'products')
            ->innerJoin('products.categories', 'categories')
            ->where('brand.isEnabled = 1')
            ->andWhere('categories.id IN (:id)')
            ->setParameter('id', $ids)
            ->getQuery()
            ->execute();

        $brands = [];
        foreach ($brandsDirty as $data) {
            $brands[$data['categoryId']][$data['id']] = $data;
        }

        return $brands;
    }

    /**
     * Получить только те бренды у которых есть товары
     * @param type $isEnabled
     * @return type
     */
    public function findOnlyWithProducts($limit = null, $isEnabled = true)
    {
        $qb = $this->createQueryBuilder('b');
        $qb
            //->select('b, logo')
            ->select('partial b .{id,captionRu,slug,isEnabled}')
            ->addSelect('partial logo.{id,name,halfPath,altRu}')
            ->leftJoin('b.products', 'p')
            ->leftJoin('b.logo', 'logo')
            ->where('b.isEnabled = :isEnabled')
            ->andWhere('p.isEnabled = :isEnabled')
            ->andWhere('p.isVisible = :isEnabled')
            ->orderBy('b.indexPosition', 'ASC');

        if ($limit) {
            $qb->groupBy('b.id')
                ->setMaxResults($limit);
        }
        $qb->setParameter('isEnabled', $isEnabled);

        $result = $qb->getQuery()->getResult();
        // кеширование
        //$qb->getQuery()->useResultCache(true, 10)->getResult();
//        $qb->getQuery()->getResult();

        return $result;
    }

    /**
     * Получает данные для построения sitemap
     *
     * @return array
     * @author Sergeev A.M.
     */
    public function findForPopulateSitemap()
    {
        $slugs = $this->createQueryBuilder('b')
            ->select('b.slug slug')
            ->leftJoin('b.products', 'p')
            ->where('b.isEnabled = 1')
            ->andWhere('p.isEnabled = 1')
            ->andWhere('p.isVisible = 1')
            ->groupBy('b.id')
            ->getQuery()
            ->getResult();
        return $slugs;
    }

    /**
     * Получает название всех брендов поставщика, товары для которых активны, через запятую
     *
     * @return array
     * @author Sergeev A.M.
     */
    public function getBrandsBySupplierId($id)
    {
        $result = $this
            ->createQueryBuilder('b')
            ->select('b')
            ->leftJoin('b.products', 'products')
            ->leftJoin('products.supplier', 'supplier')
            ->where('supplier.id = :id')
            ->andWhere('products.isEnabled = 1 AND products.isVisible = 1')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult()
        ;
        return $result;
    }
}