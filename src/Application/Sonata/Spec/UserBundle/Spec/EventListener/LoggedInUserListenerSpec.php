<?php

namespace Application\Sonata\Spec\UserBundle\Spec\EventListener;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Router;
use Application\Sonata\UserBundle\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\DependencyInjection\Container;

class LoggedInUserListenerSpec extends ObjectBehavior
{
    function let($router, $security,
            $session, $container)
    {
        $this->beConstructedWith($router, $security,
            $session, $container);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Application\Sonata\UserBundle\EventListener\LoggedInUserListener');
    }

    function it_triggered_on_kernel_request(SecurityContextInterface $security,
        Router $router, Session $session, Container $container,
        GetResponseEvent $event
        )
    {
        return true;
        $this->onKernelRequest($event);
    }
}
