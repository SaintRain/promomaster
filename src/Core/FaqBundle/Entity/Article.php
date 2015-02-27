<?php

/**
 * Класс статей для FAQ
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FaqBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Core\CategoryBundle\Entity\FaqCategory;
//подключаем языки
use Core\CommonBundle\TranslatableProperties\Caption;
use Core\CommonBundle\TranslatableProperties\Title;
use Core\CommonBundle\TranslatableProperties\Metakeywords;
use Core\CommonBundle\TranslatableProperties\Metadescription;
use Core\FaqBundle\TranslatableProperties\Body;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="Core\FaqBundle\Entity\Repository\ArticleRepository")
 * @ORM\Table(name="core_faq_article")
 */
class Article implements \JsonSerializable
{
    use Caption,
        Title,
        Body,
        Metakeywords,
        Metadescription;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=128, unique=true)
     * @Gedmo\Slug(fields={"captionRu"})
     * @Assert\Regex(pattern ="/[a-z0-9\-\_\/]+/", message = "Пожалуйста используйте только символы латиницы, тире, дефис и слеш")
     */
    protected $slug;


    /**
     * Статус (вкл\выкл)
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    protected $isActive = true;

    /**
     * Является предопределенным ответом
     * @var boolean
     *
     * @ORM\Column(name="isPredifinedAnswer", type="boolean")
     */
    protected $isPredifinedAnswer = false;

    /**
     * Показывать на главной
     * @var boolean
     *
     * @ORM\Column(name="isOnMain", type="boolean")
     */
    protected $isOnMain = false;

    /**
     * Положительные отзывы
     * @var integer
     *
     * @ORM\Column(name="goodRate", type="integer")
     */
    protected $goodRate = 0;

    /**
     * Отрицательные отзывы
     * @var integer
     *
     * @ORM\Column(name="badRate", type="integer")
     */
    protected $badRate = 0;

    /**
     * @var Core\CategoryBundle\Entity\FaqCategory
     * @ORM\ManyToOne(targetEntity="Core\CategoryBundle\Entity\FaqCategory", inversedBy="articles")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id", onDelete="CASCADE")
     * @Assert\NotBlank()
     */
    protected $category;

    /**
     * @var datetime $createdDatetime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdDatetime;

    /**
     * @var datetime $updatedDatetime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updatedDatetime;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function getIsOnMain()
    {
        return $this->isOnMain;
    }

    public function setIsOnMain($isOnMain)
    {
        $this->isOnMain = $isOnMain;
        return $this;
    }

    public function getIsActive()
    {
        return $this->isActive;
    }

    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }
    
    public function getCreatedDatetime()
    {
        return $this->createdDatetime;
    }

    public function getUpdatedDatetime()
    {
        return $this->updatedDatetime;
    }

    public function getGoodRate()
    {
        return $this->goodRate;
    }

    public function setGoodRate($goodRate)
    {
        $this->goodRate = $goodRate;
        return $this;
    }

    public function getBadRate()
    {
        return $this->badRate;
    }

    public function setBadRate($badRate)
    {
        $this->badRate = $badRate;
        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory(FaqCategory $category = null)
    {
        $this->category = $category;
        return $this;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getIsPredifinedAnswer()
    {
        return $this->isPredifinedAnswer;
    }

    public function setIsPredifinedAnswer($isPredifinedAnswer)
    {
        $this->isPredifinedAnswer = $isPredifinedAnswer;
        return $this;
    }

    public function jsonSerialize()
    {
        return ['id' => $this->id,
                'captionRu' => $this->captionRu,
                'bodyRu' => $this->bodyRu,
                'slug' => $this->slug
                ];
    }

    public function getCompressed()
    {
        return json_encode($this, JSON_UNESCAPED_SLASHES);
    }
}
