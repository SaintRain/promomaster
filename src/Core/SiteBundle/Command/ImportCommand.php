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

class ImportCommand extends ContainerAwareCommand
{
    const BASE_PATH = '../../../../web';

    protected function configure()
    {
        $this
            ->setName('site:import')
            ->addArgument('file_name', InputArgument::REQUIRED, 'File Name Fot CSV File Must Be in Web Uploads Dir')
            ->addArgument('owner_email', InputArgument::REQUIRED, 'Sites Owner Email');
    }

    /**
     * @inheritDoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var \Doctrine\ORM\EntityManagerInterface $em */
        $em = $this->getContainer()->get('doctrine')->getManager();

        $user = $em->getRepository('ApplicationSonataUserBundle:User')
            ->findOneBy(['email' => $input->getArgument('owner_email')]);

        if (!$user) {
            $output->writeln(
                sprintf('<error>User With Email %s Not Found</error>', $input->getArgument('owner_email'))
            );

            return null;
        }

        $filePath = sprintf('%s/%s/%s', __DIR__, static::BASE_PATH, $input->getArgument('file_name'));

        $handle = fopen($filePath, 'r');

        $total = [
            'all' => 0,
            'success' => 0,
            'error' => 0
        ];

        if (($handle = fopen($filePath, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {


//                if (count($data) != 2) {
//                    $output->writeln('<error>Arguments mismatch</error>');
//                    continue;
//                }

                $cats = explode(',', $data[4]);
                $categories = new ArrayCollection();

                foreach ($cats as $c) {
                    $category = $em->getRepository('CoreCategoryBundle:SiteCategory')->find(trim($c));

                    if (!$category) {
                        $output->writeln(
                            sprintf('<error>Site Category With Id %d Not Found</error>', $data[1])
                        );
                        continue;
                    }

                    $categories->add($category);
                }



                $domain = $this->getContainer()->get('core_site_logic')->getDomainFromUrl($data[0]);


                if ($data[3]=='') {
                    $extraInfo = $this->getExtraInfo($domain);
                    $data[3]=$extraInfo['description'];
                }

                $extraInfo = [
                    'keywords' => $data[1],
                    'shortDescription' => $data[3],
                    'region'=>$data[2]
                ];
                if ($extraInfo) {
                    $site = new WebSite();

                    if (isset($extraInfo['keywords'])) {
                        $site->setKeywords($extraInfo['keywords']);
                    }

                    if (isset($extraInfo['shortDescription'])) {
                        $site->setShortDescription($extraInfo['shortDescription']);
                    }

                    if (isset($extraInfo['region'])) {
                        $site->setRegion($extraInfo['region']);
                    }
                    $site
                        ->setUser($user)
                        ->setDomain($domain)
                        ->setIsVerified(true)
                        ->setCategories($categories)
                        ->setCreatedDateTime(new \DateTime());

                    $em->persist($site);
                    $em->flush();

//                    $snapShotLogic = $this->getContainer()->get('core_site.logic.snapshot_logic');
//
//                    if ($snapShotLogic->makeSnapShot($site)) {
//                        $site->setIsHaveSnapshot(true);
//                        $em->flush($site);
//                        $total['success'] += 1;
//                    } else {
//                        $total['error'] += 1;
//                    }

                    $em->detach($site);

                    $output->writeln(sprintf('<info>Processed %d '.$domain.'</info>', $total['all']));

                } else {
                    $total['error'] += 1;
                }

                $total['all'] += 1;
            }
            fclose($handle);
        }

        $output->writeln(sprintf('<info>Total Sites Found %d</info>', $total['all']));
        $output->writeln(sprintf('<info>Total Sites Success Proccesses %d</info>', $total['success']));
        $output->writeln(sprintf('<info>Total Sites With Snapshot Problems %d</info>', $total['error']));
    }

    private function getExtraInfo($url)
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
                }
            }
        } catch (Exception $e) {
            $data = false;
        }


        return $data;
    }
}
