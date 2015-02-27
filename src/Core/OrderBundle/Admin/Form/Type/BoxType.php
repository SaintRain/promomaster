<?php

/**
 * Тип формы упаковка (для накладной)
 *
 * @author Sergeev A.M.
 */


namespace Core\OrderBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class BoxType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('length', 'text', array(
                    'required' => true,
                    'label' => 'Длина (мм.)',
                    'attr' => ['style' => 'width:100px', 'data-mask' => 'integer', 'placeholder' => 'Длина (мм.)']))

                ->add('width', 'text', array(
                    'required' => true,
                    'label' => 'Ширина (мм.)',
                    'attr' => ['style' => 'width:100px', 'data-mask' => 'integer', 'placeholder' => 'Ширина (мм.)']))

                ->add('height', 'text', array(
                    'required' => true,
                    'label' => 'Высота (мм.)',
                    'attr' => ['style' => 'width:100px', 'data-mask' => 'integer', 'placeholder' => 'Высота (мм.)']))

                ->add('weight', 'text', array(
                    'required' => true,
                    'label' => 'Вес',
                    'attr' => [ 'data-mask' => 'integer', 'placeholder' => 'Вес']))

                ->add('isWeightInKg', 'choice', array(
                    'label' => 'Единица измерения веса',
                    'attr' => array('class' => 'with-select', 'placeholder' => 'Единица измерения веса'),
                    'required'=>true,
                    'choices'=>[0=>'Граммы', 1=>'Килограммы']
                    ))

                ->add('indexPosition', 'hidden', array('required' => false, 'attr' => array('hidden' => true)))
        ;
        
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Core\OrderBundle\Entity\SizesOfBox',
            'cascade_validation' => true
        ));
    }

    public function getName()
    {
        return 'boxes_in_order';
    }

}

