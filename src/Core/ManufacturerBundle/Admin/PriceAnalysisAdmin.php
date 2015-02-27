<?php

/**
 * Админский класс для анализа прайсов производителя
 *
 * @author  Sergeev A.M.
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
use Sonata\AdminBundle\Route\RouteCollection;

class PriceAnalysisAdmin extends Admin
{
    /**
     * Дефолтные настройки для списка
     */
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'id'
    );

    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object)
    {
        $text = null === $object->getId() ? 'Добавление нового прайса для анализа' : ' Анализ прайса ' . $object->getId();
        return $text;
    }


    public function postPersist($object)
    {
        //берем количество из прайса
        $logic = $this->getConfigurationPool()->getContainer()
            ->get('core_manufacturer_price_analysis_logic')->setPriceAnalysis($object);
        $logic->updatePriceHistory($object);
        $logic->updateQuantity();

    }

    public function getTemplate($name)
    {

        switch ($name) {
            case 'edit':
                return 'CoreManufacturerBundle:Admin\Form\PriceAnalysis:edit.html.twig';
            case 'list':
                return 'ApplicationSonataAdminBundle:CRUD:list_top.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->add('setBasePriceForProductsFromPrice', 'setBasePriceForProductsFromPrice',
                array('_controller' => 'CoreManufacturerBundle:AjaxPriceAnalysisAdmin:setBasePriceForProductsFromPrice'))
            ->add('disableProduct', 'disableProduct',
                array('_controller' => 'CoreManufacturerBundle:AjaxPriceAnalysisAdmin:disableProduct'))
->add('enableProduct', 'enableProduct',
                array('_controller' => 'CoreManufacturerBundle:AjaxPriceAnalysisAdmin:enableProduct'))
->add('setMrcPriceForProductsFromPrice', 'setMrcPriceForProductsFromPrice',
                array('_controller' => 'CoreManufacturerBundle:AjaxPriceAnalysisAdmin:setMrcPriceForProductsFromPrice'))
            
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', 'string', array('label' => 'ID'))
            ->addIdentifier('createdDateTime', null, ['label' => 'Загружен'])
            ->addIdentifier('manufacturer', null, ['associated_property' => 'captionRu', 'label' => 'Производитель'])
            ->add('price', null, [
                'label' => 'Прайс',
                'template' => 'CoreManufacturerBundle:Admin\List:list_price_analysis_price.html.twig'
            ])
            ->add('_action', 'actions', array(
                'label' => 'Действия',
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(
                        'ask_confirmation' => true
                    )
                )
            ));
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        //объект для формы
        if (!$obj = $this->getSubject()) {
            $obj = $this->getNewInstance();
        }

        //формируем опции для формы
        $options = array(
            'obj' => $obj,
            'container' => $this->getConfigurationPool()->getContainer(),
        );

        if ($obj->getId()) {
            $priceFileDisabled=true;
        }
        else {
            $priceFileDisabled=false;
        }
        
        $formMapper
            // ->add('createdDateTime', null, ['label' => 'Дата создания'])
            ->add('priceFile', 'multiupload_document', array(
                'disabled' => $priceFileDisabled,
                'label' => 'Прайс .xls',
                'hide_field' => array('all'),       // Скрывает доп. поля
                'parent_form' => $formMapper,       // Передача текущего formMapper'a (required)
                //   'width' => '500px',                 // Ширина таблицы, можно задавать в px и в %
                'attr' => array(
                    'multiple' => false,            // Если надо ограничится одним файлом
                )
            ))
            ->add('manufacturer', null, [
                'label' => 'Производитель',
                'property' => 'captionRu',
                'required' => true,
                'empty_value' => ''
            ])
            ->end();

    }
}
