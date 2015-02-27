<?php

/**
 * Форма для редактирования контрагента физического типа
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;

class IndiContragentFormMapper
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
                ->add('lastName', null, array(
                    'label' => 'Фамилия'))
                ->add('firstName', null, array(
                    'label' => 'Имя'))
                ->add('surName', null, array(
                    'label' => 'Отчество'))
                ->end()
                ->with('Контактная информация')
                ->add('phone1', null, array(
                    'label' => 'Контактный телефон 1'))
                ->add('phone2', null, array(
                    'label' => 'Контактный телефон 2'))
                ->add('phone3', null, array(
                    'label' => 'Контактный телефон 3'))
                ->add('contactEmail', null, array(
                    'required' => false,
                    'label' => 'Контактный email'))
                ->end()
                ->with('Получатели')
                    ->add('contactList', 'sonata_type_collection', array(
                        'required' => false,
                        'by_reference' => false,
                        'label' => 'Получатели'), array(
                        'edit' => 'inline',
                        //'inline' => 'table',
                        'link_parameters' => array('subclass' => $formMapper->getAdmin()->getRequest()->query->get('subclass')),
                        'allow_delete' => true,
                        'btn_delete'=>'Удалить'
                    ))
                ->end()
                ->with('История баланса контрагента')
                ->add('balanceHistory', 'balance_history', array(
                    'mapped' => false,
                    'label' => false,))
                ->end()
        ;
    }

}
