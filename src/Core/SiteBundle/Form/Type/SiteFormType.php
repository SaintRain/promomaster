<?php
namespace Core\SiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SiteFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('domain', 'text', ['required' => true])
            ->add('mirrors', 'textarea', ['required' => false])
            ->add('keywords', 'textarea', ['required' => false, 'attr' => ['rows' => 5]])
            ->add('shortDescription', 'textarea', ['required' => false, 'attr' => ['rows' => 5]])
            ->add('description', 'textarea', ['required' => false, 'attr' => ['rows' => 5]])
            ->add('categories', 'FrontendCategory', [
                    'required' => true,
                    'class' => 'Core\CategoryBundle\Entity\SiteCategory',
                    'multiple' => true
                ])
            ->add('isTakeOrdersWithoutBanner', null, ['required' => false])

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'Core\SiteBundle\Entity\WebSite'
        ]);
    }


    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'site_form';
    }
}