<?php
/**
 * Логика для анализа загружаемых файлов
 *
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Logic;

use Core\LogisticsBundle\Entity\SupplierPriceAnalysis;
use Core\LogisticsBundle\Entity\SupplierPriceAnalysisHistory;
use Doctrine\Common\Collections\ArrayCollection;

class SupplierPriceAnalysisLogic
{
    public $em;
    public $phpexcel;
    public $fileLogic;
    private $priceAnalysis;
    private $parcedPriceData = [];
    private $products;
    private $pHistories;

    function __construct($em, $phpexcel, $fileLogic)
    {
        $this->em = $em;
        $this->phpexcel = $phpexcel;
        $this->fileLogic = $fileLogic;
    }

    public function getAlphabetPosition($alphabet)
    {

        $alphabet = preg_replace('/[^a-z]+/iu', '', $alphabet);

        $res = \PHPExcel_Cell::columnIndexFromString($alphabet) - 1;

        return $res;
    }

    /**
     * Устанавливаем обект, который содержит ссылку на файл прайса
     * @param PriceAnalysis $priceAnalysis
     * @return class PriceAnalysisLogic
     */
    public function setPriceAnalysis(SupplierPriceAnalysis $priceAnalysis)
    {
        $this->priceAnalysis = $priceAnalysis;
        return $this;
    }

    /**
     * Берём обект, который содержит ссылку на файл прайса
     * @return class PriceAnalysisLogic
     */
    public function getPriceAnalysis()
    {
        return $this->priceAnalysis;
    }

    /**
     * Читаем из прайса данные
     * @return array
     * @throws \Exception
     */
    public function readPrice()
    {

        //если данные не былы распарсены
        if (!$this->priceAnalysis) {
            throw new \Exception('Не установлен priceAnalysis !');
        } elseif (!isset($this->parcedPriceData[$this->priceAnalysis->getId()])) {
            if ($this->priceAnalysis->getSerializeRows()) {

                $rows = $this->priceAnalysis->getSerializeRows();

                //преобразовываем в удобный формат
                $linker = [];
                $parcedPriceData = [];
                //смотрим для каких колонок есть соответствия в настройках
                $paSettings = [];
                $paSettingsTypes = [];
                $formules = [];
                $badRecords = [];
                $skuGoodList = [];
                $needMrc = false;
                foreach ($this->priceAnalysis->getSupplier()->getPaSettings() as $pas) {
                    $aPosition = $this->getAlphabetPosition($pas->getColumnCaption());
                    if ($pas->getFieldNameFromProductEntity() == 'mrc') {
                        $needMrc = true;
                    }
                    //если вместо названия колонки дана формула
                    if (strlen($pas->getColumnCaption()) > 1) {
                        $formules[$pas->getFieldNameFromProductEntity()] = $pas;   //запоминаем формулу
                    } else {
                        $paSettings[$aPosition] = $pas->getFieldNameFromProductEntity();
                        $paSettingsTypes[$aPosition] = $pas->getFieldType();
                    }
                }

                //добавляем колонки из формулы
                foreach ($formules as $field => $pas) {
                    $f = $pas->getColumnCaption();
                    $len = strlen($f);
                    for ($i = 0; $i < $len; $i++) {
                        if (ctype_alpha($f[$i])) {   //если буква
                            $aPosition = $this->getAlphabetPosition($f[$i]);
                            $paSettings[$aPosition] = $pas->getFieldNameFromProductEntity();
                            $paSettingsTypes[$aPosition] = $pas->getFieldType();
                        }
                    }
                }

                foreach ($rows as $r_index => $r) {
                    $haveNotNullNumeric = false;
                    $emptyRow = true;
                    $badRow = false;
                    $badCellQuantity = 0;
                    $goodCellQuantity = 0;
                    $temp = [];
                    $sku = null;
                    $mrc = null;
                    $orderOnlyPriceBuying = null;
                    foreach ($r as $cell_index => $cell) {
                        $badCell = false;
                        $cell = trim($cell);

                        //проверяем, чтоб не было пустых строк
                        if ($cell) {
                            $emptyRow = false;
                        }

                        if (isset($paSettings[$cell_index])) {
                            //проверяем и преобразовываем тип
                            switch ($paSettingsTypes[$cell_index]) {
                                case 'int':
                                    if (!is_numeric($cell) && $cell != null) {
                                        $badCell = true;
                                    } else {
                                        $cell = intval($cell);
                                        if ($cell) {
                                            $haveNotNullNumeric = true;
                                        }
                                    }
                                    break;
                                case 'float':
                                    break;
                                case 'string':
                                    if (!$cell) {
                                        $badCell = true;
                                    }
                                    break;
                            }

                            //проверяем чтобы небыло пустых строк
                            if (!$badCell) {
                                $goodCellQuantity++;
                                if ($paSettings[$cell_index] == 'sku') {
                                    $sku = $cell;
                                }
                                $temp[$cell_index] = $cell;
                            }

                            if ($paSettings[$cell_index] == 'orderOnlyPriceBuying') {
                                $orderOnlyPriceBuying = $cell;
                            } else {
                                if ($paSettings[$cell_index] == 'mrc') {
                                    $mrc = $cell;
                                }
                            }
                        }
                    }

                    //берем только не пустые строки
                    if (!$emptyRow) {

                        if ($goodCellQuantity < count($paSettings)
                            //если не установлен МРЦ или цена закупки, то пропускаем
                            || ($needMrc && !$mrc) || (!$needMrc && !$orderOnlyPriceBuying)
                        ) {
                            $badRow = true;
                        }


                        if (!$badRow) {
                            $skuGoodList[] = $sku;
                            //вычисления по формулам
                            foreach ($formules as $field => $pas) {
                                $f = $pas->getColumnCaption();
                                $parcedPriceData[$sku][$field] = $this->computeByFormula($f,
                                    $temp);
                            }

                            //сетапим простые колонки
                            foreach ($temp as $cell_index => $cell) {
                                if (!isset($parcedPriceData[$sku][$paSettings[$cell_index]])) {
                                    $parcedPriceData[$sku][$paSettings[$cell_index]]
                                        = $cell;
                                }
                            }
                        } //собираем испорченные записи
                        else {
                            //if ($goodCellQuantity >= 5 && $haveNotNullNumeric) {
                            if ($goodCellQuantity >= 5) {
                                //проверяем, чтобы хоть одно числовое значение было заполнено
                                $tmp2 = [];
                                foreach ($r as $cell_index2 => $r2) {
                                    if (isset($paSettings[$cell_index2])) {
                                        $tmp2[$cell_index2] = $r2;
                                    }
                                }
                                $badRecords[$r_index] = $tmp2;
                            }
                        }
                    }
                }

                $this->parcedPriceData[$this->priceAnalysis->getId()]['good'] = $parcedPriceData;
                $this->parcedPriceData[$this->priceAnalysis->getId()]['bad'] = $badRecords;
                $this->parcedPriceData[$this->priceAnalysis->getId()]['skuGoodList'] = $skuGoodList;
//                                echo 'Время выполнения скрипта: '.(microtime(true) - $start).' сек.';
            }
            if (isset($this->parcedPriceData[$this->priceAnalysis->getId()])) {

                return $this->parcedPriceData[$this->priceAnalysis->getId()];
            } else {
                return false;
            }
        } else {
            return $this->parcedPriceData[$this->priceAnalysis->getId()];
        }

    }

    /**
     * Расчет по формуле, например C+D
     * @param type $formula
     * @param type $row
     * @return type
     */
    public function computeByFormula($formula, $row)
    {
        $res = false;
        $value1 = 0;
        $operator = null;

        $length = strlen($formula);
        for ($i = 0; $i < $length; $i++) {
            $f = $formula[$i];
            if (ctype_alpha($f)) {   //если буква
                $fIndex = $this->getAlphabetPosition($f);

                //если ранее был задан оператор
                if ($operator) {
                    $res = eval('return ' . $res . $operator . $row[$fIndex] . ';');
                    $operator = null;
                } //если оператор не был задан ранее
                else {
                    $res = $row[$fIndex];
                }
            } else {  //если математический оператор
                $operator = $f;
            }
        }

        return $res;
    }

    /**
     * Выборка по продуктам, взависимости от производителя
     * @return mixed
     */
    public function getProducts()
    {
        $skuGoodList = $this->readPrice()['skuGoodList'];

        if (!isset($this->products)) {
            $this->products = $this->em->getRepository('CoreProductBundle:CommonProduct')
                ->findBySkuAndSort($skuGoodList);
        }
        return $this->products;
    }

    /**
     * Возвращает отсортированную по ID продукта историю цен
     * @return type
     */
    public function getPHistories()
    {
        if (!$this->pHistories) {
            $this->pHistories = [];
            $temp = $this->priceAnalysis->getPriceAnalysisHistory();
            foreach ($temp as $t) {
                $this->pHistories[$t->getProduct()->getId()] = $t;
            }
        }
        return $this->pHistories;
    }

    /**
     * Анализирует данные для определения какие продукты подорожали
     * @return array
     */
    public function analysisPriceHike()
    {
        $res = [];
        $data = $this->readPrice()['good'];
        if ($data) {
            $products = $this->getProducts();

            $pHistories = $this->getPHistories();

            foreach ($products as $p) {
                $extra = [];
                //нашли такой продукт в базе
                if (isset($data[$p->getSku()]) && $p->getOrderOnly() && !$p->getIsMrcEnabled()
                    && (!isset($data[$p->getSku()]['mrc']) || !$data[$p->getSku()]['mrc'])
                ) {

                    $priceData = $data[$p->getSku()];

                    //устанавливаем новую цену и делаем расчет
                    $p2 = clone $p;
                    $p2->setOOPBCurrency($this->priceAnalysis->getSupplier()->getPaCurrency());
                    $p2->setOrderOnlyPriceBuying($priceData['orderOnlyPriceBuying']);
                    $p2->updatePrice();
                    $extra['newPrice'] = $p2->getPrice();

                    //если валюта прайса отличается от валюты закупки продукта
                    if (!$this->priceAnalysis->getSupplier() || !$this->priceAnalysis->getSupplier()->getPaCurrency()
                        ||
                        !$p->getOOPBCurrency() ||
                        $this->priceAnalysis->getSupplier()->getPaCurrency()->getId() != $p->getOOPBCurrency()->getId()
                    ) {
                        $extra['difCurrency'] = true;
                    }

                    //рассчитываем на сколько произошло подорожание
                    //$extra['difference']          = $p2->getPrice() - $p->getPrice();
                    $extra['difference'] = $p2->getPrice() - $pHistories[$p->getId()]->getPrice();

                    $extra['differenceInPercent'] = number_format($extra['difference']
                        /// (($p->getPrice() / 100)), 2);
                        / (($pHistories[$p->getId()]->getPrice() / 100)), 2);

                    //смотрим что произошло с ценой
                    if ($extra['difference'] == 0) {
                        $flag = 'nothing';
                    } elseif ($extra['difference'] > 1) {
                        $flag = 'priceHike';
                    } else {
                        $flag = 'depreciation';
                    }

                    //Выключены в базе, но есть в прайсе
                    if (!$p->getIsVisible() || $p->getIsDiscontinued()) {
                        $extra['flag2'] = 'disabledInBaseandHasInPrice';
                    } else {
                        $extra['flag2'] = '';
                    }

                    $extra['flag'] = $flag;
                } else {
                    $priceData = [];
                }

                if (count($priceData)) {

                    $res[] = [
                        'product' => $p,
                        'extra' => $extra,
                        'priceData' => $priceData
                    ];
                }
            }
        }

        return $res;
    }

    /**
     * Вычисляет суммарную инфу
     * @param type $priceHike
     * @param type $outOfStock
     * @param type $analysisMRC
     * @return int
     */
    public function getSummaryInfo($priceHike, $outOfStock, $analysisMRC)
    {
        $res = [];
        //Всего в прайсе: Х товаров.
        $data = $this->readPrice();
        $res['totalQuantity'] = count($data['good']);

        $disabledInBaseandHasInPrice = 0;
        //Подорожало: Х товаров.
        //Подешевело: Х товаров.
        $podorojalo = 0;
        $podeshevelo = 0;
        $bezizmeneniya = 0;
        foreach ($priceHike as $d) {
            if ($d['extra']['difference'] > 1) {
                $podorojalo++;
            } elseif ($d['extra']['difference'] < 0) {
                $podeshevelo++;
            } elseif ($d['extra']['difference'] == 0) {
                $bezizmeneniya++;
            }

            if (isset($d['extra']['flag2']) && $d['extra']['flag2'] == 'disabledInBaseandHasInPrice') {
                $disabledInBaseandHasInPrice++;
            }
        }
        $res['podorojalo'] = $podorojalo;
        $res['podeshevelo'] = $podeshevelo;
        $res['bezizmeneniya'] = $bezizmeneniya;

        //Подорожало по МРЦ: Х товаров.
        //Подешевело по МРЦ: Х товаров.
        //Без изменения цены: Х товаров.
        $podorojalo = 0;
        $podeshevelo = 0;
        $bezizmeneniyaMrc = 0;
        $disabledInBaseandHasInPriceMrc = 0;
        foreach ($analysisMRC as $d) {
            if ($d['extra']['difference'] > 1) {
                $podorojalo++;
            } elseif ($d['extra']['difference'] < 0) {
                $podeshevelo++;
            } elseif ($d['extra']['difference'] == 0) {
                $bezizmeneniyaMrc++;
            }

            if (isset($d['extra']['flag2']) && $d['extra']['flag2'] == 'disabledInBaseandHasInPrice') {
                $disabledInBaseandHasInPriceMrc++;
            }
        }
        $res['podorojaloMrc'] = $podorojalo;
        $res['podesheveloMrc'] = $podeshevelo;
        $res['bezizmeneniyaMrc'] = $bezizmeneniyaMrc;

        //Нет в базе: Х товаров.
        //Нет у поставщика: Х товаров.
        $noInPrice = 0;
        $noInBase = 0;
        foreach ($outOfStock as $d) {
            if ($d['extra']['flag'] == 'noInPrice') {
                $noInPrice++;
            } else {
                if ($d['extra']['flag'] == 'noInBase') {
                    $noInBase++;
                }
            }
        }
        $res['noInPrice'] = $noInPrice;
        $res['noInBase'] = $noInBase;

        //Скрыто из доступных: Х товаров.
        $res['disabledInBaseandHasInPrice'] = $disabledInBaseandHasInPrice;
        $res['disabledInBaseandHasInPriceMrc'] = $disabledInBaseandHasInPriceMrc;

        //Испорченных записей
        $res['badRecordsQuantity'] = count($data['bad']);
        return $res;
    }

    /**
     * Анализирует данные для определения каких продуктов нет в базе
     * @return array
     * @throws \Exception
     */
    public function analysisOutOfStock()
    {
        $res = [];
        $data = $this->readPrice()['good'];
        if ($data) {
            $products = $this->getProducts();
            //если товара нет в прайсе
            foreach ($products as $p) {
                $extra = [];
                if (!isset($data[$p->getSku()]) && $p->getIsVisible()) {
                    $extra['flag'] = 'noInPrice';
                    $res[] = [
                        'product' => $p,
                        'extra' => $extra
                    ];
                }
            }

            //если товара нет в базе
            foreach ($data as $p_sku => $d) {
                $extra = [];
                if (!isset($products[$p_sku])) {
                    $extra['flag'] = 'noInBase';
                    $res[] = [
                        'extra' => $extra,
                        'priceData' => $d
                    ];
                }
            }
        }
        return $res;
    }

    function is_all_multibyte($string)
    {
        // check if the string doesn't contain invalid byte sequence
        if (mb_check_encoding($string, 'UTF-8') === false) return false;

        $length = mb_strlen($string, 'UTF-8');

        for ($i = 0; $i < $length; $i += 1) {

            $char = mb_substr($string, $i, 1, 'UTF-8');

            // check if the string doesn't contain single character
            if (mb_check_encoding($char, 'ASCII')) {

                return false;

            }

        }

        return true;

    }
    function mb_detect_encoding2 ($string, $enc=null, $ret=null) {

        static $enclist = array(
            'UTF-8', 'ASCII',
            'ISO-8859-1', 'ISO-8859-2', 'ISO-8859-3', 'ISO-8859-4', 'ISO-8859-5',
            'ISO-8859-6', 'ISO-8859-7', 'ISO-8859-8', 'ISO-8859-9', 'ISO-8859-10',
            'ISO-8859-13', 'ISO-8859-14', 'ISO-8859-15', 'ISO-8859-16',
            'Windows-1251', 'Windows-1252', 'Windows-1254',
        );

        $result = false;

        foreach ($enclist as $item) {
            $sample = iconv($item, $item, $string);
            if (md5($sample) == md5($string)) {
                if ($ret === NULL) { $result = $item; } else { $result = true; }
                break;
            }
        }

        return $result;
    }


    /**
     * Анализирует данные для вывода МРЦ
     * @return array
     * @throws \Exception
     */
    public function analysisMRC()
    {
        $res = [];
        $data = $this->readPrice()['good'];
        if ($data) {
            $products = $this->getProducts();
            $pHistories = $this->getPHistories();

            foreach ($products as $p) {
                $extra = [];

                //нашли такой продукт в базе
                if (isset($data[$p->getSku()]) && $p->getOrderOnly() && isset($data[$p->getSku()]['mrc'])) {
                    $priceData = $data[$p->getSku()];

                    //устанавливаем новую цену и делаем расчет
                    $p2 = clone $p;
                    $p2->setOOPBCurrency($this->priceAnalysis->getSupplier()->getPaCurrency());
                    $p2->setMrc($priceData['mrc']);
                    $p2->updatePrice();
                    $extra['newPrice'] = $p2->getPrice();

                    //изменение закупочной цены
                    $extra['orderOnlyPriceBuyingChange'] = $priceData['orderOnlyPriceBuying'] - $pHistories[$p->getId()]->getOrderOnlyPriceBuying();
                    $extra['orderOnlyPriceBuyingChangeInPercent'] = number_format($extra['orderOnlyPriceBuyingChange']
                        / (($pHistories[$p->getId()]->getOrderOnlyPriceBuying() / 100)), 2);

                    //смотрим что произошло с ценой
                    if ($extra['orderOnlyPriceBuyingChange'] == 0) {
                        $extra['orderOnlyPriceBuyingChangeFlag'] = 'nothing';
                    } elseif ($extra['orderOnlyPriceBuyingChange'] > 1) {
                        $extra['orderOnlyPriceBuyingChangeFlag'] = 'priceHike';
                    } else {
                        $extra['orderOnlyPriceBuyingChangeFlag'] = 'depreciation';
                    }

                    //если валюта прайса отличается от валюты закупки продукта
                    if (!$this->priceAnalysis->getSupplier() || !$this->priceAnalysis->getSupplier()->getPaCurrency()
                        ||
                        !$p->getOOPBCurrency() ||
                        $this->priceAnalysis->getSupplier()->getPaCurrency()->getId() != $p->getOOPBCurrency()->getId()
                    ) {
                        $extra['difCurrency'] = true;
                    }

                    //рассчитываем на сколько произошло подорожание
                    //$extra['difference'] = $p2->getPrice() - $p->getPrice();
                    $extra['difference'] = $p2->getPrice() - $pHistories[$p->getId()]->getPrice();

                    if ($extra['difference']) {
                        $extra['differenceInPercent'] = number_format($extra['difference']
                            // / (($p->getPrice() / 100)), 2);
                            / (($pHistories[$p->getId()]->getPrice() / 100)), 2);
                    } else {
                        $extra['differenceInPercent'] = 0;
                    }

                    //смотрим что произошло с ценой
                    if ($extra['difference'] == 0) {
                        $flag = 'nothing';
                    } elseif ($extra['difference'] > 1) {
                        $flag = 'priceHike';
                    } else {
                        $flag = 'depreciation';
                    }

                    //Выключены в базе, но есть в прайсе
                    if (!$p->getIsVisible() || $p->getIsDiscontinued()) {
                        $extra['flag2'] = 'disabledInBaseandHasInPrice';
                    } else {
                        $extra['flag2'] = '';
                    }

                    $extra['flag'] = $flag;

                } else {
                    $priceData = [];
                }

                if (count($priceData)) {
                    $res[] = [
                        'product' => $p,
                        'extra' => $extra,
                        'priceData' => $priceData
                    ];
                }
            }
        }
        return $res;
    }

    /**
     * Анализирует данные для вывоа оспорченных записей из прайса
     * @return array
     * @throws \Exception
     */
    public function analysisBadRecords()
    {
        $res = $this->readPrice();
        if (isset($res['bad'])) {
            return $res['bad'];
        } else {
            return $res;
        }

    }

    /**
     * Обновляет количество остатка товара под заказ
     * @return array
     * @throws \Exception
     */
