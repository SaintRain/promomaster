<?php

namespace Core\TroubleTicketBundle\Features\Context;

use Core\TroubleTicketBundle\Entity\Status;
use Behat\Gherkin\Node\TableNode;

trait StatusAdminWebInterfaceFeatureContext
{
    /**
     * @Given there is no status with name :arg1
     */
    public function thereIsNoStatusWithName($arg1)
    {
        $result = $this->em->getRepository('CoreTroubleTicketBundle:Status')->findOneBy(['sysName' => $arg1]);
        if ($result) {
            $this->em->remove($result);
            $this->em->flush();
        }

    }

    /**
     * @Given there is a trouble ticket status with:
     */
    public function thereIsATroubleTicketStatusWith(TableNode $table)
    {
        $fields = [];

        foreach ($table as $row) {
            $fields[$row['field']] = $row['value'];
        }

        $status = $this->em->getRepository('CoreTroubleTicketBundle:Status')->findOneBy(['sysName' => $fields['name']]);
        if (!$status) {
            $status = new Status();
            $status->setSysName($fields['name'])
                    ->setCaptionRu($fields['captionRu'])
                    ->setIndexPosition($fields['indexPosition'])
            ;
            $this->em->persist($status);
            $this->em->flush();
        }
    }

    /**
     * @Given I am on trouble ticket status with name :name :uri page
     */
    public function iAmOnTroubleTicketStatusWithNamePage($name, $uri)
    {
        $status = $this->em->getRepository('CoreTroubleTicketBundle:Status')->findOneBy(['sysName' => $name]);
        if (!$status) {
            throw new \Exception(sprintf('There is no status with name "%s"', $name));
        }
        $this->visit(sprintf($uri, $status->getId()));
    }
}