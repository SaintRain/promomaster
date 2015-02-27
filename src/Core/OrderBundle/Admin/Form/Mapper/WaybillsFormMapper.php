<?php

/**
 * Форма для редактирования товарных накладных
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class WaybillsFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);

        $formMapper->with('Основное')
                ->add('number', null, array(
                    'required' => true,
                    'label' => 'Номер',
                    'attr' => ['class' => 'width:100px']))
                ->add('dateTime', 'date', array(
                    'required' => true,
                    'label' => 'Дата',
                    'attr' => ['class' => 'datepicker'],
                    'widget' => 'single_text',
                    'format' => 'dd.MM.yyyy'
                ))
                ->add('expectedDate', 'date', array(
                    'required' => true,
                    'label' => 'Ожидаемая дата',
                    'attr' => ['class' => 'datepicker'],
                    'widget' => 'single_text',
                    'format' => 'dd.MM.yyyy'
                ))
                ->add('price', 'money', array(
                    'required' => true,
                    'label' => 'Цена',
                    'attr' => ['data-mask' => 'money']))
                ->add('sizesOfBox', 'collection', array(
                    'type' => 'boxes_in_order',
                    'by_reference' => false,
                    'prototype_name' => 'box_',
                    'allow_add' => true,
                    'allow_delete' => true,
                    'options' => array(
                        'cascade_validation' => true
                    ),
                    'label' => 'Упаковка')
                )
                /*
                ->add('sizesOfBox', 'sonata_type_collection', array(
                    'required' => true,
                    'auto_initialize' => false, // to del
                    'by_reference' => false,
                    'btn_add' => 'Добавить упаковку',
                    'label' => 'Габариты упаковок'), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'indexPosition'
                ))
                */
                ->add('indexPosition', 'hidden', array('required' => false, 'attr' => array('hidden' => true)))
                ->end();
    }

}