//    public function updateQuantity()
//    {
//        $datetime = new \DateTime();
//        $data     = $this->readPrice()['good'];
//        if ($data) {
//            $ind=0;
//            $products = $this->getProducts();
//            foreach ($products as $p) {
//                $ind++;
//                //нашли такой продукт в базе
//                if (isset($data[$p->getSku()])) {
//                    $p
//                        ->setSupplier($this->priceAnalysis->getSupplier())
//                        ->setOOPBQuantity($data[$p->getSku()]['OOPBQuantity'])
//                        ->setOOPBQuantityUpdated($datetime);
//                    $this->em->persist($p);
//                }
//                $this->em->flush();
//            }
//        }
//        return count($products);
//    }


    /**
     * Анализирует данные для определения какие продукты
     * отключить от публикации, которых нет в текущем прайсе.
     * @return array
     * @throws \Exception
     */
//    public function analysisDisable()
//    {
//        $res = [];
//        $data = $this->readPrice();
//        if ($data) {
//            $products = $this->getProducts();
//            foreach ($products as $p) {
//                //нашли такой продукт в базе
//                if (!isset($data[$p->getSku()])) {
//                    $res[] = [
//                        'product' => $p
//                    ];
//                }
//            }
//
//        }
//        return $res;
//    }

    /**
     * Обновляет закупочные цены в продуктах
     * @param $data
     * @return boolean
     */
    public function setBasePriceForProductsFromPrice($data)
    {
        $ids = [];
        $prices = [];
        foreach ($data as $d) {
            $ids[] = $d['id'];
            $prices[$d['id']] = $d['price'];
        }
        $products = $this->em->getRepository('CoreProductBundle:CommonProduct')->findById($ids);
        foreach ($products as $p) {
            $this->em->clear();
            $p = $this->em->merge($p);
            $p->setOrderOnlyPriceBuying($prices[$p->getId()]);
            $this->em->flush();
        }

        return true;
    }

    /**
     * Обновляет МРЦ
     * @param $data
     * @return boolean
     */
    public function setMrcPriceForProductsFromPrice($data)
    {
        $ids = [];
        $prices = [];
        foreach ($data as $d) {
            $ids[] = $d['id'];
            $prices[$d['id']] = $d['price'];
        }

        $products = $this->em->getRepository('CoreProductBundle:CommonProduct')->findById($ids);
        foreach ($products as $p) {
            $this->em->clear();
            $p = $this->em->merge($p);
            $p->setMrc($prices[$p->getId()]);
            $p->setIsMrcEnabled(true);
            $this->em->flush();
        }
        return true;
    }

    /**
     * Выключает продукты из публикации
     * @param $data
     * @return boolean
     */
    public function disableProduct($data)
    {
        $ids = [];
        foreach ($data as $d) {
            $ids[] = $d['id'];
        }
        $products = $this->em->getRepository('CoreProductBundle:CommonProduct')->findById($ids);
        foreach ($products as $p) {
            $this->em->clear();
            $p = $this->em->merge($p);
            $p->setIsEnabled(false);
            $p->setIsVisible(false);
            $this->em->flush();
        }

        return true;
    }

    /**
     * Включает продукты на публикацию, также снимает флаг, что товар снят с производства
     * @param $data
     * @return boolean
     */
    public function enableProduct($data)
    {
        $ids = [];
        foreach ($data as $d) {
            $ids[] = $d['id'];
        }
        $products = $this->em->getRepository('CoreProductBundle:CommonProduct')->findById($ids);
        foreach ($products as $p) {
            $this->em->clear();
            $p = $this->em->merge($p);
            $p->setIsEnabled(true);
            $p->setIsVisible(true);
            $p->setIsDiscontinued(false);
            $this->em->flush();
        }

        return true;
    }
}