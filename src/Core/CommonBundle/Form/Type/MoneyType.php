<?php

/**
 * Переопределяем тип формы money, чтобы можно было глобально задавать валюту
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\MoneyType as MoneyTypeDefault;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Intl\Intl;

class MoneyType extends MoneyTypeDefault {

    public $default_currency;
    public $locale;

    public function __construct($default_currency, $locale) {
        $this->default_currency = $default_currency;
        $this->locale = $locale;
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options) {
        parent::buildView($view, $form, $options);

        $currencySymbol = Intl::getCurrencyBundle()->getCurrencySymbol($options['currency'] ? $options['currency'] : $this->default_currency, $this->locale);

        $view->vars['currency'] = $options['currency'];
        $view->vars['currencySymbol'] = $currencySymbol;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        parent::setDefaultOptions($resolver);
        $resolver->replaceDefaults(array(
            'currency' => $this->default_currency,
        ));
    }

}
