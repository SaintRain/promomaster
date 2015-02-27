<?php

/**
 * Общая бизнесс логика для логистики
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Logic;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\PersistentCollection;
use Core\LogisticsBundle\Entity\UnitInStock;
use Core\LogisticsBundle\Entity\ProductAvailability;
use Core\LogisticsBundle\Entity\Transit;
use Core\LogisticsBundle\Entity\ProductInTransit;
use Core\OrderBundle\Entity\Order;
use Core\LogisticsBundle\Entity\Supply;

class LogisticsLogic {

    private $em;

    public function __construct($em) {
        $this->em = $em;
    }

    /**
     * Возвращает проданную товарную единицу со склада
     * @param type $union
     */
    public function returnSoldUnit($unit) {
        //если заказ не имет статуса Отгружен
        if ($unit->getStock() && $unit->getComposition() && $unit->getComposition()->getOrder() &&
                !$unit->getComposition()->getOrder()->getIsShippedStatus() && $unit->getComposition()->getOrder()->getShippedDateTime() && !$unit->getIsCouldBeSold()) {
            $allBackUnits = [];
            $order = $unit->getComposition()->getOrder();
            foreach ($unit->getComposition()->getUnits() as $u) {
                if ($u->getId() == $unit->getId()) {
                    $unit->getComposition()->removeUnit($u);
                }
            }
            $unit->setComposition(NULL);
            if (!$unit->getIsWithDefect()) { //если не списано
                //удаляем серийники
                if ($unit->getSerials()) {
                    foreach ($unit->getSerials() as $ser) {
                        $this->em->remove($ser);
                    }
                    $unit->setSerials(NULL);
                }
                $u->setIsCouldBeSold(true); //можно продавать
                $allBackUnits[$unit->getProduct()->getId()][] = $unit;  //сохраняем позиции, которые вернулись
            }
            //обновляем доступное количество товра
            $this->updateProductAvailability($order->getCompositions(), $order, false, false, $allBackUnits);
        }
    }

    /**
     * Проверяет статус транзита, если завершен, тогда
     * переносит товар и меняет бронь на другой склад
     * @param type $transit
     */
    public function checkIsTransitWasExecuted($transit) {
        //если статус поменялся на завершен
        if ($transit->getStatus()->getName() == Transit::completedStatusName && !$transit->getIsTransitWasExecuted()) {

            $transit->setIsTransitWasExecuted(true);

            $products = new ArrayCollection();
            $productsInTransit = [];
            foreach ($transit->getBooking() as $b) {
                $products->add($b->getComposition()->getProduct());
                //чтобы не было одинаковых броней с различным количеством, помещаем всё в одну бронь
                $booking = $this->em->getRepository('CoreOrderBundle:ProductBooking')
                        ->findBy(['stock' => $transit->getToStock(), 'composition' => $b->getComposition()->getId()]);
                $totalQuantity = $b->getQuantity();
                foreach ($booking as $b2) {
                    $totalQuantity+=$b2->getQuantity();
                    $this->em->remove($b2);
                }

                //будет одна бронь для одного составляющего заказа
                $b->setTransit(NULL)
                        ->setStock($transit->getToStock())
                        ->setQuantity($totalQuantity);


                //берём единицы, которые были привязаны составу
                $units = $b->getComposition()->getUnits();

                //собираем все серийники, чтобы потом их запомнить
                $serialsArray = [];
                foreach ($units as $u) {
                    if ($u->getSerials()) {
                        $serials = [];
                        foreach ($u->getSerials() as $serial) {
                            $serials[] = $serial->getValue();
                        }
                        $serialsArray[] = implode(' ', $serials);
                    }
                }

                //еслине хватает единиц в составе (например, не для всех указаны серийники), тогда добираем со склада свободные
                if (!$units || $units->count() < $b->getQuantity()) {
                    //определяем сколько нужно добрать
                    if ($units) {
                        $need = $b->getQuantity() - $units->count();
                        $eliminated_unit_ids = [];
                        foreach ($units as $u) {
                            $eliminated_unit_ids[] = $u->getId();
                        }
                    } else {
                        $need = $b->getQuantity();
                        $eliminated_unit_ids = [0];
                    }

                    $units2 = $this->em->getRepository('CoreLogisticsBundle:UnitInStock')
                            ->findFreeUnitForTransit($b->getComposition()->getProduct()->getId(), $transit->getFromStock()->getId(), $eliminated_unit_ids, $need);

                    //склеиваем
                    $units = new ArrayCollection(
                            array_merge($units->toArray(), $units2)
                    );
                }
                //переносим нужное количество товара на другой склад
                foreach ($units as $u) {
                    $u->setStock($transit->getToStock());
                    $this->em->persist($u);
                }

                if (count($serialsArray)) {
                    $serialsText = implode("\n", $serialsArray);
                } else {
                    $serialsText = '';
                }

                //формируем продукты, которые приехали в транзите
                if (!isset($productsInTransit[$b->getComposition()->getProduct()->getId()])) {
                    $productsInTransit[$b->getComposition()->getProduct()->getId()] = ['product' => $b->getComposition()->getProduct(), 'quantity' => $b->getQuantity(), 'serialsText' => $serialsText];
                } else {
                    $productsInTransit[$b->getComposition()->getProduct()->getId()]['quantity']+=$b->getQuantity();
                    if ($serialsText) {
                        $productsInTransit[$b->getComposition()->getProduct()->getId()]['serialsText'].="\n" . $serialsText;
                    }
                }
            }

            //добавляем товары, которые приехали, т.к. Бронь сбросится и будет не понятно какие товары были в транзите
            foreach ($productsInTransit as $p) {
                $p_in_transit = new ProductInTransit();
                $p_in_transit->setProduct($p['product'])
                        ->setQuantity($p['quantity'])
                        ->setSerialsText($p['serialsText']);
                $transit->addProduct($p_in_transit);
            }

            //обновляем количество товара
            $this->updateProductAvailability($products);
        }
    }

    /**
     * 
     * @param type $id
     */
    public function deleteBookFromTransit($id) {
        $book = $this->em->getRepository('CoreOrderBundle:ProductBooking')->find($id);
        $t_id = $book->getTransit()->getId();
        if (!$book->getTransit()->getStatus() || $book->getTransit()->getStatus()->getName() != Transit::onTheWayStatusName) {
            $book->setTransit(NULL);
            $this->em->flush($book);
        }

        //считаем оставшееся количество товаров в транзите
        $booking = $this->em->getRepository('CoreOrderBundle:ProductBooking')->findBy(['transit' => $t_id, 'composition' => $book->getComposition()]);
        $quantityTotal = 0;
        foreach ($booking as $b) {
            if ($b->getTransit() && $b->getId() != $id) {
                $quantityTotal+=$b->getQuantity();
            }
        }

        return $quantityTotal;
    }

    /**
     * Вычисляет количество свободного товара по складам
     * @param type $products
     * @param type $order
     * @return type
     */
    public function computeProductAvailability($products, $order = false) {

        //формируем массив ID
        $p_ids = [];
        foreach ($products as $p) {
            $p_ids[] = $p->getId();
        }
        $res1 = [];
        $res2 = [];
        foreach ($p_ids as $p_id) {
            $temp = $this->em->getRepository('CoreLogisticsBundle:UnitInStock')->findStocksByProducts($p_id);
            $stock_ids = [];
            foreach ($temp as $stock_id => $s) {
                foreach ($s as $product_id => $info) {
                    $res1[$stock_id][$product_id] = $info;
                    $stock_ids[$stock_id] = $stock_id;
                }
            }

            //берём склады и проставляем
            $stocks = $this->em->getRepository('CoreLogisticsBundle:Stock')->findById($stock_ids);
            foreach ($res1 as $stock_id => $r) {
                foreach ($stocks as $stock) {
                    if ($stock_id == $stock->getId()) {
                        foreach ($r as $product_id => $info) {
                            $res1[$stock_id][$product_id]['stock'] = $stock;
                        }
                        break;
                    }
                }
            }

            //берем бронь по складам
            $temp = $this->em->getRepository('CoreOrderBundle:ProductBooking')->findBookingByProducts($p_id, $order);
            $stock_ids = [];
            foreach ($temp as $stock_id => $s) {
                foreach ($s as $product_id => $info) {
                    $res2[$stock_id][$product_id] = $info;
                    $stock_ids[$stock_id] = $stock_id;
                }
            }

            //берём склады и проставляем
            $stocks = $this->em->getRepository('CoreLogisticsBundle:Stock')->findById($stock_ids);
            foreach ($res2 as $stock_id => $r) {
                foreach ($stocks as $stock) {
                    if ($stock_id == $stock->getId()) {
                        foreach ($r as $product_id => $info) {
                            $res2[$stock_id][$product_id]['stock'] = $stock;
                        }
                        break;
                    }
                }
            }
        }

        //от свободного количества вычитаем бронь
        $stocks = $this->unitInStockMinusBooked($res1, $res2);

        return $stocks;
    }

    /**
     * От свободного количества вычитаем бронь
     * @param type $res1
     * @param type $res2
     * @return type
     */
    function unitInStockMinusBooked($res1, $res2) {

        $stocks = [];
        foreach ($res1 as $stock_id => $s) {

            foreach ($s as $p_id => $info) {
                $quantity = $info['quantity'];
                $booked_quantity = 0;
//                $stock = $info[0]->getStock();
                $stock = $info['stock'];

                foreach ($res2 as $stock_id2 => $s2) {    //ищем по брони
                    foreach ($s2 as $p_id2 => $info2) {
//                        $stock2 = $info2[0]->getStock();
                        $stock2 = $info2['stock'];
                        if ($stock) {
                            if ($p_id == $p_id2 && $stock->getId() == $stock2->getId()) {
                                $quantity-= $info2['quantity'];
                                $booked_quantity+=$info2['quantity'];
                                //break;
                            }
                        }
                    }
                }

                //расчитываем сколько осталось виртуальных позиций из реальных поставок
                $quantity_virtual_real_booked = 0;    //сигнализирует о том сколько виртуально-реальных единиц забронированно
                $needVirtualReal = ($booked_quantity - ($info['quantity'] - ($info['quantity_virtual_real'] + $info['quantity_virtual'])));    //если количество брони превышает количество реальных позиций
                if ($needVirtualReal > 0) { //высчитуем остаток
                    $quantity_virtual_real = $info['quantity_virtual_real'] - $needVirtualReal;
                    if ($quantity_virtual_real < 0) {
                        $quantity_virtual_real = 0;
                        $quantity_virtual_real_booked = $info['quantity_virtual_real']; //сколько забронированно
                    } else {
                        $quantity_virtual_real_booked = $needVirtualReal; //сколько забронированно
                    }
                } else {
                    $quantity_virtual_real = $info['quantity_virtual_real'];
                }

                //расчитываем сколько осталось виртуальных позиций
                $needVirtual = ($booked_quantity - ($info['quantity'] - $info['quantity_virtual']));    //если количество брони превышает количество реальных позиций
                if ($needVirtual > 0) {
                    $quantity_virtual = $info['quantity_virtual'] - $needVirtual;
                } else {
                    $quantity_virtual = $info['quantity_virtual'];
                }

                $info['stock'] = $stock;
                $info['quantity'] = $quantity;
                $info['quantity_virtual'] = $quantity_virtual;
                $info['quantity_virtual_real'] = $quantity_virtual_real;
                $info['quantity_virtual_real_booked'] = $quantity_virtual_real_booked;
                $stocks[$p_id][] = $info;
            }
        }
        return $stocks;
    }

    /**
     * Обновляет для продукции доступное количество позиций по складам
     * $dontTakeOrderOrder - yне учитывать заказ при расчете (используется, когда удаляем товар из заказа)
     * @param type $obj
     */
    public function updateProductAvailability($data, $order = false, $supplyStock = false, $allVirtualUnits = false, $allBackUnits = false, $dontTakeOrderOrder = false) {

        //можно передавать коллекцию продуктов или сразу продукт
        //также можно передавать коллекцию составов заказа или коллекцию продуктов
        //обновление всвязи с редактированием заказа
        $simpleUpdate = false;
        $products = new ArrayCollection();
        if ($order) {
            $compositions = [];
            if (!$data instanceof ArrayCollection && !$data instanceof PersistentCollection) {
                $products->add($data->getProduct());
                $compositions[$data->getProduct()->getId()] = $data;
            } else {
                foreach ($data as $composition) {
                    $products->add($composition->getProduct());
                    $compositions[$composition->getProduct()->getId()] = $composition;
                }
            }
        }
        //обновление связи с новой поставкой
        else if ($supplyStock) {
            $compositions = [];
            if (!$data instanceof ArrayCollection && !$data instanceof PersistentCollection) {
                $products->add($data->getProduct());
                $compositions[$data->getProduct()->getId()] = $data;
            } else {
                foreach ($data as $composition) {
                    $products->add($composition->getProduct());
                    $compositions[$composition->getProduct()->getId()] = $composition;
                }
            }
        }
        //просто обновление заданных продуктов
        else {
            $simpleUpdate = true;
            if (!is_array($data) && !$data instanceof ArrayCollection && !$data instanceof PersistentCollection) {
                $products->add($data);
            } else {
                $products = $data;
            }
        }
        if ($dontTakeOrderOrder) {
            //пересчитываем общее количество
            $stocks = $this->computeProductAvailability($products, $dontTakeOrderOrder);
        } else {
            //пересчитываем общее количество
            $stocks = $this->computeProductAvailability($products, $order);
        }
        
        foreach ($products as $p) {
            $pa = new ArrayCollection();    //собираем сюда новую информацию о количестве свободного товара

            if ($simpleUpdate) {    //делаем простые вычисления над списком заданых продуктов
                if (isset($stocks[$p->getId()])) {
                    foreach ($stocks[$p->getId()] as $s) {
                        $new_pa = new ProductAvailability();
                        $new_pa->setProduct($p)
                                ->setStock($s['stock'])
                                ->setQuantity($s['quantity'])
                                ->setQuantityVirtual($s['quantity_virtual'])
                                ->setQuantityVirtualReal($s['quantity_virtual_real']);
                        $pa->add($new_pa);
                    }
                }
            } else {  //делаем сложные вычисления - переоформлеине закза/новая поставка
                $needQuantity = $compositions[$p->getId()]->getQuantity();
                //если у заказа есть единицы, которые без серийников и нужно создать бронь, то это значит
                //, что ранее заказ был отгружен, а теперь переформировывается. Поэтому бронируем не всё, а только новые единицы
                if ($order) {
                    foreach ($compositions[$p->getId()]->getUnits() as $u) {
                        if (!$u->getIsCouldBeSold()) {
                            $needQuantity--;
                        }
                    }
                }

                //проверяем, если на складе поставки нет товара, тогда добавляем запись
                if ($supplyStock) {
                    $stockEmpty = true;
                    if ($supplyStock && isset($stocks[$p->getId()])) {
                        foreach ($stocks[$p->getId()] as $s) {
                            if ($s['stock'] && $s['stock']->getId() == $supplyStock->getId()) {
                                $stockEmpty = false;
                                break;
                            }
                        }
                    }
                    if ($stockEmpty) {
                        $stocks[$p->getId()][] = [
                            'quantity' => 0,
                            'quantity_virtual' => 0,
                            'quantity_virtual_real' => 0,
                            'quantity_virtual_real_booked' => 0,
                            'stock_id' => $supplyStock->getId(),
                            'product_id' => $p->getId(),
                            'stock' => $supplyStock
                        ];
                    }
                }

                //формируем новый массив данных
                if (isset($stocks[$p->getId()])) {
//                var_dump($stocks[$p->getId()]);
                    foreach ($stocks[$p->getId()] as $s) {
                        if ($s['stock']) {
                            $s_id = $s['stock']->getId();
                        } else {
                            $s_id = 0;
                        }
                        if ($order) {
                            //если отмена заказа и возврат товара, тогда делаем корректировку
                            if (isset($allBackUnits[$p->getId()])) {
                                $quantity = $s['quantity'] + count($allBackUnits[$p->getId()]);
                                $quantity_virtual = $s['quantity_virtual'];
                                $quantity_virtual_real = $s['quantity_virtual_real'];
                            }
                            //просто отредактировали состав заказа
                            else {
                                $res1 = [];
                                $res2 = [];

                                //берём сколько нужно забронировать по складам
                                $bookQuantity = 0;
                                foreach ($compositions[$p->getId()]->getBooking() as $b) {
                                    if ($b->getStock()->getId() == $s_id) {
                                        $bookQuantity = $b->getQuantity();
                                        break;
                                    }
                                }
                                $res1[$s_id][$p->getId()] = ['quantity' => $s['quantity'], 'stock' => $s['stock'], 'quantity_virtual' => $s['quantity_virtual'], 'quantity_virtual_real' => $s['quantity_virtual_real']];
                                $res2[$s_id][$p->getId()] = ['quantity' => $bookQuantity, 'stock' => $s['stock']];
                                $res = $this->unitInStockMinusBooked($res1, $res2);
                                $quantity = $res[$p->getId()][0]['quantity'];
                                $quantity_virtual = $res[$p->getId()][0]['quantity_virtual'];
                                $quantity_virtual_real = $res[$p->getId()][0]['quantity_virtual_real'];
                            }

                            $stock = $s['stock'];
                        }
                        //если для поставки, для которой не были созданы товарные позиции
                        else if ($supplyStock && $supplyStock->getId() == $s_id && !$compositions[$p->getId()]->getSupply()->getIsProductUnitsWasCreated()) {

                            //для виртуальной поставки
                            if ($compositions[$p->getId()]->getSupply()->getIsVirtual()) {
                                $quantity_virtual = $s['quantity_virtual'] + $needQuantity;
                                $quantity = $s['quantity'] + $needQuantity;   //товарные позиции только создаются, поэтому прибавляем количество
                                $quantity_virtual_real = $s['quantity_virtual_real'];
                            }
                            //если поставка реальная, но еще в пути, то для неё создавались виртуальные позиции
                            else if ($compositions[$p->getId()]->getSupply()->getStatus()->getName() == Supply::onTheWayStatusName) {
                                //корректировка для виртуальных позиций, если они были заменены на другие виртуальные
                                if (isset($allVirtualUnits[$p->getId()])) {
                                    $virtualReplacedByRealQuantity = count($allVirtualUnits[$p->getId()]);
                                } else {
                                    $virtualReplacedByRealQuantity = 0;
                                }

                                $quantity_virtual = $s['quantity_virtual'] - $virtualReplacedByRealQuantity;
                                $quantity = $s['quantity'] + $needQuantity - $virtualReplacedByRealQuantity;
                                $quantity_virtual_real = $needQuantity + $s['quantity_virtual_real'];
                            }
                            //для реальной поставки, которая поставлена на склад
                            else {
                                //корректировка для виртуальных позиций, если они были заменены на реальные
                                if (isset($allVirtualUnits[$p->getId()])) {
                                    $virtualReplacedByRealQuantity = count($allVirtualUnits[$p->getId()]);
                                } else {
                                    $virtualReplacedByRealQuantity = 0;
                                }
                                $quantity_virtual = $s['quantity_virtual'] - $virtualReplacedByRealQuantity;    //если была замена виртуальных позиций на реальные
                                $quantity = $s['quantity'] + $needQuantity - $virtualReplacedByRealQuantity;   //товарные позиции только создаются, поэтому прибавляем количество
                                $quantity_virtual_real = $s['quantity_virtual_real'];
                            }
                            $stock = $supplyStock;
                        } else {
                            //корректировка для виртуальных-реальных позиций, если они были заменены на реальные
                            if ($supplyStock && $supplyStock->getId() == $s_id && isset($allVirtualUnits[$p->getId()])) {
                                $virtualRealReplacedByRealQuantity = count($allVirtualUnits[$p->getId()]);
                            } else {
                                $virtualRealReplacedByRealQuantity = 0;
                            }

                            //обновляем по другим складам без нагрузочных изменений
                            $quantity = $s['quantity'];
                            $quantity_virtual = $s['quantity_virtual'];
                            $quantity_virtual_real = $s['quantity_virtual_real'] + $s['quantity_virtual_real_booked'] - $virtualRealReplacedByRealQuantity;
                            $stock = $s['stock'];
                        }

                        $new_pa = new ProductAvailability();
                        $new_pa->setProduct($p)
                                ->setStock($stock)
                                ->setQuantity($quantity)
                                ->setQuantityVirtual($quantity_virtual)
                                ->setQuantityVirtualReal($quantity_virtual_real);

                        $pa->add($new_pa);
                    }
                }
                //если возврат товара с заказа и нет больше ничего на других складах
                else {
if (!$supplyStock) {
    return false;
}
                    $new_pa = new ProductAvailability();
                    $new_pa->setProduct($p)
                            ->setStock($supplyStock)
                            ->setQuantity($needQuantity)
                            ->setQuantityVirtual(0)
                            ->setQuantityVirtualReal(0);
                    $pa->add($new_pa);
                    //ldd(debug_backtrace());

                }
            }


            //удаляем
            foreach ($p->getProductAvailability() as $p_obj) {
                $del = true;
                foreach ($pa as $pa_obj) {
                    if ($p_obj->getStock()->getId()
                        == $pa_obj->getStock()->getId()
                        && $p_obj->getProduct()->getId() == $pa_obj->getProduct()->getId()) {
                        $del = false;
                        break;
                    }
                }
                if ($del) {
                    $this->em->remove($p_obj);
                    $p->removeProductAvailability($p_obj);
                }
            }

            //добавляем
            foreach ($pa as $pa_obj) {
                $add = true;
                foreach ($p->getProductAvailability() as $p_obj) {
                    if ($p_obj->getStock()->getId() == $pa_obj->getStock()->getId() && $p_obj->getProduct()->getId() == $pa_obj->getProduct()->getId()) {
                        $add = false;
                        break;
                    }
                }
                if ($add) {
                    $p->addProductAvailability($pa_obj);
                }
            }

            //обновляем
            foreach ($pa as $pa_obj) {
                foreach ($p->getProductAvailability() as $p_obj) {
                    if ($p_obj->getStock()->getId() == $pa_obj->getStock()->getId() && $p_obj->getProduct()->getId() == $pa_obj->getProduct()->getId()) {
                        $p_obj->setQuantity($pa_obj->getQuantity())
                                ->setQuantityVirtual($pa_obj->getQuantityVirtual())
                                ->setQuantityVirtualReal($pa_obj->getQuantityVirtualReal());
                    }
                }
            }
//            var_dump($pa);
        }
        if (isset($pa)) {
            return $pa;
        } else {
            return false;
        }
//        exit;
    }

}
