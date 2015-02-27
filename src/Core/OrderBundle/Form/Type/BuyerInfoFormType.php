<?php

/**
 * Форма покупатель - получатель
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
use Application\Sonata\UserBundle\Entity\User;
use Application\Sonata\UserBundle\Entity\IndiContragent;
use Application\Sonata\UserBundle\Entity\CommonContragent;
use Symfony\Component\HttpFoundation\RequestStack;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Validator\ValidatorInterface;
use Doctrine\ORM\EntityManagerInterface;

class BuyerInfoFormType extends AbstractType
{
    private $security;

    private $requestStack;

    private $userManager;

    private $em;

    private $validator;

    private $user;

    private $session;

    public function __construct(SecurityContext $security, RequestStack $requestStack, UserManagerInterface $userManager, EntityManagerInterface $em, ValidatorInterface $validator, $session)
    {
        $this->security = $security;
        $this->requestStack = $requestStack;
        $this->userManager = $userManager;
        $this->em = $em;
        $this->validator = $validator;
        $this->user = ($this->security->getToken() && is_object($this->security->getToken()->getUser())) ? $this->security->getToken()->getUser() : null;
        $this->session = $session;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*
        if (!$this->user) {
            $builder
                ->add('rssNews', 'checkbox', array(
                    'required' => false,
                    'label' => 'form.label.profile.rssNews',
                ))
                ->add('password', 'repeated', array(
                    'type' => 'password',
                    'invalid_message' => 'fos_user.password.mismatch',
                    'options' => array('translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'text_input', 'size' => 40)),
                    'required' => false,
                    'first_options'  => array('label' => 'form.password'),
                    'second_options' => array('label' => 'form.password_confirmation')
                    ))
            ;
        }
        */
        if (count($options['contactList']) && $this->user) {
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
        /*else {
            
            $builder->add('sameInfo', 'checkbox', array(
                    'label' => 'order.form.buyerRecipient.sameInfo',
                    'attr' => array('class' => 'same_info'),
                    'required' => false
                ));
            
        }*/

        /*
        ld('after pre set');
        ldd($builder->getForm()->has('contactList'));
        */
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) use ($options) {
            
            $form = $event->getForm();
            $data = $event->getData();
            if ($options['isIndi'] && (!$this->user || !count($options['contactList']))) {
                $form->add('otherRecipient', 'checkbox', array(
                    'label' => 'order.form.buyerRecipient.otherRecipient',
                    'attr' => array('class' => 'other_recipient'),
                    'required' => false
                ));
            }
            if ($options['isIndi']) {
                $form->add('contragent', 'indi_contragent_form', array('cascade_validation' => true, 'isEmailRequired' => ($this->user) ? false : true))
                    ->add('contact', 'indi_contact_form', array(
                                    'cascade_validation' => true
                    ))
                ;
            } else {
                $form->add('contragent', 'legal_contragent_form', array('cascade_validation' => true, 'isEmailRequired' => ($this->user) ? false : true))
                    ->add('contact', 'legal_contact_form', array('cascade_validation' => true));
            }
            /*
            if (!$options['register']) {
                $form->add('register', 'checkbox', array(
                        'label' => 'order.form.buyerRecipient.register',
                        'attr' => array('class' => 'register_me'),
                        'required' => false
                    ));
            }*/
                
        });
        $builder->addEventListener(FormEvents::SUBMIT, function(FormEvent $event) use ($options) {
            $contragent = null;
            $data = $event->getData();
            $form = $event->getForm();
            //ldd('dsds');
            // логика для неавторизованного юзера
            if (!$this->user) {
                if (!$data['contragent']->getContactEmail()) {
                    $form->get('contragent')->get('contactEmail')->addError(new FormError('fos_user.email.blank'));
                }
                $searchedUser = $this->userManager->findUserByEmail($data['contragent']->getContactEmail());
                if ($searchedUser && $searchedUser->isEnabled()) {
                    $form->get('contragent')->get('contactEmail')->addError(new FormError('fos_user.email.need_to_auth'));
                }
                // проверяем есть ли у нас в базе неактивный юзер с таким же email
                $user = ($searchedUser && !$searchedUser->isEnabled()) ? $searchedUser : null;

                //$user = $this->em->getRepository('ApplicationSonataUserBundle:User')->findNotActiveUser($data['contragent']->getContactEmail());
                if (!$user) {
                    //$user = $this->setUserFields($data['contragent'], $data['rssNews'], $data['password']);
                    $user = $this->setUserFields($data['contragent'], false);
                    // если у пользователя найдены контрагенты 
                    if (count($user->getContragents())) {
                        foreach($user->getContragents() as $contragent) {
                            if ($data['contragent']->getId() != $contragent->getId()) {
                                $this->em->remove($contragent);
                            }
                        }
                    }
                    $data['contragent']->setUser($user);
                } else {
                    $contragent = $this->findContragent($data['contragent'], $user);
                    // контрагент с такими же данными найден
                    if ($contragent) {
                        // у не активного пользовтателя не может быть больше одного контакта
                        $contactId = count($contragent->getContactList()) ? $contragent->getContactList()->first()->getId() : null;
                        $data['contragent']->setId($contragent->getId());
                        $data['contact']->setId($contactId);
                        $data['contragent']->setUser($user);
                        $data['contact']->setContragent($data['contragent']);
                        //ldd($data['contact']);die();
                        //$this->em->merge($data['contragent']);
                        //$this->em->merge($data['contact']);
                    } else {
                        $this->em->detach($data['contragent']);
                        $this->em->detach($data['contact']);
                        $data['contragent']->setId(null);
                        $data['contact']->setId(null);
                        $data['contragent']->setUser($user);
                        $data['contragent']->addContactList($data['contact']);
                    }
                }
            } elseif ($this->user && !count($this->user->getContragents())) {
                //ldd('NOT forund contragents');
                $this->user->addContragent($data['contragent']);
                $data['contragent']->setUser($this->user);
            } else {
                $contragent = $this->findContragent($data['contragent'], $this->user);
                if ($contragent && $data['contragent']->getId() != $contragent->getId()) {
                    $form->get('contragent')->addError(new FormError('sameContragent'));
                }
            }
            if ($form->has('contactList') && $data['contactList'] && !$data['contact']->getId()) {
                $data['contact']->setContragent($data['contragent']);
            } else {
                $data['contragent']->addContactList($data['contact']);
            }
            // доп проверка для списка контактов потому как она по дефолту не верно отрабатывает
            if (isset($data['contactList']) && $data['contactList'] != null) {
                $validationResult = $this->validator->validate($data['contactList']);
                if ($validationResult->count()) {
                    foreach($validationResult->getIterator() as $error) {
                        $form->get('contact')->get($error->getPropertyPath())->addError(new FormError($error->getMessage()));
                    }
                }
            }
            
            //ldd($form->has('contactList'));
            /*
            $validationResult = $this->validator->validate($data['contact']);
            ld($validationResult->count());
            $validationResult2 = $this->validator->validate($data['contragent']);
            ld($validationResult2->count());
            */
            //die('after');
            
        });

    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'isIndi' => true,
            'contactList' => null,
            'contactsData' => null,
            'register' => false,
            'validator' => null
        ));
    }
    
    public function getName()
    {
        return 'cart_buyer_recipient';
    }

    /**
     * Простановка полей для юзера
     * @param Application\Sonata\UserBundle\Entity\CommonContragent $contragent
     * @param boolean $rssNews
     * @param string $password
     * @return Application\Sonata\UserBundle\Entity\User
     */
    private function setUserFields(CommonContragent $contragent, $rssNews, $password = null)
    {

        $user = ($contragent->getUser()) ? $contragent->getUser() : new User();
        $user->setUsername($contragent->getContactEmail());
        $user->setEmail($contragent->getContactEmail());
        $password = ($password) ? $password : $this->generateRandString(6);
        $user->setPlainPassword($password);
        $user->setPhone($contragent->getPhone1());
        $user->setIsRssNews($rssNews);
        $user->setEnabled(false);
        $user->setSuperAdmin(false);
        $user->setIp($this->requestStack->getCurrentRequest()->getClientIp());
        if ($contragent instanceof IndiContragent) {
            $user->setFirstName($contragent->getFirstName());
            $user->setLastName($contragent->getLastName());
        }
        $this->userManager->updateCanonicalFields($user);
        $this->userManager->updatePassword($user);

        return $user;
    }

    /**
     * Генерация рандомной строки
     * @param int $length
     * @return string
     */
    private function generateRandString($length = 4)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

        return substr(str_shuffle($chars),0,$length);

    }

    /**
     * Поиск уже имеющегося контрагента
     * @param \Application\Sonata\UserBundle\Entity\CommonContragent $curContragent
     * @param \Application\Sonata\UserBundle\Entity\User $user
     * @return type
     */
    private function findContragent(CommonContragent $curContragent, User $user)
    {
        if ($curContragent instanceof IndiContragent) {
            $contragent = $this->em->getRepository('ApplicationSonataUserBundle:IndiContragent')->findByFullName(array(
                'firstName' => $curContragent->getFirstName(),
                'lastName'  => $curContragent->getLastName(),
                'surName'   => $curContragent->getSurName()
            ), $user->getId());
        } else {
            $contragent = $this->em->getRepository('ApplicationSonataUserBundle:LegalContragent')->findByFullName($curContragent->getOrganization(), $user->getId());
        }
        return $contragent;
    }
}
