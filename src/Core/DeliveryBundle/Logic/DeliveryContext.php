<?php

/**
 * Класс обертка-фабрика для доставок
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
/*
 * На WMD есть кроновский скрипт,
 * который бегает по трекинг-номерам,
 * и если посылка на складе транспортной компании,
 * то отправляет оповещение клиенту,
 * что нужно забирать. А, если клиент забрал, то закрывает автоматически заказ
 */
namespace Core\DeliveryBundle\Logic;

use Doctrine\ORM\EntityManagerInterface;
use Core\ProductBundle\Entity\CompositeProduct;
use Core\ProductBundle\Entity\Product;
use Core\OrderBundle\Logic\OrderLogic;
use Symfony\Component\HttpFoundation\Session\Session;
use Core\OrderBundle\Logic\OrderMailerLogic;

class DeliveryContext
{
    
    /**
     * Email компании
     * @var type 
     */
    protected $companyEmail;
    
    /**
     * Траспортная компания (класс)
     * @var object
     */
    protected  $company;

    /**
     * Массив сервисов траспортных компаний
     * ключи совпадают с системными именами тк в бд
     * @var array
     */
    protected $services;

    /**
     * Опции необходимые для расчетов
     * а так же для установки транспортной компании
     * @var array
     */
    protected $configs;

    /**
     *
     * @var Doctrine\ORM\EntityManagerInterface
     */
    protected $em;
    
    /**
     *
     * @var Core\OrderBundle\Logic\OrderLogic
     */
    protected $orderLogic;

    /**
     * Корневая директория
     * @var string
     */
    protected $rootDir;

    protected $session;

    protected $orderMailerlogic;

    public function __construct(Session $session, EntityManagerInterface $em, OrderLogic $orderLogic, $companyEmail, $rootDir, OrderMailerLogic $orderMailerlogic)
    {
        $this->companyEmail = $companyEmail;
        $this->orderLogic = $orderLogic;
        $this->em = $em;
        $this->rootDir = $rootDir;
        $this->session = $session;
        $this->orderMailerlogic = $orderMailerlogic;
    }

    /**
     * Для трекинга посылок EMS необходимо использовать postRu
     * @param type $services
     * @return \Core\DeliveryBundle\Logic\DeliveryContext
     */
    public function create($services) {
        $this->services = $services;
        return $this;
    }

