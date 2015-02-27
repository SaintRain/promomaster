<?php

/**
* Класс событие который будет передан всем подписчикам
* @author  Kaluzhny.N.I.
 * @copyright LLC "PromoMaster"
*/

namespace Core\FileBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class FileEvent extends Event
{
    protected $result;

    public function __construct($result)
    {
        $this->result = $result;
    }

    public function getResult()
    {
        return $this->result;
    }

}
