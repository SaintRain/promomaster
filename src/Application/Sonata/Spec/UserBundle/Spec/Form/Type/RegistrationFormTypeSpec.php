<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormEvents;
use Application\Sonata\UserBundle\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class RegistrationFormTypeSpec extends ObjectBehavior
{
    function let(SecurityContext $securityContext)
    {
        $this->beConstructedWith(
            Argument::exact('Application\Sonata\UserBundle\Entity\User'),
            $securityContext);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Form\Type\RegistrationFormType');
    }

    function it_a_fos_user_form_type()
    {
        $this->shouldBeAnInstanceOf('FOS\UserBundle\Form\Type\RegistrationFormType');
    }

    function it_should_have_a_proper_name()
    {
        $this->getName()->shouldReturn('application_user_registration');
    }

    function it_should_build_form_with_proper_fields(FormBuilder $builder)
    {
        $builder
            ->add('username', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('email', 'email', Argument::any())
            ->willReturn($builder);

        $builder
            ->add('plainPassword', 'repeated', Argument::any())
            ->willReturn($builder);

        $builder
            ->remove('username')
            ->willReturn($builder);

        $this->buildForm($builder, array());
    }
}
