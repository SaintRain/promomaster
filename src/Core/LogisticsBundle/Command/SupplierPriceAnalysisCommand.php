<?php

/**
 * Команда для обновления остатков по прайсам
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 * app/console logistics:bank:add_bik
 */

namespace Core\LogisticsBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Core\LogisticsBundle\Entity\SupplierPriceAnalysisHistory;

class SupplierPriceAnalysisCommand extends ContainerAwareCommand
{

    public function __construct($name = null)
    {
        // Вызываем родительский конструктор
        parent::__construct($name);
    }

    /**
     * Конфигурации команды
     */
    protected function configure()
    {
        $this
            ->setName('logistics:supplier:price_analysis');
    }

    /**
     * Выполняемая команда
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $cache = $this->getContainer()->get('beryllium_cache');
//        $cache->set('needToParceAnalysisPrices', 152);
//$cache->delete('parceAnalysisPricesIsRun');

        if ( $price_analysis_id = $cache->get('needToParceAnalysisPrices') and !$cache->get('parceAnalysisPricesIsRun')) {
            $cache->delete('needToParceAnalysisPrices'); //сразу ставим метку, иначе другие экземпляры могут запускаться
            $cache->set('parceAnalysisPricesIsRun', true, 600);   //ставим метку, что парсер запущен
            $cache->delete('parcePricesAnalysisInProgress');

            $em = $this->getContainer()->get('doctrine.orm.entity_manager');
            $em->getConnection()->getConfiguration()->setSQLLogger(null);

            $price_analysis = $em->getRepository('CoreLogisticsBundle:SupplierPriceAnalysis')
                ->find($price_analysis_id);

            if (!$price_analysis->getIsQuantityProcessed()) {
                $logic = $this->getContainer()->get('core_logistics_supplier_price_analysis_logic');
                $em->getConnection()->beginTransaction(); // suspend auto-commit
                try {
                    $this->updatePriceHistory($price_analysis, $logic, $em, $output);
                    $quantityProcessed = $this->updateQuantity($price_analysis, $logic, $em, $cache, $output);
                    $price_analysis=$em->merge($price_analysis);
                    $price_analysis->setIsQuantityProcessed(true);
                    $em->flush();
                    $em->getConnection()->commit();
                    $output->writeln('<comment>Updated records ' . $quantityProcessed . '</comment>');
                } catch (Exception $e) {
                    $em->getConnection()->rollback();
                    $em->close();
                    $output->writeln('<comment>Error ' . $e . '</comment>');
                    $cache->delete('parceAnalysisPricesIsRun');
                    throw $e;
                }
            }
            $cache->delete('parceAnalysisPricesIsRun');
        }
    }


    /**
     * Сохраняет цены для продуктов на момент загрузки прайса
     * @return array
     * @throws \Exception
     */
    public function updatePriceHistory($priceAnalysis, $logic, $em, $output)
    {
        $datetime = new \DateTime();
        $logic->setPriceAnalysis($priceAnalysis);
        $data     = $logic->readPrice()['good'];
        if ($data) {
            $products = $logic->getProducts();
            foreach ($products as $p) {
                //нашли такой продукт в базе
                if (isset($data[$p->getSku()])) {
                    $pHistory = new SupplierPriceAnalysisHistory();
                    $pHistory
                        ->setPriceAnalysis($priceAnalysis)
                        ->setProduct($p)
                        ->setPrice($p->getPrice())
                        ->setOrderOnlyPriceBuying($p->getOrderOnlyPriceBuying())
                        ->setOOPBCurrency($p->getOOPBCurrency())
                        ->setMrc($p->getMrc());

                    $em->persist($pHistory);
                }
            }
            $em->flush();
        }
        $output->writeln('<comment>History is created!</comment>');
        return true;
    }

    /**
     * Обновляем остаток товара
     * @param $logic
     * @param $em
     * @return int
     */
    private function updateQuantity($price_analysis, $logic, $em, $cache, $output)
    {
        $logic->setPriceAnalysis($price_analysis);

        $datetime = new \DateTime();
        $data = $logic->readPrice()['good'];
        if ($data) {
            $processed = 0;
            $pred = 0;
            $products    = $logic->getProducts();

            $totalQuantity = count($products);
            foreach ($products as $p) {
                $em->clear();
                $p=$em->merge($p);
                $sup = $em->merge($logic->getPriceAnalysis()->getSupplier());

                $start = microtime(true);
                $p
                    ->setSupplier($sup)
                    ->setOOPBQuantity($data[$p->getSku()]['OOPBQuantity'])
                    ->setOOPBQuantityUpdated($datetime);
                $em->flush();

                $time = microtime(true) - $start;
             //   ld($time);
                $processed++;
                //вычисляем и проставляем прогресс
                $progressPercent = number_format($processed / ($totalQuantity / 100), 0);
                $info = [
                    'percent' => $progressPercent,
                    'quantity' => $processed
                ];
                $cache->set('parcePricesAnalysisInProgress', $info, 360);
                if ($progressPercent != $pred) {
                    $output->writeln('<comment>Processed ' . $progressPercent . '%</comment>');
                }
                $pred = $progressPercent;
            }
        } else {
            $totalQuantity = 0;
        }

        return $totalQuantity;
    }


}
