<?php

/**
 * Тип формы для дат с по
 *
 * @author  Kaluzhny.N.I.
 * @copyright LLC 'RostPay'
 */

namespace Application\Sonata\AdminBundle\Admin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Translation\TranslatorInterface;

use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;

class DateRangeType extends AbstractType
{
    protected $translator;

    /**
     * Дефолтные настройки для виджета
     * @var array
     */
    private $widgetConfig = array(
            'ranges' => true,
            'start' => false,
            'end' => true,
            'backend' => true
        );

    /**
     * @param \Symfony\Component\Translation\TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('from', 'date', array('widget'=>'single_text',
                                        'format' => 'dd.MM.yyyy',
                                        'attr'=> array('placeholder'=>$options['placeholder']),
//                                        'label'  => $this->translator->trans($options['labels']['from'])))
                                        'label'  => false))
            ->add('to', 'date', array('widget'=>'single_text',
                                      'format' => 'dd.MM.yyyy',
                                      'attr'=> array('placeholder'=>$options['placeholder']),
                                      'label'  => $this->translator->trans($options['labels']['to'])))
        ;
    }


    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'labels' => array('from' => 'label.daterange.from','to'=>'label.daterange.to'),
            'placeholder' => 'label.placeholder',
            'config' => $this->widgetConfig
        ));
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $currentDayOfWeek = date('w',time());
        if ($currentDayOfWeek > 1) {
            $firstDayOfWeek = strtotime("last Monday");
        } else {
            $firstDayOfWeek = time();
        }
        if ($currentDayOfWeek > 3)  {
            $middleDayOfWeek = strtotime('last Wednesday');
        } else {
            $middleDayOfWeek = time();
        }

        
        $view->vars['widgetConfig'] = array_merge($this->widgetConfig, $options['config']);
        $view->vars['oneDay'] = strtotime('-1 days');
        $view->vars['twoDays'] = strtotime('-2 days');
        $view->vars['sevenDays'] = strtotime('-7 days');
        $view->vars['firstDayOfWeek'] = $firstDayOfWeek;
        $view->vars['middleDayOfWeek'] = $middleDayOfWeek;
        $view->vars['firstDayOfMonth'] = strtotime('first day of this month');
        $view->vars['middleDayOfMonth'] = ($view->vars['firstDayOfMonth'] + 14 * 24 * 60 * 60 < time()) ? $view->vars['firstDayOfMonth'] + 14 * 24 * 60 * 60 : time();
    }
    
    public function getName()
    {
        return 'admin_date_range';
    }
    
}
