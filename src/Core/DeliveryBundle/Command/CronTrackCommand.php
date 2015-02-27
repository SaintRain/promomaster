<?php

/**
 * Крон для занисения данных о статусе передвижения посылки
 * php app/console cron:deliveryTrack
 * запускаем раз в час
 * @author  Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class CronTrackCommand  extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('cron:deliveryTrack')
            ->setDescription('Rassylka o statuse posylki')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Cron is runnig');
        $deliveryLogic = $this->getContainer()->get('core_delivery');
        $newStates = $deliveryLogic->trackPackage();

        $output->writeln('<comment>The was changed states for ' . $newStates .' waybills. </comment>');
        $output->writeln('Cron is finished');
    }

}