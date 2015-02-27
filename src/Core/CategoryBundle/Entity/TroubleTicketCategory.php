<?php

/**
 * Категории для траблтикетов
 * @author  Kaluzhny N.I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CategoryBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Core\CategoryBundle\Entity\TranslatableProperties\RuTroubleTicketCategory;   //подключаем языки
use Core\CommonBundle\TranslatableProperties\Caption;
use Core\CommonBundle\TranslatableProperties\Description;

/**
 * @Gedmo\Tree(type="nested")
 * @ORM\Table(name="core_trouble_ticket_category")
 * @ORM\Entity(repositoryClass="Core\CategoryBundle\Entity\Repository\TroubleTicketCategoryRepository")
 */
class TroubleTicketCategory extends CommonCategory
{

    use Caption,
        Description;

    /**
     * Родительская категория
     * @Gedmo\TreeParent
     * @ORM\ManyToOne(targetEntity="TroubleTicketCategory", inversedBy="childrens",fetch="LAZY")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $parent;

    /**
     * Потомки
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="TroubleTicketCategory", mappedBy="parent", fetch="LAZY")
     * @ORM\OrderBy({"lft" = "ASC"})
     */
    protected $childrens;

    public function __toString()
    {
        return $this->getIndentedCaption();
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

    public function getChildrens()
    {
        return $this->childrens;
    }

    public function setChildrens(ArrayCollection $childrens)
    {
        $this->childrens = $childrens;
        return $this;
    }

}
