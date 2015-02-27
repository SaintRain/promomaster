<?php

/**
 * Бизнесс логика по генерированию мультиязычных полей из настроек
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LanguageBundle\Logic;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LanguageLogic {

    public $configs;
    public $session;

    public function __construct($configs, $session) {

        if ($session->has('activeLanguage')) {
            $configs['active'] = $session->get('activeLanguage');
        }

        $this->configs = $configs;
        $this->session = $session;
    }

    /**
     * Добавление в formMapper мультиязычных полей
     */
    public function add($formMapper, $options) {

        foreach ($this->configs['languages'] as $l => $data) {
            $field = $options;
            if ($l != $this->configs['active'] && isset($field[2]['required'])) {
                $field[2]['required'] = false;
            }
            if (!isset($field[2]['attr']) || !isset($field[2]['attr']['class'])) {
                $field[2]['attr']['class'] = 'span5 ' . $this->configs['classId'] . $l;
            } else {
                $field[2]['attr']['class'] = $field[2]['attr']['class'] . ' ' . $this->configs['classId'] . $l;
            }

            $field[0] = $field[0] . $l;
            call_user_func_array(array($formMapper, 'add'), $field);
        }
        return $formMapper;
    }

    /**
     * По ключу достает падеж
     * @param type $casesArray
     * @param type $key
     * @return type
     * @throws NotFoundHttpException
     */
    public function getCaseByKey($casesArray, $key) {
        $res = '';
        $needBreak = false;
        foreach ($this->configs['cases'] as $locale => $cases) {
            if (isset($cases[$key])) {
                $index = 0;
                foreach ($cases as $caseKey => $case) {
                    if ($caseKey == $key) {
                        if (isset($casesArray[$index])) {
                            $res = $casesArray[$index];
                        }
                        break;
                    }
                    $index++;
                }
                $needBreak = true;
            }

            if ($needBreak) {
                break;
            }
        }

        return $res;
    }
}
    