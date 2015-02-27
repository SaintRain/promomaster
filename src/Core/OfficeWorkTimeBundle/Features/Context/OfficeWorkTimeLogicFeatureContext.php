<?php

/**
 * Класс отвечающий за контекст api
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OfficeWorkTimeBundle\Features\Context;

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Context\SnippetAcceptingContext,
    Behat\Behat\Context\Context,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Core\OfficeWorkTimeBundle\Logic\OfficeWorkTimeLogic;
use Behat\Symfony2Extension\Context\KernelDictionary;

class OfficeWorkTimeLogicFeatureContext implements SnippetAcceptingContext
{
    use KernelDictionary;
    
    protected $logic;

    protected $em;

    /**
     * Выходной
     * @var type
     */
    protected $isWeekend = false;

    protected $cronResult;

    public function __construct(OfficeWorkTimeLogic $logic, $em)
    {
        $this->logic = $logic;
        $this->em = $em;
    }

    /**
     * @Given today is not weekend or holiday
     */
    public function todayIsNotWeekendOrHoliday()
    {
        $dz = new \DateTimeZone($this->getContainer()->getParameter('default_timezone'));
        $now = new \DateTime('now', $dz);
        $dateStr = $now->format('Y-m-d');
        $dateTimeToCheck = new \DateTime(sprintf('%s 00:00', $dateStr));
        $datesFromDb = $this->em->getRepository('CoreOfficeWorkTimeBundle:Schedule')->findOneBy(['dateTime' => $dateTimeToCheck]);
        $result = $this->logic->getState();
        if ($datesFromDb && $result['isClosed']) {
            $this->isWeekend  = true;
        } elseif ($datesFromDb && $result['isClosed']) {
            throw new \Exception(sprintf('We get wrong answer for %s', $dateStr));
        }
    }
    
    /**
     * @Then i should get correct state for :start and :end
     */
    public function iShouldGetCorrectStateForAnd($start, $end)
    {
        if ($this->isWeekend) {
            return true;
        }
        $result = $this->logic->getState();
        $workTime = $this->getWorkTime($start, $end);
        if ($workTime['curTime'] < $workTime['startTime']  || $workTime['curTime'] > $workTime['endTime'] && $result['isClosed']) {
            return true;
        } elseif (($workTime['endTime'] - $workTime['curTime']) < (60*60) && !$result['isClosed'] && $result['isLastHour']) {
            return true;
        } elseif ($workTime['curTime'] >= $workTime['startTime']  && $workTime['curTime'] <= $workTime['endTime'] && !$result['isClosed']) {
            return true;
        }
        throw new \Exception(sprintf('We get wrong answer for %s', date('Y-m-d H:i', $workTime['curTime'])));
    }

   
    public function getWorkTime($start = null, $end = null) {
        $defaultTimezone = $this->getContainer()->getParameter('default_timezone');

        $dz = new \DateTimeZone($defaultTimezone);
        $now = new \DateTime('now', $dz);
        $curTime = strtotime($now->format('Y-m-d H:i'));

        return [
            'curTime' => $curTime,
            'startTime' => ($start) ? strtotime(sprintf('%s %s:00', $now->format('Y-m-d'), $start)): null,
            'endTime' => ($start) ? strtotime(sprintf('%s %s:00', $now->format('Y-m-d'), $end)): null
        ];
    }

    /**
     * @Given i call for a cron job
     */
    public function iCallForACronJob()
    {
        $this->cronResult = $this->logic->getSchedule();
    }

    /**
     * @Then i should not get exception
     */
    public function iShouldNotGetException()
    {
        if ($this->cronResult !== null) {
            throw new \Exception('Office work time cron job problems');
        }
    }
}