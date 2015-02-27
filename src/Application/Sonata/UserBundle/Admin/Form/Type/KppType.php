<?php

/**
 * Форма для КПП
 *
 * @author  Kaluzhny.N.I.
 * @copyright LLC 'RostPay'
 */

namespace Application\Sonata\UserBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Translation\TranslatorInterface;

class KppType extends AbstractType
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
            ->add('kpp', 'text', array('attr'=> array('placeholder'=>$options['labels']['kpp'])))
            ->add('kppOnOff', 'choice', array(
                                      'choices' => array(1 => $options['labels']['kppOnOff']),
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
            'labels' => array('kpp' => 'form.label.contragent.kpp','kppOnOff' => 'form.label.contragent.kppOnOff'),
            'placeholder' => array('kpp' => 'form.label.contragent.kpp','kppOnOff' => 'form.label.contragent.kppOnOff')
        ));
    }
    
    public function getName()
    {
        return 'kpp_type';
    }


}
