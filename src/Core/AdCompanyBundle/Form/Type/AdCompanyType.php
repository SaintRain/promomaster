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
use Core\AdCompanyBundle\Form\DataTransformer\AdCompanyTransformer;

class AdCompanyType  extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', ['label' => 'Название*'])
            ->add('placements', null, ['label' => 'Размещения', 'property'=>'adPlace.name'])
            ->add('startDateTime', 'text', ['required' => false])
            ->add('finishDateTime', 'text', ['required' => false])
            ->add('isEnabled', null, ['label' => 'Рекламная компания активна'])
            ->addModelTransformer(new AdCompanyTransformer())       //трансформер дат
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