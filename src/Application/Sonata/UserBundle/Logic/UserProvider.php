<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Application\Sonata\UserBundle\Logic;

use FOS\UserBundle\Security\UserProvider as BaseProvider;
use FOS\UserBundle\Model\User;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use FOS\UserBundle\Propel\User as PropelUser;
use Symfony\Component\Security\Core\User\UserInterface as SecurityUserInterface;

class UserProvider extends BaseProvider
{

    /**
     * {@inheritDoc}
     */
    public function refreshUser(SecurityUserInterface $user)
    {
        if (!$user instanceof User && !$user instanceof PropelUser) {
            throw new UnsupportedUserException(sprintf('Expected an instance of FOS\UserBundle\Model\User, but got "%s".', get_class($user)));
        }
        if (null === $reloadedUser = $this->userManager->findUserBy(array('id' => $user->getId()))) {
            throw new UsernameNotFoundException(sprintf('User with ID "%d" could not be reloaded.', $user->getId()));
        }

        return $reloadedUser;
    }
}
