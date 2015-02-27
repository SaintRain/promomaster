<?php

/**
 * Форма для редактирования заказов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;
use Application\Sonata\UserBundle\Entity\IndiContragent;
use Application\Sonata\UserBundle\Entity\LegalContragent;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;
use Core\LogisticsBundle\Entity\Transit;
use Doctrine\ORM\EntityManager;
use Core\DeliveryBundle\Entity\ServiceWithAddress;
use Core\DeliveryBundle\Entity\ServiceInCity;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormEvent;

class OrderFormMapper extends LanguageSwitcherFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        parent::__construct($formMapper, $options);
        $obj = $options['obj'];

        $em = $options['container']->get('doctrine.orm.entity_manager');
        // способы доставки
        $deliveryMethods = $em->getRepository('CoreDeliveryBundle:Service')->findWithAllData();
        $composition_disabled = false;
        $disabledStock = false;
        $disabledIsCheckedStatus = false;
        $disabledIsPaidStatus = false;
        $disabledIsShippedStatus = false;
        $isCanceledStatusDisabled = false;
        $ndsTax_disabled = false;
        $disabledSeller = false;
        $disabledRecipment = false;
        $disabledContragent = false;

        //если хоть одна бронь из заказа есть в транзите, который в пути
        //тогда блокируем редактирование некторых полей
        foreach ($obj->getCompositions() as $c) {
            foreach ($c->getBooking() as $b) {
                if ($b->getTransit()) {
                    if ($b->getTransit()->getStatus() && $b->getTransit()->getStatus()->getName() == Transit::onTheWayStatusName) {
                        $disabledSeller = true;
                        $disabledIsCheckedStatus = true;
                        $disabledIsPaidStatus = true;
                        $disabledIsShippedStatus = true;
                        $isCanceledStatusDisabled = true;
                        $composition_disabled = true;
                    }
                    $disabledStock = true;
                    break;
                }
            }
        }
        if($obj && $obj->getDeliveryMethod() && ($obj->getDeliveryMethod() instanceof ServiceWithAddress)){
            $isDeliveryInfoDisabled = true;
        } else {
            $isDeliveryInfoDisabled = false;
        }

        if ($obj->getDeliveryCity() && $obj->getDeliveryCity()->getRegion()) {
            $cityCaption = sprintf('%s, %s',
                    $obj->getDeliveryCity()->getName(), $obj->getDeliveryCity()->getRegion()->getName());
        } elseif($obj->getDeliveryCity()) {
             $cityCaption = $obj->getDeliveryCity()->getName();
        }

        if ($obj->getId() && $obj->getIsPaidStatus()) {
            $composition_disabled = true;
            $ndsTax_disabled = true;
            $disabledContragent = true;
        }

        if (!$obj->getId()) {
            $isCanceledStatusDisabled = true;
        } else if ($obj->getIsShippedStatus()) {
            $disabledIsCheckedStatus = true;
            $disabledIsPaidStatus = true;
            $disabledIsShippedStatus = true;
            $isCanceledStatusDisabled = false;
            $disabledRecipment = true;
        }

        if ($obj->getIsCanceledStatus()) {
            $disabledIsPaidStatus = true;
            $disabledIsShippedStatus = true;
            $composition_disabled = true;
        }

        //чтобы выставить статус отгружено необходимо заранее выставить проверено и оплачено
        if (!$obj->getIsPaidStatus() || !$obj->getIsCheckedStatus()) {
            $disabledIsShippedStatus = true;
        }

        if ($obj->getShippedDateTime()) {
            $ndsTax_disabled = true;
            $disabledSeller = true;
            $disabledContragent = true;
        }

        //если продавец не работает с НДС, то нельзя указывать НДС
        if ($obj->getSeller() && !$obj->getSeller()->getIsWorkingWithNds()) {
            $ndsTax_disabled = true;
        }

        $temp = $em->getRepository('CoreOrderBundle:ExtraStatus')->findAll([], ['indexPosition' => 'ASC']);
        $extraStatusSysNames = [];
        $extraStatusesData = [];
        foreach ($temp as $d) {
            $extraStatusSysNames[$d->getId()] = $d->getGeneralStatus();
            $extraStatusesData[] = $d;
        }
        $formMapper->with('Основное')
            ->add('id', 'text', array(
                'required' => false,
                'disabled' => true,
                'label' => ' '))
            ->add('isCheckedStatus', null, array(
                'disabled' => $disabledIsCheckedStatus,
                'required' => false,
                'label' => 'Проверен',
                'help' => 'Выставляется после проверки заказа'

            ))
            ->add('isPaidStatus', null, array(
                'disabled' => $disabledIsPaidStatus,
                'required' => false,
                'label' => 'Оплачен',
                'help' => 'Выставляется после оплаты заказа. Если выставлено, то нельзя изменить состав заказа. Если не выставлено, то нельзя указать серийники'
            ))
            ->add('isShippedStatus', null, array(
                'disabled' => $disabledIsShippedStatus,
                'required' => false,
                'label' => 'Отгружен',
                'help' => 'Выставляется после отгрузки заказа. Можно выставить, если выставлен статус Проверен и Оплачен. Если заказ оформляется через наложку, то отгрузить можно без статуса Оплачено'
            ))
            ->add('isCanceledStatus', 'canceled_status', array(
                'disabled' => $isCanceledStatusDisabled,
                'required' => false,
                'label' => 'Отменён',
                'help' => 'Выставляется после отмены заказа. Также используется для того, чтобы распровести заказ'
            ))
                                
            ->add('isCheckedStatusSend', null, array(
                'required' => false,
                'label' => false,
            ))
            ->add('isPaidStatusSend', null, array(
                'required' => false,
                'label' => false,
            ))
            ->add('isShippedStatusSend', null, array(
                'required' => false,
                'label' => false,
            ))
            ->add('isCanceledStatusSend', null, array(
                'required' => false,
                'label' => false,
            ))
                
            ->add('extraStatus', 'extra_status', array(
                'data_class' => 'Core\OrderBundle\Entity\ExtraStatus',
//                    'property' => 'captionRu',
                'attr' => ['hidden' => false, 'class' => 'span5'],
                'required' => false,
                'extraStatusesData' => $extraStatusesData,
                'label' => 'Дополнительные статусы',
                'help' => 'Список дополнительных статусов меняется взависимости от выбранных основных статусов',
//                    'data' => $extraStatusesData,
            ))
            ->add('ndsTax', 'text', array(
                'required' => false,
                'disabled' => $ndsTax_disabled,
                'attr' => ['data-mask' => 'integer'],
                'help' => 'После отгрузки заказа это значение нельзя будет изменить, даже, если заказ будет переоформляться.',
                'label' => 'Ставка налога в %'
            ))
            ->add('seller', null, array(
                'required' => true,
                'disabled' => $disabledSeller,
                'property' => 'caption',
                'label' => 'Продавец в заказе',
                'help' => 'Продавец нужен для бухгалтерии, чтобы сгенерировать все нужные документы. После отгрузки заказа это значение нельзя будет изменить, даже, если заказ будет переоформляться. '
                . 'Если продавец не работает с НДС, то нельзя указывать ставку налога'
            ))
            ->add('stock', null, array(
                'required' => true,
                'disabled' => $disabledStock,
                'property' => 'captionRu',
                'label' => 'Приоритетный склад бронирования',
                'help' => 'С этого склада товар для этого заказа списывается в первую очередь, если склад не указан, то приоритетным считается главный склад'
            ))

            //нужно сделать, чтоб подставлялись только менеджеры/админы/упаковщики
            ->add('packedBy', null, array(
                'disabled' => false,
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                    ->join('u.groups', 'g')
                    ->where('g.code!=:code')
                    ->setParameters(['code' => 'user']);
            },
                'required' => false,
                'label' => 'Упаковал',
                'property' => 'caption'
            ))
            //нужно сделать, чтоб подставлялись только менеджеры/админы/упаковщики
            ->add('checkedBy', null, array(
                'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('u')
                    ->join('u.groups', 'g')
                    ->where('g.code!=:code')
                    ->setParameters(['code' => 'user']);
            },
                'required' => false,
                'disabled' => false,
                'label' => 'Проверил',
                'property' => 'caption'
            ))
            ->add('comments', 'textarea', array(
                'required' => false,
                'label' => 'Комментарий заказчика',
                'attr'=>['style'=>'width:100%;height:100px']))
            ->with('Заказчик')
            ->add('contragent', 'ajax_entity', [
                'label' => 'Контрагент',
                'disabled' => $disabledContragent,
                'required' => true,
                'attr' => ['data-legal' => ($obj && $obj->getContragent() instanceof LegalContragent) ? 1 : 0],
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
                    'user.id' => array(
                        'search' => false,
                        'return' => true,
                    ),
                    'lastName' => array(
                        'search' => false,
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
                'template_customise_functions' => 'contragentInOrder.html.twig',
                'select2_constructor' => array(
                    'width' => '40%',
                    'placeholder' => 'Введите E-mail, наименование организации, или ID клиента',
                    'formatResult' => 'contragentFormatResult',
                    'formatSelection' => 'contragentFormatSelection',
                    'minimumInputLength' => 1),
            ])
            ->add('contragentFio', 'text', array('label' => 'ФИО', 'disabled' => $disabledContragent, 'read_only' => true, 'required' => false))
            ->add('contragentCompany', null, array('label' => 'Компания', 'disabled' => $disabledContragent, 'read_only' => true, 'required' => false))
            ->with('Получатель')
            ->add('recipientFio', 'text', array('label' => 'ФИО', 'disabled' => $disabledRecipment, 'required' => false, 'attr' => ['style' => 'width:340px']))
            ->add('recipientCompany', null, array('label' => 'Компания', 'disabled' => $disabledRecipment, 'required' => false,))
            ->add('recipientPhone', null, array('label' => 'Телефон', 'disabled' => $disabledRecipment, 'required' => false, 'help' => 'На этот телефон будут высылаться уведомления о посылке'))
            ->add('recipientEmail', null, array('label' => 'Email', 'disabled' => $disabledRecipment, 'required' => false, 'help' => 'На этот адрес будут высылаться уведомления о посылке'))
            ->add('recipientPassport', null, array('label' => 'Паспорт', 'disabled' => $disabledRecipment, 'required' => false, 'help' => 'Для некоторых ТК необхоим при получении посылки'))
            ->with('Документы')
            ->add('documentScans', 'multiupload_document', array(
                //'hide_field' => array('all'),       // Скрывает доп. поля
                'label' => 'Сканы платежных поручений',
                'parent_form' => $formMapper, // Передача текущего formMapper'a (required)
                'width' => '800px', // Ширина таблицы, можно задавать в px и в %
                ), array(
                'sortable' => 'indexPosition', // Поле сортировки
            ))
            ->with('Связанные заказы')
            ->add('ordersConnected', 'union', array(
                'columns' => [
                    'id' => ['label' => 'ID заказа', 'identifier' => true],
                    'isCheckedStatus' => ['label' => 'Проверен', 'width' => 80, 'type' => 'boolean'],
                    'isPaidStatus' => ['label' => 'Оплачен', 'width' => 80, 'type' => 'boolean'],
                    'isShippedStatus' => ['label' => 'Отгружен', 'width' => 80, 'type' => 'boolean'],
                    'isCanceledStatus' => ['label' => 'Отменён', 'width' => 80, 'type' => 'boolean']
                ],
                'data' => new ArrayCollection(
                    $em->getRepository('CoreUnionBundle:OrderConnectedUnion')->createQueryBuilder('u')
                    ->select('u,targetObject')
                    ->join('u.targetObject', 'targetObject')
                    ->orderBy('u.indexPosition', 'ASC')
                    ->where('u.mappedObject=:mappedObject')->setParameter('mappedObject', $obj->getId())
                    ->getQuery()
                    ->getResult()
                ),
                'parent_form' => $formMapper,
                'help' => 'Другие заказы могут быть связаны с текущим',
                'edit_route' => 'admin_core_order_order_edit',
                'create_route' => 'admin_core_order_order_create',
                'find_route' => 'admin_core_order_order_list',
                'label' => ' ', //нужно сдеать  умолчанию
                'hideSubjectInList' => true, //скрываем себя в списке выбора записей
                'setThisToTargetObject' => true,
                'deleteable' => false,
                ), array('sortable' => 'indexPosition'))
            ->with('Доставка')
            ->add('deliveryMethod', 'entity', array(
                //'error_bubbling' => false,
                'class' => 'CoreDeliveryBundle:Service',
                //'group_by' => 'company.captionRu',
                'property' => 'captionRu',
                /*'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('s')
                        ->select('s, c')
                        ->leftJoin('s.company', 'c');
                  },
                 * 
                 */
                'choices' => $this->formatDeliveryMethods($deliveryMethods),
                'disabled' => $obj->getIsPaidStatus(),
                'attr' => array(
                    'data-extra' => ['companyName', 'instanceName'],
                    //'readonly' => $composition_disabled,
                    'readonly' => $obj->getIsPaidStatus()
                ),
                'required' => false,
                'label' => 'Способ доставки',
                'empty_value' => 'Выберите способ доставки...'
            ))
            ->add('deliveryCity', 'ajax_entity', [
                'disabled' => $obj->getIsPaidStatus(),
                'read_only' => $isDeliveryInfoDisabled,
                'attr' => [
                        'data-val' => ($obj->getDeliveryCity() && !$isDeliveryInfoDisabled) ? $obj->getDeliveryCity()->getId() : '',
                        'data-caption' => ($obj->getDeliveryCity() && !$isDeliveryInfoDisabled) ? $cityCaption: ''
                        ],
                'label' => 'Город доставки',
                'required' => false,
                'properties' => [
                    'id' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'full',
                    ),
                    'name' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'left',
                    ),
                    'region.name' => array(
                        'search' => false,
                        'return' => true,
                        'entry' => 'left',
                    ),
                ],
                'select2_constructor' => array(
                    'width' => '40%',
                    'placeholder' => 'Введите название города',
                    'minimumInputLength' => 1),
            ])
            ->add('deliveryAddress', 'text', array(
                'required' => false,
                'label' => 'Адрес доставки',
                'disabled' => $obj->getIsPaidStatus(),
                'attr' => ['data-val' => ($obj && $isDeliveryInfoDisabled) ? '' : $obj->getDeliveryAddress()],
                'read_only' => $isDeliveryInfoDisabled
            ))
            ->add('deliveryPostcode', 'text', array(
                'required' => false,
                'read_only' => $isDeliveryInfoDisabled,
                'disabled' => $obj->getIsPaidStatus(),
                'attr' => ['data-val' => ($obj && $isDeliveryInfoDisabled) ? '' : $obj->getDeliveryPostCode()],
                'label' => 'Почтовый индекс'
            ))
            ->add('deliveryPoint', null, array(
                'disabled' => $obj->getIsPaidStatus(),
                'required' => ($obj->getDeliveryMethod() instanceof ServiceWithAddress) ? true : false,
                'label' => 'Пункт выдачи товара',
                'empty_value' => 'Необходимо выбрать',
                'attr' => ['data-hidden' => ($obj->getDeliveryMethod() instanceof ServiceWithAddress) ? false : true]
            ))
            ->add('deliveryPrice', 'money', array(
                'required' => false,
                'read_only' => true,
                'label' => 'Примерная стоимость доставки',
                'attr' => ['data-mask' => 'money']
            ))
            ->add('deliveryCost', 'money', array(
                'required' => false,
                'read_only' => false,
                'disabled' => $obj->getIsPaidStatus(),
                'label' => 'Сумма к оплате за доставку',
                'attr' => ['data-mask' => 'money']
            ))
            ->add('isDeliveryIncludedInPayment', null, array(
                'disabled' => $obj->getIsPaidStatus(),
                'required' => false,
                'label' => 'Доставку оплачивает нам покупатель вместе с заказом'
            ))
            ->add('waybills', 'collection', array(
                'type' => 'waybills_in_order',
                'by_reference' => false,
                'prototype_name' => '__waybill__',
                'label' => 'Трансп. накладные',
                'allow_add' => true,
                'allow_delete' => true,
                'options' => array(
                    'order' => $obj,
                    'cascade_validation' => true,
                    'view_timezone' => $options['container']->getParameter('default_timezone'),
                ))
            )
            ->with('Состав заказа')
            ->add('compositions', 'products_in_order', array(
                //'disabled' => $composition_disabled,
                'read_only' => $composition_disabled,
                'required' => true,
                'by_reference' => false,
                'btn_add' => !$composition_disabled ? 'Добавить товар' : false,
                'label' => false), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable' => 'indexPosition'
            ))
            ->with('1С Бухгалтерия')
            ->add('deliveryAgreement1C', null, array(
                'required' => false,
                'label' => 'ID договора поставки'
            ))
            ->add('waybill1C', null, array(
                'required' => false,
                'label' => 'ID трансп. накладной'
            ))
            ->add('invoice1C', null, array(
                'required' => false,
                'label' => 'ID счета-фактуры'
            ))
            ->with('Платежи')
            
                    
            ->add('payments', 'sonata_type_collection', array(
                'type_options' => array('delete' => false),
                'required' => false,
                'label' => false,
                'btn_add' => false,
                 ), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable' => 'position',
            ))
            ->end();

        // Подписчик
        $formMapper->getFormBuilder()
            ->addEventListener(FormEvents::POST_SUBMIT, function(FormEvent $event) use ($options) {
                $data = $event->getData();
                $form = $event->getForm();

                foreach ($data->getWaybills() as $waybill) {
                    // сохраняем накладные
                    if ($waybill->getIsAutoGenerated() && $waybill->getIsSent()) {
                        $params = ['orderId' => $data->getId(),
                            'waybillId' => $waybill->getNumber(),
                            'deliveryMethodId' => $data->getDeliveryMethod()->getId(),
                            'sellerId' => $data->getSeller()->getId()
                        ];
                        $result = $options['container']->get('core_delivery')->configurate($params)->getInvoice();
                        if (isset($result['body']['rawData'])) {
                            $fileName = 'waybill_' . $params['orderId'] . '_' . $params['waybillId'] . '.pdf';
                            $res = $options['container']->get('kernel')->getRootDir() . '/../web/uploads/waybills/';
                            $filePath = $res . $fileName;

                            if (file_put_contents($filePath, $result['body']['rawData']) === FALSE) {
                                $error = 'Не возможно сохранить файл накладной';
                                $form->addError(new FormError($error));
                            }
                        } else {
                            $error = isset($result['body']['msg']) ? $result['body']['msg'] : 'Ошибка при генерации накладной';
                            $form->addError(new FormError($error));
                        }
                    }

                    // проставляем тип доставки, продавца и город
                    if (!$waybill->getIsAutoGenerated() && (!$waybill->getIsSent() || !$waybill->getSalesMan())) {
                        $waybill->setSalesMan($data->getSeller())
                        ->setDeliveryMode($data->getDeliveryMethod())
                        ->setDeliveryCity($data->getDeliveryCity())
                        ;
                    }
                }
            });
    }

    /**
     * Форматирование данных о доставке
     * @param type $deliveryMethods
     * @param string $format - choices
     * @return array
     */
    private function formatDeliveryMethods($deliveryMethods, $format = 'choices')
    {
        $result = [];
        if ($format == 'choices') {
            foreach ($deliveryMethods as $method) {
                if ($method instanceof ServiceWithAddress || $method instanceof ServiceInCity) {
                    $result[$method->getServiceType()->getCaptionRu()][$method->getId()] = $method;
                } else {
                    $result[$method->getCompany()->getCaptionRu()][$method->getId()] = $method;
                }
            }
        } else {
            foreach ($deliveryMethods as $method) {
                if ($method instanceof ServiceWithAddress || $method instanceof ServiceInCity) {
                    $result[$method->getId()] = false;
                } else {
                    $result[$method->getId()] = $method->getCompany()->getName();
                }
            }
        }

        return $result;
    }

}
