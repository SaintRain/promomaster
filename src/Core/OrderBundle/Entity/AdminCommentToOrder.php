<?php

/**
 * Комментарии к заказу
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="core_order_admin_comments")
 * @ORM\Entity(repositoryClass="Core\OrderBundle\Entity\Repository\AdminCommentToOrderRepository")
 */
class AdminCommentToOrder
{

    /**
     * Первичный ключ
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Создан
     *
     * @var datetime
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * Текст комментария
     *
     * @ORM\Column(type="text", nullable=false)
     * @Assert\NotBlank()
     */
    private $comment;

    /**
     * Заказ
     *
     * @ORM\ManyToOne(targetEntity="Order", cascade={"persist"}, inversedBy="adminComments")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $order;

    /**
     * Пользователь, который оставил комментарий
     *
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    private $user;

    public function __construct()
    {

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

    public function getOrder()
    {
        return $this->order;
    }

    public function setOrder($order)
    {
        $this->order = $order;
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
