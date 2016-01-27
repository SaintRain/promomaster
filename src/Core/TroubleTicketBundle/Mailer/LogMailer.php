<?php

namespace Core\TroubleTicketBundle\Mailer;

use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\Routing\RouterInterface;
use FOS\UserBundle\Mailer\MailerInterface;
use Core\TroubleTicketBundle\Entity\TroubleTicket;
use Core\TroubleTicketBundle\Entity\Message;
use Symfony\Component\Translation\Translator;

class LogMailer
{
    protected $mailer;
    protected $router;
    protected $templating;
    protected $translator;
    protected $params;
    protected $configLogic;

    public function __construct($mailer, RouterInterface $router, EngineInterface $templating, Translator $translator, $configLogic, $params)
    {
        $this->configLogic = $configLogic;
        $this->mailer = $mailer;
        $this->router = $router;
        $this->templating = $templating;
        $this->translator = $translator;
        $this->params = $params;
    }

    /**
     *
     * @param \Core\TroubleTicketBundle\Entity\TroubleTicket $ticket
     * @param \Core\TroubleTicketBundle\Entity\TroubleTicket $ticket
     * @param \Core\TroubleTicketBundle\Entity\Message $message
     * @param string $toEmail
     */
    public function sendNotificationEmailMessage(TroubleTicket $ticket, TroubleTicket $oldObject = null, Message $message = null)
    {
        if (count($ticket->getWatchers())) {
            $rendered = $this->templating->render('CoreTroubleTicketBundle:TroubleTicket:log.html.twig', array(
                'ticket'    => $ticket,
                'oldTicket' => $oldObject,
                'log'       => $ticket->getLogs()->last(),
                'message'   => $message,
                'ticketUrl' => $this->router->generate('admin_core_troubleticket_troubleticket_edit', array('id' => $ticket->getId()))
            ));
            foreach ($ticket->getWatchers() as $watcher) {
                $this->sendEmailMessage($rendered, $ticket->getTitle(), $watcher->getEmail());
            }
        }
    }

    public function sendCreationMessage(TroubleTicket $ticket)
    {
        $rendered = $this->templating->render('CoreTroubleTicketBundle:TroubleTicket:msg_create.html.twig', array(
            'ticket' => $ticket,
            'phones'=>$this->configLogic->get('phones'),
            'contactsLink' => $this->router->generate('trouble_ticket_contact', [], true),
            'ticketLink' => $this->router->generate('trouble_ticket_edit', array('hash' => $ticket->getHash()), true )
        ));

        $subject = $this->translator->trans('ticket.send.create',array('%number%' => $ticket->getId()));
        $this->sendEmailMessage($rendered, $subject, $ticket->getAuthorEmail());

        //отправляем админу уведомление
        $renderedToAdmin = $this->templating->render('CoreTroubleTicketBundle:TroubleTicket:msg_create_for_admin.html.twig', array(
            'ticket' => $ticket,
            'phones'=>$this->configLogic->get('phones'),
            'contactsLink' => $this->router->generate('trouble_ticket_contact', [], true),
            'ticketLink' => $this->router->generate('trouble_ticket_edit', array('hash' => $ticket->getHash()), true )
        ));

        $this->sendEmailMessage($renderedToAdmin, $subject, $this->params['fromEmail']);
    }

    public function sendEditMessage(TroubleTicket $ticket)
    {
        $rendered = $this->templating->render('CoreTroubleTicketBundle:TroubleTicket:msg_edit.html.twig', array(
            'ticket' => $ticket,
            'contactsLink' => $this->router->generate('trouble_ticket_contact', [], true),
            'ticketLink' => $this->router->generate('trouble_ticket_edit', array('hash' => $ticket->getHash()), true )
        ));
        $subject = $this->translator->trans('ticket.send.edit',array('%number%' => $ticket->getId()));
        $this->sendEmailMessage($rendered, $subject, $ticket->getAuthorEmail());
    }
    
    /**
     * @param string $renderedTemplate
     * @param string $toEmail
     */
    protected function sendEmailMessage($renderedTemplate, $subject, $toEmail)
    {
        $body = $renderedTemplate;
        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($this->params['fromEmail'], $this->params['fromName'])
            ->setTo($toEmail)
            ->setBody($body, 'text/html');

        $this->mailer->send($message);
    }

