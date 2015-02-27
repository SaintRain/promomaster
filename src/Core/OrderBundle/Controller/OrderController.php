<?php

/**
 * Контроллер заказов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Core\OrderBundle\Form\Type\BuyerInfoFormType;
use Core\OrderBundle\Form\Type\DeliveryFormType;
use Application\Sonata\UserBundle\Form\Type\IndiFormType;
use Symfony\Component\Security\Core\SecurityContext;
use Application\Sonata\UserBundle\Entity\IndiContragent;
use Application\Sonata\UserBundle\Entity\IndiContact;
use Application\Sonata\UserBundle\Entity\LegalContact;
use Symfony\Component\HttpFoundation\Response;
use Application\Sonata\UserBundle\Entity\CommonContact;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\UnitOfWork;
use Core\DeliveryBundle\Entity\ServiceWithAddress;
use Core\DeliveryBundle\Entity\ServiceInCity;

class OrderController extends Controller
{

    /**
     * Шаг 1. Корзина, вывод продукции, смена кол-ва
     *
     * @author Sergeev A.M.
     */
    public function step1Action()
    {
        // Очищаем выбранную доставку и данные пользователя, если он перешел на этот шаг
        $this->get('session')->remove('buyer_with_delivery');
        $this->get('session')->remove('current_contact_id');

        $data = $this->get('core_order_logic')->getFullOrderInfo();

        if (null === $data && $this->get('session')->get('current_contragent_id')) {
            $notPaidOrders = $this->getDoctrine()->getManager()->getRepository('CoreOrderBundle:Order')->findBy(['isPaidStatus' => false, 'contragent' => $this->get('session')->get('current_contragent_id')]);
        } else {
            $notPaidOrders = [];
        }

        return $this->render('CoreOrderBundle:Order:step1.html.twig', array(
                'data' => $data,
                'countNotPaidOrders' => count($notPaidOrders),
                'confines' => $this->get('core_order_logic')->checkMinSumForOrder(['order' => $data['order']]),
        ));
    }

    /**
     * Шаг 3.5. Промежуточный. Проверка на наличие денег на балансе и выбор как оплатить заказ,
     * если баланс позволяет, то спрашиваем у пользователя как он хочет поступить
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Core\OrderBundle\Controller\RedirectResponse
     * @author Sergeev A.M.
     */
    public function step3_5Action(Request $request)
    {
        $result = $this->get('core_order_logic')->step3_5($request);

        if ($result['action'] == 'redirect') {
            return $this->redirect($result['url']);
        } else {
            return $this->render('CoreOrderBundle:Order:step3_5.html.twig', array(
                    'data' => $result['data'],
                    'balance' => $result['balance'],
            ));
        }
    }

    /**
     * Шаг 4. Выбор способа оплаты
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Core\OrderBundle\Controller\RedirectResponse
     * @author Sergeev A.M.
     */
    public function step4Action(Request $request)
    {
        $result = $this->get('core_order_logic')->step4($request);

        if ($result['action'] == 'redirect') {
            return $this->redirect($result['url']);
        } else {
            return $this->render('CoreOrderBundle:Order:step4.html.twig', array(
                    'messages' => $result['messages'],
                    'data' => $result['data'],
                    'paymentSytems' => $result['paymentSytems'],
                    'isSupplyPlacticCard' => $result['isSupplyPlacticCard'],
            ));
        }
    }

    /**
     * Завершение покупки
     * Уведомление пользователя выполнении/невыполнении платежа
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param string $paymentSystem
     * @author Sergeev A.M.
     */
    public function finishAction(Request $request, $paymentSystem)
    {
        $result = $this->get('core_order_logic')->finish($request, $paymentSystem);

        if ($result['action'] == 'redirect') {
            return $this->redirect($result['url']);
        } else {
            return $this->render('CoreOrderBundle:Order:finish.html.twig', array(
                    'orderCostInfo' => $result['orderCostInfo'],
                    'paymentSystem' => $result['paymentSystem'],
                    'messages' => $result['messages'],
                    'payment' => $result['payment'],
                    'balance' => $result['balance'],
                    'order' => $result['order'],
            ));
        }
    }

    /**
     * Данные о пользователе (Корзина - шаг 2)
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function buyerInfoAction(Request $request)
    {
        $res = $this->get('core_order_logic')->setBuyerInfo($request);
        //делаем перенаправление
        if (isset($res['redirect'])) {
            return new RedirectResponse($this->get('router')->generate($res['redirect']));
        }

        return $this->render('CoreOrderBundle:Order:step2.html.twig', array(
                'indiForm' => ($res['indiForm']) ? $res['indiForm']->createView() : null,
                'legalForm' => ($res['legalForm']) ? $res['legalForm']->createView() : null,
                'data' => $res['data'],
                'isIndi' => $res['isIndi'],
                'isCartEmpty' => $res['isCartEmpty']
        ));
    }

    /**
     * Выбор споособа доставки (корзина - шаг 3)
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deliveryAction(Request $request)
    {
        $res = $this->get('core_order_logic')->selectDeliveryMethod($request);
        //делаем перенаправление
        if (isset($res['redirect'])) {
            return new RedirectResponse($this->get('router')->generate($res['redirect']));
        }
        return $this->render('CoreOrderBundle:Order:step3.html.twig', array(
                'data' => $res['data'],
                'serviceTypeList' => $res['serviceTypeList'],
                'serviceList' => $res['serviceList'],
                'form' => $res['form']->createView(),
                'contact' => $res['contact'],
                'activeServices' => $res['activeServices'],
                'isCartEmpty' => $res['isCartEmpty'],
                'deliveryMethodId' => $res['deliveryMethodId'],
                'deliveryPoint' => $res['deliveryPoint']
        ));
    }

    /**
     * Добавление или изменение контактного лица
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws type
     */
    public function contactAction(Request $request)
    {
        $result = $this->get('core_order_logic')->getContact($request);

        $response = new Response(json_encode($result));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

}
