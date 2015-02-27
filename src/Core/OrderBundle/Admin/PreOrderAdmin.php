<?php

/**
 * Админский класс для предзаказов на продукцию
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\OrderBundle\Admin\Form\Mapper\PreOrderFormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use \Sonata\AdminBundle\Admin\AdminInterface;
use Core\LogisticsBundle\Admin\StockAdmin;
use Sonata\AdminBundle\Route\RouteCollection;

class PreOrderAdmin extends Admin
{

    protected $translationDomain = 'CoreOrderBundle'; // дефолтная группа (домен) для перевода

    public function configure()
    {
        parent::configure();

        $this->datagridValues['_sort_by'] = 'createdDateTime';
        $this->datagridValues['_sort_order'] = 'DESC';
    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(), array(
                'CoreOrderBundle:Admin\Form\PreOrder:form_admin_fields.html.twig',
                'CoreCommonBundle:Form:choice_widget_with_data_attr.html.twig',
                'CoreOrderBundle:Admin\Form\PreOrderComposition:form_admin_fields.html.twig'
            ));
    }

    public function getTemplate($name)
    {
        switch ($name) {
            case 'list':
                return 'CoreOrderBundle:Admin/Form/PreOrder:list.html.twig';
            case 'edit':
                return 'CoreOrderBundle:Admin/Form/PreOrder:edit.html.twig';
            default:
                return parent::getTemplate($name);
        }
    }


    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query
            ->AndWhere($query->getRootAlias().'.isVisible=1');
        return $query;
    }


    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object)
    {

        $commonTwigExtension = $this->getConfigurationPool()->getContainer()->get('core_common_twig_extension');    //контейнер
        if ($object->getId()) {
            $dz = new \DateTimeZone($this->getConfigurationPool()->getContainer()->getParameter('default_timezone'));
            $object->getCreatedDateTime()->setTimeZone($dz);
        }
        $text = null === $object->getId() ? 'Добавление нового предзаказа' : 'Редактирование предзаказа #' . $commonTwigExtension->idFormatFilter($object->getId()) . ' от ' . date_format($object->getCreatedDateTime(),
                'd.m.Y H:i:s');
        return $text;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        //объект для формы
        $obj = $this->getSubject();

        //контейнер
        $container = $this->getConfigurationPool()->getContainer();

        $options = array('obj' => $obj, 'container' => $container);

        $optionsForExtraBlocks = array(
            'sides' => ['left' => [1]],
            'tabs' => ['comments'],
        );
        $container->get('application_sonata_admin_extra_blocks_logic')->setWhatShow($optionsForExtraBlocks);

        new PreOrderFormMapper($formMapper, $options);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', null, array(
                    'label' => 'Номер',
                    'template' => 'CoreOrderBundle:Admin/Form/PreOrder/list_fields:id.html.twig'
                ))
            ->add('email', null, ['label' => 'Email'])
            ->add('phone', null, ['label' => 'Телефон'])
            ->add('lastName', null, [
                    'label' => 'ФИО',
                    'template' => 'CoreOrderBundle:Admin/Form/PreOrder/list_fields:pre_order_fio.html.twig'
                ])
            ->add('fullAddress', null, [
                    'label' => 'Адрес',
                    'template' => 'CoreOrderBundle:Admin/Form/PreOrder/list_fields:pre_order_full_address.html.twig'
                ])
            ->addIdentifier('product', null, [
                    'label' => 'Продукт',
                    'template' => 'CoreOrderBundle:Admin/Form/PreOrder/list_fields:product.html.twig'
                ])
            ->add('createdDateTime', null, array('label' => 'Дата создания'))
            ->add('status.captionRu', null, array(
                    'label' => 'Статус',
                    'template' => 'CoreOrderBundle:Admin/Form/PreOrder/list_fields:pre_order_status.html.twig'
                ))
            ->add('_action', 'actions', array(
                    'label' => 'Действия',
                    'actions' => array(
                        'edit' => array(),
                        'show_on_site' => array('template' => 'CoreOrderBundle:Admin/Form/PreOrder/list_fields:pre_order_create_order.html.twig'),
                    )
                )
            );
    }

    /**
     * Редактор бокового меню
     */
