<?php

/**
 * Форма дополнительных полей
 * для генерации накладной
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\ChoiceList\ObjectChoiceList;

/**
 * @see http://symfony.com/doc/current/book/forms.html#using-a-form-without-a-class
 * @link http://symfony.com/doc/current/book/forms.html#using-a-form-without-a-class Using a Form without a Class
 * @link https://wiki.waze.com/wiki/%D0%A2%D0%B8%D0%BF%D1%8B_%D0%B4%D0%BE%D1%80%D0%BE%D0%B3_%D0%B8_%D0%BD%D0%B0%D0%B7%D0%B2%D0%B0%D0%BD%D0%B8%D1%8F_%D1%83%D0%BB%D0%B8%D1%86
 */
class WaybillDescriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $data = $builder->getData();
        $isFullAddress = ($data['deliveryTo']) ? true : false;
        $builder
                ->add('departureCity', 'ajax_entity', [
                        'label' => 'Город отправителя',
                        'attr' => ['class'=> 'span12'],
                        'required' => true,
                        'class' => 'Core\DirectoryBundle\Entity\City',
                        'constraints' => array(
                            new Assert\NotBlank(array(
                                'groups' => ['dpd', 'terminal', 'address', 'sellerAddress']
                            ))
                        ),
                        'properties' => [
                            'id' => array(
                                'search' => true,
                                'return' => true,
                                'entry' => 'full',
                            ),
                            'name' => array(
                                'search' => true,
                                'return' => true,
                                'entry' => 'left',
                            ),
                            'area' => array(
                                'search' => false,
                                'return' => true,
                                'entry' => 'left',
                            ),
                          ],
                        'select2_constructor' => array(
                            'width' => 'resolve',
                            'placeholder' => 'Введите название города',
                            'minimumInputLength' => 1),
                    ])           
                ->add('sellerStreetAbbr', 'choice', array(
                    'empty_value' => 'Выбрать',
                    'choices' => array(
                        'ул'   => 'Улица',
                        'ш'    => 'Шоссе',
                        'пр-т'  => 'Проспект',
                        'пер.'  => 'Переулок',
                        'б-р'   => 'Бульвар',
                        'пр-д'  => 'Проезд',
                        'пл'   => 'Площадь',
                        'наб'  => 'Набережная',
                        'туп'  => 'Тупик',
                        'ал'   => 'Аллея'
                    ),
                    'attr' => array('class' => 'control-label waybill-label with-select'),
                    'required' => $isFullAddress,
                    'constraints' => array(
                        new Assert\NotBlank(array(
                            'groups' => ['sellerAddress', 'dpd']
                        ))
                    )
                ))
                ->add('sellerStreet','text', array(
                   'label' => 'Улица',
                    'attr' => ['class' => 'span12'],
                    'required' => $isFullAddress,
                    'constraints' => array(
                        new Assert\NotBlank(array(
                            'groups' => ['sellerAddress', 'dpd']
                        ))
                    )
                ))
                ->add('sellerHouse','text', array(
                   'attr' => ['class' => 'span12'],
                   'label' => 'Дом',
                   'required' => $isFullAddress,
                   'constraints' => array(
                        new Assert\NotBlank(array(
                            'groups' => ['sellerAddress', 'dpd']
                        )),
                        new Assert\Regex(array(
                            'pattern' => "/^[а-яА-Я0-9]+$/u",
                            'message' => 'Пожалуйста, используйте только цифры и симфолы киррилицы',
                            'groups' => ['sellerAddress', 'dpd']
                        ))
                    )
                ))
                ->add('sellerPlacementType', 'choice', array(
                    'empty_value' => 'Выбрать',
                    'choices' => array(
                        'flat'   => 'Квартира',
                        'office'   => 'Офис'
                    ),
                    'attr' => array('class' => 'control-label waybill-label with-select'),
                    'required' => $isFullAddress,
                    'constraints' => array(
                        new Assert\NotBlank(array(
                            'groups' => ['sellerAddress']
                        ))
                    )
                ))
                ->add('sellerPlacement', 'text', array(
                    'attr' => ['class' => 'span12'],
                    'required' => $isFullAddress,
                    'constraints' => array(
                        new Assert\NotBlank(array(
                            'groups' => ['sellerAddress']
                        )),
                        new Assert\Regex(array(
                            'pattern' => "/^[а-яА-Я0-9]+$/u",
                            'message' => 'Пожалуйста, используйте только цифры и симфолы киррилицы',
                            'groups' => ['sellerAddress', 'dpd']
                        ))
                    )
                ))
                ->add('sellerAddr', 'textarea', array(
                    'attr' => ['class' => 'span12', 'data-addr' => $options['sellerAddress']],
                    'label' => 'Адрес',
                    'disabled' => true,
                    'constraints' => array(
                        new Assert\NotBlank(array(
                            'groups' => ['address', 'terminal', 'sellerAddress', 'dpd']
                        ))
                    )
                ))
                ->add('service', 'choice', array(
                    'choices' => $options['internalCodes'],
                    'label' => 'Тариф',
                    'required' => true,
                    'attr' => array('class' => 'with-select span12'),
                    'constraints' => array(
                        new Assert\NotBlank(array(
                            'groups' => ['address', 'terminal', 'sellerAddress', 'dpd']
                        ))
                    ),
                ))
                ->add('extraServices','choice', array(
                   'choices' => $options['extraServices'],
                   'required' => false,
                   'multiple' => true,
                   'label' => 'Доп. услуги',
                   'attr' => array('class' => 'with-select span12')
                ))
                ->add('comment','textarea', array(
                    'required' => false,
                    'label' => 'Комментарий',
                    'attr' => array('class' => 'span12')
                ))
                ->add('terminalTo','choice',array(
                    'empty_value' => 'Необходимо выбрать',
                    'choices' => $options['affiliate']['stdObj'],
                    'choice_list' => new ObjectChoiceList($options['affiliate']['stdObj'], null, [], null, 'id'),
                    //'property' => 'captionRu',
                    'required' => !$isFullAddress,
                    'label' => 'Терминал выдачи',
                    'attr' => ['data-extra' => ['cityCode'], 'class' => 'span12 with-select'],
                    'constraints' => array(
                        new Assert\NotBlank(array(
                            'groups' => ['terminal', 'dpd']
                        )))
                ))
                ->add('streetAbbr', 'choice', array(
                    'empty_value' => 'Выбрать',
                    'choices' => array(
                        'ул'   => 'Улица',
                        'ш'    => 'Шоссе',
                        'пр-т'  => 'Проспект',
                        'пер.'  => 'Переулок',
                        'б-р'   => 'Бульвар',
                        'пр-д'  => 'Проезд',
                        'пл'   => 'Площадь',
                        'наб'  => 'Набережная',
                        'туп'  => 'Тупик',
                        'ал'   => 'Аллея'
                    ),
                    'attr' => array('class' => 'control-label waybill-label with-select'),
                    'required' => $isFullAddress,
                    'constraints' => array(
                        new Assert\NotBlank(array(
                            'groups' => ['address', 'dpd']
                        ))
                    )
                ))
                ->add('street','text', array(
                   'label' => 'Улица',
                    'attr' => ['class' => 'span12'],
                    'required' => $isFullAddress,
                    'constraints' => array(
                        new Assert\NotBlank(array(
                            'groups' => ['address', 'dpd']
                        ))
                    )
                ))
                ->add('house','text', array(
                   'attr' => ['class' => 'span12'],
                   'label' => 'Дом',
                   'required' => $isFullAddress,
                   'constraints' => array(
                        new Assert\NotBlank(array(
                            'groups' => ['address', 'dpd']
                        )),
                        new Assert\Regex(array(
                            'pattern' => "/^[а-яА-Я0-9]+$/u",
                            'message' => 'Пожалуйста, используйте только цифры и симфолы киррилицы',
                            'groups' => ['address', 'dpd']
                        ))
                    )
                ))
                ->add('placementType', 'choice', array(
                    'empty_value' => 'Выбрать',
                    'choices' => array(
                        'flat'   => 'Квартира',
                        'office'   => 'Офис'
                    ),
                    'attr' => array('class' => 'control-label waybill-label with-select'),
                    'required' => $isFullAddress,
                    'constraints' => array(
                        new Assert\NotBlank(array(
                            'groups' => ['address']
                        ))
                    )
                ))
                ->add('placement', 'text', array(
                    'attr' => ['class' => 'span12'],
                    'required' => $isFullAddress,
                    'constraints' => array(
                        new Assert\NotBlank(array(
                            'groups' => ['address']
                        )),
                        new Assert\Regex(array(
                            'pattern' => "/^[а-яА-Я0-9]+$/u",
                            'message' => 'Пожалуйста, используйте только цифры и симфолы киррилицы',
                            'groups' => ['address', 'dpd']
                        ))
                    )
                ))
                ->add('buyerAddr', 'textarea', array(
                    'attr' => ['class' => 'span12', 'data-addr' => $options['buyerAddress']],
                    'label' => 'Адрес',
                    'disabled' => true,
                    'constraints' => array(
                        new Assert\NotBlank(array(
                            'groups' => ['address', 'terminal', 'sellerAddress', 'dpd']
                        ))
                    )
                ))
                ->add('sizesOfBox', 'collection', array(
                    'required' => true,
                    'type' => 'boxes_in_order',
                    'allow_add' => true,
                    'allow_delete' => true
                ))
                ->add('deliveryCity', 'hidden',  ['required' => true])
                ->add('company', 'hidden', ['required' => true])
                ->add('deliveryMethodId', 'hidden', ['required' => true])
                ->add('sellerId', 'hidden', ['required' => true])
                ->add('storeId', 'hidden', ['required' => true])
                ->add('deliveryCityId', 'hidden', ['required' => true])
                ->add('deliveryAddr', 'hidden', ['required' => true])
                ->add('contragentId', 'hidden', ['required' => true])
                ->add('recipientEmail', 'hidden', ['required' => true])
                ->add('recipientFio', 'hidden', ['required' => true])
                ->add('recipientPhone', 'hidden', ['required' => true])
                ->add('recipientCompany', 'hidden', ['required' => false])
        ;
        
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) use ($options) {
            $data = $event->getData();
            $form = $event->getForm();
            if ($data['company'] == 'cdek') {
                $attr = array('class' => 'with-select span12', 'readonly'=> true);
            } else {
                $attr = array('class' => 'with-select span12');
                $form->add('terminalFrom','choice',array(
                    //'property' => 'captionRu',
                    'choices' => $options['affiliate']['stdObj'],
                    'choice_list' => new ObjectChoiceList($options['affiliate']['stdObj'], null, [], null, 'id'),
                    'label' => 'Терминал отправления',
                    'empty_value' => 'Необходимо выбрать',
                    'required' => true,
                    'constraints' => array(
                        new Assert\NotBlank(array(
                            'groups' => ['dpd', 'terminal']
                        ))
                    ),
                    'attr' => ['data-extra' => ['cityCode'], 'class' => 'span12 with-select']
                ));
            }
            if ($data['company'] == 'dpd') {
                $form->add('sellerExtraAddr', 'textarea', array(
                                'required' => false,
                                'attr' => ['class' => 'span12', 'placeholder' => 'Дополнительные данные об адресе'],
                                'label' => 'Доп. адрес инфо'
                    ))
                    ->add('buyerExtraAddr', 'textarea', array(
                                'required' => false,
                                'attr' => ['class' => 'span12', 'placeholder' => 'Дополнительные данные об адресе'],
                                'label' => 'Доп. адрес инфо'
                    ))
                    ->add('packageDescription', 'text', array(
                                'label' => 'Содержимое',
                                'attr' => ['class' => 'span12', 'placeholder' => 'Описание содержимого'],
                                'constraints' => array(
                                    new Assert\NotBlank(array(
                                        'groups' => ['dpd']
                                    ))
                                )
                        ))
                    ->add('costly', 'choice', array(
                                'choices' => [0 => 'Нет', 1 => 'Да'],
                                'attr' => ['class' => 'span12 with-select'],
                                'label' => 'Ценный груз',
                                'constraints' => array(
                                    new Assert\NotBlank(array(
                                        'groups' => ['dpd']
                                    ))
                                )
                        ))
                ;
            }
            $form->add('deliveryFrom', 'choice', array(
                        'label' => 'Забор груза',
                        'choices' => array( 0 => 'Склад', 1 => 'Дверь'),
                        'attr' => $attr
                        ))
                ->add('deliveryTo', 'choice', array(
                   'label' => 'Доставка груза',
                   'choices' => array( 0 => 'Склад', 1 => 'Дверь'),
                   'attr' => $attr
                   ))
            ;
            
        });
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'validation_groups' => function(FormInterface $form) {
                $data = $form->getData();
                $validationGroups = array();
                if ($data['company'] == 'dpd') {
                    $validationGroups[] = 'dpd';
                } else {
                    if ($data['deliveryTo']) {
                        $validationGroups[] = 'address';
                    } else {
                        $validationGroups[] = 'terminal';
                    }
                    if ($data['deliveryFrom']) {
                        $validationGroups[] = 'sellerAddress';
                    }
                }
                //var_dump($validationGroups);die();
                return $validationGroups;
                /*
                if ($data['deliveryTo']) {
                    return array('address');
                } else {
                    return array('terminal');
                }
                 */
            },
            'affiliate' => null,
            'extraServices' => null,
            'internalCodes' => null,
            'deliveryFrom' => null,
            'deliveryTo' => null,
            'companyName' => null,
            'buyerAddress' => null,
            'sellerAddress' => null
        ));
    }
    
    public function getName()
    {
       'waybill_desc_type';
    }

}