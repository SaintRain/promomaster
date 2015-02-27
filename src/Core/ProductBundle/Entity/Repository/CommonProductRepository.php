<?php
/**
 * Репозиторий, содержащий общие вопросы для работы с сущностью CommonProduct
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Entity\Repository;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\ORM\EntityRepository;

class CommonProductRepository extends EntityRepository
{

    public function UpdateProd()
    {
        return $this->createQueryBuilder('p')
                ->where('p.id>3355')->getQuery()->execute();
    }

    /**
      /**
     * Находит продукты по SKU и сортирует их
     * @param $skuList
     * @return mixed
     */
    public function findBySkuAndSort($skuList)
    {
        $res = $this->_em->createQueryBuilder()
                //   ->select('p,OOPBCurrency')
                ->select('
            partial p.{id,
            sku,
            article,
            orderOnly,
            isMrcEnabled,
            mrc,
            OOPBCurrency,
            orderOnlyShopTax,
            isOOPBCurrencyRateAdditiveInPercent,
            OOPBCurrencyRateAdditive,
            orderOnlyPriceBuying,
            orderOnlyShopTaxInPercent,
            price,
            captionRu,
            isVisible,
            isDiscontinued,
            isEnabled},
            partial OOPBCurrency.{id, currencyRUB, symbol}
            ')
                ->from($this->_entityName, 'p', 'p.sku')
                ->where('p.sku IN (:skuList)')
                ->join('p.OOPBCurrency', 'OOPBCurrency')
                ->setParameters(['skuList' => $skuList])
                ->getQuery()->execute();

        return $res;
    }

//    public function findTest() {
//
//
//        $res = $this->createQueryBuilder('p')
//                ->addSelect('p.{id, email}')
//                ->where('p.id=2910')
//                ->setParameters(['currency' => 'RUB'])
//                ->getQuery()->execute();
//        return $res;
//    }

    public function getProductsForUpdatePriceByNewCurrencyCommand()
    {
        $res = $this->createQueryBuilder('p')
                ->join('p.OOPBCurrency', 'c')
                ->where('p.orderOnly=1 AND c.currency!=:currency')
                ->setParameters(['currency' => 'RUB'])
                ->getQuery()->execute();
        return $res;
    }

    /**
     * Одним запросом берет все данные для генерирования YML-файла
     */
    public function getQueryForYml()
    {
        $queryBuilder = $this->createQueryBuilder('p')
            // ->addSelect('p,categoryMain,manufacturerMain,countryOfOrigin,productDataProperty,data,property,images, productAvailability, images')
            ->select('p,manufacturerMain,categoryMain,images,countryOfOrigin')
//            ->leftJoin('p.productAvailability', 'productAvailability')
            ->Join('p.categoryMain', 'categoryMain')
            ->join('p.manufacturerMain', 'manufacturerMain')
            ->leftJoin('p.countryOfOrigin', 'countryOfOrigin')
//            ->leftJoin('p.productDataProperty ', 'productDataProperty')
//            ->leftJoin('productDataProperty.data', 'data')
//            ->leftJoin('data.property', 'property')
            ->leftJoin('p.images ', 'images')
//            ->leftJoin('p.images ', 'images')
            ->where('p.isEnabled=1')
            ->andWhere('p.isVisible=1')
            // ->andWhere('p.isCanBeInYml=1')
            //  ->andWhere('manufacturerMain.isCanBeInYml=1')
            ->andWhere('p.isDiscontinued=0')
            ->andWhere('categoryMain.isEnabled=1');

        /*
          if ($categories) {
          $cat_ids = [];
          foreach ($categories as $cat) {
          $cat_ids[] = $cat->getId();
          }
          $queryBuilder->andWhere('p.categoryMain IN (:cat_ids)')
          ->setParameters(['cat_ids' => $cat_ids]);
          }
         */
        return $queryBuilder;
    }

    /**
     * проверяет есть ли похожие по заданным условиям продукты
     * @param type $sku
     * @param type $article
     * @return type
     */
    public function findSimilar($sku = false, $article = false)
    {

        $parameters = [];
        if ($sku) {
            $parameters['sku'] = $sku;
        }

        if ($article) {
            $parameters['article'] = $article;
        }

        $queryBuilder = $this->createQueryBuilder('p')
            ->select('count(p) quantity');
        if ($sku) {
            $queryBuilder->where('p.sku=:sku');
        }

        if ($article) {
            $queryBuilder->orWhere('p.article=:article');
        }
        $queryBuilder->setParameters($parameters);

        $res = $queryBuilder->getQuery()->getOneOrNullResult();
        return $res;
    }

    /**
     * Находит самые популярные продукты
     * @param type $limit
     * @return type
     */
    public function getPopularProductsInDown($limit = 6)
    {
        $res = $this->createQueryBuilder('p')
                ->addSelect('p,img, catMain', 'productAvailability')
                ->leftJoin('p.images', 'img')
                ->leftJoin('p.categoryMain', 'catMain')
                ->leftJoin('p.productAvailability', 'productAvailability')
                ->where('p.isEnabled = 1')
                ->andWhere('p.isVisible = 1')
                ->orderBy('p.reviewsRating', 'DESC')
                ->setMaxResults($limit)
                ->getQuery()->execute();
        return $res;
    }

    /**
     * Возвращает базовый продукт с основными присоединениями в одном запросе
     * @param type $order_id
     * @return type
     */
    public function getOneWithJoins($order_id)
    {
        $res = $this->createQueryBuilder('p')
                ->addSelect('p, img, catMain, manufacturerMain, modificationUnion,similars,services, alternative, serie,color,accessories, accessoriesTargetObject,quantityAlternative, ticket, unitOfMeasure, country'/* , productTags, virtCat, images, remoteVideo, cat, b, instruction */)
                //->leftJoin('p.manufacturers', 'b')
                //->leftJoin('p.virtualCategoryList', 'virtCat')
                ->leftJoin('p.tickets', 'ticket')
                ->leftJoin('p.countryOfOrigin', 'country')
                //->leftJoin('p.remoteVideos', 'remoteVideo')
                //->leftJoin('p.productTags', 'productTags')
                ->leftJoin('p.unitOfMeasure', 'unitOfMeasure')
                ->leftJoin('p.manufacturerMain', 'manufacturerMain')
                ->leftJoin('p.modificationUnion', 'modificationUnion')
                ->leftJoin('p.similars', 'similars')
                ->leftJoin('p.accessories', 'accessories')
                ->leftJoin('accessories.targetObject', 'accessoriesTargetObject')
                ->leftJoin('p.services', 'services')
                ->leftJoin('p.alternative', 'alternative')
                ->leftJoin('p.serie', 'serie')
                //->leftJoin('p.images', 'images')
                ->leftJoin('p.color', 'color')
                //->leftJoin('p.instruction', 'instruction')
                ->leftJoin('p.images', 'img')
                ->leftJoin('p.categoryMain', 'catMain')
                //->leftJoin('p.categories', 'cat')
                ->leftJoin('p.quantityAlternative', 'quantityAlternative')
                ->where('p.id=:id')
                ->setParameters(['id' => $order_id])
                ->getQuery()->getOneOrNullResult();
        return $res;
    }

    /**
     * Возвращает базовые продукты с основными присоединениями в одном запросе
     * @param type $ids
     * @return type
     */
    public function getManyWithJoins($ids)
    {
        $ids = array_values(array_filter($ids));
        $res = $this->createQueryBuilder('p')
                ->addSelect('p, img, cat, b, catMain, manufacturerMain, modificationUnion,similars,services, alternative, serie,color,instruction,accessories, accessoriesTargetObject,quantityAlternative, ticket, productTags, unitOfMeasure, country'/* , virtCat, images, remoteVideo */)
                ->leftJoin('p.manufacturers', 'b')
                //->leftJoin('p.virtualCategoryList', 'virtCat')
                ->leftJoin('p.tickets', 'ticket')
                ->leftJoin('p.countryOfOrigin', 'country')
                //->leftJoin('p.remoteVideos', 'remoteVideo')
                ->leftJoin('p.productTags', 'productTags')
                ->leftJoin('p.unitOfMeasure', 'unitOfMeasure')
                ->leftJoin('p.manufacturerMain', 'manufacturerMain')
                ->leftJoin('p.modificationUnion', 'modificationUnion')
                ->leftJoin('p.similars', 'similars')
                ->leftJoin('p.accessories', 'accessories')
                ->leftJoin('accessories.targetObject', 'accessoriesTargetObject')
                ->leftJoin('p.services', 'services')
                ->leftJoin('p.alternative', 'alternative')
                ->leftJoin('p.serie', 'serie')
                //->leftJoin('p.images', 'images')
                ->leftJoin('p.color', 'color')
                ->leftJoin('p.instruction', 'instruction')
                ->leftJoin('p.images', 'img')
                ->leftJoin('p.categoryMain', 'catMain')
                ->leftJoin('p.categories', 'cat')
                ->leftJoin('p.quantityAlternative', 'quantityAlternative')
                ->where('p.id IN (:ids)')
                ->setParameters(['ids' => $ids])
                ->getQuery()->getResult();
        return $res;
    }

    /**
     * Ищет товары, которые заканчиваются
     * @return type
     */
    function getDeficitProducts($limit = 5)
    {

        $res = $this->createQueryBuilder('p')
                ->select('p.id product_id,  p.captionRu product_captionRu, p.article product_article, s.id stock_id, bm.id manufacturer_id,  (pa.quantity-pa.quantityVirtual) quantity')
                ->join('p.manufacturerMain', 'bm')
                ->leftJoin('p.productAvailability', 'pa')
                ->leftJoin('pa.stock', 's')
                ->orderBy('bm.id')
                ->where('(pa.quantity-pa.quantityVirtual)<:quantity')
                ->setParameters(['quantity' => $limit])
                ->getQuery()->execute();

        return $res;
    }

    /**
     * Запрос для формирования инвенторизации.
     * Берём только продукты для которых были поставки. Выводим все продукты, которые есть на складе и могут быть проданы
     * @return type
     */
    function getInventoryProducts($stock_id)
    {

        $res = $this->createQueryBuilder('p')
                ->select('p.id product_id,  p.captionRu product_captionRu, p.article product_article, s.id stock_id, COUNT(u) quantity, COUNT(u.isWithDefect) quantity_with_defect')
                ->leftJoin('p.units', 'u')
                ->leftJoin('u.stock', 's')
                ->where('u.isCouldBeSold=1 AND s.id =:stock_id AND (u.isVirtual IS NULL OR u.isVirtual=0)')
                ->setParameter('stock_id', $stock_id)
                ->groupBy('p.id')
                ->getQuery()->execute();

        return $res;
    }

    /**
     * Запрос для формирования инвенторизации.
     * Берём только продукты для которых были поставки. Выводим все продукты, которые есть на складе и могут быть проданы
     * @return type
     */
    function getInventoryProductsAvaibility($stock_ids)
    {

        $res = $this->createQueryBuilder('p')
                ->select('p.id product_id,  p.captionRu product_captionRu, p.article product_article, s.id stock_id,
                            SUM(pa.quantity-pa.quantityVirtual) quantity')
                ->join('p.productAvailability', 'pa')
                ->leftJoin('pa.stock', 's')
                ->Where('pa.stock IN (:stock_ids)')
                ->setParameter('stock_ids', $stock_ids)
                ->groupBy('p.id')
                ->getQuery()->execute();

        return $res;
    }

    /**
     * Берёт все склады по INDEXBY id
     * @return type
     */
    function geAllByIndexId()
    {
        $res = $this->createQueryBuilder()
                ->select('p')
                ->from($this->getClassName(), 'p', 'p.id')
                ->getQuery()->execute();
        return $res;
    }

    /**
     * Создает QueryBuilder по выбранным параметрам фильтра
     *
     * @param array $filter
     * @return array
     * @author Sergeev A.M.
     */
    public function generateQueryBuilderByFilter($filter)
    {
        $query = $this->createQueryBuilder('p')
            ->select('partial p.{id,captionRu,slug,price,oldPrice,reviewsRating,reviewsCount,orderOnly,isEnabled,isVisible}')
            ->addSelect('partial images.{id,name,halfPath,altRu}')
            ->addSelect('partial b.{id,captionRu,slug}')
            ->addSelect('partial category.{id,captionRu,slug}')
            ->addSelect('partial productAvailability.{id,quantity}')
            ->addSelect('partial manufacturers.{id,captionRu,slug}')
            ->where('p.isEnabled = 1')
            ->andWhere('p.isVisible = 1')
            ->leftJoin('p.brand', 'b')
            ->leftJoin('p.manufacturers', 'manufacturers')
            ->leftJoin('p.categoryMain', 'category')
            ->leftJoin('p.images', 'images')
            ->leftjoin('p.productAvailability', 'productAvailability');
        if (isset($filter['categories']) && count($filter['categories'])) {
            $query
                ->join('p.categories', 'c')
                ->andWhere('c.id IN (:categoriesIds)')
                ->setParameter('categoriesIds', $filter['categories']);
        }

        if (isset($filter['brands']) && count($filter['brands'])) {
            $query
                ->andWhere('b.id IN (:brandIds)')
                ->setParameter('brandIds', implode(', ', $filter['brands']));
        }

        if (isset($filter['series']) && count($filter['series'])) {
            $query
                ->join('p.serie', 'series')
                ->andWhere('series.id IN (:seriesIds)')
                ->setParameter('seriesIds', implode(', ', $filter['series']));
        }

        if (isset($filter['instock']) && (int) $filter['instock'] === 1) {
            $query
                ->andWhere('productAvailability.quantity > 0')
                ->andWhere('p.orderOnly = 0 OR p.orderOnly IS NULL')
            ;
        }

        if (isset($filter['sort'])) {
            if (strpos($filter['sort'], '_') > 0) {
                $sort = explode('_', $filter['sort']);
                $type = $sort[1] === 'asc' ? 'ASC' : 'DESC';
                switch ($sort[0]) {
                    case 'name':
                        $query->orderBy('p.caption'.ucfirst($filter['locale']), $type);
                        break;
                    case 'price':
                        $query->orderBy('p.price', $type);
                        break;
                    case 'pop':
                        $query->orderBy('p.reviewsRating', $type === 'ASC' ? 'DESC' : 'ASC');
                        $query->addOrderBy('p.reviewsCount', $type === 'ASC' ? 'DESC' : 'ASC');
                        break;
                    default:
                        $query->orderBy('productAvailability.quantity', 'DESC');
                        break;
                }
            }
        } else {
            $query->orderBy('productAvailability.quantity', 'DESC');
        }

        foreach (['price', 'netWeight', 'grossWeight', 'lengthOfProduct', 'widthOfProduct',
        'heightOfProduct', 'lengthOfBox', 'widthOfBox', 'heightOfBox'] as $name) {

            if (isset($filter[$name]['from']) && isset($filter[$name]['to']) && $filter[$name]['from'] >= 0 && $filter[$name]['to'] > 0) {

                // Добавляем условие на выборку для веса товара (нетто/брутто)
                if (isset($filter['categories']) && isset($filter[$name]) && in_array($name, ['netWeight', 'grossWeight']) && isset($filter[$name]['is'.ucfirst($name).'InGm'])) {
                    if (!$filter[$name]['is'.ucfirst($name).'InGm']) {
                        $filter[$name]['from'] *= 1000;
                        $filter[$name]['to'] *= 1000;
                    }
                    $query
                        ->andWhere('CASE WHEN (p.is'.ucfirst($name).'InGm = 1) THEN p.'.$name.' ELSE p.'.$name.' * 1000 END >= '.$filter[$name]['from'])
                        ->andWhere('CASE WHEN (p.is'.ucfirst($name).'InGm = 1) THEN p.'.$name.' ELSE p.'.$name.' * 1000 END <= '.$filter[$name]['to']);

                    continue;
                }

                $query
                    ->andWhere('p.'.$name.' BETWEEN :from_'.$name.' AND :to_'.$name)
                    ->setParameter('from_'.$name, $filter[$name]['from'])
                    ->setParameter('to_'.$name, $filter[$name]['to']);
            }
        }

        if (isset($filter['p'])) { // properties
            foreach ($filter['p'] as $type => $properties) {
                foreach ($properties as $name => $values) {
                    if ($type === 'radio' || $type === 'checkbox') {
                        $ids = is_array($values) ? implode(', ', $values) : $values;
                        $query
                            ->join('p.productDataProperty', 'pdp_'.$name)
                            ->join('pdp_'.$name.'.data', 'dp_'.$name.' WITH dp_'.$name.'.id IN ('.$ids.')')
                            ->join('dp_'.$name.'.property', 'prop_'.$name.' WITH prop_'.$name.'.name = :nameDp_'.$name)
                            ->setParameter(':nameDp_'.$name, $name);
                    } else {
                        switch ($type) {
                            case 'input':
                                if ($values['from'] >= 0 && $values['to'] > 0) {
                                    $query
                                        ->join('p.productDataProperty', 'pdp_'.$name.' WITH pdp_'.$name.'.valueNumeric BETWEEN :from_'.$name.' AND :to_'.$name)
                                        ->setParameter('from_'.$name, $values['from'])
                                        ->setParameter('to_'.$name, $values['to']);
                                }
                                break;
                            case 'input_text':
                                if (strlen($values) > 0) {
                                    $query
                                        ->join('p.productDataProperty', 'pdp_'.$name.' WITH pdp_'.$name.'.value LIKE :text_'.$name)
                                        ->setParameter('text_'.$name, '%'.$values.'%');
                                }
                                break;
                        }
                    }
                }
            }
        }

        return $query;
    }

    /**
     * Получает запрос по выбранным параметрам фильтра
     *
     * @param array $filter
     * @return object
     * @author Sergeev A.M.
     */
    public function generateQueryByFilter($filter)
    {
        return $this->generateQueryBuilderByFilter($filter)->getQuery();
    }

    /**
     * Получает продукты по выбранным параметрам фильтра
     *
     * @param array $filter
     * @return array
     * @author Sergeev A.M.
     */
    public function findByFilter($filter)
    {
        return $this->generateQueryByFilter($filter)->getResult();
    }

    /**
     * Получает продукт с нужными join'ами
     *
     * @param string $slug
     * @return object
     * @author Sergeev A.M.
     */
    public function findProductInDetail($slug)
    {

        $product = $this->createQueryBuilder('p')
            //->select('p')
            ->select('partial p.{id,captionRu,descriptionRu,complectationRu,sloganRu,titleRu,metakeywordsRu,metadescriptionRu,captionCaseRu,'
                .'netWeight,isNetWeightInGm,grossWeight,isGrossWeightInGm,lengthOfProduct,widthOfProduct,heightOfProduct,lengthOfBox,widthOfBox,heightOfBox,'
                .'isDiscontinued,article,sku,price,oldPrice,slug,warrantyMonths,quantityOfPieces,reviewsRating,reviewsCount,isVisible,'
                .'orderOnly,OOPBQuantity,isEnabled}')
            ->addSelect('partial categoryMain.{id,captionRu,slug,lft,lvl,rgt}')
            ->addSelect('partial manufacturers.{id,captionRu,slug}')
            ->addSelect('partial manufacturerMain.{id,captionRu,slug}')
            ->addSelect('partial images.{id,name,halfPath,altRu,height,width}')
            ->addSelect('partial instruction.{id,name,halfPath,size,captionRu}')
            ->addSelect('partial remoteVideos.{id,code,captionRu}')
            ->addSelect('partial u.{id,shortCaptionRu,captionRu}')
            ->addSelect('partial serie.{id,captionRu,slug}')
            ->leftJoin('p.categoryMain', 'categoryMain')
            ->leftJoin('p.unitOfMeasure', 'u')
            ->leftJoin('p.images', 'images')
            ->leftJoin('p.instruction', 'instruction')
            ->leftJoin('p.manufacturers', 'manufacturers')
            ->leftJoin('p.manufacturerMain', 'manufacturerMain')
            ->leftJoin('p.serie', 'serie')
            ->leftJoin('p.remoteVideos', 'remoteVideos')
            ->where('p.isEnabled = 1')
            ->andWhere('p.isVisible = 1')
            ->andWhere('p.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getOneOrNullResult();

        if (null === $product) {
            throw new NotFoundHttpException('Product not found!');
        }

        // Достаем все характеристики и модификации продукта
        $dirtyInfo = $this->createQueryBuilder('p')
            ->select('productDataProperty', 'data')
            ->addSelect('partial p.{id,captionRu,slug,price,oldPrice,reviewsRating,reviewsCount,orderOnly}')
//            ->addSelect('partial MUdataList.{id,slug}')
            //->addSelect('partial productAvailability.{id,quantity,quantityVirtual,quantityVirtualReal}')
            ->addSelect('partial color.{id,captionRu}')
            ->addSelect('partial modificationUnion.{id}')
            ->addSelect('partial property.{id,editType,name,captionRu,descriptionRu}')
            ->addSelect('partial dataList.{id,value,name,articleKey,shortDescription,indexPosition}')
            ->addSelect('partial defaultUnit.{id,code,indexPosition,isEnabled,group,okeiCode}')
            ->leftJoin('p.color', 'color')
            ->leftJoin('p.modificationUnion', 'modificationUnion')
            ->leftJoin('p.productDataProperty', 'productDataProperty')
            //->leftJoin('p.productAvailability', 'productAvailability')
            ->leftJoin('productDataProperty.data', 'data')
            ->leftJoin('data.property', 'property')
            ->leftJoin('property.dataList', 'dataList')
            ->leftJoin('property.defaultUnit', 'defaultUnit')
//            ->leftJoin('modificationUnion.dataList', 'MUdataList')
            ->where('p.modificationUnion = :modificationUnion')
            ->orWhere('p.id = :id')
            ->andwhere('p.isEnabled = 1')->andWhere('p.isVisible = 1')
//            ->andwhere('MUdataList.isEnabled = 1')->andWhere('MUdataList.isVisible = 1')
            ->setParameter('modificationUnion', $product->getModificationUnion()->getId())
            ->setParameter('id', $product->getId())
            ->getQuery()
            ->execute();

        return [$product, $dirtyInfo];
    }

    /**
     * Получает продуктов из серии
     *
     * @param object $product
     * @return object
     * @author Sergeev A.M.
     */
    public function findFromSerires($product, $options = array())
    {
        $products = array();
        if (null !== $product->getSerie()) {
            $qb = $this->createQueryBuilder('p')
                ->select('partial p.{id,captionRu,slug,price,oldPrice,reviewsRating,reviewsCount,orderOnly,isEnabled,isVisible}')
                ->addSelect('partial productAvailability.{id,quantity,quantityVirtual,quantityVirtualReal}')
//                ->addSelect('partial manufacturers.{id,captionRu,slug}')
                ->addSelect('partial brand.{id,captionRu,slug}')
                ->addSelect('partial images.{id,name,halfPath,altRu}')
                ->addSelect('partial categoryMain.{id,captionRu,slug}')
            //->addSelect('partial serie.{id,slug,captionRu}')
            ;
            if (isset($options['countQuantity'])) {
                $qb->addSelect('SUM(productAvailability.quantity) AS quantity');
            }

            $qb
                ->leftJoin('p.categoryMain', 'categoryMain')
                ->leftJoin('p.images', 'images')
                ->leftJoin('p.serie', 'serie')
                ->leftJoin('p.brand', 'brand')
                ->leftJoin('p.manufacturers', 'manufacturers')
                ->leftJoin('p.productAvailability', 'productAvailability')
                ->where('p.isEnabled = 1')
                ->andWhere('p.isVisible = 1')
                ->andWhere('serie.id = :serieId')
                ->andWhere('p.id != :productId')
                ->setParameter('serieId', $product->getSerie()->getId())
                ->setParameter('productId', $product->getId());
            if (isset($options['limit'])) {
                $qb->setMaxResults($options['limit']);
            }

            if (isset($options['countQuantity'])) {
                $qb->groupBy('p.id')
                    ->orderBy('quantity', 'DESC');
            }
            $products = $qb->getQuery()
                ->getResult();
        }

        return $products;
    }

    /**
     * Получает продукты c категорией и главной картиинкой для вывода
     *
     * @param array $ids
     * @param string $sort
     * @param string $locale
     * @return array
     * @author Sergeev A.M.
     */
    public function findProducts($ids, $sort = 'indexPosition_asc', $locale = 'ru', $execute = true, $indexBy = 'id')
    {
        $products = array();
        if (!empty($ids)) {
            $qb = $this->_em->createQueryBuilder()
                ->select('partial p.{id,captionRu,slug,price,oldPrice,reviewsRating,reviewsCount,orderOnly,isEnabled,isVisible}')
                ->addSelect('partial productAvailability.{id,quantity,quantityVirtual,quantityVirtualReal}')
                ->addSelect('partial manufacturers.{id,captionRu,slug}')
                ->addSelect('partial images.{id,name,halfPath,altRu}')
                ->addSelect('partial categoryMain.{id,captionRu,slug}')
            ;

            if (null === $indexBy) {
                $qb->from($this->_entityName, 'p');
            } else {
                $qb->from($this->_entityName, 'p', 'p.'.$indexBy);
            }

            $qb
                ->where('p.isEnabled = 1')
                ->andWhere('p.isVisible = 1')
                ->leftJoin('p.manufacturers', 'manufacturers')
                ->leftJoin('p.categoryMain', 'categoryMain')
                ->leftJoin('p.images', 'images')
                ->leftJoin('p.productAvailability', 'productAvailability')
//                ->leftJoin('p.brand', 'brand')
                ->andWhere('p.id IN ('.implode(',', $ids).')');

            if (null !== $sort && strpos($sort, '_') > 0) {

                list($field, $type) = explode('_', $sort);
                $type = $type === 'asc' ? 'ASC' : 'DESC';
                switch ($field) {
                    case 'name':
                        $qb->orderBy('p.caption'.ucfirst($locale), $type);
                        break;
                    case 'price':
                        $qb->orderBy('p.price', $type);
                        break;
                    case 'pop':
                        $query->orderBy('p.reviewsRating', $type === 'ASC' ? 'DESC' : 'ASC');
                        $query->addOrderBy('p.reviewsCount', $type === 'ASC' ? 'DESC' : 'ASC');
                        break;
                    default:
                        $qb->orderBy('p.indexPosition', $type);
                        break;
                }
            }

            if ($execute === true) {
                $products = $qb->getQuery()->execute();
            } else {
                $products = $qb->getQuery();
            }
        }

        return $products;
    }

    /**
     * Получаем id избранный продуктов
     */
    public function getFavoriteProductsIds($user)
    {
        if (!method_exists($user, 'getId')) {
            return [];
        }
        $result = $this->_em->createQueryBuilder()
            ->from($this->_entityName, 'products', 'products.id')
            ->select('products.id')
            ->leftJoin('products.favoriteUsers', 'union')
            ->leftJoin('union.targetObject', 'user')
            ->where('user.id = :id')
            ->andWhere('products.isEnabled = 1')
            ->andWhere('products.isVisible = 1')
            ->setParameter('id', $user->getId())
            ->getQuery()
            ->getResult();

        return array_keys($result);
    }

    /**
     * Получаем продукты пользователя (избранные или просмотренные)
     */
    public function getUserProducts($user, $product, $typeOfProducts, $sort = 'indexPosition_asc', $locale = 'ru', $execute = true, $indexBy = 'id')
    {
        if (!method_exists($user, 'getId')) {
            return $execute === true ? [] : null;
        }

        $qb = $this->_em->createQueryBuilder()
            ->select('union')
            ->addSelect('partial products.{id,captionRu,slug,price,oldPrice,reviewsRating,reviewsCount,orderOnly,isEnabled,isVisible}')
            ->addSelect('partial productAvailability.{id,quantity,quantityVirtual,quantityVirtualReal}')
            ->addSelect('partial manufacturers.{id,captionRu,slug}')
            ->addSelect('partial images.{id,name,halfPath,altRu}')
            ->addSelect('partial categoryMain.{id,captionRu,slug}')
        ;
        if (null === $indexBy) {
            $qb->from($this->_entityName, 'products');
        } else {
            $qb->from($this->_entityName, 'products', 'products.'.$indexBy);
        }

        $qb
            ->leftJoin('products.'.$typeOfProducts.'Users', 'union')
            ->leftJoin('union.targetObject', 'user')
            ->leftJoin('products.manufacturers', 'manufacturers')
            ->leftJoin('products.categoryMain', 'categoryMain')
            ->leftJoin('products.images', 'images')
            ->leftJoin('products.productAvailability', 'productAvailability')
            ->where('user.id = :id')
            ->andWhere('products.isEnabled = 1')
            ->andWhere('products.isVisible = 1');

        if (null !== $sort && strpos($sort, '_') > 0) {

            list($field, $type) = explode('_', $sort);

            if (in_array($field, ['viewed', 'added'])) {
                $type = $type === 'asc' ? 'DESC' : 'ASC';
            } else {
                $type = $type === 'asc' ? 'ASC' : 'DESC';
            }

            switch ($field) {
                case 'name':
                    $qb->orderBy('products.caption'.ucfirst($locale), $type);
                    break;
                case 'price':
                    $qb->orderBy('products.price', $type);
                    break;
                case 'viewed':
                    $qb->orderBy('union.viewedAt', $type);
                    break;
                case 'added':
                    $qb->orderBy('union.addedAt', $type);
                    break;
                default:
                    $qb->orderBy('products.indexPosition', $type);
                    break;
            }
        }

        if (null !== $product) {
            $qb
                ->andWhere('products.id = :productId')
                ->setParameter('productId', $product->getId())
                ->setMaxResults(1);
        }
        $qb->setParameter('id', $user->getId());

        if ($execute === true) {
            $result = $qb->getQuery()->execute();
        } else {
            $result = $qb;
        }

        return $result;
    }

    /**
     * Получает продукты с нужными join'ами для вывода их в корзине
     *
     * @param array $ids
     * @return array
     * @author Sergeev A.M.
     */
    public function findProductsForCart($ids)
    {

        $product = array();
        if (count($ids)) {
            $product = $this->createQueryBuilder('p')
                ->select('p', 'images', 'color', 'productDataProperty', 'data', 'property' /* , 'dataList', 'defaultUnit' */)
                ->leftJoin('p.images', 'images')
                ->leftJoin('p.color', 'color')
                ->leftJoin('p.productDataProperty', 'productDataProperty')
                ->leftJoin('productDataProperty.data', 'data')
                ->leftJoin('data.property', 'property')
//            ->leftJoin('property.dataList', 'dataList')
//            ->leftJoin('property.defaultUnit', 'defaultUnit')
                ->where('p.isEnabled = 1')
                ->andWhere('p.isVisible = 1')
                ->andWhere('p.id IN ('.implode(',', $ids).')')
                ->getQuery()
                ->getResult();
        }
        return $product;
    }

    /**
     * Получает данные для построения sitemap
     *
     * @return array
     * @author Sergeev A.M.
     */
    public function findForPopulateSitemap()
    {
        $slugs = $this->createQueryBuilder('p')
            ->select('p.slug')
            ->where('p.isEnabled = 1')
            ->andWhere('p.isVisible = 1')
            ->getQuery()
            ->getResult();
        return $slugs;
    }

    /**
     * Получает данные для построения sitemap
     *
     * @return array
     * @author Sergeev A.M.
     */
    public function isExistInUserHistory($user, $product)
    {

        $result = $this->createQueryBuilder('products')
            ->select('union')
            ->addSelect('partial products.{id}')
            ->leftJoin('products.historyUsers', 'union')
            ->leftJoin('union.targetObject', 'user')
            ->where('user.id = :id')
            ->andWhere('products.id = :productId')
            ->setParameter('id', $user->getId())
            ->setParameter('productId', $product->getId())
            ->getQuery()
            ->getOneOrNullResult();

        return $result;
    }

    /**
     * Выбрать у продуктов только id
     * @return type
     */
    public function findIds()
    {
        $qb     = $this->createQueryBuilder('c');
        $result = $qb->select('DISTINCT c.id')
            ->getQuery()
            ->getResult()
        ;
        return $result;
    }

    public function findPrevNext($ids)
    {
        $ids = array_values(array_filter($ids));

        $qb     = $this->createQueryBuilder('p');
        $result = $qb->select('p')
            ->andWhere('p.id IN (:ids)')
            ->setParameter('ids', $ids)
            ->getQuery()
            ->getResult()
        ;
        return $result;
    }
}