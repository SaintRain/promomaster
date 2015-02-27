<?php

/**
 * Новый тип формы для совершения платежа через WebMoney
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\PaymentBundle\Form\Type\PaymentSystem;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormView;

class WebMoneyType extends AbstractType {

    private $logic;
    private $options;

    public function __construct($logic) {
        $this->logic = $logic;
        $this->options = $this->logic->getConfig('WebMoney');
    }

    /**
     * Построение формы
     * http://wiki.webmoney.ru/projects/webmoney/wiki/Web_Merchant_Interface#6
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        if (!$this->options->getIsEnabled()) {
            return;
        }
        $builder
            ->add('LMI_PAYEE_PURS', 'text', array(// Номер кошелька
                'data' => $this->options->getWallet(),
            ))
            ->add('LMI_RESULT_URL', 'text', array(
                'data' => $this->options->getResultURL(),
            ))
            ->add('LMI_SUCCESS_URL', 'text', array(
                'data' => $this->options->getSuccessURL(),
            ))
            ->add('LMI_FAIL_URL', 'text', array(
                'data' => $this->options->getFailURL(),
            ))
            ->add('LMI_PAYMENT_AMOUNT', 'text', array(
                'data' => 0,
            ))
//            ->add('LMI_PAYMENT_NO', 'text', array(
//                'data' => '',
//            ))
//            ->add('LMI_PAYMENT_DESC_BASE64', 'text', array(
//                'data' => base64_encode(''),
//            ))

            ->add('requestURL', 'text', array(
                'data' => $this->options->getRequestURL(),
        ));

        // для тестирования
//        $builder
//            ->add('LMI_SIM_MODE', 'text', array(
//                'data' => 1, // 1 - SECCESS, 2 - FAIL
//        ));
        /*
         *
          $form['action'] = ($data['action'] ? $data['action'] : $this->actions['wm']);
          $form['hidden'][] = "<input type='hidden' name='id_transaction' value='{$data['id_transaction']}'>";
          $form['hidden'][] = "<input type='hidden' name='subscribe' value='{$data['subscribe']}'>";
         */
    }

    public function buildView(FormView $view, FormInterface $form, array $options) {
        if (!$this->options->getIsEnabled()) {
            return;
        }
        //$view->vars['libFirst'] = $libFirst;
    }

    /**
     *  Устанавливаем опции по умолчанию
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        // Добавляем опции в разрешимый список
        $defaults = array(
            'config' => array(),
        );
        $resolver->setDefaults($defaults);

        // Перечисленные опции являются обязательными
        $resolver->setRequired(array(
        ));
    }

    /**
     * Название типа формы
     */
    public function getName() {
        return 'core_payment_type_webmoney';
    }

}