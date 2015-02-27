<?php

/**
 * Админский класс для габаритов коробки
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\OrderBundle\Admin\Form\Mapper\SizesOfBoxFormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use \Sonata\AdminBundle\Admin\AdminInterface;
use Core\LogisticsBundle\Admin\StockAdmin;

class SizesOfBoxAdmin extends Admin {

    protected $translationDomain = 'CoreOrderBundle'; // дефолтная группа (домен) для перевода

     /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {

        $obj = $this->getSubject(); //объект для формы
        $container = $this->getConfigurationPool()->getContainer();    //контейнер
        $options = array('obj' => $obj, 'container' => $container);

        new SizesOfBoxFormMapper($formMapper, $options);
    }

}