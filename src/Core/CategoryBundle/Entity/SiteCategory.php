<?php

/**
 * Категории тематик для сайтов
 * @author  Kaluzhny N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Core\FaqBundle\Entity\Article;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

//подключаем языки
use Core\CommonBundle\TranslatableProperties\Caption;


/**
 * @Gedmo\Tree(type="nested")
 * @ORM\Table(name="core_site_category")
 * @ORM\Entity(repositoryClass="Core\CategoryBundle\Entity\Repository\SiteCategoryRepository")
 * @UniqueEntity("slug")
 */

class SiteCategory extends CommonCategory {

    use Caption;


    /**
     * Родительская категория
     * @Gedmo\TreeParent
     * @ORM\ManyToOne(targetEntity="SiteCategory", inversedBy="childrens",fetch="LAZY")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $parent;

    /**
     * Потомки
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="SiteCategory", mappedBy="parent", fetch="LAZY")
     * @ORM\OrderBy({"lft" = "ASC"})
     */
    protected $childrens;

    /**
     * Транслитерация Friendly URL
     * @Gedmo\Slug(fields={"captionRu"}, updatable=false, unique=true, separator="-")
     * @ORM\Column(name="slug", type="string", unique=true, length=255)
     * @Assert\Regex(pattern ="/[a-z0-9\-\_\/]+/", message = "Пожалуйста используйте только символы латиницы, тире, дефис и слеш")
     */
    protected $slug;

    public function __construct()
    {
    }

    public function __toString()
    {
        return $this->getIndentedCaption();
    }
    
    public function getParent() {
        return $this->parent;
    }

    public function setParent($parent) {
        $this->parent = $parent;
        return $this;
    }

    public function getChildrens() {
        return $this->childrens;
    }

    public function setChildrens(ArrayCollection $childrens) {
        $this->childrens = $childrens;
        return $this;
    }


    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }



}
