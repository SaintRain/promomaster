<?php

/**
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Admin\AdminInterface;
use Core\CategoryBundle\Entity\ProductCategory;
use Core\CategoryBundle\Entity\TroubleTicketCategory;
use Core\CategoryBundle\Entity\FaqCategory;
use Core\CategoryBundle\Admin\Form\Mapper\ProductCategoryFormMapper;
use Core\CategoryBundle\Admin\Form\Mapper\TroubleTicketCategoryFormMapper;
use Core\CategoryBundle\Admin\Form\Mapper\FaqCategoryFormMapper;



use Core\CategoryBundle\Entity\SiteCategory;
use Core\CategoryBundle\Admin\Form\Mapper\SiteCategoryFormMapper;

use Knp\Menu\ItemInterface as MenuItemInterface;

class CommonAdminCategory extends Admin {

    protected $translationDomain = 'messages'; // дефолтная группа (домен) для перевода

    /**
     * Форма редактирования
     * {@inheritdoc}
     */

    protected function configureFormFields(FormMapper $formMapper) {

        //формируем опции для формы
        $obj = $this->getSubject();
        $options = array(
            'disabled' => 1,
            'obj' => $obj,
            'class' => $this->getClass(),
            'container' => $this->getConfigurationPool()->getContainer()
        );

        //прописываем мапперы для каждого дерева
        switch (true) {
            case $obj instanceof ProductCategory:
                new ProductCategoryFormMapper($formMapper, $options);
                break;
            case $obj instanceof TroubleTicketCategory:
                new TroubleTicketCategoryFormMapper($formMapper, $options);
                break;
            case $obj instanceof FaqCategory:
                new FaqCategoryFormMapper($formMapper, $options);
                break;

            case $obj instanceof SiteCategory:
                new SiteCategoryFormMapper($formMapper, $options);
                break;
        }
    }


    /**
     * Редактор бокового меню
     */
//    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null) {
//        $container = $this->getConfigurationPool()->getContainer();
//        $route = $container->get('request')->get('_route');
//
//        if (false !== strpos($route, 'admin_core_category_troubleticketcategory')) {
//            \Core\TroubleTicketBundle\Admin\TroubleTicketAdmin::configureSubMenu($menu, $action, $childAdmin, $container);
//        }
//    }

}
