<?php

/**
 * Ручной запуск обновления информации об остатках товаров на складах
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\Common\Collections\ArrayCollection;

class RefreshProductAvailabilityInfoCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
                ->setName('productAvailability:refresh')
                ->setDescription('Обновления информации об остатках товаров на складах')
                ->addArgument(
                        'productId', InputArgument::REQUIRED, 'Введите ID продукта (all - все продукты):'
                )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {

        $output->writeln('Обновление запущено.');
        $productId = $input->getArgument('productId');

        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $logistics_logic = $this->getContainer()->get('core_logistics_logic');
        if ($productId == 'all') {
            $products = $em->getRepository('CoreProductBundle:CommonProduct')->findAll();
        } else {
            $products = $em->getRepository('CoreProductBundle:CommonProduct')->findById($productId);
        }

        if (count($products)) {
            $em->getConnection()->beginTransaction();
            try {
                $logistics_logic->updateProductAvailability($products);
                $em->flush();
                $em->getConnection()->commit();
            } catch (\Exception $e) {
                $em->getConnection()->rollback();
                $em->close();
                throw $e;
            }

            $output->writeln('Успешно обработано ' . count($products) . ' продуктов');
        } else {
            $output->writeln('Продукт(ы) не найден(ы)!');
        }
    }

}
