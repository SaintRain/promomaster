<?php

/**
 * Бизнес-логика категорий
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\Logic;

class CategoryLogic
{

    private $em;
    private $router;
    private $editRouteFormat = 'admin_core_category_%s_edit';
    private $container;

    public function __construct($em, $router, $container)
    {
        $this->em = $em;
        $this->router = $router;
        $this->container = $container;
    }

    /**
     * Получение дерева категорий оформленного ввиде HTML-кода для JSTree плагина
     * @param type $options
     * @return type
     */
    public function getHtmlJSTree($options = array())
    {

        if (!isset($options['tree'])) {
            $options['tree'] = array(
                'decorate' => true,
                'rootOpen' => '<ul>',
                'rootClose' => '</ul>',
                'childOpen' => function($node) {
                return '<li id="phtml_' . $node['id'] . '">';
            },
                'childClose' => '</li>',
                'nodeDecorator' => function($node) use ($options) {
                if (isset($options['link_format'])) {
                    $link = sprintf($options['link_format'], $node['id']);
                } else {
                    $link = '#';
                }

                if (!$node['isEnabled']) {
                    $class = ' class="jstree_disabled" title="Не активно ID:' . $node['id'] . '" ';
                } else {
                    $class = 'title="ID:' . $node['id'] . '" ';
                }

                //дополнительные атрибуты
                if (isset($node['attr'])) {
                    $attr = $node['attr'];
                } else {
                    $attr = '';
                }

                return '<a data-lvl="' . $node['lvl'] . '" ' . $attr . ' ' . $class . ' href="' . $link . '" >' . $node['captionRu'] . '</a>';
            }
            );
        }

        $tree = $this->em->getRepository($options['class'])->getBuildTree($options);

        return $tree;
    }

    /**
     * Возвращает URL для подстановки в него ID
     * @param type $class
     * @return type
     */
    public function getEditLinkFormat($class)
    {
        $tmp = explode('\\', $class);
        $editRoute = sprintf($this->editRouteFormat, strtolower(end($tmp)));
        $editLinkFormat = $this->router->generate($editRoute, array('id' => ':id'));
        $editLinkFormat = str_replace(':id', '%d', $editLinkFormat);  //подготавливаем для sprintf
        return $editLinkFormat;
    }

    /**
     * Подсчет товаров в каждой категории
     *
     * @param type $categories
     * @param type $cat_index
     * @return type
     * @author Sergeev A.M.
     */
    public function getCategoryTreeToShow($isTree = true)
    {
        $repo = $this->container->get('doctrine')->getManager()->getRepository('CoreCategoryBundle:ProductCategory');

        $allCategories = $repo->findForMenu();

        $this->_computeProductQuantity($allCategories);
        $categories = [];
        $disabled = array();
        foreach ($allCategories as $cat) {

            // собираем id выключеных категорий и их потомков
            if ($cat['cat']['isEnabled'] == 0 || in_array($cat['parentId'], $disabled)) {
                $disabled[] = $cat['cat']['id'];
            }

            if ($cat['cat']['lvl'] >= 1 && $cat['countProducts'] && !in_array($cat['cat']['id'], $disabled)) {
                $cat['cat']['parentId'] = $cat['parentId'];
                $categories[] = $cat['cat'];
            }
        }

        return $isTree ? $repo->buildTreeArray($categories) : $categories;
    }

    /**
     * Подсчет товаров в каждой категории
     *
     * @param type $categories
     * @param type $cat_index
     * @return type
     * @author Sergeev A.M.
     */
    private function _computeProductQuantity(&$categories, $cat_index = -1)
    {
        $cat_index++;
        $quantity = 0;
        for ($i = $cat_index; $i < count($categories); $i++) {
            if ($categories[$i]['cat']['isEnabled']) {
                if ($categories[$i]['cat']['lvl'] == 1) {
                    $categories[$i]['countProducts'] += $this->_computeProductQuantity($categories, $i);
                    break;
                } else if ($categories[$i]['cat']['lvl'] > 1) {
                    $quantity += $categories[$i]['countProducts'];
                }
            }
        }

        return $quantity;
    }

    /**
     * Вспомагательная рекурсивная функция
     * Получение id || slug || ... всех активных дочерних категорий
     *
     * @param type $category
     * @return array
     * @author Sergeev A.M.
     */
    public function getChildrenIds($idsParent, $categories)
    {
        $ids = [];
        foreach ($categories as $c) {
            if (in_array($c['id'], $idsParent) || in_array($c['parentId'], $idsParent)) {
                $ids[] = (int) $c['id'];
            }

            if ($c['__children']) {
                $ids = array_merge($ids, $this->getChildrenIds($idsParent, $c['__children']));
            }
        }

        return $ids;
    }

}
