<?php

/**
 * Крон для занисения данных о городах из транспортных компаний
 * php app/console cron:deliveryCity
 * запускаем раз в сутки
 * @author  Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class CronCityCommand  extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('cron:deliveryCity')
            ->setDescription('Auto prodlenie domenov')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Cron is runnig');
        $deliveryLogic = $this->getContainer()->get('core_delivery');
        $cities = $deliveryLogic->getCities();

        $output->writeln('<comment>The was added ' . $cities .' new cities</comment>');
        $output->writeln('Cron is finished');
    }

}