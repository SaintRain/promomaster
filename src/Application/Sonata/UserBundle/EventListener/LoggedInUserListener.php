<?php

/**
 * Перенаправляем аворизованных пользователей
 * с ненужных им страниц
 * к примеру (страница регистрации)
 *
 * @author Sergeev A.M.
 */

namespace Application\Sonata\UserBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;

class LoggedInUserListener
{

    private $router;
    private $security;
    private $session;
    //private $productLogic;
    private $container;

    public function __construct($router, $security, $session, /*$productLogic,*/ $container)
    {
        $this->router = $router;
        $this->security = $security;
        $this->session = $session;
        //$this->productLogic = $productLogic;
        $this->container = $container;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        $security = $this->security;
        $routeName = $event->getRequest()->attributes->get('_route');
        // проставляем контрагента, если он всего один
        $user = ($this->security->getToken() && $this->security->getToken()->getUser()) ? $this->security->getToken()->getUser() : null;
        if ($user && is_object($user) && !$this->session->get('current_contragent_id') && method_exists($user, 'getContragents') && $user->getContragents()->count() === 1) {
            $this->session->set('current_contragent_id', $user->getContragents()->first()->getId());
            $this->session->set('current_contragent_namespace', get_class($user->getContragents()->first()));
        }
        // Если пользователь авторизован но у него нет админских прав
        // а он пытается попасть в админские страницы, то показываем 404
        $URL = $request->server->get('PATH_INFO') ? $request->server->get('PATH_INFO') : $request->server->get('REQUEST_URI');
        // for return 404 page
        if (preg_match('/^\/admin.*/', $URL) && !$routeName) {
            return true;
        }
        if (preg_match('/^\/admin.*/', $URL) && (($security->isGranted('IS_AUTHENTICATED_ANONYMOUSLY') && !$security->isGranted('ROLE_ADMIN')) || !$security->isGranted('ROLE_ADMIN'))) {
            if ($this->container->get('kernel')->getEnvironment() === 'prod') {
                $r = new Response($this->container->get('templating')->render('TwigBundle:Exception:error404.html.twig'), 404);
                $event->setResponse ($r);
            } else {
                throw new NotFoundHttpException('Access denied! You don\'t have admin permissions!');
            }
        }

        $redirectFrom = array('fos_user_security_login', 'fos_user_registration_register'); // какие роуты закрыть
        $redirectTo = 'sonata_user_profile_show'; // куда перенаправлять
        // имя роута
        //$event->getRequest()->get('_route')
        //ldd($security->getToken()->getUSer()->getRoles());
        // имя контроллера
        //$controllerName = $event->getRequest()->attributes->get('_controller');
        // старая версия не дружит
        // if (!strpos($controllerName,'_profiler')  && $security->isGranted('IS_AUTHENTICATED_FULLY')) {
        if ($security->getToken() && $security->getToken()->getRoles()) {
            if (in_array($routeName, $redirectFrom)) {
                $url = $this->router->generate($redirectTo);
                $event->setResponse(new RedirectResponse($url));
            }
        }
    }

}
