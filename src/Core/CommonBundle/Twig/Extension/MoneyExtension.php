<?php

/**
 * Twig расширения для работы с деньгами
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Twig\Extension;

use Symfony\Component\Intl\Intl;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use Core\CommonBundle\Twig\Extension\DeclineOfNumberExtension;

class MoneyExtension extends \Twig_Extension
{

    public $default_currency;
    public $locale;
    private $request;
    private $DeclineOfNumberExtension;

    public function __construct($default_currency, $locale, $DeclineOfNumberExtension)
    {
        $this->default_currency = $default_currency;
        $this->locale = $locale;
        $this->DeclineOfNumberExtension = $DeclineOfNumberExtension;
    }

    /**
     * Подписка на событие request для получения текущей локили
     *
     * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        if ($event->getRequestType() === HttpKernel::MASTER_REQUEST) {
            $this->request = $event->getRequest();
            $this->locale = $event->getRequest()->getLocale();
        }
    }

    public function getFunctions()
    {
        return array(
            'moneyFormat' => new \Twig_Function_Method($this, 'moneyFormatFunction'),
            'currencyFormat' => new \Twig_Function_Method($this, 'currencyFormatFunction'),
            'amount2str' => new \Twig_Function_Method($this, 'amount2strFunction'),
            'declOfNum' => new \Twig_Function_Method($this, 'declOfNumFunction'),
        );
    }

    /**
     * Преобразования цены в нужный формат (пример: 1 000 000,00)
     *
     * @param $number
     * @param integer $decimals
     * @param string $dec_point
     * @param string $thousands_sep
     * @return string
     */
    function moneyFormatFunction($number, $hide_null_dec = true, $decimals = 2, $dec_point = ',', $thousands_sep = ' ')
    {

        $number = number_format((float) $number, $decimals, $dec_point, $thousands_sep);
        if ($hide_null_dec && (float) substr($number, -$decimals) === 0.0) {
            $number = substr($number, 0, strlen($number) - ($dec_point ? $decimals + 1 : $decimals));
        }

        // ... добавить логику конвертации вылют

        return $number;
    }

    public function currencyFormatFunction()
    {

        // ... добавить логику на наличие валюты в сессии, если на сайте будет переключатель валют

        $currencySymbol = Intl::getCurrencyBundle()->getCurrencySymbol($this->default_currency, $this->locale);

        return $currencySymbol;
    }

    /**
     * Возвращает цену записанную словами
     *
     * @param double $num
     * @return string
     */
    public function amount2strFunction($num)
    {
        if ($this->locale === 'ru') {
            $nul = 'ноль';
            $ten = array(
                array('', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'),
                array('', 'одна', 'две', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'),
            );
            $a20 = array('десять', 'одиннадцать', 'двенадцать', 'тринадцать', 'четырнадцать', 'пятнадцать', 'шестнадцать', 'семнадцать', 'восемнадцать', 'девятнадцать');
            $tens = array(2 => 'двадцать', 'тридцать', 'сорок', 'пятьдесят', 'шестьдесят', 'семьдесят', 'восемьдесят', 'девяносто');
            $hundred = array('', 'сто', 'двести', 'триста', 'четыреста', 'пятьсот', 'шестьсот', 'семьсот', 'восемьсот', 'девятьсот');
            $unit = array(
                array('копейка', 'копейки', 'копеек', 1),
                array('рубль', 'рубля', 'рублей', 0),
                array('тысяча', 'тысячи', 'тысяч', 1),
                array('миллион', 'миллиона', 'миллионов', 0),
                array('миллиард', 'милиарда', 'миллиардов', 0),
            );

            list($rub, $kop) = explode('.', sprintf("%015.2f", floatval($num)));
            $out = array();
            if (intval($rub) > 0) {
                foreach (str_split($rub, 3) as $uk => $v) {
                    if (!intval($v)) {
                        continue;
                    }
                    $uk = sizeof($unit) - $uk - 1;
                    $gender = $unit[$uk][3];
                    list($i1, $i2, $i3) = array_map('intval', str_split($v, 1));
                    $out[] = $hundred[$i1];
                    if ($i2 > 1) {
                        $out[] = $tens[$i2] . ' ' . $ten[$gender][$i3]; # 20-99
                    } else {
                        $out[] = $i2 > 0 ? $a20[$i3] : $ten[$gender][$i3]; # 10-19 | 1-9
                    }
                    if ($uk > 1) {
                        $out[] = $this->DeclineOfNumberExtension->declOfNumFunction($v, [$unit[$uk][0], $unit[$uk][1], $unit[$uk][2]], false);
                    }
                }
            } else {
                $out[] = $nul;
            }
            $out[] = $this->DeclineOfNumberExtension->declOfNumFunction(intval($rub), [$unit[1][0], $unit[1][1], $unit[1][2]], false); // rub
            $out[] = $kop . ' ' . $this->DeclineOfNumberExtension->declOfNumFunction($kop, [$unit[0][0], $unit[0][1], $unit[0][2]], false); // kop

            return trim(preg_replace('/ {2,}/', ' ', join(' ', $out)));
        }
    }

    public function getName()
    {
        return 'money_extension';
    }

}
