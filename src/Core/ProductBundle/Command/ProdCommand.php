<?php
/**
 * Генерирование YML-файла
 * @author Sergeev A.M
 * @copyright LLC "PromoMaster"
 * app/console product:yml
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

class ProdCommand extends ContainerAwareCommand
{

    /**
     * Конфигурации команды
     */
    protected function configure()
    {
        $this
            ->setName('product:upd')
            ->addOption(
                'run', null, InputOption::VALUE_NONE,
                'Если выставлено, то крону  не нужна метка на запуск генерирования YML, он сам её создаст'
            )
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
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $em->getConnection()->getConfiguration()->setSQLLogger(null);
        $em->getConnection()->beginTransaction();
        try {

            $products = $em->getRepository('CoreProductBundle:CommonProduct')->UpdateProd();
            $em->clear();
            //var_dump(count($products));
            //die();
            //ldd(count($products));
            foreach ($products as $p) {
                $p = $em->merge($p);
                //$time_start = microtime(true);
                if ($p->getOOPBCurrency() && $p->getOOPBCurrency()->getCurrency()=='RUB') {
                    $p->setOOPBCurrencyRateAdditive(0);
                }
                $p->setOrderOnlyShopTax(44);
                $p->setOrderOnlyShopTaxInPercent(true);
                $p->updatePrice();
               //ld($p->getId());
//                ld($p->getPrice());
                
                //$em->persist($p);
                $em->flush();
                $em->clear();
                //$execution_time = (microtime(true) - $time_start);
                //echo 'Diff ' .  $p->getId() . ' --  '. $execution_time . "\n\r";
            //    ld($p->getId());
                //ldd($p->getOrderOnlyShopTax());
            }
           //$em->flush();


            $em->getConnection()->commit();
        } catch (Exception $e) {
            $em->getConnection()->rollback();
            $em->close();

            throw $e;
        }
        return true;
    }
}