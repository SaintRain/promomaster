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

class UpdateTextCommand extends ContainerAwareCommand
{
    const BASE_PATH = '../../../../web';

    protected function configure()
    {
        $this
            ->setName('site:updatetext')
            ;
    }

    /**
     * @inheritDoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $em = $this->getContainer()->get('doctrine')->getManager();
        $sites = $em->getRepository('CoreSiteBundle:WebSite')->findAll();

        foreach ($sites as $key => $site) {


            $site->setDescription(  $this->replaceInText($site->getDescription()));
            $site->setShortDescription(  $this->replaceInText($site->getShortDescription()));


            $output->writeln('Обработано '.($key+1));

            $em->flush();
        }


    }

    public function replaceInText($text) {


        $text=htmlspecialchars_decode($text, ENT_QUOTES);

        return $text;
    }
}
