<?php

namespace Core\TroubleTicketBundle\Features\Context;

use Core\TroubleTicketBundle\Entity\Priority;
use Behat\Gherkin\Node\TableNode;

trait PriorityAdminWebInterfaceFeatureContext
{
    /**
     * @Given there is no priority with name :arg1
     */
    public function thereIsNoPriorityWithName($arg1)
    {
        $result = $this->em->getRepository('CoreTroubleTicketBundle:Priority')->findOneBy(['sysName' => $arg1]);
        if ($result) {
            $this->em->remove($result);
            $this->em->flush();
        }

    }

    /**
     * @Given there is a trouble ticket priority with:
     */
    public function thereIsATroubleTicketPriorityWith(TableNode $table)
    {
        $fields = [];

        foreach ($table as $row) {
            $fields[$row['field']] = $row['value'];
        }

        $priority = $this->em->getRepository('CoreTroubleTicketBundle:Priority')->findOneBy(['sysName' => $fields['name']]);
        if (!$priority) {
            $priority = new Priority();
            $priority->setSysName($fields['name'])
                    ->setCaptionRu($fields['captionRu'])
                    ->setIndexPosition($fields['indexPosition'])
            ;
            $this->em->persist($priority);
            $this->em->flush();
        }
    }

    /**
     * @Given I am on trouble ticket priority with name :name :uri page
     */
    public function iAmOnTroubleTicketPriorityWithNamePage($name, $uri)
    {
        $priority = $this->em->getRepository('CoreTroubleTicketBundle:Priority')->findOneBy(['sysName' => $name]);
        if (!$priority) {
            throw new \Exception(sprintf('There is no priority with name "%s"', $name));
        }
        $this->visit(sprintf($uri, $priority->getid()));
    }
}