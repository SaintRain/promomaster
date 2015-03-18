<?php

/**
 * Cущность типов размещения
 *
 * @author  Kaluzhniy. N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * PriceModel
 *
 * @ORM\Table(name="ad_price_model")
 * @ORM\Entity(repositoryClass="Core\DirectoryBundle\Entity\Repository\PriceModelRepository")
 */
class PriceModel
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
     * @ORM\Column(name="name", type="string", length=255)
     * @Gedmo\Slug(fields={"captionRu"}, updatable=false, unique=true, separator="-")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="captionRu", type="string", length=255)
     * @Assert\NotBlank
     */
    private $captionRu;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isEnabled", type="boolean", options={"default" = 1})
     */
    private $isEnabled = true;

    /**
     * @var integer
     *
     * @ORM\Column(name="indexPosition", type="integer", nullable=true)
     */
    private $indexPosition;


    public function __toString()
    {
        return $this->getCaptionRu();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return PriceModel
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set captionRu
     *
     * @param string $captionRu
     * @return PriceModel
     */
    public function setCaptionRu($captionRu)
    {
        $this->captionRu = $captionRu;

        return $this;
    }

    /**
     * Get captionRu
     *
     * @return string 
     */
    public function getCaptionRu()
    {
        return $this->captionRu;
    }

    /**
     * Set isEnabled
     *
     * @param boolean $isEnabled
     * @return PriceModel
     */
    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;

        return $this;
    }

    /**
     * Get isEnabled
     *
     * @return boolean 
     */
    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    /**
     * Set indexPosition
     *
     * @param integer $indexPosition
     * @return PriceModel
     */
    public function setIndexPosition($indexPosition)
    {
        $this->indexPosition = $indexPosition;

        return $this;
    }

    /**
     * Get indexPosition
     *
     * @return integer 
     */
    public function getIndexPosition()
    {
        return $this->indexPosition;
    }

}
