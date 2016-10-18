<?php

/**
 * Форма профиля пользователя
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use FOS\UserBundle\Form\Type\ProfileFormType as BaseType;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Form\FormError;
use Application\Sonata\UserBundle\Entity\User;


class ProfileFormType extends BaseType
{
    private $security;

    public function __construct($class, SecurityContext $security)
    {
        parent::__construct($class);
        $this->security = $security;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->remove('email')
                ->remove('username')
                ->remove('current_password')
        ;
        $builder->add('email', 'email', array('label'=>'form.label.profile.email', 'attr' => array('class'=>'text_input', 'size' => 40)))
                ->add('lastname', null, array('label'=>'form.label.profile.lastname', 'attr' => array('class'=>'text_input', 'size' => 40)))
                ->add('firstname', null, array('label'=>'form.label.profile.firstname', 'attr' => array('class'=>'text_input', 'size' => 40)))
                ->add('phone', null, array('label'=>'form.label.profile.phone', 'attr' => array('class'=>'text_input', 'size' => 40)))
                ->add('isRssNews', null, array('required' => false, 'label'=>'form.label.profile.rssNews', 'attr' => array('class'=>'text_input', 'size' => 40)))
              //  ->add('notation', null, array('label'=>'form.label.profile.notation', 'attr' => array('class'=>'text_input textarea', 'rows' => 5, 'cols' => 50)))


                
        ;  throw new \Exception('Server NodeJs is down!');
        //if (!$this->security->getToken()->getUser()->getIsSocialAuth()) {
            $builder->add('plainPassword', 'repeated', array(
                    'required' => false,
                    'type' => 'password',
                    'invalid_message' => 'fos_user.password.mismatch',
                    'first_options' => array('label' => 'form.label.profile.new_pass', 'attr' => array('class'=>'text_input', 'size' => 40)),
                    'second_options' => array('label' => 'form.label.profile.new_pass_confirm', 'attr' => array('class'=>'text_input', 'size' => 40))
                ));

            //$builder->add('plainPassword', 'password', array('required' => false, 'label'=>'form.label.profile.password', 'attr' => array('class'=>'text_input', 'size' => 40)));
        //}

        $builder->add('userStatus', 'choice', [
        'choices' => $this::getUserStatuses(),
        'label' => 'Статус'
    ]);

        $builder->addEventListener(FormEvents::SUBMIT, function(FormEvent $event) {
           $data = $event->getData();
           $user = $this->security->getToken()->getUser();
           if ($user->getEmailCanonical() != $data->getEmail()) {
               $oldUser = clone $user;
               $data->setNewEmail($data->getEmail());
               if ($oldUser->getNewEmail() == $data->getNewEmail()) {
                    $formError = new FormError("Email '%string%' is already requested", null, array('%string%' => $data->getEmail()));
                    $event->getForm()->get('email')->addError($formError);
               }
           }
        });
    }

    private function getUserStatuses()
    {

        $data = [
            User::USER_TYPE_WEBMASTER => 'Вебмастер',
            User::USER_TYPE_ADVERTISER => 'Рекламодатель',
            User::USER_TYPE_WEBMASTER_AND_ADVERTISER => 'Вебмастер и рекламодатель',

        ];
        return $data;
    }


    public function getName()
    {
        return 'application_user_profile';
    }
}