<?php

/**
 * Форма для редактирования поставок
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

use Core\LogisticsBundle\Entity\Supply;

class SupplyFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);
        $obj = $options['obj'];

        //если поставленно на склад, тогда делаем не редактируемыми поля
        if ($obj->getId() && $obj->getStatus() && in_array($obj->getStatus()->getName(), [Supply::suppliedStatusName, Supply::onTheWayStatusName])) {
            $productsDisabled = true;
            $disabled_stock = true;
        } else {
            $productsDisabled = false;
            $disabled_stock = false;
        }

        //определяем возможность смены статуса
        if ($obj->getStatus() && $obj->getStatus()->getName() == Supply::suppliedStatusName) {
            $disabledStatus = true;
        } else {
            $disabledStatus = false;
        }

        $formMapper->with('Основное');
        if ($obj->getId()) {
            $formMapper->add('id', 'text', array(
                'required' => false,
                'disabled' => true,
                'label' => ' '));
        }

//        $formMapper->add('id', 'text', array(
//            'required' => false,
//            'disabled' => true,
//            'label' => 'ID'));

        //скрываем статус формируется, если статус стал выше
        if ($obj->getIsProductUnitsWasCreated()) {
            $whereSQL = " WHERE  s.name!='" . Supply::formedStatusName . "'";
        } else {
            $whereSQL = '';
        }

        $formMapper->add('status', 'sonata_type_model', array(
                    'property' => 'captionRu',
                    'required' => true,
                    'disabled' => $disabledStatus,
                    'label' => 'Статус',
                    'btn_add' => false,
                    'query' => $options['container']
                    ->get('doctrine.orm.entity_manager')
                    ->createQuery('SELECT s FROM CoreLogisticsBundle:SupplyStatus s ' . $whereSQL . ' ORDER BY s.indexPosition ASC')
                ))
                ->add('isVirtual', null, array(
                    'disabled' => $productsDisabled,
                    'label' => 'Виртуальная поставка',
                    'help' => 'Виртуальная поставка нужна, чтобы добавить на склад виртуальный товар, который продаётся под заказ'
                ))
                ->add('dateTime', 'date', array(
                    'required' => true,
                    'label' => 'Дата поставки',
                    'attr' => ['class' => 'datepicker'],
                    'widget' => 'single_text',
                    //'view_timezone' => $options['container']->getParameter('default_timezone'),
                    'format' => 'dd.MM.yyyy'))
                ->add('supplier', null, array(
                    'required' => false,
                    'empty_value' => '',
                    'property' => 'caption',
                    'label' => 'Поставщик',
                ))
                ->add('seller', null, array(
                    'required' => true,
                    'property' => 'caption',
                    'label' => 'Покупатель',
                ))
                ->add('stock', null, array(
                    'required' => true,
                    'disabled' => $disabled_stock,
                    'property' => 'captionRu',
                    'label' => 'Принимающий склад',
                ))
                ->add('countryOfSupply', null, array(
                    'required' => false,
                    'property' => 'captionRu',
                    'label' => 'Страна поставки',
                ))
                ->add('countryOfOrigin', null, array(
                    'required' => false,
                    'property' => 'captionRu',
                    'label' => 'Страна происхождения',
                ))
                ->add('gtdNumber', null, array(
                    'required' => false,
                    'label' => 'Номер ГТД',
                    'attr' => ['data-mask' => '99999999/999999/9999999']
                ))
                ->add('note', 'textarea', array(
                    'required' => false,
                    'label' => 'Примечания'
                ))
                ->with('Товары в поставке')
                ;


        $formMapper->add('products', 'sonata_type_collection', array(
                    'type_options' => array('delete' => !$productsDisabled),
                    'cascade_validation' => true,
                    'required' => true,
                    'by_reference' => false,
                    'btn_add' => (!$productsDisabled) ? 'Добавить товар' : false,
                    'label' => 'Товары'), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'indexPosition'
                        )
                )
                ->With('Дополнительные расходы')
                ->add('additionalCosts', 'sonata_type_collection', array(
                    'cascade_validation' => true,
                    'required' => false,
                    'by_reference' => false,
                    'btn_add' => 'Добавить расход' ,
                    'label' => 'Расходы'), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'indexPosition'
                        )
                )
                ->end();
    }

}
