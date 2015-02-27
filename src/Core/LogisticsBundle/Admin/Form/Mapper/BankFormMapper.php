<?php

/**
 * Форма для редактирования статусов единиц товаров
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class BankFormMapper extends LanguageSwitcherFormMapper {

    public function __construct(FormMapper $formMapper, array $options) {
        parent::__construct($formMapper, $options);

        $formMapper->with('Основное')
                ->add('caption', null, array(
                    'required' => true,
                    'label' => 'Название короткое'))
                ->add('captionFull', null, array(
                    'required' => true,
                    'label' => 'Полное название',
                ))
                ->add('license', null, array(
                    'required' => true,
                    'label' => 'Лицензия',
                ))
                ->add('isLicenseCanceled', null, array(
                    'required' => false,
                    'label' => 'Лицензия аннулирована',
                ))
                ->add('bic', null, array(
                    'required' => false,
                    'label' => 'БИК',
                    'help' => '9 цифр',
                    'attr'=>['data-mask'=>'999999999']
                ))
                ->add('swift', null, array(
                    'required' => false,
                    'label' => 'SWIFT',
                    'help' => '8 или 11 знаков'
                ))
                ->add('correspondentAccount', null, array(
                    'required' => false,
                    'label' => 'Кор. счет',
                    'help' => '20 цифр',
                    'attr'=>['data-mask'=>'99999999999999999999']
                ))
                ->add('okpo', null, array(
                    'required' => false,
                    'label' => 'ОКПО',
                    'help' => '8 цифр',
                    'attr'=>['data-mask'=>'99999999']
                ))
                ->add('parentBank', null, array(
                    'required' => false,
                    'label' => 'Банк-родитель'
                ))
                ->add('city', null, array(
                    'required' => false,
                    'label' => 'Город'
                ))
                ->add('address', null, array(
                    'required' => false,
                    'label' => 'Адрес'
                ))
                ->add('phones', null, array(
                    'required' => false,
                    'label' => 'Телефон(ы)'
                ))
                ->add('site', 'text', array(
                    'required' => false,
                    'attr'=>['data-mask'=>'url'],
                    'label' => 'Сайт'
                ))
                ->add('email', null, array(
                    'required' => false,
                    'label' => 'Email'
                ))
                ->end();
    }

}
