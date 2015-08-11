<?php

namespace Core\SiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class AdPlacePriceDiscountFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('amount', null, ['label' => 'Свыше']) // , 'help' => 'Скидка действует при указанном количестве'
            ->add('rate', null, ['label' => 'Процент скидки'])
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Core\SiteBundle\Entity\AdPlacePriceDiscount'
        ));
    }


    /**
     * @return string
     */
    public function getName()
    {
        return 'ad_place_price_discount_form';
    }
}
