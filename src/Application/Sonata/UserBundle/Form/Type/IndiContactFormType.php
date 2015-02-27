<?php

/**
 * Форма адресата для контрагента физ. типа
 *
 * @author  Kaluzhniy. N.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Application\Sonata\UserBundle\Form\Transformer\PassportTransformer;

/*
 * @see https://github.com/symfony/symfony/issues/9355
 * @see https://github.com/symfony/symfony/issues/5578
 */
class IndiContactFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new PassportTransformer();
        $builder->add(
            $builder->create('passport', null, array(
                'required' => false,
                'attr' => array('class' => 'text_input passport', 'size' => 40),
                'label' => 'form.label.indi.passport'))->addViewTransformer($transformer)

        )
        ;
        $builder
                ->add('address', 'textarea', array(
                                    'attr' => ['class' => 'text_input textarea address', 'rows' => 2, 'cols' => 50],
                                    'required' => true,
                                    'label' => 'form.label.contact.address'))
                /*
                ->add('postIndex', null, array('label' => 'form.label.contact.postIndex', 'required' => true, 'attr' => ['class'=> 'postIndex text_input']))
                */
                ->add('firstName', null, array(
                    'label' => 'form.label.indi.firstName',
                    'attr' => array('class' => 'text_input firstName', 'size' => 40)
                ))
                ->add('lastName', null, array(
                    'label' => 'form.label.indi.lastName',
                    'attr' => array('class' => 'text_input lastName', 'size' => 40)
                ))
                ->add('phone', null, array(
                    'label' => 'form.label.contact.phone',
                    'required' => true,
                    'attr' => array('class' => 'text_input phone phone_correct', 'size' => 40)
                ))
                ->add('contactEmail', null, array(
                    'label' => 'form.label.contact.email',
                    'required' => false,
                    'attr' => array('class' => 'text_input contactEmail', 'size' => 40)
                ))
        ;

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) use ($options) {
            $data = $event->getData();
            $form = $event->getForm();
            if ($options['needMark']) {
                $form->add('mark', 'textarea', array(
                    'label' => 'form.label.contact.mark',
                    'attr' => array('cols' => 50, 'rows' => 5, 'class' => 'mark text_input textarea'),
                    'required' => false
                ));
            }
            $form->add('city', 'ajax_entity', [
                        'class' => 'Core\DirectoryBundle\Entity\City',
                        'label' => 'form.label.contact.city',
                        'attr' => ['class'=> 'city', 'data-city' => ($data && $data->getCity()) ? $data->getCity()->getId() : null],
                        'translationDomain' => 'ApplicationSonataUserBundle',
                        'add_to_query' => array(
                            'where' => array(
                                'andWhere' => array(
                                    'country.id = 190'
                        ))),
                        'required' => true,
                        'frontend' => true,
                        'properties' => [
                            'id' => array(
                                'search' => true,
                                'return' => true,
                                'entry' => 'full',
                            ),
                            'name' => array(
                                'search' => true,
                                'return' => true,
                                'entry' => 'left',
                            ),
                            'area' => array(
                                'search' => false,
                                'return' => true,
                                'entry' => 'left',
                            ),
                          ],
                        'select2_constructor' => array(
                            'width' => '350px',
                            'placeholder' => 'form.label.address.cityPlaceholder',
                            'minimumInputLength' => 1),
                    ])
            ;
        });

        $builder->addEventListener(FormEvents::SUBMIT, function(FormEvent $event) use ($options) {
            $data = $event->getData();
            if (null != $options['contragent']) {
                $data = $event->getData();
                $data->setContragent($options['contragent']);
            }
            
        });
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Application\Sonata\UserBundle\Entity\IndiContact',
            'contragent' => null,
            'needMark' => true, // показывать примечение
        ));
    }

    public function getName()
    {
        return 'indi_contact_form';
    }
}