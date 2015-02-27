<?php

namespace Core\TroubleTicketBundle\Features\Context;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;
use Core\TroubleTicketBundle\Entity\TroubleTicket;

trait TroubleTicketFeatureContext
{
    /**
     * @Given there is no trouble ticket with title :arg1
     */
    public function thereIsNoTroubleTicketWithTitle($arg1)
    {
        $result = $this->em->getRepository('CoreTroubleTicketBundle:TroubleTicket')->findOneBy(['title' => $arg1]);
        if ($result) {
            $this->em->remove($result);
            $this->em->flush();
        }
    }

    /**
     * @Given there is a trouble ticket with:
     */
    public function thereIsATroubleTicketWith(TableNode $table)
    {
        $fields = [];
        foreach ($table as $row) {
            $fields[$row['field']] = $row['value'];
        }

        $ticket = $this->em->getRepository('CoreTroubleTicketBundle:TroubleTicket')->findOneBy(['title' => $fields['title']]);
        if (!$ticket) {
            $category = $this->em->getRepository('CoreCategoryBundle:TroubleTicketCategory')->findOneBy(['name' => $fields['category']]);
            if (!$category) {
                throw new \Exception('Category with name "%s" not found', $fields['category']);
            }
            $priority = $this->em->getRepository('CoreTroubleTicketBundle:Priority')->findOneBy(['sysName' => $fields['priority']]);
            if (!$priority) {
                throw new \Exception('Priority with name "%s" not found', $fields['priority']);
            }
            $status = $this->em->getRepository('CoreTroubleTicketBundle:Status')->findOneBy(['sysName' => $fields['status']]);
            if (!$status) {
                throw new \Exception('Status with name "%s" not found', $fields['status']);
            }
            $user = $this->em->getRepository('ApplicationSonataUserBundle:User')->findOneBy(['email' => $fields['user']]);
            if (!$user) {
                throw new \Exception('User with email "%s" not found', $fields['user']);
            }

            $ticket = new TroubleTicket();
            $ticket->setCategory($category)
                    ->setManager($user)
                    ->setUser($user)
                    ->setAuthorEmail($fields['user'])
                    ->setAuthorName($fields['user'])
                    ->setHash()
                    ->setBody($fields['body'])
                    ->setTitle($fields['title'])
                    ->setPriority($priority)
                    ->setStatus($status)
                    ->setReadiness($fields['readiness'])
            ;
            $this->em->persist($ticket);
            $this->em->flush();
        } elseif (isset($fields['notClosed']) && $ticket->getStatus()->getSysname() == $fields['notClosed']) {
            $status = $this->em->getRepository('CoreTroubleTicketBundle:Status')->findOneBy(['sysName' => $fields['status']]);
            if (!$status) {
                throw new \Exception('Status with name "%s" not found', $fields['status']);
            }
            $ticket->setStatus($status);
            $this->em->flush();
        }
    }

    /**
     * @Then trouble ticket with title :arg1 selfdesctruct
     */
    public function troubleTicketWithTitleSelfdesctruct($arg1)
    {
        $result = $this->em->getRepository('CoreTroubleTicketBundle:TroubleTicket')->findOneBy(['title' => $arg1]);
        if ($result) {
            $this->em->remove($result);
            $this->em->flush();
        }
    }

    /**
     * @Given I should see subscription text
     */
    public function iShouldSeeSubscriptionText()
    {
        $text = "Вы подписались на обновления";
        $textHtml = $this->getSession()->getPage()->getText();
        if (!preg_match('/(Вы подписались на обновления)|(Вы отписались от обновлений)/u', $textHtml)) {
            throw new \Exception(sprintf('Subscription text %s or %s not found', 'Вы отписались от обновлений', 'Вы подписались на обновления'));
        }
    }

    /**
     * @Given I am on trouble ticket with title :field :uri page
     */
    public function iAmOnTroubleTicketWithTitlePage($field, $uri)
    {
        $ticket = $this->em->getRepository('CoreTroubleTicketBundle:TroubleTicket')->findOneBy(['title' => $field]);
        if (!$ticket) {
            throw new \Exception(sprintf('A ticket with title "%s" not found', $field));
        }
        $this->visit(sprintf($uri, $ticket->getId()));
    }

    /**
     * @Given I am on frontent trouble ticket with title :field :uri page
     */
    public function iAmOnFrontentTroubleTicketWithTitlePage($field, $uri)
    {
        $ticket = $this->em->getRepository('CoreTroubleTicketBundle:TroubleTicket')->findOneBy(['title' => $field]);
        if (!$ticket) {
            throw new \Exception(sprintf('A ticket with title "%s" not found', $field));
        }
        $this->visit(sprintf($uri, $ticket->getHash()));
    }

    /**
     * @When I click like link :arg1
     */
    public function iClickLikeLink($arg1)
    {
        $this->getSession()->getDriver()->executeScript(sprintf('$("span:contains(\'%s\')").click()', $arg1));
    }

}