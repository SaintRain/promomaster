<?php

/**
 * Форма для редактирования поставщиков
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LogisticsBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;
use Core\DirectoryBundle\Entity\Repository\CurrencyRepository;

class SupplierFormMapper extends LanguageSwitcherFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        parent::__construct($formMapper, $options);

        $formMapper->with('Основное')
            ->add('legalForm', 'sonata_type_model', array(
                'property' => 'captionRu',
                'required' => true,
                'label' => 'Организационно-правовая форма'
            ))
            ->add('caption', null, array(
                'required' => true,
                'label' => 'Название',
            ))
            ->add('inn', null, array(
                'required' => false,
                'label' => 'ИНН',
            ))
            ->add('kpp', null, array(
                'required' => false,
                'label' => 'КПП',
            ))
            ->add('ogrn', null, array(
                'required' => false,
                'label' => 'ОГРН',
            ))
            ->add('positionOfTheHead', null, array(
                'required' => false,
                'label' => 'Должность руководителя',
            ))
            ->add('nameOfTheHead', null, array(
                'required' => false,
                'label' => 'ФИО руководителя',
            ))
            ->add('country', null, array(
                'property' => 'captionRu',
                'required' => true,
                'label' => 'Страна'
            ))
            ->add('city', null, array(
                'required' => false,
                'label' => 'Город'
            ))
            ->add('addressUr', null, array(
                'required' => false,
                'label' => 'Юр. адрес'
            ))
            ->add('addressPost', null, array(
                'required' => false,
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
            ->add('bic', null, array(
                'required' => false,
                'label' => 'БИК '
            ))
            ->add('paymentAccount', null, array(
                'required' => false,
                'label' => 'Р/с в банке'
            ))
            ->add('site', 'text', array(
                'required' => false,
                'label' => 'Сайт',
                'attr' => ['data-mask' => 'url']

            ))
            ->add('email', null, array(
                'required' => false,
                'label' => 'E-mail',
            ))
            ->with('Настройки анализа прайса')

            ->add('minSumForOrder', 'money', array(
                'required' => false,
                'label' => 'Минимальная сумма заказа',
                'help'=>'Поставщик может не отправлять товары, если их стоимость меньше указанного значения',
                'attr' => ['data-mask' => 'money']
            ))
            ->add('paCurrency', null,
                array(
                    'query_builder' => function (CurrencyRepository $repository) {
                        return $repository->createQueryBuilder('s')->where('s.isEnabled = 1');
                    },
                    'required' => false,
                    'property' => 'captionRu',
                    'label' => 'Валюта прайса'
                )
            )
            ->add('paSettings', 'sonata_type_collection',
                array(
                    'by_reference' => false,
                    'help' => 'Используется для установки соответствий между названиями колонок в прайсе и полями из сущности продукта. В качестве имени используется буква(A,B,C и т.д.).'
                        . ' Если необходимо просуммировать две колонки, то можно прописать вот так C+D',
                    'required' => false,
                    'label' => 'Соответствие',
                    'type_options' => array('delete' => true)
                ),
                array(
                    'sortable' => 'indexPosition',
                    'edit' => 'inline',
                    'inline' => 'table',
                ))
            ->end();
    }

}
