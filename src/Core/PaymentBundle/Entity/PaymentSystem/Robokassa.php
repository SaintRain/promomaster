<?php

/**
 * Настройки платежной системы Robokassa
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Entity\PaymentSystem;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface; //нужен для callback
use Core\PaymentBundle\Entity\PaymentSystem\CommonPaymentSystem;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Core\PaymentBundle\Entity\PaymentSystem\Repository\RobokassaRepository")
 * @Assert\Callback(methods={"isValid"})
 */
class Robokassa extends CommonPaymentSystem
{

    /**
     * Логин в системе Robokassa
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotBlank
     */
    private $login;

    /**
     * Пароль №1
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotBlank
     */
    private $password1;

    /**
     * Пароль №2
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotBlank
     */
    private $password2;

    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @ORM\OneToMany(targetEntity="RobokassaSubsystem", mappedBy="parentSystem", orphanRemoval=true,cascade={"persist"}, indexBy="system", fetch="EAGER")
     * @ORM\OrderBy({"indexPosition" = "ASC"})
     */
    protected $subsystems;

    public function __construct()
    {
        $this->subsystems = new ArrayCollection();
        parent::__construct();
    }

    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    public function getPassword1()
    {
        return $this->password1;
    }

    public function setPassword1($password1)
    {
        $this->password1 = $password1;
        return $this;
    }

    public function getPassword2()
    {
        return $this->password2;
    }

    public function setPassword2($password2)
    {
        $this->password2 = $password2;
        return $this;
    }

    public function getSubsystems()
    {
        return $this->subsystems;
    }

    public function setSubsystems($subsystems)
    {
        $this->subsystems = $subsystems;
        return $this;
    }

    public function addSubsystem($subsystem)
    {
        $subsystem->setParentSystem($this);
        $this->subsystems->add($subsystem);
        return $this;
    }

    public function removeSubsystem($subsystem)
    {
        $this->subsystems->removeElement($subsystem);
        return $this;
    }

    /**
     * Валидация
     *
     * @param \Symfony\Component\Validator\ExecutionContextInterface $context
     */
    public function isValid(ExecutionContextInterface $context)
    {
//        if (!preg_match('/(^[A-Z]{1}[0-9]{12}$)/', $this->getWallet())) {
//            $context->addViolationAt(
//                'wallet', 'Invalid wallet!');
//        }
    }

}
