<?php

namespace Core\TroubleTicketBundle\Features\Context;

use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Behat\MinkExtension\Context\MinkContext;

use Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Feature context.
 */
class FeatureContext extends MinkContext
                  implements KernelAwareInterface
{
    private $kernel;
    private $parameters;

    /**
     * Initializes context with parameters from behat.yml.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Sets HttpKernel instance.
     * This method will be automatically called by Symfony2Extension ContextInitializer.
     *
     * @param KernelInterface $kernel
     */
    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @Given /^I am logged in as administrator$/
     */
    public function iAmLoggedInAsAdministrator()
    {
        $this->visit('/admin/login');
        $this->fillField('username', 'nickAdmin' );
        $this->fillField('password', '1q2w3e4r5t6y');
        $this->pressButton('_submit');
        $this->visit('/');
    }

    /**
     * @Given /^the following blocks are defined:$/
     */
    public function theFollowingBlocksAreDefined(TableNode $table)
    {
        $this->visit('admin/dashboard');
        $users = array();
        foreach ($table->getHash() as $blockHash) {
            $this->assertPageContainsText($blockHash['name']);
        }
    }


    /**
     * @Then /^I should be on the "([^"]*)" page$/
     */
    public function iShouldBeOnThePage($arg1)
    {
        $arg1 = str_replace("/","\/",$arg1);
        $this->assertUrlRegExp("/" . $arg1 . "/");
    }

    /**
     * @Then /^I should still be on page like "([^"]*)"$/
     */
    public function iShouldStillBeOnPageLike($arg1)
    {
        $arg1 = str_replace('/','\/',$arg1);
        $url = $this->getSession()->getCurrentUrl();
        if (!preg_match("/". $arg1 . "/", $url)) {
            throw new \Exception('not expected url');
        }
    }

    /**
     * @Then /^I should be on "([^"]*)" edit page$/
     */
    public function iShouldBeOnEditPage($arg1)
    {
        $arg1 = "/admin\/core\/troubleticket\/". $arg1 ."\/\d+\/edit/";
        $url = $this->getSession()->getCurrentUrl();
        if (!preg_match($arg1, $url)) {
            throw new \Exception('not expected url');
        }
    }

    /**
     * @Then /^I should be on "([^"]*)" batch deleting page$/
     */
    public function iShouldBeOnBatchDeletingPage($arg1)
    {
        $arg1 = "/admin\/core\/troubleticket\/".$arg1. "\/\d+\/delete/";
        $url = $this->getSession()->getCurrentUrl();
        if (!preg_match($arg1, $url)) {
            throw new \Exception('not expected url');
        }
    }

    /**
     * @Given /^select next fileds with values:$/
     */
    public function selectNextFiledsWithValues(TableNode $table)
    {
        foreach ($table->getHash() as $blockHash) {
            $select = $blockHash['selects'];
            $option = $blockHash['values'];
            $this->selectOption($select, $option);
        }
    }

    /**
     * @When /^I follow edit first message$/
     */
    public function iFollowEditFirstMessage()
    {
        $link = $this->getSession()->getPage()->find('css','.ticket-msg-edit:first-child');
        $link->click();
    }

     /**
     * @Given /^I wait for request will end$/
     */
    public function iWaitForRequestWillEnd()
    {
         $this->getSession()->wait(5000);
    }

    /**
     * @Given /^I fill in new form with "([^"]*)"$/
     */
    public function iFillInNewFormWith($arg1)
    {
        $formElement = $this->getSession()->getPage()->find('css','.trouble-ticket-msg-form textarea');
        //$formElement->setValue($arg1);
        $id = $formElement->getAttribute('id');
        $script = "CKEDITOR.instances['" . $id . "'].setData('" . $arg1 . "');";
        $this->getSession()->evaluateScript($script);
        $this->getSession()->wait(2000);
    }

    /**
     * @Then /^I should see modal window$/
     */
    public function iShouldSeeModalWindow()
    {    
        $modalWindow = $this->getSession()->getPage()->find('css','.modal');
        $attr = $modalWindow->getAttribute('class');
        $this->assertPageContainsText('Сохранить изменения');

    }

    /**
     * @Given /^I activate form "([^"]*)"$/
     */
    public function iActivateForm($arg1)
    {
        $script = "$('" . $arg1 . "').removeClass('hidden')";
        $this->getSession()->evaluateScript($script);
        $this->getSession()->wait(2000);
    }

    /**
     * @Given /^I fill in jsEditor with "([^"]*)"$/
     */
    public function iFillInJseditorWith($arg1)
    {
        $formElement = $this->getSession()->getPage()->find('css','.trouble-ticket-form textarea.msg-body');
        $id = $formElement->getAttribute('id');
        $script = "CKEDITOR.instances['" . $id . "'].setData('" . $arg1 . "');";
        $this->getSession()->evaluateScript($script);
        $this->getSession()->wait(2000);
    }
}
