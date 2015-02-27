<?php

/**
 * Админский класс для статусов поставок
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use \Sonata\AdminBundle\Admin\AdminInterface;
use Core\LogisticsBundle\Admin\StockAdmin;

class AdditionalCostsTypeOfSupplyAdmin extends Admin
{

    protected $translationDomain = 'CoreLogisticsBundle'; // дефолтная группа (домен) для перевода

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
        $text = null === $object->getId() ? 'Добавление нового типа' : 'Редактирование типа «' . $object->getCaptionRu() . '»';
        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper->with('Основное')
                ->add('captionRu', null, ['label' => 'Название'])                
//                ->add('indexPosition', null, ['label' => 'Индекс позиции'])
                ;
    }

    /**
     * Отображение списка заказов
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->addIdentifier('captionRu', 'string', array('label' => 'Название'))          
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
     * Редактор бокового меню
     */
//    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
//    {
//        $container = $this->getConfigurationPool()->getContainer();
//        StockAdmin::configureSubMenu($menu, $action, $childAdmin, $container);
//    }

}
