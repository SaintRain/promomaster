<?php

/**
 * Форма редактирования настроек для платежной системы PlasticCard
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Admin\Form\Mapper\PaymentSystem;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class PlasticCardFormMapper extends CommonPaymentSystemFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        parent::__construct($formMapper, $options);

        $formMapper
            ->with('Пластиковые карты (Яндекс.Деньги)')
            ->add('shopId', null, array(
                'label' => 'Идентификатор магазина',
                'help' => 'Наш идентификатор в системе YM, получаем у них.'
            ))
            ->add('scid', null, array(
                'label' => 'Номер витрины',
                'help' => 'Наш номер витрины в системе YM, получаем у них.',
            ))
            ->add('shopPassword', null, array(
                'label' => 'Пароль магазина',
            ))
            ->add('requestURL', null, array(
                'label' => 'Ссылка для отправки запросов'
            ))
            ->add('isTest', null, array(
                'label' => 'Тестовый режим',
                'required' => false))
            ->add('requestURLtest', null, array(
                'label' => 'Ссылка для отправки запросов (Тестовый режим)'
            ))
            ->add('shopSuccessURL', null, array(
                'label' => 'Ссылка на которую будет переадресован юзер при успешном выполнении платежа'
            ))
            ->add('shopFailURL', null, array(
                'label' => 'Ссылка на которую будет переадресован юзер при возникновении ошибки при выполнении платежа'
            ));
    }

}