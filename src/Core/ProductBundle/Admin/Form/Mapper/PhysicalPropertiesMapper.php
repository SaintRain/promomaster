<?php

/**
 * Форма для редактирования веса/размера товара. Используется для физического и составного товара
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\ProductBundle\Entity\Product;

class PhysicalPropertiesMapper {

    public function __construct(FormMapper $formMapper, array $options) {

        $obj = $options['obj'];
        if ($obj instanceof Product) {
            $required=true;
        }
        else {
            $required=false;
        }
      
        $formMapper->with('Характеристики')
                ->add('netWeight', 'text', array(
                    'label' => 'Масса нетто',
                    'required' => $required,
                    'attr' => ['data-mask' => 'decimal'],
                    'help'=>'Для композитного состава пересчитывается автоматически'
                ))
                ->add('isNetWeightInGm', 'choice', array(
                    'label' => 'Единица измерения массы нетто',
                    'required' => $required,
                    'choices' => [1 => 'Граммы', 0 => 'Килограммы'],
                ))
                ->add('grossWeight', 'text', array(
                    'label' => 'Масса брутто',
                    'required' => $required, //true
                    'attr' => ['data-mask' => 'decimal'],
                    'help'=>'Для композитного состава пересчитывается автоматически'                    
                ))
                ->add('isGrossWeightInGm', 'choice', array(
                    'label' => 'Единица измерения массы брутто',
                    'required' => $required,
                    'choices' => [1 => 'Граммы', 0 => 'Килограммы'],
                ))
                ->add('lengthOfProduct', 'text', array(
                    'label' => 'Длина продукта в мм',
                    'required' => false,
                    'attr' => ['data-mask' => 'integer'],
                    'help'=>'Для композитного состава пересчитывается автоматически'
                ))
                ->add('widthOfProduct', 'text', array(
                    'label' => 'Ширина продукта в мм',
                    'required' => false,
                    'attr' => ['data-mask' => 'integer'],
                    'help'=>'Для композитного состава пересчитывается автоматически'
                ))
                ->add('heightOfProduct', 'text', array(
                    'label' => 'Высота продукта в мм',
                    'required' => false,
                    'attr' => ['data-mask' => 'integer'],
                    'help'=>'Для композитного состава пересчитывается автоматически'
                ))
                ->add('lengthOfBox', 'text', array(
                    'label' => 'Длина коробки в мм',
                    'required' => $required, //true
                    'attr' => ['data-mask' => 'integer'],
                    'help'=>'Для композитного состава пересчитывается автоматически'
                ))
                ->add('widthOfBox', 'text', array(
                    'label' => 'Ширина коробки в мм',
                    'required' => $required, //true
                    'attr' => ['data-mask' => 'integer'],
                    'help'=>'Для композитного состава пересчитывается автоматически'
                ))
                ->add('heightOfBox', 'text', array(
                    'label' => 'Высота коробки в мм',
                    'required' => $required, //true
                    'attr' => ['data-mask' => 'integer'],
                    'help'=>'Для композитного состава пересчитывается автоматически'
                ))
        ;
    }

}
