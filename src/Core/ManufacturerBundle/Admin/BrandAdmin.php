<?php

/**
 * Админский класс для серий брендов
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ManufacturerBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\ManufacturerBundle\Admin\Form\Mapper\BrandFormMapper;

class BrandAdmin extends Admin
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
        $text = null === $object->getId() ? 'Добавление нового бренда' : 'Редактирование бренда «' . $object->getCaptionRu() . '»';
        return $text;
    }

    /**
     * Переписываем шаблон, чтобы встроить свой JS
     * @param type $name
     * @return string
     */
    public function getTemplate($name)
    {
        switch ($name) {
            case 'list':
                return 'ApplicationSonataAdminBundle:CRUD:list_top_in_new_window.html.twig';
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(), array('CoreManufacturerBundle:Admin\Form\Brand:form_admin_fields.html.twig')
        );
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

        new BrandFormMapper($formMapper, $options);
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
            ->addIdentifier('manufacturer.captionRu', null, array('label' => 'Производитель'))
            ->add('products', null, array(
                'label' => 'Продукция',
                'template' => 'CoreManufacturerBundle:Admin\List:list_brand_products.html.twig'
            ))
            ->add('indexPosition', null, array(
                'label' => 'Позиция сортировки',
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
        // добавляем выборку всех логотипов
        $query
            ->leftJoin($rootAlias . '.logo', 'logo')->addSelect('logo');
        return $query;
    }

    /**
     * Настройки фильтра для списка заказов
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('captionRu', null, array('label' => 'Название'), null, ['attr' => ['placeholder' => 'Название']])
            ->add('manufacturer', null, array('label' => 'Производитель'), null,
                ['attr' => ['placeholder' => 'Производитель'], 'property' => 'captionRu']);
    }

    /**
     * Редактор бокового меню
     */
//    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
//    {
//        $container = $this->getConfigurationPool()->getContainer();
//        \Core\ManufacturerBundle\Admin\ManufacturerAdmin::configureSubMenu($menu, $action, $childAdmin, $container);
//    }

}
