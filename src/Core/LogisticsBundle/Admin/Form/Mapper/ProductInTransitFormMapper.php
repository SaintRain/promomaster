<?php

/**
 * Форма для редактирования товарных позиций в транзите
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class ProductInTransitFormMapper extends LanguageSwitcherFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        parent::__construct($formMapper, $options);

        $formMapper->with('Основное')
                ->add('product', 'ajax_entity', array(
                    'label' => 'Продукт',
                    'required' => true,
                    'disabled' => true,
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
                ))
                ->add('quantity', 'text', array(
                    'required' => true,
                    'disabled' => true,
                    'label' => 'Количество',
                    'attr' => ['style' => 'width:100px', 'data-mask'=>'integer']
                ))
                ->add('serialsText', 'text', array(
                    'required' => true,
                    'disabled' => true,
                    'label' => 'Серийники',
                    'attr' => ['style' => 'height:150px;width:100%']
                ))
                ->end();
    }

}
