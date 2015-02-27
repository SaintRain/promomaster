<?php

/**
 * Трейт отвечающий за контекст пользователя
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
namespace Application\Sonata\UserBundle\Features\Context;

use Behat\Gherkin\Node\TableNode;
use Application\Sonata\UserBundle\Entity\User;
use FOS\UserBundle\Model\UserManagerInterface;

trait UserFeatureContext
{
    /**
     * @Given there no user with email :arg1
     */
    public function thereNoUserWithEmail($arg1)
    {
        $result = $this->em->getRepository('ApplicationSonataUserBundle:User')
            ->findOneBy(['email' => $arg1]);
        if ($result) {
            $this->em->remove($result);
            $this->em->flush();
        }
    }

    /**
     * @Given there is a user with:
     */
    public function thereIsAUserWith(TableNode $table)
    {
        $fields = [];

        foreach ($table as $row) {
            $fields[$row['field']] = $row['value'];
        }

        $user = $this->em
            ->getRepository('ApplicationSonataUserBundle:User')
            ->findOneBy(['email' => $fields['email']]);

        if (!$user) {
            $user = new User();
            $user->setEmail($fields['email']);
            $user->setPlainPassword($fields['plainPassword']);
            $user->setUsername($fields['username']);
            if (isset($fields['confirmationToken'])) {
                $user->setConfirmationToken($fields['confirmationToken']);
            }
            if (isset($fields['firstname'])) {
                $user->setFirstname($fields['firstname']);
            }
            if (isset($fields['lastname'])) {
                $user->setLastname($fields['lastname']);
            }
            if (isset($fields['website'])) {
                $user->setWebsite($fields['website']);
            }
            if (isset($fields['notation'])) {
                $user->setNotation($fields['notation']);
            }
            if (isset($fields['phone'])) {
                $user->setPhone($fields['phone']);
            }

            if(isset($fields['enabled'])) {
                $user->setEnabled($fields['enabled']);
            }
            if (isset($fields['passwordRequestedAt'])) {
                $user->setPasswordRequestedAt(new \DateTime());
            }
            if (isset($fields['newEmailHash'])) {
                $user->setNewEmailHash($fields['newEmailHash']);
            }
            if (isset($fields['newEmail'])) {
                $user->setNewEmail($fields['newEmail']);
            }
            $this->userManager->updateCanonicalFields($user);
            $this->userManager->updatePassword($user);
            $this->em->persist($user);
            $this->em->flush();
        }
    }

    /**
     * @Given I am on user with email :value :uri page
     */
    public function iAmOnUserWithEmailPage($value, $uri)
    {
        $user = $this->em
            ->getRepository('ApplicationSonataUserBundle:User')
            ->findOneBy(['email' => $value]);
        if ($user) {
            $this->visit(sprintf($uri, $user->getId()));
        } else {
            throw new \Exception(sprintf('User with email "%s" not found', $value));
        }
    }

    /**
     * @When I am on user with email :value registration confiramtion :uri page
     */
    public function iAmOnUserWithEmailRegistrationConfiramtionPage($value, $uri)
    {
        $user = $this->em
            ->getRepository('ApplicationSonataUserBundle:User')
            ->findOneBy(['email' => $value]);
        if ($user) {
            $this->visit(sprintf($uri, $user->getConfirmationToken()));
        } else {
            throw new \Exception(sprintf('User with email "%s" not found', $value));
        }
    }

    /**
     * @When I am on user with email :value password recovery :uri page
     */
    public function iAmOnUserWithEmailPasswordRecoveryPage($value, $uri)
    {
        $user = $this->em
            ->getRepository('ApplicationSonataUserBundle:User')
            ->findOneBy(['email' => $value]);
        if ($user) {
            $this->visit(sprintf($uri, $user->getConfirmationToken()));
        } else {
            throw new \Exception(sprintf('User with email "%s" not found', $value));
        }
    }

    /**
     * @When I am on user with email :value email confimation :uri page
     */
    public function iAmOnUserWithEmailEmailConfimationPage($value, $uri)
    {
        $user = $this->em
            ->getRepository('ApplicationSonataUserBundle:User')
            ->findOneBy(['email' => $value]);
        if ($user) {
            $this->visit(sprintf($uri, $user->getNewEmailHash()));
        } else {
            throw new \Exception(sprintf('User with email "%s" not found', $value));
        }
    }


    /**
     * @Given I am login as :email with :password
     */
    public function iAmLoginAs($email, $password)
    {

        $this->visit('login.html');
        $this->fillField('username', $email);
        $this->fillField('password', $password);
        $this->pressButton('_submit');
        $this->visit('/');
    }
}