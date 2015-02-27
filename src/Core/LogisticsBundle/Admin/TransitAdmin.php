<?php

/**
 * Админский класс для транзитов
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
use Sonata\AdminBundle\Route\RouteCollection;
use Doctrine\Common\Collections\ArrayCollection;
use Core\LogisticsBundle\Admin\Form\Mapper\TransitFormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use \Sonata\AdminBundle\Admin\AdminInterface;
use Core\LogisticsBundle\Admin\StockAdmin;

class TransitAdmin extends Admin {

    protected $translationDomain = 'CoreLogisticsBundle'; // дефолтная группа (домен) для перевода
    protected $formOptions = array(
        'cascade_validation' => false
    );
    public function getFormTheme() {
        return array_merge(
                parent::getFormTheme(), array('CoreLogisticsBundle:Admin/Transit:form_admin_fields.html.twig')
        );
    }
    /**
     * отображать ли кнопку удаления записи
     */
    public $delButton = true;

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object) {
        $text = null === $object->getId() ? 'Добавление нового транзита' : 'Редактирование транзита №' . $object->getId();
        return $text;
    }

    public function configure() {
        parent::configure();

        $this->datagridValues['_sort_by'] = 'id';
        $this->datagridValues['_sort_order'] = 'DESC';
    }

    /**
     * Переопределяем некоторые шаблоны
     * @param type $name
     * @return string
     */
    public function getTemplate($name) {
        switch ($name) {
            case 'list':
                return 'ApplicationSonataAdminBundle:CRUD:list_top.html.twig';
            default:
                return parent::getTemplate($name);
        }
    }

    public function getBatchActions() {
        $actions = parent::getBatchActions();
        unset($actions['delete']);
        return $actions;
    }

    protected function configureRoutes(RouteCollection $collection) {
        parent::configureRoutes($collection);

        if (!$this->delButton) {
            $collection->remove('delete');
        }
    }

    public function prePersist($object) {
        parent::prePersist($object);
        $this->checkIsTransitWasExecuted($object);
    }

    public function preUpdate($object) {
        parent::preUpdate($object);
        $this->checkIsTransitWasExecuted($object);
    }

    /**
     * Проверяет статус транзита, если завершен, тогда
     * переносит товар и меняет броеь на другой склад
     * @param type $object
     */
    public function checkIsTransitWasExecuted($object) {
        $container = $this->getConfigurationPool()->getContainer();
        $container->get('core_logistics_logic')->checkIsTransitWasExecuted($object);
    }

//    public function createQuery($context = 'list') {
//        $query = parent::createQuery($context);
//        $query
//                ->addSelect('c')
//                ->leftJoin($query->getRootAlias() . '.country', 'c');
//        return $query;
//    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {

        $obj = $this->getSubject(); //объект для формы
        $container = $this->getConfigurationPool()->getContainer();    //контейнер
        $options = array('obj' => $obj, 'container' => $container);

        if ($obj->getStatus()) {
            $this->delButton = false;
        } else {
            $this->delButton = true;
        }

        new TransitFormMapper($formMapper, $options);
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('id', null, array('label' => 'ID'))
                ->add('createdDateTime', null, array('label' => 'Создан'))
                ->add('fromStock.captionRu', null, ['label' => 'Со склада'])
                ->add('toStock.captionRu', null, ['label' => 'На склад'])
                ->add('deliveryMethod', null, ['label' => 'Способ и стоимость доставки', 'template' => 'CoreLogisticsBundle:Admin/Transit/list_fields:deliveryMethod.html.twig'])
                ->add('estimatedDateOfDelivery', 'date', ['label' => 'Ожидаемая дата'])
                ->add('status.captionRu', null, ['label' => 'Статус', 'template' => 'CoreLogisticsBundle:Admin/Transit/list_fields:status.html.twig'])
                ->add('_action', 'actions', array(
                    'label' => 'Редактировать',
                    'actions' => array(
                        'edit' => array(),
                    )
        ));
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid) {
        $datagrid
                ->add('id', 'doctrine_orm_callback', array(
                    'label' => 'ID транзита, через запятую',
                    'callback' => array($this, 'searchById'),
                    'field_type' => 'text'), null, ['attr' => ['placeholder' => 'ID поставки']])
                ->add('fromStock', null, array('label' => 'Со склада'), null, array('property' => 'captionRu', 'attr' => ['placeholder' => 'Со склада']))
                ->add('toStock', null, array('label' => 'На склад'), null, array('property' => 'captionRu', 'attr' => ['placeholder' => 'На склад']))
                ->add('deliveryMethod', null, array('label' => 'Способ доставки'), null, array('property' => 'captionRu', 'attr' => ['placeholder' => 'Способ доставки']))
                ->add('booking.composition', 'doctrine_orm_callback', array(
                    'label' => 'Продукт в транзите',
                    'field_type' => 'ajax_entity',
                    'callback' => function($qb, $alias, $field, $value) {
                        if (!$value['value']) {
                            return;
                        }
                        $qb
                        ->join($alias . '.booking', 'b')
                        ->join('b.composition', 'c')
                        ->join('c.product', 'p')
                        ->andWhere('p.id = :prod_id')->setParameter('prod_id', $value['value']);
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
                ->add('status', null, array('label' => 'Статус транзита'), null, array('property' => 'captionRu', 'attr' => ['placeholder' => 'Статус транзита']))
                ->add('createdDateTime', 'doctrine_orm_callback', array(
                    'label' => 'Создан',
                    'callback' => array($this, 'searchByCreated'),
                    'field_type' => 'admin_date_range'), null, array('placeholder' => 'Создан')
                )
                ->add('updatedDateTime', 'doctrine_orm_callback', array(
                    'label' => 'Обновлен',
                    'callback' => array($this, 'searchByUpdated'),
                    'field_type' => 'admin_date_range'), null, array('placeholder' => 'Обновлен')
                )

        ;
    }

    public function searchById($queryBuilder, $alias, $field, $value) {
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

    public function searchByCreated($queryBuilder, $alias, $field, $value) {
        $searchParams = array('field' => 'createdDateTime', 'from' => 'fromCr', 'to' => 'toCr');
        $this->searchByDate($queryBuilder, $alias, $field, $value, $searchParams);
    }

    public function searchByUpdated($queryBuilder, $alias, $field, $value) {
        $searchParams = array('field' => 'updatedDateTime', 'from' => 'fromUp', 'to' => 'toUp');
        $this->searchByDate($queryBuilder, $alias, $field, $value, $searchParams);
    }

    protected function searchByDate($queryBuilder, $alias, $field, $value, $searchParams) {
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
//    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null) {
//        $container = $this->getConfigurationPool()->getContainer();
//        StockAdmin::configureSubMenu($menu, $action, $childAdmin, $container);
//    }

}