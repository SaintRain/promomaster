<?php

/**
 * Форма доставка - получатель
 *
 * @author  Kaluzhniy. N.
 * @copyright LLC "PromoMaster"
 */
namespace Core\OrderBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Application\Sonata\UserBundle\Entity\IndiContact;
use Core\DeliveryBundle\Entity\ServiceWithAddress;
use Core\DeliveryBundle\Entity\ServiceInCity;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormError;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Session\Session;

class DeliveryFormType extends AbstractType
{

    private $translator;

    private $em;

    private $session;

    public function __construct(Translator $translator, ObjectManager $em, $session)
    {
        $this->translator = $translator;
        $this->em = $em;
        $this->session = $session;
    }

    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('deliveryMethod', 'entity', array(
                        'required' => true,
                        'class' => 'CoreDeliveryBundle:Service',
                        'choices' => $options['services'],
                        'expanded' => true,
                        'label' => 'order.form.delivery.method',
                        'attr' => array('class' => 'delivery_methods order_delivery_options_list')
                ))
                ->add('deliveryCost', 'hidden', array('required' => true))
                ->add('deliveryMethod', 'hidden', array('required' => true))
                ->add('deliveryPoint', 'hidden', array())
        ;
        
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) use ($options) {
            $data = $event->getData();
            $form = $event->getForm();
            if ($options['isIndi']) {
                $form->add('contact', 'indi_contact_form', array('cascade_validation' => true));
            } else {
                $form->add('contact', 'legal_contact_form', array('cascade_validation' => true));
            }
            if ($options['user'] && count($options['contactList'])) {
                $form->add('contactList', 'entity', array(
                            'required' => false,
                            'empty_value' => ($options['isIndi']) ? 'order.form.buyerRecipient.emptyIndi' : 'order.form.buyerRecipient.emptyLegal',
                            'label' => ($options['isIndi']) ? 'order.form.buyerRecipient.addressListIndi' : 'order.form.buyerRecipient.addressListLegal',
                            'class' => 'ApplicationSonataUserBundle:CommonContact',
                            'choices' => $options['contactList'],
                            'property' => 'captionForSelect',
                            'attr' => array('class' => 'contactList text_input', 'data-extra' => ['contact'])
                        ))
                ;
            }
        });

        $builder->addEventListener(FormEvents::SUBMIT, function(FormEvent $event) use ($options) {
            $form = $event->getForm();
            $data = $event->getData();
            if (!$data['deliveryMethod'] || !isset($options['services'][$data['deliveryMethod']])) {
                $form->get('deliveryMethod')->addError(new FormError($this->translator->trans('order.form.delivery.required', array())));
            } elseif ($options['services'][$data['deliveryMethod']] instanceof ServiceWithAddress && !$data['deliveryPoint']) {
                $form->get('deliveryPoint')->addError(new FormError($this->translator->trans('order.form.point.required', array())));
            }
            // проверка соотвестия города и цены для доставки
            if (!($options['services'][$data['deliveryMethod']] instanceof ServiceWithAddress || $options['services'][$data['deliveryMethod']] instanceof ServiceInCity)) {
                $calcResult = $this->session->get('deliveryCalc');
                $volume = $this->session->get('orderVolume');
                if (!count($volume) || !count($calcResult)) {
                    $form->get('deliveryCost')->addError(new FormError($this->translator->trans('order.form.cost.requireded', array())));
                }
                $curVolume = (isset($volume['vol_' . $options['orderVolume']]) && $volume['vol_' . $options['orderVolume']]) ? $volume['vol_' . $options['orderVolume']] : null;

                if (!$curVolume) {
                    $form->get('deliveryCost')->addError(new FormError($this->translator->trans('order.form.cost.requireded', array())));
                }
                
                $cityId = 'city_' . $data['contact']->getCity()->getId();
                $curResult = (isset($calcResult['id_' . $data['deliveryMethod']][reset($volume)][$cityId]['cost'])) ? $calcResult['id_' . $data['deliveryMethod']][reset($volume)][$cityId]['cost'] : null;
                if (!$curResult || $curResult != $data['deliveryCost']) {
                    $form->get('deliveryCost')->addError(new FormError($this->translator->trans('order.form.cost.requiredd', array())));
                }
                
            }
            /*
            if (!$data['deliveryCost']) {
                $form->get('deliveryCost')->addError(new FormError($this->translator->trans('order.form.cost.required', array())));
            } elseif (is_numeric($data['deliveryMethod'])) {
                $form->get('deliveryCost')->addError(new FormError($this->translator->trans('order.form.cost.format', array())));
            }
             * 
             */
        });
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'isIndi' => true,
            'services' => array(),
            'contactList' => array(),
            'contactsData' => array(),
            'user' => null,
            'orderVolume' => null,
            'validation_groups' => function(FormInterface $form) use ($resolver) {
                $data = $form->getData();
                $service = $this->em->getRepository('CoreDeliveryBundle:Service')->findWithCompany((int)$data['deliveryMethod']);
                $companyName = $service->getCompany()->getName();
                if (!($service instanceof ServiceWithAddress || $service instanceof ServiceInCity) && $companyName == 'dellin') {
                    return array('Default', 'Delivery');
                }
            }
        ));
    }

    public function getName()
    {
        return 'delivery_recipient_form';
    }
}
