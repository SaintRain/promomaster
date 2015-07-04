<?php

 /**
 * 
 * @author  Kaluzhy N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\AdCompanyBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Core\AdCompanyBundle\Form\DataTransformer\PlacementTransformer;

class PlacementFormType extends AbstractType
{

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'placement_form';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('placementBannersList', 'entity', [
//                'class'     => 'Core\AdCompanyBundle\Entity\PlacementBanner',
//                'expanded'  => true,
//                'multiple'  => true,
//                'required' => false,'property'=>'banner.name'])
            ->add('placementBannersList', 'collection', [
                'by_reference' => false,
                'type' => 'placement_banner_form',
                'allow_add' => true,
                'allow_delete' => true,
                'prototype_name' => '__banner_name__'
            ])
            ->add('defaultCountries', 'entity', [
                //'required' => false ,
                //'by_reference' => false,
                'class'     => 'CoreDirectoryBundle:Country',
                //'property'  => 'name',
                'withSubset' => true,
                'expanded'  => true,
                'multiple'  => true,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->select('c, w')
                        ->innerJoin('c.worldSection', 'w')
                        ;
                }
            ])
            ->add('startDateTime', 'text', ['required' => false , 'read_only'=>true])
            ->add('finishDateTime', 'text', ['required' => false, 'read_only'=>true])
            ->add('isEnabled', null, ['required' => false])
            ->add('quantity', null, ['required' => false])
            ->add('quantityModel', 'entity', [
                'class' => 'Core\DirectoryBundle\Entity\PriceModel',
                'query_builder' => function(EntityRepository $er ) {
                    return $er->createQueryBuilder('pm')->where('pm.name != :name')->setParameter('name','daysquantity');
                },
                'required' => false, 'property'=>'captionRu'])
            ->addModelTransformer(new PlacementTransformer())       //трансформер дат
        ;
        if ($options['adCompanyField']) {
            $builder->add('adCompany', null, ['required' => true, 'property' => 'name']);
        }
        if ($options['adPlaceField']) {
            $builder->add('adPlace', null, [
                'required' => true,
                'property' => 'name',
                'empty_value' => 'Необходимо выбрать'
            ]);
        }
        if ($options['site']) {
            $builder->add('site', 'entity', [
                'empty_value' => 'Необходимо выбрать',
                'class'     => 'CoreSiteBundle:CommonSite',
                'required'  => true,
                'property'  => 'name',
                'label'     => 'Площадка',
                'mapped'    => false
            ]);
        }
    }

    /**
     * {@inherit}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['adPlaceAllowNew'] = $options['adPlaceAllowNew'];
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
           'data_class' => 'Core\AdCompanyBundle\Entity\Placement',
           'cascade_validation' => true,
           'adCompanyField' => true,
           'adPlaceField' => true,
           'adPlaceAllowNew' => false,
            'site' => false
        ]);
    }


}