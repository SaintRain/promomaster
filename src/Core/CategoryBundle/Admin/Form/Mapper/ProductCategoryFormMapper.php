<?php

/**
 * Форма для редактирования категорий товаров
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class ProductCategoryFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);

        $disabled = $options['disabled'];
        $obj = $options['obj'];

        $formMapper->with('Основное')
                 ->add('id', 'text', array('label'=>'ID', 'required' => false, 'disabled'=>true))
                ->add('parent', 'tree_select', array(
                    'property' => 'captionRu',
                    'class' => $options['class'],
                    'required' => false,
                    //'empty_value' => 'Не указана родительская категория...',
                    'label' => 'Родитель',
                    'help' => 'Родительская категория, к которой принадлежит текущая категория'
        ));

        //добавление названия
        $this->add('caption', null, array('required' => true, 'label' => 'Название'
            , 'help' => 'Отображаемое название категории'
        ));

        $formMapper->add('isEnabled', 'checkbox', array('required' => false,
            'label' => 'Категория активна'));
//                ->add('name', null, array('required' => false, 'label' => 'Код/имя категории',
//                'help'=>'Опциональное системное имя категории'
//                    ));
        $this->add('description', 'ckeditor', array(
            'required' => false,
            'config' => array('width' => 950, 'height' => 300),
            'label' => 'Описание'));


        $formMapper->with('Настройки для фильтров')
                ->add('isInFilterNetWeight', null, ['label'=>'Вес нетто', 'help' => 'Выводить ли в фильтр "Вес нетто" из продукта'])
                ->add('isInFilterNetWeightInGm', 'choice', ['label'=>'Единица веса нетто', 'help' => 'Единица измерения веса нетто', 'choices' => [1 => 'Граммы', 0 => 'Килограммы']])
                ->add('isInFilterGrossWeight', null, ['label'=>'Вес брутто', 'help' => 'Выводить ли в фильтр "Вес брутто" из продукта'])
                ->add('isInFilterGrossWeightInGm', 'choice', ['label'=>'Единица веса брутто','help' => 'Единица измерения веса брутто', 'choices' => [1 => 'Граммы', 0 => 'Килограммы']])
                ->add('isInFilterLengthOfProduct', null, ['label'=>'Длина продукта','help' => 'Выводить ли в фильтр "Длина продукта в мм" из продукта'])
                ->add('isInFilterWidthOfProduct', null, ['label'=>'Ширина продукта','help' => 'Выводить ли в фильтр "Ширина продукта в мм" из продукта'])
                ->add('isInFilterHeightOfProduct', null, ['label'=>'Высота продукта','help' => ' Выводить ли в фильтр "Высота продукта в мм" из продукта'])
                ->add('isInFilterLengthOfBox', null, ['label'=>'Длина коробки','help' => 'Выводить ли в фильтр "Длина коробки в мм" из продукта'])
                ->add('isInFilterWidthOfBox', null, ['label'=>'Ширина коробки','help' => 'Выводить ли в фильтр "Ширина коробки в мм" из продукта'])
                ->add('isInFilterHeightOfBox', null, ['label'=>'Высота коробки','help' => 'Выводить ли в фильтр "Высота коробки в мм" из продукта']);

        $formMapper->with('SEO')
                ->add('slug', 'text', array('required' => false, 'label' => 'ЧПУ',
                                  'help' => 'Заполняется автоматически, если оставить пустым'
        ))
        ->add('slugHistory', 'slug_history',
                array(
                'mapped' => false,
                'label' => 'ЧПУ (старые)',
                'help' => 'Старые ЧПУ. С них происходит редирект с кодом 301.'
        ));

        $this->add('title', null, array('label' => 'Title'))
                ->add('metakeywords', 'textarea', array('label' => 'Metakeywords', 'required' => false))
                ->add('metadescription', 'textarea', array('label' => 'Metadescription', 'required' => false));
        $formMapper->end();
    }

}