    /**
     *
     * @param boolean $extraData возвращать с допополнительными данными
     * @param boolean $fullResult вовращать все данные
     * @return array
     */
    public function calculate($extraData = false, $fullResult = true, $orderInfo = null, $getExistResult = false)
    {
        $result = array();
        $options = array(
            'internalCode'      => (isset($this->configs['internalCode'])) ? $this->configs['internalCode'] : $this->configs['deliveryMethod']->getInternalCode(),
            'cashOndelivery'    => $this->configs['deliveryMethod']->getIsCashOnDelivery(),
            'deliveryFrom'      => $this->configs['deliveryMethod']->getDeliveryFrom(),
            'deliveryTo'        => $this->configs['deliveryMethod']->getDeliveryTo(),
            'date'              => isset($this->configs['date']) ? $this->configs['date'] : date('Y-m-d'),
        );
        $getCityId = 'get'. ucfirst($this->configs['deliveryMethod']->getCompany()->getName()). 'Id';
        $this->configs['getCityId'] = $getCityId;

        if ($orderInfo) {
            $seller = $this->em->getRepository('CoreLogisticsBundle:Seller')->findOneBy(array('isDefault' => true));
            $store = $this->em->getRepository('CoreLogisticsBundle:Stock')->findWithCity();
            $buyer = (isset($orderInfo['order']) && $orderInfo['order']->getContragent()) ? $orderInfo['order']->getContragent() : null;
            list($cart, $order) = $this->makeCart(null, array(), $orderInfo);
        } else {
            // продавец для доступов
            $seller = $this->em->getRepository('CoreLogisticsBundle:Seller')->find((int)$this->configs['sellerId']);
            // склад для города отправки
            $store = $this->em->getRepository('CoreLogisticsBundle:Stock')->findWithCity($this->configs['storeId']);
            // покупатель для города доставки
            $buyer = $this->em->getRepository('ApplicationSonataUserBundle:CommonContragent')->find($this->configs['contragentId']);
            $orderId = (isset($this->configs['orderId'])) ? (int)$this->configs['orderId'] : null;
            $this->configs['cart'] = ($orderId == null) ? $this->configs['cart'] : array();
            list($cart, $order) = $this->makeCart($orderId, $this->configs['cart']);
        }
        
        $this->configs['seller'] = $seller;
        $options['auth'] = $this->getCredentials($this->configs['deliveryMethod'], $seller);

        $options['from']['cityName'] = $store->getCity()->getName();
        if (method_exists($store->getCity(), $getCityId) && $store->getCity()->$getCityId()) {
            $options['from']['cityId'] = $store->getCity()->$getCityId();
        }
        
        $this->configs['contragent'] = $buyer;
        
        $deliveryCity = $this->em->getRepository('CoreDirectoryBundle:City')->find((int)$this->configs['deliveryCityId']);
        $this->configs['deliveryCity'] = $deliveryCity;
        $options['to']['cityName'] = $deliveryCity->getName();

        if ($fullResult) {
            if (method_exists($deliveryCity, $getCityId) && $deliveryCity->$getCityId()) {
                $options['to']['cityId'] = $deliveryCity->$getCityId();
            }
            $options['order']['package'] = $cart;
            $options['order']['total'] = $this->getTotalCart($options['order']['package']);
            //ldd($options['order']['total']);
            $cartIsFull = count(array_filter($options['order']['total']));

            if ($cartIsFull) {
                if ($getExistResult) {
                    // берем данные о доставки из сессии
                    $fromSession = ($this->session->get('deliveryCalc')) ? $this->session->get('deliveryCalc') : [];
                    $orderVolume = ($this->session->get('orderVolume')) ? $this->session->get('OrderVolume') : [];

                    $sesDeliveryMethodId = 'id_' . $this->configs['deliveryMethod']->getId();
                    $sesCityId = 'city_' . $deliveryCity->getId();
                    $sesVolume = 'vol_'. $options['order']['total']['volume'];
                    $orderVolume[$sesVolume] = 'vol_'. $options['order']['total']['volume'];
                    $this->session->set('orderVolume', $orderVolume);

                    if (isset($fromSession[$sesDeliveryMethodId][$sesVolume][$sesCityId])) {
                        $result['result'] = $fromSession[$sesDeliveryMethodId][$sesVolume][$sesCityId];
                    } else {
                        $result['result'] = $this->company->calculate($options);
                        if (isset($result['result']['cost']) && $result['result']['cost']) {
                            $toSession[$sesDeliveryMethodId][$sesVolume][$sesCityId] =  $result['result'];
                            $this->session->set('deliveryCalc', array_merge_recursive($fromSession, $toSession));
                        }
                    }
                } else {
                    // обычный подсчет
                    $result['result'] = $this->company->calculate($options);
                }
            } else {
                $result['result'] =  array(
                    'errors' => true,
                    'msg' => 'Не найдено ни одного товара для отгрузки'
                );
            }
            
        }
        if ($extraData) {
            $result['extraData'] = array(
                                'deliveryMethod'    => $this->configs['deliveryMethod'],
                                'seller'            => $seller,
                                'contragent'        => $buyer,
                                'deliveryCity'      => $deliveryCity,
                                'departureCity'     => $store->getCity(),
                                'store'             => $store
                            );
        }
        return $result;
        
    }

