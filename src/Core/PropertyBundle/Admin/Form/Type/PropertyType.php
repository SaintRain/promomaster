<?php

/**
 * Новыйтип формы для характеристик
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PropertyBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\DataTransformer\ChoicesToValuesTransformer;
use Core\PropertyBundle\Admin\Form\DataTransformer\PropertyTransformer;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Doctrine\Common\Collections\ArrayCollection;

class PropertyType extends AbstractType {

    private $core_shop_property_logic;  //юизнесс логика для работы с категориями

    public function __construct($core_shop_property_logic) {
        $this->core_shop_property_logic = $core_shop_property_logic;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $core_shop_property_logic = $this->core_shop_property_logic;
        $builder->addEventListener(FormEvents::PRE_BIND, function(FormEvent $event) use ($core_shop_property_logic, $options) {//PRE_BIND || POST_BIND
            $data = $event->getData();
            //чтобы не было ошибки формата, передаём NULL а сохранение делаем в сервисе
            $event->setData(null);
            $options['parent_form']->getFormBuilder()->addEventListener(FormEvents::POST_BIND, function(FormEvent $event) use ($core_shop_property_logic, $data) {//PRE_BIND || POST_BIND
                $obj = $event->getData();
                $core_shop_property_logic->updateProductDataProperty($data, $obj);
            });
        });
    }

    public function buildView(FormView $view, FormInterface $form, array $options) {
        $obj = $view->vars['sonata_admin']['admin']->getSubject();
        list($view->vars['properties'], $view->vars['categories'], $view->vars['pdp_match']) = $this->core_shop_property_logic->getDataForDynamicPropertyFields($obj, ['needForEditForm' => true]);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        // Добавляем опции в разрешимый список
        $defaults = array(
                    'parent_form' => null,
                    'by_reference' => false,
                    'type_options' => array(
                        'auto_initialize' => false,
        ));

        $resolver->setDefaults($defaults);
    }

    public function getParent() {
        return 'form';
    }

    public function getName() {
        return 'property';
    }

}
