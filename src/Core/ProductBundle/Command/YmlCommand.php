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

class YmlCommand extends ContainerAwareCommand
{

    /**
     * Конфигурации команды
     */
    protected function configure()
    {
        $this
            ->setName('product:yml')
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

        $rootDir   = $this->getContainer()->get('kernel')->getRootDir().'/../web/';
        $filename1 = 'yml_wt.xml';
        $filename2 = 'yml_market.xml';
        $cache     = $this->getContainer()->get('beryllium_cache');

        //выствляем принудительно флаг для запуска
        if ($input->getOption('run')) {
            $cache->set('needToGenerateYML', time(), 90);
            $cache->delete('generateYMLIsFinished');   //удаляем флаг от предыдущей работы
            $cache->delete('generateYMLIsErrors');   //удаляем флаг ошибок, если он есть
            $cache->delete('generateYMLInProgress');
        }

        if (1) {
            //if ( $cache->get('needToGenerateYML')) {
            $cache->delete('needToGenerateYML'); //убираем метку, чтоб другие кроны не запускались
            if ($input->getOption('log')) {
                $output->writeln('Начало парсинга');
            }
            gc_enable();
            $this->getContainer()->enterScope('request');
            $this->getContainer()->set('request', new Request(), 'request');
            $em = $this->getContainer()->get('doctrine.orm.entity_manager');
            $em->getConnection()->getConfiguration()->setSQLLogger(null);

            list($categories1, $categories2) = $em->getRepository('CoreCategoryBundle:ProductCategory')->getTreeForYML();

            //определяем рут категории, которые следует не включать в yml
            $root_cat_ids = [];
            if ($categories1) {
                foreach ($categories1 as $cat) {
                    if (!$cat->getParent()) {
                        $root_cat_ids[] = $cat->getId();
                    }
                }
            }

            $perPage    = 100;
            $processed  = 0;
            $totalPages = false;
            $page       = 1;
            $offers1    = '';
            $offers2    = '';
            while ($page < $totalPages + 1 || !$totalPages) {
                $QueryBuilder = $em->getRepository('CoreProductBundle:CommonProduct')->getQueryForYml();
                $data         = $this->getContainer()->get('application_knp_paginator_logic')->paginate($QueryBuilder,
                    $page, $perPage, ['isUseInConsole' => true]);
                if (!$totalPages) {
                    $totalProdudctsCount = $data->getTotalItemCount();
                    $totalPages          = ceil($totalProdudctsCount / $perPage); //количество страниц
                }

                $yml_wt_products     = [];
                $yml_market_products = [];
                foreach ($data->getItems() as $product) {
                    //генерируем данные для multiselect одной строкой
                    $multiselectDataToStr = [];
                    foreach ($product->getProductDataProperty() as $pdp) {
                        if ($pdp->getData()->getProperty()->getEditType() == 'multiselect') {
                            $multiselectDataToStr[$pdp->getData()->getProperty()->getName()][]
                                = $pdp->getData()->getValue();
                        }
                    }
                    $product->multiselectDataToStr = $multiselectDataToStr;

                    $yml_wt_products[] = $product;

                    // ->andWhere('p.isCanBeInYml=1')
                    //  ->andWhere('manufacturerMain.isCanBeInYml=1')

                    //добавляем тольке те, которые есть в наличии, или все под заказ
                    if (($product->getAvailabilityQuantity() || $product->getOrderOnly()) && $product->getIsCanBeInYml()
                        && $product->getManufacturerMain()->getIsCanBeInYml()) {
                        $yml_market_products[] = $product;
                    }
                    $em->detach($product);
                }
                $processed+=count($data->getItems());
                $page++;

                //вычисляем и проставляем прогресс
                $progressPercent = number_format($processed / ($totalProdudctsCount
                    / 100), 0);
                $cache->set('generateYMLInProgress', $progressPercent, 360);
                if ($input->getOption('log')) {
                    $output->writeln('Обработано товаров: <info>'.$processed.'</info>');
                }

                $offers1.=$this->getContainer()->get('templating')->render('CoreProductBundle:Command:ymlOffers.html.twig',
                    array('products' => $yml_wt_products));
                $offers2.=$this->getContainer()->get('templating')->render('CoreProductBundle:Command:ymlOffers.html.twig',
                    array('products' => $yml_market_products));
                $em->clear();
                gc_collect_cycles();
            }


            $res1 = $this->getContainer()->get('templating')->render('CoreProductBundle:Command:ymlGenerate.html.twig',
                array('offers' => $offers1, 'categories' => $categories1, 'root_cat_ids' => $root_cat_ids));
            $res2 = $this->getContainer()->get('templating')->render('CoreProductBundle:Command:ymlGenerate.html.twig',
                array('offers' => $offers2, 'categories' => $categories2, 'root_cat_ids' => $root_cat_ids));

            //записываем в файлы
            file_put_contents($rootDir.$filename1, $res1);
            file_put_contents($rootDir.$filename2, $res2);

            //удаляем метку в конце
            $cache->set('generateYMLIsFinished', $processed, 60);
            if ($input->getOption('log')) {
                $output->writeln('Файлы сгенерированы!');
            }
            return [$res1, $res2];
        } else {
            if ($input->getOption('log')) {
                $output->writeln('Отсутствует метка запуска!');
            }
            return false;
        }
    }
}