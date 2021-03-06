<?php

namespace Core\SiteBundle\Command;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Core\SiteBundle\Entity\WebSite;
use Core\CategoryBundle\Entity\SiteCategory;
use Symfony\Component\DomCrawler\Crawler;


class SendSpamCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('site:sendSpam');
    }

    /**
     * @inheritDoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        ini_set('display_errors', "on");
        error_reporting(E_ALL);

        $em = $this->getContainer()->get('doctrine')->getManager();
        $emails = $em->getRepository('CoreSiteBundle:EmailSpam')->findForSpam(15);

        $index = 0;
        $i = 0;
        $isSendedToMe=false;
        foreach ($emails as $key => $e) {

            $e->setIsSended(true);
            $e->setSendedAt(new \DateTime);
            $em->flush();

            $config = $this->getEmailConfig($index);

            if ($i > 5) {
                $index++;
                $i = 0;
            } else {
                $i++;
            }

            $random_text = file_get_contents('http://loripsum.net/api');

            $html = $this->getContainer()->get('templating')->render('CoreSiteBundle:Spam:spamMessage.html.twig',
                array(
                    'data' => $e,
                    'random_text'=>$random_text
                )
            );

            try
            {

            $transport = \Swift_SmtpTransport::newInstance($config['host'],$config['port'] )
                ->setUsername($config['user'])
                ->setPassword($config['password'])
                ->setHost($config['host'])
                ->setEncryption($config['encryption'])
            ;

            $this->mailer = \Swift_Mailer::newInstance($transport);

            $subject = 'Реклама на вашем сайте ' . $e->getSite();
            $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom(array($config['user'] => 'Александр'))
                ->setTo($e->getEmail())
                ->setBody($html, 'text/html');
            $this->mailer->send($message);

            if (!$isSendedToMe) {
                $isSendedToMe=true;

                $message = \Swift_Message::newInstance()
                    ->setSubject($subject)
                    ->setFrom(array($config['user'] => 'Александр'))
                    ->setTo('saintrain@mail.ru')
                    ->setBody($html, 'text/html');
                $this->mailer->send($message);
            }


                // код, который может выбросить исключение
            }
            catch (Swift_TransportException $e) {

            }


            ld($e->getEmail().'=='.$config['host']);

        }


    }




    public function getEmailConfig($index = 0)
    {
        $configs = [
            0 => [
                'host' => 'smtp.gmail.com',
                'user' => 'promomaster.net@gmail.com',
                'password' => 'tel769242000',
                'encryption' => 'ssl',
                'port'=>465


            ],
            1 => [
                'host' => 'smtp.yandex.ru',
                'user' => 'promomaster.net@yandex.ru',
                'password' => 'tel769242000',
                'encryption' => 'ssl',
                'port'=>465
            ],

            2 => [
                'host' => 'smtp.mail.ru',
                'user' => 'promomaster-net@mail.ru',
                'password' => 'tel769242000',
                'encryption' => 'ssl',
                'port'=>465
            ]

        ];

        return $configs[$index];
    }
}
