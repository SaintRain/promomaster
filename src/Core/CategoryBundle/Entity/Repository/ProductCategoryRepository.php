<?php

/**
 * Репозиторий, содержащий общие вопросы для работы с сущностью ProductCategory
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Core\CategoryBundle\Entity\Repository\CommonCategoryRepository;
use Doctrine\ORM\Query;

use Gedmo\Tool\Wrapper\EntityWrapper;
use Gedmo\Tree\Strategy,
    Gedmo\Tree\Strategy\ORM\Nested,
    Gedmo\Exception\InvalidArgumentException,
    Gedmo\Exception\UnexpectedValueException,
    Doctrine\ORM\Proxy\Proxy;

class ProductCategoryRepository extends CommonCategoryRepository
{
    /**
     * Берёт категории для вывода YML-файла
     * @param type $options
     * @return type
     */
    function getTreeForYML()
    {
        //берем только те категории, которые активные, есть в них товары и товары есть в наличии
        //также, если есть товары под заказ
        $res = $this
            ->createQueryBuilder('node')
            ->select('node cat,  SUM(pa.quantity) pa_quantity, SUM(CASE WHEN products.orderOnly=1 THEN 1 ELSE 0 END) orderOnlyQuantity')
            ->leftJoin('node.products', 'products')
            ->leftJoin('products.productAvailability', 'pa')
            ->orderBy('node.root, node.lft', 'ASC')
            ->groupBy('node.id')
            ->where('node.isEnabled=1')
            ->getQuery()->execute();


        $cats = [];
        $cats2 = [];    //только те категории для которых есть товар в наличии
        foreach ($res as $r) {
            $parentIsEnabled = true;
            $parent = $r['cat'];
            //смотрим, чтоб родитель был активен
            while ($parent = $parent->getParent()) {
                if (!$parent->getIsEnabled()) {
                    $parentIsEnabled = false;
                    break;
                }
                else if (!$parent) {
                    break;
                }
            }

            if (intval($r['pa_quantity']) > 0 || intval($r['orderOnlyQuantity']) > 0) {
                if ($parentIsEnabled) {
                    $cats2[] = $r['cat'];
                }
            }

            if ($parentIsEnabled) {
                $cats[] = $r['cat'];
            }
        }
        return [$cats, $cats2];
    }

