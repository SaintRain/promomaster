<?php

/**
 * Админский клас для единиц измерения
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\DirectoryBundle\Admin\Form\Mapper\UnitOfMeasureGroupFormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;

class UnitOfMeasureGroupAdmin extends Admin {

    protected $translationDomain = 'CoreDirectoryBundle'; // дефолтная группа (домен) для перевода

    /**
     * Дефолтные настройки для списка
     */
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'indexPosition'
    );

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object) {
        $text = 'breadcrumb.' . ($object->getId() ? 'edit' : 'create') . '.' . 'UnitsGroups';
        $text = $this->trans($text);
        $text .= $object->getId() ? ' «' . $object->getCaptionRu(). '»' : '';
        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {

        //контейнер
        $options = [
            'container' => $this->getConfigurationPool()->getContainer(),
            'obj'   =>$this->getSubject()
        ];

        new UnitOfMeasureGroupFormMapper($formMapper, $options);
    }

    /**
     * Отображение списка заказов
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('captionRu', null, array('label' => 'Название единицы измерения'))
                   ->addIdentifier('name', null, array('label' => 'Системное имя'))
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
     * Настройки фильтра для списка заказов
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('captionRu', null, array('label' => 'Название'))
        ;
    }

    /**
     * Редактор бокового меню
     */
//    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null) {
//        $container = $this->getConfigurationPool()->getContainer();
//        \Core\PropertyBundle\Admin\PropertyAdmin::configureSubMenu($menu, $action, $childAdmin, $container);
//    }
}