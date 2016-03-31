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

class YandexRatingCommand extends ContainerAwareCommand
{
    const BASE_PATH = '../../../../web';

    protected function configure()
    {
        $this
            ->setName('site:importYandexRating')
            ->addArgument('debug', InputArgument::OPTIONAL, 'is need debug Mode?');
    }

    /**
     * @inheritDoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {


        $em = $this->getContainer()->get('doctrine')->getManager();
        $sites = $em->getRepository('CoreSiteBundle:WebSite')->findAll();

        foreach ($sites as $key => $site) {


            $domain = $site->getDomain();
            $siteLogic = $this->getContainer()->get('core_site_logic');


            list($tyc, $rang) = $siteLogic->getYandexTicFromBar($domain);


//            list($tyc, $rating) = (rand(0, 100) % 2 == 0)
//                ? $siteLogic->getYandexTicFromSite($domain)
//                : $siteLogic->getYandexTicFromBar($domain);

            $site
                ->setTyc($tyc)
                ->setRang($rang);

            $em->flush();

            if ($input->getArgument('debug')) {
                ld('Обработано: ' . $key.', '.$domain.' rang='.$rang.', tyc='.$tyc);
            }

        }

    }
}
