<?php

/**
 * Обработчик формы востановления пароля
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Form\Handler;

use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Form\Handler\ResettingFormHandler as BaseHandler;

class ResettingFormHandler extends BaseHandler
{
    protected function onSuccess(UserInterface $user)
    {
        $user->setPlainPassword($this->getNewPassword());
        $user->setConfirmationToken(null);
        $user->setIsSocialAuth(false);
        $user->setPasswordRequestedAt(null);
        $user->setEnabled(true);
        $this->userManager->updateUser($user);
    }
}
