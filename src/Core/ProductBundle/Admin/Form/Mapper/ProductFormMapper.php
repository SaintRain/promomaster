<?php

/**
 * Форма для редактирования физического товаров
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\ProductBundle\Admin\Form\Mapper\CommonProductFormMapper;
use Core\ProductBundle\Admin\Form\Mapper\PhysicalPropertiesMapper;

class ProductFormMapper extends CommonProductFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);

        $obj = $options['obj'];
        $em = $options['container']->get('doctrine.orm.entity_manager');

        //добавляем поля веса и размеров
        new PhysicalPropertiesMapper($formMapper, $options);
    }

}
