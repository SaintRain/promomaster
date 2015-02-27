<?php

namespace Core\ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idFrom1C')
            ->add('indexPosition')
            ->add('createdDateTime')
            ->add('isEnabled')
            ->add('isBest')
            ->add('caption')
            ->add('article')
            ->add('price')
            ->add('description')
            ->add('image')
            ->add('images')
            ->add('slug')
            ->add('title')
            ->add('metadescription')
            ->add('metakeywords')
            ->add('quantityAvailable')
            ->add('categories')
            ->add('manufacturers')
            ->add('accessoriesProducts')
            ->add('similarProducts')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Core\ProductBundle\Entity\Product'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'core_shop_productbundle_product';
    }
}
