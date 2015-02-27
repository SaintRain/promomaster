<?php

/**
 * Админский класс для характеристик
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PropertyBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\ProductBundle\Admin\Form\Mapper\ProductFormMapper;
use Core\ProductBundle\Admin\Form\Mapper\ServiceProductFormMapper;
use Core\ProductBundle\Entity\Product;
use Core\ProductBundle\Entity\ServiceProduct;
use Core\PropertyBundle\Entity\Property;
use Core\PropertyBundle\Entity\DataProperty;
use Core\PropertyBundle\Admin\Form\Mapper\PropertyFormMapper;
use Doctrine\Common\Collections\ArrayCollection;
use Knp\Menu\ItemInterface as MenuItemInterface;

class PropertyAdmin extends Admin {

    protected $translationDomain = 'CorePropertyBundle'; // дефолтная группа (домен) для перевода

    /**
     * Дефолтные настройки для списка
     */
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'indexPosition'
    );


    /**
     * Переписываем шаблон, чтобы встроить свой JS
     * @param type $name
     * @return string
     */
    public function getTemplate($name) {
        switch ($name) {
            case 'list':
                return 'ApplicationSonataAdminBundle:CRUD:list_top.html.twig';
            case 'edit':
                return 'CorePropertyBundle:Admin:edit.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object) {
        $text = 'breadcrumb.property.' . ($object->getId() ? 'edit' : 'create');
        $text = $this->trans($text);
        $text .= $object->getId() ? ' «' . $object->getCaptionRu() . '» ' : '';
        return $text;
    }

    public function prePersist($property) {
        $this->checkPropertyData($property);
    }

    public function preUpdate($property) {
        $this->checkPropertyData($property);
    }

    public function checkPropertyData($property) {
        //создаем пустую запись, чтобы можно было ссылаться
        if (in_array($property->getEditType(), ['input', 'input_text', 'textarea', 'editor'])) {
            if (!$property->getDataList()->count()) {
                $dataProperty = new DataProperty();
                $dataProperty->setValue('');
                $property->addDataList($dataProperty);
            }
        }

        foreach ($property->getDataList() as $data) {
            $data->setProperty($property);
        }
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {

        //контейнер
        $options = [
            'container' => $this->getConfigurationPool()->getContainer(),
            'obj' => $this->getSubject(),
            'class' => $this->getClass()
        ];

        new PropertyFormMapper($formMapper, $options);
    }

    /**
     * Отображение списка заказов
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('captionRu', null, array('label' => 'Название'))
                ->add('editType', null, array('label' => 'Элемент редактирования'))
                ->add('indexPosition', null, array(
                    'label' => 'Позиция сортировки',
                    'sortable' => true,
                    'editable' => true))
                ->add('isEnabled', null, array(
                    'label' => 'Активно',
                    'sortable' => true,
                    'editable' => true))
->add('isEnabledInYml', null, array(
                    'label' => 'YML',
                    'sortable' => true,
                    'editable' => true))                
                
                ->add('isUsedInFilter', null, array(
                    'label' => 'Используется в фильтре',
                    'sortable' => true,
                    'editable' => true))
                ->add('_action', 'actions', array(
                    'label' => 'Действия',
                    'actions' => array(
                        'edit' => array(),
                        'delete' => array(
                            'ask_confirmation' => true
                        )
        )));
    }

    /**
     * Настройки фильтра для списка заказов
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('captionRu', null, array('label' => 'Название'), null, ['attr'=>['placeholder'=>'Название']])
                ->add('isEnabled', null, array('label' => 'Активно'), null, ['attr'=>['placeholder'=>'Активно']])
                ->add('isUsedInFilter', null, array('label' => 'Используется в фильтре'), null, ['attr'=>['placeholder'=>'Используется в фильтре']])
                ->add('categories', null, array('label' => 'Категории'), null, array('property' => 'indentedCaption',
                    'attr'=>['placeholder'=>'Категории'],
                    'multiple' => true))
        ;
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
//
//        $menu->addChild(
//                'Характеристики', array(
//            'route' => 'admin_core_property_property_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_property_property_') ? 'active' : '')
//            )
//        ));
//        $menu->addChild(
//                'Единицы измерения', array(
//            'route' => 'admin_core_property_units_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_property_units_') ? 'active' : '')
//            )
//        ));
//        $menu->addChild(
//                'Группы для единиц измерений', array(
//            'route' => 'admin_core_property_unitsgroups_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_property_unitsgroups_') ? 'active' : '')
//            )
//        ));
//    }

}