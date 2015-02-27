<?php
/**
 * Парсинг файлов с продуктами
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 *
 * app/console slug:history:write
 */

namespace Core\SlugHistoryBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\Common\Collections\ArrayCollection;

class SlugHistoryCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('slug:history:write')
            ->addArgument(
                'id', InputArgument::REQUIRED, 'Id'
            )
            ->addArgument(
                'class', InputArgument::REQUIRED, 'Namespace'
            )
            ->addArgument(
                'extraParameterName', InputArgument::REQUIRED, 'Extra parameter name'
            )
            ->addArgument(
                'oldSlug', InputArgument::REQUIRED, 'Old slug'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $options = [
            'id' => $input->getArgument('id'),
            'class' => $input->getArgument('class'),
            'extraParameterName' => $input->getArgument('extraParameterName'),
            'oldSlug' => $input->getArgument('oldSlug'),
        ];

        $this->getContainer()->get('core_slug_history_logic')->writeSlugHistory($options);
    }
}