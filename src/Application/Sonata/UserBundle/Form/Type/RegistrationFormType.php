<?php

namespace Application\Sonata\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->remove('username')
        ->add('firstname', null, ['label'=>'Имя'])
            ->add('lastname', null, ['label'=>'Фамилия']);
    }

    public function getName()
    {
        return 'application_user_registration';
    }
}