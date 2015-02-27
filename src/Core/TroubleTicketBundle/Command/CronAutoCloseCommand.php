<?php

/**
 * Крон автозакрытия неактивных тикетов
 * php app/console cron:ticketClose
 * запускаем раз в день
 * @author  Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\TroubleTicketBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class CronAutoCloseCommand  extends ContainerAwareCommand {

    protected $days = 14;
    protected function configure() {
        $this
            ->setName('cron:ticketClose')
            ->setDescription('Auto Zakrytie ticketov')
            ->addArgument(
                'days',
                InputArgument::OPTIONAL,
                'Kol-vo Dney S poslednego otveta admina'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $output->writeln('Cron is runnig');

        $days = ($input->getArgument('days')) ? $input->getArgument('days') : $this->days;

        $date = date('Y-m-d H:i:s', (time() - $days * 24 * 60 * 60)) ;

     
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $status = $em->getRepository('CoreTroubleTicketBundle:Status')->findBySysName('closed');
        $tickets = $em->getRepository('CoreTroubleTicketBundle:TroubleTicket')->getOutDated($date);
        
        foreach($tickets as $ticket) {
            $ticket->setUpdatedDateTime(new \DateTime());
            $ticket->setAdminAnswers();
            $ticket->setStatus($status);
            $ticket->setAdminAnswers(0);
            $ticket->setIsAdminAnswer(0);
        }
        $em->flush();
        $output->writeln('Total Tickets: <info>'.count($tickets).'</info>');

        $output->writeln('Cron is finished');
    }
}