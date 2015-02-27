<?php

/**
 * Форма редактирования сертификатов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ManufacturerBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class CertificateFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {

        parent::__construct($formMapper, $options);

        $formMapper
            ->with('Сертификат');
        $this
            ->add('caption', 'text', array(
                'label' => 'Название'));
        $formMapper
            ->add('manufacturer', null, array(
                'property' => 'captionRu',
                'label' => 'Вендор'))
            ->add('url', null, array(
                'label' => 'URL'))
            ->add('dateOfReceipt', null, array(
                'label' => 'Дата получения',
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd.MM.yyyy',
                //'view_timezone' => $options['container']->getParameter('default_timezone'),
                'attr' => array(
                    'class' => 'datepicker'
            )))
            ->add('logo', 'multiupload_image', array(
                'parent_form' => $formMapper,
                'label' => 'Логотип (300x300)',
                'attr' => array(
                    'multiple' => false, // для одного файла
            )))
            ->add('document', 'multiupload_document', array(
                'parent_form' => $formMapper,
                'label' => 'Подтверждающий документ',
                'attr' => array(
                    'multiple' => false, // для одного файла
        )));
        $formMapper->end();
    }

}
