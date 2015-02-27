<?php

/**
 * Форма для редактирования категорий FAQ
 * @author  Kaluzhny N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class FaqCategoryFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);
        $disabled = $options['disabled'];
        $obj = $options['obj'];
        $formMapper
            ->with('Основное')
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
            ->end()
            ->with('SEO')
                ->add('slug', null, array('required' => false, 'label'=>'ЧПУ', 'help' => 'Если оставить пустым, то будет сгенерировано автоматически'))
                ->add('slugHistory', 'slug_history',
                    array(
                    'mapped' => false,
                    'label' => 'ЧПУ (старые)',
                    'help' => 'Старые ЧПУ. С них происходит редирект с кодом 301.'
                ));
                $this->add('title', null, array('label' => 'Title'))
                ->add('metakeywords', 'textarea', array('label' => 'Metakeywords', 'required' => false))
                ->add('metadescription', 'textarea', array('label' => 'Metadescription', 'required' => false))
                ;
            $formMapper->end();
    }

}
