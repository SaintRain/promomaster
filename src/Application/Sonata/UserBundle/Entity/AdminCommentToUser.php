<?php

/**
 * Комментарии к пользователю
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Application\Sonata\UserBundle\Entity;

class AdminCommentToUser
{

    /**
     * Первичный ключ
     */
    protected $id;

    /**
     * Создан
     */
    private $createdAt;

    /**
     * Текст комментария
     */
    private $comment;

    /**
     * Заказ
     */
    private $toUser;

    /**
     * Пользователь, который оставил комментарий
     */
    private $user;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    public function getToUser()
    {
        return $this->toUser;
    }

    public function setToUser($toUser)
    {
        $this->toUser = $toUser;
        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

}
