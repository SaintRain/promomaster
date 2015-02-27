<?php

/**
 * Админский класс для палитры цветов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ColorBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;

class ColorPaletteAdmin extends Admin {

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
            ->with('General')
            ->add('hex', 'colorpicker', array(
                'label' => 'Цвет (HEX)'))
            ->add('indexPosition', null, array(
                'label' => false,
                'attr' => array(
                    'hidden' => true
            )))
            ->end();
    }

}