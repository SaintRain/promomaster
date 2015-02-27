<?php

/**
 * Форма для редактирования характеристик
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PropertyBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;
use Core\PropertyBundle\Entity\Property;
use Core\PropertyBundle\Admin\Form\Mapper\SettingsCategoryPropertyFormMapper;

class PropertyFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);

        $formMapper
                ->with('Основное');
        $this->add('caption', 'text', array('required' => true, 'disabled' => false, 'label' => 'Название',
            'help' => 'Отображаемое название характеристики'));

        $formMapper
                ->add('name', 'text', array('required' => true, 'disabled' => false, 'label' => 'Системное имя',
                    'help' => 'Уникальное системное имя используемое для индетификации характеристики'
                ))
                ->add('editType', 'choice', array('choices' => Property::getEditTypes(true),
                    'label' => 'Тип ввода характеристики',
                    'help' => 'Для типов ввода, которые подразумевают выбор из списка появляется дополнительная вкладка «Данные автоподстановки»'
        ));
        $this->add('description', 'textarea', array(
            'label' => 'Описание',
            'required' => false,
            'help' => 'Небольшое описание, помогающее понять смысл характеристики'
                )
        );

        new SettingsCategoryPropertyFormMapper($formMapper, $options); //включаем настройки, которые лежат в отдельном файле

        $formMapper->with('Категории товаров')
                ->add('categories', 'property_category', array(
                    'class' => 'Core\CategoryBundle\Entity\ProductCategory',
                    'label' => ' ',
                    'property' => 'captionRu',
                    'required' => false,
                    'multiple' => true,
                    'help' => 'Указываем для каких категорий действует характеристика. Если продукт есть в той же категории что и характеристика значит, при редактировании
                        продукта будут отображены поля характеристики. Для каждой категории можно задавать индивидуальные настройки характеристики, для этого следует кликнуть правой кнопкой мыши на категорию и выбрать пункт  «Создать настройку».'
                ))
                ->with('Данные автоподстановки')
                ->add('dataList', 'sonata_type_collection', array(
                    'label' => 'Данные',
                    'type_options' => array('delete' => true),
                    'btn_add' => 'Добавить',
                    'required' => false,
                    'by_reference' => false,
                        //'btn_catalogue' => true,
                        ), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'indexPosition',
                    'help' => 'Список данных подставляется в типы ввода данных для характеристики'
                ))
                ->end();
    }

}
