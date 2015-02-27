<?php

/**
 * Сервис для шифрования данных
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Logic;

class EncodingLogic {

    private $salt;

    public function __construct($salt) {
        $this->salt = $salt;
    }

    /**
     * Обратимое XOR шифрование текста со случайной гаммой
     *
     * @param string $text
     * @param string $password
     * @return string
     */
    private function textcode($text, $password = "") {
        $len = strlen($text);
        $gamma = '';
        $n = $len > 100 ? 8 : 2;
        while (strlen($gamma) < $len) {
            $gamma .= substr(pack('H*', sha1($password . $gamma . $this->salt)), 0, $n);
        }
        return $text ^ $gamma;
    }

    /**
     * Кодирование
     *
     * @param string $text
     * @param string $password
     * @return string
     */
    public function encode($text, $password = "") {
        return base64_encode($this->textcode($text, $password));
    }

    /**
     * Раскодирование
     *
     * @param string $text
     * @param string $password
     * @return string
     */
    public function decode($text, $password = "") {
        return $this->textcode(base64_decode($text), $password);
    }

}
