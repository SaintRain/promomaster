<?php

/**
 * Админский класс категории
 * @author  Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\Features\Context;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;

use Core\CommonBundle\Features\Context\CommonFeatureContext;
use Doctrine\ORM\EntityManagerInterface;

class AdminWebInterfaceFeatureContext extends CommonFeatureContext implements SnippetAcceptingContext
{
    use TroubleTicketAdminWebIntefaceFeatureContext,
        FaqAdminWebInterfaceFeatureContext;
    
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
}