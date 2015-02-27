<?php

/**
 * Админский клас для индивидуальных настроек  характеристик под категории
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PropertyBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\DirectoryBundle\Admin\Form\Mapper\UnitOfMeasureGroupFormMapper;
use Core\PropertyBundle\Admin\Form\Mapper\SettingsCategoryPropertyFormMapper;

class SettingsCategoryPropertyAdmin extends Admin {

    /**
     * Переписываем шаблон
     * @param type $name
     * @return string
     */
    public function getTemplate($name) {
        switch ($name) {
            case 'delete':
                return 'CorePropertyBundle:Admin\Form\SettingsCategoryProperty:delete.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {

        //контейнер
        $options = [
            'container' => $this->getConfigurationPool()->getContainer(),
            'obj' => $this->getSubject(),
            'class' => $this->getClass()
        ];

        if ($this->getConfigurationPool()->getContainer()->get('request')->get('unit_id')) {
            $options['unit_id'] = $this->getConfigurationPool()->getContainer()->get('request')->get('unit_id');
        }

        new SettingsCategoryPropertyFormMapper($formMapper, $options);
    }

}