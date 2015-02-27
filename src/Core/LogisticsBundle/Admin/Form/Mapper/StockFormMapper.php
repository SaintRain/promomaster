<?php

/**
 * Форма для редактирования складов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class StockFormMapper extends LanguageSwitcherFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        parent::__construct($formMapper, $options);

        $formMapper->with('Основное');
        $this->add('caption', null, array(
            'required' => true,
            'label' => 'Название',
        ));
        $formMapper->add('code', null, array(
            'required' => false,
            'label' => 'Уникальный код',
            'help' => 'Заполняется автоматически, если оставить пустым'
        ))
            ->add('city', 'ajax_entity', [
                'label' => 'Город',
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
                    'region.name' => array(
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
                    'width' => '40%',
                    'placeholder' => 'Введите название города',
                    'minimumInputLength' => 1
                ),
            ])
            ->add('address', null, array(
                'required' => true,
                'label' => 'Адрес'
            ))
            ->add('phone', null, array(
                'required' => false,
                'label' => 'Телефон'
            ))
            ->add('workTimeStart', null, array(
                'required' => false,
                'label' => 'Время работы с',
                'attr' => ['data-mask' => '99:99']

            ))
            ->add('workTimeEnd', null, array(
                'required' => false,
                'label' => 'Время работы до',
                'attr' => ['data-mask' => '99:99']
            ))
            ->add('isGeneralStock', null, array(
                'required' => false,
                'label' => 'Главный склад',
                'help' => 'Если склад отмечен как главный, то по дефолту во всех заказах товары резервируются с этого склада'
            ))
            ->add('regionsCityList', 'sonata_type_collection', array(
                    'required' => true,
                    'by_reference' => true,
                    'label' => 'Регионы'
                ), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'indexPosition',
                    'help' => 'Список регионов и городов, в которых работает данный продавец. Если вы укажете определенные регионы или города, то этот продавец будет назначен всем новым клиентам и заказам из этих регионов и городов.',
                )
            )
            ->end();
    }

}
