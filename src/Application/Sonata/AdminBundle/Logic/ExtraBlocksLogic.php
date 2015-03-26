<?php

/**
 * Логика для блоков слева и снизу на редактировании заказа, пользователях в админке
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\AdminBundle\Logic;

use Core\OrderBundle\Entity\AdminCommentToOrder;
use Core\OrderBundle\Entity\PreOrder\AdminCommentToPreOrder;
use Application\Sonata\UserBundle\Entity\AdminCommentToUser;

class ExtraBlocksLogic
{

    private $domain;
    private $doctrine;
    private $securityContext;
    private $templating;
    private $mailer;
    private $email;
    private $whatShow = array(); // массив опций для отображения блоков

    public function __construct($domain_ru, $email, $doctrine, $securityContext, $templating, $mailer)
    {
        $this->domain = $domain_ru;
        $this->doctrine = $doctrine;
        $this->securityContext = $securityContext;
        $this->templating = $templating;
        $this->mailer = $mailer;
        $this->email = $email;
    }

    public function setWhatShow($whatShow)
    {
        $this->whatShow = $whatShow;
    }

    public function getWhatShow()
    {
        return $this->whatShow;
    }

    /**
     * Функция для отправки Email
     *
     * @param string $subject
     * @param string $body
     * @param string $to
     * @param string $from
     */
    private function sendEmail($subject, $body, $to = null)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom($this->email)
            ->setTo($to)
            ->setBody($body, 'text/html');

        $this->mailer->send($message);
    }

    /**
     * Обработка добавления комментария и подписки/отписки юзера
     *
     * @param object $request
     * @return array
     */
    public function leaveComment($request)
    {

        $response = array();
        $user = $this->securityContext->getToken()->getUser();
        $objectId = $request->request->get('orderId');
        $class = $request->request->get('class');
        $commentBody = trim($request->request->get('comment'));
        $isSubscribe = $request->request->get('isSubscribe');
        $em = $this->doctrine->getManager();

        if (null === $class) {
            $response['error'][] = 'Не получено имя класса!';
        } else {

            $object = $em->getRepository($class)->find($objectId);

            if (null === $object || null === $objectId) {
                $response['error'][] = 'Объект класса: "' . $class . '" не найден в БД!';
            }
        }

        if (null === $user) {
            $response['error'][] = 'Ошибка при получении пользователя!';
        }

        if (isset($response['error'])) {
            return $response;
        }

        $isExist = false;
        $subscribers = $object->getSubscribersOnAdminComments();
        foreach ($subscribers as $subscriber) {
            if ($subscriber->getId() === $user->getId()) {
                $isExist = true;
                break;
            }
        }

        // Добавляем/удаляем подписчика, если была выставлена галочка и пользователь еще не подписан
        if (null !== $isSubscribe && false === $isExist) {
            $object->addSubscribersOnAdminComments($user);
            $em->persist($object);
            $em->flush($object);
            $response['success'][] = 'Вы добавлены в подписчики!';
        } else if (null === $isSubscribe && true === $isExist) {
            $object->removeSubscribersOnAdminComments($user);
            $em->persist($object);
            $em->flush($object);
            $response['success'][] = 'Вы убраны из подписчиков!';
        }

        // Создаем новый комментарий, если есть текст комментария
        if ($commentBody) {

            switch ($class) {
                case 'Core\OrderBundle\Entity\Order':
                    $comment = new AdminCommentToOrder();
                    $comment->setOrder($object);
                    $subject = $this->domain . ' | Добавлен новый комментарий к заказу №' . $object->getId();
                    $template = 'ApplicationSonataAdminBundle:Admin\ExtraBlocks\Comments:email_message_to_order.html.twig';
                    break;
                case 'Application\Sonata\UserBundle\Entity\User':
                    $comment = new AdminCommentToUser();
                    $comment->setToUser($object);
                    $subject = $this->domain . ' | Добавлен новый комментарий к пользователю ' . $object->getUsername();
                    $template = 'ApplicationSonataAdminBundle:Admin\ExtraBlocks\Comments:email_message_to_user.html.twig';
                    break;
                case 'Core\ProductBundle\Entity\PreOrder\PreOrder':
                    $comment = new AdminCommentToPreOrder();
                    $comment->setPreOrder($object);
                    $subject = $this->domain . ' | Добавлен новый комментарий к предзаказу №' . $object->getId();
                    $template = 'ApplicationSonataAdminBundle:Admin\ExtraBlocks\Comments:email_message_to_preorder.html.twig';
                    break;
            }

            $comment->setComment($commentBody);
            $comment->setUser($user);

            $em->persist($comment);
            $em->flush($comment);

            // Рендерим комментарий в html
            $response['other']['commentHtml'] = $this->templating->render(
                'ApplicationSonataAdminBundle:Admin\ExtraBlocks\Comments:comment.html.twig', array(
                'comment' => $comment,
                'hide_comment' => true,
                )
            );

            // Делаем рассылку пользователям подписанным на добавление комментариев к этому заказу

            foreach ($subscribers as $subscriber) {
                $body = $this->templating->render($template, array(
                    'comment' => $comment,
                    'user' => $subscriber,
                    'object' => $object,
                    'domain' => $this->domain,
                ));
                $this->sendEmail($subject, $body, $subscriber->getEmail());
            }

            $response['success'][] = 'Комментарий создан успешно!';
        }

        if (empty($response)) {
            $response['error'][] = 'Получены пустые данные!';
        }

        return $response;
    }

    /**
     * Удаление комментария
     *
     * @param object $request
     * @return array
     */
    public function removeComment($request)
    {

        $response = array();
        $id = $request->request->get('id');
        $objectId = $request->request->get('orderId');
        $class = $request->request->get('class');

        $em = $this->doctrine->getManager();
        $object = $em->getRepository($class)->find($objectId);

        switch ($class) {
            case 'Core\OrderBundle\Entity\Order':
              //  $comment = $em->getRepository('CoreOrderBundle:AdminCommentToOrder')->findOneBy(['id' => $id, 'order' => $object]);
                $comment='';
                break;
            case 'Application\Sonata\UserBundle\Entity\User':
                $comment = $em->getRepository('ApplicationSonataUserBundle:AdminCommentToUser')->findOneBy(['id' => $id, 'toUser' => $object]);
                break;
        }

        if (null === $class) {
            $response['error'][] = 'Не получено имя класса!';
        } else {

            $object = $em->getRepository($class)->find($objectId);

            if (null === $object || null === $objectId) {
                $response['error'][] = 'Объект класса: "' . $class . '" не найден в БД!';
            }
        }

        if (null === $id || null === $comment) {
            $response['error'][] = 'Комментарий не найден!';
        }

        if (isset($response['error'])) {
            return $response;
        }

        $em->remove($comment);
        $em->flush();

        $response['success'][] = 'Комментарий успешно удален!';

        return $response;
    }

    /**
     * Связывания тикета с заказом
     *
     * @param object $request
     * @return array
     */
    public function attachTickets($request)
    {

        $response = array();
        $idsString = $request->request->get('ids');
        $id = $request->request->get('id');
        $class = $request->request->get('class');

        $em = $this->doctrine->getManager();
        $object = $em->getRepository($class)->find($id);

        if (null === $idsString || $idsString === '') {
            $response['error'][] = 'Введите ID тикета(ов)';
        }

        if (preg_match('/[^\d,]/', $idsString)) {
            $response['error'][] = 'Не используйте других символов кроме цифр и запятой!';
        }

        if (null === $object || null === $id) {
            $response['error'][] = 'Объект не найден!';
        }

        if (isset($response['error'])) {
            return $response;
        }

        $ids = explode(',', $idsString);

        $tickets = $em->getRepository('CoreTroubleTicketBundle:TroubleTicket')->findBy(['id' => $ids]);

        if (count($tickets) === 0) {
            $response['error'][] = 'Не найдено ни одного тикета!';
        }

        if (isset($response['error'])) {
            return $response;
        }

        $existIds = [];
        foreach ($object->getTickets() as $ticket) {
            $existIds[] = $ticket->getId();
        }

        foreach ($tickets as $ticket) {
            if (in_array($ticket->getId(), $existIds)) {
                $response['error'][] = 'Тикет с ID: ' . $ticket->getId() . ' уже привязан к текущему объекту!';
            } else {
                $object->addTicket($ticket);
                $response['success'][] = 'Тикет с ID: ' . $ticket->getId() . ' успешно привязан к текущему объекту!';
                $response['other']['ids'][] = $ticket->getId();
            }
        }

        // Рендерим таблицу тикетов в html
        if (isset($response['success'])) {
            $response['other']['ticketsHtml'] = $this->templating->render(
                'ApplicationSonataAdminBundle:Admin\ExtraBlocks\Tickets:tickets.html.twig', array(
                'tickets' => $object->getTickets(),
                )
            );
        }

        $em->persist($object);
        $em->flush();

        return $response;
    }

    /**
     * Удаления тикета из заказа, разрывается только связь, сам тикет не удаляется
     *
     * @param object $request
     * @return array
     */
    public function detachTickets($request)
    {

        $response = array();
        $id = $request->request->get('id');
        $objectId = $request->request->get('objectId');
        $class = $request->request->get('class');

        $em = $this->doctrine->getManager();
        $object = $em->getRepository($class)->find($objectId);
        $ticket = $em->getRepository('CoreTroubleTicketBundle:TroubleTicket')->findOneBy(['id' => $id]);

        if (null === $object || null === $objectId) {
            $response['error'][] = 'Объект не найден!';
        }

        if (null === $id || null === $ticket) {
            $response['error'][] = 'Тикет не найден!';
        }

        if (isset($response['error'])) {
            return $response;
        }

        $cm = $em->getClassMetadata(get_class($ticket));
        $am = $cm->getAssociationMappings();

        foreach ($am as $field => $data) {
            if (isset($data['targetEntity']) && $data['targetEntity'] === $class) {
                $ticket->{'set' . ucfirst($field)}(null);
                $response['success'][] = 'Связь с тикетом успешно удалена!';
                break;
            }
        }

        $em->persist($ticket);
        $em->flush();

        if (!isset($response['success'])) {
            $response['error'][] = 'Произошла ошибка!';
        }

        return $response;
    }

}
