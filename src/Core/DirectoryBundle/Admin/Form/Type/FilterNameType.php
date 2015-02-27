<?php

/**
 * Форма для Name Filter
 * Фильтр точное совпадение названия ()
 *
 * @author  Kaluzhny.N.I.
 * @copyright LLC 'RostPay'
 */

namespace  Core\DirectoryBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Translation\TranslatorInterface;

class FilterNameType extends AbstractType
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
            ->add('name', 'text', array('attr'=> array('placeholder'=>$options['labels']['name'])))
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
            'labels'    => array(
                            'name' => $this->translator->trans('filter.label.name', array(), 'CoreDirectoryBundle'),
                            'full' => $this->translator->trans('filter.label.nameFull', array(), 'CoreDirectoryBundle')
                        ),
            'placeholder'   => array(
                            'name' => $this->translator->trans('filter.label.name', array(), 'CoreDirectoryBundle'),
                            'full' => $this->translator->trans('filter.label.nameFull', array(), 'CoreDirectoryBundle')
                        )
        ));
    }
    
    public function getName()
    {
        return 'filter_name_type';
    }


}
