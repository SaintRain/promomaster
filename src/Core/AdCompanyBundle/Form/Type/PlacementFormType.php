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

        $builder->add('adCompany', null, ['required' => true, 'property' => 'name'])
            ->add('adPlace', null, ['required' => true, 'property' => 'name'])
            ->add('placementBannersList', 'entity', [
                'class'     => 'Core\AdCompanyBundle\Entity\PlacementBanner',
//                'expanded'  => true,
                'multiple'  => true,
                'required' => false,'property'=>'banner.name'])
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
            ->add('defaultCountries', null, ['required' => false])
            ->addModelTransformer(new PlacementTransformer())       //трансформер дат
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
           'data_class' => 'Core\AdCompanyBundle\Entity\Placement',
           'cascade_validation' => true
        ]);
    }


}