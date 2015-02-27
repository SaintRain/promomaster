<?php

/**
 * Форма для Подклассов
 *
 * @author  Kaluzhny.N.I.
 * @copyright LLC 'RostPay'
 */

namespace Application\Sonata\UserBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Translation\TranslatorInterface;

class SubClassType extends AbstractType
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
        $subclasses = array();
        foreach($options['subclasses'] as $label => $subclass) {
            $subclass = explode("\\", $subclass);
            $subclass = array_pop($subclass);
            $subclasses[$subclass] = $label;
        }

        $builder
            ->add('type', 'choice', array(
                                      'choices' => $subclasses,
                                      'expanded' => $options['expanded'],
                                      'multiple' => $options['multiple'],
                                      'label' => $options['labels']['subclass']
                                      ))
        ;
    }


    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'labels' => array('subclass' => 'form.label.contragent.subclass'),
            'subclasses' => null, // Подклассы
            'expanded' => true,
            'multiple' => true,
        ));
    }
    
    public function getName()
    {
        return 'subclasses_type';
    }


}