//    public function getPropertyForBuildMenuFilter($names) {
//        $query = $this->createQueryBuilder('dataList')
//                ->addSelect('property,  category')
//                ->join('dataList.property', 'property')
//                ->join('dataList.productDataProperty', 'pdp')
//                ->join('pdp.product', 'p')
//                ->join('property.categories', 'category')
////                ->leftJoin('category.parent', 'parent')                
//                ->where('property.name IN (:names)')
//                ->andWhere('p.isVisible=1')
//                ->setParameter('names', $names)
//                ->orderBy('category.id')
//                
//                ;                
//        return $query->getQuery()->execute();
//    }

    public function getPropertyForBuildMenuFilter($names) {

        $res = $this->createQueryBuilder('category')
                        ->select('category.id cat_id,'
                                . 'property.id property_id,'
                                . 'property.name property_name,'
                                . 'property.captionRu property_captionRu,'
                                . 'property.isEnabled property_isEnabled,'
                                . 'dataList.id datalist_id,'
                                . 'dataList.name datalist_name,'
                                . 'dataList.value datalist_value,'
                                . 'sc.isEnabled settingsCategory_isEnabled'
                        )
                        ->join('category.properties', 'property')
                        ->join('property.dataList', 'dataList')
                        ->join('dataList.productDataProperty', 'pdp')
                        ->join('pdp.product', 'p')
                        ->join('p.categories', 'pCategories', 'WITH', 'pCategories.id=category.id')
                        ->leftjoin('property.settingsCategory', 'sc', 'WITH', 'sc.category=category.id')
                        ->where('category.isEnabled=1')
                        ->andwhere('property.name IN (:names)')
                        ->andWhere('p.isVisible=1')
                        ->setParameter('names', $names)
                        ->getQuery()->execute();

        //сортируем
        $sorted = [];
        foreach ($res as $r) {
            $sorted[$r['cat_id']][] = $r;
        }
        return $sorted;
    }

    /**
     * Получает основные данные для построения фильтра
     *
     * @param array $options
     * @return array
     * @author Sergeev A.M.
     */
    function getFilterGeneralData($options) {
        if (isset($options['category']) || isset($options['ids'])) {

            $query = $this->createQueryBuilder('c')
                    //->select('c category, '
                    ->select('partial c.{id, captionRu, slug, lft,rgt, lvl, root, metakeywordsRu, metadescriptionRu, titleRu, descriptionRu} category, '
                            . 'MIN(products.price) minPrice, MAX(products.price) maxPrice, '
                            . 'c.isInFilterNetWeight, '
                            . 'MIN(products.netWeight) minNetWeight, MAX(products.netWeight) maxNetWeight, '
                            . 'c.isInFilterNetWeightInGm as isNetWeightInGm, '
                            . 'c.isInFilterGrossWeight, '
                            . 'MIN(products.grossWeight) minGrossWeight, MAX(products.grossWeight) maxGrossWeight, '
                            . 'c.isInFilterGrossWeightInGm as isGrossWeightInGm, '
                            . 'c.isInFilterLengthOfProduct isInFilterLengthOfProduct, '
                            . 'MIN(products.lengthOfProduct) minLengthOfProduct, MAX(products.lengthOfProduct) maxLengthOfProduct, '
                            . 'c.isInFilterWidthOfProduct isInFilterWidthOfProduct, '
                            . 'MIN(products.widthOfProduct) minWidthOfProduct, MAX(products.widthOfProduct) maxWidthOfProduct, '
                            . 'c.isInFilterHeightOfProduct isInFilterHeightOfProduct, '
                            . 'MIN(products.heightOfProduct) minHeightOfProduct, MAX(products.heightOfProduct) maxHeightOfProduct, '
                            . 'c.isInFilterLengthOfBox isInFilterLengthOfBox, '
                            . 'MIN(products.lengthOfBox) minLengthOfBox, MAX(products.lengthOfBox) maxLengthOfBox, '
                            . 'c.isInFilterWidthOfBox isInFilterWidthOfBox, '
                            . 'MIN(products.widthOfBox) minWidthOfBox, MAX(products.widthOfBox) maxWidthOfBox, '
                            . 'c.isInFilterHeightOfBox isInFilterHeightOfBox, '
                            . 'MIN(products.heightOfBox) minHeightOfBox, MAX(products.heightOfBox) maxHeightOfBox '
                    )
                    ->leftJoin('c.products', 'products')
                    ->where('c.isEnabled = 1')
                    ->andWhere('products.isVisible = 1')
                    ->andWhere('products.isEnabled = 1');

            // добавляем в выборку условия
            if (isset($options['ids'])) {
                $query
                        ->andWhere('c.id IN (:ids)')
                        ->setParameter('ids', $options['ids']);
            } elseif (isset($options['category'])) {
                foreach ($options['category'] as $field => $value) {
                    $query
                            ->andWhere('c.' . $field . ' = :' . $field)
                            ->setParameter($field, $value);
                }
            }

            return $query->getQuery()->getOneOrNullResult();
        }

        return null;
    }

    /**
     * Ищет категории которые находятся в полученном бренде
     *
     * @param array $brand
     * @return array
     * @author Sergeev A.M.
     */
    function findByBrand($brand) {

        $brands = $this
                ->createQueryBuilder('categories')
                ->distinct()
                ->select('partial categories.{id,slug,captionRu,isEnabled}')
                ->addSelect('partial products.{id,captionRu,slug,price,oldPrice,reviewsRating,reviewsCount,orderOnly,isEnabled,isVisible}')
                ->addSelect('partial brand.{id}')
                ->leftJoin('categories.products', 'products')
                ->leftJoin('products.brand', 'brand')
                ->where('categories.isEnabled = 1')
                ->andWhere('brand.id = :id')
                ->setParameter('id', $brand->getId())
                ->getQuery()
                ->execute()
        ;

        return $brands;
    }

    /**
     * Ищет категории которые надо вывести в меню
     *
     * @param array $options
     * @return array
     * @author Sergeev A.M.
     */
    function findForMenu($option = array()) {
        $categories = $this
                ->createQueryBuilder('categories')
                ->select('COUNT(products.id)  AS countProducts, categories.id, parent.id parentId')
                ->addSelect('partial categories.{id,captionRu,slug,isEnabled,lvl} cat')
                ->leftJoin('categories.products', 'products WITH products.isEnabled = 1 AND products.isVisible = 1')
                ->leftJoin('categories.parent', 'parent')
                ->groupBy('categories.id')
                ->orderBy('categories.root', 'ASC')
                ->addOrderBy('categories.lft', 'ASC')
                ->getQuery()
                ->useResultCache(true, 5)
                ->getResult(Query::HYDRATE_ARRAY)
        ;

        return $categories;
    }

    /**
     * Получает данные для построения sitemap
     *
     * @return array
     * @author Sergeev A.M.
     */
    public function findForPopulateSitemap() {
        $categories = $this
                ->createQueryBuilder('categories')
                ->select('categories.slug')
                ->leftJoin('categories.products', 'products WITH products.isEnabled = 1 AND products.isVisible = 1')
                ->leftJoin('categories.parent', 'parent')
                ->groupBy('categories.id')
                ->orderBy('categories.root', 'ASC')
                ->addOrderBy('categories.lft', 'ASC')
                ->getQuery()
                ->useResultCache(true, 5)
                ->getResult(Query::HYDRATE_ARRAY)
        ;

        return $categories;
    }

    /**
     * Выбрать нужные поля по слаг
     * @param string $slug
     * @return type
     */
    public function findOnePartialBySlug($slug)
    {
        $qb = $this->createQueryBuilder('c');
        $qb->select('partial c.{id, captionRu, slug, lft,rgt, lvl, root, metakeywordsRu, descriptionRu, metadescriptionRu, titleRu}')
            ->where('c.slug = :slug')
            ->setParameter('slug', $slug)
        ;

        $result = $qb->getQuery()->getOneOrNullResult();

        return $result;
    }
    public function findChildernsForCategoryPage($node = null, $direct = false, $sortByField = null, $direction = 'ASC', $includeNode = false)
    {
        $meta = $this->getClassMetadata();
        $config = $this->listener->getConfiguration($this->_em, $meta->name);
        
        $qb = $this->_em->createQueryBuilder();
        $qb->select('partial node.{id, lft,rgt, lvl, root, isEnabled, captionRu}')
            ->from($config['useObjectClass'], 'node')
        ;
        if ($node !== null) {
            if ($node instanceof $meta->name) {
                $wrapped = new EntityWrapper($node, $this->_em);
                if (!$wrapped->hasValidIdentifier()) {
                    throw new InvalidArgumentException("Node is not managed by UnitOfWork");
                }
                if ($direct) {
                    $id = $wrapped->getIdentifier();
                    $qb->where($id === null ?
                        $qb->expr()->isNull('node.'.$config['parent']) :
                        $qb->expr()->eq('node.'.$config['parent'], is_string($id) ? $qb->expr()->literal($id) : $id)
                    );
                } else {
                    $left = $wrapped->getPropertyValue($config['left']);
                    $right = $wrapped->getPropertyValue($config['right']);
                    if ($left && $right) {
                        $qb
                            ->where($qb->expr()->lt('node.' . $config['right'], $right))
                            ->andWhere($qb->expr()->gt('node.' . $config['left'], $left))
                        ;
                    }
                }
                if (isset($config['root'])) {
                    $rootId = $wrapped->getPropertyValue($config['root']);
                    $qb->andWhere($rootId === null ?
                        $qb->expr()->isNull('node.'.$config['root']) :
                        $qb->expr()->eq('node.'.$config['root'], is_string($rootId) ? $qb->expr()->literal($rootId) : $rootId)
                    );
                }
                if ($includeNode) {
                    $idField = $meta->getSingleIdentifierFieldName();
                    $qb->where('('.$qb->getDqlPart('where').') OR node.'.$idField.' = :rootNode');
                    $qb->setParameter('rootNode', $node);
                }
            } else {
                throw new \InvalidArgumentException("Node is not related to this repository");
            }
        } else {
            if ($direct) {
                $qb->where($qb->expr()->isNull('node.' . $config['parent']));
            }
        }
        if (!$sortByField) {
            $qb->orderBy('node.' . $config['left'], 'ASC');
        } elseif (is_array($sortByField)) {
            $fields = '';
            foreach ($sortByField as $field) {
                $fields .= 'node.'.$field.',';
            }
            $fields = rtrim($fields, ',');
            $qb->orderBy($fields, $direction);
        } else {
            if ($meta->hasField($sortByField) && in_array(strtolower($direction), array('asc', 'desc'))) {
                $qb->orderBy('node.' . $sortByField, $direction);
            } else {
                throw new InvalidArgumentException("Invalid sort options specified: field - {$sortByField}, direction - {$direction}");
            }
        }
        return $qb->getQuery()->getResult();
    }

    public function getSimplePath($node)
    {
        $meta = $this->getClassMetadata();
        if (!$node instanceof $meta->name) {
            throw new InvalidArgumentException("Node is not related to this repository");
        }
        $config = $this->listener->getConfiguration($this->_em, $meta->name);
        $wrapped = new EntityWrapper($node, $this->_em);
        if (!$wrapped->hasValidIdentifier()) {
            throw new InvalidArgumentException("Node is not managed by UnitOfWork");
        }
        $left = $wrapped->getPropertyValue($config['left']);
        $right = $wrapped->getPropertyValue($config['right']);
        $qb = $this->_em->createQueryBuilder();
        $qb->select('partial node.{id, lft,rgt, lvl, root, isEnabled, captionRu, slug}')
            ->from($config['useObjectClass'], 'node')
            ->where($qb->expr()->lte('node.'.$config['left'], $left))
            ->andWhere($qb->expr()->gte('node.'.$config['right'], $right))
            ->orderBy('node.' . $config['left'], 'ASC')
        ;
        if (isset($config['root'])) {
            $rootId = $wrapped->getPropertyValue($config['root']);
            $qb->andWhere($rootId === null ?
                $qb->expr()->isNull('node.'.$config['root']) :
                $qb->expr()->eq('node.'.$config['root'], is_string($rootId) ? $qb->expr()->literal($rootId) : $rootId)
            );
        }
        return $qb->getQuery()->getResult();
    }
}
