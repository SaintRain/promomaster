<?php

/**
 * Сущность разделов
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
 * @ORM\Table(name="core_site_section")
 * @ORM\Entity(repositoryClass="Core\SiteBundle\Entity\Repository\SectionRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Assert\Callback(methods={"isValid"})
 */
class Section
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
     * Название раздела
     * @var string
     * @ORM\Column(type="string", length=250, nullable=false)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * Шаблон по которому определяются страницы, где выводить баннеры
     * @var text
     * @ORM\Column(type="text", nullable=true)
     */
    private $urlTemplate;

    /**
     * Является ли текст в  $urlTemplate регулярным выражением
     * @var text
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isRegExpInUrlTemplate;


    /**
     * Пользователь, которому принадлежит сайт
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     * @ORM\JoinColumn(referencedColumnName="id")
     * @Assert\NotBlank()
     */
    private $user;

    /**
     * Рекламные места для которых действует раздел
     * @ORM\ManyToMany(targetEntity="AdPlace", cascade={"persist"}, mappedBy="sections")
     * @Assert\NotBlank()
     */
    private $adPlaces;


    /**
     * Использыется место
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isEnabled = true;


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
        $this->adPlaces = new ArrayCollection();
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getUrlTemplate()
    {
        return $this->urlTemplate;
    }

    /**
     * @param mixed $urlTemplate
     */
    public function setUrlTemplate($urlTemplate)
    {
        //в начале выражения должен идти слеш, если не регулярка
        if (!$this->isRegExpInUrlTemplate && $urlTemplate[0] != '/') {
            $urlTemplate = '/' . $urlTemplate;
        }

        $this->urlTemplate = $urlTemplate;
    }

    /**
     * @return text
     */
    public function getIsRegExpInUrlTemplate()
    {
        return $this->isRegExpInUrlTemplate;
    }

    /**
     * @param text $isRegExpInUrlTemplate
     */
    public function setIsRegExpInUrlTemplate($isRegExpInUrlTemplate)
    {
        $this->isRegExpInUrlTemplate = $isRegExpInUrlTemplate;
        return $this;
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
     * @return mixed
     */
    public function getAdPlaces()
    {
        return $this->adPlaces;
    }

    /**
     * @param AdPlace $adPlace
     */
    public function addAdPlace(AdPlace $adPlace)
    {
        if (!$this->adPlaces->contains($adPlace)) {
            $this->adPlaces->add($adPlace);
            $adPlace->addSection($this);
        } else {
            return;
        }
    }

    /**
     * @param AdPlace $adPlace
     */
    public function removeAdPlace(AdPlace $adPlace)
    {
        if ($this->adPlaces->contains($adPlace)) {
            $this->adPlaces->removeElement($adPlace);
            $adPlace->removeSection($this);
        } else {
            return;
        }
    }

    /**
     * @return mixed
     */
    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    /**
     * @param mixed $isEnabled
     */
    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
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


    /**
     * Дополнительные проверки
     */
    public function isValid(ExecutionContextInterface $context)
    {

        //проверяем регулярное выражение на валидность
        if ($this->isRegExpInUrlTemplate) {
            $res = @preg_match($this->urlTemplate, NULl);
            if ($res === false) {
                $context->buildViolation('Регулярное выражение записано с ошибкой.')
                    ->atPath('urlTemplate')
                    ->addViolation();
            }
        }

    }

}

