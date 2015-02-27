<?php

/**
 * Класс траспортных компаний
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Company
 *
 * @ORM\Table(name="core_delivery_company")
 * @ORM\Entity(repositoryClass="Core\DeliveryBundle\Entity\Repository\CompanyRepository")
 * @UniqueEntity("name")
 */
class Company
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
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="caption_ru", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $captionRu;

    /**
     * Вкл - выкл
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status = true;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_in_footer", type="boolean", nullable=true)
     */
    private $isInFooter = true;

    /**
     * URL сайта
     * 
     * @var string
     *
     * @ORM\Column(name="site", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Url()
     */
    private $site;

    /**
     * URL страницы калькулятора
     *
     * @var string
     *
     * @ORM\Column(name="calculator", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Url()
     */
    private $calculator;

    /**
     * URL страницы отслеживания груза
     *
     * @var string
     *
     * @ORM\Column(name="tracker", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Url()
     */
    private $tracker;

    /**
     * Позиция сортировки
     * @Gedmo\SortablePosition
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @ORM\OneToMany(targetEntity="Core\DeliveryBundle\Entity\Service", mappedBy="company", cascade={"persist"})
     */
    private $services;

    public function __construct()
    {
        $this->services = new ArrayCollection();
    }

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
     * @return Company
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
     * @return Company
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
     * Set status
     *
     * @param boolean $status
     * @return Company
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set isInFooter
     *
     * @param boolean $isInFooter
     * @return Company
     */
    public function setIsInFooter($isInFooter)
    {
        $this->isInFooter = $isInFooter;

        return $this;
    }

    /**
     * Get isInFooter
     *
     * @return boolean 
     */
    public function getIsInFooter()
    {
        return $this->isInFooter;
    }

    /**
     * Set site
     *
     * @param string $site
     * @return Company
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return string 
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set calculator
     *
     * @param string $calculator
     * @return Company
     */
    public function setCalculator($calculator)
    {
        $this->calculator = $calculator;

        return $this;
    }

    /**
     * Get calculator
     *
     * @return string 
     */
    public function getCalculator()
    {
        return $this->calculator;
    }

    /**
     * Set tracker
     *
     * @param string $tracker
     * @return Company
     */
    public function setTracker($tracker)
    {
        $this->tracker = $tracker;

        return $this;
    }

    /**
     * Get tracker
     *
     * @return string 
     */
    public function getTracker()
    {
        return $this->tracker;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function getPosition()
    {
        return $this->position;
    }

    /**
     *
     * @param Core\DeliveryBundle\Entity\Service $service
     */
    public function addService(Service $service)
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
            $service->setCompany($this);
        }
    }

    /**
     *
     * @return Doctrine\Common\Collections\ArrayCollection
     */
    public function getServices()
    {
        return $this->services;
    }

    public function removeService(Service $service){
        $this->getServices()->removeElement($service);
    }

    public function getCompanyName() {
        return $this->getName();
    }
}
