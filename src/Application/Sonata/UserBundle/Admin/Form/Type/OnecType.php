<?php

/**
 * Форма для 1c фильтры
 *
 * @author  Kaluzhny.N.I.
 * @copyright LLC 'RostPay'
 */

namespace Application\Sonata\UserBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Translation\TranslatorInterface;

class OnecType extends AbstractType
{
    protected $translator;

    /**
     * @param \Symfony\Component\Translation\TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('onec', 'text', array('attr'=> array('placeholder'=>$options['labels']['onec'])))
            ->add('onecOnOff', 'choice', array(
                                      'choices' => array(1 => $options['labels']['onecOnOff']),
                                      'expanded' => true,
                                      'multiple' => true,
                                      ))
        ;
    }


    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'labels' => array('onec' => 'form.label.contragent.onec','onecOnOff' => 'form.label.contragent.onecOnOff'),
            'placeholder' => array('onec' => 'form.label.contragent.onec','onecOnOff' => 'form.label.contragent.onecOnOff')
        ));
    }
    
    public function getName()
    {
        return 'onec_type';
    }


}
