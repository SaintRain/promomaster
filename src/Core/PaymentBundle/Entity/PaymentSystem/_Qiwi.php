<?php

/**
 * Настройки платежной системы Qiwi
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
 * @ ORM\Entity(repositoryClass="Core\PaymentBundle\Entity\PaymentSystem\Repository\QiwiRepository")
 * @ Assert\Callback(methods={"isValid"})
 */
class Qiwi extends CommonPaymentSystem {

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
