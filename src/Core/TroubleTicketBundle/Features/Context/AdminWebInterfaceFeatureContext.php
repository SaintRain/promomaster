<?php

/**
 * Класс отвечающий за контекст админской части (статьи)
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\TroubleTicketBundle\Features\Context;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;
use Core\CommonBundle\Features\Context\CommonFeatureContext;
use Doctrine\ORM\EntityManagerInterface;
use Behat\Behat\Context\SnippetAcceptingContext;
use Core\TroubleTicketBundle\Entity\TroubleTicket;

class AdminWebInterfaceFeatureContext extends CommonFeatureContext implements SnippetAcceptingContext
{
    use PriorityAdminWebInterfaceFeatureContext,
        TroubleTicketFeatureContext,
        StatusAdminWebInterfaceFeatureContext;

    
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

}