<?php

/**
 * Админский класс для редактирования серийников для товарных позиций
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Core\LogisticsBundle\Admin\Form\Mapper\UnitInStockFormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use \Sonata\AdminBundle\Admin\AdminInterface;
use Core\LogisticsBundle\Admin\StockAdmin;
use Sonata\AdminBundle\Route\RouteCollection;

class UnitSerialsAdmin extends Admin {

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {

//        $obj = $this->getSubject(); //объект для формы
//        $container = $this->getConfigurationPool()->getContainer();    //контейнер
//        $options = array('obj' => $obj, 'container' => $container);

        $formMapper->add('value', 'text', ['label' => 'Значение', 'attr'=>['style'=>'width:100%'] ]);
    }

}
