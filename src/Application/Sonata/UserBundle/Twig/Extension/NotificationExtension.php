<?php

/**
 * Twig расширения для работы с деньгами
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Twig\Extension;

use Symfony\Component\Intl\Intl;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Application\Sonata\UserBundle\Entity\User;

class NotificationExtension extends \Twig_Extension
{

    private $doctrine;
    private $securityContext;
    private $session;

    public function __construct($doctrine, $securityContext, $session)
    {
        $this->doctrine = $doctrine;
        $this->securityContext = $securityContext;
        $this->session = $session;
    }

    public function getFunctions()
    {
        return array(
            'getOrderNotification' => new \Twig_Function_Method($this, 'getOrderNotificationFunction'),
            'getCurrentContragent' => new \Twig_Function_Method($this, 'getCurrentContragentFunction'),
            'getTicketsNotification' => new \Twig_Function_Method($this, 'getTicketsNotification'),
        );
    }

    /**
     * Получаем кол-во заказов для вывода уведомления для пользователя
     * (не отмененные и не отгруженные)
     *
     * @return integer
     */
    public function getOrderNotificationFunction($contragent = null)
    {
        if (null === $contragent) {
            $contragent = $this->session->get('current_contragent_id');
        }

       // $count = $this->doctrine->getManager()->getRepository('CoreOrderBundle:Order')->notification($contragent);
        $count=0;
        return $count;
    }

    /**
     * Получаем текущего контрагента
     * (не отмененные и не отгруженные)
     *
     * @return integer
     */
    public function getCurrentContragentFunction()
    {
        $contragent = null;
        $id = $this->session->get('current_contragent_id');
        if (null !== $id) {
            $contragent = $this->doctrine->getManager()->getRepository('ApplicationSonataUserBundle:CommonContragent')->findForDiscount($id);

            if (null === $contragent) {
                $user = $this->securityContext->getToken()->getUser();
                if (method_exists($user, 'getContragents') && false === $user->getContragents()->isInitialized()) {
                    $user->getContragents()->initialize();
                    if ($user->getContragents()->count() > 0) {
                        $contragent = $user->getContragents()->first();

                        $this->session->set('current_contragent_id', $contragent->getId());
                        $this->session->set('current_contragent_namespace', get_class($contragent));
                    }
                }
            }
        }

        return $contragent;
    }

    /**
     * Кол-во новых ответов от админа пользователю
     * @author Kaluzhniy. N.
     * @return int
     */
    public function getTicketsNotification()
    {
       $ticketsNotification = 0;
       if ($this->securityContext->getToken()) {
           $token = $this->securityContext->getToken();
           if ($token->getUser() && $token->getUser() instanceof User) {
               $ticketsNotification = $this->doctrine->getRepository('CoreTroubleTicketBundle:TroubleTicket')->getNotification($token->getUser());
           }
       }

       return $ticketsNotification;
    }

    public function getName()
    {
        return 'notification_extension';
    }

}
