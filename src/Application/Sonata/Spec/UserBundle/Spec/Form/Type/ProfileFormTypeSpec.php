<?php

namespace Application\Sonata\Spec\UserBundle\Spec\Form\Type;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormEvents;
use Application\Sonata\UserBundle\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class ProfileFormTypeSpec extends ObjectBehavior
{
    function let(SecurityContext $securityContext)
    {
        $this->beConstructedWith(
            Argument::exact('Application\Sonata\UserBundle\Entity\User'),
            $securityContext);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\Form\Type\ProfileFormType');
    }

    function it_a_fos_user_form_type()
    {
        $this->shouldBeAnInstanceOf('FOS\UserBundle\Form\Type\ProfileFormType');
    }

    function it_should_have_a_proper_name()
    {
        $this->getName()->shouldReturn('application_user_profile');
    }

    function it_should_build_form_with_proper_fields(FormBuilder $builder, 
        User $user, UsernamePasswordToken $token, SecurityContext $securityContext)
    {
        $user->getIsSocialAuth()->willReturn(false);
        $token->getUser()->willReturn($user);
        $securityContext->getToken()->willReturn($token);

        $builder
            ->add('plainPassword', 'repeated', Argument::any())
            ->willReturn($builder);

        $builder
            ->add('current_password', 'password', Argument::any())
            ->willReturn($builder);
        
        $builder
            ->add('username', null, Argument::any())
            ->willReturn($builder);

        $builder->remove('email')->willReturn($builder);
        $builder->remove('username')->willReturn($builder);
        $builder->remove('current_password')->willReturn($builder);

        $builder
            ->add('email', 'email', Argument::any())
            ->willReturn($builder);

        $builder
            ->add('lastname', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('firstname', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('phone', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('isRssNews', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->add('notation', null, Argument::any())
            ->willReturn($builder);

        $builder
            ->addEventListener(FormEvents::SUBMIT, Argument::type('\Closure'))
            ->willReturn($builder);

        $this->beConstructedWith(
                Argument::exact('Application\Sonata\UserBundle\Entity\User'),
                $securityContext);
        $this->buildForm($builder, array());

    }
}
