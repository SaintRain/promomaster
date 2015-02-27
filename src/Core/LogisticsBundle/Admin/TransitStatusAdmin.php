<?php

/**
 * Админский класс для статусов транзитов
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\LogisticsBundle\Admin\Form\Mapper\UnitStatusFormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use \Sonata\AdminBundle\Admin\AdminInterface;
use Core\LogisticsBundle\Admin\StockAdmin;

class TransitStatusAdmin extends Admin {

    protected $translationDomain = 'CoreLogisticsBundle'; // дефолтная группа (домен) для перевода

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */

    public function toString($object) {
        $text = null === $object->getId() ? 'Добавление нового статуса' : 'Редактирование статуса «' . $object->getCaptionRu() . '»';
        return $text;
    }

    /**
     * Дефолтные настройки для списка
     */
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by' => 'indexPosition'
    );

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {

//        $obj = $this->getSubject(); //объект для формы
//        $container = $this->getConfigurationPool()->getContainer();    //контейнер
//        $options = array('obj' => $obj, 'container' => $container);

        $formMapper->with('Основное')
                ->add('captionRu', null, array(
                    'required' => true,
                    'label' => 'Название статуса'))
                ->add('indexPosition', null, array(
                    'required' => true,
                    'label' => 'Индекс сортировки'))
                ->add('name', null, array(
                    'required' => false,
                    'disabled' => !$this->isGranted('UPDATE_NAME'),
                    'label' => 'Системное имя',
                    'help' => 'Если оставить пустым, тогда заполниться автоматически. Может использоваться программистом.'
                ))
                ->end();
    }

    /**
     * Отображение списка заказов
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('captionRu', 'string', array('label' => 'Название'))
                ->add('name', null, ['label' => 'Сис. имя'])
                ->add('indexPosition', null, array(
                    'label' => 'Позиция сортировки',
                    'editable' => true))
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
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     * @return void
     */
    protected function configureShowFields(ShowMapper $showMapper) {
        $showMapper
                ->add('captionRu', null, ['label' => 'Название'])
                ->add('name', null, ['label' => 'Системное имя']);
    }

    /**
     * Редактор бокового меню
     */
//    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null) {
//        $container = $this->getConfigurationPool()->getContainer();
//        StockAdmin::configureSubMenu($menu, $action, $childAdmin, $container);
//    }

}