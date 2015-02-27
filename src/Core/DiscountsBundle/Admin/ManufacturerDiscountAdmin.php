<?php

/**
 * Админский класс скидок на продукты
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DiscountsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use \Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\DatagridMapper;

class ManufacturerDiscountAdmin extends Admin
{

    protected $translationDomain = 'CoreDiscountsBundle'; // дефолтная группа (домен) для перевода
    protected $formOptions = array(
        'cascade_validation' => true
    );

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object)
    {
        $caption = [];
        if ($object->getManufacturers()) {
            foreach ($object->getManufacturers() as $b) {
                $caption[] = $b->getCaptionRu();
            }
        }
        $text = null === $object->getId() ? 'Добавление новой скидки для производителя' : 'Редактирование скидки для производителя «' . implode(', ', $caption) . '»';
        return $text;
    }

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query
                ->addSelect('m, sv')
                ->leftJoin($query->getRootAlias() . '.manufacturerStepValues', 'sv')
                ->leftJoin($query->getRootAlias() . '.manufacturers', 'm')
        ;
        return $query;
    }

    /**
     * Переопределяем некоторые шаблоны
     * @param type $name
     * @return string
     */
    public function getTemplate($name)
    {
        switch ($name) {
            case 'list':
                return 'ApplicationSonataAdminBundle:CRUD:list_top.html.twig';
            default:
                return parent::getTemplate($name);
        }
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {

        $obj = $this->getSubject(); //объект для формы
        $container = $this->getConfigurationPool()->getContainer();    //контейнер
        $options = array('obj' => $obj, 'container' => $container);

        $formMapper
                ->with('Основное')
                ->add('isEnabled', null, array(
                    'required' => false,
                    'label' => 'Скидка активна',
                ))
                ->add('manufacturers', null, array(
                    'property' => 'captionRu',
                    'label' => 'Производитель',
                    'help' => 'Скидка на продукт действует лишь в том случае, если есть полное соответствие производителей в скидке с производителями в продуктах'
                    . 'Чтобы задать для каждого производителя свои настройки нужно для каждого производителя в отдельности добавить скидки.'))
                ->add('manufacturerStepValues', 'sonata_type_collection', array(
                    'help' => '*Ограничение в днях - количество дней выставляется, если нужно ограничить накопительную сумму по времени. Например, сумма заказа берётся за последние 30 дней. Если поставить 0, то ограничение по времени не распространяется.',
                    'required' => true,
                    'by_reference' => false,
                    'btn_add' => 'Добавить',
                    'label' => 'Значения скидки'), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'indexPosition'
                ))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->addIdentifier('id', null, array('label' => 'ID'))
                ->add('createdDateTime', null, array('label' => 'Дата создания'))
                ->addIdentifier('manufacturers', null, array('label' => 'Производители', 'template' => 'CoreDiscountsBundle:Admin/ManufacturerDiscount/list_td:manufacturers.html.twig'))
                ->add('manufacturerStepValues', null, array('label' => 'Скидки', 'template' => 'CoreDiscountsBundle:Admin/ManufacturerDiscount/list_td:ManufacturerStepValues.html.twig'))
                ->add('isEnabled', null, array('editable' => true, 'label' => 'Включено'))
                ->add('_action', 'actions', array(
                    'label' => 'Редактировать',
                    'actions' => array(
                        'edit' => array()
                    )
        ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid)
    {
        $datagrid->add('manufacturers', null, array('label' => 'Производители'), null, array('property' => 'captionRu', 'attr' => ['placeholder' => 'Производитель'], 'multiple' => true))
        ;
    }

//    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
//    {
//        $container = $this->getConfigurationPool()->getContainer();
//        $this->configureSubMenu($menu, $action, $childAdmin, $container);
//    }

    /**
     * Переделываем боковое меню в табы на списке записей
     *
     * @param \Knp\Menu\ItemInterface $menu
     * @param string $action
     * @param \Sonata\AdminBundle\Admin\AdminInterface $childAdmin
     * @param object $routeGenerator
     */
//    static public function configureSubMenu($menu, $action, $childAdmin, $container)
//    {
//        $route = $container->get('request')->get('_route');
//
//        if (false === strpos($route, '_batch') && $action === 'list') {
//            // Присваеиваем класс nav-tabs вместо nav-list, чтобы меню вывелось табами, а не списком
//            $attrClass = str_replace('nav-list', 'nav-tabs', $menu->getChildrenAttribute('class'));
//            $menu->setChildrenAttribute('class', $attrClass);
//        }
//
//        $menu->addChild(
//                'Скидки по производителям', array(
//            'route' => 'admin_core_discounts_manufacturerdiscount_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_discounts_manufacturerdiscount_') ? 'active' : '')
//            )
//        ));
//        $menu->addChild(
//                'Индивидуальные скидки по производителям', array(
//            'route' => 'admin_core_discounts_contragentmanufacturerdiscount_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_discounts_contragentmanufacturerdiscount_') ? 'active' : '')
//            )
//        ));
//    }

}
