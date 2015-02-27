<?php

/**
 * Настройки платежной системы PaymentOnDelivery
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
 * @ORM\Entity(repositoryClass="Core\PaymentBundle\Entity\PaymentSystem\Repository\PaymentOnDeliveryRepository")
 * @Assert\Callback(methods={"isValid"})
 */
class PaymentOnDelivery extends CommonPaymentSystem {

    /**
     * Кредитный лимит
     *
     * @var string
     * @ORM\Column(type="integer", nullable=false)
     */
    private $creditLimit;

    public function getCreditLimit() {
        return $this->creditLimit;
    }

    public function setCreditLimit($creditLimit) {
        $this->creditLimit = $creditLimit;
        return $this;
    }

    /**
     * Валидация
     *
     * @param \Symfony\Component\Validator\ExecutionContextInterface $context
     */
    public function isValid(ExecutionContextInterface $context) {
//        if (!preg_match('/(^[A-Z]{1}[0-9]{12}$)/', $this->getWallet())) {
//            $context->buildViolation('Invalid wallet!')
//                        ->atPath('wallet')
//                        ->addViolation();
//        }
    }

}
