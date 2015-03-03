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
