<?php

/**
 * Новый тип формы для админки
 * Редактор падежей
 *
 * @author Kaluzhniy N. I.
 * @copyright LLC "PromoMaster"
 */

namespace Core\LanguageBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\HttpKernel\Exception\FatalErrorException;
use Sonata\CoreBundle\Form\EventListener\ResizeFormListener;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class TextCaseType extends AbstractType {

    private $configs = []; // Переменная для опций получаемых из yml файла

    public function __construct($configs) {
        $this->configs = $configs;
    }

    /**
     * Построение формы
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $lang = substr($builder->getName(), -2);
        if (isset($this->configs['cases'][$lang])) {
            $index=0;
            foreach ($this->configs['cases'][$lang] as $case_key => $case) {
                $builder->add($case_key, 'text', array('label' => $case['caption'],
                    'required' => false,
                    'attr' => ['class' => 'span5 ' . $this->configs['classId'] . $lang],
                    'property_path' => '[' . $index . ']',
                    'trim' => true,
                ));
                $index++;
            }
        }

    }

    public function buildView(FormView $view, FormInterface $form, array $options) {

        $help = [];
        foreach ($this->configs['cases'] as $lang_key => $cases) {
            foreach ($cases as $case_key => $case) {
                $help[$case_key] = $case['help'];
            }
        }
        $view->vars['configs'] = $this->configs;
        $view->vars['help'] = $help;
    }

    /**
     * Название типа формы
     */
    public function getName() {
        return 'textCase';
    }

}
