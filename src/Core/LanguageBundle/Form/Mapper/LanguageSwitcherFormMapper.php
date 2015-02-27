<?php

/**
 * Форма для редактирования категорий товаров
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LanguageBundle\Form\Mapper;

class LanguageSwitcherFormMapper {

    public $formMapper;
    public $options;

    public function __construct($formMapper, $options) {
        $this->formMapper = $formMapper;
        $this->options = $options;        
    }


    /**
     * Добавление в formMapper мультиязычных полей
     */
    function add() {        
        $options = func_get_args(); //берём аргументы
        $this->options['container']->get('language_switcher_logic')->add($this->formMapper, $options);
        return $this;
    }

    /**
     * Завершение формы
     * @return \Core\LanguageBundle\Form\Mapper\LanguageSwitcherFormMapper
     */
    function end() {
        $options = func_get_args(); //берём аргументы
        $this->formMapper->end();
        return $this;
    }

}
