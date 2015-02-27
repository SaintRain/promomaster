<?php
/**
 * Сущность для праздников
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\HolidayBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Application\Sonata\UserBundle\Entity\CommonContragent;
use Core\CommonBundle\TranslatableProperties\Note;
use Core\CommonBundle\TranslatableProperties\Caption;

/**
 * @ORM\Table(name="core_holiday")
 * @ORM\Entity(repositoryClass="Core\HolidayBundle\Entity\Repository\HolidayRepository")
 */
class Holiday
{

    //название
    use Caption;
    /**
     * Первичный ключ
     *
     * @var bigint
     * @ORM\Column(type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Дата начала
     *
     * @ORM\Column(type="datetime")
     */
    private $startedAt;

    /**
     * Дата окончания
     *
     * @ORM\Column(type="datetime")
     */
    private $endedAt;

    /**
     * Логотип
     *
     * @ORM\OneToOne(targetEntity="Core\FileBundle\Entity\ImageFile", cascade={"persist"})
     * @ORM\JoinColumn(name="logo_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $logo;

    /**
     * Активность бренда
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isEnabled;

    public function __construct()
    {
        $this->isEnabled = true;
    }

    public function getId()
    {
        return $this->id;
    }

    function getStartedAt()
    {
        return $this->startedAt;
    }

    function getEndedAt()
    {
        return $this->endedAt;
    }

    function setStartedAt($startedAt)
    {
        $this->startedAt = $startedAt;
    }

    function setEndedAt($endedAt)
    {
        $this->endedAt = $endedAt;
    }

    public function getLogo()
    {
        return $this->logo ? [$this->logo] : null;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
        return $this;
    }

    public function addLogo($logo)
    {
        $this->logo = $logo;
        return $this;
    }

    public function removeLogo($logo)
    {
        $this->logo = null;
        return $this;
    }

    function getIsEnabled()
    {
        return $this->isEnabled;
    }

    function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
    }
}