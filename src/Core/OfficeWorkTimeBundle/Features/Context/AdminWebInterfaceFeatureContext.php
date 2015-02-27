<?php

/**
 * Класс отвечающий за контекст админской части
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OfficeWorkTimeBundle\Features\Context;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Core\CommonBundle\Features\Context\CommonFeatureContext;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\ValidatorInterface;
use Core\OfficeWorkTimeBundle\Entity\Schedule;

class AdminWebInterfaceFeatureContext extends CommonFeatureContext
{   
    protected $em;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Given there is no :entity on date :value
     */
    public function thereIsNoOnDate($entity, $value)
    {
        $dateTime = new \DateTime($value);
        $result = $this->em->getRepository(sprintf('CoreOfficeWorkTimeBundle:%s', $entity))->findOneBy(['dateTime' => $dateTime]);
        if ($result) {
            $this->em->remove($result);
            $this->em->flush();
        }
    }

    /**
     * @Given I have a schedule on date :arg1
     */
    public function iHaveAScheduleOnDate($arg1)
    {
        $dateTime = new \DateTime($arg1);
        $result = $this->em->getRepository('CoreOfficeWorkTimeBundle:Schedule')->findOneBy(['dateTime' => $dateTime]);
        if (!$result) {
            $schedule = new Schedule();
            $schedule->setDateTime($dateTime)
                    ->setType(-1)
            ;
            $this->em->persist($schedule);
            $this->em->flush();
        }
    }
}