//    protected function configureSideMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null) {
//        $container = $this->getConfigurationPool()->getContainer();
//        StockAdmin::configureSubMenu($menu, $action, $childAdmin, $container);
//    }

    /**
     * Настройки фильтра для списка заказов
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id', 'doctrine_orm_callback', array(
                'label' => 'ID предзаказа, через запятую',
                'callback' => array($this, 'searchById'),
                'field_type' => 'text'
            ), null, ['attr' => ['placeholder' => 'ID предзаказа, через запятую']])
            ->add('contragent.user.email', 'doctrine_orm_callback', array(
                'label' => 'Email, название организации, ИНН заказчика',
                'field_type' => 'ajax_entity',
                'callback' => function ($qb, $alias, $field, $value) {
                    if (!count($value['value'])) {
                        return;
                    }
                    $qb
                        ->andWhere($alias . '.contragent IN(:contragent) ')->setParameter('contragent',
                            explode(',', $value['value']));
                }
            ), null, array(
                'class' => 'Application\Sonata\UserBundle\Entity\CommonContragent',
                'properties' => [
                    'id' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'full',
                    ),
                    'user.email' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'left',
                    ),
                    'firstName' => array(
                        'search' => false,
                        'return' => true,
                        'entry' => 'left',
                    ),
                    'surName' => array(
                        'search' => false,
                        'return' => true,
                        'entry' => 'left'
                    ),
                    'inn' => array(
                        'search' => true,
                        'return' => false,
                        'entry' => 'full'
                    ),
                    'organization' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'left'
                    )
                ],
                'select2_constructor' => array(
                    'placeholder' => 'Введите E-mail, организацию, ID клиента',
                    'minimumInputLength' => 1
                ),
            ))
            ->add('email', null, array('label' => 'Email'), null, ['attr' => ['placeholder' => 'Email']])
            ->add('lastName', null, array('label' => 'ФИО'), null, ['attr' => ['placeholder' => 'Фамилия']])
            ->add('phone', null, array('label' => 'Телефон'), null, ['attr' => ['placeholder' => 'Телефон']])
            ->add('address', null, array('label' => 'Адрес'), null, ['attr' => ['placeholder' => 'Адрес']])
            ->add('products', 'doctrine_orm_callback', array(
                'label' => 'Продукт в поставке',
                'field_type' => 'ajax_entity',
                'callback' => function ($qb, $alias, $field, $value) {
                    if (!$value['value']) {
                        return;
                    }
                    $qb
                        ->andWhere($alias . '.product = :prod_id ')->setParameter('prod_id', $value['value']);

                }
            ), null, array(
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
                    )
                ),
                'template_customise_functions' => 'product.html.twig',
                'select2_constructor' => array( // стандартные настройки списка select2
                    'placeholder' => 'Продукт',
                    'minimumInputLength' => 1,
                    'formatResult' => 'productFormatResult',
                    'formatSelection' => 'productFormatSelection',
                )
            ))
            ->add('status', null, array('label' => 'Статус'), null,
                array('property' => 'captionRu', 'attr' => ['placeholder' => 'Статус']))
            ->add('createdDateTime', 'doctrine_orm_callback', array(
                    'label' => 'Создан',
                    'callback' => array($this, 'searchByСreatedDateTime'),
                    'field_type' => 'admin_date_range'
                ), null, array('placeholder' => 'Создан')
            );
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('createOder')
            ->add('previewCancelMsg', 'preview-cancel-msg')
            ->add('contact');
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
            $queryBuilder->andWhere($queryBuilder->expr()->lte(sprintf('%s.%s', $alias, $searchParams['field']),
                    ':' . $searchParams['to']));
            $queryBuilder->setParameter($searchParams['to'], $dates['to']->format('Y-m-d 23:59:59'));
        }
        if ($dates['from'] != null) {
            $queryBuilder->andWhere($queryBuilder->expr()->gte(sprintf('%s.%s', $alias, $searchParams['field']),
                    ':' . $searchParams['from']));
            $queryBuilder->setParameter($searchParams['from'], $dates['from']->format('Y-m-d 00:00:00'));
            /*
              if($dates['to'] != null) {
              $queryBuilder->setParameter($searchParams['from'], $dates['from']->format('Y-m-d 00:00:00'));
              } else {
              $queryBuilder->setParameter($searchParams['from'], $dates['from']->format('Y-m-d 23:59:59'));
              } */
        }
    }
}
