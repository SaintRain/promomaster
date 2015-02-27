<?php


namespace Application\Sonata\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccountStatusException;
use FOS\UserBundle\Model\UserInterface;

use FOS\UserBundle\Controller\ResettingController as BaseController;

/**
 * Controller managing the resetting of the password
 *
 * @author Thibault Duplessis <thibault.duplessis@gmail.com>
 * @author Christophe Coevoet <stof@notk.org>
 */
class ResettingController extends BaseController
{

    /**
     * Отличиние от оригинального метода в формировании email
     * $this->container->get('session')->set(static::SESSION_EMAIL, $user->getEmail()); vs $this->container->get('session')->set(static::SESSION_EMAIL, $this->getObfuscatedEmail($user));
     * Request reset user password: submit form and send email
     */
    public function sendEmailAction()
    {
        $username = $this->container->get('request')->request->get('username');

        /** @var $user UserInterface */
        $user = $this->container->get('fos_user.user_manager')->findUserByUsernameOrEmail($username);

        if (null === $user) {
            return $this->container->get('templating')->renderResponse('FOSUserBundle:Resetting:request.html.'.$this->getEngine(), array('invalid_username' => $username));
        }

        if ($user->isPasswordRequestNonExpired($this->container->getParameter('fos_user.resetting.token_ttl'))) {
            return $this->container->get('templating')->renderResponse('FOSUserBundle:Resetting:passwordAlreadyRequested.html.'.$this->getEngine());
        }

        if (null === $user->getConfirmationToken()) {
            /** @var $tokenGenerator \FOS\UserBundle\Util\TokenGeneratorInterface */
            $tokenGenerator = $this->container->get('fos_user.util.token_generator');
            $user->setConfirmationToken($tokenGenerator->generateToken());
        }
        $this->container->get('session')->set(static::SESSION_EMAIL, $user->getEmail());
        $this->container->get('fos_user.mailer')->sendResettingEmailMessage($user);
        $user->setPasswordRequestedAt(new \DateTime());
        $this->container->get('fos_user.user_manager')->updateUser($user);

        return new RedirectResponse($this->container->get('router')->generate('fos_user_resetting_check_email'));
    }
    
    /**
     * Восстановление пароля ajax
     * @throws \Exception
     */
    public function sendEmailAjaxAction()
    {
        if (!$this->container->get('request')->isXmlHttpRequest()) {
            throw new \Exception('Access denied');
        }
        
        $username = $this->container->get('request')->request->get('username');

        /** @var $user UserInterface */
        $user = $this->container->get('fos_user.user_manager')->findUserByUsernameOrEmail($username);

        if (null === $user) {
            $message = $this->container->get('translator')->trans('resetting.request.invalid_username', array('%username%' => $username), 'FOSUserBundle');
            $success = false;
        } elseif ($user->isPasswordRequestNonExpired($this->container->getParameter('fos_user.resetting.token_ttl'))) {
            $message =  $this->container->get('translator')->trans('resetting.password_already_requested', array(), 'FOSUserBundle');
            $success = false;
        } else {
            if (null === $user->getConfirmationToken()) {
            /** @var $tokenGenerator \FOS\UserBundle\Util\TokenGeneratorInterface */
                $tokenGenerator = $this->container->get('fos_user.util.token_generator');
                $user->setConfirmationToken($tokenGenerator->generateToken());
            }

            $this->container->get('session')->set(static::SESSION_EMAIL, $user->getEmail());
            $this->container->get('fos_user.mailer')->sendResettingEmailMessage($user);
            $user->setPasswordRequestedAt(new \DateTime());
            $this->container->get('fos_user.user_manager')->updateUser($user);
            
            $message = $this->container->get('translator')->trans('resetting.check_email', array('%email%' => $username), 'FOSUserBundle');
            $success = true;
        }

        $result = array('success' => $success, 'message' => $message);
        
        $response = new Response(json_encode($result));

        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
    
    
    /**
     * Generate the redirection url when the resetting is completed.
     *
     * @param \FOS\UserBundle\Model\UserInterface $user
     *
     * @return string
     */
    protected function getRedirectionUrl(UserInterface $user)
    {
        return $this->container->get('router')->generate('sonata_user_profile_show');
    }
    
}
