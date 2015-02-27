<?php

/**
 * Форма покупателя юр. лицо(корзина)
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
//use Application\Sonata\UserBundle\Entity\LegalContact;

class LegalFormType extends AbstractType
{
    private $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('legalForm', null, array(
                    'empty_value' => 'form.label.empty',
                    'attr' => array('class' => 'text_input'),
                    'label' => 'form.label.legal.legalForm'))
                ->add('organization', null, array(
                    'attr' => array('class' => 'text_input organization_copy copy', 'size' => 40),
                    'label' => 'form.label.legal.name'))
                ->add('inn', null, array(
                    'attr' => array('class' => 'text_input', 'size' => 40),
                    'label' => 'form.label.legal.inn'))
                ->add('kpp', null, array(
                    'attr' => array('class' => 'text_input', 'size' => 40),
                    'required' => false,
                    'label' => 'form.label.legal.kpp'))
                ->add('ogrn', null, array(
                    'attr' => array('class' => 'text_input', 'size' => 40),
                    'label' => 'form.label.legal.ogrn'))
                ->add('chiefPosition', null, array(
                    'attr' => array('class' => 'text_input', 'size' => 40),
                    'label' => 'form.label.legal.chiefPosition'))
                ->add('chiefFio', null, array(
                    'attr' => array('class' => 'text_input', 'size' => 40),
                    'label' => 'form.label.legal.chiefFio'))
                ->add('bank', 'ajax_entity', [
                    'class' => 'Core\LogisticsBundle\Entity\Bank',
                    'translationDomain' => 'ApplicationSonataUserBundle',
                    'attr' => array('class' => 'bank'),
                    'label' => 'form.label.legal.bank',
                    'frontend' => true,
                    'required' => true,
                    'properties' => [
                        'id' => array(
                            'search' => true,
                            'return' => true,
                            'entry' => 'full',
                        ),
                        'bic' => array(
                            'search' => true, 'return' => true,
                            'entry' => 'left',
                        ),
                        'caption' => array(
                            'search' => false,
                            'return' => true, 'entry' => 'left',
                        ),
                    ],
                    'select2_constructor' => array(
                        'width' => '350px',
                        'placeholder' => 'form.label.legal.bankPlaceholder',
                        'minimumInputLength' => 1),
                ])
                ->add('bankAccount', null, array(
                    'attr' => array('class' => 'text_input', 'size' => 40),
                    'label' => 'form.label.legal.bankAccount'))
                ->add('corrAccount', null, array(
                    'attr' => array('class' => 'text_input', 'size' => 40),
                    'label' => 'Кор. счет', 'required' => false
                    ))
                ->add('addressLegal', null, array(
                    'attr' => array('class' => 'text_input', 'size' => 40),
                    'label' => 'form.label.legal.addressLegal'))
                ->add('addressPost', null, array(
                    'attr' => array('class' => 'text_input', 'size' => 40),
                    'label' => 'Почтовый адрес '))
                ->add('phone1', null, array(
                    'attr' => array('class' => 'text_input phone_copy copy phone_correct', 'size' => 40),
                    'label' => $this->translator->trans('form.label.indi.phone', array('"%string%"' => 1))
                    ))
                ->add('fax', null, array(
                    'attr' => array('class' => 'text_input', 'size' => 40),
                    'label' => 'form.label.legal.fax'))
                ->add('contactFio', null, array(
                    'attr' => array('class' => 'text_input', 'size' => 40),
                    'label' => 'form.label.legal.contactFio'))
                ->add('contactEmail', null, array(
                    'required' => $options['isEmailRequired'],
                    'attr' => array('class' => 'text_input contactEmail_copy copy', 'size' => 40),
                    'label' => 'form.label.profile.email'
                    ))
                ->add('site', 'text', array(
                    'attr' => array('class' => 'text_input', 'size' => 40),
                    'label' => 'form.label.legal.site'))
        ;
        /*
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) use ($options) {
            $form = $event->getForm();
            $data = $event->getData();
            $contactList = $data->getContactList();
            if (count($contactList) == 1) {
                $form->add('contactList', 'collection', array(
                    'type' => 'legal_contact_form',
                    'by_reference' => false,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'options' => array('cascade_validation' => true)
                ));
            } else {
                foreach($contactList as $contact) {
                    $data->removeContactList($contact);
                }
                $data->addContactList(new LegalContact());
                $form->add('contactList', 'collection', array(
                    'type' => 'legal_contact_form',
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
            'data_class' => 'Application\Sonata\UserBundle\Entity\LegalContragent',
            'isEmailRequired' => false
        ));
    }

    public function getName()
    {
        return 'legal_contragent_form';
    }

}
