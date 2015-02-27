<?php

namespace Core\CategoryBundle\Features\Context;

use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Behat\MinkExtension\Context\MinkContext;

use Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Application\Sonata\UserBundle\Entity\User;
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
        ldd('hr');
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
        $url = str_replace('http://www.olikids-kni.ru.vm/','',$this->getSession()->getCurrentUrl());
        if ($arg1 != $url) {
            throw new \Exception('not expected url');
        }
        $this->assertPageContainsText('Деревянные игрушки');
    }

    /**
     * @Given /^I am on "([^"]*)" page$/
     */
    public function iAmOnPage($arg1)
    {
        $this->visit($arg1);
        $this->assertPageContainsText('Не указана родительская категория...');
    }

    /**
     * @Then /^I should still be on "([^"]*)" page$/
     */
    public function iShouldStillBeOnPage($arg1)
    {
        $arg1 = str_replace('/','\/',$arg1);
        $url = $this->getSession()->getCurrentUrl();
        if (!preg_match("/". $arg1 . "/", $url)) {
            throw new \Exception('not expected url');
        }
        $this->assertPageContainsText('Core\CategoryBundle\Entity\ProductCategory');
        $this->assertPageContainsText('При создании элемента произошла ошибка.');
    }

    /**
     * @Then /^I should be on "([^"]*)" page$/
     */
    public function iShouldBeOnPage($arg1)
    {
        $url = str_replace('http://www.olikids-kni.ru.vm/','',$this->getSession()->getCurrentUrl());
        if ($arg1 != $url) {
            throw new \Exception('not expected url');
        }
        $this->assertPageContainsText('Элемент создан успешно');
        $this->assertPageContainsText('Подкатегория2');
    }

    /**
     * @Given /^I am on category edit page$/
     */
    public function iAmOnCategoryEditPage()
    {
        $this->visit('admin/shop/category/productcategory/159/edit');
        
    }

     /**
     * @Given /^I wait for request will end$/
     */
    public function iWaitForRequestWillEnd()
    {
         $this->getSession()->wait(5000);
    }

    /**
     * @Then /^I should be on batch deleting page$/
     */
    public function iShouldBeOnBatchDeletingPage()
    {
        $this->assertPageContainsText('Подтверждение удаления');
    }

}