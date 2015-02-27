<?php
/**
 * На сайте каждую ночь (до формирования YML файла) необходимо пересчитывать цены на товары у которых указана валюта отличная от рубля.
 * Система автоматически должна изменять счет на оплату созданного заказа (заказ еще не был оплачен) если стоимость товара уменьшилась.
 * @author Sergeev A.M
 * @copyright LLC "PromoMaster"
 * app/console product:updatePrice
 */

namespace Core\ProductBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Core\ProductBundle\Entity\Product;
use Core\ManufacturerBundle\Entity\Manufacturer;
use Core\ManufacturerBundle\Entity\Brand;
use Core\ManufacturerBundle\Entity\Series;
use Core\CategoryBundle\Entity\ProductCategory;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;

class UpdatePriceByNewCurrencyCommand extends ContainerAwareCommand
{

    /**
     * Конфигурации команды
     */
    protected function configure()
    {
        $this
            ->setName('product:updatePrice')
            ->addOption(
                'log', null, InputOption::VALUE_NONE,
                'Если выставлено, то будет доступен вывод в консоль'
            )
        ;
    }

    /**
     * Выполняемая команда
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getContainer()->enterScope('request');
        $this->getContainer()->set('request', new Request(), 'request');

        if ($input->getOption('log')) {
            $output->writeln('Запуск обновления заказов');
        }

        $em = $this->getContainer()->get('doctrine')->getManager();
        
        $em->getConnection()->beginTransaction();
        try {
            //пересчитвваем стоимость для товаров
            $changed  = [];
            $pids     = [];
            $products = $em->getRepository('CoreProductBundle:CommonProduct')
                ->getProductsForUpdatePriceByNewCurrencyCommand();

            foreach ($products as $p) {
                $pids[]               = $p->getId();
                $priceOld             = $p->getPrice();
                $p->updatePrice();
                $changed[$p->getId()] = $p;
                $em->persist($p);
            }

            if (count($changed)) {
                //1. берем не оплаченные, не отмененные заказы для найденных продуктов $changed
                $orders = $em->getRepository('CoreOrderBundle:Order')
                    ->getOrdersForUpdatePriceByNewCurrencyCommand($pids);

                //2. пересчитываем стоимость заказа по новым ценам
                foreach ($orders as $order) {
                    $needUpdate = false;
                    foreach ($order->getCompositions() as $comp) {
                        //если произошло изменение
                        if (isset($changed[$comp->getProduct()->getId()]) &&
                            $comp->getPrice() > $changed[$comp->getProduct()->getId()]->getPrice()) {
                            $comp->setPrice($changed[$comp->getProduct()->getId()]->getPrice());
                            $em->persist($comp);
                            $needUpdate = true;
                        }
                    }
                    if ($needUpdate) {
                        $costInfo = $this->getContainer()->get('core_order_logic')->setCompositionsCost($order);
                        $em->persist($order);
                    }

                    //3. проверяем есть ли у заказа счет на оплату, если есть, то берем последний и обновляем стоимость
                    $payment = $order->getPayments()->last();
                    if ($payment && !$payment->getIsPassed()) {
                        $payment->setAmount($order->getCost());
                        $em->persist($payment);
                    }
                    if ($input->getOption('log')) {
                        $output->writeln('Заказ №'.$order->getId().' обработан');
                    }
                }
                $em->flush();
                $em->getConnection()->commit();
            }
        } catch (\Exception $e) {
            $em->getConnection()->rollback();
            $em->close();
            throw $e;
        }
        if (isset($orders)) {
            if ($input->getOption('log')) {
                $output->writeln('Обновлено '.count($orders).' заказов');
            }
        } else {
            if ($input->getOption('log')) {
                $output->writeln('Ни один заказ не был обновлен.');
            }
        }
        return $output;
    }
}