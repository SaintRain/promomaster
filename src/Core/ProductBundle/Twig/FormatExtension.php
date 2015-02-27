<?php

/**
 * Twig расширения для ранообразного форматирования текста или чисел
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ProductBundle\Twig;

use Symfony\Component\Intl\Intl;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;

class FormatExtension extends \Twig_Extension
{

    public $locale;
    private $request;

    public function __construct($locale)
    {
        $this->locale = $locale;
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
            'dimensionsFormat' => new \Twig_Function_Method($this, 'dimensionsFormatFunction'),
            'numberFormat' => new \Twig_Function_Method($this, 'numberFormatFunction'),
            'weightFormat' => new \Twig_Function_Method($this, 'weightFormatFunction'),
        );
    }

    /**
     * Выводит длину, ширину и высоту в формате "В 15см Ш 5см Д 1см"
     *
     * @param float $h
     * @param float $w
     * @param float $l
     * @return string
     */
    public function dimensionsFormatFunction($h, $w, $l, $separator = '')
    {
        if ($this->locale === 'ru') {
            $Hru = ' В ';
            $Wru = ' Ш ';
            $Lru = ' Д ';
        }

        $str = '';

        if ($h) {
            $str .= $Hru . $this->mm2humanView($h, $separator);
        }
        if ($w) {
            $str .= $Wru . $this->mm2humanView($w, $separator);
        }
        if ($l) {
            $str .= $Lru . $this->mm2humanView($l, $separator);
        }

        return str_replace('  ', ' ', $str);
    }

    /**
     * Вспомагательная функция переводит мм в см, м, км
     *
     * @param float $mm
     * @return string
     */
    private function mm2humanView($mm, $separator)
    {

        if ($this->locale === 'ru') {
            $units = array(
                'km' => 'км',
                'm' => 'м',
                'sm' => 'см',
                'mm' => 'мм'
            );
        }

        if ($mm >= 1000000) {
            $unit = $units['km'];
            $number = $mm / 1000000;
        } elseif ($mm >= 1000) {
            $unit = $units['m'];
            $number = $mm / 1000;
        } elseif ($mm >= 10) {
            $unit = $units['sm'];
            $number = $mm / 10;
        } else {
            $unit = $units['mm'];
            $number = $mm;
        }

        $number = $this->numberFormatFunction($number);

        return $number . $separator . $unit;
    }

    /**
     * Преобразования числа в нужный формат
     *
     * @param $number
     * @param integer $decimals
     * @param string $dec_point
     * @param string $thousands_sep
     * @return string
     */
    public function numberFormatFunction($number, $hide_null_dec = true, $decimals = 2, $dec_point = ',', $thousands_sep = ' ')
    {
        $number = number_format((float)$number, $decimals, $dec_point, $thousands_sep);
        while (substr($number, -1) === '0') {
            $number = substr($number, 0, strlen($number) - 1);
        }
        if (substr($number, -1) === $dec_point) {
            $number = substr($number, 0, strlen($number) - 1);
        }
        return $number;
    }

    public function weightFormatFunction($number, $isNetWeightInGm, $separator = ' ')
    {
        if ($this->locale === 'ru') {
            $units = array(
                'kg' => 'кг',
                'g' => 'г',
            );
        }

        $number = $this->numberFormatFunction($number);

        return $number . $separator . $units[($isNetWeightInGm ? 'g' : 'kg')];
    }

    public function getName()
    {
        return 'format_extension';
    }

}
