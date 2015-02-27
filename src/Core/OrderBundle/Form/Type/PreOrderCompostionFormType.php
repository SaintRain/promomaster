<?php

/**
 * Форма состава предзаказа
 *
 * @author  Kaluzhniy. N.
 * @copyright LLC "PromoMaster"
 */
namespace Core\OrderBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class PreOrderCompostionFormType extends AbstractType
{
    public function getName()
    {
        return 'pre_order_composition_form';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('product', 'hidden_entity_form', array('required' => true, 'class' => 'Core\ProductBundle\Entity\CommonProduct'))
            ->add('quantity', 'text', array('label' =>'order.form.preOrder.quantity', 'required' => true,
                'attr' => ['class' => 'text_input_rounded quantity', 'data-mask'=>'integer']))
            ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Core\OrderBundle\Entity\PreOrder\PreOrderComposition',
            'validation_groups' => ['Default']
        ));
    }

}