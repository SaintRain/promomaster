<?php

/**
 * Форма файл для баннера
 * @author  Kaluzhny N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\AdCompanyBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;


class AdCompanyType  extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', ['label' => 'Название*'])
            ->add('placements', null, ['label' => 'Размещения', 'property'=>'adPlace.name'])
            ->add('isEnabled', null, ['label' => 'Рекламная компания активна'])
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Core\AdCompanyBundle\Entity\AdCompany'
        ));
    }


    public function getName()
    {
        return 'ad_company_type';
    }

}