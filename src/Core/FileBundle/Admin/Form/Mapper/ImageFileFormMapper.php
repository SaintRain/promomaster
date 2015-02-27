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

class ImageFileFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {

        parent::__construct($formMapper, $options);

        //$disabled = $options['disabled'];
        //$obj = $options['obj'];

        $formMapper
            ->add('file', 'file', array(
                'label' => 'label.images',
                'required' => false))
            ->add('name', 'hidden', array(
                //'disabled' => true,
                'label' => false))
            ->add('indexPosition', 'hidden', array(
                'label' => false,
                'required' => false,
                'attr' => array(
                    'hidden' => true
                )));
        $this
            ->add('alt', null, array(
                'label' => 'label.alt',
                'attr' => array('class' => 'span15')));

        $formMapper->end();
    }

}
