<?php

/**
 * Класс отвечающий за контекст админской части (статьи)
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\TroubleTicketBundle\Features\Context;

use Behat\Behat\Tester\Exception\PendingException,
    Behat\Behat\Context\SnippetAcceptingContext,
    Behat\MinkExtension\Context\MinkContext,
    Behat\Gherkin\Node\TableNode;
use Core\CommonBundle\Features\Context\CommonFeatureContext;
use Doctrine\ORM\EntityManagerInterface;


class FrontendWebInterfaceFeatureContext extends MinkContext
{
    
}