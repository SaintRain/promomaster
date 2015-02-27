<?php

/**
 * Форма для редактирования товаров в заказе
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class CompositionFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);

        $formMapper->with('Основное')
                ->add('product', 'ajax_entity', array(
                    'label' => 'Продукт',
                    'required' => true,
                    'properties' => array(// поля по которым производится поиск и участвующие в построении списка, если 2 и более полей, то id по дефолту скрывается (required)

                        'id' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'full',
                        ),
                        'sku' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'left',
                        ),
                        'article' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'left',
                        ),
                        'captionRu' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'left',
                        ),
                        'images' => array(
                            'search' => false,
                            'return' => true,
                        ),
                        'price' => array(
                            'search' => false,
                            'return' => true,
                        ),
                        'supplier.id' => array(
                            'search' => false,
                            'return' => true,
                        )
                    ),
                    'template_customise_functions' => 'productInOrder.html.twig',
                    'select2_constructor' => array(// стандартные настройки списка select2
                        'width' => '350px',
                        'placeholder' => 'поиск продукта...',
                        'minimumInputLength' => 3,
                        'formatResult' => 'productFormatResult',
                        'formatSelection' => 'productFormatSelection',
                        'onReset' => 'productOnReset'
                    ),
                    'route_edit' => 'admin_core_product_commonproduct_edit'
                ))
                ->add('price', 'money', array(
                    'required' => true,
                    'label' => 'Базовая цена',
                    'read_only' => true,
                    'attr' => ['data-mask' => 'money', 'style' => 'width:80px']
                ))
                ->add('quantity', 'text', array(
                    'required' => true,
                    'label' => 'Количество',
                    'attr' => ['data-mask' => 'integer', 'style'=>'width:60px']
        ));

        //скрываем дополнительные поля, если заказ еще не создан        
        if ($options['orderId'] || ($options['obj'] && $options['obj']->getId())) {
            $formMapper
                    ->add('discountValue', 'text', array(
                        'required' => false,
                        'read_only' => true,
                        'label' => '- Скидка',
                        'attr' => ['style' => 'width:50px']
                    ))
                    ->add('ndsSum', 'money', array(
                        'required' => false,
                        'read_only' => true,
                        'label' => '+ НДС',
                         'attr' => ['data-mask' => 'money', 'style' => 'width:70px']
                    ))
                    ->add('cost', 'money', array(
                        'required' => false,
                        'label' => 'Итого',
                        'read_only' => true,
                        'attr' => ['data-mask' => 'money', 'style' => 'width:90px']
                    ))
                    ->add('units', 'unit_serial_number', ['label' => 'Серийники', 'required' => false,
                        'parent_form' => $formMapper])
                ->add('defaultSupplier', null, array(
                    'required' => false,
                    'empty_value' => '',
                    'property' => 'caption',
                    'attr' => ['style' => 'min-width:170px; max-width:170px'],
                    'label' => 'Деф. Поставщик',
                    'help'=>'Необходим при автоматическом создании поставок'
                ))
//                ->add('getDefaultSupplier', null, array(
//                    'required' => false,
//                    'label' => 'Деф. Поставщик',
//                    'attr' => ['style' => 'width:100px']
//                ))

            ;
        }



//
//    /**
//     * Флаг определяющий, что значение скидки указано в процентах, иначе фиксировано в дефолтной валюте
//     * @ORM\Column(type="boolean")
//     */
//    private $isDiscountValueInPercent;
        $formMapper->add('indexPosition', 'hidden', array('required' => false, 'attr' => array('hidden' => true)))
                ->end();
    }

}
