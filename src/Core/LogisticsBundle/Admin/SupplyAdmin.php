<?php

/**
 * Админский класс для поставок
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
use Core\LogisticsBundle\Admin\Form\Mapper\SupplyFormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use \Sonata\AdminBundle\Admin\AdminInterface;
use Core\LogisticsBundle\Admin\StockAdmin;
use Sonata\AdminBundle\Route\RouteCollection;

class SupplyAdmin extends Admin
{

    protected $translationDomain = 'CoreLogisticsBundle'; // дефолтная группа (домен) для перевода
    protected $formOptions = array(
        'cascade_validation' => true
    );

    /**
     * отображать ли кнопку удаления записи
     */
    public $delButton = true;

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object)
    {
        $text = null === $object->getId() ? 'Добавление новой поставки' : 'Редактирование поставки №' . $object->getId() . '';
        return $text;
    }

    public function configure()
    {
        parent::configure();

        $this->datagridValues['_sort_by'] = 'id';
        $this->datagridValues['_sort_order'] = 'DESC';
    }

    /**
     * Настраиваем кнопки добавления
     * @param \Sonata\AdminBundle\Route\RouteCollection $collection
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        parent::configureRoutes($collection);

        if (!$this->delButton) {
            $collection->remove('delete');
        }
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
            parent::getFormTheme(), array(
                'CoreLogisticsBundle:Admin\Supply\Form:sonata_type_collection_products.html.twig',
                'CoreLogisticsBundle:Admin\Supply\Form:form_admin_fields.html.twig',
            )
        );
    }

    /**
     * Настраиваем возможнные действия надсписком записей
     * @return type
     */
    public function getBatchActions()
    {
        $actions = parent::getBatchActions();
        unset($actions['delete']); //скрываем возможность массовго удаления
        return $actions;
    }

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query
            ->addSelect('s, sup, sel,stock,cos,coo,p,product')
            ->leftJoin($query->getRootAlias() . '.status', 's')
            ->leftJoin($query->getRootAlias() . '.supplier', 'sup')
            ->leftJoin($query->getRootAlias() . '.seller', 'sel')
            ->leftJoin($query->getRootAlias() . '.stock', 'stock')
            ->leftJoin($query->getRootAlias() . '.countryOfSupply', 'cos')
            ->leftJoin($query->getRootAlias() . '.countryOfOrigin', 'coo')
            ->leftJoin($query->getRootAlias() . '.products', 'p')
            ->leftJoin('p.product', 'product')
            ;

        return $query;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $obj = $this->getSubject(); //объект для формы
        $container = $this->getConfigurationPool()->getContainer(); //контейнер
        $options = array('obj' => $obj, 'container' => $container);

        if ($obj->getIsProductUnitsWasCreated()) {
            $this->delButton = false;
        } else {
            $this->delButton = true;
        }

        new SupplyFormMapper($formMapper, $options);
    }

    /**
     * Отображение списка заказов
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', null, array('label' => 'ID'))
            ->add('dateTime', 'date', array('label' => 'Дата поставки'))
            ->add('countryOfSupply', null, array('label' => 'Страна поставки'))
            ->add('countryOfOrigin', null, array('label' => 'Страна происхождения'))
            ->add('supplier', null, array('label' => 'Поставщик/Покупатель', 'template' => 'CoreLogisticsBundle:Admin/Supply/list_fields:supplier.html.twig'))
            ->add('stock', null, array('label' => 'Принимающий склад', 'template' => 'CoreLogisticsBundle:Admin/Supply/list_fields:stock.html.twig'))
            ->add('productsCount', null, array('label' => 'Кол-во наим.', 'template' => 'CoreLogisticsBundle:Admin/Supply/list_fields:productsCount.html.twig'))
            ->add('productsUnitsQuantity', null, array('label' => 'Кол-во позиций', 'template' => 'CoreLogisticsBundle:Admin/Supply/list_fields:productsUnitsQuantity.html.twig'))
            ->add('productsUnitsCost', null, array('label' => 'Общая ст-ть позиций', 'template' => 'CoreLogisticsBundle:Admin/Supply/list_fields:productsUnitsCost.html.twig'))
            ->add('isVirtual', null, array('label' => 'Виртуальная'))
            ->add('isCreatedForOrderOnly', null, array('label' => 'Под заказ', 'template' => 'CoreLogisticsBundle:Admin/Supply/list_fields:isCreatedForOrderOnly.html.twig'))
            ->add('status.captionRu', null, array('label' => 'Статус', 'template' => 'CoreLogisticsBundle:Admin/Supply/list_fields:status.html.twig'))
            ->add('_action', 'actions', array(
                'label' => 'Редактировать',
                'actions' => array(
                    'edit' => array()
                )
            ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid)
    {
        $datagrid
            ->add('id', 'doctrine_orm_callback', array(
                'label' => 'ID поставки, через запятую',
                'callback' => array($this, 'searchById'),
                'field_type' => 'text'), null, ['attr' => ['placeholder' => 'ID поставки, через запятую']])
            ->add('status', null, array('label' => 'Статус поставки'), null, array('property' => 'captionRu', 'attr' => ['placeholder' => 'Статус поставки']))
            ->add('supplier', null, array('label' => 'Поставщик'), null, array('property' => 'caption', 'attr' => ['placeholder' => 'Поставщик']))
            ->add('seller', null, array('label' => 'Покупатель'), null, array('property' => 'caption', 'attr' => ['placeholder' => 'Покупатель']))
            ->add('products', 'doctrine_orm_callback', array(
                'label' => 'Продукт в поставке',
                'field_type' => 'ajax_entity',
                'callback' => function ($qb, $alias, $field, $value) {
                        if (!$value['value']) {
                            return;
                        }
                        $qb
                            ->join($alias . '.products', 'pis')
                            ->join('pis.product', 'prod')
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
                'select2_constructor' => array( // стандартные настройки списка select2
                    'placeholder' => 'Продукт',
                    'minimumInputLength' => 1,
                    'formatResult' => 'productFormatResult',
                    'formatSelection' => 'productFormatSelection',
                )
            ))
            ->add('stock', null, array('label' => 'Принимающий склад'), null, array('property' => 'captionRu', 'attr' => ['placeholder' => 'Принимающий склад']))
            ->add('countryOfSupply', null, array('label' => 'Страна поставки'), null, array('property' => 'captionRu', 'attr' => ['placeholder' => 'Страна поставки']))
            ->add('countryOfOrigin', null, array('label' => 'Страна происхождения'), null, array('property' => 'captionRu', 'attr' => ['placeholder' => 'Страна происхождения']))
            ->add('dateTime', 'doctrine_orm_callback', array(
                    'label' => 'Дата поставки',
                    'callback' => array($this, 'searchByDateTime'),
                    'field_type' => 'admin_date_range'), null, array('placeholder' => 'Дата')
            )
            ->add('isVirtual', null, array('label' => 'Виртуальная'), null, array('attr' => ['placeholder' => 'Виртуальная']))
            ->add('isCreatedForOrderOnly', null, array('label' => 'Под заказ'), null, array('attr' => ['placeholder' => 'Под заказ']))
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
            $ids[] = (int)$val;
        }
        if (count($ids) == 1) {
            $queryBuilder->where(sprintf('%s.id', $alias) . ' = :id')
                ->setParameter('id', $ids[0]);
        } else {
            $queryBuilder->add('where', $queryBuilder->expr()->in(sprintf('%s.id', $alias), ':id'))
                ->setParameter('id', $ids);
        }
    }

    public function searchByDateTime($queryBuilder, $alias, $field, $value)
    {
        $searchParams = array('field' => 'dateTime', 'from' => 'fromCr', 'to' => 'toCr');
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

}
