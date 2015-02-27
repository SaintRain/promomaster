<?php

namespace Application\Sonata\UserBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use Application\Sonata\UserBundle\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\HttpFoundation\Response;
use FOS\UserBundle\Model\UserInterface;

class RegistrationController extends BaseController
{

    public function registerAction()
    {
        $form = $this->container->get('fos_user.registration.form');
        $formHandler = $this->container->get('fos_user.registration.form.handler');
        $confirmationEnabled = $this->container->getParameter('fos_user.registration.confirmation.enabled');

        $process = $formHandler->process($confirmationEnabled);

        if ($process) {

            $user = $form->getData();

            $authUser = false;
            if ($confirmationEnabled) {
                $this->container->get('session')->set('fos_user_send_confirmation_email/email', $user->getEmail());
                $route = 'fos_user_registration_check_email';
            } else {
                $authUser = true;
                $route = 'fos_user_registration_confirmed';
            }

            $this->setFlash('fos_user_success', 'registration.flash.user_created');
            $url = $this->container->get('router')->generate($route);
            $response = new RedirectResponse($url);

            if ($authUser) {
                $this->authenticateUser($user, $response);
            }

            return $response;
        }

        return $this->container->get('templating')->renderResponse('FOSUserBundle:Registration:register_content.html.'.$this->getEngine(), array(
            'form' => $form->createView(),
        ));
    }

    /**
     * Авторизация через соц. сети
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @see http://ulogin.ru/custom_buttons_example.php
     * @see https://ulogin.ru/help.php#buttons
     */
    public function socialAuthAction(Request $request)
    {
        $translator = $this->container->get('translator');
        $context = $this->container->get('security.context');
        $refresh = $request->query->get('refresh');

        if ($context->getToken() && $context->getToken()->getUser() instanceof UserInterface) {
            $answer = array(
                'errors' => true,
                'msg' => 'Вы уже авторизованы'
            );
        } else {
            $result = $request->request->all();
            if (((int)$result['verified_email']) < 0) {
                $answer = array(
                    'errors' => true,
                    'msg' => 'Email не подтвержден'
                );
            } else {
                $em = $this->container->get('doctrine.orm.entity_manager');
                $user = $em->getRepository('ApplicationSonataUserBundle:User')->findOneBy(array('email' => $result['email']));
                if ($user && (!$user->isEnabled() || $user->isLocked())) {
                    $msgString = ($user->isLocked()) ? 'User account is locked.' : 'User account is disabled.';
                    $answer = array(
                        'errors' => true,
                        'msg' => $translator->trans($msgString, [], 'FOSUserBundle')
                    );
                } else {
                    if (!$user) {
                        $user = new User();
                        $user->setUsername($result['email']);
                        $user->setEmail($result['email']);
                        $user->setPlainPassword($this->generateRandString(6));
                        if (isset($result['phone'])) {
                            $user->setPhone($result['phone']);
                        }
                        if (isset($result['last_name'])) {
                            $user->setLastname($result['last_name']);
                        }
                        if (isset($result['first_name'])) {
                            $user->setFirstName($result['first_name']);
                        }
                        $user->setEnabled(true);
                        $user->setIsSocialAuth(true);
                        $user->setSuperAdmin(false);
                        $user->setIp($request->getClientIp());
                        $this->container->get('fos_user.user_manager')->updateUser($user);
                    }

                    $authInfo = ['user' => $user, 'ip' => $request->getClientIp(), 'network' => $result['network']];
                    $this->container->get('application_user_logic')->logUserInfo($authInfo);

                    $authToken = new UsernamePasswordToken($user, $user->getPassword(), $this->container->getParameter('fos_user.firewall_name'), $user->getRoles());

                    $context->setToken($authToken);
                    $this->container->get('application_user_auth_logic')->setDefaultContragent();
                    $url = ($context->isGranted('ROLE_ADMIN')) ? $this->container->get('router')->generate('sonata_admin_dashboard', array(), true) : $this->container->get('router')->generate('sonata_user_profile_show', array(), true);
                    $answer = array(
                        'errors' => false,
                        'route' => ($refresh * 1) ? false : $url
                    );
                }
                
            }
        }
        
        $response = new Response(json_encode($answer));
        $response->headers->set('Content-Type', 'application/json');

        return new Response(json_encode($answer));
    }

    /**
     * Генерация рандомной строки
     * @param int $length
     * @return string
     */
    private function generateRandString($length = 4)
    {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

        return substr(str_shuffle($chars),0,$length);

    }
}