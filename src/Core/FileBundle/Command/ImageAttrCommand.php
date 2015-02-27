<?php

/**
 * Обновляем картинки добавляя им нужные свойства
 *
 * @author Kaluzhniy N.
 * @copyright LLC "PromoMaster"
 * app/console image:newAttr
 */

namespace Core\FileBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ImageAttrCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('image:newAttr')
            ->setDescription('New attrs for images')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Cron is runnig');
        $fileLogic = $this->getContainer()->get('core_file_logic');
        $total = $fileLogic->updateImgData();

        $output->writeln('<comment>The was updated ' . $total .' images</comment>');
        $output->writeln('Cron is finished');
    }
}