    /**
     * Заносим новые города к нам в БД (update пока неподдерживается)
     * @return int
     * @todo Возможно потребуется оптимизация работы памяти
     * @throws \Exception
     * @throws \Core\DeliveryBundle\Logic\Exception
     */
    public function getCities()
    {
        $options = array();
        $cities = array();
        $compareCities = array();
        $this->em->getConnection()->getConfiguration()->setSQLLogger(null);
        $seller = $this->em->getRepository('CoreLogisticsBundle:Seller')->findOneBy(['isDefault' => true]);
        if (!$seller) {
            throw new \Exception('Default Seller Not Found');
        }
        $count = 0;
        $cityRepo = $this->em->getRepository('CoreDirectoryBundle:City');
        foreach ($this->services as $key => $company) {
            $options['auth'] = $this->getCredentials($key, $seller);
            $cities = $company->getCities($options);
            if (!is_array($cities)) {
                continue;
            }
            foreach ($cities as $city) {
                $getter = 'get' . $key . 'Id';
                $setter = 'set' . $key . 'Id';
                $dbCities = $cityRepo->findWithRegion($city['cityName']);
                $sameCitiesCount = count($dbCities);
                
                if ($sameCitiesCount > 1 && isset($city['regionName'])) {
                    foreach($dbCities as $dbCityPos => $curCity) {
                        $ourRegion = explode(' ', $curCity->getRegion()->getName());
                        $theirRegion = explode(' ', trim($city['regionName']));
                        if (method_exists($curCity, $getter) && !$curCity->$getter() && ($ourRegion[0] == $theirRegion[0])) {
                            $count++;
                            $this->updateCity($curCity, $setter , $city['cityId']);
                        } else {
                            $this->em->detach($dbCities[$dbCityPos]);
                        }
                        $dbCities[$dbCityPos] = null;
                    }
                } elseif ($sameCitiesCount == 1) {
                    $curCity = $dbCities[0];
                    if (method_exists($curCity, $getter) && !$curCity->$getter()) {
                        $this->em->getConnection()->beginTransaction();
                        $count++;
                        $this->updateCity($curCity, $setter , $city['cityId']);
                    }
                    $dbCities = null;
                } else {
                    foreach ($dbCities as $dbCityPos => $curCity) {
                        $this->em->detach($dbCities[$dbCityPos]);
                    }
                }
                $dbCities = null;
            }
            
            //$this->em->clear();
            $cities = null;
        }

        return $count;
    }
    
    /**
     * Список терминалов выдачи товара
     * @return type
     */
    public function getAffiliates()
    {

        $seller = ($this->configs['seller']) ? $this->configs['seller'] : $this->configs['seller'];
        $options['auth'] = $this->getCredentials($this->configs['deliveryMethod'], $seller);
        $result = $this->company->getAffiliates($options);
        return $result;
    }

