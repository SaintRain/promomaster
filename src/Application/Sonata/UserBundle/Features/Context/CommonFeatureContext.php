<?php

/**
 * Общий контекст в рамках бандла
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Features\Context;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;
use Core\CommonBundle\Features\Context\CommonFeatureContext as ComonContext;
use Doctrine\ORM\EntityManagerInterface;
use Behat\Behat\Context\SnippetAcceptingContext;

use Application\Sonata\UserBundle\Entity\User;
use FOS\UserBundle\Model\UserManagerInterface;

use Application\Sonata\UserBundle\Entity\IndiContragent;
use Application\Sonata\UserBundle\Entity\LegalContragent;

use Application\Sonata\UserBundle\Entity\IndiContact;
use Application\Sonata\UserBundle\Entity\LegalContact;

class CommonFeatureContext extends ComonContext implements SnippetAcceptingContext
{
    use UserFeatureContext;
    
    protected $em;

    protected $userManager;

    public function __construct(EntityManagerInterface $em, UserManagerInterface $userManager)
    {
        $this->em = $em;
        $this->userManager = $userManager;
    }

    /**
     * @Given there no contragents for user with email :value
     */
    public function thereNoContragentsForUserWithEmail($value)
    {
        $user = $this->em->getRepository('ApplicationSonataUserBundle:User')
            ->findOneBy(['email'=>$value]);
        if (!$user) {
            throw new \Exception(sprintf('User with email "%s" not found', $value));
        } else {
            $contragents = $this->em
                ->getRepository('ApplicationSonataUserBundle:CommonContragent')
                ->findBy(['user'=>$user]);
            if (count($contragents)) {
                foreach ($contragents as $val) {
                    $this->em->remove($val);
                }
                $this->em->flush();
            }
        }
    }

    /**
     * @Given there is a contragent with:
     */
    public function thereIsAContragentWith(TableNode $table)
    {
        $fields = [];
        foreach($table as $row) {
            $fields[$row['field']] = $row['value'];
        }
        $contragent = $this->em
            ->getRepository('ApplicationSonataUserBundle:CommonContragent')
            ->findOneBy(['contactEmail' => $fields['contactEmail']]);
        if (!$contragent) {
            $user = $this->getUser($fields['user']);
            $contragent = (isset($fields['isIndi'])) ? new IndiContragent() : new LegalContragent();
            $contragent->setPhone1($fields['phone1'])
                    ->setPhone2($fields['phone2'])
                    ->setPhone3($fields['phone3'])
                    ->setContactEmail($fields['contactEmail'])
                    ->setUser($user)
            ;
            if (isset($fields['isIndi'])) {
                $contragent->setLastName($fields['lastName'])
                    ->setFirstName($fields['firstName'])
                    ->setSurName($fields['surName'])
                ;
            } else {
                $bank = $this->em->getRepository('CoreLogisticsBundle:Bank')
                        ->findOneBy(['bic' => $fields['bank']]);
                if (!$bank) {
                    throw new Exception(sprintf('Bank with bic "%s" not found', $fields['bank']));
                }
                $lefalForm = $this->em->getRepository('CoreDirectoryBundle:LegalForm')
                        ->findOneBy(['name' => $fields['legalForm']]);

                if (!$bank) {
                    throw new Exception(sprintf('A legal form with system name "%s" not found', $fields['legalForm']));
                }
                $contragent->setInn($fields['inn'])
                        ->setOgrn($fields['ogrn'])
                        ->setLegalForm($lefalForm)
                        ->setBank($bank)
                        ->setCorrAccount($fields['corrAccount'])
                        ->setBankAccount($fields['bankAccount'])
                        ->setChiefFio($fields['chiefFio'])
                        ->setChiefPosition($fields['chiefPosition'])
                        ->setAddressLegal($fields['addressLegal'])
                        ->setAddressPost($fields['addressPost'])
                        ->setOrganization($fields['organization'])
                        ->setContactFio($fields['contactFio'])
                        ->setSite($fields['site'])
                ;
            }
            $this->em->persist($contragent);
            $this->em->flush();
        }
    }

    /**
     * @Given I am on contragent with email :value :uri page
     */
    public function iAmOnContragentWithEmailPage($value, $uri)
    {
        $contragent = $this->getContragent($value);
        $this->visit(sprintf($uri, $contragent->getId()));
    }

    /**
     * @Given I am on contragent with email :arg1 :arg2 frontend page
     */
    public function iAmOnContragentWithEmailFrontendPage($value, $uri)
    {
        $contragent = $this->getContragent($value);

        if ($contragent instanceof IndiContragent) {
            $isIndi = 1;
        } else {
            $isIndi = 0;
        }
        $this->visit(sprintf($uri, $isIndi, $contragent->getId()));
    }

    public function getContragent($value)
    {
       $contragent = $this->em
            ->getRepository('ApplicationSonataUserBundle:CommonContragent')
            ->findOneBy(['contactEmail' => $value]);
       if (!$contragent) {
           throw new \Exception(sprintf('Contragent with email "%s" not found', $value));
       }

       return $contragent;
    }

    public function getUser($email) {
        $user = $this->em->getRepository('ApplicationSonataUserBundle:User')
            ->findOneBy(['email'=>$email]);
        if (!$user) {
            throw new \Exception(sprintf('User with email "%s" not found', $email));
        }
        return $user;
    }

    /**
     * @Given I check :arg1 from contragents type
     */
    public function iCheckFromContragentsType($arg1)
    {
        $xpath = null;
        foreach ($this->getSession()->getPage()->findAll('css', '#contragent_type span') as $radio) {
            if ($radio->getText() == $arg1) {
                $xpath = $radio->getXpath();
            }
        }

        if (null == $xpath) {
            throw new \Exception(sprintf('Radio button with "%s" not found', $arg1));
        }
        $this->getSession()->getDriver()->click($xpath);
        $this->getSession()->wait(100);
        return true;
    }

    /**
     * @When fill :value in masked :id
     */
    public function fillInMasked($value, $id)
    {
        $this->getSession()->getDriver()
            ->executeScript(sprintf('$(\'#%s\').val(\'%s\')', $id, $value));
    }


    /**
     * @When I submit visible form
     */
    public function iSubmitVisibleForm()
    {
        $page = $this->getSession()->getPage();
        $element = $page->find('css',".normal button");
        $element->click();
    }

    //////
    //contact
    //////

    /**
     * @Given there is no individual contact with :arg1
     */
    public function thereIsNoIndividualContactWith($arg1)
    {
        $result = $this->em
            ->getRepository('ApplicationSonataUserBundle:IndiContact')
            ->findOneBy(['contactEmail' => $arg1]);
        if ($result) {
            $this->em->remove($result);
            $this->em->flush();
        }
    }

    /**
     * @Given I follow in form :arg1
     */
    public function iFollowInForm($arg1)
    {
        $isFind = false;
        foreach($this->getSession()->getPage()->findAll('css', 'form a') as $link) {
            if ($link->getAttribute('title') == $arg1 || $link->getText() == $arg1) {
                $link->click();
                $isFind = true;
                break;
            }
        }

        if (!$isFind) {
            throw new \Exception(sprintf('Link with text or title "%s" not found', $arg1));
        }
    }

    /**
     * @When I fill in :arg1 block the following:
     */
    public function iFillInBlockTheFollowing($arg1, TableNode $table)
    {
        $curLabel = null;
        foreach($this->getSession()->getPage()->findAll('css', 'form label') as $label) {
            if ($label->getText() == $arg1) {
                $curLabel = $label;
                break;
            }
        }
        
        if (!$curLabel) {
            throw new \Exception(sprintf('The block with title "%s" not found', $arg1));
        }
        $fields = [];
        foreach ($table->getRowsHash() as $caption => $value) {
            foreach($curLabel->getParent()->findAll('css', 'label') as $label) {
                if ($label->getText() == $caption) {
                    $fields[$label->getAttribute('for')] = $value;
                    break;
                }
            }
        }
        foreach ($fields as $field => $val) {
            $this->fillField($field, $val);
        }

    }

    /**
     * @Given there is a contact with:
     */
    public function thereIsAContactWith(TableNode $table)
    {
        $fields = [];

        foreach ($table as $row){
            $fields[$row['field']] = $row['value'];
        }

        $contragent = $this->getContragent($fields['contragent']);
        $city = $this->em->getRepository('CoreDirectoryBundle:City')
            ->findOneBy(['name' => $fields['city']]);
        if (!$city) {
            throw new \Exception(sprintf('City with name - %s not found', $fields['city']));
        }
        if (count($contragent->getContactList()) != 1) {
            if (count($contragent->getContactList()) > 1) {
                foreach($contragent->getContactList() as $contact) {
                    $this->em->remove($contact);
                }
                $this->em->flush();
            }

            $contact = (isset($fields['isIndi'])) ? new IndiContact() : new LegalContact();
            if (isset($fields['isIndi'])) {
                $contact->setPhone($fields['phone'])
                    ->setLastName($fields['lastName'])
                    ->setFirstName($fields['firstName'])
                    ->setSurName($fields['surName'])
                    ->setContactEmail($fields['contactEmail'])
                ;
            }
            $contact->setContragent($contragent)
                    ->setCity($city)
                    ->setAddress($fields['address'])
            ;
            $this->em->persist($contact);
            $this->em->flush();
        }
    }

    /**
     * @Given I check in :blockName block :checkBoxName
     */
    public function iCheckInBlock($blockName, $checkBoxName)
    {
        $curLabel = null;
        foreach($this->getSession()->getPage()->findAll('css', 'form label') as $label) {
            if ($label->getText() == $blockName) {
                $curLabel = $label;
                break;
            }
        }

        if (!$curLabel) {
            throw new \Exception(sprintf('The block with title "%s" not found', $blockName));
        }
        $field = null;
        foreach($curLabel->getParent()->findAll('css', 'label') as $label) {
            if ($label->getText() == $checkBoxName) {
                $field = $label;
                break;
            }
        }

        if (null == $field) {
            throw new \Exception(sprintf('The checkbox "%s" not found', $checkBoxName));
        }
        
        $this->getSession()->getPage()->checkField($field->getAttribute('for'));
    }

    /**
     * @Given there is no contacts for contragent with :arg1
     */
    public function thereIsNoContactsForContragentWith($arg1)
    {
        $contragent = $this->getContragent($arg1);
        foreach ($contragent->getContactList() as $contact) {
            $this->em->remove($contact);
            $this->em->flush();
        }
    }


}