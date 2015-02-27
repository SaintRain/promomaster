<?php

/**
 * Обработчик формы регистрации пользователя
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Form\Handler;

use FOS\UserBundle\Model\UserManagerInterface;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Mailer\MailerInterface;
use FOS\UserBundle\Util\TokenGeneratorInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

use FOS\UserBundle\Form\Handler\RegistrationFormHandler as BaseHandler;

class RegistrationFormHandler extends BaseHandler
{
    /**
     * @param boolean $confirmation
     */
    protected function onSuccess(UserInterface $user, $confirmation)
    {
        if ($confirmation) {
            $user->setEnabled(false);
            $user->setIp($this->request->getClientIp());
            if (null === $user->getConfirmationToken()) {
                $user->setConfirmationToken($this->tokenGenerator->generateToken());
            }

            $this->mailer->sendConfirmationEmailMessage($user);
        } else {
            $user->setEnabled(true);
        }

        $this->userManager->updateUser($user);
    }
}
