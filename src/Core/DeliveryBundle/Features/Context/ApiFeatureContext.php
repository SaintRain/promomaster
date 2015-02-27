<?php

/**
 * Класс отвечающий за контекст api c траснпортными компаниями
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Features\Context;

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Context\Context,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use Behat\Behat\Context\SnippetAcceptingContext;

class ApiFeatureContext implements SnippetAcceptingContext
{
    protected $respone;

    protected $logic = [];

    protected $logicParams = [];

    protected $method;

    public function __construct($pek, $jelDor, $dellin, $ems, $postRu, $cdek, $energy, $dpd)
    {
        $this->logic['pek'] = $pek;
        $this->logic['jelDor'] = $jelDor;
        $this->logic['dellin'] = $dellin;
        $this->logic['ems'] = $ems;
        $this->logic['postRu'] = $postRu;
        $this->logic['cdek'] = $cdek;
        $this->logic['energy'] = $energy;
        $this->logic['dpd'] = $dpd;
    }

    /**
     * @Given Order information with:
     */
    public function orderInformationWith(TableNode $table)
    {
        foreach($table->getHash() as $row) {
            $this->logicParams['order']['total'][$row['field']] = $row['value'] * 1;
        }
    }

    /**
     * @Given delivery type information with:
     */
    public function deliveryTypeInformationWith(TableNode $table)
    {
        foreach($table->getHash() as $row) {
            $this->logicParams[$row['field']] = $row['value'] * 1;
        }
    }

    /**
     * @Given package number :number information with:
     */
    public function packageInformationWith($number, TableNode $table)
    {
        foreach($table->getHash() as $row) {
            if ($row['numeric']) {
                $this->logicParams['order']['package'][$number][$row['field']] = $row['value'] * 1;
            } else {
                $this->logicParams['order']['package'][$number][$row['field']] = $row['value'];
            }
            
        }
    }

    /**
     * @Given recipient :field is :value
     */
    public function recipientIs($field, $value)
    {
        $this->logicParams['to'][$field] = $value;
    }

    /**
     * @Given seller :field is :value
     */
    public function sellerIs($field, $value)
    {
        $this->logicParams['from'][$field] = $value;
    }

    /**
     * @Given internal code is :value
     */
    public function internalCodeIs($value)
    {
        $this->logicParams['internalCode'] = $value;
    }

    /**
     * @Given cash on delivery :value
     */
    public function cashOnDelivery($value)
    {
        $this->logicParams['cashOndelivery'] = $value;
        $this->logicParams['isDeliveryIncludedInPayment'] = !$value;
    }


    /**
     * @Given the track number :number where :field is :value
     */
    public function theTrackNumberWhereIs($number, $field, $value)
    {
        $this->logicParams['trackNums'][$number] = [$field => $value];
    }
    /**
     * @Given credentials with:
     */
    public function credentialsWith(TableNode $table)
    {
        $this->logicParams['auth'] = $table->getHash()[0];
    }

    /**
     * @Given I call :service with :method
     */
    public function iCallServiceWithMethod($service, $method)
    {
        if (method_exists($this->logic[$service], $method)) {
            $this->respone = $this->logic[$service]->$method($this->logicParams);
        } else {
            throw new \Exception(sprintf('Method %s is not defined'), $method);
        }
    }

    /**
     * @Then the response should be array
     */
    public function theResponseShouldBeArray()
    {
        if (!is_array($this->respone)) {
            throw new \Exception('Response is not array');
        }
    }

    /**
     * @Then response first row has :arg1 key with type :arg2
     */
    public function responseFirstRowHasKeyWithType($arg1, $arg2)
    {
        $response = reset($this->respone);
        $this->checkArrayVal($response[$arg1], $arg1, $arg2);
    }

    /**
     * @Then response has :arg1 key with type :arg2
     */
    public function responseHasKeyWithType($arg1, $arg2)
    {
        $this->checkArrayVal($this->respone[$arg1], $arg1, $arg2);
    }

    /**
     * @Then response has :arg1 key in :arg2 with type :arg3
     */
    public function responseHasKeyInWithType($arg1, $arg2, $arg3)
    {
        $this->checkArrayVal($this->respone[$arg2][$arg1], $arg1, $arg3);
    }

    /**
     * @Given the following track numbers:
     */
    public function theFollowingTrackNumbers(TableNode $table)
    {
        foreach ($table as $hash) {
            $this->logicParams['trackNums'][$hash['trackNum']] = $hash['trackNum'];
        }
    }

    /**
     * @Given the following invoice track numbers:
     */
    public function theFollowingInvoiceTrackNumbers(TableNode $table)
    {
        foreach ($table as $hash) {
            $this->logicParams['order']['trackNums'][] = $hash['trackNum'];
        }
    }

    /**
     * @Given the following extra sevices:
     */
    public function theFollowingExtraServices(TableNode $table)
    {
        $this->logicParams['extraServices'] = [];
        foreach ($table as $hash) {
            $this->logicParams['extraServices'][] = $hash['id'];
        }
    }


    /**
     * @Given seller information with:
     */
    public function sellerInformationWith(TableNode $table)
    {
        $this->logicParams['from'] = $this->addInformation($table);
        
    }
    
    /**
     * @Given recipient information with:
     */
    public function recipientInformationWith(TableNode $table)
    {
        $this->logicParams['to'] = $this->addInformation($table);
    }

    /**
     * @Given recipient address details with:
     */
    public function recipientAddressDetailsWith(TableNode $table)
    {
        $this->logicParams['to']['addressDetails'] = $this->addInformation($table);
    }

    /**
     * @Given seller address details with:
     */
    public function sellerAddressDetailsWith(TableNode $table)
    {
        $this->logicParams['from']['addressDetails'] = $this->addInformation($table);
    }

    /**
     * Проверка что заданного типа существует в указанном масиве
     * @param type $value - значение
     * @param type $keyName - имя ключа
     * @param type $type - тип
     * @throws \Exception
     */
    protected function checkArrayVal($value, $keyName, $type)
    {
        if (!isset($value)) {
            throw new \Exception(sprintf('The key %s not found in response', $keyName));
        } elseif (gettype($value) != $type) {
            throw new \Exception(sprintf('The key %s response hasn\'t type %s', $keyName, $type));
        }
    }
    
    /**
     * Собираем данне из таблицы
     * @param TableNode $table
     * @return TableNode
     */
    protected function addInformation(TableNode $table)
    {
        $result = [];
        foreach ($table as $row) {
            $result[$row['field']] = $row['value'];
        }

        return $result;
    }
}