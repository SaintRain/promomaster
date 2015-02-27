<?php

/**
 * Контроллер для траблтикетов, обрабатывает ajax-запросы
 * @author  Kaluzhny.N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\TroubleTicketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Core\TroubleTicketBundle\Entity\Log;

class AjaxTroubleTicketController extends Controller {

    public function readAction($hash) {
        if (!$this->get('request')->isXmlHttpRequest()) {
            throw $this->createNotFoundException('Bad Request');
        }
        $em = $this->getDoctrine()->getManager();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $troubleTicket = $em->getRepository('CoreTroubleTicketBundle:TroubleTicket')->findByHash($hash);
        if (!$troubleTicket) {
            $content = array('status' => false);
            $response->setContent(json_encode($content));
            return $response;
        }

        $troubleTicket->setUpdatedDateTime(new \DateTime());
        $troubleTicket->setAdminAnswers();
        $em->flush();
        
        $content = array('status' => true, 'ticketId' => $troubleTicket->getId());
        $response->setContent(json_encode($content));
        
        return $response;
    }

    public function closeAction($id) {
        if (!$this->get('request')->isXmlHttpRequest()) {
            throw $this->createNotFoundException('Bad Request');
        }
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');

        $em = $this->getDoctrine()->getManager();
        $troubleTicket = $em->getRepository('CoreTroubleTicketBundle:TroubleTicket')->find($id);
        $status = $em->getRepository('CoreTroubleTicketBundle:Status')->findBySysName('closed');
        if (!$troubleTicket || !$status) {
            $content = array('status' => false);
            $response->setContent(json_encode($content));
            return $response;
        }
        $oldTroubleTicket = clone $troubleTicket;
        $troubleTicket->setUpdatedDateTime(new \DateTime());
        $troubleTicket->setAdminAnswers();
        $troubleTicket->setStatus($status);
        $troubleTicket->setAdminAnswers(0);
        $troubleTicket->setIsAdminAnswer(0);

        $changes = array('status' => array($oldTroubleTicket->getStatus()->getId(), $troubleTicket->getStatus()->getId()));
        $log = new Log();
        $log->setTroubleTicket($troubleTicket);
        $log->setDate(new \DateTime());
        $log->setChanges($changes);
        $troubleTicket->addLog($log);
        if (count($troubleTicket->getWatchers())) {
            $this->get('core_trouble_ticket_log_mailer')->sendNotificationEmailMessage($troubleTicket, $oldTroubleTicket);
        }
        $em->persist($log);
        $em->flush();

        $content = array('status' => $status->getCaptionRu(), 'ticketId' => $troubleTicket->getId());
        $response->setContent(json_encode($content));

        return $response;
    }

}

