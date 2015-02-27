<?php

/**
 * Новый тип для редактирования данных настройки
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ConfigBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\DataTransformer\ChoicesToValuesTransformer;

class ConfigDataType extends AbstractType {

    protected $core_config_logic;  //юизнесс логика для работы с категориями

    public function __construct($core_config_logic) {
        $this->core_config_logic = $core_config_logic;
    }

    
//    public function buildForm(FormBuilderInterface $builder, array $options) {
//
////        $core_config_logic = $this->core_config_logic;
//        $builder->addEventListener(FormEvents::PRE_BIND, function(FormEvent $event) use ($core_config_logic, $options) {//PRE_BIND || POST_BIND
//                    $data = $event->getData();
//                    //чтобы не было ошибки формата, передаём NULL а сохранение делаем в сервисе
//                    $event->setData(null);
//
//                    $core_config_logic
//                    if ($data) {
//                        $options['parent_form']->getFormBuilder()->addEventListener(FormEvents::POST_BIND, function(FormEvent $event) use ($core_shop_property_logic, $data) {//PRE_BIND || POST_BIND
//                                    $obj = $event->getData();
//                                    $core_shop_property_logic->updateProductDataProperty($data, $obj);
//                                });
//                    }
//                });
//    }
//
//
//    public function setDefaultOptions(OptionsResolverInterface $resolver) {
//        // Добавляем опции в разрешимый список
//        $defaults =
//                array(
//                    'parent_form' => null,
//        ));
//
//        $resolver->setDefaults($defaults);
//    }

    public function getParent()
    {
        return 'textarea';
    }
    public function getName() {
        return 'config_data';
    }

}
