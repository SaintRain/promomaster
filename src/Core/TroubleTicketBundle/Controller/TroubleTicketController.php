<?php

/**
 * Контроллер для траблтикетов
 * @author  Kaluzhny.N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\TroubleTicketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use Core\TroubleTicketBundle\Entity\Message;
use Core\TroubleTicketBundle\Entity\TroubleTicket;
use Core\TroubleTicketBundle\Form\Type\MessageType;
use Core\TroubleTicketBundle\Form\Type\TroubleTicketType;
use Symfony\Component\HttpFoundation\Response;

class TroubleTicketController extends Controller {

    public function indexAction($owner = null)
    {
        $em = $this->getDoctrine()->getManager();
        if ($owner == null && $this->getUser()) {
            $tickets = $em->getRepository('CoreTroubleTicketBundle:TroubleTicket')->findByAuthUser($this->getUser());
        } else {
            $tickets = $em->getRepository('CoreTroubleTicketBundle:TroubleTicket')->findByOwner($owner);
        }
        /*
         if (!$tickets) {
             throw $this->createNotFoundException('Ticket Not Found');
         }
        */
        return $this->render('CoreTroubleTicketBundle:TroubleTicket:index.html.twig', array(
            'tickets' => $tickets
        ));
    }

    public function logAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $troubleTicket = $em->getRepository('CoreTroubleTicketBundle:TroubleTicket')->find(1);
        $oldTicket = clone $troubleTicket;
        return $this->render('CoreTroubleTicketBundle:TroubleTicket:log.html.twig', array(
            'ticket'    => $troubleTicket,
            'log'       => $troubleTicket->getLogs()->last(),
            'message'   => $troubleTicket->getMessages()->last(),
            'oldTicket' => $oldTicket,
            'ticketUrl' => $this->generateUrl('admin_core_troubleticket_troubleticket_edit', array('id' => $troubleTicket->getId()))
        ));

    }

    /**
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function contactAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $pickupPoints = $em->getRepository('CoreDeliveryBundle:Address')->findWithCity();
        $status = $em->getRepository('CoreTroubleTicketBundle:Status')->findOneBy(['sysName'=> 'novaia']);
        $priority = $em->getRepository('CoreTroubleTicketBundle:Priority')->findOneBy(['sysName'=> 'normalnyi']);
        $user = $this->getUser();

        // Если был передан id заказа для связи с тикетом,
        // ищем заказ у конкретного текущего пользователя, если у него заказа с полученым id нет, то выдаем 404
        if ($request->attributes->get('_route') === 'trouble_ticket_contact_with_order_id') {
            $order = $em->getRepository('CoreOrderBundle:Order')->findUserOrders(['user' => $user, 'orderId' => $request->attributes->get('order_id')]);
        } else {
            $order = null;
        }

        // Если был передан id продукта для связи с тикетом,
        if ($request->attributes->get('_route') === 'trouble_ticket_contact_with_product_id') {
            $product = $em->getRepository('CoreProductBundle:CommonProduct')->find($request->attributes->get('product_id'));
        } else {
            $product = null;
        }

        $printPdf  = $request->query->get('print');
        if ($printPdf == true) {
            $mpdfport =  $this->get('tfox.mpdfport');
            $html = $this->renderView('CoreTroubleTicketBundle:TroubleTicket:contact_print.html.twig', array());
            return $mpdfport->generatePdf($html, ['constructorArgs' => ['', 'A4', 0, '', 10, 10, 10, 10, 10, 10, 'P']]);
        }

        $troubleTicket = new TroubleTicket();
        $form = $this->createForm(new TroubleTicketType(), $troubleTicket, array('user' => $user, 'status' => $status, 'priority' => $priority, 'order' => $order, 'product' => $product));
        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {

                $em->persist($troubleTicket);
                $em->flush();
                $link = $this->getRequest()->getScheme() . '://' . $this->getRequest()->getHttpHost() . $this->generateUrl('trouble_ticket_edit',array('hash' => $troubleTicket->getHash()));
                $successMes = $this->get('translator')->trans('ticket.success.create',array('%number%' => $troubleTicket->getId(), '%link%' => $link));
                $this->setFlash('ticket_success', $successMes);
                $this->get('core_trouble_ticket_log_mailer')->sendCreationMessage($troubleTicket);
                return new RedirectResponse($this->generateUrl('trouble_ticket_contact'));
            }
        }

        return $this->render('CoreTroubleTicketBundle:TroubleTicket:contact.html.twig', array(
            'form' => $form->createView(),
            'order' => $order,
            'product' => $product,
            'pickupPoints' => $pickupPoints
        ));
    }

    public function editAction($hash, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $troubleTicket = $em->getRepository('CoreTroubleTicketBundle:TroubleTicket')->findByHash($hash);
        if (!$troubleTicket) {
            throw $this->createNotFoundException('Ticket Not Found');
        }
        $message = new Message();
        $form = $this->createForm(new MessageType(), $message, array('troubleTicket' => $troubleTicket));
        if ($request->getMethod() == 'POST') {

            $form->bind($request);

            if ($form->isValid()) {
                $em->persist($message);
                $em->flush();
                if (count($troubleTicket->getWatchers())) {
                    $this->get('core_trouble_ticket_log_mailer')->sendNotificationEmailMessage($troubleTicket, null, $message);
                }
                return new RedirectResponse($this->generateUrl('trouble_ticket_edit',array('hash' => $hash)));
            }

        }
        $printPdf  = $request->query->get('print');
        if ($printPdf == true) {
            $mpdfport =  $this->get('tfox.mpdfport');
            $html = $this->renderView('CoreTroubleTicketBundle:TroubleTicket:edit_print.html.twig', array(
                'ticket'    => $troubleTicket,
                'form'      => $form->createView(),
            ));
            return $mpdfport->generatePdf($html, ['constructorArgs' => ['', 'A4', 0, '', 10, 10, 10, 10, 10, 10, 'P']]);
        }
        return $this->render('CoreTroubleTicketBundle:TroubleTicket:edit.html.twig', array(
            'ticket'    => $troubleTicket,
            'form'      => $form->createView()
        ));
    }

    /**
     * Установка сообщения
     * @param string $action
     * @param string $value
     */
    protected function setFlash($action, $value)
    {
        $this->container->get('session')->getFlashBag()->set($action, $value);
    }
}

