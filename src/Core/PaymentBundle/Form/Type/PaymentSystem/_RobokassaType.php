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

class RobokassaType extends AbstractType {

    private $logic;

    public function __construct($logic) {
        $this->logic = $logic;
    }

    /**
     * Построение формы
     * http://www.robokassa.ru/ru/HowTo.aspx
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        //var_dump($options['system']);

        $this->logic->setSystem($options['system']);

$amount = 100.10;

$builder
    ->add('amount', 'text', array(
        'data' => $amount,
    ));

        /**
          "<input type=hidden name=MrchLogin value=$mrh_login>".
          "<input type=hidden name=OutSum value=$out_summ>".
          "<input type=hidden name=InvId value=$inv_id>".
          "<input type=hidden name=Desc value='$inv_desc'>".
          "<input type=hidden name=SignatureValue value=$crc>".
          "<input type=hidden name=IncCurrLabel value=$in_curr>".
          "<input type=hidden name=Culture value=$culture>".
          "<input type=hidden name=Shp_item value='$shp_item'>".
         */
//        $builder
//            ->add('MrchLogin', 'text', array(
//                'data' => $options['system']->getLogin(),
//            ))
//            ->add('OutSum', 'text', array(
//                'data' => $amount,
//            ))
//            ->add('InvId', 'text', array(
//                'data' => $id,
//            ))
//            ->add('Desc', 'text', array(
//                'data' => '',
//            ))
//            ->add('SignatureValue', 'text', array(
//                'data' => $this->logic->getSignature($amount, $id),
//            ))
//            ->add('IncCurrLabel', 'text', array(
//                'data' => '',
//            ))
//            ->add('Culture', 'text', array(
//                'data' => '',
//            ))
//            ->add('Shp_item', 'text', array(
//                'data' => '',
//        ))
//        ;
    }

    public function buildView(FormView $view, FormInterface $form, array $options) {
//        if (!$this->options->getIsEnabled()) {
//            return;
//        }
        //$view->vars['libFirst'] = $libFirst;
    }

    /**
     *  Устанавливаем опции по умолчанию
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {

        // Добавляем опции в разрешимый список
        $defaults = array(
            'system' => array(),
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
        return 'core_payment_type_robokassa';
    }

}