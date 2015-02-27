<?php

/**
 * 
 * Фильтр столица (регион, страна)
 *
 * @author  Kaluzhny.N.I.
 * @copyright LLC 'RostPay'
 */

namespace  Core\DirectoryBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Translation\TranslatorInterface;

class CapitalsType extends AbstractType
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
            ->add('isCapital', 'choice', array(
                                      'label' => $options['labels']['capital'],
                                      'choices' => array(
                                          'isCapitalOfRegion' => $options['labels']['isCapitalOfRegion'],
                                          'isCapitalOfCountry' => $options['labels']['isCapitalOfCountry']
                                        ),
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
            'labels' => array(
                        'isCapitalOfCountry' => $this->translator->trans('filter.label.isCapitalOfCountry', array(), 'CoreDirectoryBundle'),
                        'isCapitalOfRegion' => $this->translator->trans('filter.label.isCapitalOfRegion', array(), 'CoreDirectoryBundle'),
                        'capital' => $this->translator->trans('filter.label.isCapital', array(), 'CoreDirectoryBundle')
                        ),
            'placeholder' => array(
                        'isCapitalOfCountry' => $this->translator->trans('filter.label.isCapitalOfCountry', array(), 'CoreDirectoryBundle'),
                        'isCapitalOfRegion' => $this->translator->trans('filter.label.isCapitalOfRegion', array(), 'CoreDirectoryBundle')
                        )
        ));
    }

    public function getName()
    {
        return 'filter_capitals_type';
    }


}
