<?php
/**
 * Форма редактирования настроек для платежной системы WebMoney
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Admin\Form\Mapper;

use Sonata\AdminBundle\Form\FormMapper;
use Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper;
use Core\PaymentBundle\Entity\Payment;
use Core\PaymentBundle\Logic\PaymentSystem\YandexMoneyLogic;
use Core\PaymentBundle\Logic\PaymentSystem\PlasticCardLogic;

class PaymentFormMapper extends LanguageSwitcherFormMapper
{

    public function __construct(FormMapper $formMapper, array $options)
    {

        parent::__construct($formMapper, $options);

        $obj = $options['obj'];

        $isExist = $obj->getId() ? true : false;

        $formMapper->with('Платеж');


        $formMapper->add('id', 'text',
            array(
            'label' => ' ',
            'disabled' => true,
            'required' => false,
            'attr' => array('style' => 'width:100px;')
        ));
        $formMapper
            ->add('isPassed', null, array(
                'label' => 'Выполнен',
                'disabled' => $obj->getIsPassed(),
                'required' => false,
        ));

        if ($obj->getId() && $obj->getIsPassed() && $obj->getSystem() && in_array($obj->getSystem()->getSystem(), [YandexMoneyLogic::PAYMENT_SYSTEM, PlasticCardLogic::PAYMENT_SYSTEM])) {
            $formMapper
                ->add('isRefund', null,
                    array(
                    'label' => 'Возврат',
                    'help' => 'Выполнить полный возврат средств на счет пользователя.',
                    'required' => false,
                    'disabled' => $obj->getIsRefund(),
                    ), [
                    'wrapper' => [
                        'class' => 'isRefundRow',
                ]])
                ->add('reasonRefund', null,
                    array(
                    'label' => 'Причина возврата',
                    'help' => 'На сайте не выводится',
                    'required' => false,
                    'disabled' => $obj->getIsRefund(),
                    ),
                    [
                    'wrapper' => [
                        'class' => 'hiddenRefundRows',
                        'style' => $obj->getIsRefund() ? '' : 'display: none;',
            ]])
                ->add('amountRefund', 'money',
                    array(
                    'label' => 'Сумма возврата',
                    'help' => 'не может превышать сумму платежа',
                    'required' => false,
                    'disabled' => $obj->getIsRefund(),
                    'attr' => ['data-mask' => 'money'],
                    ),
                    [
                    'wrapper' => [
                        'class' => 'hiddenRefundRows',
                        'style' => $obj->getIsRefund() ? '' : 'display: none;',
            ]]);
        }

        if ($obj->getId() && $obj->getSystem()) {
            $formMapper
                ->add('updatedAt', null,
                    array(
                    'label' => 'Обновлен',
                    'widget' => 'single_text',
                    'required' => false,
                    'format' => 'dd.MM.yyyy в HH:mm',
                    'view_timezone' => $options['container']->getParameter('default_timezone'),
                    'disabled' => true), [
                    'wrapper' => ['class' => 'pull-left'],
                    'clearfix' => ['after'],
            ]);
        }
        $formMapper
            ->add('amount', 'money', array(
                'label' => 'Сумма операции',
                'read_only' => $isExist,
                'attr' => ['data-mask' => 'money']
        ));
        $formMapper
            ->add('type', 'choice',
                array(
                'label' => 'Тип операции',
                'read_only' => $isExist,
                'choices' => array(
                    null => 'Выберите тип операции',
                    Payment::TYPE_IN => 'Приход средств на баланс контрагента',
                    Payment::TYPE_OUT => 'Расход средств с баланса контрагента',
                )
        ));
        $formMapper
            ->add('customer', 'ajax_entity',
                [
                'label' => 'Контрагент',
                'read_only' => $obj->getCustomer() !== null,
                'required' => true,
                'properties' => [
                    'id' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'full',
                    ),
                    'user.email' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'left',
                    ),
                    'firstName' => array(
                        'search' => false,
                        'return' => true,
                    ),
                    'surName' => array(
                        'search' => false,
                        'return' => true,
                    ),
                    'organization' => array(
                        'search' => true,
                        'return' => true,
                    )],
                'select2_constructor' => array(
                    'placeholder' => 'Введите E-mail или наименование организации'
                ),
        ]);
        $formMapper
            ->add('system', null,
                array(
                'label' => 'Платежная система',
                'read_only' => $isExist,
                'required' => false,
                'property' => 'captionRu',
                'help' => 'Выберите платежную систему, если это необходимо или оставьте поле пустым',
        ));

        $this
            ->add('note', null,
                array(
                'label' => 'Примечание',
                'help' => 'Описание произведенной операции, на сайте не выводится',
                'attr' => array(
                    'rows' => 5
                )
        ));
        if ($obj->getId() && $obj->getLog()) {
            $formMapper
                ->add('log', null,
                    array(
                    'label' => 'Лог',
                    'help' => 'Запросы и ответы от платежной системы',
                    'read_only' => true,
                    'attr' => array(
                        'rows' => 15
                    )
            ));
        }

        $formMapper
            ->add('order', 'ajax_entity',
                [
                'label' => ' ',
                'required' => false,
                'properties' => [
                    'id' => array(
                        'search' => true,
                        'return' => true,
                        'entry' => 'full',
                    )],
                'select2_constructor' => array(
                    'minimumInputLength' => 1,
                    'placeholder' => '№ заказа, БЕЗ ведущих нулей',
                    'formatResult' => 'function(result) { return "Заказ №" + leadZero(result.id, 7); }',
                    'formatSelection' => 'function(result) { return "Заказ №" + leadZero(result.id, 7); }',
                ),
        ]);

        $formMapper->end();
    }
}