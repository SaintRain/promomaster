<?php

/**
 * Отзывы
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
 * @Gedmo\Tree(type="nested")
 * @ORM\Table(name="core_reviews")
 * @ORM\Entity(repositoryClass="Core\ReviewBundle\Entity\Repository\ReviewRepository")
 * @ Assert\Callback(methods={"isValidProduct"})
 */
class Review
{

    /**
     * Первичный ключ
     * @var smallint
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Позиция сортировки слева
     * @Gedmo\TreeLeft
     * @ORM\Column(name="lft", type="integer")
     */
    protected $lft;

    /**
     * Уровень вложенности
     * @Gedmo\TreeLevel
     * @ORM\Column(name="lvl", type="integer")
     */
    protected $lvl;

    /**
     * Позиция сортировки справо
     * @Gedmo\TreeRight
     * @ORM\Column(name="rgt", type="integer")
     */
    protected $rgt;

    /**
     * Корневой узел
     * @Gedmo\TreeRoot
     * @ORM\Column(name="root", type="integer", nullable=true)
     */
    protected $root;

    /**
     * Активность
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isEnabled;

    /**
     * Текст отзыва
     * @var string
     * @ORM\Column(type="text", nullable=false)
     * @Assert\NotBlank()
     */
    private $review;

    /**
     * Оценка товара
     * @var string
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $rating;

    /**
     * Создан
     * @var datetime
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * Редактирован
     * @var datetime
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;

    /**
     * Продукт к которому оставлен отзыв
     * @ORM\ManyToOne(targetEntity="Core\ProductBundle\Entity\CommonProduct", inversedBy="reviews")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $product;

    /**
     * Пользователь который оставил отзыв
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User", inversedBy="reviews")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     * @Assert\NotBlank()
     */
    private $user;

    /**
     * Связь с таблицей лайков
     * @ORM\OneToMany(targetEntity="ReviewLikesMatchUser", mappedBy="review")
     */
    private $likes;

    /**
     * Фотографии приложенные к отзывам
     * @ORM\ManyToMany(targetEntity="Core\FileBundle\Entity\ImageFile", cascade={"persist"})
     * @ORM\JoinTable(name="core_raviews_match_photos")
     * @ORM\OrderBy({"indexPosition" = "ASC"})
     */
    private $photos;

    /**
     * Видео приложенное к отзывам
     * @ ORM\ManyToMany(targetEntity="Core\FileBundle\Entity\DocumentFile", cascade={"persist"})
     * @ ORM\JoinTable(name="core_raviews_match_videos")
     * @ ORM\OrderBy({"indexPosition" = "ASC"})
     */
//    private $videos;

    /**
     * @ORM\OneToMany(targetEntity="Review", mappedBy="parent", orphanRemoval=true, cascade={"persist"})
     * @ORM\OrderBy({"createdAt" = "DESC"})
     */
    private $children;

    /**
     * @Gedmo\TreeParent
     * @ORM\ManyToOne(targetEntity="Review", inversedBy="children")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $parent;

    /**
     * Плюсы
     * @ORM\Column(type="text", nullable=true)
     */
    private $pros;

    /**
     * Минусы
     * @ORM\Column(type="text", nullable=true)
     */
    private $cons;

    /**
     * @ORM\ManyToMany(targetEntity="Core\DirectoryBundle\Entity\RemoteVideo", cascade={"persist"})
     * @ORM\JoinTable(name="core_reviews_match_remote_video")
     */
    protected $remoteVideos;

    public function __toString()
    {
        return (string)$this->id;
    }

    public function __construct()
    {
        $this->likes = new ArrayCollection();
        $this->photos = new ArrayCollection();
//        $this->videos = new ArrayCollection();
        $this->children = new ArrayCollection();
        $this->remoteVideos = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLft()
    {
        return $this->lft;
    }

    public function getLvl()
    {
        return $this->lvl;
    }

    public function getRgt()
    {
        return $this->rgt;
    }

    public function getRoot()
    {
        return $this->root;
    }

    public function setLft($lft)
    {
        $this->lft = $lft;
        return $this;
    }

    public function setLvl($lvl)
    {
        $this->lvl = $lvl;
        return $this;
    }

    public function setRgt($rgt)
    {
        $this->rgt = $rgt;
        return $this;
    }

    public function setRoot($root)
    {
        $this->root = $root;
        return $this;
    }

    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
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

    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
        return $this;
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

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct($product)
    {
        $this->product = $product;
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

    public function getLikes()
    {
        return $this->likes;
    }

    public function setLikes($likes)
    {
        $this->likes = $likes;
        return $this;
    }

    public function addLike($likes)
    {
        $this->likes->add($likes);
        return $this;
    }

    public function removeLike($likes)
    {
        $this->likes->removeElement($likes);
        return $this;
    }

    public function getPhotos()
    {
        return $this->photos;
    }

    public function setPhotos($photos)
    {
        $this->photos = $photos;
        return $this;
    }

    public function addPhotos($photos)
    {
        $this->photos->add($photos);
        return $this;
    }

    public function removePhotos($photo)
    {
        $this->photos->removeElement($photo);
        return $this;
    }

    /*public function getVideos()
    {
        return $this->videos;
    }

    public function setVideos($videos)
    {
        $this->videos = $videos;
        return $this;
    }

    public function addVideos($video)
    {
        $this->videos->add($video);
        return $this;
    }

    public function removeVideos($video)
    {
        $this->videos->removeElement($video);
        return $this;
    }*/

    public function getChildren()
    {
        return $this->children;
    }

    public function setChildren($children)
    {
        $this->children = $children;
        return $this;
    }

    public function addChildren($children)
    {
        $this->children->add($children);
        return $this;
    }

    public function removeChildren($children)
    {
        $this->children->removeElement($children);
        return $this;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent($parent)
    {
        $this->parent = $parent;
        return $this;
    }

    public function getPros()
    {
        return $this->pros;
    }

    public function setPros($pros)
    {
        $this->pros = $pros;
        return $this;
    }

    public function getCons()
    {
        return $this->cons;
    }

    public function setCons($cons)
    {
        $this->cons = $cons;
        return $this;
    }

    public function getRemoteVideos()
    {
        return $this->remoteVideos;
    }

    public function setRemoteVideos($remoteVideos)
    {
        $this->remoteVideos = $remoteVideos;
        return $this;
    }

    public function addRemoteVideo($remoteVideo)
    {
        if (!$this->remoteVideos->contains($remoteVideo)) {
            $this->remoteVideos->add($remoteVideo);
        }
        return $this;
    }

    public function removeRemoteVideo($remoteVideo)
    {
        $this->remoteVideos->removeElement($remoteVideo);
        return $this;
    }
}
