<?php

/**
 * Админский класс для анализа прайсов производителя
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class SupplierPriceAnalysisAdmin extends Admin
{
    /**
     * Дефолтные настройки для списка
     */
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'id'
    );

    protected $translationDomain = 'CoreLogisticsBundle'; // дефолтная группа (домен) для перевода


    /**
     * Переписываем админский метод toString для нормального отображения хлебных крошек
     */
    public function toString($object)
    {
        $text = null === $object->getId() ? 'Добавление нового прайса для анализа' : ' Анализ прайса ' . $object->getId();
        return $text;
    }


    public function createQuery($context = 'list') {
        $query = parent::createQuery($context);
        $query
            ->select('partial '.$query->getRootAlias().'.{id, createdDateTime},
            priceFile,
            partial supplier.{id,caption}
            ')
            ->leftJoin($query->getRootAlias() . '.priceFile', 'priceFile')
            ->leftJoin($query->getRootAlias() . '.supplier', 'supplier');
        return $query;
    }

    public function postPersist($object)
    {
        //ставим метку для загрузки прайса
        $cache =  $this->getConfigurationPool()->getContainer()->get('beryllium_cache');
        $cache->set('needToParceAnalysisPrices', $object->getId(), 3600);

        //запускаем крон асинхронно
        $this->configurationPool->getContainer()->get('core_common_process')
            ->runAppConsole('logistics:supplier:price_analysis');
    }

    public function getTemplate($name)
    {

        switch ($name) {
            case 'edit':
                return 'CoreLogisticsBundle:Admin\SupplierPriceAnalysis:edit.html.twig';
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
                array('_controller' => 'CoreLogisticsBundle:AjaxSupplierPriceAnalysisAdmin:setBasePriceForProductsFromPrice'))
            ->add('disableProduct', 'disableProduct',
                array('_controller' => 'CoreLogisticsBundle:AjaxSupplierPriceAnalysisAdmin:disableProduct'))
->add('enableProduct', 'enableProduct',
                array('_controller' => 'CoreLogisticsBundle:AjaxSupplierPriceAnalysisAdmin:enableProduct'))
->add('setMrcPriceForProductsFromPrice', 'setMrcPriceForProductsFromPrice',
                array('_controller' => 'CoreLogisticsBundle:AjaxSupplierPriceAnalysisAdmin:setMrcPriceForProductsFromPrice'))

            ->add('getUpdateQuantityProgress', 'getUpdateQuantityProgress',
            array('_controller' => 'CoreLogisticsBundle:AjaxSupplierPriceAnalysisAdmin:getUpdateQuantityProgress'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', 'string', array('label' => 'ID'))
            ->addIdentifier('createdDateTime', null, ['label' => 'Загружен'])
            ->addIdentifier('supplier', null, ['associated_property' => 'caption', 'label' => 'Поставщик'])
            ->add('price', null, [
                'label' => 'Прайс',
                'template' => 'CoreLogisticsBundle:Admin\SupplierPriceAnalysis\list:list_price_analysis_price.html.twig'
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
                'required' => true,
                'disabled' => $priceFileDisabled,
                'label' => 'Прайс .xls',
                'hide_field' => array('all'),       // Скрывает доп. поля
                'parent_form' => $formMapper,       // Передача текущего formMapper'a (required)
                //   'width' => '500px',                 // Ширина таблицы, можно задавать в px и в %
                'attr' => array(
                    'multiple' => false,            // Если надо ограничится одним файлом
                )
            ))
            ->add('supplier', null, [
                'label' => 'Поставщик',
                'property' => 'caption',
                'required' => true,
                'empty_value' => '',
                 'disabled' => $priceFileDisabled
            ])


            ->end();

    }
}
