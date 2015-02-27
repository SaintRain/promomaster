<?php

/**
 * Класс отвечающий за контекст api 
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OfficeWorkTimeBundle\Features\Context;

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Context\SnippetAcceptingContext,
    Behat\Behat\Context\Context,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use Core\OfficeWorkTimeBundle\Logic\BasicDataLogic;

class ApiFeatureContext implements SnippetAcceptingContext
{
    protected $logic;

    protected $response;
    
    public function __construct($basicData)
    {
        $this->logic['basicData'] = $basicData;
    }
    
    /**
     * @Given that want to get work schedule for :arg1
     */
    public function thatWantToGetWorkScheduleFor($arg1)
    {
        if (!isset($this->logic['basicData'])) {
            throw new \Exception(sprintf('There is not found logic for %s', $arg1));
        } elseif ($this->logic['basicData'] instanceof $arg1) {
            throw new \Exception(sprintf('There is not correct instance for %s', $arg1));
        }
    }

    /**
     * @When I call :method from :objName
     */
    public function iCallFrom($method, $objName)
    {
        if (!method_exists($this->logic[$objName], $method)) {
            throw new \Exception(sprintf('There is no method %s in %s', $method, $this->logic[$objName]));
        }

        $this->response = $this->logic[$objName]->$method();
    }

    /**
     * @Then the response should be array
     */
    public function theResponseShouldBeArray()
    {
        if (!is_array($this->response)) {
            throw new \Exception('The response is not array');
        }
    }
    
    /**
     * @Then response has :arg1 key with type :arg2
     */
    public function responseHasKeyWithType($arg1, $arg2)
    {
        $this->checkArrayVal($this->response[$arg1], $arg1, $arg2);
    }

    /**
     * @Then response has :arg1 key count equal :arg2
     */
    public function responseHasKeyCountEqual($arg1, $arg2)
    {
        if (count($this->response[$arg1]) != (int)$arg2) {
            throw new \Exception(sprintf('The key %s response count not equal %s', $arg1, $arg2));
        }
    }

    /**
     * @Then response has :arg1 key first row type :arg2
     */
    public function responseHasKeyFirstRowType($arg1, $arg2)
    {
        if (!isset($this->response[$arg1])) {
            throw new \Exception(sprintf('The key %s not found in response', $arg1));
        }
        $value = reset($this->response[$arg1]);
        if (gettype($value) != $arg2) {
            throw new \Exception(sprintf('The key %s response first row hasn\'t type %s', $arg1, $arg2));
        }
    }

    protected function checkArrayVal($value, $keyName, $type)
    {
        if (!isset($value)) {
            throw new \Exception(sprintf('The key %s not found in response', $keyName));
        } elseif (gettype($value) != $type) {
            throw new \Exception(sprintf('The key %s response hasn\'t type %s', $keyName, $type));
        }
    }

}