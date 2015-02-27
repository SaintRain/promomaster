<?php

/**
 * Сущность сайта
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
 * @ORM\Table(name="core_site")
 * @ORM\Entity(repositoryClass="Core\SiteBundle\Entity\Repository\SiteRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Assert\Callback(methods={"isValidCommon"})
 */
class Site
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
     * Доменное имя
     * @var string
     * @ORM\Column(type="string", length=250, nullable=false)
     * @Assert\Url()
     * @Assert\NotBlank()
     */
    private $domain;


    /**
     * Ключевые слова для поиска
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $keywords;


    /**
     * Зеркала
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $mirrors;


    /**
     * Пользователь, которому принадлежит сайт
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $user;


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

    /**
     * Категории в которых находится продукт
     * @ORM\ManyToMany(targetEntity="Core\CategoryBundle\Entity\SiteCategory", cascade={"persist"},   fetch="EXTRA_LAZY")
     * @ORM\JoinTable(name="core_site_match_categories")
     * @Assert\NotBlank()
     */
    private $categories;


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
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $domain = preg_replace("#/$#", '', $domain);
        $this->domain = $domain;
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
     * @return string
     */
    public function getMirrors()
    {
        return $this->mirrors;
    }

    /**
     * @param string $mirrors
     */
    public function setMirrors($mirrors)
    {
        $this->mirrors = $mirrors;
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
     * Дополнительные проверки .общие проверки
     *
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

