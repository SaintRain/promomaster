<?php

/**
 * Админский класс для характеристик
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
use Core\ProductBundle\Admin\Form\Mapper\ProductFormMapper;
use Core\ProductBundle\Admin\Form\Mapper\ServiceProductFormMapper;
use Core\ProductBundle\Entity\Product;
use Core\ProductBundle\Entity\ServiceProduct;
use Core\PropertyBundle\Entity\Property;

class DataPropertyAdmin extends Admin {

    /**
     * Форма редактирования
     */
    protected function configureFormFields(FormMapper $formMapper) {

        $current_route= $this->getConfigurationPool()->getContainer()->get('request')->get('_route');

        $formMapper
                ->with('General');
        //если не ajax-запрос, тогда показываем поле
        if (!$this->isXmlHttpRequest() && ($current_route=='admin_property_dataproperty_edit' || $current_route=='admin_property_dataproperty_create')) {
            $formMapper->add('property', 'sonata_type_model', array('class' => 'Core\PropertyBundle\Entity\Property', 'property' => 'caption', 'disabled' => false));
        }

        $formMapper
                ->add('value', 'text', array('label'=>'Значение характеристики', 'disabled' => false, 'required' => true,
                    'attr' => array('style'=>'width:200px')))
                ->add('name', 'text', array('label'=>'Ключ', 'required' => true,'attr' => array('style'=>'width:150px')))
                ->add('shortDescription', 'text', array('required' => false, 'label'=>'Краткое описание', 'attr' => array('style'=>'width:300px')))
                ->add('articleKey', 'text', array('required' => false, 'label'=>'ЧПУ Статьи из раздела FAQ', 'attr' => array('style'=>'width:200px',)))
                ->add('extraKey3', 'text', array('required' => false, 'label'=>'Дополнительно 3', 'attr' => array('style'=>'width:200px',)))
                ->add('indexPosition', 'hidden', array('required' => false, 'attr'=>array('hidden' => true) ))
                ->add('isEnabled', null, array('label'=>'Активно', 'required' => false))
                ->end();
    }

    public function isXmlHttpRequest() {
        $container = $this->getConfigurationPool()->getContainer();
        return $container->get('request')->isXmlHttpRequest() || $container->get('request')->get('_xml_http_request');
    }

    /**
     * Отображение списка заказов
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('property.caption', null)
                ->addIdentifier('value', null, array('label'=>'Значение'))
                ->addIdentifier('name', null, array('label'=>'Ключ'))
                ->add('isEnabled', null, array('label'=>'Активное', 'sortable' => true,
                    'editable' => true));
    }

    /**
     * Настройки фильтра для списка заказов
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('property', null, array(), null, array('property' => 'caption', 'multiple' => true))
                ->add('value', null)
                ->add('isEnabled', null)
        ;
    }

}