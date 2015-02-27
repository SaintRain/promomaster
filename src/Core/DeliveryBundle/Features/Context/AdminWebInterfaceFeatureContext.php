<?php

/**
 * Класс отвечающий за контекст админской части
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Features\Context;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Core\CommonBundle\Features\Context\CommonFeatureContext;
use Doctrine\ORM\EntityManagerInterface;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Core\DeliveryBundle\Entity\Company;
use Core\DeliveryBundle\Entity\ServiceType;
use Core\DeliveryBundle\Entity\Address;
use Symfony\Component\Validator\ValidatorInterface;

class AdminWebInterfaceFeatureContext extends CommonFeatureContext
{
    use ServiceAdminWebInterfaceFeatureContext;
    
    protected $em;

    protected $validator;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct(EntityManagerInterface $em, ValidatorInterface $validator)
    {
        $this->em = $em;
        $this->validator = $validator;
    }

    /**
     * @Given there is no :arg1 with :arg2 :arg3
     */
    public function thereIsNoWith($arg1, $arg2, $arg3)
    {
        $result = $this->em->getRepository('CoreDeliveryBundle:'. $arg1)->findOneBy([$arg2 => $arg3]);
        if ($result) {
            $this->em->remove($result);
            $this->em->flush();
        }
    }

    /**
     * @When I press button :arg1
     */
    public function iPressButton($arg1)
    {
        $this->pressButton($arg1);
    }

    
    /**
     * @Given I have a :arg1 with:
     */
    public function iHaveAWith($arg1, TableNode $table)
    {
        $arg1 = ucfirst($arg1);
        switch ($arg1){
            case 'Company':
                $object = new Company();
                break;
            case 'ServiceType':
                $object = new ServiceType();
                break;
            case "Address":
                $object = new Address();
        }
        $values = [];
        foreach ($table->getHash() as $val) {
            $method = 'set'. ucfirst($val['field']);
            if (method_exists($object, $method) && $val['field'] == 'city') {
                $city = $this->em->getRepository('CoreDirectoryBundle:City')->findOneBy(['name' => $val['value']]);
                if ($city) {
                    $object->$method($city);
                } else {
                    throw new \Exception(sprintf('The city with name %s Not Found', $val['value']));
                }
            } elseif (method_exists($object, $method)) {
                $object->$method($val['value']);
            }
        }

        $result = $this->em->getRepository('CoreDeliveryBundle:' . $arg1)->findOneBy(['name' => $object->getName()]);
        if (!$result) {
            $this->em->persist($object);
            $this->em->flush();
        }
    }
}