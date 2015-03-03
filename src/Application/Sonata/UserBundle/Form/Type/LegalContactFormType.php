<?php

/**
 * Форма адресата для контрагента юр. типа
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

class LegalContactFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                /*
                ->add('firstName', null, array(
                    'label' => 'form.label.indi.firstName',
                    'attr' => array('class' => 'text_input firstName', 'size' => 40)
                ))
                ->add('lastName', null, array(
                    'label' => 'form.label.indi.lastName',
                    'attr' => array('class' => 'text_input lastName', 'size' => 40)
                ))
                ->add('contactEmail', null, array(
                    'label' => 'form.label.contact.email',
                    'attr' => array('class' => 'contactEmail text_input', 'size' => 40)
                ))
                ->add('phone', null, array(
                    'label' => 'form.label.contact.phone',
                    'attr' => array('class' => 'text_input phone phone_correct', 'size' => 40)
                ))
                ->add('postIndex', null, array('label' => 'form.label.contact.postIndex', 'required' => true, 'attr' => ['class'=> 'postIndex address text_input']))
                */
                ->add('address', 'textarea', array(
                    'attr' => ['class' => 'address text_input textarea', 'rows' => 2, 'cols' => 50],
                    'required' => true,
                    'label' => 'form.label.contact.address'))
        ;
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) use ($options) {
            $data = $event->getData();
            $form = $event->getForm();
            /*
            if ($options['needPassport'] || ($data && $data->getPassport())) {
                $form->add('passport', null, array(
                    'required' => false,
                    'attr' => array('class' => 'text_input passport', 'size' => 40),
                    'label' => 'form.label.indi.passport'))
                ;
            }*/
            $form->add('city', 'ajax_entity', [
                        'class' => 'Core\DirectoryBundle\Entity\City',
                        'label' => 'form.label.contact.city',
                        'attr' => ['class'=> 'city', 'data-city' => ($data && $data->getCity()) ? $data->getCity()->getId() : null],
                        'translationDomain' => 'ApplicationSonataUserBundle',
                        'required' => true,
                        'frontend' => true,
                        'add_to_query' => array(
                            'where' => array(
                                'andWhere' => array(
                                    'country.id = 190'
                        ))),
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
            if ($options['needMark']) {
                $form->add('mark', 'textarea', array(
                    'label' => 'form.label.contact.mark',
                    'attr' => array('cols' => 50, 'rows' => 5, 'class' => 'mark text_input textarea'),
                    'required' => false
                ));
            }
        });

        $builder->addEventListener(FormEvents::SUBMIT, function(FormEvent $event) use ($options) {

            if (null != $options['contragent']) {
                $data = $event->getData();
                $data->setContragent($options['contragent']);
            }

        });
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Application\Sonata\UserBundle\Entity\LegalContact',
            'contragent' => null,
            'needMark' => true, // показывать примечение
            'needPassport' => true // нужен ли паспорт
        ));
    }

    public function getName()
    {
        return 'legal_contact_form';
    }
}