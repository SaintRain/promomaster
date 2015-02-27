<?php

/**
 * Бизнесс логика для скидок
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DiscountsBundle\Logic;

use Doctrine\Common\Collections\ArrayCollection;
use Core\DiscountsBundle\Entity\ContragentManufacturerDiscount;
use Core\OrderBundle\Entity\Composition;

class DiscountsLogic
{

    private $em;
    private $container;

    public function __construct($em, $container)
    {
        $this->em = $em;
        $this->container = $container;
    }

    /**
     * Вычисляет стоимость доставки с учётом скидок
     * @param type $order
     */
    public function computeOrderDeliveryCost($order)
    {
        $cost = $order->getDeliveryCost();

        return $cost;
    }

    /**
     * Получает все скидки с заменой на индивидуальные по контрагенту
     * @param type $contragent
     * @return type
     */
    public function getDiscounts($contragent)
    {
        $res = [];
        //взависимости от продуктов берём скидки по производителям
        $discounts = [];
        $temp = $this->em->getRepository('CoreDiscountsBundle:ManufacturerDiscount')->getAllEnabled();

        if ($temp) {
            foreach ($temp as $t) {
                $discounts[$this->manufacturersKey($t->getManufacturers())] = $t;
            }
        }

        //если есть индивидуальные скидки для контрагента, то ставим их
        if (null !== $contragent)
            if ($contragent->getManufacturerDiscounts()) {
                foreach ($contragent->getManufacturerDiscounts() as $b_discount) {
                    if ($b_discount->getIsEnabled()) {
                        $discounts[$this->manufacturersKey($b_discount->getManufacturers())] = $b_discount;
                    }
                }
            }

        return $discounts;
    }

    /**
     * Расчитывает скидку для одного продукта
     * @param type $contragent
     * @param type $product
     * @param type $discounts
     * @param type $order
     * @return type
     */
    public function computeDiscountForProduct($contragent, $productOrComposition, $discounts, $order = false)
    {
        if ($productOrComposition instanceof Composition) {
            $price = $productOrComposition->getPrice();
            $manufacturers = $productOrComposition->getProduct()->getManufacturers();
        } else {
            $price = $productOrComposition->getPrice();
            $manufacturers = $productOrComposition->getManufacturers();
        }

        $dynamicCost = $price;
        $res = [];
        $b_key = $this->manufacturersKey($manufacturers);
        //если есть скидка по производителю
        if (isset($discounts[$b_key])) {
            $d = $discounts[$b_key];
            $max_step_discount = false;
            foreach ($d->getManufacturerStepValues() as $step) {

                if ($d instanceof ContragentManufacturerDiscount) {
                    $ordersSumm = $dynamicCost;  //индивидуальная скидка
                } else {
                    //скидка по производителю
                    $ordersSumm = $this->getPaidOrdersForPeriod($contragent, $step->getStepDays(), $order);
                }

                //сравниваем пороговое значение
                if ($ordersSumm >= $step->getStepValue()) {
                    //бёрём наибольшую скидку
                    if (!$max_step_discount || $max_step_discount->getDiscountValue() < $step->getDiscountValue()) {
                        $max_step_discount = $step;
                    }
                }
            }

            //если скидка найдена
            if ($max_step_discount) {
                //считаем в процентах
                if ($max_step_discount->getIsDiscountValueInPercent()) {
                    $cost = $price - ($price / 100) * $max_step_discount->getDiscountValue();
                }
                //считаем фиксировано
                else {
                    $cost = $price - $max_step_discount->getDiscountValue();
                }

                $res['costForOneUnit'] = $cost; //стоимость с учетом скидки
                $res['discountValue'] = $max_step_discount->getDiscountValue();
                $res['isDiscountValueInPercent'] = $max_step_discount->getIsDiscountValueInPercent();
            }
        }
        return $res;
    }

    /**
     * Расчитываем стоимость одной позиции товара с учетом скидки для контрагента
     * @param type $order
     */
    public function computeDiscountForOrder($contragent, $order, $dynamicCost)
    {
        $res = [];
        //взависимости от продуктов берём скидки по производителям
        $discounts = $this->getDiscounts($contragent);

        //определяем какие скидки активные по дате и пороговым значениям
        foreach ($order->getCompositions() as $c) {

            //проверяем, чтобы товар небыл отгружен ранее, иначе берём старые цены
            $takeOldPrice = false;
            if ($order->getShippedDateTime()) {
                foreach ($c->getUnits() as $u) {
                    if (!$u->getIsCouldBeSold()) {  //находим хотя-бы 1 товар, который был отгружен
                        $takeOldPrice = true;
                        break;
                    }
                }
            }
            if ($c) {
                if ($c->getProduct()) {
                    $p = $c->getProduct();
                    $p_id = $p->getId();
                    if (!$takeOldPrice) {
                        $r = $this->computeDiscountForProduct($contragent, $c, $discounts, $order);
                        if (count($r)) {
                            $res[$p_id] = $r;
                        }
                    }
                    //берём сохранённую скидку для отгруженного ранее заказа
                    else if ($takeOldPrice) {

                        //считаем в процентах
                        if ($c->getIsDiscountValueInPercent()) {
                            $costForOneUnit = $c->getPrice() - ($c->getPrice() / 100) * $c->getDiscountValue();
                        }
                        //считаем фиксировано
                        else {
                            $costForOneUnit = $c->getPrice() - $c->getDiscountValue();
                        }
                        $res[$p_id]['costForOneUnit'] = $costForOneUnit;
                        $res[$p_id]['discountValue'] = $c->getDiscountValue();
                        $res[$p_id]['isDiscountValueInPercent'] = $c->getIsDiscountValueInPercent();
                    }
                }
            }
        }

        return $res;
    }

    /**
     * Расчитываем скидки на для котрагента  и состава заказа
     * @param type $contragent
     * @param type $composition
     */
    public function computeOrderCompositionsDiscount($order)
    {

        //берём стоимость заказа для расчета индивидуальной скидки
        $dynamicCost = $this->container->get('core_order_logic')->getOrderDynamicCost($order);

        //вычисляем стоимость без количества товара
        $res = $this->computeDiscountForOrder($order->getContragent(), $order, $dynamicCost);

        //считаем стоимость с учетом количества
        foreach ($order->getCompositions() as $c) {
            if ($c->getProduct()) {
                $p_id = $c->getProduct()->getId();
                //если есть посчитанная стоимость со скидкой
                if (isset($res[$p_id])) {
                    $res[$p_id]['cost'] = $res[$p_id]['costForOneUnit'] * $c->getQuantity(); //стоимость с учетом скидки
                } else {
                    //цену берём , которую запомнили из состава заказа, а не из продукта, иначе сегодня заказали, завтра цена поменялась и стоимость заказа поменяется
                    $res[$p_id]['cost'] = $c->getPrice() * $c->getQuantity();
                    $res[$p_id]['discountValue'] = 0;
                    $res[$p_id]['isDiscountValueInPercent'] = true;
                }
            }
        }

        return $res;
    }

    /**
     * Cчитаем сумму всех оплаченны и отгруженных заказов на заданный период времени
     * @param int $stepDays
     */
    function getPaidOrdersForPeriod($contragent, $stepDays, $dontGetOrder = false)
    {
        $order_summ = 0;
        $dateNeed = time() - $stepDays * 86400;
        if (null !== $contragent) {
            foreach ($contragent->getOrders() as $order) {
                //если заказ исполнен в промежутке времени, который нас устраивает
                if ((!$dontGetOrder || $dontGetOrder->getId() != $order->getId()) && $order->getIsPaidStatus() && $order->getIsShippedStatus() && $order->getPaidDateTime()->getTimestamp() >= $dateNeed) {
                    $order_summ+= $this->container->get('core_order_logic')->getOrderCostForContragentBalanceCompute($order);
                }
            }
        }
        return $order_summ;
    }

    /**
     * Генерирует ключ для сравнения вхождения производителей
     * @param type $manufacturers
     * @return type
     */
    public function manufacturersKey($manufacturers)
    {
        $mas = [];
        foreach ($manufacturers as $b) {
            $mas[] = $b->getId();
        }

        sort($mas);
        $key = implode('_', $mas);
        return $key;
    }

}
