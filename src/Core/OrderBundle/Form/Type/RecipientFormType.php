<?php

/**
 * Форма получатель cо списком получателей и способом доставки
 *
 * @author  Kaluzhniy. N.
 * @copyright LLC "PromoMaster"
 */
namespace Core\OrderBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Application\Sonata\UserBundle\Entity\IndiContact;
use Core\DeliveryBundle\Entity\ServiceWithAddress;
use Core\DeliveryBundle\Entity\ServiceInCity;

class RecipientFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('deliveryMethod', 'entity', array(
                'required' => true,
                'empty_value' => 'need_to_choose',
                'class' => 'CoreDeliveryBundle:Service',
                'choices' => $options['services'],
                'property' => 'name',
                'label' => 'order.form.delivery.method',
                ))
            ;
        if (count($options['contactList'])) {
            $builder->add('contactList', 'entity', array(
                    'required' => false,
                    'empty_value' => ($options['isIndi']) ? 'order.form.buyerRecipient.emptyIndi' : 'order.form.buyerRecipient.emptyLegal',
                    'class' => 'ApplicationSonataUserBundle:CommonContact',
                    'choices' => $options['contactList'],
                    'property' => 'captionForSelect',
                    'label' => ($options['isIndi']) ? 'order.form.buyerRecipient.addressListIndi' : 'order.form.buyerRecipient.addressListLegal',
                    'attr' => array('class' => 'contactList text_input', 'data-extra' => ['contact'])
                ))
            ;
        }
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) use ($options) {
            $form = $event->getForm();
            
            if ($options['isIndi']) {
                $form->add('contact', 'indi_contact_form', array('cascade_validation' => true));
            } else {
                $form->add('contact', 'legal_contact_form', array('cascade_validation' => true));
            }
        });
        // хук, который нужен для того чтобы правльно провалидировать сущности
        $builder->addEventListener(FormEvents::SUBMIT, function(FormEvent $event) use ($options) {
            $data = $event->getData();
            if (isset($data['contactList']) && !$data['contactList']->getPassport()) {
               $data['contactList']->setPassport($data['contact']->getPassport());
            }
        });
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
           'isIndi' => true,
           'contactList' => [],
           'services' => [],
           'csrf_protection' => false,
           'validation_groups' => function(FormInterface $form) {
                $data = $form->getData();
                if (isset($data['deliveryMethod']) && $data['deliveryMethod']
                        && ($data['contact'] instanceof IndiContact)
                        && !($data['deliveryMethod'] instanceof ServiceWithAddress || $data['deliveryMethod'] instanceof ServiceInCity)
                        && ($data['deliveryMethod']->getCompany()->getName() == 'dellin')) {
                    return ['Default', 'Delivery'];
                } else {
                    return ['Default'];
                }
            },
        ]);
    }

    public function getName()
    {
        return 'cart_recipient_with_extra_data';
    }
}