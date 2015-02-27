<?php

/**
 * Админский класс для поставщиков
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\LogisticsBundle\Admin\Form\Mapper\SupplierFormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use \Sonata\AdminBundle\Admin\AdminInterface;
use Core\LogisticsBundle\Admin\StockAdmin;

class SupplierAdmin extends Admin {

    protected $translationDomain = 'CoreLogisticsBundle'; // дефолтная группа (домен) для перевода

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */

    public function toString($object) {
        $text = null === $object->getId() ? 'Добавление нового поставщика' : 'Редактирование поставщика «' . $object->getCaption() . '»';
        return $text;
    }

    public function createQuery($context = 'list') {
        $query = parent::createQuery($context);
        $query
                ->addSelect('c')
                ->leftJoin($query->getRootAlias() . '.country', 'c');
        return $query;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {

        $obj = $this->getSubject(); //объект для формы
        $container = $this->getConfigurationPool()->getContainer();    //контейнер
        $options = array('obj' => $obj, 'container' => $container);

        new SupplierFormMapper($formMapper, $options);
    }

    /**
     * Отображение списка заказов
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('id', null, array('label' => 'ID'))
                ->addIdentifier('caption', 'string', array('label' => 'Название'))
                ->add('inn', null, ['label' => 'Реквизиты', 'template' => 'CoreLogisticsBundle:Admin/Supplier/list_fields:requisites.html.twig'])
                ->add('positionOfTheHead', null, ['label' => 'Руководитель', 'template' => 'CoreLogisticsBundle:Admin/Supplier/list_fields:positionOfTheHead.html.twig'])
                ->add('regionsCityList', null, ['label' => 'Страна / Город / Адреса', 'template' => 'CoreLogisticsBundle:Admin/Supplier/list_fields:regionsCityList.html.twig'])
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
//        StockAdmin::configureSubMenu($menu, $action, $childAdmin, $container);
//    }

}