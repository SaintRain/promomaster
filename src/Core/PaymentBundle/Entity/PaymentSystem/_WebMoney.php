<?php

/**
 * Настройки платежной системы WebManey
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
 * @ ORM\Entity(repositoryClass="Core\PaymentBundle\Entity\PaymentSystem\Repository\WebMoneyRepository")
 * @ Assert\Callback(methods={"isValid"})
 */
class WebMoney extends CommonPaymentSystem {

    /**
     * Название платежной системы
     * @var string
     * @ORM\Column(type="string", length=13, nullable=false)
     */
    private $wallet;

    /**
     * Result URL: mailto:merchant@webmoney.ru (на этот email будет выслано подтверждение о выполнении платежа через сервис Web Merchant Interface)
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\Url()
     */
    private $resultURL;

    /**
     * Ссылка для перенаправления в случае успешного выполнения платежа
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\Url()
     */
    private $successURL;

    /**
     * Ссылка для перенаправления в случае возникновения ошибки при выполнении платежа
     * @var string
     * @ORM\Column(type="string", length=255, nullable=false)
     * @Assert\Url()
     */
    private $failURL;

    public function getWallet() {
        return $this->wallet;
    }

    public function setWallet($wallet) {
        $this->wallet = $wallet;
        return $this;
    }

    public function getResultURL() {
        return $this->resultURL;
    }

    public function setResultURL($resultURL) {
        $this->resultURL = $resultURL;
        return $this;
    }

    public function getSuccessURL() {
        return $this->successURL;
    }

    public function setSuccessURL($successURL) {
        $this->successURL = $successURL;
        return $this;
    }

    public function getFailURL() {
        return $this->failURL;
    }

    public function setFailURL($failURL) {
        $this->failURL = $failURL;
        return $this;
    }

    /**
     * Валидация номера кошелька
     *
     * @param \Symfony\Component\Validator\ExecutionContextInterface $context
     */
    public function isValid(ExecutionContextInterface $context) {
        if (!preg_match('/(^[A-Z]{1}[0-9]{12}$)/', $this->getWallet())) {
            $context->buildViolation('Invalid wallet!')
                        ->atPath('wallet')
                        ->addViolation();
        }
    }

}
