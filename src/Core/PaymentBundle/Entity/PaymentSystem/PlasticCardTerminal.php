<?php

/**
 * Настройки платежной системы PlasticCardTerminal
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
 * @ORM\Entity(repositoryClass="Core\PaymentBundle\Entity\PaymentSystem\Repository\PlasticCardTerminalRepository")
 * @ Assert\Callback(methods={"isValid"})
 */
class PlasticCardTerminal extends CommonPaymentSystem {

}
