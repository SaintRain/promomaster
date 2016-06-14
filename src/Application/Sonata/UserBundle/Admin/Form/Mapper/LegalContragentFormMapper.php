<?php

/**
 * Форма для редактирования контрагента юридического типа
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;

class LegalContragentFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        $formMapper
                ->with('Основное')
                ->add('user', 'ajax_entity', [
                    'label' => 'Пользователь',
                    'cascade_validation' => true,
                    'required' => true,
                    'properties' => [
                        'id' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'full',
                        ),
                        'username' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'left',
                        ),
                        'email' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'left',
                        )],
                    'select2_constructor' => array(
                        'placeholder' => 'Введите E-mail, Логин, или ID пользователя',
                        'minimumInputLength' => 1),
                ])

//                ->add('user', null, array(
//                    'cascade_validation' => true,
//                    'empty_value' => 'Необходимо выбрать',
//                    'label' => 'Пользователь'))
                ->add('legalForm', null, array(
                    'label' => 'Организационно-правовая форма'))
                ->add('organization', null, array(
                    'label' => 'Название организации'))
                ->add('inn', null, array(
                    'label' => 'ИНН'))
                ->add('kpp', null, array(
                    'required' => false,
                    'label' => 'КПП'))
                ->add('ogrn', null, array(
                    'label' => 'ОГРН'))
                ->add('chiefPosition', null, array(
                    'label' => 'Должность руководителя'))
                ->add('chiefFio', null, array(
                    'label' => 'ФИО руководителя'))
                ->add('bank', 'ajax_entity', [
                    'label' => 'Банк',
                    'required' => true,
                    'properties' => [
                        'id' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'full',
                        ),
                        'bic' => array(
                            'search' => true, 'return' => true,
                            'entry' => 'left',
                        ),
                        'caption' => array(
                            'search' => false,
                            'return' => true, 'entry' => 'left',
                        ),
                    ],
                    'select2_constructor' => array(
                        'placeholder' => 'Введите BIC-код',
                        'minimumInputLength' => 1),
                ])
                ->add('bankAccount', null, array(
                    'help' => 'Расчетный счет проверяется на основании БИК',
                    'label' => 'Расчетный счет в банке'))
                ->add('corrAccount', null, array('label' => 'Кор. счет', 'required' => false))
                ->end()
                ->with('Контактная информация')
                ->add('addressLegal', null, array(
                    'label' => 'Юрид-кий адрес'))
                ->add('addressPost', null, array(
                    'label' => 'Почтовый адрес '))
                ->add('phone1', null, array(
                    'label' => 'Конт. телефон 1'))
                ->add('phone2', null, array(
                    'label' => 'Конт. телефон 2'))
                ->add('phone3', null, array(
                    'label' => 'Конт. телефон 3'))
                ->add('fax', null, array(
                    'label' => 'Факс'))
                ->add('contactFio', null, array(
                    'label' => 'ФИО контактного лица '))
                ->add('contactEmail', null, array(
                    'required' => false,
                    'label' => 'Контактный email'))
                ->add('site', 'text', array(
                    'attr' => ['data-mask' => 'url'],
                    'label' => 'Сайт кампании'))
                ->end()
                ->with('Адреса')
                    ->add('contactList', 'sonata_type_collection', array(
                        'required' => false,
                        'by_reference' => false,
                        'label' => 'Адреса'), array(
                        'edit' => 'inline',
                        //'inline' => 'table',
                        'link_parameters' => array('subclass' => $formMapper->getAdmin()->getRequest()->query->get('subclass')),
                        'allow_delete' => true,
                        'btn_delete'=>'Удалить'
                    ))
                    /*
                    ->add('contactList', 'collection', array(
                        'attr' => ['class' => 'contact_list'],
                        'type'  => 'legal_contact_form',
                        'cascade_validation' => true,
                        'allow_add' => true,
                        'allow_delete' => true,
                        'prototype_name' => '_contactList_',
                        'required' => false,
                        'by_reference' => false,
                        'label' => 'Адреса'))
                    */
                ->end()
                ->with('История баланса контрагента')
                ->add('balanceHistory', 'balance_history', array(
                    'mapped' => false,
                    'label' => false,))
                ->end()
        ;
    }

}
