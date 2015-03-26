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
            ->add('cost', null, ['label' => 'Стоимость за 1 условную единицу'])
            ->add('priceModel', 'entity',
                ['label'       => 'В чем указано количество',
                 'empty_value' => 'Необходимо выбрать',
                 'property'    => 'captionRu',
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
                'label'              => 'Скидки',
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