    /**
     * Создание заказа (генерация накладной)
     */
    public function createOrder($request)
    {
        $departureCity = $this->em->getRepository('CoreDirectoryBundle:City')->find((int)$request['departureCity']);
        $getCityId = $this->configs['getCityId'];
        $options = array();
        $options['internalCode'] = $request['service'];
        $options['extraServices'] = (isset($request['extraServices'])) ? $request['extraServices'] : array();
        // данны отправителя
        if ($this->configs['company'] == 'cdek') {
            $options['from']['addressDetails']['flat'] = $request['sellerPlacement'];
        } else {
            $options['from']['addressDetails'][$request['sellerPlacementType']] = $request['sellerPlacement'];
        }
        $options['from']['email'] = $this->companyEmail;
        $options['from']['cityName'] = $departureCity->getName();
        $options['from']['cityId'] = $departureCity->$getCityId();
        $options['from']['terminalCode'] = (isset($request['terminalFrom'])) ? $request['terminalFrom'] : null;
        $options['from']['contactFio'] = $this->configs['seller']->getNameOfTheHead();
        $options['from']['name'] = $this->configs['seller']->getCaption();
        $options['from']['contactPhone'] = $this->configs['seller']->getPhone();
        $options['from']['addressDetails']['street'] = $request['sellerStreet'];
        $options['from']['addressDetails']['house'] = $request['sellerHouse'];
        $options['from']['addressDetails']['streetAbbr'] = $request['sellerStreetAbbr'];
        $options['from']['isTerminal'] = $request['deliveryFrom'];
        
        // данные получателя
        if ($this->configs['company'] == 'cdek') {
            $options['to']['addressDetails']['flat'] = $request['placement'];
        } else {
            $options['to']['addressDetails'][$request['placementType']] = $request['placement'];
        }
        $options['to']['cityId'] = $request['deliveryCity'];
        $options['to']['cityName'] = $this->configs['deliveryCity']->getName();
        $options['to']['terminalCode'] = $request['terminalTo'];
        $options['to']['contactFio'] = (isset($request['recipientCompany']) && $request['recipientCompany']) ? $request['recipientCompany'] : $request['recipientFio'];
        $options['to']['name'] = (isset($request['recipientCompany']) && $request['recipientCompany']) ? $request['recipientCompany'] : $request['recipientFio'];
        $options['to']['contactPhone'] = $request['recipientPhone'];
        $options['to']['email'] = (isset($request['recipientEmail']) && $request['recipientEmail']) ? $request['recipientEmail'] : null;
        $options['to']['addressDetails']['street'] = $request['street'];
        $options['to']['addressDetails']['house'] = $request['house'];
        $options['to']['addressDetails']['streetAbbr'] = $request['streetAbbr'];
        $options['to']['isTerminal'] = $request['deliveryTo'];
        $options['date'] = isset($request['date']) ? $request['date'] : date('Y-m-d');
        list($cart, $order) = $this->makeCart((int)$request['orderId']);
        $options['order']['package'] = $cart;
        $options['auth'] = $this->getCredentials($this->configs['deliveryMethod'], $this->configs['seller']);
        $options['isDeliveryIncludedInPayment'] = ($order->getIsDeliveryIncludedInPayment()) ? 0 : $order->getdeliveryPrice();
        $options['cashOndelivery'] = $this->configs['deliveryMethod']->getIsCashOnDelivery();
        $options['order']['total'] = $this->getTotalCart($options['order']['package']);
        $options['order']['total']['costly'] = (isset($request['costly'])) ? $request['costly'] : null;
        $options['order']['total']['description'] = (isset($request['packageDescription'])) ? $request['packageDescription'] : null;

        // для формирования накладной используется кол-во коробок указаных в админке
        $options['order']['total']['id'] = $request['orderId'];
        $options['order']['total']['package'] = count($request['sizesOfBox']);
        $options['order']['total']['volume'] = 0;
        $options['order']['total']['weight'] = 0;
        foreach($request['sizesOfBox'] as $box) {
            $options['order']['total']['volume'] += ($box->getWidth() / 1000) * ($box->getLength() / 1000) * ($box->getHeight() / 1000);
            $options['order']['total']['weight'] += ($box->getIsWeightInKg()) ? $box->getWeight() : $box->getWeight() / 1000;
        }
        $result = $this->company->createOrder($options);

        return $result;
    }

    /**
     * Отмена заказа
     * @return array
     */
    public function cancelOrder()
    {
        $options = array();
        // продавец для доступов
        $seller = $this->em->getRepository('CoreLogisticsBundle:Seller')->find((int)$this->configs['sellerId']);
        $options['auth'] = $this->getCredentials($this->configs['deliveryMethod'], $seller);
        $options['order']['trackNums'][] = $this->configs['waybillId'];
        $options['order']['total']['id'] = $this->configs['orderId'];
        $options['date'] = isset($this->configs['date']) ? $this->configs['date'] : null;
        $options['sellers'][0]['auth'] = $this->getCredentials($this->configs['deliveryMethod'], $seller);
        
        $result = $this->company->cancelOrder($options);
        
        return $result;
    }

    /**
     * Генерация накладной
     * @return type
     */
    public function getInvoice()
    {
        $options = array();
        // продавец для доступов
        $seller = $this->em->getRepository('CoreLogisticsBundle:Seller')->find((int)$this->configs['sellerId']);
        $options['auth'] = $this->getCredentials($this->configs['deliveryMethod'], $seller);
        $options['order']['trackNums'][] = $this->configs['waybillId'];
        $options['order']['total']['id'] = $this->configs['orderId'];
        $options['company'] = strtolower($this->configs['deliveryMethod']->getCompany()->getName());
        
        $result = $this->company->getInvoice($options);

        return $result;
    }
    
