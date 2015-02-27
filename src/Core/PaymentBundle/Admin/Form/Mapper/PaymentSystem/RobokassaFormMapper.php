<?php

/**
 * Форма редактирования настроек для платежной системы WebMoney
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Admin\Form\Mapper\PaymentSystem;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class RobokassaFormMapper extends CommonPaymentSystemFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        parent::__construct($formMapper, $options);

        // Настройки Robokassa
        $formMapper
            ->with('Robokassa')
            ->add('login', null, array(
                'label' => 'Логин',
                'help' => 'Был указан в кабинете на сайте Robokassa'
            ))
            ->add('password1', null, array(
                'label' => 'Пароль № 1',
                'help' => 'Был указан в кабинете на сайте Robokassa'
            ))
            ->add('password2', null, array(
                'label' => 'Пароль № 2',
                'help' => 'Был указан в кабинете на сайте Robokassa'
            ))
            ->add('requestURL', null, array(
                'label' => 'Ссылка для отправки запросов'
            ))
            ->add('isTest', null, array(
                'label' => 'Тестовый режим',
                'required' => false))
            ->add('requestURLtest', null, array(
                'label' => 'Ссылка для отправки запросов (Тестовый режим)'
        ));
        $formMapper
            ->with('Подсистемы')
            ->add('subsystems', 'sonata_type_collection', array(
                'label' => false,
                'by_reference' => false,
                'type_options' => array('delete' => true)
            ), array(
                'edit' => 'inline',
                'inline' => 'table',
            ));

        $formMapper->end();
    }

}
