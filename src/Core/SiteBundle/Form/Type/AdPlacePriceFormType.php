<?php

namespace Core\SiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AdPlacePriceFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $discounts = [];
        if ($builder->getData()) {
            foreach ($builder->getData()->getDiscounts() as $discount) {
                $discounts[$discount->getId()] = $discount;
            }
        }

        $builder
            ->add('cost', 'text', [  'attr' => ['data-mask' => '999'], 'label' => 'Стоимость в руб. за 1 условную единицу'])
            ->add('priceModel', 'entity',
                ['label'       => 'В чем указано количество',
                 'empty_value' => 'Необходимо выбрать',
                 'property'    => 'caption2Ru',
                 'class'       => 'CoreDirectoryBundle:PriceModel'
                ])
            /*
            ->add('adPlace', 'entity',
                ['label'       => 'Рекламное место',
                 'empty_value' => 'Необходимо выбрать',
                 'property'    => 'name',
                 'class'       => 'CoreSiteBundle:AdPlace'
                ])
            */
            ->add('discounts', 'collection', [
                'label'              => 'Оптовые скидки',
                'by_reference'       => false,
                'allow_add'          => true,
                'allow_delete'       => true,
                'cascade_validation' => true,
                'type'               => 'ad_place_price_discount_form',
                'options' => [
                    'cascade_validation' => true
                ]
            ]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Core\SiteBundle\Entity\AdPlacePrice',
            'cascade_validation' => true
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ad_place_price_form';
    }
}
