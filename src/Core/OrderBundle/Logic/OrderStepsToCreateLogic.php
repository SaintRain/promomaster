<?php

/**
 * Шаги создания заказа на фронтенду
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Logic;

use Symfony\Component\HttpFoundation\Request;
use Core\OrderBundle\Form\Type\DeliveryFormType;
use Application\Sonata\UserBundle\Entity\IndiContragent;
use Application\Sonata\UserBundle\Entity\IndiContact;
use Application\Sonata\UserBundle\Entity\LegalContact;
use Application\Sonata\UserBundle\Form\Type\IndiFormType;
use Core\OrderBundle\Form\Type\BuyerInfoFormType;
use Application\Sonata\UserBundle\Entity\CommonContact;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\UnitOfWork;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Core\ProductBundle\Entity\CompositeProduct;
use Core\ProductBundle\Entity\Product;
use Core\StatisticsBundle\Event\NotFinishedOrderEvent;
use Core\StatisticsBundle\StatisticsBundleEvents;
use Core\PaymentBundle\Entity\PaymentSystem\BankTransfer;

class OrderStepsToCreateLogic
{

    /**
     * Шаг 3.5. Промежуточный. Проверка на наличие денег на балансе и выбор как оплатить заказ,
     * если баланс позволяет, то спрашиваем у пользователя как он хочет поступить
     */
    public function step3_5(Request $request)
    {
        $em = $this->container->get('doctrine')->getManager();
        $data = $this->getFullOrderInfo();
        $balance = $this->container->get('core_payment_logic')->getBalance($this->session->get('current_contragent_id'), true);

        // Если нет сессии с информацией о доставке и контрагенте переадресовываем пользователя на второй шаг оформления заказа
        ///ldd($data);

        if (isset($data['order']) && ((null === $this->session->get('buyer_with_delivery') && false === $data['isOrderHavePhysicalProduct'] && $this->session->get('current_contact_id')) || null !== $this->session->get('buyer_with_delivery'))) {

            // если у контрагента нет денег на балансе, то переадресовываем сразу на страницу выбора способа оплаты
            if ($data['orderCostInfo']['total_cost'] <= $balance && false === $request->request->has('payment')) {

                if ($request->request->has('balance')) {
                    $data['order']->setIsPaidStatus(true);
                    $status = $em->getRepository('CoreOrderBundle:ExtraStatus')->findOneByName('paid');
                    if (null !== $status) {
                        $data['order']->setExtraStatus($status);
                    }
                    //вычисляем и проставляем полную стоимость
                    $this->setCompositionsCost($data['order']);
                    $em->persist($data['order']);
                    $em->flush();

                    // Отправляем пользователю заказ на email
                    $this->sendOrderOnEmail($data['order']);    //запускаем принудительно т.к. В подписчике проверяется флаг "ПРОВЕРЕН", который здесь всегда не выставлен
                    $this->sendOrderOnEmailAdmin($data['order']);

                    $sessionInfo = ($this->session->get('buyer_with_delivery')) ? $this->session->get('buyer_with_delivery') : ['contactId' => $this->session->get('current_contact_id')];
                    $contact = $this->em->getRepository('ApplicationSonataUserBundle:CommonContact')->find($sessionInfo['contactId']);
                    if (null !== $contact && $contact->getMark()) {
                        $contact->setMark(null);
                        $this->em->flush($contact);
                    }
                    // пишем незавершенный заказ
                    // включаем диспатчер и активируем подписчиков
                    /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
                    $dispatcher = (isset($dispatcher)) ? $dispatcher : $this->container->get('event_dispatcher');
                    $dispatcher->dispatch(StatisticsBundleEvents::CREATE_UPDATE, new NotFinishedOrderEvent($data['order']));

                    $this->session->remove('core_order');
                    $this->session->remove('buyer_with_delivery');
                    // Пересчитываем баланс
                    $balance = $this->container->get('core_payment_logic')->getBalance($this->session->get('current_contragent_id'), true);

                    $redirectURL = $this->container->get('router')->generate('core_order_finish_with_order_id', ['paymentSystem' => 'Balance', 'orderId' => $data['order']->getId(), 'shpuserid' => $data['order']->getContragent()->getUser()->getId()]);
                }
            } else {
                $redirectURL = $this->container->get('router')->generate('core_order_cart_step4');
            }
        } else {
            $redirectURL = $this->container->get('router')->generate('core_order_cart_step2');
        }

        if (isset($redirectURL)) {
            $result = [
                'action' => 'redirect',
                'url' => $redirectURL,
            ];
        } else {
            $result = [
                'action' => 'render',
                'data' => $data,
                'balance' => $balance,
            ];
        }

        return $result;
    }

    /**
     * Шаг 4. Выбор способа оплаты
     */
    public function step4(Request $request)
    {
        $em = $this->container->get('doctrine')->getManager();
        $data = $this->getFullOrderInfo();
        $paymentSytemsData = array();
        $messages = array();
        if (isset($data['order'])) {

            // Если нет сессии с информацией о доставке и контрагенте переадресовываем пользователя на второй шаг оформления заказа
            if (!(isset($data['order']) && ((null === $this->session->get('buyer_with_delivery') && false === $data['isOrderHavePhysicalProduct'] && $this->session->get('current_contact_id')) || null !== $this->session->get('buyer_with_delivery')))) {
                $redirectURL = $this->container->get('router')->generate('core_order_cart_step2');
            }

            // если способ доставки наложенный платеж, то пропускаем шаг выбора оплаты
            $isValid = false;
            if ($data['order']->getDeliveryMethod() && method_exists($data['order']->getDeliveryMethod(), 'getIsCashOnDelivery') && $data['order']->getDeliveryMethod()->getIsCashOnDelivery()) {
                $request->setMethod('POST');
                $isValid = true;
            }

            if ($data['order']->getDeliveryPoint() && $data['order']->getDeliveryPoint()->getIsSupplyPlacticCard()) {
                $isSupplyPlacticCard = true;
            }

            if ($request->getMethod() === 'POST' && !isset($redirectURL) && ($request->request->get('PaymentSystem') || $isValid)) {

                $formData = [
                    'PaymentSystem' => $request->request->get('PaymentSystem') ? $request->request->get('PaymentSystem') : 'PaymentOnDelivery'
                ];

                //вычисляем и проставляем полную стоимость
                $this->setCompositionsCost($data['order']);

                $errors = $this->container->get('validator')->validate($data['order']);
                if (count($errors) > 0) {
                    $errors = preg_replace('/Object(.+)?\./im', '', (string) $errors);
                    $messages['error'] = $errors;
                } else {

                    if (!in_array($formData['PaymentSystem'], ['PaymentOnDelivery', 'BankTransfer', 'PayPal', 'YandexMoney', 'PlasticCard', 'PlasticCardTerminal'])) {
                        //Robokassa
                        $subsystem = $formData['PaymentSystem'];
                        $formData['PaymentSystem'] = 'Robokassa';
                    } else {
                        $subsystem = '';
                    }

                    $payment = $this->container->get('core_payment_system_logic')->createPaymentByChosenSystem($formData);
                    $data['order']->addPayment($payment);

                    $em->persist($data['order']);
                    $em->flush();


                    // пишем незавершенный заказ
                    // включаем диспатчер и активируем подписчиков
                    /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
                    $dispatcher = (isset($dispatcher)) ? $dispatcher : $this->container->get('event_dispatcher');
                    $dispatcher->dispatch(StatisticsBundleEvents::CREATE_UPDATE, new NotFinishedOrderEvent($data['order']));

                    $helpData = [
                        'PaymentSystem' => $formData['PaymentSystem'],
                        'orderId' => $data['order']->getId(),
                        'userId' => $data['order']->getContragent()->getUser()->getId(),
                        'subsystem' => $subsystem,
                    ];

                    $redirectURL = $this->container->get('core_payment_logic_' . strtolower($formData['PaymentSystem']))->getRequestURL($payment, $helpData);

                    $this->container->get('beryllium_cache')->set($payment->getId(), $data['order']->getId(), 900); // 15 мин

                    $sessionInfo = $this->session->get('buyer_with_delivery');
                    $contact = $this->em->getRepository('ApplicationSonataUserBundle:CommonContact')->find($sessionInfo['contactId'] ? $sessionInfo['contactId'] : $this->session->get('current_contact_id'));
                    if (null !== $contact && $contact->getMark()) {
                        $contact->setMark(null);
                        $this->em->flush($contact);
                    }

                    // Отправляем письмо подтверждения регистрации
                    //$this->_sendConfirmationEmailMessage();
                    // Отправляем пользователю заказ на email
                    $this->sendOrderOnEmail($data['order']);
                    $this->sendOrderOnEmailAdmin($data['order']);


                    $this->session->remove('core_order');
                    $this->session->remove('buyer_with_delivery');
                }
            }

            $paymentSytems = $this->container->get('doctrine')->getManager()->getRepository('CorePaymentBundle:PaymentSystem\CommonPaymentSystem')->findBy([], ['indexPosition' => 'ASC']);
            $paymentSubSytems = $this->container->get('doctrine')->getManager()->getRepository('CorePaymentBundle:PaymentSystem\RobokassaSubsystem')->findBy([], ['indexPosition' => 'ASC']);

            $temp = array_merge($paymentSytems, $paymentSubSytems);
            foreach ($temp as $ps) {
                $paymentSytemsData[$ps->getSystem()] = $ps;
            }
        }

        if (isset($redirectURL)) {
            $result = [
                'action' => 'redirect',
                'url' => $redirectURL,
            ];
        } else {
            $result = [
                'action' => 'render',
                'messages' => $messages,
                'data' => $data,
                'paymentSytems' => $paymentSytemsData,
                'isSupplyPlacticCard' => isset($isSupplyPlacticCard) ? $isSupplyPlacticCard : false,
            ];
        }

        return $result;
    }

    /**
     * Шаг завершения покупки
     * Уведомление пользователя выполнении/невыполнении платежа
     */
    public function finish(Request $request, $paymentSystem)
    {
        $payment = null;
        $messages = array();
        $orderCostInfo = null;
        $em = $this->container->get('doctrine')->getManager();

        if ($request->query->get('shpsubsystem') || $request->request->get('shpsubsystem')) { // Robokassa, WebMoney, Qiwi
            $paymentSystem = $request->query->get('shpsubsystem') ? $request->query->get('shpsubsystem') : $request->request->get('shpsubsystem');
        }
        $type       = $request->request->get('shporderid') ? 'request' : 'query';
        $shpOrderId = (int) $request->{$type}->get('shporderid');
        $userId = (int) ($request->{$type}->get('shpuserid') ? $request->{$type}->get('shpuserid') : ($request->{$type}->get('customerNumber') ? $request->{$type}->get('customerNumber') : $request->{$type}->get('customernumber')));

        if ($paymentSystem === 'Balance') {
            $orderId = (int) $request->attributes->get('orderId');
        } elseif ($request->attributes->get('id')) { // по роуту
            $orderId = (int) $this->container->get('beryllium_cache')->get($request->attributes->get('id'));
        } elseif ($request->query->get('invoice')) { // PayPal
            $orderId = (int) $this->container->get('beryllium_cache')->get($request->query->get('invoice'));
        } elseif ($request->{$type}->get('shppaymentid')) { // YandexMoney, PlasticCard
            $orderId = (int) $this->container->get('beryllium_cache')->get($request->{$type}->get('shppaymentid'));
        } elseif ($request->query->get('InvId')) { // Robokassa +++
            $orderId = (int) $this->container->get('beryllium_cache')->get($request->query->get('InvId'));
        } else {
            $orderId = 0;
        }

        if (in_array($paymentSystem, ['PaymentOnDelivery', 'BankTransfer', 'PayPal', 'YandexMoney', 'PlasticCard', 'PlasticCardTerminal'])) {
            list($messages, $payment) = $this->container->get('core_payment_logic_' . strtolower($paymentSystem))->getResultMessagesAndPayment($request);
        } elseif ($paymentSystem !== 'Balance') {
            // Robokassa, WebMoney, Qiwi
            list($messages, $payment) = $this->container->get('core_payment_logic_robokassa')->getResultMessagesAndPayment($request);
        }

        $order = $em->getRepository('CoreOrderBundle:Order')->find($orderId);

        if (($order && $payment && $paymentSystem !== 'Balance') || ($order && $paymentSystem === 'Balance')) {
            $orderCostInfo = $this->computeOrderCostInfo($order);
            if (((int) $order->getContragent()->getUser()->getId() !== $userId) || ($shpOrderId > 0 && $shpOrderId !== (int) $order->getId())) {
                throw new NotFoundHttpException('Не совпадает заказ или пользователь.');
            }
            if ($order->getCreatedDateTime()->getTimestamp() + 900 < time()) {
                $redirectURL = $this->container->get('router')->generate('application_sonata_user_profile_order', ['id' => $order->getId()]);
            }
        } else {
            $existOrder = $em->getRepository('CoreOrderBundle:Order')->findOneBy(['id' => $shpOrderId]);
            if ((null !== $existOrder && (int) $existOrder->getContragent()->getUser()->getId() === $userId) && (!$shpOrderId || $shpOrderId && $shpOrderId === (int) $existOrder->getId())) {
                $redirectURL = $this->container->get('router')->generate('application_sonata_user_profile_order', ['id' => $shpOrderId]);
            } else {
                throw new NotFoundHttpException('Не совпадает заказ или пользователь.');
            }
        }

        if (isset($redirectURL)) {
            $result = [
                'action' => 'redirect',
                'url' => $redirectURL,
            ];
        } else {
            $result = [
                'action' => 'render',
                'orderCostInfo' => $orderCostInfo,
                'paymentSystem' => $paymentSystem,
                'messages' => $messages,
                'payment' => $payment,
                'balance' => null,
                'order' => $order,
            ];
        }

        return $result;
    }

    private function _sendConfirmationEmailMessage()
    {
        // Активируем его аккаунт пользователя
        $user = $this->container->get('core_payment_system_logic')->getUser();
        if (null !== $user and ! $user->isEnabled()) {
            $user->setConfirmationToken(md5($user->getEmail()));
            $this->container->get('doctrine')->getManager()->flush();
            // Отправляем подтверждение регистрации на email пользователя
            $this->container->get('fos_user.mailer')->sendConfirmationEmailMessage($user);
            $spool = $this->container->get('mailer')->getTransport()->getSpool();
            $transport = $this->container->get('swiftmailer.transport.real');
            $spool->flushQueue($transport);
        }
    }

    public function setBuyerInfo(Request $request)
    {
        $res = []; //массив а воторыйсобираем результат
        $user = ($this->securityContext->getToken()->getUser() && is_object($this->securityContext->getToken()->getUser())) ? $this->securityContext->getToken()->getUser() : null;
        $this->session->remove('buyer_with_delivery');
        $contragentId = $this->session->get('current_contragent_id');
        $contactId = $this->session->get('current_contact_id');
        $addressList = new ArrayCollection();
        $sessionFormData = $this->session->get('formData');
        $formData = array(
            'otherRecipient' => $sessionFormData['otherRecipient'],
                //'sameInfo' => $sessionFormData['sameInfo'],
                //'rssNews' => $sessionFormData['rssNews'],
                //'register' => (isset($sessionFormData['register']) && $sessionFormData['register']) ? TRUE : FALSE
        );

        $indiForm = null;
        $legalForm = null;
        $contragent = null;
        $isIndi = null;
        $order = $this->session->get('core_order');
        $data = $this->getFullOrderInfo();

        // проверяем ограницения по минимальной сумме по поставщикам для создания заказа
        $confines = $this->container->get('core_order_logic')->checkMinSumForOrder(['order' => $data['order']]);
        if ($confines['canCreateOrder'] === false) {
            $res['redirect'] = 'core_order_cart';
        }

        // пишем незавершенный заказ
        if ($data) {
            // включаем диспатчер и активируем подписчиков
            /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
            $dispatcher = $this->container->get('event_dispatcher');

            $dispatcher->dispatch(StatisticsBundleEvents::CREATE_UPDATE, new NotFinishedOrderEvent($data['order']));
        }
        //$needToRegister = ((isset($sessionFormData['register']) && $sessionFormData['register']) || $user) ? true : false;
        if ($contragentId) {
            $contragentNamespace = explode('\\', $this->session->get('current_contragent_namespace'));
            $contragent = $this->em->getRepository('ApplicationSonataUserBundle:' . end($contragentNamespace))->findWithContact((int) $contragentId);
            $contactList = $contragent->getContactList();
            $contactsData = array();
            foreach ($contactList as $contact) {
                $contactsData[$contact->getId()] = json_encode($contact);
            }
            if ($user) {
                if (count($contactList) == 1 || $contactId) {
                    $formData['contact'] = (count($contactList) == 1) ? clone $contactList->first() : clone $contactList->get($contactId);
                    $formData['contact']->setId(null);
                    $formData['contact'] = clone $formData['contact'];
                    $formData['contactList'] = (count($contactList) == 1) ? $contactList->first() : $contactList->get($contactId);
                }
            } else {
                $formData['contact'] = (count($contactList) == 1) ? $contactList->first() : $contactList->get($contactId);
            }

            /*
              if (count($contactList) == 1 || $contactId) {
              $formData['contactList'] = (count($contactList) == 1) ? $contactList->first() : $contactList->get($contactId);
              if ($user) {
              $formData['contact'] = (count($contactList) == 1) ? clone $contactList->first() : clone $contactList->get($contactId);
              $formData['contact']->setId(null);
              $formData['contact'] = clone $formData['contact'];
              } else {
              $formData['contact'] = (count($contactList) == 1) ? $contactList->first() : $contactList->get($contactId);
              }
              } */
            $formData['contragent'] = $contragent;
            if ($contragent instanceof IndiContragent) {
                $isIndi = 1;
                $indiForm = $this->container->get('form.factory')->create($this->container->get('core_order_buyer_recipient_info_form'), $formData, array(
                    'contactList' => $contactList,
                    'contactsData' => $contactsData,
                        //'register' => $needToRegister
                ));
            } else {
                $isIndi = 0;
                $legalForm = $this->container->get('form.factory')->create($this->container->get('core_order_buyer_recipient_info_form'), $formData, array(
                    'contactList' => $contactList,
                    'contactsData' => $contactsData,
                    'isIndi' => false,
                        //'register' => $needToRegister
                ));
            }
        } elseif (!$contragentId) {
            $indiForm = $this->container->get('form.factory')->create($this->container->get('core_order_buyer_recipient_info_form'), $formData /* , array('register' => $needToRegister) */);
            $legalForm = $this->container->get('form.factory')->create($this->container->get('core_order_buyer_recipient_info_form'), $formData, array('isIndi' => false /* , 'register' => $needToRegister */));
        }
        if ($request->getMethod() === 'POST') {
            $form = ($request->query->get('indi')) ? $indiForm : $legalForm;
            $dataFromRequest = $request->request->get($form->getName());

            /**
             * мега глюк
             * если в пост приходят данные которых в форме нет но изначально они были
             * их надо удалить
             * в фоме модицировать нечего так как этих данных по сути нет
             */
            if ((!isset($contactList) || (isset($contactList) && !count($contactList))) && isset($dataFromRequest['contactList']) && $dataFromRequest['contactList']) {
                unset($dataFromRequest['contactList']);
                $request->request->set($form->getName(), $dataFromRequest);
            }
            $form->submit($request);
            //ldd($form->getErrors());
            if ($form->isValid()) {

                $formData = $form->getData();
                $extraFromData = array(
                    'otherRecipient' => (isset($formData['otherRecipient']) && $formData['otherRecipient']) ? TRUE : FALSE,
                        //'sameInfo' => (isset($formData['sameInfo']) && $formData['sameInfo']) ? TRUE : FALSE,
                        //'rssNews' => (isset($formData['rssNews']) && $formData['rssNews']) ? TRUE : FALSE,
                );

                if (isset($formData['register']) && $formData['register']) {
                    $extraFromData['register'] = true;
                }

                $this->session->set('formData', $extraFromData);
                if ($contragent && $user) {
                    $selectedContact = (isset($formData['contactList'])) ? $formData['contactList'] : null;
                    $contact = & $formData['contact'];
                    $unit = $this->em->getUnitOfWork();
                    $unit->computeChangeSets();
                    //$contragent = &$formData['contragent'];
                    $this->setContact($contact, $this->em, $selectedContact);

                    // изменения для контрагента
                    $changeset = $unit->getEntityChangeSet($contragent);


                    if (array_key_exists('organization', $changeset) || array_key_exists('firstName', $changeset) || array_key_exists('lastName', $changeset)) {
                        $this->em->detach($contragent);
                        $contragent->setId(null);
                        $contact->setContragent($contragent);
                        $collection = new ArrayCollection();
                        $collection->add($contact);
                        $contragent->setContactList($collection);
                    } else {
                        $contragent->setId($contragent->getId());
                        $this->em->merge($contragent);
                    }
                } elseif (!$formData['contragent']->getId()) {
                    $contragent = $formData['contragent'];
                    $this->em->persist($contragent);
                    $contact = $contragent->getContactList()->first();
                } elseif ($formData['contragent']->getId()) {
                    $contragent = $formData['contragent'];
                    $contact = $contragent->getContactList()->first();
                    $this->em->merge($contragent);
                    $this->em->merge($contact);
                }
                /*
                  } elseif (!$contragent || (!$formData['contragent']->getId() && !$user)) {
                  $contragent = $formData['contragent'];
                  $this->em->persist($contragent);
                  $contact = $contragent->getContactList()->first();
                  }
                 *
                 */
                $this->em->flush();
                $this->session->set('current_contragent_id', $contragent->getId());
                $this->session->set('current_contragent_namespace', get_class($contragent));
                $this->session->set('current_contact_id', $contact->getId());
                if (isset($data['isOrderHavePhysicalProduct']) && $data['isOrderHavePhysicalProduct']) {
                    $res['redirect'] = 'core_order_cart_step3';
                } else {
                    $res['redirect'] = 'core_order_cart_step3_5';
                }
                $dispatcher->dispatch(StatisticsBundleEvents::CREATE_UPDATE, new NotFinishedOrderEvent($data['order']));
            }
        }
        if (!isset($res['redirect'])) {
            $res = [
                'indiForm' => ($indiForm),
                'legalForm' => ($legalForm),
                'data' => $data,
                'isIndi' => $isIndi,
                'isCartEmpty' => (count($data['sessionOrder'])) ? false : true
            ];
        }

        return $res;
    }

    /**
     * Выбор способа доставки (корзина - шаг 3)
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return type
     */
    public function selectDeliveryMethod(Request $request)
    {
        $res = []; //массив а в который собираем результат
        //$this->session->remove('buyer_with_delivery');
        $formData = array();
        $serviceList = array();
        $contact = null;
        $user = ($this->securityContext->getToken()->getUser() && is_object($this->securityContext->getToken()->getUser())) ? $this->securityContext->getToken()->getUser() : null;
        $contactId = $this->session->get('current_contact_id');
        $contragentId = $this->session->get('current_contragent_id');
        if (!$contragentId || !$contactId) {
            $res['redirect'] = 'core_order_cart_step2';
        } else {
            $data = $this->getFullOrderInfo();
            $contragentNamespace = explode('\\', $this->session->get('current_contragent_namespace'));
            $contragentClass = end($contragentNamespace);
            $contragent = $this->em->getRepository('ApplicationSonataUserBundle:' . end($contragentNamespace))->findWithContact((int) $contragentId);

            if ($contactId || count($contragent->getContactList()) == 1) {
                $contact = (count($contragent->getContactList()) == 1) ? $contragent->getContactList()->first() : $contragent->getContactList()->get($contactId);
                $formData = array(
                    'contact' => $contact,
                    'contactList' => $contact
                );
            }

            $services = $this->em->getRepository('CoreDeliveryBundle:Service')->findWithAllData(array(
                'minSum' => ['data' => $data['orderCostInfo']['composition_total_cost'], 'condition' => '<='],
                'maxSum' => ['data' => $data['orderCostInfo']['composition_total_cost'], 'condition' => '>='],
                'buyerType' => ['data' => $contragentClass, 'condition' => '=']
            ));

            $serviceTypeList = $this->groupDeliveryServices($services);
            foreach ($services as $service) {
                $serviceList[$service->getId()] = $service;
            }
            $formOptions = array(
                'orderVolume' => $this->getOrderVolume(),
                'services' => $serviceList,
                'user' => $user,
                'contactList' => $contragent->getContactList(),
                'isIndi' => ($contragent instanceof IndiContragent) ? true : false
            );
            foreach ($contragent->getContactList() as $curContact) {
                $formOptions['contactsData'][$curContact->getId()] = json_encode($curContact);
            }

            $form = $this->container->get('form.factory')->create(
                    new DeliveryFormType($this->container->get('translator'), $this->em, $this->container->get('session')
                    ), $formData, $formOptions);
            $buyerWithDelivery = $this->session->get('buyer_with_delivery');
            //ldd($buyerWithDelivery);
            $deliveryMethodId = (isset($buyerWithDelivery['delivery']['method'])) ? $buyerWithDelivery['delivery']['method'] : null;
            $deliveryPoint = (isset($buyerWithDelivery['delivery']['point'])) ? $buyerWithDelivery['delivery']['point'] : null;
            $activeServices = $this->getActiveServices($serviceTypeList, $deliveryMethodId, $serviceList);
            if ($request->getMethod() === 'POST') {
                $this->session->remove('buyer_with_delivery');
                $form->submit($request);
                $formData = $form->getData();
                if ($form->isValid()) {
                    $intoSession = array(
                        'contactragentId' => $contragentId,
                        'contactId' => $formData['contactList']->getId(),
                        'delivery' => array(
                            'method' => $formData['deliveryMethod'],
                            'cost' => $formData['deliveryCost'],
                            'point' => $formData['deliveryPoint']
                        )
                    );

                    $this->session->set("buyer_with_delivery", $intoSession);
                    $this->session->set('current_contact_id', $intoSession['contactId']);

                    if ($serviceList[$formData['deliveryMethod']]->getIsCashOnDelivery()) {
                        $res['redirect'] = 'core_order_cart_step4';
                    } else {
                        $res['redirect'] = 'core_order_cart_step3_5';
                    }

                    $data = $this->getFullOrderInfo();
                    // пишем незавершенный заказ
                    if ($data) {
                        // включаем диспатчер и активируем подписчиков
                        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
                        $dispatcher = (isset($dispatcher)) ? $dispatcher : $this->container->get('event_dispatcher');

                        $dispatcher->dispatch(StatisticsBundleEvents::CREATE_UPDATE, new NotFinishedOrderEvent($data['order']));
                    }
                } else {
                    $activeServices = $this->getActiveServices($serviceTypeList, $formData['deliveryMethod'], $serviceList);
                }
            }

            if (!isset($res['redirect'])) {
                $res = ['data' => $data,
                    'serviceTypeList' => $serviceTypeList,
                    'serviceList' => $serviceList,
                    'form' => $form,
                    'contact' => $contact,
                    'activeServices' => $activeServices,
                    'deliveryMethodId' => $deliveryMethodId,
                    'deliveryPoint' => $deliveryPoint,
                    'isCartEmpty' => (count($data['sessionOrder'])) ? false : true];
            }
        }

        return $res;
    }

    public function getContact(Request $request)
    {

        if (!$request->isXmlHttpRequest()) {
            throw $this->createNotFoundException('Page Not Found');
        }

        $errors = [];
        $formData = ['deliveryMethod' => null];
        $formOptions = [];
        $translator = $this->container->get('translator');
        $contragentId = $this->session->get('current_contragent_id');
        $contragentNamespace = explode('\\', $this->session->get('current_contragent_namespace'));
        $contragentClass = end($contragentNamespace);
        $contactId = $this->session->get('current_contact_id');
        $contact = null;
        $user = ($this->securityContext->getToken()->getUser() && is_object($this->securityContext->getToken()->getUser())) ? $this->securityContext->getToken()->getUser() : null;
        $data = $this->getFullOrderInfo();

        $contragent = $this->em->getRepository($this->session->get('current_contragent_namespace'))->findWithContact((int) $contragentId);

        foreach ($contragent->getContactList() as $curContact) {
            if ($curContact->getId() == $contactId) {
                $contact = clone $curContact;
                $formData['contact'] = $contact;
                break;
            }
        }

        $formOptions = [
            'contactList' => ($user) ? $contragent->getContactList() : [],
            'isIndi' => ($formData['contact'] instanceof  IndiContact) ? true : false
        ];

        $services = $this->em->getRepository('CoreDeliveryBundle:Service')->findWithAllData(array(
                'minSum' => ['data' => $data['orderCostInfo']['composition_total_cost'], 'condition' => '<='],
                'maxSum' => ['data' => $data['orderCostInfo']['composition_total_cost'], 'condition' => '>='],
                'buyerType' => ['data' => $contragentClass, 'condition' => '=']
            ));
        foreach ($services as $service) {
            $formOptions['services'][$service->getId()] = $service;
        }

        if ($user && $formData['contact']) {
            $formData['contactList'] = $formData['contact'];
        }

        $form = $this->container->get('form.factory')->create(
                                    $this->container->get('core_order_recipient_with_extra_data_form'),
                                    $formData,
                                    $formOptions
                                    );

        if ($request->getMethod() == 'POST') {
            $requestData = $request->request->get('delivery_recipient_form');
            // удаляем ненужные поля
            unset($requestData['deliveryCost']);
            unset($requestData['deliveryPoint']);
            unset($requestData['_token']);
            $form->submit($requestData);
            if ($form->isValid()) {
                $contact = $form->getData()['contact'];
                if ($user) {

                    $selectedContact = $form->getData()['contactList'];
                    $this->setContact($contact, $this->em, $selectedContact);
                } else {
                    $this->em->merge($contact);
                }
                $this->em->flush();
                $contactId = $this->session->set('current_contact_id', $contact->getId());
            } else {
                //$string = (string) $form->getErrors(true, false);
                $errors = $this->getErrorMessages($form);
            }

        }

        $answer = array(
            'result' => count($errors) ? false : true,
            'errors' => $errors,
            'contact' => $contact
        );
        return $answer;
    }

    /**
     * Показать способы доставки относящиеся к одной компании
     * @param type $serviceTypeList - типы доставок
     * @param type $serviceList - доставки
     * @param type $deliveryMethodId - id способа доставки
     * @return type
     */
    private function getActiveServices($serviceTypeList, $deliveryMethodId = null, $serviceList = array())
    {

        $result = array();
        if (null == $deliveryMethodId) {
            $firstElt = reset($serviceTypeList);
            $firstCompany = reset($firstElt['company']);
            foreach ($firstElt['service'] as $service) {
                if ($service->getCompany()->getPosition() == $firstCompany->getPosition()) {
                    $result[$service->getId()] = $service;
                }
            }
        } else {
            $deliveryMethod = $serviceList[$deliveryMethodId];
            $serviceTypeId = $deliveryMethod->getServiceType()->getPosition();
            $companyId = $deliveryMethod->getCompany()->getPosition();

            foreach ($serviceTypeList[$serviceTypeId]['service'] as $service) {
                if ($service->getCompany()->getPosition() == $serviceTypeList[$serviceTypeId]['company'][$companyId]->getPosition()) {
                    $result[$service->getId()] = $service;
                }
            }
        }

        return $result;
    }

    /**
     * Группировка способом доставки
     * @param array $services
     * @return array
     */
    private function groupDeliveryServices($services)
    {
        $result = [];
        foreach ($services as $service) {
            $id = $service->getServiceType()->getPosition();
            $result[$id]['serviceType'] = $service->getServiceType();
            //$service->getCompany()->addService($service);
            $result[$id]['company'][$service->getCompany()->getPosition()] = $service->getCompany();
            $result[$id]['service'][$service->getId()] = $service;
        }

        ksort($result);

        foreach ($result as $key => $val) {
            ksort($val['company']);
            $result[$key]['company'] = $val['company'];
        }

        return $result;
    }

    /**
     * Манипуляции с конткатным лицом (изменить, добавить)
     * @param \Application\Sonata\UserBundle\Entity\CommonContact $contact
     * @param \Doctrine\Common\Persistence\ObjectManager $em
     * @param \Application\Sonata\UserBundle\Entity\CommonContact $selectedContact
     * @param \Doctrine\ORM\UnitOfWork $unit
     * @return \Doctrine\Common\Persistence\ObjectManager
     */
    /* public function setContact(CommonContact $contact, ObjectManager $em, CommonContact $selectedContact = null, UnitOfWork $unit = null)
      {
      if (null == $unit) {
      $unit = $em->getUnitOfWork();
      $unit->computeChangeSets();
      }
      // изменения для контактного лица
      if ($selectedContact && $contact instanceof IndiContact) {

      //$changeset = $unit->getEntityChangeSet($selectedContact);

      if ($selectedContact->getFirstName() != $contact->getFirstName() || $selectedContact->getLastName() != $contact->getLastName()) {
      if ($contact->getId()) {
      $em->detach($contact);
      $contact->setId(null);
      } else {
      $em->persist($contact);
      }
      } elseif (($contact->getFirstName() != $selectedContact->getFirstName()) || ($contact->getLastName() != $selectedContact->getLastName())) {
      $em->persist($contact);
      } elseif (!$contact->getId()) {
      $contact->setId($selectedContact->getId());
      $em->merge($contact);
      } /* else {
      $em->refresh($contact);
      $em->merge($contact);
      $em->refresh($selectedContact);
      $em->merge($selectedContact);
      //$contact = $selectedContact;
      //$this->em->merge($contact);
      } */
    /*
      } elseif ($selectedContact) {
      if ($contact->getId()) {
      $contact->setId($selectedContact->getId());
      $em->merge($contact);
      } else {
      $em->persist($contact);
      }
      } else {
      if ($contact->getId()) {
      $em->detach($contact);
      $contact->setId(null);
      } else {
      $em->persist($contact);
      }
      }

      return $em;
      } */

    /**
     * Манипуляции с конткатным лицом (изменить, добавить)
     * @param \Application\Sonata\UserBundle\Entity\CommonContact $contact
     * @param \Doctrine\Common\Persistence\ObjectManager $em
     * @param \Application\Sonata\UserBundle\Entity\CommonContact $selectedContact
     * @return \Doctrine\Common\Persistence\ObjectManager
     */
    public function setContact(CommonContact $contact, ObjectManager $em, CommonContact $selectedContact = null)
    {
        // изменения для контактного лица
        if ($selectedContact) {
            if ($contact instanceof IndiContact && ($selectedContact->getFirstName() != $contact->getFirstName() || $selectedContact->getLastName() != $contact->getLastName())) {
                $em->persist($contact);
            } else {
                $contact->setId($selectedContact->getId());
                $em->merge($contact);
            }
        } else {
            $em->persist($contact);
        }

        return $em;
    }

    /**
     * Отправка информации о заказе заказчику
     *
     * @param $order
     */
    public function sendOrderOnEmail($order, $need_flush = true)
    {
        $hash = null;
        $em = $this->container->get('doctrine')->getManager();
        $order_id_formatted = $this->container->get('core_common_twig_extension')->idFormatFilter($order->getId());
        if ($this->container->get('security.context')->getToken() && !is_object($this->container->get('security.context')->getToken()->getUser())) {
            $user = $this->container->get('core_payment_system_logic')->getUser();
            $hash = $this->container->get('fos_user.util.token_generator')->generateToken();
            $user->setConfirmationToken($hash);
            $em->persist($user);
            $em->flush();
        }


        $locale = $this->container->get('translator')->getLocale();
        $domain = $this->container->getParameter('router.request_context.host'); //$this->container->get('request_context')->server->get('HTTP_HOST');

        if (!$order) {
            return;
        }

        $subject = $domain . ' | ' . $this->container->get('translator')->trans('Order No', ['%No%' => $this->container->get('core_common_twig_extension')->idFormatFilter($order->getId())], 'frontend');
        $from = $this->container->getParameter('default_email');
        $orderCostInfo = $this->computeOrderCostInfo($order);

        $router = $this->container->get('router');
        if ($hash) {
            $urlOrder = $router->generate('fos_user_security_login_for_order', array('orderId' => $order->getId(), 'token' => $hash), true);
        } else {
            $urlOrder = $router->generate('application_sonata_user_profile_order', array('id' => $order->getId()), true);
        }

        $utc = new \DateTimeZone($this->container->getParameter('default_timezone'));
        $order->getCreatedDateTime()->setTimezone($utc);
        $createdDateTime = $order->getCreatedDateTime()->format('d.m.Y H:i');

        //берем список получателей
        $poluchately = $this->container->get('core_order_mailer_logic')->getPoluchately($order);
        //генерируем сообщение и делаем рассылку
        foreach ($poluchately as $pol) {
            $helloPrefix = trim($pol['contactName']);
            if (!$helloPrefix) {
                $helloPrefix = '.';
            } else {
                $helloPrefix = ', ' . $helloPrefix . '!';
            }

            //если банковский платеж, добавляем вложение
            if ($order->getPayments()->last() && $order->getPayments()->last()->getSystem() instanceof BankTransfer) {
                $blank_html = $this->container->get('templating')->render('CorePaymentBundle:PaymentSystem/BankTransfer:savings_bank.html.twig', array(
                    'payment' => $order->getPayments()->last(),
                    'customer' => $order->getContragent()
                ));

                $blank_pdf = $this->tfox_mpdfport->generatePdf($blank_html, ['outputDest' => 'S', 'outputFilename' => '', 'constructorArgs' => ['', 'A4', 0, '', 10, 10, 10, 10, 10, 10, 'P']]);
                $attachmentName = 'Бланк на оплату - ' . $order_id_formatted . '.pdf';
                $attachment = \Swift_Attachment::newInstance($blank_pdf, $attachmentName, 'application/pdf');

                $payUrl = false;
            } else {
                $attachment = false;
                if ($order->getPayments()->last()) {
                    //генерируем ссылку на оплату
                    $paymentSystem = $order->getPayments()->last();
                    if ($paymentSystem && $paymentSystem->getSystem()) {
                        $paymentSystemName = $paymentSystem->getSystem()->getSystem();
                        $targetUrl = 'http://' . $this->container->getParameter('domain_ru') .
                                $router->generate('application_sonata_user_profile_order_redirect_to_pay_post', ['id' => $order->getId(), 'paymentSystem' => $paymentSystemName]);

                        //генерируем ссылку для оплаты по прямому доступу
                        $payUrl = $this->container->get('application_user_auth_logic')->createCouponAccess($order->getContragent()->getUser(), $targetUrl, $need_flush);
                    } else {
                        $payUrl = false;
                    }
                } else {
                    $payUrl = false;
                }
            }

            $renderedTemplate = $this->container->get('templating')->render('CoreOrderBundle:Order:on_email.html.twig', array(
                'order' => $order,
                'orderCostInfo' => isset($orderCostInfo['history_info']) ? $orderCostInfo['history_info'] : $orderCostInfo,
                'domain' => $domain,
                'urlOrder' => $urlOrder,
                'helloPrefix' => $helloPrefix,
                'payUrl' => $payUrl,
                'attachment' => $attachment,
                'createdDateTime' => $createdDateTime
            ));

            $message = \Swift_Message::newInstance()
                    ->setSubject($subject)
                    ->setFrom($from)
                    ->setTo($pol['toEmail'])
                    ->setBody($renderedTemplate, 'text/html');

            if ($attachment) {
                $message->attach($attachment);
            }


            $this->container->get('mailer')->send($message);
            $spool = $this->container->get('mailer')->getTransport()->getSpool();
            $transport = $this->container->get('swiftmailer.transport.real');
            $spool->flushQueue($transport);
        }

        //ставим галочку о том, что письмо было отправлено
        $order->setIsOrderCreatedSendMail(true);
        if ($need_flush) {
            $em->flush($order);
        }
    }

    /**
     * Отправка информации о заказе админу
     *
     * @param $order
     */
    public function sendOrderOnEmailAdmin($order)
    {
        if (!$order) {
            return;
        }

        $domain = $this->container->get('request')->server->get('HTTP_HOST');

        $subject = $domain . ' | ' . 'Создан новый заказ №' . $this->container->get('core_common_twig_extension')->idFormatFilter($order->getId()) . ' от ' . $order->getCreatedDateTime()->format('d.m.Y');
        $from = $this->container->getParameter('default_email');
        $to = $from;
        $orderCostInfo = $this->computeOrderCostInfo($order);

        $utc = new \DateTimeZone($this->container->getParameter('default_timezone'));
        $order->getCreatedDateTime()->setTimezone($utc);
        $createdDateTime = $order->getCreatedDateTime()->format('d.m.Y H:i');

        $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom($from)
                ->setTo($to)
                ->setBody(
                $this->container->get('templating')->render('CoreOrderBundle:Order:on_email_admin.html.twig', array(
                    'order' => $order,
                    'orderCostInfo' => isset($orderCostInfo['history_info']) ? $orderCostInfo['history_info'] : $orderCostInfo,
                    'domain' => $domain,
                    'createdDateTime' => $createdDateTime
                )), 'text/html');
        $this->container->get('mailer')->send($message);
        $spool = $this->container->get('mailer')->getTransport()->getSpool();
        $transport = $this->container->get('swiftmailer.transport.real');
        $spool->flushQueue($transport);
    }

    /**
     * Получить объем всех товаров из корзины
     * @return numeric
     */
    private function getOrderVolume()
    {
        $volume = 0;
        $cart = [];
        $fullOrder = $this->getFullOrderInfo();
        if ($fullOrder) {
            foreach ($fullOrder['products'] as $good) {
                if (($good instanceof CompositeProduct && $good->getIsPhysical()) || $good instanceof Product) {
                    $productQuantity = $fullOrder['sessionOrder']['products'][$good->getId()]['quantity'];
                    $cart[$good->getId()]['id'] = $good->getId();
                    $cart[$good->getId()]['length'] = $good->getLengthOfBox() / 1000;
                    $cart[$good->getId()]['width'] = $good->getWidthOfBox() / 1000;
                    $cart[$good->getId()]['height'] = $good->getHeightOfBox() / 1000;
                    $cart[$good->getId()]['volume'] = $cart[$good->getId()]['length'] * $cart[$good->getId()]['height'] * $cart[$good->getId()]['width'];
                    $cart[$good->getId()]['quantity'] = $productQuantity;
                }
            }

            foreach ($cart as $item) {
                $volume += $item['volume'] * $item['quantity'];
            }
        }


        return $volume;
    }

    /**
     * Получить ошибки от формы
     * @param \Symfony\Component\Form\Form $form
     * @return type
     */
    private function getErrorMessages(\Symfony\Component\Form\Form $form) {
        $errors = array();

        foreach ($form->getErrors() as $key => $error) {
                $errors[] = $error->getMessage();
        }

        foreach ($form->all() as $child) {
            if (!$child->isValid()) {
                $errors[$child->getName()] = $this->getErrorMessages($child);
            }
        }

        return $errors;
    }
}
