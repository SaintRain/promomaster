<?php

/**
 * Крон для занисения выходных и скоращенных дней в БД
 * php app/console cron:officeWorkTime
 * запускаем раз в год
 * @author  Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OfficeWorkTimeBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CronScheduleCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('cron:officeWorkTime')
            ->setDescription('Vyhodnie, prazdniki i sokraschennye dni')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //$output->writeln('Cron is runnig');
        $oficeWorkTimeLogic = $this->getContainer()->get('office_work_time_logic');
        $oficeWorkTimeLogic->getSchedule();

        //$output->writeln('<comment>The was added ' . $cities .' new cities</comment>');
        //$output->writeln('Cron is finished');
    }
}
