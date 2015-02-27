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
use Application\Sonata\UserBundle\Entity\LegalContragent;

class PaymentSystemType extends AbstractType
{

    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Построение формы
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $paymentSytems = $this->container->get('doctrine')->getManager()->getRepository('CorePaymentBundle:PaymentSystem\CommonPaymentSystem')->findAllEnabled();

//        $name = 'Robokassa';
//        $builder
//            ->add($name, 'core_payment_type_' . strtolower($name), array(
//                'label' => false,
//                'system' => $paymentSytems[$name],
//        ));

        if ($options['data']['customer'] instanceof LegalContragent) {
            $method = 'getIsCustomerCorporate';
        } else {
            $method = 'getIsCustomerIndividual';
        }

        $choices = array();
        foreach ($paymentSytems as $name => $system) {

            // Проверка на доступность по типу контрагента
            if ($system->{$method}()) {

                if ($name === 'PaymentOnDelivery') {
                    if ($this->container->get('session')->has('core_order') && false) {
                        $sessionOrder = $this->container->get('session')->get('core_order');
                        $balance = $this->container->get('core_payment_logic')->getBalance($options['data']['customer']->getId());

                        // Проверка на максимальную сумму "кредита"
                        if (isset($sessionOrder['total_cost']) && ($balance - $sessionOrder['total_cost'] + $system->getCreditLimit()) >= 0) {
                            $choices[$name] = $system->{'getCaption' . $this->container->get('core_payment_system_logic')->getLocale()}();
                        }
                    }
                } else {
                    $choices[$name] = $system->{'getCaption' . $this->container->get('core_payment_system_logic')->getLocale()}();
                }
            }
        }
        $builder
            ->add('PaymentSystem', 'choice', array(
                'label' => false, //$this->container->get('core_payment_system_logic')->trans('label.choose_system'),
                'choices' => $choices,
                'expanded' => true,
                'multiple' => false,
                'attr' => array(
                    'class' => 'choose-payment-system'
                )
            ))
        ;
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {

    }

    /**
     *  Устанавливаем опции по умолчанию
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {

    }

    /**
     * Название типа формы
     */
    public function getName()
    {
        return 'core_payment_type_payment_system';
    }

}
