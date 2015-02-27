<?php

/**
 * Форма для редактирования дополнительных расходов поставки
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class AdditionalCostsOfSupplyFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);

        $formMapper->with('Основное')
                ->add('type', 'sonata_type_model', array(
                    'property'=>'captionRu',
                    'label' => 'Тип',
                    'required' => true,                    
                ))
                ->add('cost', 'money', array(
                    'required' => true,
                    'label' => 'Сумма',
                    'attr' => ['data-mask' => 'money', 'style' => 'width:150px']
                ))
                ->add('note', 'textarea', array(
                    'required' => false,
                    'label' => 'Примечание',                    
                        'attr' => ['style' => 'width:100%']
                ))
               
                ->end();
    }

}
