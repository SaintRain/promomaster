<?php

/**
 * Форма для редактирования RegionCity
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class RegionCityFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);

        $formMapper->with('Основное')
                ->add('isRegion', 'choice', ['label' => 'Локация', 'choices'=>[0=>'Регион', 1=>'Город'],
                    'attr'=>['style'=>'width:100px']
                    ]);
        $this->add('caption', null, array(
                    'required' => true,
                    'label' => 'Название',
                    'attr'=>['style'=>'width:400px']
            ))
                ->end();
    }

}
