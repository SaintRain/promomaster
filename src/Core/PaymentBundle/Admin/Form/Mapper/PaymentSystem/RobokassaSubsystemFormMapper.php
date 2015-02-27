<?php

/**
 * Форма редактирования настроек для подсистем платежной системы Robokassa
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Admin\Form\Mapper\PaymentSystem;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class RobokassaSubsystemFormMapper extends LanguageSwitcherFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {

        parent::__construct($formMapper, $options);

        $formMapper
            ->add('indexPosition', 'text', array(
                'label' => 'Позиция',
                'attr' => array(
                    'class' => 'span12'
                )));
        $this
            ->add('caption', 'text', array(
                'label' => 'Название',
                'attr' => array(
                    'class' => 'span12'
                )));
        $formMapper
            ->add('system', null, array(
                'label' => 'Системное имя',
                'attr' => array(
                    'class' => 'span12'
                )
            ));
        $formMapper
            ->add('IncCurrLabel', null, array(
                'label' => 'Ключь подсистемы',
                'attr' => array(
                    'class' => 'span12'
                )
            ));

        $this
            ->add('description', 'ckeditor', array(
                'required' => false,
                'config' => array('width' => 500, 'height' => 200),
                'label' => 'Описание'
            ));
        $formMapper
            ->add('isEnabled', null, array(
                'label' => 'Активность',
                'required' => false))
            ->add('isInFooter', null, array(
                'label' => 'Показывать в футере',
                'required' => false));
        $formMapper->end();
    }

}
