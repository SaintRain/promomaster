<?php
/**
 * Форма редактирования брендов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ManufacturerBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;
use Doctrine\ORM\EntityRepository;

class BrandFormMapper extends LanguageSwitcherFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        parent::__construct($formMapper, $options);
        $formMapper
            ->with('Основные')
            ->add('manufacturer', null, array('property' => 'captionRu', 'required' => true, 'label' => 'Производитель', 'empty_value' => 'Укажите производителя...',));

        $this
            ->add('caption', null, array(
                'label' => 'Название'));
        $formMapper
            ->add('logo', 'multiupload_image',
                array(
                'parent_form' => $formMapper,
                'label' => 'Логотип (300x150)',
                'width' => '700px',
                'attr' => array(
                    'multiple' => false, // для одного файла
            )))
            ->add('indexPosition', null, array(
                'label' => 'Позиция сортировки'));
        $formMapper->with('Описание');
        $this
            ->add('description', 'ckeditor',
                array(
                'required' => false,
                'config' => array('width' => 1000, 'height' => 200),
                'label' => 'Описание',
                'config' => array(
                    'removePlugins' => 'scayt,wsc',
                    'extraPlugins' => 'jqueryspellchecker',
                    'contentsCss' => 'bundles/applicationivoryckeditor/contents.css'
                ),))
            ->add('descriptionContinue', 'ckeditor',
                array(
                'required' => false,
                'config' => array('width' => 1000, 'height' => 500),
                'label' => 'Продолжение описания, свернутая часть',
                'config' => array(
                    'removePlugins' => 'scayt,wsc',
                    'extraPlugins' => 'jqueryspellchecker',
                    'contentsCss' => 'bundles/applicationivoryckeditor/contents.css'
                ),));
        $formMapper->add('substrate', 'multiupload_image',
            array(
            'parent_form' => $formMapper,
            'label' => 'Подложка (712x240)',
            'width' => '700px',
            'help' => 'Эта картинка выводится на фронтенде под текстом описания бренда.',
            'attr' => array(
                'multiple' => false, // для одного файла
        )));

        $formMapper->with('Серии')
            ->add('seriesList', 'sonata_type_collection',
                array(
                'by_reference' => false,
                'required' => true,
                'label' => 'Серии',
                'type_options' => array('delete' => true)
                ), array(
                'sortable' => 'indexPosition',
                'edit' => 'inline',
                'inline' => 'table',
        ));
        $formMapper->with('SEO');

        $formMapper
            ->add('slug', null, array(
                'required' => false,
                'label' => 'Системное имя', 'help' => 'Если оставить пустым, то заполниться автоматически'))
            ->add('slugHistory', 'slug_history',
                array(
                'mapped' => false,
                'label' => 'ЧПУ (старые)',
                'help' => 'Старые ЧПУ. С них происходит редирект с кодом 301.'
            ));
            $this
            ->add('title', null, array(
                'required' => false,
                'label' => 'Meta-title'))
            ->add('metadescription', 'textarea', array(
                'required' => false,
                'label' => 'Meta-keywords'))
            ->add('metakeywords', 'textarea', array(
                'required' => false,
                'label' => 'Meta-description'));
        $formMapper->end();
    }
}