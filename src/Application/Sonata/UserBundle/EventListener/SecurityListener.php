<?php

/**
 * Перенаправляем пользователя при авторизации
 * пример (админ и остальные)
 *
 * @author Sergeev A.M.
 */
namespace Application\Sonata\UserBundle\EventListener;


use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher;
use Symfony\Component\HttpKernel\KernelEvents;

class SecurityListener
{
    protected $router;
    protected $security;
    protected $dispatcher;
    protected $session;

    public function __construct(Router $router, SecurityContextInterface $security,  $dispatcher, Session $session)
    {
        $this->router = $router;
        $this->security = $security;
        $this->dispatcher = $dispatcher;
        //$this->session = new $session; // ???
        $this->session = $session;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $this->dispatcher->addListener(KernelEvents::RESPONSE, array($this,'onKernelResponse'));
    }
    /**
     * @link http://stackoverflow.com/questions/19505555/symfony2-remember-me-tries-to-authenticate-by-username-instad-of-email/20550520#20550520
     * @param \Symfony\Component\HttpKernel\Event\FilterResponseEvent $event
     */
    public function onKernelResponse(FilterResponseEvent $event)
    {
        $user = ($this->security->getToken() && $this->security->getToken()->getUser()) ? $this->security->getToken()->getUser() : null;
        if ($user && is_object($user) && !$this->session->get('current_contragent_id') && method_exists($user, 'getContragents') && $user->getContragents()->count() === 1) {
            $this->session->set('current_contragent_id', $user->getContragents()->first()->getId());
            $this->session->set('current_contragent_namespace', get_class($user->getContragents()->first()));
        }
        $this->session->set('firstLogin',true);
        if ($this->security->isGranted('ROLE_ADMIN')) {
            $event->getResponse()->headers->set('Location', $this->router->generate('sonata_admin_dashboard'));
        }
    }
}
