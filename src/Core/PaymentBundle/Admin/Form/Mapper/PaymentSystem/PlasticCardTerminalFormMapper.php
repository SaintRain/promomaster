<?php

/**
 * Форма редактирования настроек для платежной системы PlasticCardTerminal
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Admin\Form\Mapper\PaymentSystem;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class PlasticCardTerminalFormMapper extends CommonPaymentSystemFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {

        parent::__construct($formMapper, $options);

        // Настройки PlasticCardTerminal
        $formMapper
//            ->with('BankTransfer')
                ->end();
    }

}
