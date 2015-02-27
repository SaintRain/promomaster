<?php

/**
 * Одноразовые талоны доступа для авторизации юзера по ссылке
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Core\DirectoryBundle\Entity\City;

class CouponAccess {

    /**
     * @var integer
     */
    protected $id;

    /**
     * Проверочный Хеш, который добавляется к ссылке
     * @var string
     */
    protected $hash;

    /**
     * Какого пользователя нужно авторизовать
     * @var object 
     */
    protected $user;

    /**
     * Время добавления 
     * @var \DateTime 
     */
    protected $createdAt;

    /**
     * URL куда нужно перенаправить пользователя
     * @var string
     */
    protected $url;

    public function getId() {
        return $this->id;
    }

    public function getHash() {
        return $this->hash;
    }

    public function getUser() {
        return $this->user;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setHash($hash) {
        $this->hash = $hash;
        return $this;
    }

    public function setUser($user) {
        $this->user = $user;
        return $this;
    }

    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt) {
        $this->createdAt = $createdAt;
        return $this;
    }

}
