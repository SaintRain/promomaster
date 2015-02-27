<?php

/**
 * Админский класс для редактирования значений скидок по производителям
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DiscountsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use \Sonata\AdminBundle\Admin\AdminInterface;
use Symfony\Component\Intl\Intl;

class ManufacturerStepValuesAdmin extends Admin {

    protected $translationDomain = 'CoreDiscountsBundle'; // дефолтная группа (домен) для перевода

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {

        $obj = $this->getSubject(); //объект для формы
        $container = $this->getConfigurationPool()->getContainer();    //контейнер
        $options = array('obj' => $obj, 'container' => $container);
        //берём дефолтную валюту
        $defaul_currency=Intl::getCurrencyBundle()->getCurrencySymbol($container->getParameter('default_currency'), $container->getParameter('locale'));
        
        $formMapper->add('stepValue', 'money', ['label' => 'Накопительная сумма заказов',  'attr'=>['data-mask'=>'money']])
                ->add('stepDays', 'text', ['label' => 'Ограничение в днях',                    
                    'attr'=>['data-mask'=>'integer']])
                ->add('discountValue', null, ['label' => 'Значение скидки', 'attr'=>['data-mask'=>'decimal']])
                ->add('isDiscountValueInPercent', 'choice', array(
                    'label' => 'Скидка задана в',
                    'required'=>true,
                    'choices'=>[0=>$defaul_currency, 1=>'Процентах']
                    ))
                    ->add('indexPosition', 'hidden', array('required' => false, 'attr' => array('hidden' => true)))
                ;
    }

    
    /**
     * Редактор бокового меню
     */
//    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null) {
//        $container = $this->getConfigurationPool()->getContainer();
//        StockAdmin::configureSubMenu($menu, $action, $childAdmin, $container);
//    }
}