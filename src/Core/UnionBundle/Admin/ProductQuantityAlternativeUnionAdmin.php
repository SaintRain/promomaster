<?php

/**
 * Админский класс для редактирования количественных альтернатив продута
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\UnionBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;

class ProductQuantityAlternativeUnionAdmin extends Admin {

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