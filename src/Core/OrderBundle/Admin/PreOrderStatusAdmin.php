<?php

/**
 * Админский класс для редактирования статусов предзаказа
 *
 * @author  Kaluzhniy N.I.
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

class PreOrderStatusAdmin extends Admin
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
                ->add('captionRu', null, array(
                    'required' => true,
                    'label' => 'Название статуса'))
                ->add('name', null, array(
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
        parent::configureDatagridFilters($datagridMapper);
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