    /**
     * Отслеживание статуса посылки
     */
    public function trackPackage()
    {
        $counter = 0;
        $orderState = $this->em->getRepository('CoreOrderBundle:ExtraStatus')->findOneBy(['name' => 'executed']);
        $waybills = $this->em->getRepository('CoreOrderBundle:Waybills')->findForTracking();
        $orders = [];
        $this->em->clear();
        $options = [];
        foreach($waybills as $waybill) {
            $curOrder = $waybill->getOrder();
            if (isset($orders[$curOrder->getId()]['count'])) {
                $orders[$curOrder->getId()]['count']++;
            } else {
                $orders[$curOrder->getId()]['order'] = $curOrder;
                $orders[$curOrder->getId()]['count'] = 1;
                /*
                $orders[$curOrder->getId()]['email'][$curOrder->getContragent()->getUser()->getEmail()] = get_class($curOrder->getContragent()->getUser());
                $orders[$curOrder->getId()]['email'][$curOrder->getContragent()->getContactEmail()] = get_class($curOrder->getContragent());
                $orders[$curOrder->getId()]['email'][$curOrder->getRecipientEmail()] = get_class($curOrder);
                 * 
                 */
            }
            $seller = $waybill->getSalesMan();
            $deliveryCompany = $waybill->getDeliveryMode()->getCompany();
            $companyName = ($deliveryCompany->getName() == 'ems') ? 'post_ru' : $deliveryCompany->getName();
            $getCityId = 'get'. ucfirst($companyName). 'Id';
            if (method_exists($waybill->getDeliveryCity(), $getCityId)) {
                $cityId = $waybill->getDeliveryCity()->$getCityId();
            } else {
                $cityId = null;
            }
            $options[$seller->getId()][$companyName]['auth'] = $this->getCredentials($companyName, $seller);
            $options[$seller->getId()][$companyName]['trackNums'][$waybill->getNumber()]['id'] = $waybill->getNumber();
            $options[$seller->getId()][$companyName]['trackNums'][$waybill->getNumber()]['waybill'] = $waybill;
            $options[$seller->getId()][$companyName]['trackNums'][$waybill->getNumber()]['cityId'] = $cityId;
            $options[$seller->getId()][$companyName]['trackNums'][$waybill->getNumber()]['cityName'] = $waybill->getDeliveryCity()->getName();
            $options[$seller->getId()][$companyName]['trackNums'][$waybill->getNumber()]['date'] = $waybill->getDateTime()->getTimestamp();
        }
        //ld($orders);
        foreach ($options as $option) {
            foreach($option as $company => $val) {
                $result = $this->services[$company]->trackPackage($val);
                $counter += count($result);
                $resultTotal = count($result);
                foreach($val['trackNums'] as $waybillNum => $waybill) {
                    //сохраняем накладные у нас
                    //ldd($waybill['waybill']);
                    if ($waybill['waybill']->getIsAutoGenerated()) {
                        $this->saveWaybill($waybill['waybill'], $val['auth'], $company);
                    }
                    // обновляем статут посылки
                    if ($resultTotal && isset($result[$waybillNum])) {
                        $status = $result[$waybillNum];
                        $waybill['waybill']->updateStatus($status);
                        $this->em->merge($waybill['waybill']);
                        
                        if (isset($orders[$waybill['waybill']->getOrder()->getId()]) && $status == 'isDone') {
                            $orders[$waybill['waybill']->getOrder()->getId()]['count']--;
                            if ($orders[$waybill['waybill']->getOrder()->getId()]['count'] === 0) {
                                $orders[$waybill['waybill']->getOrder()->getId()]['order']
                                        ->setExtraStatus($orderState)
                                        ->setExecutedDateTime(new \DateTime("now"))
                                ;
                                $this->em->merge($orders[$waybill['waybill']->getOrder()->getId()]['order']);
                            }
                        }
                        //ldd($orders[$waybill['waybill']->getOrder()->getId()]['order']->getExtraStatus()->getName());
                        /*
                        foreach ($orders as $row) {
                            if ($row['count'] === 0) {
                                $curOrder = $row['order'];
                                foreach ($row['email'] as $val) {
                                    $this->orderMailerlogic->sendOnMainStatusDone($curOrder, 'order-message-done-status', $val);
                                }
                            }
                        }*/
                        //die('dfdf');
                        // начинаем транзакцию
                        $this->em->getConnection()->beginTransaction();
                        try {
                            $this->em->flush();
                            $this->em->getConnection()->commit();
                        } catch (\Exception $e) {
                            $this->em->getConnection()->rollback();
                            $this->em->close();
                            throw $e;
                        }
                    }
                }
                
                // старая логика
                /*
                // обновляем статут посылки
                if (count($result)) {
                    foreach ($result as $key => $status) {
                        $val['trackNums'][$key]['waybill']->updateStatus($status);
                        $this->em->merge($val['trackNums'][$key]['waybill']);
                        // начинаем транзакцию
                        $this->em->getConnection()->beginTransaction();
                        try {
                            $this->em->flush();
                            $this->em->getConnection()->commit();
                        } catch (\Exception $e) {
                            $this->em->getConnection()->rollback();
                            $this->em->close();
                            throw $e;
                        }
                        //$this->em->merge($val['trackNums'][$key]['waybill']);
                        //$this->em->flush();
                    }
                }*/
            }
        }
        
        return $counter;
    }

