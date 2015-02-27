<?php

namespace Application\Sonata\Spec\UserBundle\Spec\EventListener;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Router;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Application\Sonata\UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class SecurityListenerSpec extends ObjectBehavior
{
    function let(Router $router, SecurityContextInterface $security,
        $dispatcher, Session $session)
    {
        $this->beConstructedWith($router, $security,  $dispatcher, $session);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\EventListener\SecurityListener');
    }

    function it_should_be_triggered_on_kernel_response(FilterResponseEvent $event,
        SecurityContextInterface $security,  $dispatcher, Session $session,
        UsernamePasswordToken $token, User $user,
        RedirectResponse $response,
        Router $router,  ArrayCollection $agentsCollection)
    {
        $user->getId()->willReturn(Argument::type('integer'));
        $agentsCollection->count()->willReturn(1);
        $agentsCollection->first()->willReturn($user);
        $user->getContragents()->willReturn($agentsCollection);
        $token->__toString()->willReturn(Argument::type('string'));
        $token->getUser()->willReturn($user);
        $security->getToken()->willReturn($token);
        $security->isGranted('ROLE_ADMIN')->willReturn(false);
        $this->beConstructedWith($router, $security,  $dispatcher, $session);
        $this->onKernelResponse($event);
        $session->set('current_contragent_namespace', Argument::any())
                ->shouldHaveBeenCalled();
        $session->set('current_contragent_id', Argument::any())
                ->shouldHaveBeenCalled();
        $session->set('firstLogin',true)
                ->shouldHaveBeenCalled();
    }
}
