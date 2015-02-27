<?php

/**
 * Форма для Email (Не используется)
 *
 * @author  Kaluzhny.N.I.
 * @copyright LLC 'RostPay'
 */

namespace Application\Sonata\UserBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Translation\TranslatorInterface;

class EmailType extends AbstractType
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
            ->add('email', 'text', array('attr'=> array('placeholder'=>$options['labels']['email'])))
            ->add('full', 'choice', array(
                                      'choices' => array(1 => $options['labels']['full']),
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
            'labels' => array('email' => 'form.label.contragent.email','full' => 'form.label.contragent.emailFull'),
            'placeholder' => array('email' => 'form.label.contragent.email','full' => 'form.label.contragent.emailFull')
        ));
    }
    
    public function getName()
    {
        return 'contragent_email_type';
    }


}
