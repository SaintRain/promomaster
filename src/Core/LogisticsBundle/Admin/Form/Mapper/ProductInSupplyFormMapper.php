<?php

/**
 * Форма для редактирования товарных позиций в поставке
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;
use Core\LogisticsBundle\Entity\Supply;
use Core\DirectoryBundle\Entity\Repository\CurrencyRepository;

class ProductInSupplyFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);

        $obj = $options['admin']->getParentFieldDescription()->getAdmin()->getSubject();
        //если поставленно на склад, тогда делаем не редактируемыми поля
        if ($obj->getId() && $obj->getStatus() && in_array($obj->getStatus()->getName(), [Supply::suppliedStatusName, Supply::onTheWayStatusName])) {
            $productsDisabled = true;
        } else {
            $productsDisabled = false;
        }


        $formMapper->with('Основное')
                ->add('product', 'ajax_entity', array(
                    'label' => 'Продукт',
                    'required' => true,
                    'disabled' => $productsDisabled,
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
                ->add('gtdNumber', null, array(
                    'required' => false,
                    'disabled' => $productsDisabled,
                    'label' => 'Номер ГТД',
                    'attr' => ['data-mask' => 'integer', 'style' => 'width:100px']
                ))
            ->add('gtdCurrency', null, array(
                'query_builder' => function (CurrencyRepository $repository) {
                    return $repository->createQueryBuilder('s')->where('s.isEnabled = 1');
                },
                'disabled' => $productsDisabled,
                'required' => true,
                'property' => 'captionRu',
                'label' => 'Валюта ГТД'
            ))
            ->add('OOPBCurrencyRateAdditive', null,
                ['required' => false, 'label' => 'Надбавка к курсу',   'disabled' => $productsDisabled, 'attr' => ['data-mask' => 'money', 'style' => 'width:100px']]
            )
                ->add('isOOPBCurrencyRateAdditiveInPercent', null,
                    ['required' => false,  'disabled' => $productsDisabled, 'label' => 'Надбавка в процентах'])

                ->add('priceInGtdCurrency', 'money', array(
                    'required' => true,
                    'disabled' => $productsDisabled,
                    'label' => 'Цена поставки в валюте ГТД',
                    'currency' => false,
                    'attr' => ['data-mask' => 'money', 'style' => 'width:100px']
                ))
                ->add('priceInGeneralCurrency', 'money', array(
                    'required' => true,
                    'disabled' => $productsDisabled,
                    'label' => 'Цена поставки',
                    'attr' => ['data-mask' => 'money', 'style' => 'width:100px']
                ))
                ->add('costPriceForOneUnit', 'money', array(
                    'required' => true,
                    'read_only' => true,
                    'label' => 'Себестоимость',
                    'attr' => ['data-mask' => 'money', 'style' => 'width:100px']
                ))
                ->add('quantity', 'text', array(
                    'required' => true,
                    'disabled' => $productsDisabled,
                    'label' => 'Количество',
                    'attr' => ['data-mask' => 'integer', 'style' => 'width:100px']
                ))                                
                ->end();
    }

}
