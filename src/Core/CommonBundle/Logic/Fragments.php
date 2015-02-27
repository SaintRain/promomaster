<?php

/**
 * Бизнес-логика для фрагментов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Logic;

class Fragments {

    private $container;

    public function __construct($container) {
        $this->container = $container;
    }

    /**
     * Поисковая форма в шапке сйта
     * @return type
     * @author Sergeev A.M.
     */
    public function searchProductForm() {

        if ($this->container->has('debug.stopwatch')) {
            $this->container->get('debug.stopwatch')->start('Fragments::searchProductForm');
        }

        $queryBuilder = $this->container->get('form.factory')->createBuilder('form');
        $form = $queryBuilder
                ->add('q', 'ajax_entity', [
                    'class' => 'Core\ProductBundle\Entity\CommonProduct',
                    'label' => false,
                    'frontend' => true,
                    'properties' => array(
                        'id' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'full',
                        ),
                        'sku' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'left',
                        ),
                        'article' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'left',
                        ),
                        'captionRu' => array(
                            'search' => true,
                            'return' => true,
                        ),
                        'images' => array(
                            'search' => false,
                            'return' => true,
                        ),
                        'images.altRu' => array(
                            'search' => true,
                            'return' => false,
                            'entry' => 'full',
                        ),
                        'price' => array(
                            'search' => false,
                            'return' => true,
                        ),
                        'slug' => array(
                            'search' => true,
                            'return' => true,
                        ),
                        'productTags.captionRu' => array(
                            'search' => true,
                            'return' => false,
                        )),
                    'template_customise_functions' => 'frontend.product.html.twig',
                    'select2_constructor' => array(
                        'width' => '100%',
                        'minimumInputLength' => 3,
                        'dropdownCssClass' => 'searchdrop',
                        'dropdownAutoWidth' => true,
                        'formatResult' => 'productFormatResult',
                        'formatSelection' => 'productFormatSelection',
                        'formatLoadMore' => 'function(){return "Загрузка"}',
                        'formatInputTooShort' => ''
                        . 'function(term,minLength){'
                        . '$(\'.select2-count-of-result\').remove();'
                        . '$(\'.searchdrop\').removeClass(\'no-round-br\');'
                        . 'return "Пожалйуста, введите еще " + declOfNum(minLength - term.length, ["символ","символа","символов"]);'
                        . '}',
                    ),
                    'add_to_query' => array(// дополнение к запросу на выборку данных
                        'where' => array(
                            'andWhere' => array(
                                'isEnabled = 1',
                                'isVisible = 1',
                            ),
                        )
                    ),
                    'attr' => array(
                        'data-url' => $this->container->get('router')->generate('core_product', array('slug' => '~slug~')),
                        'class' => 'search-input',
                    )
                ])
                ->getForm();
        if ($this->container->has('debug.stopwatch')) {
            $this->container->get('debug.stopwatch')->stop('Fragments::searchProductForm');
        }

        return $form;
    }

    /**
     * Генерация меню
     *
     * @return type
     * @author Sergeev A.M.
     */
    public function menu($request) {
        if ($this->container->has('debug.stopwatch')) {
            $this->container->get('debug.stopwatch')->start('Fragments::menu');
        }

        if (in_array($request->attributes->get('_route'), ['core_shop_product_catalog_first_page', 'core_shop_product_catalog'])) {
            $slug = $request->attributes->get('slug');
        } else {
            $slug = null;
        }
        $categoriesTree = $this->container->get('core_shop_category_logic')->getCategoryTreeToShow();

        // Ищем в категориях "Скидки и акции"
        $discountsAndPromotions = null;
        foreach ($categoriesTree as $i => $c) {
            if (false !== strpos($c['slug'], 'skidki-i-aktsii') || false !== strpos($c['slug'], 'skidki_i_aktsii') || false !== strpos($c['slug'], 'promotions') || false !== strpos($c['slug'], 'discounts_and_promotions') || false !== strpos($c['captionRu'], 'Скидки и акции')) {
                $discountsAndPromotions = $c;
                break;
            }
        }
        // Удаляем из категорий "Скидки и акции"
        if ($discountsAndPromotions) {
            unset($categoriesTree[$i]);
        }
        $em = $this->container->get('doctrine')->getManager();
        /*
          $propertiesDirty = $em->getRepository('CorePropertyBundle:Property')->getPropertyForBuildStaticFilter(['age', 'skills']);

          $properties = [];

          foreach ($propertiesDirty as $property) {

          $values = array();
          foreach ($property->getDataList() as $dataOne) {
          $values[$dataOne->getId()] = array(
          'caption' => $dataOne->getValue(),
          'name' => $dataOne->getName(),
          );
          }

          $properties[$property->getName()] = array(
          'caption' => $property->{'getCaption' . ucfirst($this->container->get('request')->getLocale())}(),
          'name' => $property->getName(),
          'values' => $values,
          );
          }
         */
        $ids = $this->container->get('core_shop_category_logic')->getChildrenIds(array_map(function($e) {
                    return $e['id'];
                }, $categoriesTree), $categoriesTree);

        $propertyCategoriesDirty = $em->getRepository('CoreCategoryBundle:ProductCategory')->getPropertyForBuildMenuFilter(['age', 'skills']);
     
        //берём характеристики
        $properties = [];
        foreach ($categoriesTree as $c) {   //перебираем основные категории
            $pIds = $this->container->get('core_shop_category_logic')->getChildrenIds([$c['id']], $c['__children']);
            array_push($pIds, $c['id']);    //добавляем к детям родителя            

            foreach ($pIds as $cat_id) {
                if (isset($propertyCategoriesDirty[$cat_id])) {
                    foreach ($propertyCategoriesDirty[$cat_id] as $pCat) {
                        //определяем активна ли характеристика для заданных категорий
                        $isEnabled = false;
                        if (!is_null($pCat['settingsCategory_isEnabled'])) {
                            $isEnabled = $pCat['settingsCategory_isEnabled'];
                        } else {
                            $isEnabled = $pCat['property_isEnabled'];
                        }
                        //если характеристика активна для проверяемой категории
                        if ($isEnabled) {
                            $values = array(
                                'caption' => $pCat['datalist_value'],
                                'name' => $pCat['datalist_name'],
                            );
                            if (!isset($properties[$c['id']][$pCat['property_name']])) {
                                $properties[$c['id']][$pCat['property_name']] = array(
                                    'caption' => $pCat['property_captionRu'], // $dl->getProperty()->{'getCaption' . ucfirst($this->container->get('request')->getLocale())}(),
                                    'name' => $pCat['property_name'],
                                    'values' => [$pCat['datalist_id'] => $values],
                                );
                            } else {
                                $properties[$c['id']][$pCat['property_name']]['values'][$pCat['datalist_id']] = $values;
                            }
                        }
                    }
                }
            }
        }

        $brandsDirty = $em->getRepository('CoreManufacturerBundle:Brand')->findByCategoryIds($ids);

        foreach ($categoriesTree as $c) {
            $childrenIds = $this->container->get('core_shop_category_logic')->getChildrenIds([$c['id']], $c['__children']);

            foreach ($childrenIds as $cId) {
                if (isset($brandsDirty[$cId])) {

                    foreach ($brandsDirty[$cId] as $i => $bd) {
                        $brandsDirty[$c['id']][$i] = $bd;
                    }
                }
            }
        }

        $brands = $brandsDirty;
//        ldd($brands);
        if ($this->container->has('debug.stopwatch')) {
            $this->container->get('debug.stopwatch')->stop('Fragments::menu');
        }
        return array(
            'categories' => $categoriesTree,
            'slug' => $slug,
            'discountsAndPromotions' => $discountsAndPromotions,
            'properties' => $properties,
            'brands' => $brands,
        );
    }

    /**
     * Функция для вывода дерева по одной категории
     *
     * @param array $category
     * @return string
     */
    public function buildBranch($category) {
        $htmlBranch = '';
        if (!empty($category['__children'])) {
            $htmlBranch .= '<ul class="nav_submenu_cats">';

            $htmlBranch .= $this->_buildBranch($category['__children']);

            $htmlBranch .= '</ul>';
        }

        return $htmlBranch;
    }

    /**
     * Вспомогательная рекурсивная функция для построения дерева категорий
     *
     * @param array $category
     * @return string
     */
    private function _buildBranch($category) {
        $html = '';
        foreach ($category as $c) {
            if ($c['isEnabled']) {
                $html .= '<li class="nav_submenu_cat">';

                $html .= '<a href="' . $this->container->get('router')->generate('core_shop_product_catalog_first_page', array(
                            'slug' => $c['slug'],
                        )) . '" style="padding-left:' . (-5 + (5 * $c['lvl'])) . 'px !important" class="nav_submenu_cat_link">' . $c['caption' . ucfirst($this->container->get('request')->getLocale())] . '</a>';

                if (!empty($c['__children'])) {
                    $html .= '<li class="nav_submenu_cat">';
                    $html .= $this->_buildBranch($c['__children']);
                    $html .= '</li>';
                }

                $html .= '</li>';
            }
        }

        return $html;
    }

//    /**
//     * Получение брендов по категории
//     *
//     * @param object $category
//     * @return array
//     */
//    public function getBrandByCategory($category)
//    {
//        $em = $this->container->get('doctrine')->getManager();
//
//        $brands = $em->getRepository('CoreManufacturerBundle:Brand')->findByCategory($category);
//
//        return $brands;
//    }

    /**
     * Статьи для футера и хэдера
     * @return array
     */
    public function getArticles()
    {
        $em = $this->container->get('doctrine')->getManager();
        $slugs = ['checkout','payment-order','delivery-types', 'postavshchikam-i-proizvoditieliam'];
        $this->articles = $em->getRepository('CoreFaqBundle:Article')->findForFragments($slugs);
        return $this->articles;
    }

    /**
     * Получить статью из уже выбранных
     * @param string $slug
     * @return object
     */
    public function getArticle($slug)
    {
        $article = null;
        $articles = $this->getArticles();
        foreach ($articles as $val) {
            if ($val->getSlug() == $slug) {
                $article = $val;
                break;
            }
        }
        
        return $article;
    }
}
