<?php

/**
 * Форма редактирования настроек для платежной системы PayPal
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Admin\Form\Mapper\PaymentSystem;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class PayPalFormMapper extends CommonPaymentSystemFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        parent::__construct($formMapper, $options);

        // Настройки PayPal
        $formMapper
            ->with('PayPal')
            ->add('business', null, array(
                'label' => 'Email продавца',
            ))
            ->add('requestURL', null, array(
                'label' => 'Ссылка для отправки запросов'
            ))
            ->add('verifiedURL', null, array(
                'label' => 'Ссылка для проверки верификации'
            ))
            ->add('isTest', null, array(
                'label' => 'Тестовый режим',
                'required' => false))
            ->add('requestURLtest', null, array(
                'label' => 'Ссылка для отправки запросов (Тестовый режим)'
            ))
            ->add('resultURL', null, array(
                'label' => 'Ссылка на которую будет отправляться результат выполнения платежа'
            ))
            ->add('successURL', null, array(
                'label' => 'Ссылка на которую будет переадресован юзер при успешном выполнении платежа'
            ))
            ->add('failURL', null, array(
                'label' => 'Ссылка на которую будет переадресован юзер при возникновении ошибки при выполнении платежа'
            ))
            ->end();
    }

}
