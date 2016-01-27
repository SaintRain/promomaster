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
use Symfony\Component\Validator\Constraints\NotBlank;
class PlacementFormType extends AbstractType
{

    private $userId;
    public  function __construct($userId) {
        $this->userId=$userId;

    }

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
                'prototype_name' => '__banner_name__',
                'error_bubbling' => false,

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
                        ->orderBy('c.indexPosition')
                        ;
                }
            ])
            ->add('startDateTime', 'text', ['required' => false , 'read_only'=>true])
            ->add('finishDateTime', 'text', ['required' => false, 'read_only'=>true])
            ->add('isEnabled', null, ['required' => false, ] )
            ->add('quantity', null, ['required' => false])
            ->add('quantityModel', 'entity', [
                'empty_value'   => 'Необходимо выбрать',
                'class' => 'Core\DirectoryBundle\Entity\PriceModel',
                'query_builder' => function(EntityRepository $er ) {
                    return $er->createQueryBuilder('pm')->where('pm.name != :name')->setParameter('name','daysquantity');
                },
                'required' => false, 'property'=>'caption2Ru'])
            ->addModelTransformer(new PlacementTransformer())       //трансформер дат
        ;
        if ($options['adCompanyField']) {
            $builder->add(
                'adCompany',
                null,
                ['required' => true, 'property' => 'name']
            );
        }
        if ($options['adPlaceField']) {
            $userId=$this->userId;
            $builder->add('adPlace', 'entity', [
                'class'         => 'CoreSiteBundle:AdPlace',
                'required'      => true,
                'property'      => 'name',
                'empty_value'   => 'Необходимо выбрать или добавить',
                'disabled'      => $options['adPlaceFieldReadonly'],
                'query_builder' => function(EntityRepository $er ) use ($userId) {
                    return $er->createQueryBuilder('s')->where('s.user = :userId')->setParameter('userId',$userId);
                },
            ]);
//            $builder->add('adPlace', null, [
//                'required'      => true,
//                'property'      => 'name',
//                'empty_value'   => 'Необходимо выбрать или добавить',
//                'disabled'      => $options['adPlaceFieldReadonly']
//            ]);
        }
        if ($options['site']) {
            $site = ($builder->getData() && $builder->getData()->getAdPlace())
                    ? $builder->getData()->getAdPlace()->getSite() : null;

            $userId=$this->userId;
            $builder->add('site', 'entity', [
                'empty_value'   => 'Необходимо выбрать или добавить',
                'class'         => 'CoreSiteBundle:CommonSite',
                'query_builder' => function(EntityRepository $er ) use ($userId) {
                    return $er->createQueryBuilder('s')->where('s.user = :userId')->setParameter('userId',$userId);
                },
                'constraints' => [
                    new NotBlank()
                ],
                'required'      => true,
                'property'      => 'name',
                'label'         => 'Площадка*',
                'required'      => true,
                'mapped'        => false,
                'data'          => $site,
                'disabled'      => $options['siteFieldReadonly']
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
           'site' => false,
           'siteFieldReadonly' => false,
           'adPlaceFieldReadonly' => false
        ]);
    }


}