<?php

/**
 * Форма для редактирования продавцов
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;

class SellerFormMapper extends LanguageSwitcherFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        parent::__construct($formMapper, $options);

        $formMapper->with('Основное')
            ->add('legalForm', null, array(
                'property' => 'captionRu',
                'required' => true,
                'label' => 'Организационно-правовая форма'
            ))
            ->add('caption', null, array(
                'required' => true,
                'label' => 'Название',
                'help' => 'Если организация, то вводится с кавычками, например, РОСТПЕЙ'
            ))
            ->add('code', null, array(
                'required' => false,
                'label' => 'Уникальный код',
                'help' => 'Заполняется автоматически, если оставить пустым'
            ))
            ->add('inn', null, array(
                'required' => true,
                'label' => 'ИНН',
            ))
            ->add('kpp', null, array(
                'required' => false,
                'label' => 'КПП',
            ))
            ->add('ogrn', null, array(
                'required' => true,
                'label' => 'ОГРН',
            ))
            ->add('okpo', null, array(
                'required' => true,
                'label' => 'ОКПО'
            ))
            ->add('positionOfTheHead', null, array(
                'required' => true,
                'label' => 'Должность руководителя',
            ))
            ->add('nameOfTheHead', null, array(
                'required' => true,
                'label' => 'ФИО руководителя',
            ))
            ->add('nameOfTheHeadInGenitive', null, array(
                'required' => false,
                'label' => 'ФИО руководителя в родительном падеже'
            ))
            ->add('headActsUnder', null, array(
                'required' => false,
                'label' => 'Руководитель действует на основании'
            ))
            ->add('nameOfTheAccountant', null, array(
                'required' => true,
                'label' => 'ФИО гл. бухгалтера'
            ))
            ->add('nameOfTheAccountantInGenitive', null, array(
                'required' => false,
                'label' => 'ФИО гл. бухгалтера в род. падеже'
            ))
            ->add('country', null, array(
                'property' => 'captionRu',
                'required' => true,
                'label' => 'Страна'
            ))
            ->add('city', null, array(
                'required' => true,
                'label' => 'Город'
            ))
            ->add('addressUr', null, array(
                'required' => true,
                'label' => 'Юр. адрес'
            ))
            ->add('dontPublicAddressUr', null, array(
                'required' => false,
                'label' => 'Не публиковать юр. адрес',
                'help' => 'не публиковать адрес в счетах (вместо него будет показан московкий адрес и телефон)'
            ))
            ->add('addressPost', null, array(
                'required' => true,
                'label' => 'Почтовый адрес'
            ))
            ->add('phone', null, array(
                'required' => false,
                'label' => 'Телефон'
            ))
            ->add('fax', null, array(
                'required' => false,
                'label' => 'Факс'
            ))
            ->add('bank', 'ajax_entity', [
                'label' => 'Банк',
                'required' => true,
                'properties' => [
                    'id' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'full',
                    ),
                    'bic' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'left',
                    ),
                    'caption' => array(
                        'search' => false,
                        'return' => true,
                        'entry' => 'left',
                    ),
                ],
                'select2_constructor' => array(
                    'placeholder' => 'Введите BIC-код',
                    'minimumInputLength' => 1
                ),
            ])
            ->add('paymentAccount', null, array(
                'required' => true,
                'label' => 'Р/с в банке'
            ))
            ->add('corrAccount', null, array(
                'required' => true,
                'label' => 'К/с в банке'
            ))
            ->add('isWorkingWithNds', null, array(
                'required' => false,
                'label' => 'Работает с НДС'
            ))
            ->add('regionsCityList', 'sonata_type_collection', array(
                    'required' => false,
                    'by_reference' => true,
                    'label' => 'Регионы'
                ), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'indexPosition',
                    'help' => 'Список регионов и городов, в которых работает данный продавец. Если вы укажете определенные регионы или города, то этот продавец будет назначен всем новым клиентам и заказам из этих регионов и городов.',
                )
            )
//                ->add('paymentSystems', 'sonata_type_collection', array(
//                    'required' => false,
//                    'label' => 'Регионы',
//                    'help'=> 'Если указана одна или более платежная система, то клиенты, которые привязаны к этому продавцу, смогут оплачивать свои заказы только этой(ми) платежными системами.
//                            Если не указана ни одна платежная система, то клиенты, которые привязаны к этому продавцу, смогут оплатить заказ любой платежной системой'
//                ))
            ->add('isShowInContactForm', null, array(
                'required' => false,
                'label' => 'Показывать в контактной форме'
            ))
            ->add('isDefault', null, array(
                'required' => false,
                'label' => 'Дефолтный продавец',
                'help' => 'Дефолтный продавец используется в том случае, если пользователю не назначен продавец и не удалось автоматически по региону определить продавца'
            ))
            ->with('Аккаунты/Пароли')
            ->add('dpdAccount', null, array(
                'required' => false,
                'label' => 'Параметры для DPD - аккаунт'
            ))
            ->add('dpdPassword', null, array(
                'required' => false,
                'label' => 'Параметры для DPD - пароль'
            ))
            ->add('cdekAccount', null, array(
                'required' => false,
                'label' => 'Параметры для CDEK - аккаунт'
            ))
            ->add('cdekPassword', null, array(
                'required' => false,
                'label' => 'Параметры для CDEK - пароль'
            ))
            ->add('dellineLogin', null, array(
                'required' => false,
                'label' => 'Параметры для Дел. Линий  - логин'
            ))
            ->add('dellinePassword', null, array(
                'required' => false,
                'label' => 'Параметры для Дел. Линий  - пароль'
            ))
            ->add('pekLogin', null, array(
                'required' => false,
                'label' => 'Параметры для ПЭК  - логин',
                'help' => 'может быть использован одинаковый для нескольких продавцов'
            ))
            ->add('pekPassword', null, array(
                'required' => false,
                'label' => 'Параметры для ПЭК  - пароль',
                'help' => 'может быть использован одинаковый для нескольких продавцов'
            ))
            ->add('postRuLogin', null, array(
                'required' => false,
                'label' => 'Параметры для Почты России  - логин',
                'help' => 'может быть использован одинаковый для нескольких продавцов'
            ))
            ->add('postRuPassword', null, array(
                'required' => false,
                'label' => 'Параметры для Почты России  - пароль',
                'help' => 'может быть использован одинаковый для нескольких продавцов'
            ))
            ->add('emsContractNumber', null, array(
                'required' => false,
                'label' => 'Параметры для EMS - номер договора'
            ))
            ->add('idIn1c', null, array(
                'required' => false,
                'label' => 'ID 1С-Бухгалтерия'
            ))
            ->with('Печати')
            ->add('imageSign', 'multiupload_image', array(
                'parent_form' => $formMapper,
                'hide_field' => array('all'), // Скрывает доп. поля
                'label' => 'Подпись',
                'width' => '40%',
                'attr' => array(
                    'multiple' => false, // для одного файла
                )
            ))
            ->add('imageSignOfAccountant', 'multiupload_image', array(
                'parent_form' => $formMapper,
                'hide_field' => array('all'), // Скрывает доп. поля
                'label' => 'Подпись гл. бухгалтера',
                'width' => '40%',
                'attr' => array(
                    'multiple' => false, // для одного файла
                )
            ))
            ->add('imageStamp', 'multiupload_image', array(
                'parent_form' => $formMapper,
                'hide_field' => array('all'), // Скрывает доп. поля
                'label' => 'Штамп',
                'width' => '40%',
                'attr' => array(
                    'multiple' => false, // для одного файла
                )
            ))
            ->add('imageSignAndStamp', 'multiupload_image', array(
                'parent_form' => $formMapper,
                'hide_field' => array('all'), // Скрывает доп. поля
                'label' => 'Подпись+Штамп',
                'width' => '40%',
                'attr' => array(
                    'multiple' => false, // для одного файла
                )
            ))
            ->end();
    }

}
