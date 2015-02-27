<?php

/**
 * Обработчик авторизации (c возможность ajax)
 * @author  Kaluzhny. N.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Logic;

use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Application\Sonata\UserBundle\Logic\UserLogic;
use Application\Sonata\UserBundle\Entity\CouponAccess;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class AuthenticationLogic implements AuthenticationSuccessHandlerInterface, AuthenticationFailureHandlerInterface, LogoutSuccessHandlerInterface {

    protected $router;
    protected $translator;
    protected $security;
    protected $session;
    protected $userLogic;
    protected $em;
    protected $params;

    public function __construct(RouterInterface $router, Translator $translator, SecurityContext $security, Session $session, UserLogic $userLogic, $em, $params) {
        $this->router = $router;
        $this->translator = $translator;
        $this->security = $security;
        $this->session = $session;
        $this->userLogic = $userLogic;
        $this->em = $em;
        $this->params = $params;
    }

    /**
     * Если у пользователя один контрагент устанавливаем его по дефолту        
     */
    public function setDefaultContragent() {
        $this->session->remove('current_contragent_namespace');
        $this->session->remove('current_contragent_id');
        $this->session->remove('current_contact_id');

        // Если у пользователя один контрагент устанавливаем его по дефолту
        $user = $this->security->getToken()->getUser();
        if (method_exists($user, 'getContragents') && $user->getContragents()->count() === 1) {
            $this->session->set('current_contragent_id', $user->getContragents()->first()->getId());
            $this->session->set('current_contragent_namespace', get_class($user->getContragents()->first()));
        }
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token) {
        // Если у пользователя один контрагент устанавливаем его по дефолту        
        $this->setDefaultContragent();
        $user = $this->security->getToken()->getUser();

        $authInfo = ['user' => $user, 'ip' => $request->getClientIp(), 'network' => false];
        $this->userLogic->logUserInfo($authInfo);

        if ($request->isXmlHttpRequest()) {
            if ($this->security->isGranted('ROLE_ADMIN')) {
                $targetPath = $this->router->generate('sonata_admin_dashboard', array(), true);
            } else {
                $targetPath = $request->getSession()->get('_security.target_path');
            }

            $result = array('success' => true, 'url' => $targetPath);
            $response = new Response(json_encode($result));

            $response->headers->set('Content-Type', 'application/json');
        } else {

            if ($request->cookies->get('redirect')) {
                $url = $request->cookies->get('redirect');
            } elseif ($targetPath = $request->getSession()->get('_security.target_path')) {
                $url = $targetPath;
            } else {
                $url = $this->router->generate('sonata_user_profile_show');
            }

            $response = new RedirectResponse($url);
        }

        if ($request->cookies->get('redirect')) {
            $response->headers->clearCookie('redirect');
        }

        return $response;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception) {
        if ($request->isXmlHttpRequest()) {
            $message = $this->translator->trans($exception->getMessage(), array(), 'FOSUserBundle');
            $result = array('success' => false, 'message' => $message);
            $response = new Response(json_encode($result));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        } else {
            $error = $request->getSession()->set(SecurityContext::AUTHENTICATION_ERROR, $exception);
            $url = $this->router->generate('fos_user_security_login');
            return new RedirectResponse($url);
        }
    }

    /**
     * Метод отрабатывает при успешлом logout'е\
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @author Sergeev A.M.
     */
    public function onLogoutSuccess(Request $request) {
        // Полностью очищаем сессию
        $this->session->clear();
        $referer = ($request->headers->get('referer') && !preg_match('/admin\//', $request->headers->get('referer'))) ? $request->headers->get('referer') : $this->router->generate('core_common_index');

        return new RedirectResponse($referer);
    }

    /**
     * Создание купона доступа
     * @param type $user
     * @param type $url
     */
    public function createCouponAccess($user, $url, $need_flush = true) {

        $hash = hash('sha512', $user->getEmail() . ' ' . $user->getPassword() . ' ' . $this->params['secret'].' '.time());
        $target = $this->router->generate('application_sonata_user_coupon_access', array('hash' => $hash, 'uid' => $user->getId()));
        $resUrl = 'http://' . $this->params['domain_ru'] .  $target;

        //если есть ранее созданный купон
        $couponAccess = $this->em->getRepository('ApplicationSonataUserBundle:CouponAccess')
                ->findByURL($user->getId(), $url);

        if ($couponAccess) {
            $couponAccess->setCreatedAt(new \DateTime());   //обновляем время создания            
        } else {
            $couponAccess = new CouponAccess;
        }

        $couponAccess->setUser($user)
                ->setUrl($url)
                ->setHash($hash);

        $this->em->persist($couponAccess);
            
        if ($need_flush) {
            $this->em->flush();
        } 
 
        return $resUrl;
    }

    /**
     * couponAccessAuthenticate
     * @param type $user
     * @param type $url
     */
    public function couponAccessAuthenticate($uid, $hash, $request) {
        $res = $this->em->getRepository('ApplicationSonataUserBundle:CouponAccess')->findByHash($uid, $hash);

        if ($res) {
            //авторизуем пользователя            
            $user = $this->em->getRepository('ApplicationSonataUserBundle:User')->findOneById($uid);

            if ($user && $user->isEnabled() && !$user->isLocked()) {
                //пишем логи
                $authInfo = ['user' => $user, 'ip' => $request->getClientIp(), 'network' => 'По прямой ссылке'];
                $this->userLogic->logUserInfo($authInfo);

                $authToken = new UsernamePasswordToken($user, $user->getPassword(), $this->params['fos_user.firewall_name'], $user->getRoles());
                $this->security->setToken($authToken);
                $this->setDefaultContragent();
            }

            //удаляем из базы использованный купон            
            $this->em->remove($res);
            $this->em->flush();
            $resUrl = $res->getUrl();
        } else {
            $resUrl = false;
        }

        return $resUrl;
    }

}
