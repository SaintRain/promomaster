<?php
/**
 * Связывающая сущность
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */
/**
 * @link http://www.theodo.fr/blog/2013/11/dynamic-mapping-in-doctrine-and-symfony-how-to-extend-entities/
 * @link http://php-and-symfony.matthiasnoback.nl/2011/12/symfony2-doctrine-common-creating-powerful-annotations/
 * @link https://www.techpunch.co.uk/development/custom-annotations-in-symfony2-using-doctrine2s-annotation-classes
 * @link http://docs.doctrine-project.org/projects/doctrine-common/en/latest/reference/annotations.html#annotation-classes
 * @link http://symfony2.ylly.fr/dynamically-add-mapping-to-doctrine2-using-annotations-dantleech/
 * @link http://php-and-symfony.matthiasnoback.nl/2012/03/symfony2-creating-a-metadata-factory-for-processing-custom-annotations/
 * @link http://stackoverflow.com/questions/7504073/how-to-setup-table-prefix-in-symfony2
 * @link http://stackoverflow.com/questions/19380177/how-to-prefix-sequence-names
 * @link http://stackoverflow.com/questions/19821577/symfony2-entity-metadata-caching
 * @link http://www.theodo.fr/blog/2013/11/dynamic-mapping-in-doctrine-and-symfony-how-to-extend-entities/
 * @link http://doctrine-orm.readthedocs.org/en/latest/reference/working-with-associations.html
 * @link http://stackoverflow.com/questions/19380332/what-is-the-best-way-to-inject-eventdispatcher-in-entityrepository
 */
namespace Core\DynamicBindingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Binding
 *
 * @ORM\Table(name="core_binding")
 * @ORM\Entity
 */
class Binding
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $fromEntityType;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $fromEntityId;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $toEntityType;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $toEntityId;

    /**
     *
     * @var object
     */
    private $fromEntity;

    /**
     *
     * @var object
     */
    private $toEntity;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function getFromEntityId()
    {
        return $this->fromEntityId;
    }

    public function setFromEntityId($fromEntityId)
    {
        $this->fromEntityId = $fromEntityId;

        return $this;
    }

    public function getFromEntityType()
    {
        return $this->fromEntityType;
    }

    public function setFromEntityType($fromEntityType)
    {
        $this->fromEntityType = $fromEntityType;

        return $this;
    }

    public function getToEntityType()
    {
        return $this->toEntityType;
    }

    public function setToEntityType($toEntityType)
    {
        $this->toEntityType = $toEntityType;

        return $this;
    }

    public function getToEntityId()
    {
        return $this->toEntityId;
    }

    public function setToEntityId($toEntityId)
    {
        $this->toEntityId = $toEntityId;
        
        return $this;
    }

    public function getFromEntity()
    {
        return $this->fromEntity;
    }

    public function setFromEntity($fromEntity)
    {
        $this->fromEntity = $fromEntity;

        return $this;
    }

    public function getToEntity()
    {
        return $this->toEntity;
    }

    public function setToEntity($toEntity)
    {
        $this->toEntity = $toEntity;
        return $this;
    }

}
