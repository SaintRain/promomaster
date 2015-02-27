<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContext;
use FOS\UserBundle\Controller\SecurityController as BaseController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends BaseController {
    /*
     * Авторизация
     */

    public function loginAction() {
        $request = $this->container->get('request');
        /* @var $request \Symfony\Component\HttpFoundation\Request */
        $session = $request->getSession();
        /* @var $session \Symfony\Component\HttpFoundation\Session\Session */

        // get the error if any (works with forward and redirect -- see below)
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = '';
        }

        if ($error) {
            // TODO: this is a potential security risk (see http://trac.symfony-project.org/ticket/9523)
            $error = $error->getMessage();
        }
        // last username entered by the user
        $lastUsername = (null === $session) ? '' : $session->get(SecurityContext::LAST_USERNAME);

        $csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('authenticate');

        $form = $this->container->get('fos_user.registration.form');
        return $this->renderLogin(array(
                    'last_username' => $lastUsername,
                    'error' => $error,
                    'csrf_token' => $csrfToken,
                    'form' => $form->createView()
        ));
    }

    public function changeEmailAction($hash) {
        $authUser = $this->container->get('security.context')->getToken();
        $em = $this->container->get('doctrine.orm.entity_manager');
        $user = $em->getRepository('ApplicationSonataUserBundle:User')->findOneBy(array('newEmailHash' => $hash));
        if (null === $user) {
            throw new NotFoundHttpException(sprintf('The user with activation hash "%s" does not exist', $hash));
        }
        $user->setEmail($user->getNewEmail());
        $user->setUsername($user->getNewEmail());
        $user->setUsernameCanonical($user->getNewEmail());
        $user->setNewEmailHash(null);
        $user->setNewEmail(null);
        $user->setLastLogin(new \DateTime());

        $this->container->get('fos_user.user_manager')->updateUser($user);
        $this->container->get('session')->getFlashBag()->set('profile_edit_success', 'profile.edit.changeEmail.success');
        $response = new RedirectResponse($this->container->get('router')->generate('sonata_user_profile_show'));

        return $response;
    }

    /**
     * @link http://www.olikids-kni.ru.vm/app_dev.php/login-order-mB0Dp25k2i3kD2XxS0WwF76lA-xaTCgxkBfskbE_kgA-377.html
     * @param type $orderId
     * @param type $token
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws NotFoundHttpException 
     */

    public function loginForOrderAction($token, $orderId) {

        $authToken = $this->container->get('security.context')->getToken();
        $em = $this->container->get('doctrine.orm.entity_manager');
        if (is_object($authToken->getUser()) && $authToken->getUser() instanceof UserInterface) {
            $user = $em->getRepository('ApplicationSonataUserBundle:User')->findForOrderLogin($orderId, null, $authToken->getUser()->getId());
            if ($user) {
                $url = $this->container->get('router')->generate('application_sonata_user_profile_order', array('id' => $orderId));
                $response = new RedirectResponse($url);
                return $response;
            } else {
                throw new NotFoundHttpException(sprintf('Page Not Found'));
            }
        }

        $user = $em->getRepository('ApplicationSonataUserBundle:User')->findForOrderLogin($orderId, $token);
        if (!$user) {
            throw new NotFoundHttpException(sprintf('Page Not Found'));
        }
        $form = $this->container->get('fos_user.resetting.form');
        $formHandler = $this->container->get('fos_user.resetting.form.handler');
        $process = $formHandler->process($user);

        if ($process) {
            $this->container->get('session')->getFlashBag()->set('fos_user_success', 'resetting.flash.success');
            $url = $this->container->get('router')->generate('application_sonata_user_profile_order', array('id' => $orderId));
            $response = new RedirectResponse($url);
            //$this->authenticateUser($user, $response);
            //ldd('dfdf');
            $loginToken = new UsernamePasswordToken($user, $user->getPassword(), $this->container->getParameter('fos_user.firewall_name'), $user->getRoles());
            $this->container->get('security.context')->setToken($loginToken);

            return $response;
        }

        return $this->container->get('templating')->renderResponse('ApplicationSonataUserBundle:Security:login_for_order.html.twig', array(
                    'token' => $token,
                    'orderId' => $orderId,
                    'form' => $form->createView(),
        ));
    }

    protected function authenticateUser(UserInterface $user, Response $response) {
        try {
            $this->container->get('fos_user.security.login_manager')->loginUser(
                    $this->container->getParameter('fos_user.firewall_name'), $user, $response);
        } catch (AccountStatusException $ex) {
            // We simply do not authenticate users which do not pass the user
            // checker (not enabled, expired, etc.).
        }
    }


    /**
     * Авторизация по прямой ссылке с использованием купона доступа
     * @param type $uid
     * @param type $hash
     */
    public function couponAccessAuthenticateAction($uid, $hash) {
        $request = $this->container->get('request');
        $targetUrl = $this->container->get('application_user_auth_logic')->couponAccessAuthenticate($uid, $hash, $request);

        if ($targetUrl) {   //если купон найден
            $response=new RedirectResponse($targetUrl);
        } else {
            $response=new RedirectResponse($this->container->get('router')->generate('fos_user_security_login'));
        }
        
        return $response;
    }
    
    public function adminLoginAction()
    {

        $token = $this->container->get('security.context')->getToken();
        if (is_object($token->getUser()) && $token->getUser() instanceof UserInterface) {
            $answer = ['result' => true, 'body' => 'OK'];
        } else {
            $request = $this->container->get('request_stack')->getCurrentRequest();

            $em = $this->container->get('doctrine.orm.entity_manager');
            $user = $em->getRepository('ApplicationSonataUserBundle:User')->findAdminForLogin($request->request->get('email'));
            
            if ($user && $user->hasRole('ROLE_ADMIN')) {
                $authInfo = ['user' => $user, 'ip' => $request->getClientIp(), 'network' => false];
                $this->container->get('application_user_logic')->logUserInfo($authInfo);
                $authToken = new UsernamePasswordToken($user, $user->getPassword(), $this->container->getParameter('fos_user.firewall_name'), $user->getRoles());
                $this->container->get('security.context')->setToken($authToken);
                $answer = ['result' => true, 'body' => 'OK'];
            } else {
                $answer = ['result' => false, 'body' => 'BAD'];
            }
        }

        $response = new Response(json_encode($answer));
        $response->headers->set('Content-Type', 'application/json');

        return new Response(json_encode($answer));
    }

}
