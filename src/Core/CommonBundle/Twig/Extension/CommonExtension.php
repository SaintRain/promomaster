<?php

/**
 * Twig расширения
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Twig\Extension;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;

class CommonExtension extends \Twig_Extension
{

    private $locale;
    private $request;
    private $doctrine;
    private $router;

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('menuTitleFormater', array($this, 'menuTitleFormaterFilter')),
            new \Twig_SimpleFilter('idFormat', array($this, 'idFormatFilter')),
            new \Twig_SimpleFilter('getMonthWord', array($this, 'getMonthWordFilter')),
            new \Twig_SimpleFilter('floatval', array($this, 'floatvalFilter'))


        );
    }

    public function getFunctions()
    {
        return array(
            'isOneWord' => new \Twig_Function_Method($this, 'isOneWordFunction'),
            'get_class' => new \Twig_Function_Method($this, 'get_classFunction'),
            'get_parent_class' => new \Twig_Function_Method($this, 'get_parent_classFunction'),
            'setKeysIds' => new \Twig_Function_Method($this, 'setKeysIdsFunction')
        );
    }

    public function __construct($doctrine, $router)
    {
        $this->doctrine = $doctrine;
        $this->router = $router;
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

    /**
     * Над ID делает красивое форматирование
     * @param type $id
     * @return type
     * @author Sergeev A.M.
     */
    public function idFormatFilter($id)
    {
        $number = str_pad($id, 7, '0', STR_PAD_LEFT);

        return $number;
    }

    /**
     * Функция для добавления тега <br> если название меню состоит из 2-х слов
     *
     * @param type $string
     * @return type
     */
    public function menuTitleFormaterFilter($string)
    {
        $string = trim($string);

        if (($pos = mb_strpos($string, ' ')) > 0) {
            $string = preg_replace('/ /', ' <br>', $string, 1);
        }
        return $string;
    }


    public function floatvalFilter($stringNumber)
    {
        $floatNumber = floatval($stringNumber);

        return $floatNumber;
    }

    /**
     * Проверяет строку на наличие пробелов (если есть, то в строке более 1 слова)
     *
     * @param string $string
     * @return boolean
     */
    public function isOneWordFunction($string)
    {
        return mb_strpos(trim($string), ' ') === false;
    }

    /**
     * Получаем месяц словом по дате
     *
     * @param DateTime $date
     * @return string
     */
    public function getMonthWordFilter(\DateTime $date, $isWithYear = false)
    {
        $key = $date->format('n') - 1;
//        if ($this->locale === 'ru') {
        $month = [
            'январь',
            'февраль',
            'март',
            'апрель',
            'май',
            'июнь',
            'июль',
            'август',
            'сентябрь',
            'октябрь',
            'ноябрь',
            'декабрь'
        ];
//        }
        return $month[$key] . ' ' . $date->format('Y');
    }

    /**
     * Выполнаяет стандартную php функцию get_class
     *
     * @param object $object
     * @return string
     */
    public function get_classFunction($object)
    {
        return is_object($object) ? get_class($object) : '';
    }

    /**
     * Выполнаяет стандартную php функцию get_parent_class
     *
     * @param object $object
     * @return string
     */
    public function get_parent_classFunction($object)
    {
        return is_object($object) ? get_parent_class($object) : '';
    }

    /**
     * Возвращает исходный массив, только ключами являются ID
     * @param array $array
     * @return array
     */
    public function setKeysIdsFunction(array $array, $treeIdMethods = null)
    {
        $res = [];
        foreach ($array as $a) {
            if (is_object($a)) {
                if ($treeIdMethods) {
                    $a = $a->$treeIdMethods;
                }
                $res[$a->getId()] = $a;
            }
        }
//        echo '<div>';
//        //print_r($res);
//        echo '</div>'; exit;
        return $res;
    }

    public function getName()
    {
        return 'common_extension';
    }

}
