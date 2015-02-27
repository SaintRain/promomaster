<?php

/**
 * Форма для редактирования адресата контрагента физического типа
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;

class IndiContactFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        $formMapper
                ->with('Адрес')
                    ->add('address', null, array(
                        'attr' => ['style'=> 'width:350px'],
                        'required' => true,
                        'label' => 'Адрес доставки'
                    ))
                    ->add('city', 'ajax_entity', [
                            'label' => 'Город',
                            'attr' => ['class'=> 'span7'],
                            'required' => true,
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
                                'area' => array(
                                    'search' => false,
                                    'return' => true,
                                    'entry' => 'left',
                                ),
                              ],
                            'select2_constructor' => array(
                                'width' => '350px',
                                'placeholder' => 'Введите название города',
                                'minimumInputLength' => 1),
                        ])
                    //->add('postIndex', null, array('label' => 'Почтовый индекс', 'required' => true, 'attr' => ['style'=> 'width:150px']))
                ->end()
                ->with('Контактные данные')
                    ->add('lastName', null, array(
                        'label' => 'Фамилия'))
                    ->add('firstName', null, array(
                        'label' => 'Имя'))
                    ->add('surName', null, array(
                        'label' => 'Отчество'))
                    ->add('passport', null, array(
                        'attr' => (array('class' => 'span5')),
                        'label' => 'Паспорт'
                    ))
                    ->add('phone', null, array(
                        'label' => 'Контактный телефон'))
                    ->add('contactEmail', null, array(
                        'label' => 'Контактный email'))
                    ->add('mark', null, array(
                        'label' => 'Примечание'))
                ->end()
        ;
    }
}
