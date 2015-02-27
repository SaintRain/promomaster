<?php

/**
 * Форма для редактирования габаритов коробки
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class SizesOfBoxFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);

        $formMapper->with('Основное')
                ->add('length', 'text', array(
                    'required' => true,
                    'label' => 'Длина (мм.)',
                    'attr' => ['style' => 'width:100px', 'data-mask' => 'integer']))

                ->add('width', 'text', array(
                    'required' => true,
                    'label' => 'Ширина (мм.)',
                    'attr' => ['style' => 'width:100px', 'data-mask' => 'integer']))

                ->add('height', 'text', array(
                    'required' => true,
                    'label' => 'Высота (мм.)',
                    'attr' => ['style' => 'width:100px', 'data-mask' => 'integer']))

                ->add('weight', 'text', array(
                    'required' => true,
                    'label' => 'Вес',
                    'attr' => [ 'data-mask' => 'integer']))

                ->add('isWeightInKg', 'choice', array(
                    'label' => 'Единица измерения веса',
                    'required'=>true,
                    'choices'=>[0=>'Граммы', 1=>'Килограммы']                 
                    ))
                
                ->add('indexPosition', 'hidden', array('required' => false, 'attr' => array('hidden' => true)))
                ->end();
    }

}