    public function configurate($configs, $operation = null)
    {
        $this->configs = $configs;
        $searchField = (isset($this->configs['deliveryMethodId']) ? (int)$this->configs['deliveryMethodId'] : $this->configs['deliveryMethodName']);
        $deliveryMethod = $this->em->getRepository('CoreDeliveryBundle:Service')->findWithCompany($searchField);
        if (!$deliveryMethod) {
            throw new \Exception('Delivery Method Not Found');
        }
        $this->configs['deliveryMethod'] = $deliveryMethod;
        $company = strtolower($deliveryMethod->getCompany()->getName());
        $this->configs['company'] = $company;
        
        $this->company = $this->services[$company];
        
        return $this;
    }

    /**
     * Преобразование состава заказа к нужному формату
     * @param int $orderId - номер заказа
     * @param array $product - массив id продуктов в заказе
     * @return array 
     */
    private function makeCart($orderId = null, $products = array(), $orderInfo = null)
    {
        $order = null;
        $cart = array();
        if ($orderId) {
            $order = $this->em->getRepository('CoreOrderBundle:Order')->findWithCompAndBook($orderId);
            $costInfo = $this->orderLogic->computeOrderCostInfo($order);
            foreach ($order->getCompositions() as $key => $composition) {
                if (count($composition->getBooking())) {
                    $product = $composition->getProduct();
                    $productId = $product->getId();
                    if (($product instanceof CompositeProduct && $product->getIsPhysical()) || $product instanceof Product) {
                        $cost = $costInfo['composition'][$composition->getProduct()->getId()]['cost'];
                        $cart[$productId]['quantity'] = 0;
                        foreach ($composition->getBooking() as $book) {
                            $cart[$productId]['quantity'] += $book->getQuantity();
                        }
                        $cart[$productId]['id'] = $product->getId();
                        $cart[$productId]['price'] = $cost / $cart[$productId]['quantity'];
                        $cart[$productId]['weight'] = ($product->getIsGrossWeightInGm()) ? ($product->getGrossWeight() * 1) / 1000 : ($product->getGrossWeight() * 1);
                        $cart[$productId]['length'] = $product->getLengthOfBox() / 1000;
                        $cart[$productId]['width'] = $product->getWidthOfBox() / 1000;
                        $cart[$productId]['height'] = $product->getHeightOfBox() / 1000;
                        $cart[$productId]['title'] = $product->getCaptionRu();
                        $cart[$productId]['wareKey'] = $product->getArticle();
                        $cart[$productId]['volume'] = ($product->getLengthOfBox() / 1000) * ($product->getWidthOfBox() / 1000) * ($product->getHeightOfBox() / 1000);
                    }
                }
            }
        } elseif (count($products)) {
            // старая логика
            // берет данные из поста
            // может потребоваться на фронтэнде
            $ids = array();
            foreach($products as $item) {
                $ids[] = $item['id'];
            }
            $goods = $this->em->getRepository('CoreProductBundle:CommonProduct')->findBy(array('id' => $ids));
            $items = array();
            foreach ($goods as $good) {
                if (($good instanceof CompositeProduct && $good->getIsPhysical()) || $good instanceof Product) {
                    $items[$good->getId()] = $good;
                }
            }
            foreach($products as $item) {
                 if(isset($items[$item['id']]) && ($items[$item['id']] instanceof CompositeProduct && $items[$item['id']]->getIsPhysical()) || $items[$item['id']] instanceof Product) {
                    $good = $items[$item['id']];
                    $cart[$item['id']]['id'] = $good->getId();
                    //$cart[$item['id']]['weight'] = ($item->getIsGrossWeightInGm()) ? $item->getGrossWeight() / 1000 : $item->getGrossWeight();
                    $cart[$item['id']]['weight'] = ($good->getIsGrossWeightInGm()) ? ($good->getGrossWeight() * 1) / 1000 : ($good->getGrossWeight() * 1);
                    $cart[$item['id']]['length'] = $good->getLengthOfBox() / 1000;
                    $cart[$item['id']]['width'] = $good->getWidthOfBox() / 1000;
                    $cart[$item['id']]['height'] = $good->getHeightOfBox() / 1000;
                    $cart[$item['id']]['price'] = $good->getPrice();
                    $cart[$item['id']]['wareKey'] = $good->getArticle();
                    $cart[$item['id']]['title'] = $good->getCaptionRu();
                    $cart[$item['id']]['volume'] = $cart[$item['id']]['length'] * $cart[$item['id']]['height'] * $cart[$item['id']]['width'];
                    $cart[$item['id']]['quantity'] = $item['quantity'];
                }
            }
        } elseif ($orderInfo) {
            foreach($orderInfo['products'] as $good) {
                if (($good instanceof CompositeProduct && $good->getIsPhysical()) || $good instanceof Product) {
                    $cart[$good->getId()]['id'] = $good->getId();
                    //$cart[$good->getId()]['weight'] = ($good->getIsGrossWeightInGm()) ? $good->getGrossWeight() / 1000 : $good->getGrossWeight();
                    $cart[$good->getId()]['weight'] = ($good->getIsGrossWeightInGm()) ? ($good->getGrossWeight() * 1) / 1000 : ($good->getGrossWeight() * 1);
                    $cart[$good->getId()]['length'] = $good->getLengthOfBox() / 1000;
                    $cart[$good->getId()]['width'] = $good->getWidthOfBox() / 1000;
                    $cart[$good->getId()]['height'] = $good->getHeightOfBox() / 1000;
                    $cart[$good->getId()]['price'] = $orderInfo['cart'][$good->getId()]['cost'];
                    $cart[$good->getId()]['wareKey'] = $good->getArticle();
                    $cart[$good->getId()]['title'] = $good->getCaptionRu();
                    $cart[$good->getId()]['volume'] = $cart[$good->getId()]['length'] * $cart[$good->getId()]['height'] * $cart[$good->getId()]['width'];
                    $cart[$good->getId()]['quantity'] = $orderInfo['cart'][$good->getId()]['quantity'];
                }
            }
        } else {
            throw new \Exception('Ошибка состава заказа');
        }
        //ldd($cart);
        return array($cart , $order);
    }
    
