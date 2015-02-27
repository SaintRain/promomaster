<?php
/**
 * Парсинг файлов с продуктами
 * @author Sergeev A.M
 * @copyright LLC "PromoMaster"
 * app/console product:parce
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

class ParcePriceCommand extends ContainerAwareCommand
{
    private $newObjects;

    /**
     * Конфигурации команды
     */
    protected function configure()
    {
        $this
            ->setName('product:parce')
            ->addOption(
                'log', null, InputOption::VALUE_NONE,
                'Если выставлено, то будет доступен вывод в консоль'
            );
    }


    /**
     * Выполняемая команда
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $cache = $this->getContainer()->get('beryllium_cache');
        //если есть флаг, что файл был загружен
//        $cache->delete('parceProductPricesInProgress');
        if ($cache->get('needToParceProductPrices')) {
            $filename = $cache->get('needToParceProductPrices');
            $cache->delete('needToParceProductPrices'); //сразу ставим метку, иначе другие экземпляры могут запускаться
            if ($input->getOption('log')) {
                $output->writeln('Начало парсинга');
            }

            $index = 0;
            $em = $this->getContainer()->get('doctrine.orm.entity_manager');
            $em->getConnection()->getConfiguration()->setSQLLogger(null);

            //получаем валюту для предзаказа
            $default_currency=$em->getRepository('CoreDirectoryBundle:Currency')->findOneByCurrency($this->getContainer()->getParameter('default_currency'));

            gc_enable();
            if (($handle = fopen($filename, 'r')) !== false) {
                while (($d = fgetcsv($handle, 0, ';')) !== false) {

                    if ($index > 0) { //пропускаем заголовки
                        //ldd($d);
                        //пересобираем данные в понятном формате
                        $t = [
                            'manufacturerMain' => $d[0],
                            'countryOfOrigin' => $d[1],
                            'brand' => $d[2],
                            'serie' => $d[3],
                            'sku' => $d[4],
                            'article' => $d[5],
                            'captionRu' => $d[6],
                            'barcode' => $d[7],
                            'categoryMain' => $d[8],
                            'categories' => $d[9],
                            'netWeight' => $d[10],
                            'isNetWeightInGm' => false,
                            'grossWeight' => $d[11],
                            'isGrossWeightInGm' => false,
                            'lengthOfBox' => $d[12],
                            'widthOfBox' => $d[13],
                            'heightOfBox' => $d[14],
                            'price' => $d[15],
                            'urls' => $d[16],
                            'orderOnlyPriceBuying' => $d[17],
                            'OOPBCurrency'=>$default_currency
                        ];

                        $t['manufacturerMain'] = $this->findObject($t['manufacturerMain'],
                            'Core\ManufacturerBundle\Entity\Manufacturer',
                            'Не найден производитель с ID: %s', $output);
                        $t['countryOfOrigin'] = $em->getRepository('CoreDirectoryBundle:Country')->findOneByAlpha2(trim($t['countryOfOrigin']));
                        $t['brand'] = $this->findObject($t['brand'],
                            'Core\ManufacturerBundle\Entity\Brand',
                            'Не найден бренд с ID: %s', $output);
                        $t['brand']->setManufacturer($t['manufacturerMain']);
                        $t['serie'] = $this->findObject($t['serie'],
                            'Core\ManufacturerBundle\Entity\Series',
                            'Не найдена серия с ID: %s', $output);
                        $t['serie']->setBrand($t['brand']);

                        //преобразовываем штрихкоды
                        $t['barcode'] = implode("\n",
                            array_map('trim', explode(',', $t['barcode'])));

                        $t['categoryMain'] = $this->findObject($t['categoryMain'],
                            'Core\CategoryBundle\Entity\ProductCategory',
                            'Не найдена категория с ID: %s', $output);

                        //смотрим дополнительные подкатегории
                        $caregories = new ArrayCollection;
                        $needAddMainCat = true;
                        if ($t['categories']) {
                            $t['categories'] = array_map('trim',
                                explode(',', $t['categories']));
                            foreach ($t['categories'] as $cat) {
                                $catObj = $this->findObject($cat,
                                    'Core\CategoryBundle\Entity\ProductCategory',
                                    'Не найдена категория с ID: %s', $output);
                                $caregories->add($catObj);
                                //проверяем нужно ли добавить основную категорию к дополнительным категриям
                                if ($catObj->getId() == $t['categoryMain']->getId()) {
                                    $needAddMainCat = false;
                                }
                            }
                        }

                        //добавляем основную категорию
                        if ($needAddMainCat) {
                            $caregories->add($t['categoryMain']);
                        }

                        //назначаем все дочерние категории от указанных
                        $childrens = [];
                        foreach ($caregories as $cat) {
                            $temp = $em->getRepository('Core\CategoryBundle\Entity\ProductCategory')->getChildren($cat);
                            $childrens = array_merge($childrens, $temp);
                        }

                        foreach ($childrens as $child) {
                            if (!$caregories->contains($child)) {
                                $caregories->add($child);
                            }
                        }

                        $t['categories'] = $caregories;
                        $t['netWeight'] = floatval(str_replace(',', '.',
                            $t['netWeight']));
                        $t['grossWeight'] = floatval(str_replace(',', '.',
                            $t['grossWeight']));
                        $t['lengthOfBox'] = floatval(str_replace(',', '.',
                                $t['lengthOfBox'])) * 10; //величина задана в см переводим в мм
                        $t['widthOfBox'] = floatval(str_replace(',', '.',
                                $t['widthOfBox'])) * 10; //величина задана в см переводим в мм
                        $t['heightOfBox'] = floatval(str_replace(',', '.',
                                $t['heightOfBox'])) * 10; //величина задана в см переводим в мм
                        $t['price'] = floatval(str_replace(',', '.',
                            $t['price']));
                        $t['orderOnlyPriceBuying'] = floatval(str_replace(',', '.',
                            $t['orderOnlyPriceBuying']));

                        //берём URL картинок
                        $images = array_map('trim', explode(',', $t['urls']));
                        if (isset($images[0])) {
                            $t['imagesUrl'] = $images;
                        }

                        $data[] = $t;
                    }
                    $index++;
                }
                fclose($handle);
            }

            //берём единицу измерения
            $unitOfMeasure = $em->getRepository('CoreDirectoryBundle:UnitOfMeasure')->findOneByCaptionRu('Штуки');

            $validator = $this->getContainer()->get('validator');

            $em->getConnection()->beginTransaction();
            $productsCount = 0;
            $processed = 0;
            try {
                foreach ($data as $key => $d) {
                    //проверяем, чтобы не добавить в базу одинаковые продукты
                    $finded = $em->getRepository('CoreProductBundle:CommonProduct')->findSimilar($d['sku'],
                        $d['article']);
                    if (!$finded['quantity']) {
                        $manufacturers = new ArrayCollection;
                        $manufacturers->add($d['manufacturerMain']);
                        $p = new Product();
                        $p->setManufacturerMain($d['manufacturerMain'])
                            ->setManufacturers($manufacturers)//добовляем производителя, иначе валидация не пропустит
                            ->setCountryOfOrigin($d['countryOfOrigin'])
                            ->setBrand($d['brand'])
                            ->setSerie($d['serie'])
                            ->setSku($d['sku'])
                            ->setArticle($d['article'])
                            ->setCaptionRu($d['captionRu'])
                            ->setBarcode($d['barcode'])
                            ->setCategoryMain($d['categoryMain'])
                            ->setCategories($d['categories'])
                            ->setNetWeight($d['netWeight'])
                            ->setIsNetWeightInGm($d['isNetWeightInGm'])
                            ->setGrossWeight($d['grossWeight'])
                            ->setIsGrossWeightInGm($d['isGrossWeightInGm'])
                            ->setLengthOfBox($d['lengthOfBox'])
                            ->setWidthOfBox($d['widthOfBox'])
                            ->setHeightOfBox($d['heightOfBox'])
                            ->setSlug(null)
                            ->setUnitOfMeasure($unitOfMeasure)
                            ->setPrice($d['price'])
                            ->setOrderOnlyPriceBuying($d['orderOnlyPriceBuying']);

                        //только под заказ
                        if ($d['orderOnlyPriceBuying']) {
                            $p
                                ->setIsVisible(false)
                                ->setIsEnabled(false)
                                ->setOrderOnly(true)
                            ->setOOPBCurrency($d['OOPBCurrency']);
                        }

                        //проверка на валидность
                        $errors = $validator->validate($p);
                        if (count($errors)) {
                            $errorsString = (string)$errors;
                            $output->writeln('<error>' . $errorsString . '<error>');
                            //удаляем
                            $cache->delete('needToParceProductPrices');
                            $cache->delete('parceProductPricesInProgress');
                            $cache->set('parceProductIsErrors', $errorsString);
                            return false;
                        }
                        $em->persist($d['categoryMain']);
                        $em->persist($d['manufacturerMain']);
                        $em->persist($p);
                        $em->flush();

                        //загружаем и проставляем картинки
                        if (isset($d['imagesUrl'])) {
                            if (isset($d['imagesUrl'])) {
                                foreach ($d['imagesUrl'] as $url) {
                                    $this->getContainer()->get('core_file_logic')->attachImageFromURL($url, $p, 'images');
                                }
                            }
                        }

                        $em->detach($p);
                        gc_collect_cycles();
                        $productsCount++;
                    }
                    $processed++;
                    //вычисляем и проставляем прогресс
                    $progressPercent = number_format($processed / ($index / 100),
                        0);
                    $cache->set('parceProductPricesInProgress',
                        $progressPercent, 360);
                }
                $em->getConnection()->commit();
            } catch (Exception $e) {
                $em->getConnection()->rollback();
                $em->close();
                //удаляем
                $cache->delete('needToParceProductPrices');
                $cache->delete('parceProductPricesInProgress');
                $cache->set('parceProductIsErrors', $em);
                throw $e;
            }
            //удаляем метку в конце парсинга
            $cache->delete('needToParceProductPrices');
            $cache->delete('parceProductPricesInProgress');
            $cache->set('parceProductIsFinished', $productsCount, 60);

            if ($input->getOption('log')) {
                $output->writeln('Добавлено товаров: <info>' . $productsCount . '</info>');
            }
        } else {
            if ($input->getOption('log')) {
                $output->writeln('Отсутствует загруженный файл для парсинга');
            }
        }
    }

    public function findObject($property, $className, $errorFormat, $output)
    {

        $property = trim($property);
        $cache = $this->getContainer()->get('beryllium_cache');
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        //определям, что у нас на входе ID
        if (is_numeric($property)) {
            $propertyObj = $em->getRepository($className)->find($property);
            if (!$propertyObj) {
                $error = sprintf($errorFormat, $property, true);
                $output->writeln('<error>' . $error . '<error>');
                //удаляем метку в конце парсинга
                $cache->delete('needToParceProductPrices');
                $cache->delete('parceProductPricesInProgress');
                $cache->set('parceProductIsErrors', $error);
                exit;
            } else {
                $property = $propertyObj;
            }
        } else {
            $propertyObj = $em->getRepository($className)->findOneByCaptionRu($property);
            if (is_object($propertyObj)) {
                $this->newObjects[$className][$property] = $propertyObj;
            }
        }
        //если так ничего и не нашли
        if (!is_object($propertyObj)) {
            if (!isset($this->newObjects[$className][$property])) {
                $this->newObjects[$className][$property] = (new $className())->setCaptionRu($property);
            }
            $propertyObj = $this->newObjects[$className][$property];
        }
        return $propertyObj;
    }

}