<?php

/**
 * Функции
 * Дополнительные расширения для Twig'а
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FileBundle\Twig;

class FileFunctionExtension extends \Twig_Extension {

    public function getFunctions() {
        return array(
            new \Twig_SimpleFunction('getter', array($this, 'getterFunction')),
            new \Twig_SimpleFunction('spl_object_hash', array($this, 'spl_object_hashFunction')),
        );
    }

    /**
     * Функция для выполнения get метода из строки
     *
     * @param object $obj
     * @param string $method
     * @return mixed
     */
    public function getterFunction($obj, $method) {
        return $obj->${!${''} = 'get' . ucfirst($method)}();
    }

    /**
     * Выполняет стандартную функцию php spl_object_hash
     *
     * @param object $obj
     * @param string $method
     * @return mixed
     */
    public function spl_object_hashFunction($obj) {
        return spl_object_hash($obj);
    }

    public function getName() {
        return 'file_function_extension';
    }

}