    /**
     * Получить все позиции товара из заказа
     * @param type $ids
     * @param type $items
     * @return array
     */
    private function getProducts($ids, &$items)
    {
        $goods = $this->em->getRepository('CoreProductBundle:CommonProduct')->findBy(array('id' => $ids));
        $compositeIds = array();
        foreach($goods as $good) {
            if ($good instanceof CompositeProduct) {
                $compositeIds[$good->getId()] = $good->getId();
            } elseif ($good instanceof Product) {
                $items[$good->getId()] = $good;
            }
        }
        // получение состава композитного продукта
        if (count($compositeIds)) {
            $goods = $this->em->getRepository('CoreProductBundle:CommonProduct')->findBy(array('id' => $ids));
            $this->getProducts($compositeIds, $items);
        } else {
            return $items;
        }
    }

    /**
     * Получить доступы продавцов к ТК
     * @param object $deliveryMethod - способ доставки
     * @param object $seller
     * @return array
     */
    private function getCredentials($deliveryMethod, $seller)
    {
        $auth = array();
        if (is_object($deliveryMethod)) {
            $company = strtolower($deliveryMethod->getCompany()->getName());
        } else {
            $company = strtolower($deliveryMethod);
        }
        
        switch ($company) {
            case 'dellin':
                $auth['client'] = $seller->getDellineLogin();
                $auth['clientKey'] = $seller->getDellinePassword();
                break;
            case 'cdek':
                $auth['client'] = $seller->getCdekAccount();
                $auth['clientKey'] = $seller->getCdekPassword();
                break;
            case 'dpd':
                $auth['client'] = $seller->getDpdAccount();
                $auth['clientKey'] = $seller->getDpdPassword();
                break;
            case 'pek':
                $auth['client'] = $seller->getPekLogin();
                $auth['clientKey'] = $seller->getPekPassword();
                break;
            case 'post_ru':
                $auth['client'] = $seller->getPostRuLogin();
                $auth['clientKey'] = $seller->getPostRuPassword();
                break;
        }
        return $auth;
    }

