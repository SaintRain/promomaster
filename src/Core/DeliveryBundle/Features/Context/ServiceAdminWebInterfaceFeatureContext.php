<?php

/**
 * Трейт отвечающий за уникальные методы для способа доставки
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Features\Context;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Doctrine\ORM\EntityManagerInterface;
use Core\DeliveryBundle\Entity\Service;
use Symfony\Component\Validator\ValidatorInterface;


trait ServiceAdminWebInterfaceFeatureContext
{
    /**
     * @When option :arg1 from disabled select2 :arg2 must be selected
     */
    public function optionFromDisabledSelectMustBeSelected($arg1, $arg2)
    {
        $needLabel = null;
        foreach ($this->getSession()->getPage()->findAll('css', 'label') as $label) {
            if ($arg2 === $label->getText()) {
                $needLabel = $label;
                break;
            }
        }
        if (!$needLabel) {
            throw new \Exception(sprintf('Radio button with label %s not found', $arg2));
        }
        $disabled = $needLabel->getParent()->find('css', '.select2-container-disabled');

        if (!$disabled) {
            throw new \Exception(sprintf('Select with label %s is not disabled', $arg2));
        }

        $choosenElt = $needLabel->getParent()->find('css', '.select2-chosen');
        if (!$choosenElt || $choosenElt->getText() != $arg1) {
            throw new \Exception(sprintf('The option %s in select %s is not selected', $arg1, $arg2));
        }
    }

    /**
     * @Given there is only one option :arg1 in :arg2
     */
    public function thereIsOnlyOneOptionIn($arg1, $arg2)
    {
        $needLabel = null;
        $needOption = null;
        $optionsCount = 0;
        foreach ($this->getSession()->getPage()->findAll('css', 'label') as $label) {
            if ($arg2 === $label->getText()) {
                $needLabel = $label;
                break;
            }
        }
        if (!$needLabel) {
            throw new \Exception(sprintf('Select with label %s not found', $arg2));
        }

        $options = $needLabel->getParent()->findAll('css', 'option');
        foreach($options as $option) {
            $optionsCount++;
            if ($arg1 == $option->getText()) {
                $needOption = $option;
            }
        }
        if ($optionsCount > 1) {
            throw new \Exception(sprintf('There is more than one option in select with label %s ', $arg2));
        } elseif (!$needOption) {
            throw new \Exception(sprintf('There is no option %s in select with label %s ', $arg1, $arg2));
        }
    }
    
    /**
     * Получаем объекты
     * @param type $data
     * @return type
     */
    private function setObjects($data) {
        $company = $this->em->getReference('CoreDeliveryBundle:Company', $data['companyId']);
        $serviceType = $this->em->getReference('CoreDeliveryBundle:ServiceType', $data['serviceTypeId']);

        return ['company' => $company, 'serviceType' => $serviceType];
    }

    /**
     * @Given I have a Service with data:
     */
    public function iHaveAServiceWithData(TableNode $table)
    {
        $data = $table->getHash()[0];
        $object = $this->em->getRepository('CoreDeliveryBundle:Service')->findOneBy(['name' => $data['name']]);
        if ($object) {
            return true;
        }
        $objects = $this->setObjects($data);
        $object = new Service();
        $object->setCaptionRu($data['captionRu'])
            ->setName($data['name'])
            ->setBuyerType($data['buyerType'])
            ->setDeliveryFrom($data['deliveryFrom'])
            ->setDeliveryTo($data['deliveryTo'])
            ->setMaxSum($data['maxSum'])
            ->setMinSum($data['minSum'])
            ->setCompany($objects['company'])
            ->setServiceType($objects['serviceType'])
        ;

        $validationResult = $this->validator->validate($object);
        if ($validationResult->count()) {
            throw new \Exception('Service can\'t be create');
        }
        
        $this->em->persist($object);
        $this->em->flush();
    }
}
