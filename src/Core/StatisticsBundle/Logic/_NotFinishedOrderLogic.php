<?php

/**
 * Сервис для незавершенных заказов
 *
 * @author Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\StatisticsBundle\Logic;

use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityManagerInterface;
use Core\StatisticsBundle\Entity\NotFinishedOrder;
use Core\StatisticsBundle\Entity\NotFinishedOrderComposition;
use Core\OrderBundle\Entity\Order;
use Doctrine\Common\Collections\ArrayCollection;

class NotFinishedOrderLogic
{
    protected $session;

    protected $security;

    protected $em;


    public function __construct(EntityManagerInterface $em, Session $session, SecurityContext $security)
    {
        $this->em = $em;
        $this->security = $security;
        $this->session = $session;
    }

    public function createUpdate(Order $order)
    {
        //$this->session->set('notFinishedOrderId', null);
        //$this->session->set('notFinishedOrderId', 8);

        if ($this->session->get('notFinishedOrderId')) {
            $id = $this->update($order);
        } else {
            $id = $this->create($order);
        }
        $this->session->set('notFinishedOrderId', $id);
        //ldd($id);
    }

    /**
     * @param Order $order
     * @param UserInterface $user
     * @return int
     * @link http://stackoverflow.com/questions/2226103/how-to-cast-objects-in-php
     */
    protected function create(Order $order)
    {
        $notFinishedOrder = new NotFinishedOrder();
        foreach($order->getCompositions() as $val) {
            $composition = new NotFinishedOrderComposition();
            $composition->populate($val);
            $notFinishedOrder->addComposition($composition);
        }
        $contragent = ($order->getContragent()) ? $order->getContragent() : $this->getContragent();
        $notFinishedOrder->setContragent($contragent);
        $this->em->persist($notFinishedOrder);
        $this->em->flush();

        return $notFinishedOrder->getId();
    }

    protected function update(Order $order)
    {
        $updateComposition = [];
        $id = $this->session->get('notFinishedOrderId');
        $notFinishedOrder = $this->em->getRepository('CoreStatisticsBundle:NotFinishedOrder')->find((int)$id);
        if (!$notFinishedOrder) {           
            $id = $this->create($order);
            $notFinishedOrder = $this->em->getRepository('CoreStatisticsBundle:NotFinishedOrder')->find((int)$id);
        }
        $old = $this->createArray($notFinishedOrder->getCompositions());
        $new = $this->createArray($order->getCompositions(), reset($old));
        $removeElts = array_diff_key($old, $new);
        if (count($removeElts)) {
            foreach($removeElts as $key => $val) {
                if (isset($old[$key])) {
                    $composition = $notFinishedOrder->getCompositions()->get($old[$key]['id']);
                    $notFinishedOrder->removeComposition($composition);
                    unset($old[$key]);
                }
            }
        }

        foreach($new as $rowKey => $row) {
            if (isset($old[$rowKey])) {
                $composition = null;
                foreach($row as $key => $val) {
                    if (!($key == 'product' || $key == 'id' || $key == 'order') && $old[$rowKey][$key] != $val) {
                        $updateComposition[$old[$rowKey]['id']][$key] = $val;
                        if (!$composition) {
                            $composition = $notFinishedOrder->getCompositions()->get($old[$rowKey]['id']);
                        }
                        $method = 'set' . $key;
                        if ($composition && method_exists($composition, $method)) {
                            $composition->$method($val);
                        }
                    }
                }

                if ($composition) {
                    $notFinishedOrder->getCompositions()->set($old[$rowKey]['id'], $composition);
                }
            } else {
                $composition = new NotFinishedOrderComposition();
                $composition->populate(null, $row);
                $notFinishedOrder->addComposition($composition);
            }
        }
        /*
        if (count($updateComposition)) {
            echo 'update';
            echo "<br />";
            $ids = array_keys($updateComposition);
            $compositions = $this->em->getRepository('CoreStatisticsBundle:NotFinishedOrderComposition')->findByIds($ids);
            foreach($compositions as $composition) {
                $data = $updateComposition[$composition->getId()];
                foreach($data as $key => $val) {
                    $method = 'set' . $key;
                    if ( method_exists($composition, $method)) {
                        $composition->$method($val);
                    }
                }
            }
        }*/
        //die('before safe');
        $contragent = ($order->getContragent()) ? $order->getContragent() : $this->getContragent();

        $notFinishedOrder->setContragent($contragent)->setDeliveryMethod($order->getDeliveryMethod());
        $this->em->flush();

        return $notFinishedOrder->getId();
    }

    /**
     * Удаление незавершенного заказа
     */
    public function delete()
    {
        $id = $this->session->get('notFinishedOrderId');
        if ($id) {
            $notFinishedOrder = $this->em->getRepository('CoreStatisticsBundle:NotFinishedOrder')->find((int)$id);
            $this->em->remove($notFinishedOrder);
            $this->em->flush();
            $this->session->remove('notFinishedOrderId');
        }
    }

    /**
     * Преобразование коллекции состава заказа к массиву
     * @param $input - коллекция состава заказа
     * @param array $fields - необхоидмые поля
     * @return array
     */
    private function createArray($input, $fields = array())
    {
        $result = [];
        foreach($input as $row) {
            $data = $row->toCompareArray($fields);
            foreach($data as $key => $val) {
                $result[$key] = $val;
            }
        }
        return $result;
    }

    private function getContragent()
    {
        $id = $this->session->get('current_contragent_id');
        if ($id) {
            $contragent = $this->em->getRepository('ApplicationSonataUserBundle:CommonContragent')->find((int)$id);
            return $contragent;
        }
        return null;
    }

} 