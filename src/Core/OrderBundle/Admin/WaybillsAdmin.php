<?php

/**
 * Админский класс для заказов
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\OrderBundle\Admin\Form\Mapper\WaybillsFormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use \Sonata\AdminBundle\Admin\AdminInterface;
use Core\LogisticsBundle\Admin\StockAdmin;

class WaybillsAdmin extends Admin {

    protected $translationDomain = 'CoreOrderBundle'; // дефолтная группа (домен) для перевода

     /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $obj = $this->getSubject(); //объект для формы
        $container = $this->getConfigurationPool()->getContainer();    //контейнер
        $options = array('obj' => $obj, 'container' => $container);

        new WaybillsFormMapper($formMapper, $options);
    }

}