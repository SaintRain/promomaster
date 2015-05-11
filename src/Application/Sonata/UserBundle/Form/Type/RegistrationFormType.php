<?php

namespace Application\Sonata\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Application\Sonata\UserBundle\Entity\User;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->remove('username')
            ->add('firstname', null, ['label' => 'Имя'])
            ->add('lastname', null, ['label' => 'Фамилия'])
            ->add('userStatus', 'choice', [
                'choices' => $this::getUserStatuses(),
                'label' => 'Статус',
                'data' => User::USER_TYPE_WEBMASTER
            ]);
    }

    public function getName()
    {
        return 'application_user_registration';
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
}