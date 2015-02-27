<?php

/**
 * Форма покупателя физ. лицо(корзина)
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
//use Application\Sonata\UserBundle\Entity\IndiContact;

class IndiFormType extends AbstractType
{
    private $translator;
    
    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('firstName', null, array(
                    'attr' => array('class' => 'text_input firstName_copy copy', 'size' => 40),
                    'label' => 'form.label.indi.firstName'))
                ->add('lastName', null, array(
                    'attr' => array('class' => 'text_input lastName_copy copy', 'size' => 40),
                    'label' => 'form.label.indi.lastName'))
                ->add('surName', null, array(
                    'attr' => array('class' => 'text_input', 'size' => 40),
                    'label' => 'form.label.indi.surName'))
                ->add('phone1', null, array(
                    'attr' => array('class' => 'text_input phone_copy copy phone_correct', 'size' => 40),
                    'label' => $this->translator->trans('form.label.indi.phone', array('"%string%"' => 1))
                    ))
                ->add('contactEmail', null, array(
                    'required' => $options['isEmailRequired'],
                    'attr' => array('class' => 'text_input contactEmail_copy copy', 'size' => 40),
                    'label' => 'form.label.profile.email'
                    ))
        ;
        /*
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) use ($options) {
            $form = $event->getForm();
            $data = $event->getData();
            $contactList = $data->getContactList();
            if (count($contactList) == 1) {
                $form->add('contactList', 'collection', array(
                    'type' => 'indi_contact_form',
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'options' => array('cascade_validation' => true)
                ));
            } else {
                foreach($contactList as $contact) {
                    $data->removeContactList($contact);
                }
                $data->addContactList(new IndiContact());
                
                $form->add('contactList', 'collection', array(
                    'type' => 'indi_contact_form',
                    'by_reference' => false,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'options' => array('cascade_validation' => true)
                ));
            }
        });
         * 
         */
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Application\Sonata\UserBundle\Entity\IndiContragent',
            'isEmailRequired' => false
        ));
    }
    
    public function getName()
    {
        return 'indi_contragent_form';
    }

}
