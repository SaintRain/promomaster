<?php

/**
 * Форма файл для баннера
 * @author  Kaluzhny N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\BannerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class CodeBannerFormType extends GeneralBannerFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
                //->add('name', null, ['label'=> 'Название баннера'])
                ->add('code', null, ['label' => 'Код баннера'])
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Core\BannerBundle\Entity\CodeBanner'
        ));
    }


    public function getName()
    {
        return 'code_banner_form';
    }

}