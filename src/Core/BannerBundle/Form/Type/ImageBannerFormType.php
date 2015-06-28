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

class ImageBannerFormType  extends GeneralBannerFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder
            ->add('url', 'text', ['required' => $options['isBanner'], 'label' => 'Ссылка перехода'])
            ->add('isOpenUrlInNewWindow', null, ['required' => false, 'label' => 'Открывать ссылку перехода в новом окне'])
            ->add('image', 'multiupload_file_frontend', array(
                'required' => true,
                "label" => "Файл",
                'attr' => array(
                    'multiple' => false,
                    'accept' => 'image/*'
                ),
                'type' => 'image',
                'namespace_to_attach' => 'Core\BannerBundle\Entity\ImageBanner',
                'namespace_to_insert' => 'Core\FileBundle\Entity\ImageFile',
                'btnName' =>($builder->getData() && $builder->getData()->getId()) ? 'Выбрать другой файл' : 'Выбрать файл',
                'btnAttr' => array(
                    'class' => 'btn-u',
                ),
                'showStatusOfUpload' => true,
                'showCounterOfFiles' => false,
                'showAttachedFiles' => true,
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Core\BannerBundle\Entity\ImageBanner',
            'isBanner' => true
        ));
    }


    public function getName()
    {
        return 'image_banner_form';
    }

}