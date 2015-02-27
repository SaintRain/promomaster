<?php

/**
 * Виды организационно-правовых форм
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Table(name="core_directory_legal_from")
 * @ORM\Entity(repositoryClass="Core\DirectoryBundle\Entity\Repository\LegalFormRepository")
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity("name")
 */
class LegalForm
{

    /**
     * Первичный ключ
     * @var int
     * @ORM\Column(name="id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Название
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $captionRu;

    /**
     * Полное название
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $fullCaptionRu;

    /**
     * Системное имя
     * @var string
     * @ORM\Column(type="string", length=100, nullable=false)
     * @Gedmo\Slug(fields={"captionRu"}, updatable=false)
     * @Assert\NotBlank(groups={"Update"})
     */
    private $name;

    public function __toString()
    {
        return $this->captionRu;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCaptionRu()
    {
        return $this->captionRu;
    }

    public function setCaptionRu($captionRu)
    {
        $this->captionRu = $captionRu;
        return $this;
    }

    public function getFullCaptionRu()
    {
        return $this->fullCaptionRu;
    }

    public function setFullCaptionRu($fullCaptionRu)
    {
        $this->fullCaptionRu = $fullCaptionRu;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

}
