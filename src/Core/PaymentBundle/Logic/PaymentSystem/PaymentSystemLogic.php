<?php
/**
 * Общий сервис для работы с платежами
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Logic\PaymentSystem;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Core\PaymentBundle\Entity\PaymentSystem\CommonPaymentSystem;
use Core\PaymentBundle\Entity\Payment;

class PaymentSystemLogic
{
    CONST LOG_REQUEST  = 'REQUEST';
    CONST LOG_RESPONSE = 'RESPONSE';
    CONST LOG_INFO     = 'INFO';
    CONST LOG_ERROR    = 'ERROR';
    CONST LOG_REFUND   = 'REFUND';

    protected $locale; // текущая локаль
    protected $currency; // дефолтная валюта
    protected $request; // данные полученный POST или GET запросом
    protected $system; // опции конкретной системы с которой работаем
    protected $container;

    public function __construct($container)
    {
        $this->locale    = $container->getParameter('locale');
        $this->currency  = $container->getParameter('default_currency');
        $this->container = $container;
    }

    public function getLocale()
    {
        return $this->locale;
    }

    protected function trans($string, array $array = array())
    {
        return $this->container->get('translator')->trans($string, $array, 'frontend');
    }

    /**
     * Подписка на событие request для получения текущей локили
     *
     * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        if ($event->getRequestType() === HttpKernel::MASTER_REQUEST) {
            $this->request = $event->getRequest();
            $this->locale  = $event->getRequest()->getLocale();
        }
    }

    /**
     * Установка настроек к определенной платежной системе
     *
     * @param \Core\PaymentBundle\Entity\PaymentSystem\CommonPaymentSystem $system
     * @return object
     * @throws NotFoundHttpException
     */
    public function setSystem($system)
    {
//        if (empty($this->system)) {
        if ($system instanceof CommonPaymentSystem) {
            $this->system = $system;
        } else {
            throw new NotFoundHttpException('$system must be instanceof Core\PaymentBundle\Entity\PaymentSystem\CommonPaymentSystem!');
        }
//        }
        return $this->system;
    }

    /**
     * Получение настроек к определенной платежной системе
     *
     * @param string $paymentSystem
     * @return object
     * @throws NotFoundHttpException
     */
    public function getSystem($paymentSystem = null)
    {
        if (empty($this->system) || null !== $paymentSystem) {
            $this->system = $this->container->get('doctrine')->getManager()->getRepository('CorePaymentBundle:PaymentSystem\CommonPaymentSystem')->findOneBySystem($paymentSystem);

            if (null === $this->system) {
                throw new NotFoundHttpException('Payment System "'.$paymentSystem.'" is not exist!');
            }
        }

        return $this->system;
    }

    public function createPaymentByChosenSystem(array $formData)
    {
        $em               = $this->container->get('doctrine')->getManager();
        $paymentSystem    = $formData['PaymentSystem'];
        $objPaymentSystem = $this->getSystem($paymentSystem);

        if (isset($formData['orderId'])) {

            $order = $em->getRepository('CoreOrderBundle:Order')->find($formData['orderId']);

            $orderCostInfo = $this->container->get('core_order_logic')->computeOrderCostInfo($order);

            $orderCost = $orderCostInfo['total_cost'];
            $customer  = $order->getContragent();
        } else {

            $sessionOrder = $this->container->get('session')->get('core_order');
            $customerId   = $this->container->get('session')->get('current_contragent_id');
            $customer     = $em->getRepository('ApplicationSonataUserBundle:CommonContragent')->find($customerId);

            if (null === $sessionOrder) {
                throw new NotFoundHttpException('Cannot get session order!');
            }

            $orderCost = $sessionOrder['total_cost'];
        }

        if (null === $customer) {
            throw new NotFoundHttpException('Cannot find contragent!');
        }

        $balance = $this->container->get('core_payment_logic')->getBalance($customer->getId(), true);
        if ($balance > 0 && $balance < $orderCost) {
            $amount = $orderCost - $balance;
        } else {
            $amount = $orderCost;
        }

        $note = '';
        if (isset($formData[$paymentSystem])) {
            $note .= $this->trans('note.form_data', ['%percent%' => $objPaymentSystem->getCommission()]);
            foreach ($formData[$paymentSystem] as $key => $value) {
                // Если в форме было поле amount то перепысываем сумму платежа
                if (strtolower($key) === 'amount') {
                    $amount = (float) $value;
                }
                $note .= "\n".ucfirst($key).': '.json_encode($value);
            }
        }

        if ($objPaymentSystem->getIsCollectCommission()) {
            $note .= "\n".$this->trans('note.collect_commission_from_user', ['%percent%' => $objPaymentSystem->getCommission()]);
            $note .= "\n".$this->trans('note.full_amount', ['%amount%' => $amount + $amount * ($objPaymentSystem->getCommission() / 100)]);
        }

        $payment = new Payment();
        $payment->setAmount($amount);
        $payment->setType(Payment::TYPE_IN);
        $payment->setSystem($objPaymentSystem);
        $payment->setCustomer($customer);
        $payment->setUserData(isset($formData[$paymentSystem]) ? $formData[$paymentSystem] : null);
        $payment->{'setNote'.ucfirst($this->locale)}($note);

        $em->persist($payment);

        if (isset($order)) {
            $order->addPayment($payment);
            $em->persist($order);
        }

        $em->flush();

        return $payment;
    }

    public function getFullAmount(Payment $payment)
    {
        if (empty($this->system)) {
            $this->setSystem($payment->getSystem());
        }
        $amount = $payment->getAmount();
        if ($this->system->getIsCollectCommission()) {
            $amount += ($amount * $this->system->getCommission() / 100);
        }

        return number_format($amount, 2, '.', '');
    }

    public function log(Payment $payment, $log, $type)
    {
        $em     = $this->container->get('doctrine')->getManager();
        $str    = date('d.m.Y H:i:s').' '.$type."\n".$log."\n";
        $oldLog = $payment->getLog();
        $payment->setLog($str."\n".$oldLog);
        $em->persist($payment);
        $em->flush($payment);

        return true;
    }

    /**
     * Проверка платежки
     *
     * @param \Core\PaymentBundle\Entity\Payment $payment
     * @throws NotFoundHttpException
     */
    public function checkPayment(Payment $payment)
    {
        if (null === $payment->getId()) {
            throw new NotFoundHttpException('Payment must be written in DB!');
        } elseif (0 >= $payment->getAmount()) {
            throw new NotFoundHttpException('Amount must be greater than zero!');
        } elseif (true === $payment->getIsPassed()) {
            throw new NotFoundHttpException('Payment must be in state not passed!');
        } elseif (null === $payment->getCustomer()) {
            throw new NotFoundHttpException('Payment must heve customer!');
        } elseif (null === $payment->getSystem()) {
            throw new NotFoundHttpException('Payment must have payment system!');
        }
        $this->setSystem($payment->getSystem());
    }

    /**
     * Получение пользователя любым возможным способом
     */
    public function getUser($id = '')
    {
        $user = null;

        if ($this->container->has('security.context') && null !== $this->container->get('security.context')->getToken()) {
            $user = $this->container->get('security.context')->getToken()->getUser();
        }

        if (null === $user || !is_object($user)) {
            $contragentId = $this->container->get('session')->get('current_contragent_id');
            if ($contragentId) {
                $contragent = $contragentId ? $this->container->get('doctrine')->getManager()->getRepository('ApplicationSonataUserBundle:CommonContragent')->find($contragentId) : null;
                if (null !== $contragent) {
                    $user = $contragent->getUser();
                }
            } elseif ($id) {
                $user = $this->container->get('doctrine')->getManager()->getRepository('ApplicationSonataUserBundle:User')->find($id);
            }
        }

        return is_object($user) ? $user : null;
    }

    /**
     * Получение URL для отправки запросов
     */
    public function getCurrentRequestURL()
    {
        return $this->system->getIsTest() ? $this->system->getRequestURLtest() : $this->system->getRequestURL();
    }

    /**
     * Возврат средств пользователю
     */
    public function doRefund($payment)
    {
        return [];
    }

    /**
     *
     */
    public function createRefundPayment($whichPayment)
    {
        if ($whichPayment->getAmountRefund() > 0) {
            $em   = $this->container->get('doctrine')->getManager();
            $no   = $this->container->get('core_common_twig_extension')->idFormatFilter($whichPayment->getId());
            $note = 'Возврат '.$whichPayment->getAmountRefund().'руб. с платежа #'.$no.', на счет контрагента.';

            $payment = new Payment();
            $payment->setAmount($whichPayment->getAmountRefund());
            $payment->setIsPassed(true);
            $payment->setType(Payment::TYPE_OUT);
            $payment->setCustomer($whichPayment->getCustomer());
            $payment->{'setNote'.ucfirst($this->locale)}($note);

            $payment->setOrder($whichPayment->getOrder());
            $payment->setParentFromWhichRefund($whichPayment);

            $em->persist($payment);
            $em->flush($payment);
        }
    }
}