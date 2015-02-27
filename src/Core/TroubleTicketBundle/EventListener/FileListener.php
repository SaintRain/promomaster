<?php

/**
 * Класс подпиcчик для загружаемых файлов
 * @author  Kaluzhny.N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\TroubleTicketBundle\EventListener;

use Core\FileBundle\Event\FileEvent;
use Core\TroubleTicketBundle\Entity\Log;
use Core\TroubleTicketBundle\Entity\TroubleTicket;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Session\Session;

class FileListener
{
    protected $em;
    protected $log;
    protected $context;

    public function __construct(EntityManager $em, SecurityContext $context, Session $session)
    {
        $this->em = $em;
        $this->context = $context;
        $this->log = new Log();
        $this->session = $session;
    }

    public function onFileUpload(FileEvent $event)
    {
        $result = $event->getResult();
        if (isset($result['success']) && isset($result['other']['objToAttach']) && $result['other']['objToAttach'] instanceof TroubleTicket) {
            $changes = ($this->session->get('uploadFiles')) ? $this->session->get('uploadFiles') : array();
            $changes['file']['operation'] = 'add';
            foreach($result['data'] as $key => $val) {
                $firstEl = reset($val);
                $changes['file']['data'][$key] = preg_replace('/_\d+./', '.', $firstEl['name']); // убираем id из названия файла
            }
            $this->session->set('uploadFiles',$changes);
        }
    }

    public function onFileDelete(FileEvent $event)
    {
        $result = $event->getResult();
        if (isset($result['success']) && isset($result['other']['namespace_to_attach']) && $result['other']['namespace_to_attach']  == 'Core\TroubleTicketBundle\Entity\TroubleTicket') {
            $changes = array();
            $data = $this->session->get('uploadFiles');
            $user = $this->context->getToken()->getUser();
            if ($user && $this->context->isGranted('ROLE_ADMIN')) {
                $this->log->setManager($user);
            }
            if ($data) {
                if (array_key_exists($result['other']['idRemoved'], $data['file']['data'])) {
                    unset($data['file']['data'][$result['other']['idRemoved']]);
                    $this->session->set('uploadFiles',$data);
                } else {
                    $changes['file']['data'][$key] = preg_replace('/_./', '.', $result['other']['nameRemoved']); // убираем id из названия файла
                    $changes['file']['operation'] = 'delete';
                    $this->createLog($changes);
                }
            } else {
                $changes['file']['operation'] = 'delete';
                $changes['file']['data'][$result['other']['idRemoved']] = preg_replace('/_./', '.', $result['other']['nameRemoved']); // убираем id из названия файла
                $this->createLog($changes, $result['other']['idToAttach']);
            }
            
        }

    }

    protected function createLog($changes, $ticketId) {
        $ticket = $this->em->getRepository('CoreTroubleTicketBundle:TroubleTicket')->find($ticketId);
        $this->log->setDate(new \DateTime());
        $this->log->setChanges($changes);
        $this->log->setTroubleTicket($ticket);
        $this->em->persist($this->log);
        $this->em->flush();
    }
}
