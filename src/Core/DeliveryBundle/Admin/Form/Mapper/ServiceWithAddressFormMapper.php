<?php

/**
 * Форма редактирования доставок (c преопределенными пунктами)
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Doctrine\ORM\EntityRepository;

class ServiceWithAddressFormMapper
{
    public function __construct(FormMapper $formMapper, array $options)
    { 
        $formMapper
                ->with('Основное')
                    ->add('company', 'entity', array(
                                    'class' => 'CoreDeliveryBundle:Company',
                                    'property' => 'captionRu',
                                    'query_builder' => function(EntityRepository $er) {
                                        return $er->createQueryBuilder('c')
                                                ->where('c.name = :companyName')
                                                ->setParameter('companyName', 'shop_default')
                                        ;
                                    },
                                    'attr' => array('class' => 'span5', 'data-extra' => ['companyName']),
                                    'label' => 'Транспортная компания'))
                    ->add('serviceType', 'sonata_type_model', array(
                                    'btn_add' => false,
                                    'empty_value' => 'form.label.empty',
                                    'label' => 'Тип доставки'))
                    ->add('captionRu', null, array(
                                    'label' => 'Название'))
                    ->add('name', null, array(
                                    'attr' => array('class' => 'span5 min200'),
                                    //'empty_value' => 'form.label.empty',
                                    //'choices' => $this->getSysNames(),
                                    'label' => 'Системное имя'))
                    ->add('addresses', null, array(
                                    'label' => 'Пункты',
                                    'required' => true,
                                    
                                    ))
                    ->add('deliveryFrom', 'choice', array(
                                    'empty_value' => 'form.label.empty',
                                    'choices' => array(
                                        0 => 'Склад',
                                        1 => 'Дверь'
                                    ),
                                    'label' => 'Забор груза'))
                    ->add('deliveryTo', 'choice', array(
                                    'empty_value' => 'form.label.empty',
                                    'choices' => array(
                                        0 => 'Склад',
                                        1 => 'Дверь'
                                    ),
                                    'label' => 'Доставка груза'))
                    ->add('buyerType', 'choice', array(
                                    'required' => false,
                                    'empty_value' => 'form.label.buyerType.empty',
                                    'choices'   => $options['buyerTypes'],
                                    //'expanded' => true,
                                    //'multiple' => true,
                                    'label' => 'Ограничения по типу покупателя'))
                    ->add('minSum', 'money', array(
                                    'attr' => array('data-mask'=>'money'),
                                    'label' => 'Мин. суммма заказа',
                                    ))
                    ->add('maxSum', 'money', array(
                                    'attr' => array('data-mask'=>'money'),
                                    'label' => 'Макс. сумма заказа',
                                    ))
                    ->add('isCashOnDelivery', 'choice', array(
                        'choices' => array(0 => 'Нет', 1 => 'Да'),
                        'label' => 'Наложный платеж',
                        'attr' => array('class' => '')
                    ))
                ->end()
        ;
    }

}