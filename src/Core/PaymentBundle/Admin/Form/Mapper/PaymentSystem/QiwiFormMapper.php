<?php

/**
 * Форма редактирования настроек для платежной системы Qiwi
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Admin\Form\Mapper\PaymentSystem;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class QiwiFormMapper extends CommonPaymentSystemFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {

        parent::__construct($formMapper, $options);

        // Настройки Qiwi
//        $formMapper
//            ->with('Qiwi')
//            ->add('wallet', null, array(
//                'label' => 'Номер кошелька',
//                'help' => 'Номер кошелька на который будут поступать платежи'
//            ))
//            ->add('requestURL', null, array(
//                'label' => 'Ссылка для отправки запросов'
//            ))
//            ->add('resultURL', null, array(
//                'label' => 'Ссылка на которую будет отправляться результат выполнения платежа'
//            ))
//            ->add('successURL', null, array(
//                'label' => 'Ссылка на которую будет переадресован юзер при успешном выполнении платежа'
//            ))
//            ->add('failURL', null, array(
//                'label' => 'Ссылка на которую будет переадресован юзер при возникновении ошибки при выполнении платежа'
//        ))
//        ;
        $formMapper
            ->end();
    }

}