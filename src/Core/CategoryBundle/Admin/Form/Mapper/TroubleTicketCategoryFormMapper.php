<?php

/**
 * Форма для редактирования категорий траблтикетов
 * @author  Kaluzhny N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\CategoryBundle\Entity\Repository\TroubleTicketCategoryRepository;
use Core\CategoryBundle\Entity\TroubleTicketCategory;

class TroubleTicketCategoryFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        $disabled = $options['disabled'];
        $obj = $options['obj'];

        $formMapper->with('Основное')
            ->add('parent', 'tree_select', array(
                'property' => 'captionRu',
                'class' => $options['class'],
                'required' => false,
                'empty_value' => 'Не указана родительская категория...',
                'label'=>'Родитель'
            ))
            ->add('captionRu', null, array('required' => true, 'label'=>'Название'))
            ->add('isEnabled', 'checkbox', array('required' => false, 'label'=>'Категория активна'))
            ->add('name', null, array('required' => false, 'label'=>'Код/имя категории'))
            ->add('descriptionRu', 'ckeditor', array(
                'required' => false,
                'config'=>array('width'=>950 ,'height'=>300),
                'label' => 'Описание'))
        ;
    }

}
