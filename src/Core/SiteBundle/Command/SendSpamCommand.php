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

        $em = $this->getContainer()->get('doctrine')->getManager();
        $emails = $em->getRepository('CoreSiteBundle:EmailSpam')->findForSpam(30);

        $index = 0;
        $i = 0;
        $isSendedToMe=false;
        foreach ($emails as $key => $e) {

            $config = $this->getEmailConfig($index);

            if ($i > 10) {
                $index++;
                $i = 0;
            } else {
                $i++;
            }

            $html = $this->getContainer()->get('templating')->render('CoreSiteBundle:Spam:spamMessage.html.twig',
                array(
                    'data' => $e
                )
            );


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





            $e->setIsSended(true);
            $e->setSendedAt(new \DateTime);
        }
        $em->flush();
        $this->sendToMe();
    }


    public function sendToMe() {

    }

    public function getEmailConfig($index = 0)
    {
        $configs = [
            0 => [
                'host' => 'smtp.mail.ru',
                'user' => 'promomaster-net@mail.ru',
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
                'host' => 'smtp.gmail.com',
                'user' => 'promomaster.net@gmail.com',
                'password' => 'tel769242000',
                'encryption' => 'ssl',
                'port'=>465
            ]

        ];

        return $configs[$index];
    }
}
