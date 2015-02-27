<?php

/**
 * Форма редактирования картинок
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FileBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class DocumentFileFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {

        parent::__construct($formMapper, $options);

        //$disabled = $options['disabled'];
        //$obj = $options['obj'];

        $formMapper
            ->add('indexPosition', 'hidden', array(
                'label' => false,
                'required' => false,
                'attr' => array(
                    'hidden' => true
        )));
        $this
            ->add('caption', null, array(
                'label' => 'label.caption',
                'attr' => array('class' => 'span25')));

        $formMapper
            ->add('name', 'text', array(
                'label' => 'label.name',
                'read_only' => true,
                ))
            ->add('size', 'text', array(
                'label' => 'label.size',
                'read_only' => true,
                'attr' => array(
                    'class' => 'span15'
            )))
            ->add('file', 'file', array(
                'label' => 'label.files',
                'required' => false));

        $formMapper->end();
    }

}
