<?php

/**
 * Новый тип формы для выбора цвета c помощью COLOR PICKER - JQUERY PLUGIN
 * http://www.eyecon.ro/colorpicker/
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\ColorBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormView;

class ColorpickerType extends AbstractType {

    private $logic; // Логика для работы с цветами
    private $doctrine; // Доктрина

    private $libStats = array(); //чтобы не подключать библиотеки JS и файлы CSS несколько раз ведём статистику

    public function __construct($logic, $doctrine) {
        $this->logic = $logic;
        $this->doctrine = $doctrine;
    }

    /**
     * Построение формы
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

    }

    public function buildView(FormView $view, FormInterface $form, array $options) {

        //проверяем есть ли уже в форме colorpicker
        $uniqid = preg_replace('/\[.+\]/','',$view->vars['full_name']);
        if (isset($this->libStats[$uniqid])) {
            $libFirst = false;
        } else {
            $libFirst = true;
            $this->libStats[$uniqid] = true;
        }

        $view->vars['attr']['class'] = 'colorpicker-input' . (isset($view->vars['attr']['class']) ? ' ' . $view->vars['attr']['class'] : '');
        $view->vars['libFirst'] = $libFirst;
    }

    /**
     *  Устанавливаем опции по умолчанию
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
    }

    /**
     * Родительский тип формы
     */
    public function getParent() {
        return 'text';
    }

    /**
     * Название типа формы
     */
    public function getName() {
        return 'colorpicker';
    }

}