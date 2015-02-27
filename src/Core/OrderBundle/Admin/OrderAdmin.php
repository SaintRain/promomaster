<?php
/**
 * Админский класс для заказов
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\OrderBundle\Admin\Form\Mapper\OrderFormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use \Sonata\AdminBundle\Admin\AdminInterface;
use Core\LogisticsBundle\Admin\StockAdmin;

class OrderAdmin extends Admin
{
    protected $formOptions       = array(
        'cascade_validation' => true,
    );
    protected $translationDomain = 'CoreOrderBundle'; // дефолтная группа (домен) для перевода

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */

    public function toString($object)
    {

        $commonTwigExtension = $this->getConfigurationPool()->getContainer()->get('core_common_twig_extension');    //контейнер
        //ставим временную зону
        if ($object->getId()) {
            $dz = new \DateTimeZone($this->getConfigurationPool()->getContainer()->getParameter('default_timezone'));
            $object->getCreatedDateTime()->setTimeZone($dz);
        }

        $text = null === $object->getId() ? 'Добавление нового заказа' : 'Редактирование заказа #'.$commonTwigExtension->idFormatFilter($object->getId()).' от '.date_format($object->getCreatedDateTime(),
                "d.m.Y H:i:s");
        return $text;
    }

    public function configure()
    {
        parent::configure();

        $this->datagridValues['_sort_by']    = 'id';
        $this->datagridValues['_sort_order'] = 'DESC';
    }

    /**
     * Переписываем шаблон, чтобы встроить свой JS
     * @param type $name
     * @return string
     */
    public function getTemplate($name)
    {
        switch ($name) {
            case 'list':
                return 'CoreOrderBundle:Admin\Form\Order:list.html.twig';
            case 'edit':
                return 'CoreOrderBundle:Admin\Form\Order:edit.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('CoreOrderBundle:Admin\Form:form_admin_fields.html.twig',
            'CoreCommonBundle:Form:choice_widget_with_data_attr.html.twig'
        ));
    }

    public function getBatchActions()
    {
        $actions = parent::getBatchActions();

        // check user permissions
        $actions['generateDelliveryWaybills'] = [
            'label' => 'Сформировать накладную на доставку заказов',
            'ask_confirmation' => false
        ];

        $actions['generateReportForProducts'] = [
            'label' => 'Отчет по товарам',
            'ask_confirmation' => false
        ];

        unset($actions['delete']);
        return $actions;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('delete')
            //счет на оплату
            ->add('invoiceForPayment', 'invoiceForPayment/{order_id}',
                array('_controller' => 'CoreOrderBundle:AdminAjaxOrder:generateInvoiceForPayment'),
                array('order_id' => '\d+'))
            //отправить  на почту счет на оплату
            ->add('invoiceForPaymentSend', 'invoiceForPaymentSend/{order_id}',
                array('_controller' => 'CoreOrderBundle:AdminAjaxOrder:invoiceForPaymentSend'),
                array('order_id' => '\d+'))
            //гарантийный талон
            ->add('guarantees', 'guarantees/{order_id}/{needStamps}',
                array('_controller' => 'CoreOrderBundle:AdminAjaxOrder:generateGuarantees'),
                array('order_id' => '\d+'))
            //договор доставки
            ->add('deliveryAgreement', 'deliveryAgreement/{order_id}',
                array('_controller' => 'CoreOrderBundle:AdminAjaxOrder:generateDeliveryAgreement'),
                array('order_id' => '\d+'))
            //счет-фактура
            ->add('invoice', 'invoice/{order_id}',
                array('_controller' => 'CoreOrderBundle:AdminAjaxOrder:generateInvoice'),
                array('order_id' => '\d+'))
            //квитанция сбербанка
            ->add('receiptOfSberbank', 'receiptOfSberbank/{order_id}',
                array('_controller' => 'CoreOrderBundle:AdminAjaxOrder:generateReceiptOfSberbank'),
                array('order_id' => '\d+'))
            //товарная накладная на дату
            ->add('waybillAtTheDate', 'waybillAtTheDate/{order_id}/{date}',
                array('_controller' => 'CoreOrderBundle:AdminAjaxOrder:generateWaybillAtTheDate'),
                array('order_id' => '\d+', 'date' => '\d\d\.\d\d\.\d\d\d\d'))
            //адресный ярлык для коробки
            ->add('addressLabel', 'addressLabel/{order_id}/{quantity}',
                array('_controller' => 'CoreOrderBundle:AdminAjaxOrder:generateAddressLabel'),
                array('order_id' => '\d+', 'quantity' => '\d+'))
        ;
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {

        $obj       = $this->getSubject(); //объект для формы
        $container = $this->getConfigurationPool()->getContainer();    //контейнер
        $options   = array('obj' => $obj, 'container' => $container);

        $optionsForExtraBlocks = array(
            'sides' => ['left' => [1], 'bottom' => [1]],
            'tabs' => ['comments', 'tickets', 'audit'],
        );
        $container->get('application_sonata_admin_extra_blocks_logic')->setWhatShow($optionsForExtraBlocks);

        new OrderFormMapper($formMapper, $options);
    }

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        $query
            ->addSelect('c', 'comp', 'u', 'user', 'es', 'p',
                'manufacturerDiscounts')
            ->leftJoin($query->getRootAlias().'.contragent', 'c')
            ->leftJoin('c.manufacturerDiscounts', 'manufacturerDiscounts')
            ->leftJoin($query->getRootAlias().'.compositions', 'comp')
            ->leftJoin('comp.product', 'p')
            ->leftJoin('c.user', 'user')
            ->leftJoin($query->getRootAlias().'.extraStatus', 'es')
            ->leftJoin('comp.units', 'u')

        ;
        return $query;
    }

    /**
     * Переписываем запрос на выборку редактируемого объекта
     */
    public function getObject($id)
    {
        $object = $this
            ->getModelManager()->createQuery($this->getClass(), 'o')
            ->addSelect('contr', 'c', 'p', 'b', 'pa', 'u', 'ac', 'soac',
                'acUser', 'tickets', 'ticketsStatus', 'ser', 'manufacturer',
                'manufacturerDiscounts', 'manufacturerStepValues',
                'manufacturersForDiscounts')
            ->leftJoin('o.contragent', 'contr')
            ->leftJoin('contr.manufacturerDiscounts', 'manufacturerDiscounts')
            ->leftJoin('manufacturerDiscounts.manufacturers',
                'manufacturersForDiscounts')
            ->leftJoin('manufacturerDiscounts.manufacturerStepValues',
                'manufacturerStepValues')
            ->leftJoin('o.compositions', 'c')
            ->leftJoin('c.booking', 'b')
            ->leftJoin('c.product', 'p')
            ->leftJoin('p.manufacturers', 'manufacturer')
            ->leftJoin('c.units', 'u')
            ->leftJoin('u.serials', 'ser')
            ->leftJoin('p.productAvailability', 'pa')
            ->leftJoin('o.adminComments', 'ac')
            ->leftJoin('o.subscribersOnAdminComments', 'soac')
            ->leftJoin('ac.user', 'acUser')
            ->leftJoin('o.tickets', 'tickets')
            ->leftJoin('tickets.status', 'ticketsStatus')
            ->where('o.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getSingleResult();

        return $object;
    }

    /**
     * Отображение списка заказов
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', null,
                array('label' => 'Номер', 'template' => 'CoreOrderBundle:Admin/Form/Order/list_fields:id.html.twig'))
            ->add('createdDateTime', null, array('label' => 'Дата создания'))
            ->add('contragent', null,
                array('label' => 'Заказчик', 'template' => 'CoreOrderBundle:Admin/Form/Order/list_fields:contragent.html.twig'))
            ->add('cost', null,
                array('label' => 'Стоимость', 'template' => 'CoreOrderBundle:Admin/Form/Order/list_fields:cost.html.twig'))
            ->add('weightAndVolume', null,
                array('label' => 'Вес/Объём', 'template' => 'CoreOrderBundle:Admin/Form/Order/list_fields:weightAndVolume.html.twig'))
            ->add('deliveryMethod', null,
                array('label' => 'Доставка', 'template' => 'CoreOrderBundle:Admin/Form/Order/list_fields:deliveryMethod.html.twig'))
            ->add('seriyniki', null,
                array('label' => 'Серийники', 'template' => 'CoreOrderBundle:Admin/Form/Order/list_fields:seriyniki.html.twig'))
            ->add('status', null,
                array('label' => 'Статусы', 'template' => 'CoreOrderBundle:Admin/Form/Order/list_fields:status.html.twig'))

            //, 'template' => 'CoreLogisticsBundle:Admin/Bank/list_fields:bick_swift.html.twig'
//                ->add('correspondentAccount', null, ['label' => 'Кор. счет'])
//                ->add('idIn1c', null, ['label' => 'ID 1С-Бухг.'])
//                ->add('license', null, ['label' => 'Лицензия'])
//                ->add('address', null, ['label' => 'Адрес'])
//                ->add('phones', null, ['label' => 'Телефон(ы)'])
            ->add('_action', 'actions',
                array(
                'label' => 'Редактировать',
                'actions' => array(
                    'edit' => array()
                )
        ));
    }

    /**
     * Настройки фильтра для списка заказов
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id', 'doctrine_orm_callback',
                array(
                'label' => 'ID заказа, через запятую',
                'callback' => array($this, 'searchById'),
                'field_type' => 'text'), null,
                ['attr' => ['placeholder' => 'ID заказа, через запятую']])
            ->add('contragent.user.email', 'doctrine_orm_callback',
                array(
                'label' => 'Email, название организации, ИНН заказчика',
                'field_type' => 'ajax_entity',
                'callback' => function($qb, $alias, $field, $value) {
                    if (!count($value['value'])) {
                        return;
                    }
                    $qb
                    ->andWhere($alias.'.contragent IN(:contragent) ')->setParameter('contragent',
                        explode(',', $value['value']));
                }), null,
                array(
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
                    )],
                'select2_constructor' => array(
                    'placeholder' => 'Введите E-mail, организацию, ID клиента',
                    'minimumInputLength' => 1),
            ))
            ->add('stock', null, array('label' => 'Cклад'), null,
                array('multiple' => true, 'property' => 'captionRu', 'attr' => ['placeholder' => 'Приоритетный склад']))
            ->add('seller', null, array('label' => 'Продавец'), null,
                array('multiple' => true, 'property' => 'caption', 'attr' => ['placeholder' => 'Продавец']))
            ->add('deliveryMethod', null, array('label' => 'Способ доставки'),
                null,
                array('multiple' => true, 'property' => 'captionRu', 'attr' => ['placeholder' => 'Способ доставки']))
            ->add('compositions.product', 'doctrine_orm_callback',
                array(
                'label' => 'Продукт в заказе',
                'field_type' => 'ajax_entity',
                'callback' => function($qb, $alias, $field, $value) {
                    if (!$value['value']) {
                        return;
                    }
                    $qb
                    ->join($alias.'.compositions', 'c2')
                    ->join('c2.product', 'pr')
                    ->andWhere('pr.id = :product ')->setParameter('product',
                        $value['value']);
                }), null,
                array(
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
                    'placeholder' => 'Продукт в заказе',
                    'minimumInputLength' => 1,
                    'formatResult' => 'productFormatResult',
                    'formatSelection' => 'productFormatSelection',
                )
            ))
            ->add('compositions.product.units', 'doctrine_orm_callback',
                array(
                'field_type' => 'ajax_entity',
                'callback' => function($qb, $alias, $field, $value) {
                    if (!$value['value']) {
                        return;
                    }
                    $qb
                    ->join($alias.'.compositions', 'c2')
                    ->join('c2.units', 'u2')
                    ->andWhere('u2.id = :unit ')->setParameter('unit',
                        $value['value']);
                }), null,
                array(
                'class' => 'Core\LogisticsBundle\Entity\UnitInStock',
                'properties' => array(
                    'id' => array(
                        'search' => false,
                        'return' => true
                    ),
                    'mac' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'left',
                    ),
//                        'article' => array(
//                            'search' => false,
//                            'return' => true,
//                            'entry' => 'left',
//                        ),
//                        'sku' => array(
//                            'search' => false,
//                            'return' => true,
//                            'entry' => 'left',
//                        ),
                    'product.captionRu' => array(
                        'search' => false,
                        'return' => true,
                    )
                ),
                'select2_constructor' => array(// стандартные настройки списка select2
                    'placeholder' => 'Серийный номер устройства в заказе',
                    'minimumInputLength' => 1,
                )
            ))
            ->add('createdDateTime', 'doctrine_orm_callback',
                array(
                'label' => 'Создан',
                'callback' => array($this, 'searchByСreatedDateTime'),
                'field_type' => 'admin_date_range'), null,
                array('placeholder' => 'Создан')
            )
            ->add('shippedDateTime', 'doctrine_orm_callback',
                array(
                'label' => 'Отгружен',
                'callback' => array($this, 'searchByShippedDateTime'),
                'field_type' => 'admin_date_range'), null,
                array('placeholder' => 'Отгружен')
            )
            ->add('extraStatus', null,
                array('label' => 'Дополнительный статус'), null,
                array('property' => 'captionRu', 'attr' => ['placeholder' => 'Дополнительный статус']))
            ->add('isCheckedStatus', null, array('label' => 'Проверен'), null,
                array('attr' => ['placeholder' => 'Проверен']))
            ->add('isPaidStatus', null, array('label' => 'Оплачен'), null,
                array('attr' => ['placeholder' => 'Оплачен']))
            ->add('isShippedStatus', null, array('label' => 'Отгружен'), null,
                array('attr' => ['placeholder' => 'Отгружен']))
            ->add('isCanceledStatus', null, array('label' => 'Отменён'), null,
                array('attr' => ['placeholder' => 'Отменён']))
            ->add('waybills', 'doctrine_orm_callback',
                array(
                'label' => 'Статус посылки',
                'callback' => array($this, 'searchByWaybillsStatus'), 'field_type' => 'choice'),
                null,
                ['choices' =>
                array('1' => 'Передана в службу доставки', '2' => 'Доставляется',
                    '3' => 'Готова к выдаче', '4' => 'Товар по накладной выдан (исполнен)'),
                'attr' => ['placeholder' => 'Статус посылки']])
            ->add('deliveryPoint', null,
                array(
                'label' => 'Адрес пункта выдачи',
//                    'callback' => array($this, 'searchByDeliveryModeAddresses'),
//                    'field_type' => 'entity'
                ), null,
                [
//                        'class'=>'Core\DeliveryBundle\Entity\Address',
                'attr' => ['placeholder' => 'Адрес пункта выдачи']])
            ->add('waybills.number', null,
                array(
                'label' => 'Номер транспортной накладной в заказе'), null,
                ['attr' => ['placeholder' => 'Номер транспортной накладной в заказе']])




//->add('id', 'doctrine_orm_callback', array(
//                    'label' => 'ID заказа, через запятую',
//                    'callback' => array($this, 'searchById'),
//                    'field_type' => 'text'), null, ['attr' => ['placeholder' => 'ID заказа, через запятую']])
//                                case 1: $f = 'isSent';
//                break;
//            case 2: $f = 'isInProccess';
//                break;
//            case 3: $f = 'isReadyToIssue';
//                break;
//            case 4: $f= 'isDone';
//->add('type', 'doctrine_orm_class', array('label'=>'Тип продукта', 'sub_classes' => $this->getSubClasses()), null, [ 'multiple' => true]);
//                ->add('contragent', 'ajax_entity', [
//                    'label' => 'Контрагент',
//                    'required' => true,
//                    'properties' => [
//                        'id' => array(
//                            'search' => true,
//                            'return' => true,
//                            'entry' => 'full',
//                        ),
//                        'user.email' => array(
//                            'search' => true,
//                            'return' => true,
//                            'entry' => 'left',
//                        ),
//                        'firstName' => array(
//                            'search' => false,
//                            'return' => true,
//                            'entry' => 'left',
//                        ),
//                        'surName' => array(
//                            'search' => false,
//                            'return' => true,
//                            'entry' => 'left'
//                        ),
//                        'organization' => array(
//                            'search' => true,
//                            'return' => true,
//                            'entry' => 'left'
//                        )],
//                    'select2_constructor' => array(
//                        'width' => '40%',
//                        'placeholder' => 'Введите E-mail, наименование организации, или ID клиента',
//                        'minimumInputLength' => 1),
//                ])

        ;
    }

//    public function searchByDeliveryModeAddresses($queryBuilder, $alias, $field, $value)
//    {
//
//        if (isset($value['value'])) {
//            $queryBuilder
//                    ->join($alias . '.waybills', 'waybills')
//                    ->join('waybills.deliveryMode', 'deliveryMode')
//                    ->join('deliveryMode.addresses', 'addresses')
//                    ->andWhere('addresses.id= :addresse')
//                    ->setParameters(['addresses'=>$value['value']]);
//        }
//    }



    public function searchByWaybillsStatus($queryBuilder, $alias, $field, $value)
    {

        switch ($value['value']) {
            case 1: $f = 'isSent';
                break;
            case 2: $f = 'isInProccess';
                break;
            case 3: $f = 'isReadyToIssue';
                break;
            case 4: $f = 'isDone';
                break;
        }
        if (isset($f)) {
            $queryBuilder
                ->join($alias.'.waybills', 'waybills')
                ->andWhere('waybills.'.$f.'= 1');
        }
    }

    public function searchById($queryBuilder, $alias, $field, $value)
    {
        if (!$value['value']) {
            return;
        }
        $expValue = explode(',', $value['value']);
        $ids      = array();
        foreach ($expValue as $val) {
            $ids[] = (int) $val;
        }
        if (count($ids) == 1) {
            $queryBuilder->where(sprintf('%s.id', $alias).' = :id')
                ->setParameter('id', $ids[0]);
        } else {
            $queryBuilder->add('where',
                    $queryBuilder->expr()->in(sprintf('%s.id', $alias), ':id'))
                ->setParameter('id', $ids);
        }
    }

    public function searchByСreatedDateTime($queryBuilder, $alias, $field,
                                            $value)
    {
        $searchParams = array('field' => 'createdDateTime', 'from' => 'fromCr', 'to' => 'toCr');
        $this->searchByDate($queryBuilder, $alias, $field, $value, $searchParams);
    }

    public function searchByShippedDateTime($queryBuilder, $alias, $field,
                                            $value)
    {
        $searchParams = array('field' => 'shippedDateTime', 'from' => 'fromCr', 'to' => 'toCr');
        $this->searchByDate($queryBuilder, $alias, $field, $value, $searchParams);
    }

    protected function searchByDate($queryBuilder, $alias, $field, $value,
                                    $searchParams)
    {
        $result = array_filter($value['value']);
        if (empty($result)) {
            return;
        }

        $dates = $value['value'];
        if ($dates['to'] != null) {
            $queryBuilder->andWhere($queryBuilder->expr()->lte(sprintf('%s.%s',
                        $alias, $searchParams['field']),
                    ':'.$searchParams['to']));
            $queryBuilder->setParameter($searchParams['to'],
                $dates['to']->format('Y-m-d 23:59:59'));
        }
        if ($dates['from'] != null) {
            $queryBuilder->andWhere($queryBuilder->expr()->gte(sprintf('%s.%s',
                        $alias, $searchParams['field']),
                    ':'.$searchParams['from']));
            $queryBuilder->setParameter($searchParams['from'],
                $dates['from']->format('Y-m-d 00:00:00'));
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