<?php

/**
 * Базовая  сущность площадки на которой будет крутиться реклама
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\SiteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\ExecutionContextInterface;

/**
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorMap({"WebSite"="WebSite"})
 * @ORM\Table(name="core_site")
 * @ORM\Entity(repositoryClass="Core\SiteBundle\Entity\Repository\CommonSiteRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Assert\Callback(methods={"isValidCommon"})
 */
class CommonSite
{

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Пользователь, которому принадлежит баннер
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $user;


    /**
     * Ключевые слова для поиска
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $keywords;


    /**
     * Категории к которым относится площадка
     * @ORM\ManyToMany(targetEntity="Core\CategoryBundle\Entity\SiteCategory", cascade={"persist"},   fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="core_site_match_categories")
     * @Assert\NotBlank()
     */
    private $categories;


    /**
     * Дата создания
     * @var \DateTime
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdDateTime;

    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $indexPosition;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param string $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }


    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDateTime()
    {
        return $this->createdDateTime;
    }

    /**
     * @param \DateTime $createdDateTime
     */
    public function setCreatedDateTime($createdDateTime)
    {
        $this->createdDateTime = $createdDateTime;
    }

    /**
     * @return int
     */
    public function getIndexPosition()
    {
        return $this->indexPosition;
    }

    /**
     * @param int $indexPosition
     */
    public function setIndexPosition($indexPosition)
    {
        $this->indexPosition = $indexPosition;
    }



    public function getCategories()
    {
        return $this->categories;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * Дополнительные проверки
     */
    public function isValidCommon(ExecutionContextInterface $context)
    {
        $parents = [];
        foreach ($this->getCategories() as $cat) {
            $parents[$cat->getParent()->getId()] = true;
        }

        if (count($parents) > 1) {
            $context->buildViolation('Нельзя выбмрать категории из разных разделов.')
                ->atPath('categories')
                ->addViolation();
        } else if (!count($parents)) {
            $context->buildViolation('Необходимо отметить минимум один подраздел.')
                ->atPath('categories')
                ->addViolation();
        }

    }

}

