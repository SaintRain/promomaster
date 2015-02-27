<?php
/**
 * Админский класс для редактирования настроек  анализа прайсов
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ManufacturerBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\ManufacturerBundle\Entity\PriceAnalysisSettings;

class PriceAnalysisSettingsAdmin extends Admin
{

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper
            ->add('columnCaption', null,
                ['label' => 'Буква колонки из прайса', 'required' => true, 'attr' => ['style' => 'width:100%']])
            ->add('fieldNameFromProductEntity', 'choice',
                [
                'empty_value'=>'',
                'choices' => PriceAnalysisSettings::$FIELD_NAMES,
                'label' => 'Название поля из сущности продукта',
                'required' => true,
                'attr' => ['style' => 'width:250px']
            ])
            ->add('fieldType', 'choice',
                [
                'empty_value'=>'',
                'choices' => PriceAnalysisSettings::$FIELD_TYPES,
                'label' => 'Тип поля',
                'required' => false,
                'attr' => ['style' => 'width:250px']
            ])

            ->add('indexPosition', 'hidden',
                array('required' => false, 'attr' => array('hidden' => true)))
            ->end();
    }
}