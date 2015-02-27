<?php

/**
 * Админский клас для статистических данных
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\PropertyBundle\Admin\Form\Mapper\UnitsFormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Route\RouteCollection;

class StatisticsAdmin extends Admin {

    protected $translationDomain = 'CoreStatisticsBundle'; // дефолтная группа (домен) для перевода

    protected function configureRoutes(RouteCollection $collection) {        
        $collection->add('deficitProductStatistics')
                ->add('inventoryStatistics')
                ->add('virtualUnitsStatistics');
        
    }

}
