<?php

/**
 * Админский класс для редактирования количества одинаковых единиц продукта прикрепленных к составному продукту
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\UnionBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;

class ProductCompositionsUnionAdmin extends Admin {

    /**
     * Отображение списка
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->add('quantity', null, array(                   
                    'sortable' => true,
                    'editable' => true
        ));
    }

}