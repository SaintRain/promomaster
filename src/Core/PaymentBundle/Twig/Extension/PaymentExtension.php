<?php

/**
 * Twig расширения для работы с платежами
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Twig\Extension;

class PaymentExtension extends \Twig_Extension
{

    public $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function getFunctions()
    {
        return array(
            'getBalance' => new \Twig_Function_Method($this, 'getBalanceFunction'),
        );
    }

    /**
     * Получение баланса контрагента
     *
     * @param integer $id
     * @return float
     */
    function getBalanceFunction($customer, $force = false)
    {
        return $this->container->get('core_payment_logic')->getBalance($customer, $force);
    }

    public function getName()
    {
        return 'payment_extension';
    }

}
