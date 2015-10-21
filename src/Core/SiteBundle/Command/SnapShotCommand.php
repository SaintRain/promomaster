<?php

namespace Core\SiteBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Core\SiteBundle\Entity\WebSite;

class SnapShotCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('site:snapshot')
            ->addOption(
                'id', null, InputOption::VALUE_OPTIONAL,
                'Site Id'
            );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return bool
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Command is running </info>');
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $id = $input->getOption('id');

        if ($id) {
            $site = $em->getRepository('CoreSiteBundle:WebSite')->find((int) $id);

            if (!$site) {
                $output->writeln('<error>Site Not Found</error>');

                return false;
            }

            if ($this->makeSnapShot($site)) {
                $site->setIsHaveSnapshot(true);
                $em->flush($site);
                $output->writeln('<info>Snapshot for site created successfull</info>');
            } else {
                $output->writeln('<info>Can not create snapshot for site</info>');
            }
        } else {
            $success = 0;
            $failed = 0;
            $total = 0;
            foreach($em->getRepository('CoreSiteBundle:WebSite')->findBy(['isHaveSnapshot' => false]) as $site) {
                $total++;
                if ($this->makeSnapShot($site)) {
                    $success++;
                    $site->setIsHaveSnapshot(true);
                } else {
                    $failed++;
                }
            }

            $em->flush();
            if ($total) {
                $output->writeln('<info>Snapshot for '. $success . ' site created successfull</info>');
                $output->writeln('<info>Can not create snapshot for '. $failed . ' sites</info>');
            }
        }

        $output->writeln('<info>Command is finised</info>');
    }

    /**
     * @param WebSite $site
     * @return bool
     */
    private function makeSnapShot(WebSite $site)
    {
        $result = false;

        if (!file_exists($site->getUploadRootDir())) {
            mkdir($site->getUploadRootDir());
        }

        $file = sprintf('site-%d', $site->getId());
        $imagePath = sprintf('%s/%s.jpg', $site->getUploadRootDir(),$file);
        $pfdPath = sprintf('%s/%s.pdf', $site->getUploadRootDir(), $file);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        try {
            $this->getContainer()->get('knp_snappy.image')->generate($site->getDomain(), $imagePath);
            $site->setSnapShot(sprintf('%s.jpg', $file));
            $result = true;
        } catch(\Exception $exception) {
            $result = false;
        }

        try {
            if (!$result) {
                $res = $this->getContainer()->get('knp_snappy.pdf')->generate($site->getDomain(), $pfdPath);

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                $imagick = new \Imagick();
                $imagick->setResolution(300,300);
                $imagick->readimage("{$pfdPath}[0]");
                $imagick->scaleImage(700, 740, true);
                $imagick->setImageFormat('jpg');
                $imagick->writeImage($imagePath);
                $imagick->clear();
                $imagick->destroy();

                $site->setSnapShot(sprintf('%s.jpg', $file));

                unlink($pfdPath);
                $result = true;
            }
        } catch (\Exception $exception) {
            $result = false;
        }

        return $result;
//
//        if ($this->getContainer()->get('knp_snappy.image')->generate($site->getDomain(), $imagePath)) {
//            $site->setSnapShot($file);
//
//            return true;
//        } elseif (null === $this->getContainer()->get('knp_snappy.pdf')->generate($site->getDomain(), $pfdPath)) {
//
//            if (file_exists($imagePath)) {
//                unlink($imagePath);
//            }
//
//            $imagick = new \Imagick();
//            $imagick->setResolution(300,300);
//            $imagick->readimage("{$pfdPath}[0]");
//            $imagick->scaleImage(700, 740, true);
//            $imagick->setImageFormat('jpg');
//            $imagick->writeImage($imagePath);
//            $imagick->clear();
//            $imagick->destroy();
//
//            $site->setSnapShot(sprintf('%s.jpg', $file));
//
//            unlink($pfdPath);
//
//            return true;
//        }
//
//        return false;
    }
}
