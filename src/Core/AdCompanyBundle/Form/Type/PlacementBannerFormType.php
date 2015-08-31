<?php

/**
 *
 * @author  Kaluzhy N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\AdCompanyBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class PlacementBannerFormType extends AbstractType
{

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'placement_banner_form';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /*
            ->add('banner', 'entity', ['label'=>'Баннер',
                                        'empty_value'=>'Ничего не выбрано',
                                        'property'=>'name',
                                        'class' => 'Core\BannerBundle\Entity\CommonBanner'])
            */
            ->add('banner', 'banner_entity', [
                'label' => 'Баннер',
                //'empty_value'=>'Ничего не выбрано',
                'property' => 'name',
                'class' => 'Core\BannerBundle\Entity\CommonBanner'
            ])
            ->add('preoritet', 'choice', ['required' => false,
                    'choices' => [
                        '1' => 1,
                        '2' => 2,
                        '3' => 3,
                        '4' => 4,
                        '5' => 5,
                        '6' => 6,
                        '7' => 7,
                        '8' => 8,
                        '9' => 9,
                        '10' => 10
                    ],
                    'label' => 'Приоритет',
                    'empty_value' => 'Приоритет показа...'
                ]
            );
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Core\AdCompanyBundle\Entity\PlacementBanner'
        ]);
    }

}