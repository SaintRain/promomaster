<?php

/**
 * Админский класс для производителей
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ManufacturerBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\ManufacturerBundle\Entity\Manufacturer;
use Core\ManufacturerBundle\Admin\Form\Mapper\ManufacturerFormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;

class ManufacturerAdmin extends Admin
{

    protected $formOptions = array(
        'cascade_validation' => true
    );

    /**
     * Дефолтные настройки для списка
     */
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'indexPosition'
    );

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object)
    {
        $text = null === $object->getId() ? 'Добавление нового производителя' : 'Производитель «' . $object->getCaptionRu() . '»';
        return $text;
    }

    public function getTemplate($name)
    {
        switch ($name) {
            case 'list':
                return 'ApplicationSonataAdminBundle:CRUD:list_top.html.twig';
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {

        //объект для формы
        if (!$obj = $this->getSubject()) {
            $obj = $this->getNewInstance();
        }

        //формируем опции для формы
        $options = array(
            'obj' => $obj,
            'container' => $this->getConfigurationPool()->getContainer(),
        );

        if ($obj instanceof Manufacturer) {
            new ManufacturerFormMapper($formMapper, $options);
        }
    }

    /**
     * Отображение списка
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', null, array('label' => 'ID'))
            ->addIdentifier('logo', null, array(
                'label' => 'Логотип',
                'template' => 'CoreFileBundle:Admin\List:list_image.html.twig'
            ))
            ->addIdentifier('captionRu', null, array('label' => 'Название'))
            ->add('urlSite', null, array(
                'label' => 'Сайт',
                'template' => 'CoreManufacturerBundle:Admin\List:list_url.html.twig'
            ))
            ->add('country', null, array(
                'label' => 'Страна',
                'associated_property' => 'captionRu'
            ))
            ->add('certificates', null, array(
                'label' => 'Сертификаты',
                'template' => 'CoreManufacturerBundle:Admin\List:list_manufacturer_certificates.html.twig'
            ))
            ->add('indexPosition', null, array(
                'label' => 'Позиция сортировки',
                'editable' => true
            ))
            ->add('isCanBeInYml', null, array(
                'label' => 'Включено в YML',
                'sortable' => true,
                'editable' => true
            ))
            ->add('_action', 'actions', array(
                'label' => 'Действия',
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(
                        'ask_confirmation' => true
                    )
                )
            ));
    }

    /**
     * Переписываем запрос на выборку
     */
    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);

        // получаем сокращенное название сущности в запросе
        $rootAlias = $query->getQueryBuilder()->getRootAlias();
        // добавляем выборку всех логотипоп, сертификатов, продуктов и стран
        $query
            ->leftJoin($rootAlias . '.logo', 'logo')->addSelect('logo')
            ->leftJoin($rootAlias . '.certificates', 'certificates')->addSelect('certificates')
            ->leftJoin($rootAlias . '.country', 'country')->addSelect('country');
        return $query;
    }

    /**
     * Настройки фильтра для списка заказов
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('captionRu', null, array('label' => 'Название',), null, ['attr' => ['placeholder' => 'Название']])
            ->add('country', null, array('label' => 'Страна'), null,
                array('property' => 'captionRu', 'attr' => ['placeholder' => 'Страна']))
            ->add('isCanBeInYml', null, array('label' => 'Включено в YML'), null,
                array( 'attr' => ['placeholder' => 'Включено в YML']))
        ;
    }

    /**
     * Редактор бокового меню
     */
//    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
//    {
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
//                'Производители', array(
//            'route' => 'admin_core_manufacturer_manufacturer_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_manufacturer_manufacturer_') ? 'active' : '')
//            )
//        ));
//        $menu->addChild(
//                'Бренды', array(
//            'route' => 'admin_core_manufacturer_brand_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_manufacturer_brand_') ? 'active' : '')
//            )
//        ));
//        $menu->addChild(
//                'Сертификаты', array(
//            'route' => 'admin_core_manufacturer_certificate_list',
//            'attributes' => array(
//                'class' => (false !== strpos($route, 'admin_core_manufacturer_certificate_') ? 'active' : '')
//            )
//        ));
//    }

}
