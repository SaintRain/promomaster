<?php
/**
 * Бизнесс логика для заказов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Logic;

use Doctrine\Common\Collections\ArrayCollection;
use \Symfony\Component\HttpFoundation\Request;
use Core\LogisticsBundle\Entity\Transit;
use Core\OrderBundle\Entity\ProductBooking;
use Core\OrderBundle\Entity\Order;
use Core\ProductBundle\Entity\Product;
use Core\ProductBundle\Entity\CompositeProduct;
use Core\LogisticsBundle\Entity\UnitSerials;
use Core\LogisticsBundle\Entity\UnitInStock;
use Core\OrderBundle\Entity\Composition;
use Core\PaymentBundle\Entity\Payment;
use Doctrine\ORM\UnitOfWork;
use Application\Sonata\UserBundle\Entity\LegalContragent;
use Core\OrderBundle\Logic\OrderDocumentsLogic;
use Core\OrderBundle\Logic\OrderStepsToCreateLogic;
use Core\DeliveryBundle\Entity\Company;
use Core\LogisticsBundle\Entity\Supply;
use Core\LogisticsBundle\Entity\ProductInSupply;

class OrderLogic extends OrderDocumentsLogic
{
    public $em;
    protected $logisticks_logic;
    protected $discounts_logic;
    protected $templating;
    protected $session;
    protected $container;
    protected $mailer;
    protected $securityContext;
    protected $params;
    protected $needUpdateSupplyForOrder = false;
    protected $router;

    public function __construct(
    $em, $logisticks_logic, $discounts_logic, $tfox_mpdfport, $templating, $session, $container, $mailer, $securityContext, $params, $validator, $router
    )
    {
        $this->em               = $em;
        $this->logisticks_logic = $logisticks_logic;
        $this->discounts_logic  = $discounts_logic;
        $this->tfox_mpdfport    = $tfox_mpdfport;
        $this->templating       = $templating;
        $this->session          = $session;
        $this->container        = $container;
        $this->mailer           = $mailer;
        $this->securityContext  = $securityContext;
        $this->params           = $params;
        $this->validator        = $validator;
        $this->router           = $router;
    }

    /**
     * Get a web file (HTML, XHTML, XML, image, etc.) from a URL.  Return an
     * array containing the HTTP server response header fields and content.
     */
    function getWebPageFromAdmin($url, $postdata)
    {
        $options = array(
            CURLOPT_COOKIESESSION => true,

            CURLOPT_COOKIE => session_name() . '=' . session_id() . '; path=/',
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            // Disabled SSL Cert checks
            CURLOPT_RETURNTRANSFER => true,
            // return web page
            CURLOPT_HEADER => false,
            // don't return headers
            CURLOPT_FOLLOWLOCATION => true,
            // follow redirects
            CURLOPT_ENCODING => '',
            // handle all encodings
            CURLOPT_USERAGENT => 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/38.0.2125.111 Safari/537.36',
            // who am i
            CURLOPT_AUTOREFERER => true,
            // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 5,
            // timeout on connect
            CURLOPT_TIMEOUT => 5,
            // timeout on response
            CURLOPT_MAXREDIRS => 5,
            // stop after 10 redirects
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query($postdata)
        );
        session_write_close();

        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        $err     = curl_errno($ch);
        $errmsg  = curl_error($ch);
        $header  = curl_getinfo($ch);
        curl_close($ch);

        $header['errno']   = $err;
        $header['errmsg']  = $errmsg;
        $header['content'] = $content;
        return $header;
    }

    /**
     * Округляет число до заданного значения
     * @param type $number
     * @param type $decimals
     * @return type
     */
    public function numberFormat($number, $decimals = 2)
    {
        return number_format($number, $decimals, '.', '');
    }

    /**
     * Сохраняет серийники в заказе
     * @param type $data
     * @return type
     */
    public function updateSerials($data)
    {
        $res              = [];
        $compositions_ids = [];
        foreach ($data as $comp_id => $d) {
            $compositions_ids[] = $comp_id;
        }

        //делаем проверку на уникальность серийников
        $checkIds = [];
        $checkMac = [];
        foreach ($data as $comp) {
            foreach ($comp as $number => $stock) {
                foreach ($stock as $stock_id => $unit) {
                    foreach ($unit as $unit_id => $serials) {
                        foreach ($serials as $serial_id => $serial) {
                            if ($serial_id == 'new') {
                                $checkMac = array_merge($checkMac, $serial);
                            } else {
                                $checkMac[] = $serial;
                                $checkIds[] = $serial_id;
                            }
                        }
                    }
                }
            }
        }

        if (count($checkMac) && !count($checkIds)) {
            $checkIds[] = 0;
        }

        $twins        = $this->em->getRepository('CoreLogisticsBundle:UnitSerials')->checkSerials($checkIds, $checkMac);
        $compositions = $this->em->getRepository('CoreOrderBundle:Composition')->findById($compositions_ids);
        if (!count($twins)) {
            $this->em->getConnection()->beginTransaction(); // suspend auto-commit
            try {
                $order_id = false;
                foreach ($compositions as $composition) {
                    $e = $this->updateCompositionSerials($composition, $data[$composition->getId()]);
                    if (!$e) {
                        $res['errors']['NotEnoughRealProducts'] = true;
                        break;
                    }
                    if (!$order_id) {
                        $order_id = $composition->getOrder()->getId();
                    }
                }

                if (!isset($res['errors'])) {
                    $this->em->flush();

                    //определяем есть ли у заказа товарные единицы с серийниками
                    if ($order_id) {
                        $unitsInfo = $this->em->getRepository('CoreLogisticsBundle:UnitInStock')->getUnitsCountForOrder($order_id);
                        $order     = $this->em->getRepository('CoreOrderBundle:Order')->find($order_id);
                        if ($unitsInfo['units_count']) {
                            $isHaveSerials = true;
                        } else {
                            $isHaveSerials = false;
                        }

                        //если заполняются серийники,то ставим начальное время заполнения серийников
                        if ($isHaveSerials && $order && (!$order->getSerialsAddStartDateTime() || $order->getSerialsAddStartDateTime()->format('Y') == '-0001')
                        ) {
                            $order->setSerialsAddStartDateTime(new \DateTime());
                            $this->em->flush($order);
                        } //если все серийники удалили, тогда сбрасываем начальное время заполнения серийников
                        else {
                            if (!$isHaveSerials && $order && $order->getSerialsAddStartDateTime()) {
                                $order->setSerialsAddStartDateTime(null);
                                $this->em->flush($order);
                            }
                        }
                    }

                    $this->em->getConnection()->commit();
                }
            } catch (Exception $e) {
                $this->em->getConnection()->rollback();
                $this->em->close();
                throw $e;
            }
        } else {
            foreach ($twins as $t) {
                $res['errors']['twins'][] = $t->getValue();
            }
        }

        //обновляем композицию
        $newUnitsSerials = [];
        foreach ($compositions as $composition) {
            $this->em->refresh($composition);
//            $newUnitsSerials = [];
            foreach ($composition->getUnits() as $unit_index => $unit) {
                $newSerials   = [];
                $serial_index = 0;
                foreach ($unit->getSerials() as $serial) {
                    if ($unit->getStock()) {
                        $s_id = $unit->getStock()->getId();
                    } else {
                        $s_id = 0;
                    }
                    $newSerials[$serial_index] = [
                        'unit_id' => $unit->getId(),
                        'stock_id' => $s_id,
                        'id' => $serial->getId(),
                        'value' => htmlspecialchars($serial->getValue(), ENT_QUOTES)
                    ];
                    $serial_index++;
                }
                $newUnitsSerials[$unit_index] = $newSerials;
            }
        }

        $res['ok']['newUnitsSerials'] = $newUnitsSerials;
        return $res;
    }

    /**
     * Обновление серийных номеров в заказе
     * @param type $order
     * @param type $data
     */
    public function updateCompositionSerials($composition, $data)
    {
        $order = $composition->getOrder();

        //серийники можно редактировать только, проверено и не отмененно
        if ($order->getIsCheckedStatus() && !$order->getIsCanceledStatus()) {
            //сортируем единицы
            $serials_by_id = [];
            foreach ($composition->getUnits() as $unit) {
                foreach ($unit->getSerials() as $serial) {
                    $serials_by_id[$serial->getId()] = $serial;
                }
            }
            $unitObject_ids = [0];

            foreach ($data as $number => $stock) {
                foreach ($stock as $stock_id => $unit) {
                    foreach ($unit as $unit_id => $serials) {
                        foreach ($serials as $serial_id => $serial) {
                            //добавляем серийники
                            if ($serial_id == 'new') {
                                //создаём серию серийников, которые следует добавить
                                $newSerials = new ArrayCollection;
                                foreach ($serial as $serial_value) {
                                    if ($serial_value) {
                                        $s = new UnitSerials();
                                        $s->setValue($serial_value);
                                        $newSerials->add($s);
                                    }
                                }

                                if ($newSerials->count()) {
                                    //ищем одну свободную товарную позицию на заданном складе
                                    if ($unit_id == 'new') {
                                        $unitObject = $this->em->getRepository('CoreLogisticsBundle:UnitInStock')
                                            ->findFreeUnit($composition->getProduct()->getId(), $stock_id, $unitObject_ids);
                                        if ($unitObject) {
                                            $unitObject       = $unitObject[0]; //берём только первый элемент
                                            $unitObject_ids[] = $unitObject->getId(); //чтобы в слежующий раз не выбрали эти же единицы запоминаем их
                                        }
                                    } else {
                                        $unitObject = $this->em->getRepository('CoreLogisticsBundle:UnitInStock')->find($unit_id);
                                    }

                                    if ($unitObject) {
                                        $unitObject->setComposition($composition);
                                        foreach ($newSerials as $newSerial) {
                                            $unitObject->addSerial($newSerial);
                                        }
                                        $this->em->persist($unitObject);
                                    } else {
                                        //нет реальных товарных позиций на складе
                                        return false;
                                    }
                                }
                            } else {
                                if (isset($serials_by_id[$serial_id])) {
                                    //обновляем значение
                                    if ($serial) {
                                        $this->em->flush($serials_by_id[$serial_id]->setValue('temp_value_'.md5(uniqid($serial, 1))));
                                        $serials_by_id[$serial_id]->setValue($serial);
                                    } //удаляем серийник
                                    else {
                                        $serials_by_id[$serial_id]->getUnit()->removeSerial($serials_by_id[$serial_id]); //удаляем из коллекции, иначе persist отработает и запись опять добавиться
                                        $this->em->remove($serials_by_id[$serial_id]);
                                        if (!$serials_by_id[$serial_id]->getUnit()->getSerials()->count()) {
                                            $serials_by_id[$serial_id]->getUnit()->setIsCouldBeSold(true); //можно продавать
                                            $serials_by_id[$serial_id]->getUnit()->setComposition(null); //если не осталось серийников, тогда открепляем
                                            $serials_by_id[$serial_id]->getUnit()->setSerials(null);
                                            $this->em->persist($serials_by_id[$serial_id]->getUnit());
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return true;
    }

    /**
     * Вычисляет объем и вес заказа
     * @param type $order
     * @return type
     */
    public function computeOrderWeightAndVolume($order)
    {
        $res = ['weight' => 0, 'volume' => 0];
        foreach ($order->getCompositions() as $c) {
            $p = $c->getProduct();
            //учитываем только физические товары
            if ($p instanceof Product || $p instanceof CompositeProduct) {
                $res['weight'] += $c->getQuantity() * (($p->getIsGrossWeightInGm()) ? $p->getGrossWeight() : $p->getGrossWeight() * 1000);
                $res['volume'] += $c->getQuantity() * ($p->getLengthOfBox() * $p->getWidthOfBox() * $p->getHeightOfBox());
            }
        }

        $res['weight'] = $this->numberFormat($res['weight'] / 1000, 2); //переводим в кг
        $res['volume'] = $this->numberFormat($res['volume'] / 1000000000, 4); //переводим в куб. метры

        return $res;
    }

    /**
     * Для состава заказа вычисляет и проставляет стоимость
     * @param type $order
     */
    public function setCompositionsCost($order)
    {
        $costInfo = $this->computeOrderCostInfo($order);

        //старое значение всегда переписывает значение новых скидок
        if (isset($costInfo['history_info']['composition'])) {
            $compositions = $costInfo['history_info']['composition'];
            $total_cost   = $costInfo['history_info']['total_cost'];
        } else {
            $compositions = $costInfo['composition'];
            $total_cost   = $costInfo['total_cost'];
        }
        //сохраняем полную стоимость заказа
        $order->setCost($total_cost);

        foreach ($order->getCompositions() as $c) {
            foreach ($compositions as $c2_key_id => $c2) {
                if ($c->getProduct()) {
                    if ($c->getProduct()->getId() == $c2_key_id) {

                        $c->setCost($c2['cost'])
                            ->setNdsSum($c2['ndsSum']);
                        if (isset($c2['discountValue'])) {
                            $c->setDiscountValue($c2['discountValue']);
                        }
                        if (isset($c2['isDiscountValueInPercent'])) {
                            $c->setIsDiscountValueInPercent($c2['isDiscountValueInPercent']);
                        }
                    }
                }
            }
        }

        return $costInfo;
    }

    /**
     * Возвращает стоимость заказа для расчета баланса контрагента
     * @param type $order
     * @return type
     */
    public function getOrderCostForContragentBalanceCompute($order)
    {
        //если заказ был отгружен  и сейчас переоформляется, то возвращаем стоимость заказа из истории
        if (!$order->getIsCanceledStatus() && $order->getShippedDateTime() && !$order->getIsShippedStatus()) {
            $temp = json_decode($order->getShippedOrderInfoHistory(), true);
            if (isset($temp['cost'])) {
                $cost = $temp['cost'];
            } else {
                $cost = 0;
            }
        } else {
            $cost = $order->getCost();
        }
        return $cost;
    }

    /**
     * Cчитаем динамическую сумму заказа для расчета скидки
     * @param int $stepDays
     */
    function getOrderDynamicCost($order)
    {
        $dynamicCost = 0;
        foreach ($order->getCompositions() as $c) {
            if ($c) {
                $dynamicCost += $c->getPrice() * $c->getQuantity(); //считаем по цене, которую запомнили
            }
        }

        //добавляем доставку
        if ($order->getIsDeliveryIncludedInPayment()) {
            $dynamicCost += $this->discounts_logic->computeOrderDeliveryCost($order);
        }

        //добавляем НДС
        if ($order->getNdsTax()) {
            $dynamicCost += ($dynamicCost / 100) * $order->getNdsTax();
        }
        return $dynamicCost;
    }

    /**
     * Выделяет из конечной суммы сумму НДС
     * @param type $sumWithPercent
     * @param type $percent
     * @return type
     */
    public function getNdsPercentSum($sum, $percent)
    {
        $p   = (100 + $percent) / 100;
        $res = $sum * (1 - 1 / $p);
        return $res;
    }

    /**
     * Вычисляет сумму без процента НДС
     * @param type $sumWithPercent
     * @param type $percent
     * @return type
     */
    public function getWithoutNdsPercentSum($sum, $percent)
    {
        $res = $sum / (1 + $percent / 100);
        return $res;
    }

    /**
     * Получает исходную стоимость без скидки
     * @param type $sum
     * @param type $percent
     * @return type
     */
    public function getWithoutDiscountPercentSum($sum, $percent)
    {
        $res = ($sum / (100 - $percent)) * 100;
        return $res;
    }

    /**
     * Вычисляет стоимость заказа с подробной информацией
     * @param type $order
     * @param type $options
     */
    public function computeOrderCostInfo($order, $options = null)
    {
        //собираем массив состава по ID продукта
        $compositions_by_product_id = [];
        foreach ($order->getCompositions() as $c) {
            if ($c->getProduct()) {
                $compositions_by_product_id[$c->getProduct()->getId()] = $c;
            }
        }

        //динамически рассчитываем стоимость для каждого продукта
        if (!$order->getIsCanceledStatus() && (($order->getShippedDateTime() && !$order->getIsShippedStatus()) || !$order->getIsPaidStatus() || !$order->getId())
        ) {
            $discounts_compositions = $this->discounts_logic->computeOrderCompositionsDiscount($order);
            //прибавляем НДС
            if ($order->getNdsTax()) {
                foreach ($discounts_compositions as $p_id => $dc) {
                    $discounts_compositions[$p_id]['cost'] += ($dc['cost'] / 100) * $order->getNdsTax();
                }
            }
        } //иначе берём ранее сохранённые скидки на момент оплаты
        else {
            $discounts_compositions = [];
            foreach ($order->getCompositions() as $c) {
                $p_id                                                      = $c->getProduct()->getId();
                $discounts_compositions[$p_id]['cost']                     = $c->getCost(); //здесь стоимость со скидкой, количеством и с НДС
                $discounts_compositions[$p_id]['discountValue']            = $c->getDiscountValue();
                $discounts_compositions[$p_id]['isDiscountValueInPercent'] = $c->getIsDiscountValueInPercent();
            }
        }

        //вычисляем дополнительные данные
        foreach ($discounts_compositions as $p_id => $dc) {
            //выделяем сумму НДС
            if ($order->getNdsTax()) {
                $ndsInMoney = $this->getNdsPercentSum($dc['cost'], $order->getNdsTax());
            } else {
                $ndsInMoney = 0;
            }

            //вычисляем сумму скидки по позициям
            if ($discounts_compositions[$p_id]['isDiscountValueInPercent']) {
                $costWithoutNds       = $dc['cost'] - $ndsInMoney;
                $discountValueInMoney = $this->getWithoutDiscountPercentSum($costWithoutNds, $dc['discountValue']) - $costWithoutNds;
            } else {
                $discountValueInMoney = $dc['discountValue'] * $compositions_by_product_id[$p_id]->getQuantity();
            }

            $discounts_compositions[$p_id]['ndsSum']               = $this->numberFormat($ndsInMoney, 2);
            $discounts_compositions[$p_id]['discountValueInMoney'] = $this->numberFormat($discountValueInMoney, 2); //сумма скидки по позициям
            //проверяем, чтобы не было ошибки деления на ноль

            $discounts_compositions[$p_id]['cost_per_one_unit'] = $dc['cost'] ? $this->numberFormat($dc['cost'] / $compositions_by_product_id[$p_id]->getQuantity(), 2) : 0; //стоимость одной позиции c учетом скидки и НДС

            $discounts_compositions[$p_id]['cost_without_ndsTax']              = $dc['cost'] ? $this->numberFormat($dc['cost'] - $ndsInMoney, 2) : 0; //стоимость состава товарной позиции без НДС
            $discounts_compositions[$p_id]['cost_per_one_unit_without_ndsTax'] = $dc['cost'] ? $this->numberFormat(($dc['cost'] - $ndsInMoney) / $compositions_by_product_id[$p_id]->getQuantity(), 2) : 0; //стоимость одной позиции без НДС
        }

        //берём данные из истории состава заказа, если он был отгружен ранее
        if (!$order->getIsCanceledStatus() && $order->getShippedDateTime() && !$order->getIsShippedStatus() && $order->getShippedOrderInfoHistory() && isset($options['dontComputeForShipped'])
        ) {
            $shippedOrderInfoHistory = json_decode($order->getShippedOrderInfoHistory(), true);
            if (isset($shippedOrderInfoHistory['compositions'])) {
                $comp_h = $shippedOrderInfoHistory['compositions'];
            } else {
                $comp_h = [];
            }
        } else {
            $comp_h                  = [];
            $shippedOrderInfoHistory = [];
        }

        //если заказ был отгружен ранее, то считаем  переоформленные значения
        if ($order->getShippedDateTime() && !$order->getIsShippedStatus() && !isset($options['dontComputeForShipped'])) {
            $order2  = clone $order;
            //в составе заказа оставляем только то, что забронировано
            $newComp = new ArrayCollection();
            foreach ($order2->getCompositions() as $c) {
                $quantity = 0;
                foreach ($c->getBooking() as $b) {
                    $quantity += $b->getQuantity();
                }
                if ($quantity) {
                    $comp = clone $c;
                    $comp->setQuantity($quantity)
                        ->setOrder($order2);
                    $newComp->add($comp);
                }
            }
            //если есть забронированные позиции
            if ($newComp->count()) {
                $order2->setCompositions($newComp);
                $res                              = $this->computeOrderCostInfo($order2, ['dontComputeForShipped' => true, 'orderFirst' => $order]);
                $res['renewal_info_is_different'] = true;
            }
        }

        $delivery_cost = $this->discounts_logic->computeOrderDeliveryCost($order);

        //считаем общую скидку
        $total_quantity          = 0;
        $composition_total_price = 0;
        foreach ($order->getCompositions() as $c) {
            //смотрим сколько было раньше количество во время отгрузки
            if ($c->getProduct() && isset($comp_h[$c->getProduct()->getId()])) {
                foreach ($options['orderFirst']->getCompositions() as $comp) {
                    if ($comp->getProduct()->getId() == $c->getProduct()->getId()) {
                        break;
                    }
                }
                $comp_h_quantity = $comp_h[$c->getProduct()->getId()]['quantity'] - ($comp->getQuantity() - $c->getQuantity());
            } else {
                $comp_h_quantity = 0;
            }
            $composition_total_price += $c->getPrice() * ($c->getQuantity() - $comp_h_quantity);
            $total_quantity += $c->getQuantity();
        }

        //добавляем НДС
        if ($order->getNdsTax()) {
            $composition_total_price += ($composition_total_price / 100) * $order->getNdsTax();
        }


        //считаем общую сумму со скидкой
        $composition_total_cost = 0;
        foreach ($discounts_compositions as $p_id => $c) {
            if (isset($comp_h[$p_id]['quantity'])) {

                foreach ($options['orderFirst']->getCompositions() as $comp) {
                    if ($comp->getProduct()->getId() == $p_id) {
                        break;
                    }
                }

                foreach ($order->getCompositions() as $c2) {
                    if ($c2->getProduct()->getId() == $p_id) {
                        break;
                    }
                }
                $comp_h_cost = ($c['cost'] / $c2->getQuantity() * ($comp_h[$p_id]['quantity'] - ($comp->getQuantity() - $c2->getQuantity()))); //количество переводим в сумму
            } else {
                $comp_h_cost = 0;
            }

            $composition_total_cost += $c['cost'] - $comp_h_cost;
        }

        //полная стоимость, которую юзер платит нам
        if ($order->getIsDeliveryIncludedInPayment()) {
            $total_cost = $composition_total_cost + $delivery_cost; //если доставка оплачивается вместе с заказом
        } else {
            $total_cost = $composition_total_cost;
        }

        //сколько юзеру всего нужно заплатить
        $total_cost_all = $composition_total_cost + $delivery_cost;

        //расчитываем полную сумму налога по НДС
        if ($order->getNdsTax()) {
            $nds_tax = ($total_cost / 100) * $order->getNdsTax();
        } else {
            $nds_tax = 0;
        }

        //Вычисляем стоимость без НДС
        $total_cost_no_nds_tax = $this->getWithoutNdsPercentSum($total_cost, $order->getNdsTax());


        //вся скидка в процентах
        if ($composition_total_price - $composition_total_cost > 0 && $composition_total_price > 0
        ) {
            $total_discount = $this->numberFormat(($composition_total_price - $composition_total_cost) / ($composition_total_price / 100), 4);
        } else {
            $total_discount = 0;
        }

        //сумма скидки в дефолтной валюте
        $total_discount_summ = $composition_total_price - $composition_total_cost;


        //берём информацию о весе и объеме
        //формируем полную информацию о заказе с учетом всех историй
        $history_info = [
            'composition' => $discounts_compositions,
//            'composition_h' => $comp_h,
            'shipped_order_info_history' => $shippedOrderInfoHistory,
            //данные об отгруженных ранее позициях
            'total_cost' => $total_cost,
            //Общая стоимость с НДС, сколько юзер заплатит нам (например, доставку он может платить не нам)
            'total_cost_all' => $total_cost_all,
            //Общая стоимость с НДС, сколько всего юзер заплатит
            'total_cost_no_nds_tax' => $total_cost_no_nds_tax,
            //Общая стоимость без НДС
            'nds_tax' => $nds_tax,
            //сумма налога НДС
            'composition_total_cost' => $composition_total_cost,
            //Стоимость состава со скидкой, без доставки
            'composition_total_price' => $composition_total_price,
            //Стоимость без скидки, без доставки
            'delivery_cost' => $delivery_cost,
            //Стоимость доставки
            'total_quantity' => $total_quantity,
            //общее количество позиций
            'total_discount' => $total_discount,
            //Общая скидка в %
            'total_discount_summ' => $total_discount_summ,
            //Общая скидка
            'weightVolumeInfo' => $this->computeOrderWeightAndVolume($order)
            //берём информацию о весе и размере
        ];

        if (isset($res)) {
            $res['history_info'] = $history_info;
        } else {
            $res = $history_info;
        }

        return $res;
    }

    /**
     * Добавляет товары в транзит
     * @param type $data
     */
    public function addProductToTransit($data)
    {
        //ищем подходящий транзит
        $transit = $this->em->getRepository('CoreLogisticsBundle:Transit')->findLastTransit($data);

        $toStock = $this->em->getRepository('CoreLogisticsBundle:Stock')
            ->find($data['toStock']);

        $fromStock = $this->em->getRepository('CoreLogisticsBundle:Stock')
            ->find($data['fromStock']);

        $book = $this->em->getRepository('CoreOrderBundle:ProductBooking')
            ->find($data['book']);

        //проверяем, есть ли необходимое количество реального товара
        if ($this->checkTransitRealProduct($book)) {

            //если нужно, создаём транзит
            if (!$transit) {
                $transit = new Transit();
                $transit->setFromStock($fromStock)
                    ->setToStock($toStock);
            }

            $book->setTransit($transit);

            $this->em->persist($book);
            $this->em->persist($transit);
            $this->em->flush();
            $res['ok'] = true;
        } else {
            //выводим ошибку
            $res['errors'][] = 'NotEnoughRealProducts';
        }
        return $res;
    }

    /**
     * Проверяет можно ли отправить в транзит товарные позиции. В транзит
     * отправляются только реальные позиции
     * @param type $book
     * @return boolean
     */
    function checkTransitRealProduct($book)
    {
        $booking = $this->em->getRepository('CoreOrderBundle:Composition')->getBookingQuantityByProduct($book->getComposition()->getProduct());
        $virtual = $this->em->getRepository('CoreLogisticsBundle:UnitInStock')->getQuantityVirtual($book->getComposition()->getProduct());

        $realOstatok = $book->getComposition()->getProduct()->getAvailabilityQuantity() + $booking['quantity'] - $virtual['quantity'];
        if ($book->getComposition()->getQuantity() <= $realOstatok) {
            $res = true;
        } else {
            $res = false;
        }
        return $res;
    }

    /**
     * создаём реальную или виртуальную поставку для товара под заказ
     * @param $needNewSupply
     * @throws \Exception
     */
    public function createNewSupply($needNewSupply, $order = null, $isVirtual)
    {
        $res = [];
        if (count($needNewSupply)) {
            //пересобираем из ID объекты
            foreach ($needNewSupply as $key => $d) {
                foreach ($d as $key2 => $d2) {
                    foreach ($d2 as $key3 => $info) {
                        if (!($info['composition'] instanceof Composition)) {
                            $needNewSupply[$key][$key2][$key3]['composition'] = $this->em->getRepository('CoreOrderBundle:Composition')->find($info['composition']);
                        }
                    }
                }
            }

            if (!($order instanceof Order)) {
                $order = $this->em->getRepository('CoreOrderBundle:Order')->find($order);
            }

            //берем дефолтные данные
            $status   = $this->em->getRepository('CoreLogisticsBundle:SupplyStatus')->findOneBy(['name' => Supply::suppliedStatusName]);
            $currency = $this->em->getRepository('CoreDirectoryBundle:Currency')->findOneBy(['currency' => $this->params['default_currency']]);
            $seller   = $this->em->getRepository('CoreLogisticsBundle:Seller')->findOneBy(['isDefault' => 1]);

            foreach ($needNewSupply as $stock_id => $sList) {
                foreach ($sList as $default_supplier_id => $nnsList) {
                    $stock = $this->em->getReference('CoreLogisticsBundle:Stock', $stock_id);
                    if ($default_supplier_id) {
                        $defaultSupplier = $this->em->getReference('CoreLogisticsBundle:Supplier', $default_supplier_id);
                    }

                    $newSupply = new Supply();
                    $newSupply
                        ->setIsCreatedForOrderOnly(true)
                        ->setSeller($seller)
                        ->setStock($stock)
                        ->setStatus($status)
                        ->setIsVirtual($isVirtual)
                        ->setNote('Создано автоматически для заказа');

                    if ($order->getId()) {
                        $orderReference = $this->em->getReference('CoreOrderBundle:Order', $order->getId());

                        $newSupply->setOrder($orderReference)
                            ->setNote('Создано автоматически для заказа #'.$order->getId());
                    }

                    //для виртуальных поставок необязателен поставщик
                    if (isset($defaultSupplier) && $defaultSupplier) {
                        $newSupply->setSupplier($defaultSupplier);
                    }

                    foreach ($nnsList as $nns) {
                        //вычисляем стоимость, чтобы получить себестоимость в базовой валюте
                        $info=$nns['composition']->getProduct()->updatePrice();

                        $newProductInSupply = new ProductInSupply();
                        $newProductInSupply->setQuantity($nns['quantity'])
                            ->setProduct($nns['composition']->getProduct())
                            ->setGtdCurrency($nns['composition']->getProduct()->getOOPBCurrency())
                            ->setPriceInGeneralCurrency($info['orderOnlyPriceBuying'])
                            ->setPriceInGtdCurrency($nns['composition']->getProduct()->getOrderOnlyPriceBuying())
                            ->setOOPBCurrencyRateAdditive($nns['composition']->getProduct()->getOOPBCurrencyRateAdditive())
                            ->setIsOOPBCurrencyRateAdditiveInPercent($nns['composition']->getProduct()->getIsOOPBCurrencyRateAdditiveInPercent());

                        $newSupply->addProduct($newProductInSupply);

                        $validErrors = $this->validator->validate($newProductInSupply);
                        if (count($validErrors)) {
                            throw new \Exception($validErrors);
                        }
                        //$this->em->persist($newProductInSupply);
                    }

                    $validErrors = $this->validator->validate($newSupply);
                    if (count($validErrors)) {
                        throw new \Exception($validErrors);
                    }
                    $this->em->persist($newSupply);
                    $this->em->flush();

                    $res[] = $newSupply;
                }
            }
        }

        //добавляем информационное сообщение
        if ($isVirtual) {
            $this->session->getFlashBag()->add(
                'sonata_flash_success',
                'Виртуальная поставка была создана автоматически!'
            );
        }
        else {
            $this->session->getFlashBag()->add(
                'sonata_flash_success',
                'Реальная поставка была создана автоматически!'
            );
        }

//        $this->addFlash('sonata_flash_success', $this->admin->trans
//        ('flash_edit_success', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle'));
        return $res;
    }

    /**
     * Для созданной виртуальной поставки проставляет заказ после создания
     */
    public function updateSupplyForOrder()
    {
        if ($this->needUpdateSupplyForOrder && $this->needUpdateSupplyForOrder['order']->getId()) {
            $order = $this->needUpdateSupplyForOrder['order'];
            foreach ($this->needUpdateSupplyForOrder['supplies'] as $supply) {
                // $supply=$this->em->getRepository('CoreLogisticsBundle:Supply')->find($supply->getId());
                $supply->setOrder($order)
                    ->setNote('Создано автоматически для заказ #'.$order->getId());
                $this->em->persist($supply);
            }
            $this->needUpdateSupplyForOrder = false;
            $this->em->flush();
        }
    }

    /**
     * Обновление забранированного товара
     * @param type $order
     */
    public function updateBookingOrderCompositions($order)
    {
        //смотрим, есть ли метка, на бронирование
        $cache = $this->container->get('beryllium_cache');
        //проверка длится максимум 10 секунд
        $index = 0;
        while ($cache->get('startBookingProductToOrder')) {
            usleep(100000);  //задерживаем выполнение кода на 100000 микросекунд
            $index++;
            if ($index > 100) {
                break;
            }
        }

        $cache->set('startBookingProductToOrder', true, 5);    //ставим на 5 сек
        //проверяем если есть товары в транзите и мы изменили количество, то есть ли доступное количество
        //реального товара для транзита
        foreach ($order->getCompositions() as $composition) {
            if ($composition->getBooking()) {
                foreach ($composition->getBooking() as $book) {
                    if ($book->getTransit()) {
                        $isCanTransitReal = $this->checkTransitRealProduct($book);
                        if (!$isCanTransitReal) {
                            $tmp['NotEnoughRealProducts'] = $book;
                            $res[]                        = $tmp;
                            return $res;
                        }
                    }
                }
            }
        }

        $res = [];

        if ($order->getIsShippedStatus() || $order->getIsCanceledStatus()) {

            //Когда выставляется статус ОТГРУЖЕНО, то удаляются брони и для связных единиц выставляется флаг isCouldBeSold=false
            if ($order->getIsShippedStatus()) {
                //просчитываем количество до изменений, иначе не верно считает
                if (!count($res)) {
                    $this->logisticks_logic->updateProductAvailability($order->getCompositions(), $order);
                }

                //собираем массив, чтобы сохранить для истории
                $compositionsShippedHistory = [
                    'ndsTax' => $order->getNdsTax(),
                    'cost' => $order->getCost(),
                    'deliveryCost' => $order->getDeliveryCost()
                ];


                //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                //проверяем, чтобы забронированное количество товара соответствовало количеству прикрепленных товарных единиц
                $needNewSupply  = [];
                $unitObject_ids = [0];
                foreach ($order->getCompositions() as $composition) {
                    //если товар под заказ
                    if ($composition->getProduct()->getOrderOnly()) {
                        foreach ($composition->getBooking() as $book) {

                            //берем сколько нужно свободных товарных позиций
                            $needFreeQuantity = $book->getQuantity() - $composition->getUnits()->count();

                            //ищем только реальные свободные позиции
                            $freeUnits = $this->em->getRepository('CoreLogisticsBundle:UnitInStock')
                                ->findFreeUnit($composition->getProduct()->getId(), $book->getStock()->getId(), $unitObject_ids, $needFreeQuantity);

                            foreach ($freeUnits as $fu) {
                                $unitObject_ids[] = $fu->getId();
                            }

                            //если не все свободные товарные единицы найдены
                            if (count($freeUnits) + $composition->getUnits()->count() < $book->getQuantity()) {
                                //если не указан поставщик
                                if (!$composition->getDefaultSupplier()) {
                                    $res['errors']['NotSelectedDefaultSupplier'] = $composition;
                                    return $res;
                                }
                                $needNewSupply[$book->getStock()->getId()][$composition->getDefaultSupplier()->getId()][] = [
                                    'composition' => $composition->getId(),
                                    'quantity' => $book->getQuantity() - count($freeUnits)
                                ];
                            }
                        }
                    }
                }

                //делаем запрос на создание реальной поставки и дожидаемся ответа
                if (count($needNewSupply)) {
                    $url      = $this->router->generate('core_order_create_new_supply', [], true);
                    $postdata = [
                        'needNewSupply' => $needNewSupply,
                        'order' => $order->getId()
                    ];
                    $r        = $this->getWebPageFromAdmin($url, $postdata);
                }

                $badSerials = false;
                foreach ($order->getCompositions() as $comp) {
                    if (!$comp->getProduct()->getIsNoSerials()) {
                        //подсчитываем серийники для товарной позиции
                        $serials = 0;
                        foreach ($comp->getUnits() as $u) {
                            if ($u->getSerials()) {
                                $serials += $u->getSerials()->count();
                            }
                        }
                        if (!$badSerials && (!$comp->getUnits() || $comp->getQuantity() != ($serials / $comp->getProduct()->getSerialsQuantity()))) {
                            $badSerials                                    = true;
                            $res['errors']['NotSetAllSerialsForRealUnits'] = $composition;
                            return $res;
                        }
                    }
                }


                $unitObject_ids = [0];
                foreach ($order->getCompositions() as $composition) {
                    //находим свободные позиции для тех товаров, которые не имеют серийников
                    if ($composition->getProduct()->getIsNoSerials()) { //ищем только для товаров без серийников т.к. при указании серийников былы привязка товарных единиц
                        foreach ($composition->getBooking() as $book) {
                            $freeUnits = $this->em->getRepository('CoreLogisticsBundle:UnitInStock')
                                ->findFreeUnit($composition->getProduct()->getId(), $book->getStock()->getId(), $unitObject_ids, $book->getQuantity());

                            foreach ($freeUnits as $fu) {
                                $composition->addUnit($fu);
                                $unitObject_ids[] = $fu->getId();
                            }
                        }
                    }

                    foreach ($composition->getUnits() as $u) {
                        $u->setIsCouldBeSold(false)//т.к. единица продана
                            ->setStock(null);
                    }

                    $compositionsShippedHistory['compositions'][$composition->getProduct()->getId()] = ['quantity' => $composition->getQuantity()];
                }

                //проверка, чтоб отгружать могли только реальные позиции
                if ($composition->getUnits()->count() < $composition->getQuantity()) {
                    $res['errors']['NotEnoughUnits'] = $composition;
                    return $res;
                } else {
                    foreach ($composition->getUnits() as $u) {
                        if ($u->getIsVirtual()) {
                            $res['errors']['NotEnoughUnits'] = $composition;
                            return $res;
                        }
                    }
                }

                //собираем массив, чтобы сохранить для истории
                $order->setShippedOrderInfoHistory(json_encode($compositionsShippedHistory));

                //удаляем бронь
                foreach ($order->getCompositions() as $composition) {
                    foreach ($composition->getBooking() as $book) {
                        $this->em->remove($book);
                    }
                    $composition->setBooking(new ArrayCollection());
                }
            } //если отменили заказ
            else {
                if ($order->getIsCanceledStatus()) {
                    $allBackUnits = []; //вернувшиеся не списанные товарные единицы
                    $order->setExtraStatus(null);               //сбрасываем дополнительный статус
                    if ($order->getReasonForCanceling()->getName() == Order::returnCanceledReasonName) { //возврат всего заказа
                        $order->setShippedDateTime(null); //сбрасываем время отгрузки т.к. весь товар вернулся
                        $order->setSerialsAddStartDateTime(null); //сбрасываем дату добавления первых серийников
                        foreach ($order->getCompositions() as $c) {
                            foreach ($c->getUnits() as $u) {
                                //удаляем серийники
                                if ($u->getSerials()) {
                                    foreach ($u->getSerials() as $ser) {
                                        $this->em->remove($ser);
                                    }
                                    $u->setSerials(null);
                                }

                                //разрываем связь с заказом
                                $u->setComposition(null)
                                    ->setStock($order->getStockForCanceling()); // заносим возврат на склад
                                if (!$u->getIsWithDefect()) { //если не дефект
                                    $u->setIsCouldBeSold(true); //можно продавать
                                    $allBackUnits[$u->getProduct()->getId()][] = $u; //сохраняем позиции, которые вернулись
                                }
                            }
                        }
                    } else {
                        if ($order->getReasonForCanceling()->getName() == Order::reorderCanceledReasonName) { //переоформление заказа
                        } else {
                            if ($order->getReasonForCanceling()->getName() == Order::otherCanceledReasonName) { //другая причина отмены заказа
                                $order->setShippedDateTime(null); //сбрасываем время отгрузки т.к. весь товар вернулся
                                $order->setSerialsAddStartDateTime(null); //сбрасываем дату добавления первых серийников
                                foreach ($order->getCompositions() as $c) {
                                    foreach ($c->getUnits() as $u) {
                                        //удаляем серийники
                                        if ($u->getSerials()) {
                                            foreach ($u->getSerials() as $ser) {
                                                $this->em->remove($ser);
                                            }
                                            $u->setSerials(null);
                                        }
                                        //разрываем связь с заказом
                                        $u->setComposition(null)
                                            ->setStock($order->getStockForCanceling()); // заносим возврат на склад
                                        if (!$u->getIsWithDefect()) { //если не дефект
                                            $u->setIsCouldBeSold(true); //можно продавать
                                            $allBackUnits[$u->getProduct()->getId()][] = $u; //сохраняем позиции, которые вернулись
                                        }
                                    }
                                }
                            }
                        }
                    }

                    //удаляем бронь
                    foreach ($order->getCompositions() as $composition) {
                        foreach ($composition->getBooking() as $book) {
                            $this->em->remove($book);
                        }
                        $composition->setBooking(new ArrayCollection());
                    }


                    if (!count($res)) {
                        $this->logisticks_logic->updateProductAvailability($order->getCompositions(), $order, false, false, $allBackUnits);
                    }
                }
            }
        } //добавляем бронь
        else {
            $compositions = [];
            $products     = new ArrayCollection();
            foreach ($order->getCompositions() as $p) {
                $products->add($p->getProduct());
                $compositions[$p->getProduct()->getId()] = $p;
            }

            //берём все склады
            $allStocks = $this->em->getRepository('CoreLogisticsBundle:Stock')->geAllByIndexId();
            //пересчитываем общее количество
            $stocks    = $this->logisticks_logic->computeProductAvailability($products, $order);

            //определяем приоритетный склад
            if ($order->getStock()) {
                $generalStock = $order->getStock();
            } else {
                $generalStock = $this->em->getRepository('CoreLogisticsBundle:Stock')->findOneByIsGeneralStock(1);
            }


            //проверяем нужно ли создать виртуальную поставку для товара под заказ(перед созданием заказа)
            $needNewSupply = [];
            foreach ($products as $p) {
                if ($p->getOrderOnly()) {
                    $composition = $compositions[$p->getId()];
                    //если товара вообще нет
                    if (!isset($stocks[$p->getId()])) {
                        $defaultStock                               = $this->em->getRepository('CoreLogisticsBundle:Stock')->findOneBy(['isGeneralStock' => 1]);
                        $needNewSupply[$defaultStock->getId()][0][] = [
                            'composition' => $composition,
                            'quantity' => $composition->getQuantity()
                        ];
                    } else {
                        //считаем общее не забронированное количество товара по всем складам
                        $quantity = 0;
                        foreach ($stocks[$p->getId()] as $s) {
                            $quantity += $s['quantity'];
                            $p->totalQuantity = $quantity;
                        }

                        //смотрим сколько нужно забронировать
                        $needToBookQuantity = $compositions[$p->getId()]->getQuantity();

                        //если у заказа есть единицы, которые без серийников и нужно создать бронь, то это значит
                        //, что ранее заказ был отгружен, а теперь переформировывается. Поэтому бронируем не всё, а только новые единицы
                        foreach ($compositions[$p->getId()]->getUnits() as $u) {
                            if (!$u->getIsCouldBeSold()) {
                                $needToBookQuantity--;
                            }
                        }

                        //если для продукта в заказе количество указано больше чем есть, тогда нужно
                        if ($needToBookQuantity > $quantity) {
                            $defaultStock                               = $this->em->getRepository('CoreLogisticsBundle:Stock')->findOneBy(['isGeneralStock' => 1]);
                            $needNewSupply[$defaultStock->getId()][0][] = [
                                'composition' => $composition,
                                'quantity' => $needToBookQuantity - $quantity
                            ];
                        }
                    }
                }
            }

            //создаём виртуальную поставку для товара под заказ
            if (count($needNewSupply)) {
                $r      = $this->createNewSupply($needNewSupply, $order, true);
                //пересчитываем общее количество
                $stocks = $this->logisticks_logic->computeProductAvailability($products, $order);
                if (!$order->getId()) {
                    //запоминаем созданные поставки, чтобы проставить для них заказ, после его создания
                    $this->needUpdateSupplyForOrder = [
                        'supplies' => $r,
                        'order' => $order
                    ];
                }
            }


            foreach ($products as $p) {
                if (isset($stocks[$p->getId()])) {
                    //считаем общее не забронированное количество товара по всем складам
                    $quantity = 0;
                    foreach ($stocks[$p->getId()] as $s) {
                        $quantity += $s['quantity'];
                        $p->totalQuantity = $quantity;
                    }

                    //смотрим сколько нужно забронировать
                    $needToBookQuantity = $compositions[$p->getId()]->getQuantity();

                    //если у заказа есть единицы, которые без серийников и нужно создать бронь, то это значит
                    //, что ранее заказ был отгружен, а теперь переформировывается. Поэтому бронируем не всё, а только новые единицы
                    foreach ($compositions[$p->getId()]->getUnits() as $u) {
                        if (!$u->getIsCouldBeSold()) {
                            $needToBookQuantity--;
                        }
                    }

                    //если для продукта в заказе количество указано больше чем есть, тогда собираем данные для ошибки
                    if ($needToBookQuantity > $quantity) {
                        $tmp['product']  = $p;
                        $tmp['quantity'] = $quantity;
                        $res[]           = $tmp;
                    } //можно забронировать
                    else {
                        $pb               = new ArrayCollection();
                        $quantity_to_book = 0;

                        //считаем сколько серийников было указано ранее
                        //это нужно в том случае, когда меняется склад отгрузки, а на прежнем складе есть забронированные единицы с указаными серийниками
                        $pb_with_serials        = new ArrayCollection();
                        $pb_with_serials_stocks = [];
                        if ($compositions[$p->getId()]->getUnits()) {
                            foreach ($compositions[$p->getId()]->getUnits() as $u) {
                                $needMinus = false;
                                if ($u->getSerials()->count()) {
                                    if ($u->getIsCouldBeSold()) { //если есть забронированные позиции
                                        $needMinus = true;
                                        if (!isset($pb_with_serials_stocks[$u->getStock()->getId()])) {
                                            $pb_with_serials_stocks[$u->getStock()->getId()] = 0;
                                        }
                                        $pb_with_serials_stocks[$u->getStock()->getId()] ++;
                                    }
                                }
                                if ($needMinus) {
                                    $needToBookQuantity--;
                                }
                            }

                            //временно создаём бронировку для единиц с серийниками
                            if ($pb_with_serials_stocks) {
                                foreach ($pb_with_serials_stocks as $stock_id => $quantity) {
                                    $new_pbs = new ProductBooking();
                                    $new_pbs->setComposition($compositions[$p->getId()])
                                        ->setStock($allStocks[$stock_id])
                                        ->setQuantity($quantity);
                                    $pb_with_serials->add($new_pbs);
                                }
                            }
                        }


                        if (isset($generalStock)) {
                            //в первую очередь пытаемся забронировать с основного склада
                            foreach ($stocks[$p->getId()] as $s) {
                                //если на главном складе есть нужный товар для бронирования
                                if ($s['stock']->getId() == $generalStock->getId()) {
                                    if ($s['quantity'] < $needToBookQuantity) {
                                        $quantity_to_book = $s['quantity']; //бронируем с главного склада сколько есть
                                    } else {
                                        $quantity_to_book = $needToBookQuantity; //бронируем с главного склада достаточное количество
                                    }
                                    //если на главном складе есть что-то
                                    if ($quantity_to_book) {
                                        $new_pb = new ProductBooking();
                                        $new_pb->setComposition($compositions[$p->getId()])
                                            ->setStock($generalStock)
                                            ->setQuantity($quantity_to_book);
                                        $pb->add($new_pb);
                                    }
                                    break;
                                }
                            }
                        }

                        //если с главного склада забронировано меньше чем нужно или вообще ничего не забронировано,
                        //тогда ищем по другим складам
                        if ($needToBookQuantity > $quantity_to_book) {
                            $ostalos          = $needToBookQuantity - $quantity_to_book;
                            $quantity_to_book = 0;
                            foreach ($stocks[$p->getId()] as $s) {
                                //ищем по всем складам кроме главного
                                if (!isset($generalStock) || $s['stock']->getId() != $generalStock->getId()
                                ) {

                                    if ($s['quantity'] < $ostalos) {
                                        $quantity_to_book = $s['quantity']; //бронируем с склада сколько есть
                                    } else {
                                        $quantity_to_book = $ostalos; //бронируем с склада достаточное количество
                                    }
                                    //если на складе есть что-то
                                    if ($quantity_to_book) {
                                        $new_pb = new ProductBooking();
                                        $new_pb
                                            ->setComposition($compositions[$p->getId()])
                                            ->setStock($s['stock'])
                                            ->setQuantity($quantity_to_book);
                                        $pb->add($new_pb);

                                        $ostalos -= $quantity_to_book;
                                    }
                                }

                                //если весь товар забронирован по складам, тогда выходим
                                if (!$ostalos) {
                                    break;
                                }
                            }
                        }

                        //делаем перебронировку для единиц у которых есть серийники
                        //это нужно в том случае, когда меняется склад отгрузки, а на прежнем складе есть забронированные единицы с указаными серийниками
                        if ($pb_with_serials->count()) {
                            foreach ($pb_with_serials as $pbs) {
                                $add = true;
                                foreach ($pb as $pb_obj) {
                                    if ($pbs->getStock()->getId() == $pb_obj->getStock()->getId()) {
                                        $new_quantity = $pb_obj->getQuantity() + $pbs->getQuantity();
                                        $pb_obj->setQuantity($new_quantity);
                                        $add          = false;
                                        break;
                                    }
                                }
                                if ($add) {
                                    $pb->add($pbs);
                                }
                            }
                        }

                        //удаляем бронь
                        if ($compositions[$p->getId()]->getBooking()) {
                            foreach ($compositions[$p->getId()]->getBooking() as $p_obj) {
                                $del = true;
                                foreach ($pb as $pb_obj) {
                                    if ($p_obj->getStock()->getId() == $pb_obj->getStock()->getId() && $p_obj->getComposition()->getId() == $pb_obj->getComposition()->getId()
                                    ) {
                                        $del = false;
                                        break;
                                    }
                                }
                                if ($del) {
                                    $this->em->remove($p_obj);
                                    $compositions[$p->getId()]->removeBooking($p_obj);
                                }
                            }
                        }

                        //добавляем бронь
                        foreach ($pb as $pb_obj) {
                            $add = true;
                            if ($compositions[$p->getId()]->getBooking()) {
                                foreach ($compositions[$p->getId()]->getBooking() as $p_obj) {
                                    if ($p_obj->getStock()->getId() == $pb_obj->getStock()->getId() && $p_obj->getComposition()->getId() == $pb_obj->getComposition()->getId()
                                    ) {
                                        $add = false;
                                        break;
                                    }
                                }
                            }
                            if ($add) {
                                $compositions[$p->getId()]->addBooking($pb_obj);
                            }
                        }

                        //обновляем бронь
                        foreach ($pb as $pb_obj) {
                            foreach ($compositions[$p->getId()]->getBooking() as $p_obj) {
                                if ($p_obj->getStock()->getId() == $pb_obj->getStock()->getId() && $p_obj->getComposition()->getId() == $pb_obj->getComposition()->getId()
                                ) {
                                    $p_obj->setQuantity($pb_obj->getQuantity());
                                }
                            }
                        }
                    }
                } //товар закончился
                else {
                    $tmp['product']  = $p;
                    $tmp['quantity'] = 0;
                    $res[]           = $tmp;
                }
            }

            if (!count($res)) {
                $this->logisticks_logic->updateProductAvailability($order->getCompositions(), $order);
            }
        }

        $cache->delete('startBookingProductToOrder');   //удаляем метку

        return $res;
    }

    /**
     * Вычисляет стоимость заказа для корзины по выбранным товарам
     *
     * @param array $options
     * @return array
     * @author Sergeev A.M.
     */
    public function getFullOrderInfo($options = array(), $sessionName = 'core_order', $contragentId = null)
    {
        $sessionOrder = $this->session->get($sessionName);

        if (null === $sessionOrder || !isset($sessionOrder['products'])) {
            return null;
//            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException('Session is empty!');
        }

        if (!isset($options['products'])) {
            $products = $this->em->getRepository('CoreProductBundle:CommonProduct')->findProductsForCart(array_keys($sessionOrder['products']));
        } else {
            $products = $options['products'];
        }

        // Создаем заказ и его компазицию
        $order                      = new Order();
        $isOrderHavePhysicalProduct = false;
        foreach ($products as $product) {
            if ($product->getIsPhysical() === true) {
                $isOrderHavePhysicalProduct = true;
            }
            $сomposition = new Composition();
            $сomposition->setProduct($product);
            $сomposition->setPrice($product->getPrice());
            $сomposition->setQuantity($sessionOrder['products'][$product->getId()]['quantity']);
            $order->addComposition($сomposition);
        }

        if (null !== $this->session->get('current_contragent_id') || null !== $contragentId) {
            $contragentId = (null !== $contragentId) ? $contragentId : $this->session->get('current_contragent_id');
            $customer     = $this->em->getRepository('ApplicationSonataUserBundle:CommonContragent')->find($contragentId);
            $order->setContragent($customer);

            // Добавляем продавца
            $sellerOptions = array(
                'isDefault' => true,
            );
            if (method_exists($customer, 'getLegalForm')) {
                $sellerOptions['isWorkingWithNds'] = true;
            } else {
                $sellerOptions['isWorkingWithNds'] = false;
            }

            $seller = $this->em->getRepository('CoreLogisticsBundle:Seller')->findOneBy($sellerOptions);
            // Если нет дефолтного берем лубой другой
            if (null === $seller) {
                unset($sellerOptions['isDefault']);
                $seller = $this->em->getRepository('CoreLogisticsBundle:Seller')->findOneBy($sellerOptions);
                if (null === $seller) {
                    $sellerOptions['isWorkingWithNds'] = !$sellerOptions['isWorkingWithNds'];
                    $seller                            = $this->em->getRepository('CoreLogisticsBundle:Seller')->findOneBy($sellerOptions);
                }
            }
            $order->setSeller($seller);

            if (method_exists($customer, 'getLegalForm')) {
                $order->setContragentCompany($customer->getOrganization());
            } else {
                $fio = $customer->getLastName().' '.$customer->getFirstName().' '.$customer->getSurName();
                $order->setContragentFio($fio);
            }
        }

        // Добавить способ доставки в заказ
        $sessionInfo = $this->session->get('buyer_with_delivery');
        if (null !== $sessionInfo) {

            $delivery = $this->em->getRepository('CoreDeliveryBundle:Service')->find($sessionInfo['delivery']['method']);
            $order->setDeliveryMethod($delivery);

            if ($delivery->getIsCashOnDelivery()) {
                $order->setIsDeliveryIncludedInPayment(false);
            } else {
                $order->setIsDeliveryIncludedInPayment(true);
            }

            $contact = $this->em->getRepository('ApplicationSonataUserBundle:CommonContact')->find($sessionInfo['contactId']);
            if (null !== $contact) {
                $order->setDeliveryAddress($contact->getAddress());
                $order->setDeliveryCity($contact->getCity());
                $order->setDeliveryPostcode($contact->getPostIndex());

                $order->setComments($contact->getMark());

                if (null !== $order->getContragent() && method_exists($order->getContragent(), 'getLegalForm')) {
                    $order->setRecipientCompany($order->getContragent()->getOrganization());
                    $order->setRecipientEmail($order->getContragent()->getContactEmail());
                    $order->setRecipientPhone($order->getContragent()->getPhone1());
                } else {
                    $order->setRecipientFio($contact->getLastName().' '.$contact->getFirstName().' '.$contact->getSurName());
                    $order->setRecipientEmail($contact->getContactEmail() ? $contact->getContactEmail() : (null !== $order->getContragent() ? $order->getContragent()->getUser()->getEmail() : ''));
                    $order->setRecipientPhone($contact->getPhone());
                    $order->setRecipientPassport($contact->getPassport() ? $contact->getPassport() : ' ');
                }
            }

            if ($sessionInfo['delivery']['point'] > 0) {
                $point = $this->em->getRepository('CoreDeliveryBundle:Address')->find($sessionInfo['delivery']['point']);
                $order->setDeliveryPoint($point);
                $order->setDeliveryAddress($point->getCaptionRu());
                $order->setDeliveryCity($point->getCity());
                $order->setDeliveryPostcode('');
            }

            if (null !== $sessionInfo['delivery']['cost']) {
                $order->setDeliveryCost($sessionInfo['delivery']['cost']);
            } else {
                $order->setDeliveryCost(0);
            }
            $order->setDeliveryPrice($sessionInfo['delivery']['cost']);

            // Проставляем статус ожидает оплаты
            $status = $this->em->getRepository('CoreOrderBundle:ExtraStatus')->findOneByName('awaiting-payment');
            if (null !== $status) {
                $order->setExtraStatus($status);
            }
        }

        $order->setIsCanceledStatus(false);
        $order->setIsCheckedStatus(false);
        $order->setIsShippedStatus(false);
        $order->setIsPaidStatus(false);

        // Добавляем склад
        $stock = $this->em->getRepository('CoreLogisticsBundle:Stock')->findOneBy(['isGeneralStock' => true]);
        $order->setStock($stock);

        $orderCostInfo = $this->computeOrderCostInfo($order);

        $sessionOrder['total_quantity'] = $orderCostInfo['total_quantity'] ? $orderCostInfo['total_quantity'] : 0;
        $sessionOrder['total_cost']     = $orderCostInfo['total_cost'] ? $orderCostInfo['total_cost'] : 0;
        $this->session->set($sessionName, $sessionOrder);

        foreach ($order->getCompositions() as $сomposition) {
            if (isset($orderCostInfo['composition'][$сomposition->getProduct()->getId()])) {
                $c = $orderCostInfo['composition'][$сomposition->getProduct()->getId()];
                $сomposition->setNdsSum($c['ndsSum']);
                $сomposition->setCost($c['cost']);
                $сomposition->setDiscountValue($c['discountValue']);
                $сomposition->setIsDiscountValueInPercent($c['isDiscountValueInPercent']);
            }
        }

        return [
            'orderCostInfo' => $orderCostInfo,
            'sessionOrder' => $sessionOrder,
            'products' => $products,
            'orderDeliveryDays' => $this->getOrderDeliveryDays($products),
            'order' => $order,
            'isOrderHavePhysicalProduct' => $isOrderHavePhysicalProduct,
        ];
    }

    /**
     * Проверка на возможность отметить заказ как "Выполнен"
     *
     * @param object $order
     * @return array
     * @author Sergeev A.M.
     */
    public function validPaidStatus($order)
    {
        $response = array();

        $uow                = $this->em->getUnitOfWork();
        $originalEntityData = $uow->getOriginalEntityData($order);

        $isPaid = (($uow->getEntityState($order) === UnitOfWork::STATE_NEW || (isset($originalEntityData['isPaidStatus']) && $originalEntityData['isPaidStatus'] !== $order->getIsPaidStatus())) && true
            === $order->getIsPaidStatus()) ? true : false;

        $isCashOnDelivery = false;
        if (null !== $order->getDeliveryMethod()) {
            $isCashOnDelivery = $order->getDeliveryMethod()->getIsCashOnDelivery();
        }

        // Если была выставлена галочка Оплачен и доставка не наложка, проверяем на наличие средств на балансе у контрагента
        if ($isPaid && $order->getContragent()) {
            $orderCostInfo = $this->computeOrderCostInfo($order);
            $balance       = $this->container->get('core_payment_logic')->getBalance($order->getContragent()->getId(), true);

            if (isset($orderCostInfo['history_info']) && $order->getShippedDateTime()) {
                $total_cost = $orderCostInfo['history_info']['total_cost'];
            } else {
                $total_cost = $orderCostInfo['total_cost'];
            }

            if ($balance < $total_cost && false === $isCashOnDelivery) {
                $response['error'][] = 'Заказ не может быть оплачен, на балансе контрагента не хватает '.(abs($balance - $total_cost)).' руб.';
            }
        }

        return $response;
    }

    /**
     * Создание платежа по удержке при отмене заказа
     *
     * @param object $order
     * @author Sergeev A.M.
     */
    public function createPaymentOnCanceling($order)
    {

        if ($order->getIsCanceledStatus()) {

            $uow                = $this->em->getUnitOfWork();
            $originalEntityData = $uow->getOriginalEntityData($order);

            $isCanceled = (($uow->getEntityState($order) === UnitOfWork::STATE_NEW || (isset($originalEntityData['isCanceledStatus']) && $originalEntityData['isCanceledStatus'] !== $order->getIsCanceledStatus()))
                && true === $order->getIsCanceledStatus()) ? true : false;

            if ($isCanceled && (float) $order->getKeepMoneySumForCanceling() > 0) {

                // Создаем примечание для платежа
                $note = 'Удержание средств ('.$order->getKeepMoneySumForCanceling().' руб.) при отмене заказа №'.$this->container->get('core_common_twig_extension')->idFormatFilter($order->getId());
                if ($order->getReasonForCanceling()) {
                    $note .= "\n".'Причина отмены: '.$order->getReasonForCanceling()->getCaptionRu();
                }
                if ($order->getStockForCanceling()) {
                    $note .= "\n".'Склад, на который вернули весь товар: '.$order->getStockForCanceling()->getCaptionRu();
                }
                if ($order->getCommentForCanceling()) {
                    $note .= "\n".'Комментарий:'."\n".$order->getCommentForCanceling();
                }

                // Создаем платеж
                $payment = new Payment();
                $payment->setAmount((float) $order->getKeepMoneySumForCanceling());
                $payment->setIsPassed(true);
                $payment->setNoteRu($note);
                $payment->setCustomer($order->getContragent());
                $payment->setType(Payment::TYPE_OUT);

                // Записываем платеж
                $order->addPayment($payment);
                $this->em->persist($payment);
                $this->em->flush($payment);
            }
        }
    }

    /**
     * Получение дополнительных данных по заказам для вывода в кабинете (Список заказов)
     *
     * @param object $orders (paginator)
     * @author Sergeev A.M.
     */
    public function getOrdersHelpDataForOrderListInProfile($orders)
    {
        $ordersHelpData = array();

        foreach ($orders->getItems() as $order) {
            $id                  = $order->getId();
            $orderCostInfo       = $this->computeOrderCostInfo($order);
            $ordersHelpData[$id] = isset($orderCostInfo['history_info']) ? $orderCostInfo['history_info'] : $orderCostInfo;

            foreach ($order->getWaybills() as $w) {

                if (isset($ordersHelpData[$id]['expectedDateOfDelivery'])) {
                    if ($ordersHelpData[$id]['expectedDateOfDelivery']->getTimestamp() < $w->getExpectedDate()->getTimestamp()
                    ) {
                        $ordersHelpData[$id]['expectedDateOfDelivery'] = $w->getExpectedDate();
                    }
                } else {
                    $ordersHelpData[$id]['expectedDateOfDelivery'] = $w->getExpectedDate();
                }
            }
        }

        return $ordersHelpData;
    }

    /**
     * Отправляем пользователю уведомление о созданой накладной
     * @param array $data - данные о пользователе и номер заказа
     * @param array $waybills - массив накладных
     * @param Company $company - транспортная компания
     * @author Kaluzhny. N.
     */
    public function createNotificationMsg(
    $data, $waybills, Company $company, $configTplName
    )
    {
        $needWaybills = array();
        foreach ($waybills as $waybill) {
            if (!$waybill->getId() && !$waybill->getIsAutoGenerated() && $waybill->getNumber()) {
                $needWaybills[] = $waybill;
            }
        }
        if (count($needWaybills)) {
            $this->container->get('core_order_mailer_logic')->sendNotificationEmailMessage($data, $needWaybills, $company, $configTplName);
        }
    }

    /**
     * Проверяем, если изменился основной статус
     * @param type $order
     */
    public function sendMailIfNeedOnMainStatusChange($order)
    {
        $uow       = $this->em->getUnitOfWork();
        $changeset = $uow->getEntityChangeSet($order);

        //если проверен
        if ($order->getIsCheckedStatusSend() && isset($changeset['isCheckedStatus']) && $changeset['isCheckedStatus'][1]
        ) {
            $name = 'order-message-checked-status';
        } else {
            if ($order->getIsPaidStatusSend() && isset($changeset['isPaidStatus']) && $changeset['isPaidStatus'][1]
            ) {
                $name = 'order-message-paid-status';
            } else {
                if ($order->getIsShippedStatusSend() && isset($changeset['isShippedStatus']) && $changeset['isShippedStatus'][1]
                ) {
                    $name = 'order-message-shipped-status';
                } else {
                    if ($order->getIsCanceledStatusSend() && isset($changeset['isCanceledStatus']) && $changeset['isCanceledStatus'][1]
                    ) {
                        $name = 'order-message-canceled-status';
                    } else {
                        $name = false;
                    }
                }
            }
        }
        // отправляем уведомление контрагенту
        if ($name) {
            $this->container->get('core_order_mailer_logic')->sendOnMainStatusChange($order, $name);
        }
    }

    /**
     * Если создан новый заказ со статосум проверено, то делаем отправку
     * @param type $order
     */
    public function sendMailIfNeedForNewOrder($order)
    {
        //если проверен
        if ($order->getIsCheckedStatus() && !$order->getIsOrderCreatedSendMail()) {
            //делаем отправку, что заказ создан и проверен
            $this->sendOrderOnEmail($order, false);
        }
    }

    /**
     * Проверяет можно ли отображать заказ на фронтенде
     * @param type $order
     */
    public function checkIsNeedShowOnFontend($order)
    {
        $isShowOnFontend = false;
        foreach ($order->getCompositions() as $c) {
            if (!$c->getProduct()->getOrderOnly()) {    //если товар не под заказ
                $isShowOnFontend = true;
                break;
            }
        }

        //если товары "под заказ", но стоит галочка ПРОВЕРЕН
        if (!$isShowOnFontend && $order->getIsCheckedStatus()) {
            $isShowOnFontend = true;
        }

        return $isShowOnFontend;
    }

    /**
     * Макс время доставки товара подзаказ на наш склад
     * @param array $products
     * @return integer
     */
    private function getOrderDeliveryDays($products)
    {
        $max = 0;
        foreach ($products as $prod) {
            if ($prod->getOrderOnly() && ($prod->getDeliveryDays() > $max)) {
                $max = $prod->getDeliveryDays();
            }
        }

        return $max;
    }

    /**
     * Проверяем ограничение на создание заказа по поставщикам на минимальную сумму
     *
     * @param object $order
     * @return array
     * @author Sergeev A.M.
     */
    public function checkMinSumForOrder($options)
    {
        $compositions = [];
        if (isset($options['order'])) {
            $compositions = $options['order']->getCompositions();
        } elseif (isset($options['product'])) {
            $compositions[] = $options['product'];
        }
        $data = [];
        if ($compositions) {
            foreach ($compositions as $item) {

                if (isset($options['order'])) {
                    $product = $item->getProduct();
                } else {
                    $product = $item;
                }

                if ($product->getOrderOnly()) {
                    $supplier = $product->getSupplier();
                    $min      = $supplier ? $supplier->getMinSumForOrder() : 0;
                    if ($min) {
                        if (isset($data[$supplier->getId()])) {
                            $data[$supplier->getId()]['total'] += $product->getPrice() * (isset($options['order']) ? $item->getQuantity() : 1);
                        } else {
                            $data[$supplier->getId()] = [
                                'min' => $min,
                                'total' => $product->getPrice() * (isset($options['order']) ? $item->getQuantity() : 1),
                            ];

                            $brands = $this->em->getRepository('CoreManufacturerBundle:Brand')->getBrandsBySupplierId($supplier->getId());

                            foreach ($brands as $brand) {
                                $caption = $brand->{'getCaption'.ucfirst($this->container->get('request')->getLocale())}();
                                $href    = $this->router->generate('core_shop_product_brand_first_page', ['slug' => $brand->getSlug()], true);
                                $a       = '<a rel="nofollow" href="'.$href.'">'.$caption.'</a>';

                                $data[$supplier->getId()]['brands'][] = $a;
                            }
                        }
                    }
                }
            }
        }

        $msg            = '';
        $canCreateOrder = true;
        if (!empty($data)) {
            foreach ($data as $id => $bySupplier) {
                if ($bySupplier['min'] > $bySupplier['total']) {
                    $canCreateOrder       = false;
                    $data[$id]['isValid'] = false;
                    $formatter            = $this->container->get('core_common_money_twig_extension');
                    $sum                  = $formatter->moneyFormatFunction($bySupplier['min']).'&nbsp;'.$formatter->currencyFormatFunction();
                    $msg .= $this->container->get('translator')->trans('confines.min_sum', ['%brands%' => implode(', ', $bySupplier['brands']), '%sum%' => $sum], 'frontend').'<br>';
                } else {
                    $data[$id]['isValid'] = true;
                }
            }
        }

        return [
            'canCreateOrder' => $canCreateOrder,
            'msg' => $msg,
            'data' => $data,
        ];
    }
}