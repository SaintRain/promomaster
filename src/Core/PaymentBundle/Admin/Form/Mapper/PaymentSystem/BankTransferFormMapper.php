<?php

/**
 * Форма редактирования настроек для платежной системы BankTransfer
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Admin\Form\Mapper\PaymentSystem;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class BankTransferFormMapper extends CommonPaymentSystemFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {

        parent::__construct($formMapper, $options);

        // Настройки BankTransfer
        $formMapper
//            ->with('BankTransfer')
//                ->add('seller', null, array(
//                'label' => 'Продавец',
//                'help' => 'Данные какого продавца будут подставляться для формирования платежек.'
//            ))
                
            /*
            ->add('recipientName', null, array(
                'label' => 'Имя получателя',
            ))
            ->add('recipientAddress', null, array(
                'label' => 'Адрес получателя',
            ))
            ->add('bankNameFull', null, array(
                'label' => 'Полное название банка',
            ))
            ->add('bankNameShort', null, array(
                'label' => 'Сокращеннойе название банка',
            ))
            ->add('bankAddress', null, array(
                'label' => 'Адрес банка',
            ))
            ->add('INN', null, array(
                'label' => 'ИНН',
                'help' => '12 цифр'
            ))
            ->add('KPP', null, array(
                'label' => 'КПП',
                'help' => '9 цифр'
            ))
            ->add('OGRN', null, array(
                'label' => 'ОГРН',
                'help' => '15 цифр'
            ))

            ->add('BIK', null, array(
                'label' => 'БИК',
                'help' => '9 цифр'
            ))
            ->add('Kschet', null, array(
                'label' => 'Корреспондентский счёт',
                'help' => '20 цифр'
            ))
            ->add('Rschet', null, array(
                'label' => 'Расчётный счёт',
                'help' => '20 цифр'
            ))
            */
            ->end();
    }

}