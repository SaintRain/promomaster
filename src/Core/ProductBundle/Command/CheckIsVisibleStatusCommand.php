<?php
/**
 * Проверка продуктов на отображение
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 *
 * app/console product:check:isVisible
 */

namespace Core\ProductBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CheckIsVisibleStatusCommand extends ContainerAwareCommand
{

    /**
     * Конфигурации команды
     */
    protected function configure()
    {
        $this->setName('product:check:isVisible');
    }

    /**
     * Выполняемая команда
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em       = $this->getContainer()->get('doctrine')->getManager();

        $qb       = $em->createQueryBuilder();
        $ids      = $qb
            ->select('p.id')
            ->from('CoreProductBundle:CommonProduct', 'p')
            ->getQuery()
            ->getScalarResult();

        $pOld     = 0;
        $visible  = 0;
        $hidden   = 0;
        $total    = count($ids);
        foreach ($ids as $i => $id) {

            $product = $em->getRepository('CoreProductBundle:CommonProduct')->find($id);

            $this->getContainer()->get('core_product_logic')->checkAndSetIsVisiblePre($product);

            if ($product->getIsVisible()) {
                $visible++;
            } else {
                $hidden++;
            }

            $p = floor((($i + 1) / $total) * 100);
            if ($p !== $pOld && $p > 0) {
                if ($p % 10 === 0) {
                    $output->writeln('<info>'.$p.'%</info>');
                } else {
                    $output->writeln($p.'%');
                }
            }
            $pOld = $p;

            $em->flush();
            $em->clear();
        }

        $output->writeln("\n".'<info>Done!</info>');
        $output->writeln('Total: <info>'.$total.'</info>');
        $output->writeln('Visible: <info>'.$visible.'</info>');
        $output->writeln('Hidden: <info>'.$hidden.'</info>');
    }
}