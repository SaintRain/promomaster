<?php

/**
 * Форма для редактирования настроек характеристик
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PropertyBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;
use Core\PropertyBundle\Entity\Property;
use Core\PropertyBundle\Entity\SettingsCategoryProperty;
use Core\DirectoryBundle\Entity\Repository\UnitOfMeasureRepository;

class SettingsCategoryPropertyFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);

        $em = $options['container']->get('doctrine.orm.entity_manager');

        $formMapper
                ->with('Дефолтные настройки');

        //добавляем категорию, если работаем с конкретной настройкой категории
        if ($options['obj'] instanceof SettingsCategoryProperty) {
            $formMapper->add('category', null, array(
                'property' => 'indentedCaption',
                'class' => 'Core\CategoryBundle\Entity\ProductCategory',
                'required' => false,
                'empty_value' => 'Ничего не выбрано...',
                'label' => 'Для категории'
            ));
            $formMapper->add('property', null, array(
                'property' => 'captionRu',
                'class' => 'Core\PropertyBundle\Entity\Property',
                'required' => false,
                'empty_value' => 'Ничего не выбрано...',
                'label' => 'Для характеристики'
            ));
        }

        $defaultUnitOptions = array(
            'required' => false,
            'property' => 'captionRu',
            'class' => 'Core\DirectoryBundle\Entity\UnitOfMeasure',
            'empty_value' => 'Ничего не выбрано...',
            'label' => 'Единица измерения по умолчанию',
            'help' => 'Единица измерения в которой указывается характеристика. Выводятся только те единицы, которую входят в общую группы.'
        );

        //фильтруем единицы измерения по группе, если это нужно
        if ($options['obj'] instanceof SettingsCategoryProperty && $options['obj']->getProperty() || isset($options['unit_id'])) {

            if ($options['obj']->getProperty()) {
                if ($options['obj']->getProperty()->getDefaultUnit() && $options['obj']->getProperty()->getDefaultUnit()->getGroup()) {
                    $unit_group_id = $options['obj']->getProperty()->getDefaultUnit()->getGroup()->getId();
                }
            } else {
                $defaultUnit = $em->getRepository('CoreDirectoryBundle:UnitOfMeasure')->find($options['unit_id']);
                $unit_group_id = $defaultUnit->getGroup()->getId();
            }

            if (isset($unit_group_id)) {
                $query = $em->createQuery('SELECT u FROM Core\DirectoryBundle\Entity\UnitOfMeasure u WHERE u.group = :group ORDER BY u.indexPosition ASC')
                        ->setParameter('group', $unit_group_id);
                $defaultUnitOptions['query'] = $query;
            }
        }
        $formMapper->add('defaultUnit', 'sonata_type_model', $defaultUnitOptions);


        $formMapper->add('mask', 'text', array(
                    'label' => 'Маска ввода',
                    'help' => 'Можно задать маску ввода. Например, (999) 999-9999, integer, decimal. Все правила ввода можно посмотреть в документации по плагину jquery.inputmask',
                    'required' => false))
                ->add('indexPosition', 'text', array(
                    'label' => 'Индекс позиции',
                    'help' => 'Характеристики с наименьшим индексом позиции выводится первыми',
                    'required' => false,
                    'attr' => ['data-mask' => 'integer']
                ))
                ->add('defaultValue', 'textarea', array(
                    'label' => 'Значение по умолчанию',
                    'help' => 'При создании продукта значение по умолчанию подставляется в поле редактирования характеристики автоматом. Для типа ввода Спискок, Галочки и т.д. дефолтные значения задаются с новой строки.',
                    'required' => false))
                ->add('isRequired', null, array(
                    'label' => 'Обязательное',
                    'help' => 'Если отмечено, тогда в карточке товара обязательно нужно заполнить это поле',
                    'required' => false))
                ->add('isGeneral', null, array(
                    'label' => 'Основная в фильтре',
                    'help' => 'Является ли данная характеристика основной для указанных категорий продуктов. Основных характеристик в каждой категории может быть несколько. Основные характеристики сразу же показываются в фильтрах, если они там используются. Если характеристик много, то в первую очередь на сайте выводятся основные.',
                    'required' => false))
                ->add('isUsedInFilter', null, array(
                    'label' => 'Использовать в фильтрах',
                    'help'=>'Если выставленно, то данная характеристика будет отображена в фильтре выборки на сайте справо (при условии, что для характеристики выставлено "Активно"). Также отображается в форме редактирования.',
                    'required' => false))
                ->add('isEnabled', null, array(
                    'label' => 'Активно',
                    'required' => false,
                    'help'=>'Если активно, то появляется в подробнее продукта на сайте. Также отображается в форме редактирования.'
                    ))
                ->add('isEnabledInYml', null, array(
                    'label' => 'Выводить в YML',
                    'required' => false,
                    'help'=>'Если активно, то характеристика будет включена в YML-файлах, даже, если характеристика не вводится в продукте. Также отображается в форме редактирования.'
                    ))
                
                ->end();
    }

}
