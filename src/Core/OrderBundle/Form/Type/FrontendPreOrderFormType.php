<?php

/**
 * Форма предзаказ со списком получателей
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

class FrontendPreOrderFormType extends AbstractType
{
    public function getName()
    {
        return 'frontend_pre_order';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('preOrder', 'pre_order_form', array());
        if (count($options['contactList'])) {
            $builder->add('contactList', 'entity', array(
                'required' => false,
                'empty_value' => 'order.form.preOrder.addressListEmpty',
                'class' => 'ApplicationSonataUserBundle:CommonContact',
                'choices' => $options['contactList'],
                'property' => 'captionForSelect',
                'label' => 'order.form.preOrder.addressList',
                'attr' => array('class' => 'contactList text_input', 'data-extra' => ['contact'])
            ))
            ;
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'contactList' => array(),
            'data_class' => null
        ));
    }

}