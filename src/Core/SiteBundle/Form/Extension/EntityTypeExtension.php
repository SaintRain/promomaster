<?php

namespace Core\SiteBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EntityTypeExtension extends AbstractTypeExtension {

    public function getExtendedType()
    {
        return 'entity';
    }

    /**
     * Add the image_path option
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setOptional(array('extraConfig'));
    }

    /**
     * Pass the image URL to the view
     *
     * @param FormView $view
     * @param FormInterface $form
     * @param array $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        if (isset($options['extraConfig']['field'])) {
            $field = $form->getParent()->get('sections');
            $data = $field->getConfig()->getOption('choice_list')->getChoices();

            foreach ($data as $val) {
                $view->vars['extraData'][$val->getId()] = $val;
            }
        } else {
            $view->vars['extraData'] = [];
        }
    }

}