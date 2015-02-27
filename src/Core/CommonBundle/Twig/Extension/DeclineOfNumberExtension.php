<?php

/**
 * Twig расширения для работы с деньгами
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Twig\Extension;

class DeclineOfNumberExtension extends \Twig_Extension
{

    public function __construct()
    {

    }

    public function getFunctions()
    {
        return array(
            'declOfNum' => new \Twig_Function_Method($this, 'declOfNumFunction'),
            'num2str' => new \Twig_Function_Method($this, 'num2strFunction'),
            'num2prepositional' => new \Twig_Function_Method($this, 'num2prepositionalFunction'),
            'numberToLetter' => new \Twig_Function_Method($this, 'numberToLetterFunction'),
        );
    }

    /**
     * Конвертирует число в букву
     * @param type $number
     * @return type
     */
    public function numberToLetterFunction($number) {
        return \PHPExcel_Cell::stringFromColumnIndex($number);
    }

    /**
     * Склонение числительных
     *
     * @param integer $number - число
     * @param array $titles - массив в формате (домен, домена, доменов)
     * @return string
     */
    public function declOfNumFunction($number, $titles)
    {
        $cases = array(2, 0, 1, 1, 1, 2);
        $res = $titles[($number % 100 > 4 && $number % 100 < 20) ? 2 : $cases[min($number % 10, 5)]];

        return $res;
    }

    /**
     * Число прописью
     *
     * @param type $num
     * @return array
     */
    function num2strFunction($num)
    {
        $nul = 'ноль';
        $ten = array(
            array('', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'),
            array('', 'одна', 'две', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'),
        );
        $a20 = array('десять', 'одиннадцать', 'двенадцать', 'тринадцать', 'четырнадцать', 'пятнадцать', 'шестнадцать', 'семнадцать', 'восемнадцать', 'девятнадцать');
        $tens = array(2 => 'двадцать', 'тридцать', 'сорок', 'пятьдесят', 'шестьдесят', 'семьдесят', 'восемьдесят', 'девяносто');
        $hundred = array('', 'сто', 'двести', 'триста', 'четыреста', 'пятьсот', 'шестьсот', 'семьсот', 'восемьсот', 'девятьсот');
        $unit = array(
            array(),
            array(),
            array('тысяча', 'тысячи', 'тысяч', 1),
            array('миллион', 'миллиона', 'миллионов', 0),
            array('миллиард', 'милиарда', 'миллиардов', 0),
        );

        list($int, $trash) = explode('.', sprintf("%015.2f", floatval($num)));
        $out = array();
        if (intval($int) > 0) {
            foreach (str_split($int, 3) as $uk => $v) {
                if (!intval($v)) {
                    continue;
                }
                $uk = sizeof($unit) - $uk - 1;
                $gender = isset($unit[$uk][3]) ? $unit[$uk][3] : 0;
                list($i1, $i2, $i3) = array_map('intval', str_split($v, 1));
                $out[] = $hundred[$i1];
                if ($i2 > 1) {
                    $out[] = $tens[$i2] . ' ' . $ten[$gender][$i3]; # 20-99
                } else {
                    $out[] = $i2 > 0 ? $a20[$i3] : $ten[$gender][$i3]; # 10-19 | 1-9
                }
                if ($uk > 1) {
                    $out[] = $this->declOfNumFunction($v, [$unit[$uk][0], $unit[$uk][1], $unit[$uk][2]], false);
                }
            }
        } else {
            $out[] = $nul;
        }

        return trim(preg_replace('/ {2,}/', ' ', join(' ', $out)));
    }

    /**
     * Число прописью
     *
     * @param type $num
     * @return array
     */
    function num2prepositionalFunction($number)
    {
        $array = array(
            'одном',
            'двух',
            'трех',
            'четырех',
            'пяти',
            'шести',
            'семи',
            'восьми',
            'девяти',
            'десяти',
            'одиннадцати',
            'двенадцати',
            'тринадцати',
            'четырнадцати',
            'пятнадцати',
            'шестнадцати',
            'семнадцати',
            'восемнадцати',
            'девятнадцати',
            'двадцати'
        );

        return ($number > 0 && $number < 21) ? $array[$number - 1] : $number;
    }

    public function getName()
    {
        return 'decline_of_number_extension';
    }

}
