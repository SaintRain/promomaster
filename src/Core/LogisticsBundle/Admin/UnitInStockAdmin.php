<?php

/**
 * Админский класс для единиц товара на складе
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

class UnitInStockAdmin extends Admin
{

    protected $translationDomain = 'CoreLogisticsBundle'; // дефолтная группа (домен) для перевода

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */

    public function toString($object)
    {
        $text = null === $object->getId() ? 'Добавление единицы на складе' : 'Редактирование единицы товара «' . $object->getProduct()->getArticle() . '»';
        return $text;
    }

    public function configure()
    {
        parent::configure();

        $this->datagridValues['_sort_by'] = 'id';
        $this->datagridValues['_sort_order'] = 'DESC';
    }

    /**
     * Переопределяем некоторые шаблоны
     * @param type $name
     * @return string
     */
    public function getTemplate($name)
    {
        switch ($name) {
            case 'list':
                return 'ApplicationSonataAdminBundle:CRUD:list_top.html.twig';
            default:
                return parent::getTemplate($name);
        }
    }

    public function getFormTheme()
    {
        return array_merge(
                parent::getFormTheme(), array('CoreLogisticsBundle:Admin/UnitInStock/form:form_admin_fields.html.twig')
        );
    }

    /**
     * Настраиваем кнопки добавления
     * @param \Sonata\AdminBundle\Route\RouteCollection $collection
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
        $collection->remove('delete');
    }

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query
                ->addSelect('p,s,sup,supply,st,sel,ser,defR')
                ->leftJoin($query->getRootAlias() . '.product', 'p')
                ->leftJoin($query->getRootAlias() . '.supplier', 'sup')
                ->leftJoin($query->getRootAlias() . '.supply', 'supply')
                ->leftJoin('supply.status', 's')
                ->leftJoin($query->getRootAlias() . '.stock', 'st')
                ->leftJoin($query->getRootAlias() . '.seller', 'sel')
                ->leftJoin($query->getRootAlias() . '.serials', 'ser')
                ->leftJoin($query->getRootAlias() . '.defectReason', 'defR')
        ;

        return $query;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {

        $obj = $this->getSubject(); //объект для формы
        $container = $this->getConfigurationPool()->getContainer();    //контейнер
        $options = array('obj' => $obj, 'container' => $container);

        $optionsForExtraBlocks = array(
            'sides' => ['bottom' => [1]],
            'tabs' => ['audit'],
        );
        $container->get('application_sonata_admin_extra_blocks_logic')->setWhatShow($optionsForExtraBlocks);

        new UnitInStockFormMapper($formMapper, $options);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->addIdentifier('id', null, array('label' => 'ID'))
                ->add('supply', null, array('label' => 'Поставка', 'template' => 'CoreLogisticsBundle:Admin/UnitInStock/list_fields:supply.html.twig'))
                ->add('product', null, array('label' => 'Продукт', 'template' => 'CoreLogisticsBundle:Admin/UnitInStock/list_fields:product.html.twig'))
                ->add('supplier', null, array('label' => 'Поставщик/Продавец', 'template' => 'CoreLogisticsBundle:Admin/UnitInStock/list_fields:supplier.html.twig'))
                ->add('stock.captionRu', null, array('label' => 'Склад'))
                ->add('serials.value', null, array('label' => 'Серийники', 'template' => 'CoreLogisticsBundle:Admin/UnitInStock/list_fields:serials.html.twig'))
                ->add('priceInGtdCurrency', null, array('label' => 'Цена поставки в валюте ГТД', 'template' => 'CoreLogisticsBundle:Admin/UnitInStock/list_fields:priceInGtdCurrency.html.twig'))
                ->add('product.price', null, array('label' => 'Цена продажи', 'template' => 'CoreLogisticsBundle:Admin/UnitInStock/list_fields:price.html.twig'))
                ->add('createdDateTime', null, array('label' => 'Дата доб-я'))
//                //->add('createdDateTime', null, array('label' => 'Дата изм-я'))
                ->add('supply.status', null, array('label' => 'Статус', 'template' => 'CoreLogisticsBundle:Admin/UnitInStock/list_fields:status.html.twig'))
                ->add('isCouldBeSold', null, array('label' => 'Можно продавать'))
//                ->add('isWithDefect', null, array('label' => 'Списано'))
                ->add('isVirtual', null, array('label' => 'Виртуальный'))
                ->add('_action', 'actions', array(
                    'label' => 'Редактировать',
                    'actions' => array(
                        'edit' => array()
            )))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid)
    {
        $datagrid
                ->add('id', 'doctrine_orm_callback', array(
                    'callback' => array($this, 'searchById'),
                    'field_type' => 'text'
                        ), null, ['attr' => ['placeholder' => 'ID товарной единицы, через запятую']])
                ->add('serials', 'doctrine_orm_callback', array(
                    'callback' => array($this, 'searchBySerials'),
                    'field_type' => 'text'
                        ), null, ['attr' => ['placeholder' => 'Серийники, через запятую']])
                ->add('supply', 'doctrine_orm_callback', array(
                    'callback' => array($this, 'searchBySupplyId'),
                    'field_type' => 'text'
                        ), null, ['attr' => ['placeholder' => 'ID поставки, через запятую']])
                ->add('supplier', null, array('label' => 'Поставщик'), null, array('property' => 'caption', 'attr' => ['placeholder' => 'Поставщик']))
                ->add('seller', null, array('label' => 'Продавец'), null, array('property' => 'caption', 'attr' => ['placeholder' => 'Продавец']))

                //composition
                ->add('products', 'doctrine_orm_callback', array(
                    'label' => 'Продукт в поставке',
                    'field_type' => 'ajax_entity',
                    'callback' => function($qb, $alias, $field, $value) {
                if (!$value['value']) {
                    return;
                }
                $qb
                ->join($alias . '.product', 'prod')
                ->andWhere('prod.id = :prod_id ')->setParameter('prod_id', $value['value']);
            }), null, array(
                    'class' => 'Core\ProductBundle\Entity\CommonProduct',
                    'properties' => array(
                        'id' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'full',
                        ),
                        'sku' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'left',
                        ),
                        'article' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'left',
                        ),
                        'captionRu' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'left',
                        ),
                        'images' => array(
                            'search' => false,
                            'return' => true,
                        ),
                        'price' => array(
                            'search' => false,
                            'return' => true,
                        )),
                    'template_customise_functions' => 'product.html.twig',
                    'select2_constructor' => array(// стандартные настройки списка select2
                        'placeholder' => 'Продукт',
                        'minimumInputLength' => 1,
                        'formatResult' => 'productFormatResult',
                        'formatSelection' => 'productFormatSelection',
                    )
                ))
                //    ->add('mac', null, array('label' => 'Серийный номер'), null, array('attr' => ['placeholder' => 'Серийный номер']))
                ->add('stock', null, array('label' => 'Cклад'), null, array('property' => 'captionRu', 'attr' => ['placeholder' => 'Cклад']))
                ->add('createdDateTime', 'doctrine_orm_callback', array(
                    'label' => 'Добавлено',
                    'callback' => array($this, 'searchByСreatedDateTime'),
                    'field_type' => 'admin_date_range'), null, array('placeholder' => 'Дата')
                )
                ->add('isCouldBeSold', null, array('label' => 'Можно продавать'), null, array('attr' => ['placeholder' => 'Можно продавать']))
                ->add('isVirtual', null, array('label' => 'Виртуальный'), null, array('attr' => ['placeholder' => 'Виртуальный']))
                ->add('isWithDefect', null, array('label' => 'Списано'), null, array('attr' => ['placeholder' => 'Списано']))
                ->add('defectReason', null, array('label' => 'Причина списания'), null, array('property' => 'captionRu', 'attr' => ['placeholder' => 'Причина списания']))
                ->add('productInSupply', 'doctrine_orm_callback', array('label' => 'Грузовая таможенная декларация',
                    'callback' => array($this, 'searchByGtdNumber'),
                        ), null, array('attr' => ['placeholder' => 'Грузовая таможенная декларация']))
                ->add('composition.order', 'doctrine_orm_callback', array(
                    'callback' => array($this, 'searchByOrderId'),
                    'field_type' => 'text'
                        ), null, ['attr' => ['placeholder' => 'ID заказа, через запятую']])

        ;
    }

    public function searchById($queryBuilder, $alias, $field, $value)
    {
        if (!$value['value']) {
            return;
        }
        $expValue = explode(',', $value['value']);
        $ids = array();
        foreach ($expValue as $val) {
            $ids[] = (int) $val;
        }
        if (count($ids) == 1) {
            $queryBuilder->where(sprintf('%s.id', $alias) . ' = :id')
                    ->setParameter('id', $ids[0]);
        } else {
            $queryBuilder->add('where', $queryBuilder->expr()->in(sprintf('%s.id', $alias), ':id'))
                    ->setParameter('id', $ids);
        }
    }

    public function searchByOrderId($queryBuilder, $alias, $field, $value)
    {
        if (!$value['value']) {
            return;
        }
        $expValue = explode(',', $value['value']);
        $ids = array();
        foreach ($expValue as $val) {
            $ids[] = (int) $val;
        }

        $queryBuilder->join($alias . '.composition', 'comp')
                ->join('comp.order', 'ord')
                ->andWhere('ord.id IN (:order_ids) ')->setParameter('order_ids', $ids);
    }

    public function searchByGtdNumber($queryBuilder, $alias, $field, $value)
    {
        if (!$value['value']) {
            return;
        }
        $queryBuilder->join($alias . '.productInSupply', 'pInSupply')
                ->andWhere("pInSupply.gtdNumber=:gtdNumber")->setParameter('gtdNumber', $value['value']);
    }

    /**
     * Поиск по серийникам
     * @param type $queryBuilder
     * @param type $alias
     * @param type $field
     * @param type $value
     * @return type
     */
    public function searchBySerials($queryBuilder, $alias, $field, $value)
    {
        if (!$value['value']) {
            return;
        }
        $expValue = explode(',', $value['value']);
        $serials = array();
        foreach ($expValue as $val) {
            $serials[] = $val;
        }

        $queryBuilder->join($alias . '.serials', 'serials')
                ->andWhere('serials.value IN (:serials) ')->setParameter('serials', $serials);
    }

    public function searchBySupplyId($queryBuilder, $alias, $field, $value)
    {
        if (!$value['value']) {
            return;
        }
        $expValue = explode(',', $value['value']);
        $ids = array();
        foreach ($expValue as $val) {
            $ids[] = (int) $val;
        }
        $queryBuilder->join($alias . '.supply', 'supp')
                ->andWhere('supp.id IN (:supply_ids) ')->setParameter('supply_ids', $ids);
    }

    public function searchByСreatedDateTime($queryBuilder, $alias, $field, $value)
    {
        $searchParams = array('field' => 'createdDateTime', 'from' => 'fromCr', 'to' => 'toCr');
        $this->searchByDate($queryBuilder, $alias, $field, $value, $searchParams);
    }

    protected function searchByDate($queryBuilder, $alias, $field, $value, $searchParams)
    {
        $result = array_filter($value['value']);
        if (empty($result)) {
            return;
        }

        $dates = $value['value'];
        if ($dates['to'] != null) {
            $queryBuilder->andWhere($queryBuilder->expr()->lte(sprintf('%s.%s', $alias, $searchParams['field']), ':' . $searchParams['to']));
            $queryBuilder->setParameter($searchParams['to'], $dates['to']->format('Y-m-d 23:59:59'));
        }
        if ($dates['from'] != null) {
            $queryBuilder->andWhere($queryBuilder->expr()->gte(sprintf('%s.%s', $alias, $searchParams['field']), ':' . $searchParams['from']));
            $queryBuilder->setParameter($searchParams['from'], $dates['from']->format('Y-m-d 00:00:00'));
            /*
              if($dates['to'] != null) {
              $queryBuilder->setParameter($searchParams['from'], $dates['from']->format('Y-m-d 00:00:00'));
              } else {
              $queryBuilder->setParameter($searchParams['from'], $dates['from']->format('Y-m-d 23:59:59'));
              } */
        }
    }

    /**
     * Редактор бокового меню
     */
//    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
//    {
//        $container = $this->getConfigurationPool()->getContainer();
//        StockAdmin::configureSubMenu($menu, $action, $childAdmin, $container);
//    }

    public function preUpdate($object)
    {
        $object->setUpdatedDateTime(new \Datetime());
    }

}
