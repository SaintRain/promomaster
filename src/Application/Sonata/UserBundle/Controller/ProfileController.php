<?php

/**
 * Контроллер профиля пользователя
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Application\Sonata\UserBundle\Form\Type\ProfileFormType;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

// Если нам необходим фунционал fosuser
//use Sonata\UserBundle\Controller\ProfileController as BaseController;

/**
 * Controller managing the user profile
 * Важно!!! Sonata и FOS имеют ряд различающихся экшенов
 * поэтому наследоваться стоит от Sonata
 *
 * @author Sergeev A.M.
 */
class ProfileController extends Controller {

    /**
     * Личная Страница пользователя
     * @return Response
     *
     * @throws AccessDeniedException
     */
    public function showAction(Request $request) {
        $user = $this->getUser();
        $form = $this->createForm(new ProfileFormType(), $user);
        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {
                $this->setFlash('profile_edit_success', 'profile_edit_success');
                return new RedirectResponse($this->generateUrl('sonata_user_profile_show'));
            }
        }
        return $this->render('ApplicationSonataUserBundle:Profile:edit.html.twig', array(
                    'user' => $user,
                    'form' => $form->createView()
        ));
    }

    public function editProfileAction() {
        $em = $this->getDoctrine()->getManager();
        $contragents = $em->getRepository('ApplicationSonataUserBundle:CommonContragent')->getByParams();

        $user = $this->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $form = $this->container->get('fos_user.profile.form');
        $formHandler = $this->container->get('fos_user.profile.form.handler');

        $process = $formHandler->process($user);
        if ($process) {
            //$this->setFlash('profile_edit_success', 'profile.edit.success');
            return new RedirectResponse($this->generateUrl('sonata_user_profile_show'));
        }
        return $this->render('ApplicationSonataUserBundle:Profile:edit.html.twig', array(
                    'user' => $user,
                    'form' => $form->createView()
        ));
    }

    /**
     * Установка сообщений
     * @param string $action
     * @param string $value
     */
    protected function setFlash($action, $value) {
        $this->container->get('session')->getFlashBag()->set($action, $value);
    }

    /**
     * Вывод избранных товаров в личном кабинете
     *
     * @param int $page
     * @return \Symfony\Component\HttpFoundation\Response
     * @author Sergeev A.M.
     */
//    public function productsFavoriteAction($page = 1) {
//        $result = $this->get('application_user_logic')->productsFavorite($page);
//
//        if ($result['action'] == 'redirect') {
//            return $this->redirect($result['url']);
//        } else {
//            return $this->render('ApplicationSonataUserBundle:Profile:products_favorite.html.twig', array(
//                        'products' => $result['products'],
//                        'favoriteProductsIds' => $result['favoriteProductsIds'],
//                        'showLimit' => $result['showLimit'],
//            ));
//        }
//    }

    /**
     * Вывод истории просмотренных товаров в личном кабинете
     *
     * @param int $page
     * @return \Symfony\Component\HttpFoundation\Response
     * @author Sergeev A.M.
     */
//    public function productsHistoryAction($page = 1) {
//        $result = $this->get('application_user_logic')->productsHistory($page);
//
//        if ($result['action'] == 'redirect') {
//            return $this->redirect($result['url']);
//        } else {
//            return $this->render('ApplicationSonataUserBundle:Profile:products_history.html.twig', array(
//                        'products' => $result['products'],
//                        'favoriteProductsIds' => $result['favoriteProductsIds'],
//                        'showLimit' => $result['showLimit'],
//            ));
//        }
//    }

    /**
     * Вывод истории всех заказов
     *
     * @param int $page
     * @return \Symfony\Component\HttpFoundation\Response
     * @author Sergeev A.M.
     */
//    public function ordersHistoryListAction($page = 1) {
//        $result = $this->get('application_user_logic')->ordersHistoryList($page);
//
//        if ($result['action'] == 'redirect') {
//            return $this->redirect($result['url']);
//        } else {
//            return $this->render('ApplicationSonataUserBundle:Profile:orders_history_list.html.twig', array(
//                        'orders' => $result['orders'],
//                        'ordersHelpData' => $result['ordersHelpData'],
//            ));
//        }
//    }

    /**
     * Вывод заказа подробно
     *
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @author Sergeev A.M.
     */
//    public function orderMoreAction(Request $request, $id) {
//        $result = $this->get('application_user_logic')->orderMore($request, $id);
//
//        if ($result['action'] == 'redirect') {
//            return $this->redirect($result['url']);
//        } else {
//            return $this->render('ApplicationSonataUserBundle:Profile:order_more.html.twig', array(
//                        'order' => $result['order'],
//                        'orderCostInfo' => $result['orderCostInfo'],
//                        'paymentSytems' => $result['paymentSytems'],
//                        'isSupplyPlacticCard' => $result['isSupplyPlacticCard'],
//            ));
//        }
//    }

    /**
     * Вывод на печать:
     * * * Гарантийный талон
     * * * Печатная форма заказа
     * * * Товарная накладная
     *
     * @param int $id
     * @param string $type
     * @return \Symfony\Component\HttpFoundation\Response
     * @author Sergeev A.M.
     */
//    public function orderPrintAction($id, $needStamps = false, $type) {
//        $user = $this->get('security.context')->getToken()->getUser();
//
//        switch ($type) {
//            case 'warranty':
//                return $this->get('core_order_logic')->generateGuarantees($id, $needStamps);
//            case 'waybill':
//                $order = $this->getDoctrine()->getManager()->getRepository('CoreOrderBundle:Order')->findUserOrders(['user' => $user, 'orderId' => $id]);
//                return $this->get('core_order_logic')->generateWaybillAtTheDate($id, $order->getCreatedDateTime());
//            case 'self':
//                return $this->get('core_order_logic')->generateOrderPrintPage($id, $user);
//        }
//    }

    /**
     * Перенаправление на оплату по заказу
     * @param type $id
     * @param type $paymentSystem
     * @return type
     */
//    public function toPayForOrderPOSTAction(Request $request, $id, $paymentSystem) {
//
//        $request->setMethod('POST');
//        $request->request->set('PaymentSystem', $paymentSystem);
//        $request->request->set('orderId', $id);
//        $response = $this->forward('ApplicationSonataUserBundle:Profile:orderMore', array(
//            'request' => $request,
//            'id' => $id
//        ));
//
//        return $response;
//    }

}
