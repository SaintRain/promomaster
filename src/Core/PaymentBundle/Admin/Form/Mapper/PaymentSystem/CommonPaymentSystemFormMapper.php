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

class CommonPaymentSystemFormMapper extends LanguageSwitcherFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {
        parent::__construct($formMapper, $options);

        $formMapper
            ->with('Настройки');
        $this
            ->add('caption', 'text', array(
                'label' => 'Название'));
        $formMapper
            ->add('system', null, array(
                'label' => 'Системное имя',
                'disabled' => ($options['obj']->getSystem() ? true : false),
            ))
            ->add('commission', null, array(
                'label' => 'Комиссия (%)',
                'help' => 'процент комиссии, который берет себе платежная система с суммы платежа',
            ))
            ->add('isCollectCommission', null, array(
                'label' => 'Взимать комиссию с клиента',
                'help' => 'если выбрано, то при переходе на сайт платежной системы клиент будет видеть сумму больше на указанный процент',
                'required' => false,
            ));

        $this
            ->add('description', 'ckeditor', array(
                'required' => false,
                'config' => array('width' => 700, 'height' => 300),
                'label' => 'Описание'
            ));
        $formMapper
            ->add('isCustomerIndividual', null, array(
                'label' => 'Доступность физическим лицам',
                'required' => false,
            ))
            ->add('isCustomerCorporate', null, array(
                'label' => 'Доступность юридическим лицам',
                'required' => false,
            ))
            ->add('isEnabled', null, array(
                'label' => 'Активность',
                'required' => false))
            ->add('isInFooter', null, array(
                'label' => 'Показывать в футере',
                'required' => false))
            ->add('indexPosition', null, array(
                'label' => 'Позиция сортировки'
            ));
        $formMapper
            ->end();
    }

}