<?php

/**
 * Админский класс для редактирования дополнительных расходов поставки
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\LogisticsBundle\Admin\Form\Mapper\AdditionalCostsOfSupplyFormMapper;

class AdditionalCostsOfSupplyAdmin extends Admin {

    protected $translationDomain = 'CoreLogisticsBundle'; // дефолтная группа (домен) для перевода
   
    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {

        $obj = $this->getSubject(); //объект для формы
        $container = $this->getConfigurationPool()->getContainer();    //контейнер
        $options = array('obj' => $obj, 'container' => $container);

        new AdditionalCostsOfSupplyFormMapper($formMapper, $options);
    }
}