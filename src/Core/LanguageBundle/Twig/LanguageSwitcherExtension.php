<?php

/**
 * Расширение для вывода в формах редактирования переключалки языков
 * @author  Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LanguageBundle\Twig;

class LanguageSwitcherExtension extends \Twig_Extension {

    public $configs;
    public $session;
    private $environment;
    private $language_logic;

    public function __construct($configs, $session, $language_logic) {

        if ($session->has('activeLanguage')) {
            $configs['active'] = $session->get('activeLanguage');
        }

        $this->configs = $configs;
        $this->session = $session;
        $this->language_logic = $language_logic;
    }

    public function initRuntime(\Twig_Environment $environment) {
        $this->environment = $environment;
    }

    public function getFunctions() {
        return array(
            'languageSwitcher' => new \Twig_Function_Method($this, 'languageSwitcher'),
            'getCaseByKey' => new \Twig_Function_Method($this, 'getCaseByKey'),
        );
    }

    public function languageSwitcher() {
        if (count($this->configs['languages']) > 1) {   //если в настройках больше одного языка, тогда есть смысл выводить меню
            return $this->environment->render('CoreLanguageBundle::language_switcher_menu.html.twig', array(
                        'configs' => $this->configs
            ));
        } else {
            return null;
        }
    }

    /**
     * По ключу достает падеж
     * @param type $casesArray
     * @param type $key
     * @return type
     */
    public function getCaseByKey($casesArray, $key) {
        return $this->language_logic->getCaseByKey($casesArray, $key);
    }

    public function getName() {
        return 'language_switcher_extension';
    }

}
