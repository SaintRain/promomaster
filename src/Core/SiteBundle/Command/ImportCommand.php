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

mb_internal_encoding("UTF-8");
function mb_ucfirst($text) {
    return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
}

class ImportCommand extends ContainerAwareCommand
{
    const BASE_PATH = '../../../../web';

    protected function configure()
    {
        $this
            ->setName('site:import');
            //->addArgument('file_name', InputArgument::REQUIRED, 'File Name Fot CSV File Must Be in Web Uploads Dir')
           // ->addArgument('owner_email', InputArgument::REQUIRED, 'Sites Owner Email');
    }

    /**
     * @inheritDoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var \Doctrine\ORM\EntityManagerInterface $em */
        $em = $this->getContainer()->get('doctrine')->getManager();

//        $user = $em->getRepository('ApplicationSonataUserBundle:User')
//            ->findOneBy(['email' => $input->getArgument('owner_email')]);
//
//        if (!$user) {
//            $output->writeln(
//                sprintf('<error>User With Email %s Not Found</error>', $input->getArgument('owner_email'))
//            );
//
//            return null;
//        }


        $sites = $em->getRepository('CoreSiteBundle:WebSite')
            ->findAll(null, ['tyc', 'desc']);

         $total = [
            'all' => 0,
            'success' => 0,
            'error' => 0
        ];



        foreach ($sites as $key => $site) {

            $domain = $site->getDomain();

            if ($site) {
                $extraInfo = $this->getExtraInfo($domain);

                if (isset($extraInfo['title']) && $extraInfo['title'] != '') {
                    $site->setShortDescription(mb_ucfirst(trim($extraInfo['title'])));
                    ld($site->getShortDescription());
                    $em->flush();

                }
                else if (isset($extraInfo['description']) && $extraInfo['description'] != '') {
                    $site->setShortDescription(mb_ucfirst(trim($extraInfo['description'])));
                    ld($site->getShortDescription());
                    $em->flush();
                }

                ld('Обработано: ' . $key);
            }

            $total['all'] += 1;

        }

        $output->writeln(sprintf('<info>Total Sites Found %d</info>', $total['all']));
        $output->writeln(sprintf('<info>Total Sites Success Proccesses %d</info>', $total['success']));
        $output->writeln(sprintf('<info>Total Sites With Snapshot Problems %d</info>', $total['error']));
    }



    private
    function getExtraInfo($url)
    {
        try {


            $html = @file_get_contents($url);

            if (!$html) {
                return null;
            }

            $crawler = new Crawler($html);

            $nodeValues = $crawler->filter('head meta')->each(function (Crawler $node, $i) {
                return [
                    'content' => $node->attr('content'),
                    'name' => $node->attr('name')
                ];
            });

            $data = [];

            foreach ($nodeValues as $value) {
                if ($value['name'] == 'keywords') {
                    $data['keywords'] = str_replace(',', "\n\r", $value['content']);
                } elseif ($value['name'] == 'description') {
                    $data['description'] = ucfirst($value['content']);
                } elseif ($value['name'] == 'title') {
                    $data['title'] = ucfirst($value['content']);
                }
            }
        } catch (Exception $e) {
            $data = false;
        }


        return $data;
    }
}
