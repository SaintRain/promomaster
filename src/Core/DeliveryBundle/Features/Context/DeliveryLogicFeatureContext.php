<?php

/**
 * Класс отвечающий за контекст за работу логики доставки
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

use Core\DeliveryBundle\Logic\DeliveryContext;
use Core\DeliveryBundle\Entity\Company;
use Core\DeliveryBundle\Entity\Service;
use Core\DeliveryBundle\Entity\ServiceType;
use Doctrine\ORM\EntityManagerInterface;

class DeliveryLogicFeatureContext implements SnippetAcceptingContext
{
    protected $logic;

    protected $em;
    
    protected $response;

    protected $configs;

    protected $methodOptions;

    public function __construct(DeliveryContext $logic, EntityManagerInterface $em)
    {
        $this->logic = $logic;
        $this->em = $em;
    }

    /**
     * @Given there is a default seller
     */
    public function thereIsADefaultSeller()
    {
        $seller = $this->em->getRepository('CoreLogisticsBundle:Seller')->findOneBy(['isDefault' => true]);
        if (!$seller) {
            throw new \Exception('Default Seller Not Found');
        }
    }

    /**
     * @Given delivery companies:
     */
    public function deliveryCompanies(TableNode $table)
    {
        $companyNames = [];
        foreach($table as $val) {
            $companyNames[$val['companyName']] = $val['companyName'];
        }
        
        $dbCompanies = $this->em->getRepository('CoreDeliveryBundle:Company')->findAll();
        foreach($dbCompanies as $comp) {
            if (isset($companyNames[$comp->getName()])) {
                unset($companyNames[$comp->getName()]);
            }
        }
        if (count($companyNames)) {
            foreach ($companyNames as $name) {
                $company = new Company();
                $company->setName($name)
                        ->setCaptionRu(strtoupper($name))
                        ->setCalculator('http://www.test-calc.ru')
                        ->setTracker('http://www.test-tracker.ru')
                        ->setSite('http://www.test.ru')
                ;
                $this->em->persist($company);
                $this->em->flush();
            }
        }
    }

    /**
     * @Given delivery methods:
     */
    public function deliveryMethods(TableNode $table)
    {
        $deliveryMethods = [];
        $serviceTypeName = null;
        foreach($table as $row) {
            $deliveryMethods[$row['deliveryMethodName']] = $row;
            if (!$serviceTypeName) {
                $serviceTypeName = $row['serviceType'];
            }
        }

        $dbDeliveryMethods = $this->em->getRepository('CoreDeliveryBundle:Service')->findAll();
        foreach ($dbDeliveryMethods as $method) {
            if (isset($deliveryMethods[$method->getName()])) {
                unset($deliveryMethods[$method->getName()]);
            }
        }

        if (count($deliveryMethods)) {
            $serviceType = $this->em->getRepository('CoreDeliveryBundle:ServiceType')->findOneBy(['name' => $serviceTypeName]);
            if (!$serviceType) {
                $serviceType = new ServiceType();
                $serviceType->setCaptionRu(strtoupper($serviceTypeName))
                        ->setName($serviceTypeName)
                ;
                $this->em->persist($serviceType);
                $this->em->flush();
            }
            
            $dbCompanies = $this->em->getRepository('CoreDeliveryBundle:Company')->findAll();

            foreach($dbCompanies as $company) {
                foreach($deliveryMethods as $row) {
                    if (!$row['internalCode']) {
                        $row['internalCode'] = null;
                    }
                    if ($row['companyName'] == $company->getName()) {
                        $service = new Service();
                        $service->setCaptionRu(strtoupper($row['deliveryMethodName']))
                            ->setName($row['deliveryMethodName'])
                            ->setCompany($company)
                            ->setDeliveryFrom($row['deliveryFrom'])
                            ->setDeliveryTo($row['deliveryTo'])
                            ->setMaxSum($row['maxSum'])
                            ->setMinSum($row['minSum'])
                            ->setServiceType($serviceType)
                            ->setInternalCode($row['internalCode'])
                        ;
                        $this->em->persist($service);
                        $this->em->flush();
                    }
                }
            }
        }
    }

    /**
     * @Given configurate deliveryMethodId parameter :arg1
     */
    public function configurateDeliverymethodidParameter($arg1)
    {
        $deliveryMethod = $this->em->getRepository('CoreDeliveryBundle:Service')->findOneBy(['name' => $arg1]);
        if (!$deliveryMethod) {
            throw new \Exception(sprintf('Delivery method with name - "%s" not found', $arg1));
        }
        $this->configs['deliveryMethodId'] = $deliveryMethod->getId();
    }

    /**
     * @Given configurate seller parameter :arg1
     */
    public function configurateSellerParameter($arg1)
    {
        $seller = $this->em->getRepository('CoreLogisticsBundle:Seller')->findOneBy(['code' => $arg1]);
        if (!$seller) {
            throw new \Exception(sprintf('The seller with name - "%s" not found', $arg1));
        }
        $this->configs['seller'] = $seller;
        $this->configs['sellerId'] = $seller->getid();
    }
    
     /**
     * @Given i call configurate
     */
    public function iCallConfigurate()
    {
        $this->logic->configurate($this->configs);
    }

    /**
     * @Given i call for getAffiliates
     */
    public function iCallForGetaffiliates()
    {
        $this->response = $this->logic->getAffiliates();
    }

   
    /**
     * @Then response should be :type
     */
    public function responseShouldBe($type)
    {
        if (gettype($this->response) != $type) {
            throw new \Exception(sprintf('The response is not %s', $type));
        }
    }

    /**
     * @Then response has :key with type :type
     */
    public function responseHasWithType($key, $type)
    {
        if (!isset($this->response[$key])) {
            throw new Exception(sprintf('Key "%s" not found in response', $key));
        } elseif(gettype($this->response[$key]) != $type){
            throw new Exception(sprintf('Key "%s" from response has not type "%s"', $key, $type));
        }
    }

    /**
     * @Given i call for trackPackage
     */
    public function iCallForTrackpackage()
    {
        $this->response = $this->logic->trackPackage();
    }

    /**
     * @When i call for getCities
     */
    public function iCallForGetcities()
    {
        $this->logic->getCities();
    }
}