<?php

/**
 * Обработчик формы профиля пользователя
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Form\Handler;

use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Form\Handler\ProfileFormHandler as BaseHandler;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Model\UserManagerInterface;
use Application\Sonata\UserBundle\Mailer\Mailer;
use Symfony\Component\HttpFoundation\Session\Session;

class ProfileFormHandler extends BaseHandler
{
    private $mailer;

    private $session;


    public function process(UserInterface $user)
    {
        $oldUser = clone $user;
        $this->form->setData($user);
        if ('POST' === $this->request->getMethod()) {
            $this->form->bind($this->request);
            if ($this->form->isValid()) {
                $this->getDiff($user, $oldUser);
                $this->onSuccess($user);
                return true;
            }

            // Reloads the user to reset its username. This is needed when the
            // username or password have been changed to avoid issues with the
            // security layer.
            $this->userManager->reloadUser($user);
        }

        return false;
    }

    protected function onSuccess(UserInterface $user)
    {
        
        $this->userManager->updateUser($user);
    }

    
    protected function getDiff(UserInterface $user, UserInterface $oldUser)
    {
        if ($user->getEmail() != $oldUser->getEmail()) {
            $user->setEmail($oldUser->getEmail());
            $this->mailer->sendEmailChangedMessage($user);
            $this->session->getFlashBag()->set('profile_edit_success', array('profile.edit.changeEmail.msg'));
        } else {
            $this->session->getFlashBag()->set('profile_edit_success', array('profile.edit.success'));
        }
        
    }

    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function setSession(Session $session)
    {
        $this->session = $session;
    }
}
