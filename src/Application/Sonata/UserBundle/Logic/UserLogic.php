<?php

/**
 * Бизнесс логика для пользователей
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Logic;

use Doctrine\Common\Collections\ArrayCollection;
use Application\Sonata\UserBundle\Entity\UserLog;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserLogic {

    public $em;
    private $container;

    public function __construct($em, $container) {
        $this->em = $em;
        $this->container = $container;
    }

    /**
     * Возвращает стоимость всех заказов и дополнительную информацию для заданного контрагента
     * @param type $contragent_id
     * @return type
     */
    public function getContragentOrdersInfo($contragent_id) {

        $res = [];
        $cost = 0;
        $checked = ['count' => 0, 'cost' => 0];
        $paid = ['count' => 0, 'cost' => 0];
        $shipped = ['count' => 0, 'cost' => 0];
        $canceled = ['count' => 0, 'cost' => 0];

        $contragent = $this->em->getRepository('ApplicationSonataUserBundle:CommonContragent')->getContragentOrdersInfo($contragent_id);
        if ($contragent->getOrders()->count()) {
            foreach ($contragent->getOrders() as $order) {
                if ($order->getIsCheckedStatus()) {
                    $checked['count'] ++;
                    $checked['cost']+=$order->getCost();
                }

                if ($order->getIsPaidStatus()) {
                    $paid['count'] ++;
                    $paid['cost']+=$order->getCost();
                }

                if ($order->getIsShippedStatus()) {
                    $shipped['count'] ++;
                    $shipped['cost']+=$order->getCost();
                }

                if ($order->getIsCanceledStatus()) {
                    $canceled['count'] ++;
                    $canceled['cost']+=$order->getCost();
                }
                $cost+=$order->getCost();
            }
        }

        $res['cost'] = $cost;
        $res['checked'] = $checked;
        $res['paid'] = $paid;
        $res['shipped'] = $shipped;
        $res['canceled'] = $canceled;

        return $res;
    }

    /**
     * Получение списка контрагентов пользователя
     *
     * @return type
     * @author Sergeev A.M.
     */
    public function getUserContragents($user) {
        $response = array();

        if (method_exists($user, 'getContragents')) {

            if (false === $user->getContragents()->isInitialized()) {
                $user->getContragents()->initialize();
            }

            if ($user->getContragents()->count() === 0) {
                // Если вдруг контрагентов нет то в JS делаем перенаправление на добавление
                $response['data']['url'] = $this->container->get('router')->generate('application_sonata_user_contragent_create');
            } elseif ($user->getContragents()->count() > 1) {
                $response['data']['html'] = $this->container->get('templating')->render('ApplicationSonataUserBundle:Contragent:list_in_header.html.twig', array(
                    'contragents' => $user->getContragents(),
                ));
            }
        }

        return $response;
    }

    /**
     * Смена котрагента
     *
     * @return type
     * @author Sergeev A.M.
     */
    public function changeContragent($request) {
        if ($request->getMethod() === 'POST') {
            $contragent = null;
            $id = (int) $request->request->get('contragentId');
            $user = $this->container->get('security.context')->getToken()->getUser();
            $user->getContragents()->initialize();
            foreach ($user->getContragents() as $obj) {
                if ($id === $obj->getId()) {
                    $contragent = $obj;
                }
                $ids[] = $obj->getId();
            }

            if (in_array($id, $ids)) {
                $this->container->get('session')->set('current_contragent_id', $id);
                $this->container->get('session')->set('current_contragent_namespace', get_class($contragent));
                $this->container->get('core_product_logic')->updateCart($request);
            } else {
                $this->container->get('session')->remove('current_contragent_id');
                $this->container->get('session')->remove('current_contragent_namespace');
            }

            // Удаляем сессию контакного лица
            $this->container->get('session')->remove('current_contact_id');
        } else {
            throw new NotFoundHttpException('Method must be a POST!');
        }
    }

    /**
     * Вывод избранных товаров в личном кабинете
     *
     * @return type
     * @author Sergeev A.M.
     */
    public function productsFavorite($page) {
        $em = $this->container->get('doctrine')->getManager();
        $productLogic = $this->container->get('core_product_logic');

        $redirectURL = $productLogic->getRedirectUrlIfPageEqualOne('application_sonata_user_profile_products_favorites_first_page');

        $user = $this->container->get('security.context')->getToken()->getUser();
        $locale = $this->container->get('request')->getLocale();
        $sort = $this->container->get('request')->query->get('sort');
        $favoriteProductsQueryBuilder = $em->getRepository('CoreProductBundle:CommonProduct')->getUserProducts($user, null, 'favorite', $sort, $locale, false, null);
        $favoriteProductsIds = $em->getRepository('CoreProductBundle:CommonProduct')->getFavoriteProductsIds($user);

        list($show, $default, $limit) = $productLogic->getTheRightCountForDisplay();
        $products = $this->container->get('application_knp_paginator_logic')->paginate($favoriteProductsQueryBuilder, $page, $show);
        $products->setUsedRoute('application_sonata_user_profile_products_favorites');

        if ($redirectURL) {
            $result = [
                'action' => 'redirect',
                'url' => $redirectURL,
            ];
        } else {
            $result = [
                'action' => 'render',
                'products' => $products,
                'favoriteProductsIds' => $favoriteProductsIds,
                'showLimit' => $limit,
            ];
        }

        return $result;
    }

    /**
     * Вывод истории просмотренных товаров в личном кабинете
     *
     * @return type
     * @author Sergeev A.M.
     */
    public function productsHistory($page) {
        $productLogic = $this->container->get('core_product_logic');

        $redirectURL = $productLogic->getRedirectUrlIfPageEqualOne('application_sonata_user_profile_products_history_first_page');

        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->container->get('doctrine')->getManager();
        $locale = $this->container->get('request')->getLocale();
        $sort = $this->container->get('request')->query->get('sort');

        $productsQueryBuilder = $em->getRepository('CoreProductBundle:CommonProduct')->getUserProducts($user, null, 'history', $sort, $locale, false, null);
        $favoriteProductsIds = $em->getRepository('CoreProductBundle:CommonProduct')->getFavoriteProductsIds($user);

        list($show, $default, $limit) = $productLogic->getTheRightCountForDisplay();
        $products = $this->container->get('application_knp_paginator_logic')->paginate($productsQueryBuilder, $page, $show);
        $products->setUsedRoute('application_sonata_user_profile_products_history');

        if ($redirectURL) {
            $result = [
                'action' => 'redirect',
                'url' => $redirectURL,
            ];
        } else {
            $result = [
                'action' => 'render',
                'products' => $products,
                'favoriteProductsIds' => $favoriteProductsIds,
                'showLimit' => $limit,
            ];
        }

        return $result;
    }

    /**
     * Вывод заказов в личном кабинете
     *
     * @return type
     * @author Sergeev A.M.
     */
    public function ordersHistoryList($page) {
        if ($this->container->get('request')->get('page') === '1' && $this->container->get('request')->attributes->get('_route') !== 'application_sonata_user_profile_orders_history_list_first_page') {
            $parameters = array_merge(
                    $this->container->get('request')->attributes->get('_route_params'), $this->container->get('request')->query->all(), array('page' => null)
            );
            $redirectURL = $this->container->get('router')->generate('application_sonata_user_profile_orders_history_list_first_page', $parameters);
        }

        $contragentId = $this->container->get('session')->get('current_contragent_id');
        $ordersQueryBuilder = $this->container->get('doctrine')->getManager()->getRepository('CoreOrderBundle:Order')->findUserOrders(['contragentId' => (int) $contragentId, 'execute' => false, 'isShowOnFontend' => true]);

        $orders = $this->container->get('application_knp_paginator_logic')->paginate($ordersQueryBuilder, $page, 3);
        $orders->setUsedRoute('application_sonata_user_profile_orders_history_list');

        $ordersHelpData = $this->container->get('core_order_logic')->getOrdersHelpDataForOrderListInProfile($orders);

        if (isset($redirectURL)) {
            $result = [
                'action' => 'redirect',
                'url' => $redirectURL,
            ];
        } else {
            $result = [
                'action' => 'render',
                'orders' => $orders,
                'ordersHelpData' => $ordersHelpData,
            ];
        }

        return $result;
    }

    /**
     * Вывод заказа подробно
     *
     * @param int $id
     * @author Sergeev A.M.
     */
    public function orderMore($request, $id) {

        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->container->get('doctrine')->getManager();

        if ($request->getMethod() === 'POST') {
            $formData = $request->request->all();
            if (!in_array($formData['PaymentSystem'], ['BankTransfer', 'PayPal', 'YandexMoney', 'PlasticCard', 'PlasticCardTerminal'])) {
                //Robokassa
                $subsystem = $formData['PaymentSystem'];
                $formData['PaymentSystem'] = 'Robokassa';
            } else {
                $subsystem = '';
            }

            //если есть в базе созданный, не выполненный платеж, то берем его
            $order = $em->getRepository('CoreOrderBundle:Order')->findOneById($formData['orderId']);

            $payment = $order->getPayments()->last();
            if (!$payment || $payment->getSystem() != $formData['PaymentSystem'] || $payment->getIsPassed() || !$payment->getType()) {
                //создаём платеж, т.к. Последний не подходит
                $payment = $this->container->get('core_payment_system_logic')->createPaymentByChosenSystem($formData);
            }


            $helpData = [
                'PaymentSystem' => $formData['PaymentSystem'],
                'orderId' => $id,
                'userId' => $user->getId(),
                'subsystem' => $subsystem,
            ];

            $redirectURL = $this->container->get('core_payment_logic_' . strtolower($formData['PaymentSystem']))->getRequestURL($payment, $helpData);
        } else {

            $order = $em->getRepository('CoreOrderBundle:Order')->findUserOrders(['user' => $user, 'orderId' => $id]);
            $orderCostInfo = $this->container->get('core_order_logic')->computeOrderCostInfo($order);
            $em->getRepository('CoreProductBundle:CommonProduct')->findProductsForCart(array_keys($orderCostInfo['composition']));

            $paymentSytems = $this->container->get('doctrine')->getManager()->getRepository('CorePaymentBundle:PaymentSystem\CommonPaymentSystem')->findBy([], ['indexPosition' => 'ASC']);
            $paymentSubSytems = $this->container->get('doctrine')->getManager()->getRepository('CorePaymentBundle:PaymentSystem\RobokassaSubsystem')->findBy([], ['indexPosition' => 'ASC']);

            $temp = array_merge($paymentSytems, $paymentSubSytems);
            foreach ($temp as $ps) {
                $paymentSytemsData[$ps->getSystem()] = $ps;
            }
        }

        $isSupplyPlacticCard = false;
        if ($order->getDeliveryPoint() && $order->getDeliveryPoint()->getIsSupplyPlacticCard()) {
            $isSupplyPlacticCard = true;
        }

        if (isset($redirectURL)) {
            $result = [
                'action' => 'redirect',
                'url' => $redirectURL,
            ];
        } else {
            $result = [
                'action' => 'render',
                'order' => $order,
                'orderCostInfo' => isset($orderCostInfo['history_info']) ? $orderCostInfo['history_info'] : $orderCostInfo,
                'paymentSytems' => $paymentSytemsData,
                'isSupplyPlacticCard' => $isSupplyPlacticCard,
            ];
        }



        return $result;
    }

    /**
     * Логирование пользователя при авторизации
     * @param array $data
     */
    public function logUserInfo(array $data) {
        $userLog = new UserLog();
        $userLog->setIp($data['ip'])
                ->setLoginBySocial($data['network'])
                ->setLoginDateTime(new \DateTime())
                ->setUser($data['user']);
        $this->em->persist($userLog);
        $this->em->flush();
    }

    /**
     * Проставляем текущий город пользователя
     */
    public function setUpCity() {
        $requestStack = $this->container->get('request_stack');
        $serverBag = $requestStack->getCurrentRequest()->server;
        $session = $this->container->get('session');
        if (!$session->get('userCityId') && $serverBag->get('GEOIP_CITY')) {
            //$cityInfo = ['cityName' => 'Rostov-on-don', 'regionName' => '61'];
            $cityInfo = ['cityName' => $serverBag->get('GEOIP_CITY'), 'regionName' => $serverBag->get('GEOIP_REGION')];
            $city = $this->em->getRepository('CoreDirectoryBundle:City')->findByGeo($cityInfo);
            if ($city) {
                $session->set('userCityId', $city->getId());
            }
        }
    }

}
