<?php

/**
 * Бизнесс логика для поставок
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Logic;

use Doctrine\Common\Collections\ArrayCollection;
use Core\LogisticsBundle\Entity\UnitInStock;
use Core\LogisticsBundle\Entity\Supply;

class SupplyLogic {

    private $em;
    private $logistics_logic;

    public function __construct($em, $logistics_logic) {
        $this->em = $em;
        $this->logistics_logic = $logistics_logic;
    }

    /**
     * Создаёт позиции товара на общем складе
     * @param type $obj
     */
    public function addProductUnits($obj) {

        //проверяем, действительно ли изменился статус
        if (!$obj->getIsProductUnitsWasCreated() && in_array($obj->getStatus()->getName(), [Supply::suppliedStatusName, Supply::onTheWayStatusName])) {
            $allVirtualUnits = [];
            //виртуальная поставка
            if ($obj->getIsVirtual()) {
                foreach ($obj->getProducts() as $p) {
                    for ($i = 1; $i <= $p->getQuantity(); $i++) {
                        $unit = new UnitInStock();
                        $unit->setSupply($obj)
                                ->setProduct($p->getProduct())
                                ->setProductInSupply($p)
                                ->setIsVirtual($obj->getIsVirtual())
                                ->setSupplier($obj->getSupplier())
                                ->setSeller($obj->getSeller())
                                ->setStock($obj->getStock())
                                ->setIsCouldBeSold(true)
                        ;
                        $this->em->persist($unit);
                    }
                }
            }
            //реальная поставка
            else {
                //если товар в пути, то создаём виртуальные позиции
                if ($obj->getStatus()->getName() == Supply::onTheWayStatusName) {
                    $isVirtual = true;
                } else {
                    $isVirtual = false;
                }

                foreach ($obj->getProducts() as $p) {
                    if ($isVirtual) {
                        //смотрим в базе, если есть такие виртуальные товарные позиции из виртуальных поставок, то  переназначаем их в нашу поставку
                        $virtualUnits = $this->em->getRepository('CoreLogisticsBundle:UnitInStock')
                            ->findVirtualForRealSupply($p->getProduct()->getId(), $p->getQuantity(), $obj->getStock()->getId());
                    }
                    else {
                        if ($obj->getStatus()->getName()==Supply::suppliedStatusName) {
                            //смотрим в базе, если есть такие виртуальные товарные позиции из виртуальных поставок, то  переназначаем их в нашу поставку
                            $virtualUnits = $this->em->getRepository('CoreLogisticsBundle:UnitInStock')
                                ->findVirtualForRealSupply($p->getProduct()->getId(), $p->getQuantity(), $obj->getStock()->getId());
                        }
                        else {
                            //берём все ранее прицепленные виртуальные единицы
                            $virtualUnits = [];
                            foreach ($p->getUnits() as $unit) {
                                $virtualUnits[] = $unit;
                            }
                        }
                    }

                    $allVirtualUnits[$p->getProduct()->getId()] = $virtualUnits;  //собираем все замены виртуальных позиций на реальные
                    //проставляем новые значения для товарных единиц
                    foreach ($virtualUnits as $unit) {
                        $unit->setSupply($obj)
                                ->setProduct($p->getProduct())
                                ->setProductInSupply($p)
                                ->setIsVirtual($isVirtual)
                                ->setSupplier($obj->getSupplier())
                                ->setSeller($obj->getSeller())
                                ->setStock($obj->getStock())
                                ->setIsCouldBeSold(true);

                        $this->em->persist($unit);
                    }
                    //создаём недостающие единицы
                    $need = $p->getQuantity() - count($virtualUnits);
                    for ($i = 1; $i <= $need; $i++) {
                        $unit = new UnitInStock();
                        $unit->setSupply($obj)
                                ->setProduct($p->getProduct())
                                ->setProductInSupply($p)
                                ->setIsVirtual($isVirtual)
                                ->setSupplier($obj->getSupplier())
                                ->setSeller($obj->getSeller())
                                ->setStock($obj->getStock())
                                ->setIsCouldBeSold(true)
                        ;

                        $this->em->persist($unit);
                    }
                }
            }

            $this->logistics_logic->updateProductAvailability($obj->getProducts(), false, $obj->getStock(), $allVirtualUnits); //обновляем наличие
            $obj->setIsProductUnitsWasCreated(true);    //метка, что товарные позиции были созданы
        }
        //
        else if (!$obj->getIsVirtual() && $obj->getIsProductUnitsWasCreated() &&
                !$obj->getIsProductUnitsWasUpdated() && $obj->getStatus()->getName() == Supply::suppliedStatusName) {

            //берём все виртуальные позиции, которые были созданы для реальной поставки со статусом "В пути"
            $allVirtualRealUnitsTemp = $this->em->getRepository('CoreLogisticsBundle:UnitInStock')->findBy(['supply' => $obj->getId(), 'isVirtual' => true]);
            $allVirtualRealUnits = [];
            foreach ($allVirtualRealUnitsTemp as $vUnit) {
                $vUnit->setIsVirtual(false);    //помечаем как реальные позиции, т.к. поставка была осуществлена
                $this->em->persist($vUnit);
                $allVirtualRealUnits[$vUnit->getProduct()->getId()][] = $vUnit;   //сортируем
            }
            $this->logistics_logic->updateProductAvailability($obj->getProducts(), false, $obj->getStock(), $allVirtualRealUnits); //обновляем наличие
        }
    }

    /**
     * Обновляет себестоимость
     * @param type $obj
     */
    public function updateAdditionalCosts($obj) {

        //считаем сколько всего дополнительных расходов
        $additionalCost = 0;
        foreach ($obj->getAdditionalCosts() as $ad) {
            $additionalCost+= $ad->getCost();
        }

        //считаем стоимость поставки
        $totalCost = 0;
        foreach ($obj->getProducts() as $p) {
            $totalCost+=$p->getPriceInGeneralCurrency() * $p->getQuantity();
        }

        if ($additionalCost) {
            $k = $additionalCost / $totalCost;
        } else {
            $k = 0;
        }

        foreach ($obj->getProducts() as $p) {
            $costPriceForOneUnit = $k * $p->getPriceInGeneralCurrency() + $p->getPriceInGeneralCurrency();
            $p->setCostPriceForOneUnit($costPriceForOneUnit);
        }
    }

}
