<?php

/**
 * Настройки платежной системы PayPal
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Entity\PaymentSystem;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;  //нужен для callback
use Core\PaymentBundle\Entity\PaymentSystem\CommonPaymentSystem;

/**
 * @ORM\Entity(repositoryClass="Core\PaymentBundle\Entity\PaymentSystem\Repository\PayPalRepository")
 * @Assert\Callback(methods={"isValid"})
 */
class PayPal extends CommonPaymentSystem
{

    /** Логин в системе PayPal
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\NotBlank
     * @Assert\Email
     */
    private $business;

    /**
     * notify_url: URL, на который PayPal будет предавать информацию о транзакции
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\Url()
     */
    private $resultURL;

    /**
     * return: Ссылка для перенаправления в случае успешного выполнения платежа
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\Url()
     */
    private $successURL;

    /**
     * cancel_return: Ссылка для перенаправления в случае возникновения ошибки при выполнении платежа
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\Url()
     */
    private $failURL;

    /**
     * https://ipnpb.paypal.com/cgi-bin/webscr: Ссылка для запроса верификации
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\Url()
     */
    private $verifiedURL;

    public function getBusiness()
    {
        return $this->business;
    }

    public function setBusiness($business)
    {
        $this->business = $business;
        return $this;
    }

    public function getResultURL()
    {
        return $this->resultURL;
    }

    public function getSuccessURL()
    {
        return $this->successURL;
    }

    public function getFailURL()
    {
        return $this->failURL;
    }

    public function setResultURL($resultURL)
    {
        $this->resultURL = $resultURL;
        return $this;
    }

    public function setSuccessURL($successURL)
    {
        $this->successURL = $successURL;
        return $this;
    }

    public function setFailURL($failURL)
    {
        $this->failURL = $failURL;
        return $this;
    }

    function getVerifiedURL()
    {
        return $this->verifiedURL;
    }

    function setVerifiedURL($verifiedURL)
    {
        $this->verifiedURL = $verifiedURL;
    }



//    /**
//     * Логин в системе PayPal
//     * @var string
//     * @ORM\Column(type="string", length=255, nullable=false)
//     * @Assert\NotBlank
//     */
//    private $username;
//
//    /**
//     * Пароль
//     * @var string
//     * @ORM\Column(type="string", length=255, nullable=false)
//     * @Assert\NotBlank
//     */
//    private $password;
//
//    /**
//     * Подпись из личного кабинета
//     * @var string
//     * @ORM\Column(type="string", length=255, nullable=false)
//     * @Assert\NotBlank
//     */
//    private $signature;
//
//    /**
//     * Наш ID в системе PayPal
//     * @var string
//     * @ORM\Column(type="string", length=255, nullable=false)
//     * @Assert\NotBlank
//     */
//    private $clientId;
//
//    /**
//     * Наш секретный ключ для работы с PayPal
//     * @var string
//     * @ORM\Column(type="string", length=255, nullable=false)
//     * @Assert\NotBlank
//     */
//    private $clientSecret;
//
//    public function getUsername()
//    {
//        return $this->username;
//    }
//
//    public function getPassword()
//    {
//        return $this->password;
//    }
//
//    public function getSignature()
//    {
//        return $this->signature;
//    }
//
//    public function setUsername($username)
//    {
//        $this->username = $username;
//        return $this;
//    }
//
//    public function setPassword($password)
//    {
//        $this->password = $password;
//        return $this;
//    }
//
//    public function setSignature($signature)
//    {
//        $this->signature = $signature;
//        return $this;
//    }
//
//    public function getClientId()
//    {
//        return $this->clientId;
//    }
//
//    public function getClientSecret()
//    {
//        return $this->clientSecret;
//    }
//
//    public function setClientId($clientId)
//    {
//        $this->clientId = $clientId;
//        return $this;
//    }
//
//    public function setClientSecret($clientSecret)
//    {
//        $this->clientSecret = $clientSecret;
//        return $this;
//    }

    /**
     * Валидация
     *
     * @param \Symfony\Component\Validator\ExecutionContextInterface $context
     */
    public function isValid(ExecutionContextInterface $context)
    {
//        if (!preg_match('/(^[A-Z]{1}[0-9]{12}$)/', $this->getWallet())) {
//            $context->buildViolation('Invalid wallet!')
//                        ->atPath('wallet')
//                        ->addViolation();
//        }
    }

}
