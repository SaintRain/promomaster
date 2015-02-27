<?php
/**
 * Админский класс для состава заказа предзаказа
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Core\OrderBundle\Admin\Form\Mapper\CompositionFormMapper;
use Knp\Menu\ItemInterface as MenuItemInterface;
use \Sonata\AdminBundle\Admin\AdminInterface;
use Core\LogisticsBundle\Admin\StockAdmin;

class CompositionAdmin extends Admin
{
    
    /**
     * Форма редактирования
     */

    protected function configureFormFields(FormMapper $formMapper)
    {

        $obj       = $this->getSubject(); //объект для формы
        $container = $this->getConfigurationPool()->getContainer();    //контейнер
        $options   = array('obj' => $obj, 'container' => $container, 'orderId' => $this->getRequest()->get('objectId'));

        
        $formMapper->with('Основное')
            ->add('product', 'ajax_entity',
                array(
                'label' => 'Продукт',
                'required' => true,
                //'disabled' => $disabled,
                'properties' => array(
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
                    ),
                    'images' => array(
                        'search' => false,
                        'return' => true,
                    ),
                    'price' => array(
                        'search' => false,
                        'return' => true,
                    ),
                    'OOPBQuantity' => array(
                        'search' => false,
                        'return' => true,
                    ),
                    'OOPBQuantityUpdated' => array(
                        'search' => false,
                        'return' => true,
                    )
                    ,
                    'unitOfMeasure.shortCaptionRu' => array(
                        'search' => false,
                        'return' => true,
                    )
                ),
                'add_to_query' => array(
                    'where' => array(
                        'andWhere' => array(
                            'isEnabled = 1',
                            'orderOnly = 1',
                            'isVisible= 1'
                        )
                    )
                ),
                'template_customise_functions' => 'ProductInSubscribers.html.twig',
                'select2_constructor' => array(// стандартные настройки списка select2
                    'width' => '500px',
                    'placeholder' => 'поиск продукта...',
                    'minimumInputLength' => 3,
                    'formatResult' => 'productFormatResult',
                    'formatSelection' => 'productFormatSelection',
                    'onReset' => 'productOnReset'

                )
            ))
            ->add('quantity', 'text',
                array(
                'required' => true,
                'label' => 'Количество',
                'attr' => ['data-mask' => 'integer', 'style' => 'width:80px']
        ))
        ->add('indexPosition', 'hidden', array('required' => false, 'attr' => array('hidden' => true)))
        ->end();        
    }
}