    /**
     * Получить полный состав заказа
     * @param array $cart
     * @return array
     */
    private function getTotalCart($cart)
    {
        $result = array(
            'volume' => 0,
            'weight' => 0,
            'price' => 0,
        );
        
        foreach ($cart as $item) {
            $result['volume'] += $item['volume'] * $item['quantity'];
            $result['weight'] += $item['weight'] * $item['quantity'];
            $result['price'] += $item['price'] * $item['quantity'];
        }
        return $result;
    }

    /**
     * Добавляем id транспортной компании
     * @param object $city
     * @param string $method
     * @param int $id
     */
    private function updateCity($city, $method , $id)
    {
        // начинаем транзакцию
        $this->em->getConnection()->beginTransaction();
        $city->$method($id);
        try {
            $this->em->flush();
            $this->em->getConnection()->commit();
            $this->em->detach($city);
        } catch (\Exception $e) {
            echo 'here';
            $this->em->getConnection()->rollback();
            $this->em->close();
            throw $e;
        }
    }
    
    /**
     * Сохраняем накладные к нам на сервер
     * @param type $waybill - наклданая
     * @param type $auth - параметры для авторизации
     * @param type $companyName - название компании (оно же ключ в массиве ТК)
     * @throws \Exception
     */
    private function saveWaybill($waybill, $auth, $companyName)
    {
        $options = array(
                'auth' => $auth,
                'company' => $companyName,
                'order' => array(
                    'trackNums' => [$waybill->getNumber()],
                    'total'=> ['id' => $waybill->getOrder()->getId()]
                )
            );

        $result = $this->services[$companyName]->getInvoice($options);

        if (isset($result['body']['rawData'])) {
            $fileName = 'waybill_' . $waybill->getOrder()->getId() . '_' . $waybill->getNumber() . '.pdf';
            $res = $this->rootDir . '/../web/uploads/waybills/';
            $filePath = $res . $fileName;

            if (file_put_contents($filePath, $result['body']['rawData']) === FALSE) {
                throw new \Exception('Не возможно сохранить файл накладной');
            }
        } 
    }
}