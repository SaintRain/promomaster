<?php

/**
 * Форма для Email
 *
 * @author  Kaluzhny.N.I.
 * @copyright LLC 'RostPay'
 */

namespace Application\Sonata\UserBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BalanceHistoryType extends AbstractType
{

    protected $paymentLogic;

    public function __construct($paymentLogic)
    {
        $this->paymentLogic = $paymentLogic;
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $customer = $options['sonata_field_description']->getAdmin()->getSubject();
        $data = $this->paymentLogic->getBalanceHistoryAdmin($customer);
        $view->vars['balanceHistory'] = $data['balanceHistory'];
        $view->vars['sellers'] = $data['sellers'];
        $view->vars['object'] = $customer;
    }

    public function getName()
    {
        return 'balance_history';
    }

}
