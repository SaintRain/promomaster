<?php

/**
 * Форма редактирования цветов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ColorBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;


class ColorFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {

        parent::__construct($formMapper, $options);

        $formMapper
            ->with('Цвет')
            ->add('id', null, array(
                'label' => 'ID',
                'disabled' => true))
            ->add('isEnabled', null, array(
                'label' => 'Активность',
                'required' => false));
        $this
            ->add('caption', 'text', array(
                'label' => 'Название'));
        $formMapper
            ->add('hex', 'colorpicker', array(
                'label' => 'Цвет (HEX)'))
            ->add('indexPosition', null, array(
                'label' => 'Позиция сортировки'))
            ->add('updatedAt', null, array(
                'label' => 'Обновлен',
                'widget' => 'single_text',
                'required' => false,
                'format' => 'dd.MM.yyyy в HH:mm',
                'view_timezone' => $options['container']->getParameter('default_timezone'),
                'disabled' => true))
            ->add('palette', 'sonata_type_collection', array(
                'label' => 'Палитра',
                'by_reference' => false,
                ), array(
                'sortable' => 'indexPosition',
                'edit' => 'inline',
                'inline' => 'table',
                'allow_delete' => true
            ))
            ->end();
    }

}
