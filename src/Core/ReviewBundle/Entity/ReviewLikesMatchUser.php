<?php

/**
 * Таблица для связи с пользователями (полезность отзыва, лайки +/-)
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ReviewBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="core_reviews_likes_match_user")
 * @ORM\Entity()
 * @ Assert\Callback(methods={"isValidProduct"})
 */
class ReviewLikesMatchUser
{

    const TYPE_POSITIVE = 1;
    const TYPE_NEGATIVE = 0;

    /**
     * Первичный ключ
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Тип лайка
     * @var smallint
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $type;

    /**
     * Пользователь который оставил голос
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="reviewsLikes")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $user;

    /**
     * Отзыв
     * @ORM\ManyToOne(targetEntity="Review", inversedBy="likes",fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $review;

    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
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

    public function getReview()
    {
        return $this->review;
    }

    public function setReview($review)
    {
        $this->review = $review;
        return $this;
    }

}
