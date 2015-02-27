<?php

/**
 * Форма для редактирования статусов единиц товаров
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;
use Core\LogisticsBundle\Entity\UnitSerials;

class UnitInStockFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);

        $obj = $options['obj'];
        if ($obj && $obj->getIsCouldBeSold()) {
            $disabled_defect = false;
            $stock_help = '';
        } else {
            $disabled_defect = false;
            $stock_help = 'Чтобы вернуть эту проданную позицию просто выберите склад. Также заказ, в котором была продана единица не должен иметь статус Отгружен';
        }

        //проставляя склад для проданной единицы мы делаем возврат
        if (!$obj->getIsCouldBeSold() && !$obj->getIsWithDefect()) {
            $disabled_stock = false;
            $disabled_defect = false;
        } else {
            $disabled_stock = false;
        }

        //нельзя проставить для виртуальной позиции, что она списанная
        if ($options['obj']->getIsVirtual()) {
            $disabled_defect = true;
        }

        $formMapper->with('Основное')
                ->add('id', 'text', array(
                    'disabled' => true,
                    'label' => 'ID'))
                ->add('supply.id', 'text', array(
                    'required' => true,
                    'disabled' => true,
                    'label' => 'Поставка'))
                ->add('product', 'ajax_entity', array(
                    'label' => 'Продукт',
                    'read_only' => true,
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
                        )),
                    'template_customise_functions' => 'product.html.twig',
                    'select2_constructor' => array(// стандартные настройки списка select2
                        'width' => '500px',
                        'placeholder' => 'поиск продукта...',
                        'minimumInputLength' => 3,
                        'formatResult' => 'productFormatResult',
                        'formatSelection' => 'productFormatSelection',
                    )
        ));

        $serials = [];
        foreach ($options['obj']->getSerials() as $s) {
            $serials[$s->getId()] = $s->getValue();
        }

//        $formMapper->add('composition.id', 'text', array(
//                    'required' => false,
//                    'disabled' => true,
//                    'label' => 'Заказ'));


        if (!$obj->getProduct()->getIsNoSerials()) {
            $formMapper->add('serials', 'sonata_type_collection', array(
//            'type'=>'sonata_type_collection',
                'required' => false,
                'by_reference' => false,
//                    'disabled' => true,
//                    'allow_add' => true,
//                    'allow_delete' => true,
//                    'data' => $serials,
                'label' => 'MAC-адреса или Серийные номера')
                    , array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable' => 'indexPosition',
                'help' => 'Указывается при оформлении конкретного заказа',
                'attr' => ['class' => 'span2']
            ));
        }
        $formMapper->add('seller', null, array(
                    'disabled' => true,
                    'property' => 'caption',
                    'required' => false,
                    'label' => 'Продавец',
                ))
                ->add('stock', null, array(
                    'disabled' => $disabled_stock,
                    'property' => 'captionRu',
                    'required' => false,
                    'label' => 'Склад',
                    'help' => $stock_help
                ))
                ->add('productInSupply.gtdNumber', null, array(
                    'disabled' => true,
                    'required' => false,
                    'label' => 'Номер ГТД'
                ))
                ->add('isCouldBeSold', null, array(
                    'disabled' => true,
                    'required' => false,
                    'label' => 'Можно продать'
                ))
                ->add('isWithDefect', 'unit_in_stock_defect', array(
                    'disabled' => $disabled_defect,
                    'required' => false,
                    'label' => 'Списано'
                ))
                ->add('isVirtual', null, array(
                    'disabled' => true,
                    'required' => false,
                    'label' => 'Виртуальная единица'
                ))
                ->add('comments', 'textarea', array(
                    'required' => false,
                    'label' => 'Комментарий'
                ))
                ->end();
    }

}
