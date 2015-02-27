<?php

/**
 * Коллекция подсистем для платежной системы Robokassa
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Entity\PaymentSystem;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface; //нужен для callback
use Core\PaymentBundle\Entity\PaymentSystem\CommonPaymentSystem;
use Core\CommonBundle\TranslatableProperties\Caption;
use Core\CommonBundle\TranslatableProperties\Description;

/**
 * @ORM\Table(name="core_payment_systems_robokassa_subsystems")
 * @ORM\Entity()
 * repositoryClass="Core\PaymentBundle\Entity\PaymentSystem\Repository\RobokassaRepository"
 */
class RobokassaSubsystem
{

    use Caption;

use Description;

    /**
     * Первичный ключ
     * @var integer
     * @ORM\Column(name="id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Системный ключ
     * @var string
     * @ORM\Column(type="string", length=100, nullable=false, unique=true)
     */
    private $system;

    /**
     * Системный ключ Robokassa
     * @var string
     * @ORM\Column(type="string", length=100, nullable=false, unique=true)
     */
    private $IncCurrLabel;

    /**
     * Активность
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isEnabled;

    /**
     * Отображать в футере
     * @var boolean
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isInFooter;

    /**
     * Индекс позиции сортировки
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $indexPosition;

    /**
     * @ORM\ManyToOne(targetEntity="Robokassa", inversedBy="subsystems", cascade={"persist"})
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $parentSystem;

    public function getId()
    {
        return $this->id;
    }

    public function getSystem()
    {
        return $this->system;
    }

    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    public function getIsInFooter()
    {
        return $this->isInFooter;
    }

    public function setSystem($system)
    {
        $this->system = $system;
        return $this;
    }

    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
        return $this;
    }

    public function setIsInFooter($isInFooter)
    {
        $this->isInFooter = $isInFooter;
        return $this;
    }

    public function getIncCurrLabel()
    {
        return $this->IncCurrLabel;
    }

    public function setIncCurrLabel($IncCurrLabel)
    {
        $this->IncCurrLabel = $IncCurrLabel;
        return $this;
    }

    public function getIndexPosition()
    {
        return $this->indexPosition;
    }

    public function setIndexPosition($indexPosition)
    {
        $this->indexPosition = $indexPosition;
        return $this;
    }

    public function getParentSystem()
    {
        return $this->parentSystem;
    }

    public function setParentSystem($parentSystem)
    {
        $this->parentSystem = $parentSystem;
        return $this;
    }

}
