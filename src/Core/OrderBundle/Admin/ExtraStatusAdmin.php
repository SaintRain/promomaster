<?php

/**
 * Админский класс для редактирования дополнительных статусов заказа
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use \Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Core\OrderBundle\Entity\ExtraStatus;
use Core\LogisticsBundle\Admin\StockAdmin;
use Sonata\AdminBundle\Route\RouteCollection;

class ExtraStatusAdmin extends Admin
{

    protected $translationDomain = 'CoreOrderBundle'; // дефолтная группа (домен) для перевода

    public function toString($object)
    {
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
     * Отображение списка заказов
     */
    protected function configureListFields(ListMapper $listMapper)
    {
//http://www.olikids-sam.ru.vm/app_dev.php/admin/sonata/user/group/3/edit
        
//        ExtraStatus::getGeneralStatuses()
        $listMapper
                ->addIdentifier('captionRu', 'string', array('label' => 'Название'))
                ->add('name', null, ['label' => 'Сис. имя'])
                ->add('generalStatus', null, ['label' => 'Основной статус', 'template' => 'CoreOrderBundle:Admin/Form/ExtraStatus/list_fields:generalStatus.html.twig'])
                ->add('hex', null, array(
                'label' => 'Цвет (HEX)',
                'template' => 'CoreOrderBundle:Admin/Form/ExtraStatus/list_fields:color_preview.html.twig',))
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
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper->with('Основное')
                ->add('generalStatus', 'choice', array(
                    'choices' => ExtraStatus::getGeneralStatuses(),
                    'required' => true,
//                    'disabled'=>!$this->isGranted('UPDATE_NAME'),
                    'label' => 'Основной статус',
                    'help' => 'Дополнительные статусы устанавливаются для одного из основных статусов. Также дополнительные статусы описывают промежуточное состояние заказа'
                    . ' между основными статусами.'
                ))
                ->add('captionRu', null, array(
                    'required' => true,
                    'label' => 'Название статуса'))
                ->add('name', null, array(
//                    'disabled'=>!$this->isGranted('UPDATE_NAME'),
                    'required' => false,
                    'label' => 'Системное имя',
                    'help' => 'Если оставить пустым, тогда заполниться автоматически. Может использоваться программистом.'
                ))
                ->add('hex', 'colorpicker', array(
                     'required' => false,
                    'label' => 'Цвет (HEX)', 'help' => 'Заданый цвет используетсядля окрашивания статуса при выводе в кабинете пользователя'))
                ->add('indexPosition', 'text', array(
                    'required' => false,
                    'attr' => ['data-mask' => 'integer'],
                    'label' => 'Индекс сортировки'))
                ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
                ->add('generalStatus', 'doctrine_orm_choice', array('label' => 'Основной статус'), 'choice', array('choices' => ExtraStatus::getGeneralStatuses())
        );
    }

    /**
     * Редактор бокового меню
     */
//    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
//    {
//        $container = $this->getConfigurationPool()->getContainer();
//        StockAdmin::configureSubMenu($menu, $action, $childAdmin, $container);
//    }

}
