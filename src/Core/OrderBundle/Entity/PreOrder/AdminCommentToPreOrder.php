<?php

/**
 * Комментарии к перзаказу
 *
 * @author Kaluzhniy N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\OrderBundle\Entity\PreOrder;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="core_order_admin_preorder_comments")
 * @ORM\Entity(repositoryClass="Core\OrderBundle\Entity\Repository\PreOrder\AdminCommentToPreOrderRepository")
 */
class AdminCommentToPreOrder
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
     * Предзаказ
     *
     * @ORM\ManyToOne(targetEntity="PreOrder", cascade={"persist"}, inversedBy="adminComments")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $preOrder;

    /**
     * Пользователь, который оставил комментарий
     *
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="SET NULL")
     */
    private $user;

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

    public function getPreOrder()
    {
        return $this->preOrder;
    }

    public function setPreOrder($preOrder)
    {
        $this->preOrder = $preOrder;
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