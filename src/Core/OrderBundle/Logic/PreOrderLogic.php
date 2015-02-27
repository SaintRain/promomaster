<?php
/**
 * Бизнесс логика для предзака
 * @author  Kaluzhniy N. I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Logic;

use Core\OrderBundle\Entity\PreOrder\PerOrder;
use Core\OrderBundle\Entity\PreOrder\PreOrderComposition;
use Core\OrderBundle\Form\Type\FrontendPreOrderFormType;
use Application\Sonata\UserBundle\Entity\CommonContact;
use Application\Sonata\UserBundle\Entity\IndiContact;
use Application\Sonata\UserBundle\Entity\LegalContact;
use Application\Sonata\UserBundle\Entity\CommonContragent;
use Application\Sonata\UserBundle\Entity\User;
use Application\Sonata\UserBundle\Entity\IndiContragent;
use Core\OrderBundle\Entity\PreOrder\PreOrder;
use Doctrine\ORM\EntityManagerInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Validator\ValidatorInterface;
use Core\LogisticsBundle\Entity\Supply;
use Core\LogisticsBundle\Entity\Seller;
use Core\LogisticsBundle\Entity\Stock;
use Core\ProductBundle\Entity\CommonProduct;
use Core\LogisticsBundle\Entity\ProductInSupply;
use Core\OrderBundle\Entity\Composition;
use Core\OrderBundle\Entity\Order;
use Core\LogisticsBundle\Logic\SupplyLogic;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\FormFactoryInterface;

class PreOrderLogic
{
    protected $em;
    protected $userManager;
    protected $validator;
    protected $orderLogic;
    protected $supplyLogic;
    protected $translator;
    protected $session;
    protected $moneyExtension;
    protected $securityContext;
    protected $templating;
    protected $router;
    protected $params;
    protected $mailer;
    protected $formFactory;


    public function __construct(
        EntityManagerInterface $em,
        UserManagerInterface $userManager,
        ValidatorInterface $validator,
        OrderLogic $orderLogic,
        SupplyLogic $supplyLogic,
        $translator,
        $session,
        $moneyExtension,
        $securityContext,
        $templating,
        $router,
        $params,
        $mailer,
        FormFactoryInterface $formFactory
    ) {
        $this->em = $em;
        $this->userManager = $userManager;
        $this->validator = $validator;
        $this->orderLogic = $orderLogic;
        $this->supplyLogic = $supplyLogic;
        $this->translator = $translator;
        $this->session = $session;
        $this->moneyExtension = $moneyExtension;
        $this->securityContext = $securityContext;
        $this->templating = $templating;
        $this->router = $router;
        $this->params = $params;
        $this->mailer = $mailer;
        $this->formFactory = $formFactory;

    }

    /**
     * Создание заказа из предзака
     * @param \Core\OrderBundle\Entity\PreOrder\PreOrder $object
     */
    public function createOrder(PreOrder $object)
    {

        $objects = [];
        $contact = null;
        $errors = [];
        $contragent = $object->getContragent();
        $user = $object->getUser();
        if (!$user) {
            $user = $this->em->getRepository('ApplicationSonataUserBundle:User')->findOneBy(['email' => $object->getEmail()]);
        }
        if (!$contragent) {
            $contragentSearchFields = array(
                'firstName' => $object->getFirstName(),
                'lastName' => $object->getLastName(),
                'surName' => $object->getSurName(),
                'contactEmail' => $object->getEmail()
            );
            if ($user) {
                $contragentSearchFields['user'] = $user;
            }
            $contragent = $this->em->getRepository('ApplicationSonataUserBundle:IndiContragent')->findOneBy($contragentSearchFields);
        }
        if (!$user) {
            $user = $this->setUser($object);
            $objects[] = $user;
        }
        if ($contragent) {
            $contact = $this->em->getRepository('ApplicationSonataUserBundle:IndiContact')->findOneBy(array(
                'firstName' => $object->getFirstName(),
                'lastName' => $object->getLastName(),
                'contragent' => $contragent
            ));
        } else {
            $contragent = $this->setContragent($object, $user);
            $objects[] = $contragent;
        }

        if (!($contragent instanceof IndiContragent)) {
            return ['result' => false, 'errors' => ['contragent' => 'Предзаказ доступен только для физ. лиц']];
        }
        if (!$contact) {
            $contact = $this->setContact($object, $contragent);
            $objects[] = $contact;
        }

        $seller = $this->getSeller();
        $stock = $this->getStock();

        $productsInSupply = [];
        foreach ($object->getCompositions() as $comp) {
            $curQuantity = 0;
            foreach ($comp->getProduct()->getProductAvailability() as $prodAv) {
                if ($prodAv->getQuantity()) {
                    $curQuantity += $prodAv->getQuantity();
                }
            }
            if ($curQuantity < $comp->getQuantity()) {
                $needQuantity = $comp->getQuantity() - $curQuantity;
                $pInSupply = $this->setProductInSupply($comp->getProduct(),
                    $needQuantity);
                $objects[] = $pInSupply;
                $productsInSupply[] = $pInSupply;
            }
        }

        $supply = $this->setSupply($productsInSupply, $seller, $stock, $object);
        $objects[] = $supply;

        $compositions = [];
        foreach ($object->getCompositions() as $comp) {
            $composition = $this->setComposition($comp->getProduct(),
                $comp->getQuantity(), $comp->getIndexPosition());
            $compositions[] = $composition;
            $objects[] = $composition;
        }

        $errors = $this->validate($objects);
        if ($object->getStatus() && $object->getStatus()->getName() == 'canceled') {
            $errors['status'] = 'Статус не может быть отменен';
        }
        if (count($errors)) {
            return ['result' => false, 'errors' => $errors];
        }

        $order = $this->setOrder($object, $compositions, $contragent,
            $seller, $stock);
        // валидируем сам заказ
        $validationResult = $this->validator->validate($order);
        if ($validationResult->count()) {
            foreach ($validationResult->getIterator() as $error) {
                $errors[$error->getPropertyPath()] = $error->getMessage();
            }
            return ['result' => false, 'errors' => $errors];
        }

        $this->orderLogic->setCompositionsCost($order);

        foreach ($objects as $val) {
            $this->em->persist($val);
        }

        $preOrderStatus = $this->em->getRepository('CoreOrderBundle:PreOrder\PreOrderStatus')->findOneBy(['name' => 'executed']);
        if (!$object->getId()) {
            $this->em->persist($object);
        }
        $object->setStatus($preOrderStatus)
            ->setOrder($order);
        $this->em->persist($order);

        $this->em->flush();
        return ['result' => true, 'orderId' => $order->getId()];
    }

    /**
     * Проверка всех объектов на валидность
     * @param array $objects
     * @return type
     */
    private function validate($objects)
    {
        $errors = [];
        foreach ($objects as $object) {
            $validationResult = $this->validator->validate($object);
            if ($validationResult->count()) {
                foreach ($validationResult->getIterator() as $error) {
                    $errors[$error->getPropertyPath()] = $error->getMessage();
                }
            }
            if (count($errors)) {
                break;
            }
        }

        return $errors;
    }

    /**
     * Конвертируем ошибки в строчку
     * @param type $errors
     * @return string
     */
    public function errorStringify($errors)
    {
        $string = 'Во время создания заказа произошли ошибки: <br />';

        foreach ($errors as $key => $val) {
            $string .= $key . " - " . $val . "<br />";
        }

        return $string;
    }

    /**
     * Генерация рандомной строки
     * @param int $length
     * @return string
     */
    private function generateRandString($length = 4)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        return substr(str_shuffle($chars), 0, $length);
    }

    private function setUser(PreOrder $object)
    {

        $user = new User();
        $user->setUsername($object->getEmail());
        $user->setEmail($object->getEmail());
        $user->setPlainPassword($this->generateRandString(6));
        $user->setPhone($object->getPhone());
        $user->setIsRssNews(false);
        $user->setEnabled(false);
        $user->setSuperAdmin(false);
        $user->setFirstName($object->getFirstName());
        $user->setLastName($object->getLastName());
        $this->userManager->updateCanonicalFields($user);
        $this->userManager->updatePassword($user);

        return $user;
    }

    private function setContragent(PreOrder $object, User $user)
    {
        $contragent = new IndiContragent();
        $contragent
            ->setLastName($object->getLastName())
            ->setFirstName($object->getFirstName())
            ->setSurName($object->getSurName())
            ->setPhone1($object->getPhone())
            ->setContactEmail($object->getEmail())
            ->setUser($user);
        return $contragent;
    }

    private function setContact(
        PreOrder $object,
        CommonContragent $contragent
    ) {
        $contact = new IndiContact();
        $contact
            ->setLastName($object->getLastName())
            ->setFirstName($object->getFirstName())
            ->setAddress($object->getAddress())
            ->setCity($object->getCity())
            ->setContactEmail($object->getEmail())
            ->setPhone($object->getPhone())
            ->setContragent($contragent);
        return $contact;
    }

    private function setProductInSupply(CommonProduct $product, $quantity = 1)
    {
        $productInSupply = new ProductInSupply();
        $productInSupply->setPriceInGtdCurrency($product->getOrderOnlyPriceBuying())
            ->setGtdCurrency($product->getOOPBCurrency())
            ->setPriceInGeneralCurrency($product->getOrderOnlyPriceBuying())
            ->setQuantity($quantity)
            ->setProduct($product);

        return $productInSupply;
    }

    private function setSupply($productsInSupply, Seller $seller, Stock $stock, $toProductSubscriber)
    {
        //$supplier = $this->em->getRepository('CoreLogisticsBundle:Supplier')->findOneBy(['id' => '1']);
        $status = $this->em->getRepository('CoreLogisticsBundle:SupplyStatus')->findOneBy(['name' => 'postavlieno-na-sklad']);
        $currency = $this->em->getRepository('CoreDirectoryBundle:Currency')->findOneBy(['currency' => 'RUB']);

        $supply = new Supply();
        $supply
            //->setSupplier($supplier)
            ->setSeller($seller)
            //->setGtdCurrency($currency)
            ->setStock($stock)
            ->setStatus($status)
            ->setIsVirtual(true)
            ->setNote('Создано для предзаказа #' . $toProductSubscriber->getId());

        foreach ($productsInSupply as $p) {
            $supply->addProduct($p);
        }

        $validationResult = $this->validator->validate($supply);
        if (!$validationResult->count()) {
            $this->supplyLogic->addProductUnits($supply);
            $this->em->persist($supply);
            $this->em->flush($supply);
        }

        return $supply;
    }

    private function setComposition($product, $quantity = 1, $indexPosition)
    {
        $сomposition = new Composition();
        $сomposition->setProduct($product)
            ->setPrice($product->getPrice())
            ->setQuantity($quantity)
            ->setIndexPosition($indexPosition);

        return $сomposition;
    }

    private function setOrder(
        PreOrder $preOrder,
        $сompositions,
        CommonContragent $contragent,
        Seller $seller,
        Stock $stock
    ) {
        $order = new Order();
        foreach ($сompositions as $сomposition) {
            $order->addComposition($сomposition);
        }
        $order->setContragent($contragent);

        $order->setContragentFio($preOrder->getFullName());
        $order->setIsDeliveryIncludedInPayment(false);
        $order->setDeliveryAddress($preOrder->getAddress());
        $order->setDeliveryCity($preOrder->getCity());
        $order->setComments('');
        $order->setRecipientFio($preOrder->getFullName());
        $order->setRecipientEmail($preOrder->getEmail());
        $order->setRecipientPhone($preOrder->getPhone());

        $order->setIsCanceledStatus(false);
        $order->setIsCheckedStatus(false);
        $order->setIsShippedStatus(false);
        $order->setIsPaidStatus(false);

        $order->setStock($stock);
        $order->setSeller($seller);

        return $order;
    }

    private function getSeller()
    {
        $seller = $this->em->getRepository('CoreLogisticsBundle:Seller')->findOneBy(['code' => 'rostpay']);
        if (!$seller) {
            throw new \Exception('Продавец rostpay не найден в БД');
        }
        return $seller;
    }

    private function getStock()
    {
        $stock = $this->em->getRepository('CoreLogisticsBundle:Stock')->findOneBy(['code' => 'rostov']);
        if (!$stock) {
            throw new \Exception('Склад rostov не найден в БД');
        }
        return $stock;
    }

    public function getContacts($id)
    {
        $result = [];
        $contacts = $this->em->getRepository('ApplicationSonataUserBundle:IndiContact')->findBy(['contragent' => $id]);

        foreach ($contacts as $contact) {
            $result[$contact->getCaptionForSelect()] = json_encode($contact);
        }
        return $result;
    }


    /**
     * Подсчитать стоимость предзаказа
     * @return type
     */
    public function calculatePreOrderCost($requestData)
    {
        $em = $this->em;
        $response = array();
        if (isset($requestData['compositions'])) {
            $ids = [];
            $quantities = [];
            $quantity = 0;
            foreach ($requestData['compositions'] as $composition) {
                if (is_numeric($composition['quantity']) && $composition['quantity']) {
                    $p_id = $composition['product'];
                    $ids[] = $p_id;
                    $quantities[$p_id] = $composition['quantity'];
                    $quantity += $composition['quantity'];

                    $sessionData['products'][$p_id]['id'] = $p_id;
                    $sessionData['products'][$p_id]['quantity'] = $composition['quantity'];
                }
            }

            $contragentId = (isset($requestData['isAdmin']) && isset($requestData['contragentId'])
                && $requestData['contragentId']) ? (int)$requestData['contragentId']
                : null;
            $products = $em->getRepository('CoreProductBundle:CommonProduct')->findById($ids);

            if (null === $products) {
                $response['errors']['product'] = $this->translator->trans('Cannot find product',
                    array(), 'frontend');
            }
            if (!$quantity || $quantity < 1) {
                $response['errors']['quantity'] = $this->translator->trans('proper_quantity',
                    array(), 'frontend');
            }
            if (isset($response['errors']) && count($response['errors'])) {
                return $response;
            }

            $this->session->set('core_pre_order', $sessionData);

            // Пересчитываем данные о заказе
            $data = $this->orderLogic->getFullOrderInfo([],
                'core_pre_order', $contragentId);
            if (isset($data['orderCostInfo']['total_cost'])) {
                $moneyExtension = $this->moneyExtension;
                $data['orderCostInfo']['print_cost'] = sprintf("%s %s",
                    $moneyExtension->moneyFormatFunction($data['orderCostInfo']['total_cost']),
                    $moneyExtension->currencyFormatFunction());
            }
            $response['data'] = $data['orderCostInfo'];

            $this->session->remove('core_pre_order');
        }
        return $response;
    }

    /**
     * Покупка под заказ
     *
     * @return type
     */
    public function buyByOrder(Request $request)
    {
        if ('POST' !== $request->getMethod() || !$request->isXmlHttpRequest()) {
            throw new NotFoundHttpException('Page Not Found');
        }

        $user = null;
        $errors = [];
        $postData = $request->request->get('frontend_pre_order');

        if ($this->securityContext->getToken() && is_object($this->securityContext->getToken()->getUser())) {
            $user = $this->securityContext->getToken()->getUser();
        }
        if (isset($postData['preOrder']['compositions'][0]['product'])) {
            $productId = (int)$postData['preOrder']['compositions'][0]['product'];
            $product = $this->em->getRepository('CoreProductBundle:CommonProduct')->find($productId);
        } else {
            $product = null;
            $productId = null;
        }
        $preOrderFormData = $this->getPreOrderFormDefaultData($this->em, $user,
                $product);
        $preOrderForm     = $this->formFactory->create(
                                new FrontendPreOrderFormType(),
                                $preOrderFormData['data'],
                                $preOrderFormData['options']
                            );

        $preOrderForm->submit($postData);

        if ($preOrderForm->isValid()) {
            $formData = $preOrderForm->getData();
            $preOrderEmail = $formData['preOrder']->getEmail();
            $preOrder = $formData['preOrder'];
            $checkResult = $this->checkPreOrderCompostion($preOrder->getCompositions()->first());
            if (count($checkResult)) {
                return $checkResult;
            }
            // проверки для неавторизованного пользователя
            if (!$user) {
                $checkResult = $this->checkUser($preOrderEmail);
                if (count($checkResult)) {
                    return $checkResult;
                }
            }

            $subscribersToProductByOrder = $this->em->getRepository('CoreOrderBundle:PreOrder\PreOrder')
                                            ->findByEmailAndProduct($preOrderEmail,$productId);
            if ($subscribersToProductByOrder) {
                $preOrder->setId($subscribersToProductByOrder->getId());
                $preOrder->setCreatedDateTime(new \DateTime('now'));
                $this->em->merge($preOrder);
            } else {
                $this->em->persist($preOrder);
            }
            $this->em->flush();
            $timeZoneOffset = $request->request->get('pre_order_form')['visitortimezone'] * 3600;
            $timeZone = new \DateTimeZone(timezone_name_from_abbr(null,
                                            $timeZoneOffset, true));
            $preOrder->getCreatedDateTime()->setTimezone($timeZone);
            $createdDateTime = $preOrder
                                ->getCreatedDateTime()->format('d-m-Y H:i:s');
            $this->sendEmailOnPreOrderCreate($product, $preOrder, $createdDateTime);
            $preOrderComposition = $preOrder->getCompositions()->first();
            $preOrderCost = ['compositions' => [0 => [
                'quantity' => $preOrderComposition->getQuantity(),
                'product' => $preOrderComposition->getProduct()->getId()
            ]]];
            $data = $this->calculatePreOrderCost($preOrderCost);
            $response = array(
                'result' => count($errors) ? false : true,
                'errors' => $errors,
                'cost' => (isset($data['data']['total_cost'])) ? $data['data']['total_cost']
                    : null,
                'msg' => count($errors) ? '' : $this->translator->trans('Expect a call manager',
                    array('%date%' => $createdDateTime), 'frontend')
            );
            return $response;

        } else {
            $formData = $preOrderForm->getData();
            $preOrder = $formData['preOrder'];
            $checkResult = $this->checkPreOrder($preOrder);
            if (count($checkResult)) {
                return $checkResult;
            }

            return array(
                'result' => false,
                'errors' => ['quantity' => $this->translator->trans('msg.oldSession', [],'frontend')],
                'msg' => ''
            );
        }
    }

    /**
     * Возвращает список предзаказов для объединия
     * @param $preorder_id
     */
    public function getPreOrders($preorder_id)
    {
        $preorder = $this->em->getRepository('CoreOrderBundle:PreOrder\PreOrder')->find($preorder_id);
        $preOrders = $this->em->getRepository('CoreOrderBundle:PreOrder\PreOrder')->findPreOrdersForUnion($preorder);

        $res = [];
        foreach ($preOrders as $d) {
            //берем названия продуктов
            $p_caption = [];
            foreach ($d->getCompositions() as $comp) {
                $temp = [];
                $temp['article'] = $comp->getProduct()->getArticle();
                $temp['captionRu'] = $comp->getProduct()->getCaptionRu();
                $temp['quantity'] = $comp->getQuantity();
                $temp['id'] = $comp->getProduct()->getId();
                $temp['price'] = $comp->getProduct()->getPrice();
                $temp['uCaption'] = $comp->getProduct()->getUnitOfMeasure()->getShortCaptionRu();
                $p_caption[] = $temp;
            }
            $res[] = [
                'id' => $d->getId(),
                'compositions' => $p_caption,
                'email' => $d->getEmail(),
                'phone' => $d->getPhone(),
                'address' => $d->getAddress(),
                'firstName' => $d->getFirstName(),
                'lastName' => $d->getLastName(),
                'surName' => $d->getSurName(),
                'city' => $d->getCity()->getId()
            ];
        }

        //заменяепм null на пустую строку
        foreach ($res as $ind => $r) {
            foreach ($r as $key => $v) {
                if ($v === null) {
                    $res[$ind][$key] = '';
                }
            }
        }
        return $res;
    }

    /**
     * Объединяет два предзаказа
     * @param $data
     * @return bool
     */
    public function combinePreOrders($data)
    {

        $this->em->getConnection()->beginTransaction();
        try {
            $data['isNeedReplaceContact']=intval($data['isNeedReplaceContact']);
            $preorder = $this->em->getRepository('CoreOrderBundle:PreOrder\PreOrder')->find($data['id']);
            $combineWithPreorder = $this->em->getRepository('CoreOrderBundle:PreOrder\PreOrder')->find($data['combine_with_preorder_id']);

            foreach ($combineWithPreorder->getCompositions() as $comp) {
                $comp->getProduct();
                $needAdd = true;
                foreach ($preorder->getCompositions() as $comp2) {
                    if ($comp->getProduct()->getId() == $comp2->getProduct()->getId()) {
                        $needAdd = false;
                        break;
                    }
                }
                //добавляем в состав товар, если такого нет
                if ($needAdd) {
                    $composition = new PreOrderComposition();
                    $composition->setQuantity($comp->getQuantity())
                        ->setProduct($comp->getProduct());
                    $preorder->addComposition($composition);
                    $this->em->persist($composition);
                }
            }

            //если нужно заменить контактные данные
            if ($data['isNeedReplaceContact']) {
                $preorder
                    ->setPhone($combineWithPreorder->getPhone())
                    ->setAddress($combineWithPreorder->getAddress())
                    ->setFirstName($combineWithPreorder->getFirstName())
                    ->setLastName($combineWithPreorder->getLastName())
                    ->setSurName($combineWithPreorder->getSurName())
                    ->setCity($combineWithPreorder->getCity())
                    ->setContragent($combineWithPreorder->getContragent())
                ;
            }
            $combineWithPreorder->setIsVisible(false);

            $this->em->persist($preorder);
            $this->em->persist($combineWithPreorder);
            $this->em->flush();
            $this->em->getConnection()->commit();
        } catch (\Exception $e) {
            $this->em->getConnection()->rollback();
            $this->em->close();
            throw $e;
        }
        return true;
    }

    /**
     * Данные для формы предазаказа
     * @param type $em
     * @param type $user
     * @param type $product
     * @return type
     */
    public function getPreOrderFormDefaultData($em, $user = null, $product)
    {
        $result            = [];
        $result['options'] = array();
        $preOrder = new PreOrder();
        $preOrder->setUser($user);
        if ($this->session->get('current_contragent_id') && $this->session->get('current_contragent_namespace')) {
            $contragentId = (int) $this->session->get('current_contragent_id');
            $contragent   = $em->getRepository($this->session->get('current_contragent_namespace'))->findWithContact($contragentId);
            $preOrder->setContragent($contragent);
            if (count($contragent->getContactList()) == 1
                && $contragent->getContactList()->first() instanceof IndiContact) {
                $contact        = $contragent->getContactList()->first();
                $preOrder->setFirstName($contact->getFirstName())
                        ->setLastName($contact->getLastName())
                        ->setAddress($contact->getAddress())
                        ->setCity($contact->getCity())
                        ->setEmail($contact->getContactEmail())
                        ->setPhone($contact->getPhone())
                ;
            } elseif (!count($contragent->getContactList())) {
                $preOrder->setFirstName($contragent->getFirstName())
                        ->setLastName($contragent->getLastName())
                        ->setSurName($contragent->getSurname())
                        ->setEmail($contragent->getContactEmail())
                        ->setPhone($contragent->getPhone1())
                ;
            } else {
                /*
                foreach ($contragent->getContactList() as $contact) {
                    $result['options']['contactsData'][$contact->getId()] = json_encode($contact);
                }*/
                $result['options']['contactList'] = $contragent->getContactList();
            }
        } elseif (is_object($user)) {
            $preOrder->setFirstName($user->getFirstName())
                        ->setLastName($user->getLastName())
                        ->setEmail($user->getEmail())
                        ->setPhone($user->getPhone())
                ;
        }
        $composition = new PreOrderComposition();
        $composition->setProduct($product);
        $preOrder->addComposition($composition);
        $result['data']['preOrder'] = $preOrder;
        return $result;
    }

    /**
     * Проверка для пользователя
     * @param string $email
     * @return array
     */
    private function checkUser($email)
    {
        $result = [];
        $oldUser = $this->em->getRepository('ApplicationSonataUserBundle:User')->findByEmail($email);
        // проверка на то что пользователь с таким email уже есть в БД и он не заблокирован
        if ($oldUser && $oldUser->isLocked()) {
            $result =  array(
                'result' => false,
                'errors' => array(
                    'contactEmail' => $this->translator->trans('order.form.preOrder.errors.user_locked',
                        array())
                ),
                'msg' => ''
            );
        // проверка на то что пользователь с таким email уже есть и он активен, следовательно необходимо авторизоваться
        } elseif ($oldUser && $oldUser->isEnabled()) {
            $result =  array(
                'result' => false,
                'errors' => array(
                    'contactEmail' => $this->translator->trans('order.form.preOrder.errors.need_to_auth',
                        array())
                ),
                'msg' => ''
            );
        }
        return $result;
    }

    /**
     * Отправка почты при создании предзаказа (фронтэнд)
     * @param CommonProduct $product
     * @param PreOrder $subscribersToProductByOrder
     * @param type $createdDateTime
     */
    private function sendEmailOnPreOrderCreate(CommonProduct $product, PreOrder $subscribersToProductByOrder, $createdDateTime)
    {
        $body = $this->templating->render('CoreOrderBundle:PreOrder/emailMessages:buyByOrderToAdmin.html.twig',
                [
                    'product' => $product,
                    'obj' => $subscribersToProductByOrder,
                    'createdDateTime' => $createdDateTime,
                    'preOrderLink' => $this->router->generate('admin_core_order_preorder_preorder_edit',
                        ['id' => $subscribersToProductByOrder->getId()], true),
                    'productLink' => $this->router->generate('core_product',
                        ['slug' => $product->getSlug()], true),
                ]);

        $subject = 'Заказ продукта ' . $product->getCaptionRu() . ' ' . $product->getArticle();
        $message = \Swift_Message::newInstance()
            ->setPriority(1)
            ->setSubject($subject)
            ->setFrom($this->params['default_email'])
            ->setTo($this->params['default_email'])
            ->setBody($body, 'text/html');
        $this->mailer->send($message);
    }

    /**
     * Проверки для состава предзаказа
     * @param PreOrderComposition $composition
     * @return string
     */
    private function checkPreOrderCompostion(PreOrderComposition $composition)
    {
        $result = [];
        $validationResult = $this->validator->validate($composition);
        if ($validationResult->count()) {
            foreach ($validationResult->getIterator() as $error) {
                $errors[$error->getPropertyPath()] = $error->getMessage();
            }
            $result =  array(
                'result' => false,
                'errors' => $errors,
                'msg' => ''
            );
        }
        return $result;
    }

    /**
     * Проверки для состава предзаказа
     * @param PreOrderComposition $composition
     * @return string
     */
    private function checkPreOrder(PreOrder $preOrder)
    {
        $result = [];
        $validationResult = $this->validator->validate($preOrder);
        if ($validationResult->count()) {
            foreach ($validationResult->getIterator() as $error) {
                $pathName = $error->getPropertyPath();
                if ($pathName == 'firstName' || $pathName == 'lastName' || $pathName == 'surName') {
                    $errors['fio'] = $this->translator->trans('msg.fioError', [], 'frontend');
                } else {
                    $errors[$error->getPropertyPath()] = $error->getMessage();
                }
                
            }
            $result =  array(
                'result' => false,
                'errors' => $errors,
                'msg' => ''
            );
            $checkResult = $this->checkPreOrderCompostion($preOrder->getCompositions()->first());
            if (isset($checkResult['errors'])) {
                $result['errors'] += $checkResult['errors'];
            }
        }
        
        return $result;
    }

    /**
     * Получить ошибки от формы
     * @param \Symfony\Component\Form\Form $form
     * @return type
     */
    private function getFormErrorMessages(\Symfony\Component\Form\Form $form, $return = false) {
        $errors = array();

        foreach ($form->getErrors() as $key => $error) {
            if ($return) {
                return $error->getMessage();
            } else {
                $errors[$key] = $error->getMessage();
            }
        }

        foreach ($form->all() as $child) {
            if (!$child->isValid()) {
                
                $errors[$child->getName()] = $this->getFormErrorMessages($child, true);
            }
        }

        return $errors;
    }

}