<?php

/**
 * Админский класс для складов
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\LogisticsBundle\Admin\Form\Mapper\StockFormMapper;
use Core\LogisticsBundle\Entity\Stock;
use Knp\Menu\ItemInterface as MenuItemInterface;
use \Sonata\AdminBundle\Admin\AdminInterface;

class StockAdmin extends Admin {

    protected $translationDomain = 'CoreLogisticsBundle'; // дефолтная группа (домен) для перевода

    public function toString($object) {
        $text = null === $object->getId() ? 'Добавление нового склада' : 'Редактирование склада «' . $object->getCaptionRu() . '»';
        return $text;
    }

//    public function createQuery($context = 'list') {
//        $query = parent::createQuery($context);
//        $query
//                ->addSelect('c')
//                ->leftJoin($query->getRootAlias() . '.country', 'c');
//        return $query;
//    }

    /**
     * Переписываем шаблон, чтобы встроить свой стили для таблицы sonata_type_collection
     * @return string
     */
    public function getTemplate($name) {
        switch ($name) {
            case 'edit':
                return 'CoreLogisticsBundle:Admin\Stock\Form:edit.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {

        $obj = $this->getSubject(); //объект для формы
        $container = $this->getConfigurationPool()->getContainer();    //контейнер
        $options = array('obj' => $obj, 'container' => $container);

        new StockFormMapper($formMapper, $options);
    }

    /**
     * Отображение списка заказов
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('id', null, array('label' => 'ID'))
                ->addIdentifier('captionRu', 'string', array('label' => 'Название'))
                ->add('address', null, array('label' => 'Адрес'))
                ->add('phone', null, array('label' => 'Телефон'))
                ->add('workTimeStart', null, array('label' => 'Время работы', 'template' => 'CoreLogisticsBundle:Admin/Stock/list_fields:workTimeStart.html.twig'))
                ->add('isGeneralStock', null, array('label' => 'Главный'))
                ->add('_action', 'actions', array(
                    'label' => 'Редактировать',
                    'actions' => array(
                        'edit' => array(),
                        'delete' => array(
                            'ask_confirmation' => true
                        )
                    )
        ));
    }

    /**
     * Редактор бокового меню
     */
//    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null) {
//        $container = $this->getConfigurationPool()->getContainer();
//        $this::configureSubMenu($menu, $action, $childAdmin, $container);
//    }

    /**
     * Переделываем боковое меню в табы на списке записей
     *
     * @param \Knp\Menu\ItemInterface $menu
     * @param string $action
     * @param \Sonata\AdminBundle\Admin\AdminInterface $childAdmin
     * @param object $routeGenerator
     */
//    static public function configureSubMenu($menu, $action, $childAdmin, $container) {
//        $route = $container->get('request')->get('_route');
//
//        if (false === strpos($route, '_batch') && $action === 'list') {
//            // Присваеиваем класс nav-tabs вместо nav-list, чтобы меню вывелось табами, а не списком
//            $attrClass = str_replace('nav-list', 'nav-tabs', $menu->getChildrenAttribute('class'));
//            $menu->setChildrenAttribute('class', $attrClass);
//        }

//        $menu->addChild(
//                'Предзаказы', array(
//            'route' => 'admin_core_product_subscribers_toproductbyorder_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_product_subscribers_toproductbyorder_') ? 'active' : '')
//            )
//        ));
//        $menu->addChild(
//                'Заказы', array(
//            'route' => 'admin_core_order_order_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_order_order_') ? 'active' : '')
//            )
//        ));
//        $menu->addChild(
//                'Товары со всех складов', array(
//            'route' => 'admin_core_logistics_unitinstock_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_logistics_unitinstock_') ? 'active' : '')
//            )
//        ));

//        $menu->addChild(
//                'Транзиты', array(
//            'route' => 'admin_core_logistics_transit_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_logistics_transit_') ? 'active' : '')
//            )
//        ));

//        $menu->addChild(
//                'Поставки', array(
//            'route' => 'admin_core_logistics_supply_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_logistics_supply_') ? 'active' : '')
//            )
//        ));

//        $menu->addChild(
//                'Поставщики', array(
//            'route' => 'admin_core_logistics_supplier_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_logistics_supplier_') ? 'active' : '')
//            )
//        ));
//        $menu->addChild(
//                'Склады', array(
//            'route' => 'admin_core_logistics_stock_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_logistics_stock_') ? 'active' : '')
//            )
//        ));


//        $menu->addChild(
//                'Справочник банков', array(
//            'route' => 'admin_core_logistics_bank_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_logistics_bank_') ? 'active' : '')
//            )
//        ));

//        $menu->addChild(
//                'Продавцы', array(
//            'route' => 'admin_core_logistics_seller_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_logistics_seller_') ? 'active' : '')
//            )
//        ));




//        $menu->addChild(
//                'Статусы единиц товаров', array(
//            'route' => 'admin_core_logistics_unitstatus_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_logistics_unitstatus_') ? 'active' : '')
//            )
//        ));

//        $menu->addChild(
//                'Статусы поставок', array(
//            'route' => 'admin_core_logistics_supplystatus_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_logistics_supplystatus_') ? 'active' : '')
//            )
//        ));

//        $menu->addChild(
//                'Типы расходов поставки', array(
//            'route' => 'admin_core_logistics_additionalcoststypeofsupply_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_logistics_additionalcoststypeofsupply_') ? 'active' : '')
//            )
//        ));

//        $menu->addChild(
//                'Причины отмены заказы', array(
//            'route' => 'admin_core_order_canceledreason_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_order_canceledreason_') ? 'active' : '')
//            )
//        ));

//        $menu->addChild(
//                'Причины списания', array(
//            'route' => 'admin_core_logistics_unitinstockdefectreason_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_logistics_unitinstockdefectreason_') ? 'active' : '')
//            )
//        ));

//        $menu->addChild(
//                'Доп. статусы заказов', array(
//            'route' => 'admin_core_order_extrastatus_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_order_extrastatus_') ? 'active' : '')
//            )
//        ));

//        $menu->addChild(
//                'Статусы транзитов', array(
//            'route' => 'admin_core_logistics_transitstatus_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_logistics_transitstatus_') ? 'active' : '')
//            )
//        ));
//    }

}
