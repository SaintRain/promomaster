<?php

/**
 * Класс логов для юзера
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserLog
 */
class UserLog
{
    /**
     * @var integer
     */
    private $id;

    /**
     * IP с которого происходила авторизация
     * @var string
     */
    private $ip;

    /**
     * Дата авторизации
     * @var \DateTime
     */
    private $loginDateTime;

    /**
     * Авторизация через соц. сеть (имя) или логин
     * @var string
     */
    private $loginBySocial;

    /**
     * Пользователь
     * @var Application\Sonata\UserBundle\Entity\User
     */
    private $user;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return UserLog
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set loginDateTime
     *
     * @param \DateTime $loginDateTime
     * @return UserLog
     */
    public function setLoginDateTime($loginDateTime)
    {
        $this->loginDateTime = $loginDateTime;

        return $this;
    }

    /**
     * Get loginDateTime
     *
     * @return \DateTime 
     */
    public function getLoginDateTime()
    {
        return $this->loginDateTime;
    }

    /**
     * Set loginBySocial
     *
     * @param string $loginBySocial
     * @return UserLog
     */
    public function setLoginBySocial($loginBySocial)
    {
        $this->loginBySocial = $loginBySocial;

        return $this;
    }

    /**
     * Get loginBySocial
     *
     * @return string 
     */
    public function getLoginBySocial()
    {
        return $this->loginBySocial;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }
    
}
