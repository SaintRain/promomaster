<?php
namespace Core\SiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Core\CategoryBundle\Entity\Repository\SiteCategoryRepository;

class SearchFilterFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('keywords', 'text', ['required' => false])
            ->add('categories', 'FrontendCategory', [
                    'required' => true,
                    'class' => 'Core\CategoryBundle\Entity\SiteCategory',
                    'multiple' => true,
                    'attr'=>['style'=>'width:100%']
                ])
            ->add('selectMainCat', 'entity',[
                'required' => false,
                'class'=>'Core\CategoryBundle\Entity\SiteCategory',
                'property'=>'captionRu',
                'empty_value'=>'Выберите раздел...',
                'query_builder' => function (SiteCategoryRepository $er) {
                    return $er->createQueryBuilder('s')
                        ->where('s.isEnabled=1 AND s.lvl=1')
                        ->orderBy('s.lft', 'ASC');
                },
            ])

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            //'data_class' => 'Core\SiteBundle\Entity\WebSite'
            'csrf_protection' => false
        ]);
    }


    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'site_search_filter_form';
    }
}