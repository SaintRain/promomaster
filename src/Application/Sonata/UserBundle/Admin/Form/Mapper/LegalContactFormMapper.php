<?php

/**
 * Форма для редактирования адресата контрагента юридического типа
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;

class LegalContactFormMapper
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
                    ->add('mark', null, array(
                        'label' => 'Примечание'
                    ))
                ->end()
        ;
    }
}