    /**
     * @deprecated Устаревшее
     * Построение текста для изменений в логе
     * @param array $changeSet - список измененныйх полей
     * @param object $object - новое состояние тикета
     * @param object $oldObject - старое состояние тикета
     * @param boolean $fullDesc - полное описание
     * @return string
     */
    protected function createLogBody($changeSet, $object, $oldObject, $fullDesc = true)
    {
        $string = '';
        if ($fullDesc) {
            foreach($changeSet as $field => $param) {
                if ($field == 'file') {
                    $string .= $this->createFilesDesc($param['data'],$param['operation']);
                } else {
                    $string .= '<li>Параметр ' . $this->admin->trans('parameter.' . $field) . ' Изменился ';
                    $geter = 'get' . $field;
                    $string .= $this->activateMethod($oldObject, $param[0], $geter);
                    $string .= $this->activateMethod($object, $param[1], $geter, 'на');
                    $string .= '</li>';
                }

            }
        } else {
            foreach($changeSet as $field) {
                $string.= '<li>'.$this->admin->trans('parameter.' . $field) . ' Обновлено</li>';
            }
        }

        if ($string) {
            $string = '<ul>' .$string . '</ul>';
        }
        return $string;
    }

    /**
     * @deprecated Устаревшее
     * @param object $object - Тикет
     * @return string
     */
    public function createSignatureBody($object)
    {
       $string = '<hr />';
       $string .= '<h2><a href="' . $this->generateUrl('admin_core_troubleticket_troubleticket_edit', array('id' => $object->getId())) .'">' . $object->getTitle() . '</a></h2>';
       $string .= '<ul>';
       $string .= '<li> Автор: ' . (($object->getAuthorName()) ? $object->getAuthorName() : $object->getAuthorEmail()) . '</li>';
       $string .= '<li> Статус: ' . $object->getStatus()->getCaptionRu() . '</li>';
       $string .= '<li> Приоритет: ' . $object->getPriority()->getCaptionRu() . '</li>';
       $string .= '<li> Назначена: ' . $object->getManager()->getUserName() . '</li>';
       $string .= '<li> Категория: ' . $object->getCategory()->getCaptionRu() . '</li>';
       $string .= '</ul>';
       return  $string;
    }

    /**
     * @deprecated Устаревшее
     * Выполение метода для заданного объекта
     * @param object $object - Тикет
     * @param string $param - параметр для метода
     * @param string $mainMethod - метод с параметром
     * @param string $word - слово для склеивания
     * @param array $methods - методы по умолчанию
     * @return string
     */
    protected function activateMethod($object, $param, $mainMethod, $word = 'c',  $methods = array('getCaptionRu','getUserName'))
    {
        $result = '';
        if (method_exists($object, $mainMethod)) {
            $result = $object->$mainMethod($param);
            if (is_object($result)) {
                foreach($methods as $method) {
                    if (method_exists($result, $method)) {
                        $result = $result->$method();
                    }
                }
            } elseif ($mainMethod == 'getreadiness') {
                $result .= '%';
            }
        }
        if ($result) {
            $result = ' '.$word .' '. $result;
        }
        return $result;
    }

    /**
     * @deprecated Устаревшее
     * Форматирование строки о изменившем
     * @param object $logMsg - Лог и Сообщение
     * @param object $object - Тикет
     * @return string
     */
    protected function createChangerName($logMsg, $object)
    {

        if ($logMsg->getManager()) {
            return $logMsg->getManager()->getUserName();
        } elseif ($object->getAuthorName()) {
            return $object->getAuthorName();
        }
        return $object->getAuthorEmail();
    }

    /**
     * @deprecated Устаревшее
     * Форматирование строки о измениях в файлах
     * @param array $files - список файлов
     * @param string $operation - тип опреции
     * @return string
     */
    protected function createFilesDesc($files, $operation)
    {
        $string = '';
        if ($operation == 'add') {
            foreach($files as $key => $file) {
                $string .= $this->admin->trans('parameter.file') . ' <a href=\'' . $key . '\'>' . $file . '</a> ' . $this->admin->trans('parameter.' . $operation) . '<br />';
            }
        } else {
            foreach($files as $file) {
                $string .= $this->admin->trans('parameter.file') . ' <span>' . $file . '</span> ' . $this->admin->trans('parameter.' . $operation) . '<br />';
            }
        }
        return $string;
    }
}