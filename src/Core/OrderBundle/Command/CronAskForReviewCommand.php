<?php
/**
 * Крон для рассылки писем просьбой оставить отзыв.
 * php app/console cron:askForReview
 * запускаем каждые 5 минут
 * @author  Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CronAskForReviewCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('cron:askForReview')
            ->setDescription('Rassylka pisem s prosboy ostavit otzyv o tovare')
            ->addOption(
                'log', null, InputOption::VALUE_NONE,
                'Если выставлено, то будет доступен вывод в консоль'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $msgCount = 0;
        if ($input->getOption('log')) {
            $output->writeln('Cron is runnig');
        }
        $em    = $this->getContainer()->get('doctrine.orm.entity_manager');
        $date  = time() - 24 * 60 * 60;
        $cache = $this->getContainer()->get('beryllium_cache');
        if (!$cache->get('askForReview')) {
            $orders = $em->getRepository('CoreOrderBundle:Order')->findForAskForReview($date);
            $cache->set('askForReview', true);
        } else {
            //$orders = $em->getRepository('CoreOrderBundle:Order')->findForAskForReview($date);
            if ($input->getOption('log')) {
                $output->writeln('<comment>Another Task Is Already Running</comment>');
                $output->writeln('Cron is finished');
            }
            return true;
        }
        $mailer = $this->getContainer()->get('core_order_mailer_logic');
        foreach ($orders as $order) {
            $emails                                                 = [];
            $emails[$order->getContragent()->getUser()->getEmail()] = get_class($order->getContragent()->getUser());
            if ($order->getContragent()->getContactEmail()) {
                $emails[$order->getContragent()->getContactEmail()] = get_class($order->getContragent());
            }
            if ($order->getRecipientEmail()) {
                $emails[$order->getRecipientEmail()] = get_class($order);
            }
            foreach ($emails as $email) {
                $recipient = $this->createRecipient($order, $email);
                $result    = $mailer->sendOnMainStatusDone($order,
                    'order-message-done-status', $recipient);
                if ($result) {
                    $msgCount++;
                    if (!$cache->get('isSent')) {
                        $cache->set('isSent', true);
                    }
                }
                sleep(10);
            }
            if ($cache->get('isSent')) {
                $cache->set('isSent', false);
                $order->setIsExecutedMsgSend(true);
                $em->getConnection()->beginTransaction();
                try {
                    $em->flush();
                    $em->getConnection()->commit();
                } catch (\Exception $e) {
                    $cache->set('askForReview', false);
                    $em->getConnection()->rollback();
                    $em->close();
                    throw $e;
                }
            }
        }
        $cache->set('askForReview', false);
        if ($input->getOption('log')) {
            $output->writeln('<comment>The was send '.$msgCount.' letters</comment>');
            $output->writeln('Cron is finished');
        }
    }

    /**
     *
     * @param type $order
     * @param type $type
     * @return type
     */
    private function createRecipient($order, $type)
    {
        $recipientInfo = [];
        if ($type == get_class($order)) {
            $recipientInfo[$order->getRecipientEmail()] = ($order->getRecipientFio())
                    ? $order->getRecipientFio() : $order->getRecipientCompany();
        } elseif ($type == get_class($order->getContragent())) {
            $recipientInfo[$order->getContragent()->getContactEmail()] = $order->getContragent()->getListName();
        } elseif ($type == get_class($order->getContragent()->getUser())) {
            $recipientInfo[$order->getContragent()->getUser()->getEmail()] = $order->getContragent()->getUser()->getFullName();
        }
        return $recipientInfo;
    }
}