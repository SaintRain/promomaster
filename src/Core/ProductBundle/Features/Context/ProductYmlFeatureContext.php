<?php

namespace Core\ProductBundle\Features\Context;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Testwork\Hook\Scope\BeforeSuiteScope;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Behat\Testwork\Hook\Scope\AfterSuiteScope;
use Core\ProductBundle\Entity\CompositeProduct;
use Doctrine\Common\Collections\ArrayCollection;
use Core\ProductBundle\Command\YmlCommand;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;
use Behat\Symfony2Extension\Context\KernelDictionary;
/**
 * Behat context class.
 */
class ProductYmlFeatureContext implements SnippetAcceptingContext {

    use KernelDictionary;
    private $em;
    private $yml;
    private $yml2;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context object.
     * You can also pass arbitrary arguments to the context constructor through behat.yml.
     */
    public function __construct($em) {
        $this->em = $em;
    }

    /**
     * @Given I generate new yml file
     */
    public function iGenerateNewYmlFile() {
        
        $this->getContainer()->get('core_product_logic')->ymlGeneratorStart();        
        $command = new YmlCommand();
        $command->setContainer($this->getContainer());
        $input = new ArrayInput(array());
        $output = new NullOutput();
        list($this->yml, $this->yml2) = $command->run($input, $output);        
    }

    /**
     * @Then I want see in yml file max :arg1 picture per product
     */
    public function iWantSeeInYmlFileMaxPicturePerProduct($arg1) {

        throw new PendingException();
    }

    /**
     * @Then I want see in yml file seriya tag
     */
    public function iWantSeeInYmlFileSeriyaTag() {
        throw new PendingException();
    }

}
