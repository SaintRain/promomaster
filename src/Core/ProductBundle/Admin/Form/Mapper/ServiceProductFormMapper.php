<?php

/**
 * Форма для редактирования дополнительных услуг
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\ProductBundle\Admin\Form\Mapper\CommonProductFormMapper;

class ServiceProductFormMapper extends CommonProductFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);

        $obj = $options['obj'];
        $em = $options['container']->get('doctrine.orm.entity_manager');

        $formMapper->add('serialsQuantity', 'text', array(
            'required' => true,

            'label' => 'Количество полей для дополнительной информации',
            'help' => 'Что-то вроде серийных номеров только для услуги',
            'attr' => ['data-mask' => 'integer']
        ));
    }

}
