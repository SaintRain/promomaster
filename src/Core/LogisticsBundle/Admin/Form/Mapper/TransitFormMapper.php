<?php

/**
 * Форма для редактирования транзитов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;
use Core\DirectoryBundle\Entity\Repository\CurrencyRepository;
use Core\LogisticsBundle\Entity\Transit;

class TransitFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);
        $obj = $options['obj'];
        if ($obj->getStatus() && $obj->getStatus()->getName() == Transit::completedStatusName) {
            $disabled_end = true;
        } else {
            $disabled_end = false;
        }

        $formMapper->with('Основное')
                ->add('id', 'text', array(
                    'required' => true,
                    'disabled' => true,
                    'label' => 'ID'))
                ->add('createdDateTime', 'date', array(
                    'required' => false,
                    'read_only' => true,
                    'disabled' => true,
                    'label' => 'Дата создания',
                    'attr' => ['class' => 'datepicker'],
                    'widget' => 'single_text',
                    //'view_timezone' => $options['container']->getParameter('default_timezone'),
                    'format' => 'dd.MM.yyyy'))
                ->add('estimatedDateOfDelivery', 'date', array(
                    'required' => false,
                    'disabled' => $disabled_end,
                    'label' => 'Ориентировочная дата прихода',
                    'attr' => ['class' => 'datepicker'],
                    'widget' => 'single_text',
                    //'view_timezone' => $options['container']->getParameter('default_timezone'),
                    'format' => 'dd.MM.yyyy'))
                ->add('fromStock', null, array(
                    'disabled' => $disabled_end,
                    'property' => 'captionRu',
                    'required' => true,
                    'label' => 'Со склада',
                ))
                ->add('toStock', null, array(
                    'disabled' => $disabled_end,
                    'property' => 'captionRu',
                    'required' => true,
                    'label' => 'На склад',
                ))
                ->add('recipient', null, array(
                    'disabled' => $disabled_end,
                    'property' => 'email',
                    'required' => true,
                    'label' => 'Получатель',
                ))
                ->add('deliveryMethod', null, array(
                    'property' => 'captionRu',
                    'disabled' => $disabled_end,
                    'required' => true,
                    'label' => 'Способ доставки',
                    'empty_value' => 'Выберите способ доставки...'
                ))
                ->add('deliveryCost', 'money', array(
                    'disabled' => $disabled_end,
                    'required' => true,
                    'label' => 'Стоимость доставки',
                    'attr' => ['data-mask' => 'money']
                ))
                ->add('waybills', 'textarea', array(
                    'disabled' => $disabled_end,
                    'required' => false,
                    'label' => 'Транспортные накладные',
                    'help' => 'по одной на каждой строке (если необходимо указать дату накладной, то указывайте в скобках после номера накладной, формат даты ДД.ММ.ГГГГ)'
                ))
                ->add('status', 'sonata_type_model', array(
                    'btn_add' => false,
                    'disabled' => $disabled_end,
                    'empty_value' => 'Выберите статус...',
                    'empty_data' => null,
                    'property' => 'captionRu',
                    'required' => true,
                    'label' => 'Статус',
                    'query' => $options['container']
                    ->get('doctrine.orm.entity_manager')
                    ->createQuery('SELECT s FROM CoreLogisticsBundle:TransitStatus s ORDER BY s.indexPosition ASC')
                ))
                ->with('Товары в транзите');

        if ($disabled_end) {
            $formMapper->add('products', 'sonata_type_collection', array(
                'required' => true,
                'by_reference' => false,
                'btn_add'=>false,
                    'type_options' => array('delete' => false),
                'label' => false), array(                    
                'edit' => 'inline',
                'inline' => 'table',
//                'sortable' => 'indexPosition'
                    )
            );
        } else {
            $formMapper->add('booking', 'products_in_transit', array(
                'label' => false)
            );
        }



        $formMapper->end();
    }

}
