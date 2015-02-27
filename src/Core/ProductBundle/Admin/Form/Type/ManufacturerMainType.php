<?php

/**
 * Тип формы для выбора главного производителя
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\DataTransformer\ChoicesToValuesTransformer;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Doctrine\Common\Collections\ArrayCollection;

class ManufacturerMainType extends AbstractType {

  
    public function __construct() {
    }


    public function getParent() {
        return 'entity';
    }

    public function getName() {
        return 'manufacturer_main';
    }

}
