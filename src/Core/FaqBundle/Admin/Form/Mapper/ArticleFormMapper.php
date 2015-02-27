<?php

/**
 * Форма для редактирования статей FAQ
 * @author  Kaluzhny N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FaqBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class ArticleFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);
        $obj = $options['obj'];

        $formMapper
            ->with('Основное')
                ->add('category', 'tree_select', array(
                        'class' => 'CoreCategoryBundle:FaqCategory',
                        'property' => 'captionRu',
                        'required' => true,
                        'label'=>'Категория'))
                //->add('category', null, array('required' => true, 'label'=>'Категория'))
            ;
                $this->add('caption', null, array('required' => true, 'label'=>'Название'))
                    ->add('body', 'ckeditor', array('label' => 'Тело статьи',
                            'config' => array('width' => 950, 'height' => 300)));
                $formMapper->add('isActive', 'checkbox', array('required' => false, 'label'=>'Включена'))
                        ->add('isOnMain', 'checkbox', array('required' => false, 'label'=>'На главной', 'help' => 'Показывать ссылку на главной'))
                        ->add('isPredifinedAnswer', 'checkbox', array('required' => false, 'label'=>'В ответах', 'help' => 'Показывать в разделе предопределенных ответов'))
                ;
        $formMapper
            ->end()
            ->with('SEO')
                ->add('slug', null, array('required' => false, 'label'=>'ЧПУ', 'help' => 'Если оставить пустым, то будет сгенерировано автоматически <b>ВАЖНО!!! Используется программистом</b>'))
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
