<?php

/**
 * Удобный выбор категорий через JStree с индивидуальной настройкой параметров характеристик
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PropertyBundle\Admin\Form\Type;
use Core\CategoryBundle\Admin\Form\Type\CategoryType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PropertyCategoryType extends CategoryType {

    public function getName() {
        return 'property_category';
    }

}
